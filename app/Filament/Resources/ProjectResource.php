<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Order;
use App\Models\Project;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectResource\RelationManagers;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';
    protected static ?string $navigationLabel = 'Projects';
    protected static ?string $navigationGroup = 'Order';

    protected static ?int $navigationSort = 2;

    protected static ?string $breadcrumb = 'Projects';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('order_id')
                    ->label('Order')
                    ->searchable()
                    ->options(function ($state, $get) {
                        $record = $get('record');

                        if (!$record) {
                            return Order::with(['package.product', 'user'])
                                ->where('status', 'completed')
                                ->whereDoesntHave('project')
                                ->get()
                                ->mapWithKeys(function ($order) {
                                    $packageName = $order->package ? $order->package->name : 'Unknown Package';
                                    $productName = $order->package && $order->package->product ? $order->package->product->name : 'Unknown Product';
                                    $userName = $order->user ? $order->user->name : 'Unknown User';
                                    return [
                                        $order->id => "{$order->request} ({$productName}) ({$userName})"
                                    ];
                                });
                        }

                        return Order::with(['package.product', 'user'])
                            ->where('status', 'completed')
                            ->get()
                            ->mapWithKeys(function ($order) use ($record) {
                                $packageName = $order->package ? $order->package->name : 'Unknown Package';
                                $productName = $order->package && $order->package->product ? $order->package->product->name : 'Unknown Product';
                                $userName = $order->user ? $order->user->name : 'Unknown User';

                                $optionLabel = "{$order->request} ({$productName}) ({$userName})";

                                if ($order->id == $record->order_id) {
                                    return [$order->id => $optionLabel];
                                }

                                if (!$order->project) {
                                    return [$order->id => $optionLabel];
                                }

                                return [];
                            });
                    })
                    ->required()
                    ->placeholder('Select an Order'),

                Select::make('user_id')
                    ->label('Worker Active')
                    ->options(
                        User::where('role', 'worker')
                            ->whereNotNull('is_active')
                            ->where(
                                'is_active',
                                1
                            )
                            ->pluck('name', 'id')
                    )
                    ->required()
                    ->placeholder('Select User'),

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
                Tables\Columns\TextColumn::make('order.request')  // Menampilkan kolom request dari relasi Order
                    ->label('Order')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state, $record) {
                        $productName = $record->order->package && $record->order->package->product
                            ? $record->order->package->product->name
                            : 'Unknown Product';

                        $userName = $record->order->user ? $record->order->user->name : 'Unknown User';
                        $formattedState = "{$state} ({$productName}) ({$userName})";
                        return Str::limit($formattedState, 50, '...');
                    }),
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
                Tables\Actions\ViewAction::make()
                    ->label('View')
                    ->icon('heroicon-o-eye'),

                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->label('Edit'),

                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->label('Delete'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
