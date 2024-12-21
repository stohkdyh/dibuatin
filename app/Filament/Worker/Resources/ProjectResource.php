<?php

namespace App\Filament\Worker\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Order;
use App\Models\Project;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Worker\Resources\ProjectResource\Pages;
use App\Filament\Worker\Resources\ProjectResource\RelationManagers;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';
    protected static ?string $navigationLabel = 'Project';
    protected static ?string $breadcrumb = 'Projects';
    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('order_id')
                    ->label('Order')
                    ->options(function () {
                        return Order::with(['package.product', 'user']) // Memuat relasi package, product, dan user
                            ->whereHas('package.product') // Memastikan package dan product terkait ada
                            ->whereHas('user') // Memastikan user terkait ada
                            ->get()
                            ->mapWithKeys(function ($order) {
                                // Mendapatkan informasi terkait product dan user
                                $productName = $order->package && $order->package->product
                                    ? $order->package->product->name
                                    : 'Unknown Product';
                                $userName = $order->user
                                    ? $order->user->name
                                    : 'Unknown User';
                                return [
                                    $order->id => "{$order->request} ({$productName}) ({$userName})",
                                ];
                            });
                    })
                    ->required()
                    ->placeholder('Select an Order')
                    ->disabled(),

                Select::make('user_id')
                    ->label('Worker Active')
                    ->options(function () {
                        return User::where('role', 'worker')
                            ->pluck('name', 'id');
                    })
                    ->default(function ($get) {
                        $record = $get('record');
                        return $record ? $record->user_id : null;
                    })
                    ->disabled()
                    ->placeholder('Worker details will be shown here'),

                TextInput::make('review')
                    ->label('Review')
                    ->numeric()
                    ->placeholder('Number of times reviewed'),

                Select::make('status_project')
                    ->label('Project Status')
                    ->options([
                        'ongoing' => 'Ongoing',
                        'review' => 'Review',
                        'completed' => 'Completed',
                    ])
                    ->default('ongoing')
                    ->required()
                    ->placeholder('Select Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order.request')
                    ->label('Order')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(
                        function ($state, $record) {
                            $productName = $record->order->package && $record->order->package->product
                                ? $record->order->package->product->name
                                : 'Unknown Product';

                            $userName = $record->order->user ? $record->order->user->name : 'Unknown User';
                            $formattedState = "{$state} ({$productName}) ({$userName})";
                            return Str::limit($formattedState, 80, '...');
                        }
                    ),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Worker')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('review')
                    ->label('Review')
                    ->sortable()
                    ->searchable()
                    ->default(0),

                Tables\Columns\TextColumn::make('status_project')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'warning' => 'ongoing',
                        'info' => 'review',
                        'success' => 'completed',
                    ])
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status_project')
                    ->label('Status')
                    ->options([
                        'ongoing' => 'Ongoing',
                        'review' => 'Review',
                        'completed' => 'Completed',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}