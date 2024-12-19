<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Order;
use App\Models\Package;
use App\Models\Project;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Log;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static ?string $navigationLabel = 'Orders';
    protected static ?string $navigationGroup = 'Order';

    protected static ?int $navigationSort = 1;

    protected static ?string $breadcrumb = 'Orders';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    Select::make('user_id')
                        ->label('User ')
                        ->options(User::where('role', 'customer')->pluck('name', 'id'))
                        ->required()
                        ->searchable()
                        ->placeholder('Select User'),

                    Select::make('package_id')
                        ->label('Package')
                        ->options(
                            Package::with('product', 'benefitPackages')
                                ->get()
                                ->mapWithKeys(function ($package) {
                                    return [
                                        $package->id => "{$package->name} ({$package->product->name})",
                                    ];
                                })
                        )
                        ->required()
                        ->searchable()
                        ->placeholder('Select Package')
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $package = Package::with('benefitPackages')->find($state);

                            if ($package) {
                                $set('price', $package->price);
                                $set('detail_package', $package->detail_package);
                                $set('working_time', "{$package->working_time} {$package->unit}");

                                $benefits = $package->benefitPackages->pluck('benefit')->toArray();
                                $set('benefits', implode(', ', $benefits));
                            } else {
                                $set('price', 0);
                                $set('detail_package', null);
                                $set('working_time', null);
                                $set('benefits', null);
                            }
                        }),

                    Textarea::make('request')
                        ->label('Request')
                        ->rows(5)
                        ->placeholder('Enter the request details')
                        ->required(),

                    Forms\Components\Group::make()->schema([
                        Select::make('orientation')
                            ->label('Orientation')
                            ->options([
                                'portrait' => 'Portrait',
                                'landscape' => 'Landscape',
                            ])
                            ->required()
                            ->placeholder('Select Orientation'),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Pending',
                                'in progress' => 'In Progress',
                                'completed' => 'Completed',
                            ])
                            ->required()
                            ->default('pending')
                            ->placeholder('Select Status'),
                    ]),
                ]),

                Section::make('Package Information')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('price')
                                ->label('Price')
                                ->numeric()
                                ->disabled()
                                ->required()
                                ->default(function ($get) {
                                    $packageId = $get('package_id');
                                    if ($packageId) {
                                        $package = Package::find($packageId);
                                        return $package ? $package->price : 0;
                                    }
                                    return 0;
                                }),

                            TextInput::make('working_time')
                                ->label('Working Time')
                                ->disabled()
                                ->placeholder('Working time will be auto-filled'),

                            Textarea::make('benefits')
                                ->label('Benefits Obtained')
                                ->disabled() // Tidak bisa diubah, hanya untuk menampilkan benefit
                                ->placeholder('The benefits of the selected package will be displayed here'),

                            TextInput::make('detail_package')
                                ->label('Package Details')
                                ->disabled()
                                ->placeholder('Package details will be auto-filled'),
                        ]),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable()
                    ->icon('heroicon-o-user'),

                Tables\Columns\TextColumn::make('package.name')
                    ->label('Package')
                    ->sortable()
                    ->searchable()
                    ->icon('heroicon-o-cube'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'pending' => 'Pending',
                            'in progress' => 'In Progress',
                            'completed' => 'Completed',
                            default => $state,
                        };
                    })
                    ->color(function ($state) {
                        return match ($state) {
                            'pending' => 'warning',
                            'in progress' => 'info',
                            'completed' => 'success',
                            default => 'gray',
                        };
                    })
                    ->icon(function ($state) {
                        return match ($state) {
                            'pending' => 'heroicon-o-arrow-path',
                            'in progress' => 'heroicon-o-clock',
                            'completed' => 'heroicon-o-check',
                            default => 'heroicon-o-information-circle',
                        };
                    }),

                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->sortable()
                    ->formatStateUsing(fn($state) => 'IDR ' . number_format($state, 0, ',', '.'))
                    ->icon('heroicon-o-currency-dollar'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->sortable()
                    ->dateTime('d M Y H:i'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in progress' => 'In Progress',
                        'completed' => 'Completed',
                    ])
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
                ])->label('More'),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
