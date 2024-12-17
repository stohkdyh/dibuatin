<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pricing;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\TypeProduct;
use App\Models\ProductPricing;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PricingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PricingResource\RelationManagers;
use App\Models\ProdukAtribute;
use Filament\Forms\Components\Slider;

class PricingResource extends Resource
{
    protected static ?string $model = ProductPricing::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';
    protected static ?string $navigationLabel = 'Price References';
    protected static ?string $navigationGroup = 'Products';
    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make([
                    Select::make('product_type_id')
                        ->label('Product Type')
                        ->options(TypeProduct::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required()
                        ->placeholder('Select a Product Type')
                        ->afterStateUpdated(function ($state, $set) {
                            $set('attribute_name', null);
                        }),

                    Select::make('attribute_name')
                        ->label('Attribute Name')
                        ->required()
                        ->options(function ($get) {
                            $productTypeId = $get('product_type_id');
                            return ProdukAtribute::where('product_type_id', $productTypeId)
                                ->get()
                                ->pluck('name', 'id')
                                ->mapWithKeys(function ($name, $id) {
                                    $attribute = ProdukAtribute::find($id);
                                    return [
                                        $id => "{$attribute->name} ({$attribute->unit})",
                                    ];
                                });
                        })
                        ->searchable()
                        ->placeholder('Select an Attribute')
                        ->reactive(),

                    TextInput::make('min_value')
                        ->label('Minimum Value')
                        ->type('number')
                        ->required()
                        ->placeholder('Enter min value')
                        ->extraAttributes(['min' => 0, 'step' => 1, 'max' => 1000])
                        ->numeric()
                        ->rules(['min:0', 'max:1000']),

                    TextInput::make('max_value')
                        ->label('Maximum Value')
                        ->type('number')
                        ->required()
                        ->placeholder('Enter max value')
                        ->extraAttributes(['min' => 0, 'step' => 1, 'max' => 1000])
                        ->numeric()
                        ->rules(['min:0', 'max:1000']),

                    Select::make('difficulty_level')
                        ->label('Difficulty Level')
                        ->options([
                            'easy' => 'Easy',
                            'medium' => 'Medium',
                            'hard' => 'Hard'
                        ])
                        ->required()
                        ->default('medium'),

                    TextInput::make('base_price')
                        ->label('Base Price')
                        ->numeric()
                        ->required()
                        ->placeholder('Enter base price')
                        ->default(0),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('productType.name')
                    ->label('Product Type')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('attribute_name')
                    ->label('Attribute Name')
                    ->sortable()
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        $produkAtribute = ProdukAtribute::find($record->attribute_name);
                        return $produkAtribute ? "{$produkAtribute->name} ({$produkAtribute->unit})" : 'N/A';
                    }),

                TextColumn::make('min_value')
                    ->label('Min Value')
                    ->sortable(),

                TextColumn::make('max_value')
                    ->label('Max Value')
                    ->sortable(),

                TextColumn::make('difficulty_level')
                    ->label('Difficulty')
                    ->formatStateUsing(fn($state) => ucfirst($state))
                    ->color(fn($state) => $state === 'easy' ? 'success' : ($state === 'medium' ? 'warning' : 'danger'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('base_price')
                    ->label('Base Price')
                    ->money('IDR')
                    ->sortable(),
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
            'index' => Pages\ListPricings::route('/'),
            'create' => Pages\CreatePricing::route('/create'),
            'edit' => Pages\EditPricing::route('/{record}/edit'),
        ];
    }
}