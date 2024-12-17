<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Package;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PackageResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PackageResource\RelationManagers;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Packages';
    protected static ?string $navigationGroup = 'Services';

    protected static ?int $navigationSort = 2;

    protected static ?string $breadcrumb = 'Packages';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Package Name')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Enter package name'),

                Forms\Components\Select::make('product_id')
                    ->label('Product')
                    ->options(Product::all()->pluck('name', 'id'))
                    ->required()
                    ->searchable(),

                Forms\Components\Textarea::make('detail_package')
                    ->label('Package Details')
                    ->rows(4)
                    ->placeholder('Enter detailed description'),

                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->required()
                    ->numeric()
                    ->placeholder('Enter price'),

                Forms\Components\TextInput::make('deadline')
                    ->label('Deadline')
                    ->required()
                    ->numeric()
                    ->placeholder('Enter deadline in days'),

                Forms\Components\Select::make('worker')
                    ->label('Assigned Worker')
                    ->options(User::where('role', 'worker')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Package Name')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-cube'),

                TextColumn::make('product.name')
                    ->label('Product')
                    ->sortable()
                    ->searchable()
                    ->icon('heroicon-o-box'),

                TextColumn::make('price')
                    ->label('Price')
                    ->sortable()
                    ->formatStateUsing(fn($state) => 'IDR ' . number_format($state, 0, ',', '.')),

                TextColumn::make('deadline')
                    ->label('Deadline (days)')
                    ->sortable()
                    ->icon('heroicon-o-clock'),

                // TextColumn::make('worker.name')
                //     ->label('Assigned Worker')
                //     ->sortable()
                //     ->searchable()
                //     ->icon('heroicon-o-user'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}