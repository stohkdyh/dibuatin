<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProdukAtribute;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AttributeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AttributeResource\RelationManagers;

class AttributeResource extends Resource
{
    protected static ?string $model = ProdukAtribute::class;

    protected static ?string $navigationIcon = 'heroicon-o-funnel';

    protected static ?string $navigationLabel = 'Attributes';
    protected static ?string $navigationGroup = 'Products';
    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_type_id')
                    ->label('Product Type')
                    ->relationship('typeProduct', 'name')
                    ->required()
                    ->preload()
                    ->searchable()
                    ->placeholder('Select a product type'),

                TextInput::make('name')
                    ->label('Attribute Name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g., width, height, resolution, duration'),

                TextInput::make('unit')
                    ->label('Unit')
                    ->required()
                    ->maxLength(100)
                    ->placeholder('e.g., kg, cm, pcs'),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('typeProduct.name')
                    ->label('Product Type')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Attribute Name')
                    ->sortable()
                    ->searchable()
                    ->limit(20),

                TextColumn::make('unit')
                    ->label('Unit')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('M d, Y')
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
            'index' => Pages\ListAttributes::route('/'),
            'create' => Pages\CreateAttribute::route('/create'),
            'edit' => Pages\EditAttribute::route('/{record}/edit'),
        ];
    }
}