<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Order;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\OrderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\Widgets\PendingOrdersWidget;
use App\Filament\Resources\OrderResource\Widgets\CompletedOrdersPerWeekWidget;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static ?string $navigationGroup = 'Orders';
    protected static ?string $navigationLabel = 'Order';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Order Details')
                    ->description('Fill in the details of the order.')
                    ->schema([
                        Forms\Components\Group::make()->schema([
                            Forms\Components\Select::make('user_id')
                                ->label('Customer')
                                ->relationship('user', 'name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->columnSpan(1),

                            Forms\Components\TextInput::make('title')
                                ->label('Title')
                                ->placeholder('Enter the order title')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(1),  // Kolom 1
                        ])->columns(1),

                        Forms\Components\Group::make()->schema([
                            Forms\Components\Select::make('status')
                                ->label('Status')
                                ->options([
                                    'pending' => 'Pending',
                                    'completed' => 'Completed',
                                    'canceled' => 'Canceled',
                                ])
                                ->required()
                                ->default('pending')
                                ->columnSpan(1),

                            Forms\Components\DatePicker::make('deadline')
                                ->label('Deadline')
                                ->required()
                                ->default(now()->addDays(7))
                                ->minDate(now())
                        ])->columns(1),

                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->placeholder('Provide a description of the order')
                            ->required()
                            ->rows(2)
                            ->columnSpan(2),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Product and Attributes')
                    ->description('Provide product and attribute details for the order.')
                    ->schema([
                        Forms\Components\Select::make('type_id')
                            ->label('Product Type')
                            ->relationship('typeProduct', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\TextInput::make('value_1')
                            ->label('Value 1')
                            ->placeholder('Enter value 1')
                            ->numeric()
                            ->nullable(),

                        Forms\Components\TextInput::make('attribute_2')
                            ->label('Value 2')
                            ->placeholder('Enter value 2')
                            ->numeric()
                            ->nullable(),

                        Forms\Components\Select::make('difficulty_level')
                            ->label('Difficulty Level')
                            ->options([
                                'easy' => 'Easy',
                                'medium' => 'Medium',
                                'hard' => 'Hard',
                            ])
                            ->nullable(),
                    ])
                    ->columns(2),

                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->numeric()
                    ->prefix('$')
                    ->required()
                    ->placeholder('Enter the price'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->badge(),

                Tables\Columns\TextColumn::make('price')
                    ->label('Price')
                    ->sortable()
                    ->money('USD'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->date('F j, Y'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->label('Edit')
                    ->color('info'),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            CompletedOrdersPerWeekWidget::class,
            PendingOrdersWidget::class,
        ];
    }
}