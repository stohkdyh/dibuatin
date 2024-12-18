<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Package;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BenefitPackage;
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
    protected static ?string $navigationLabel = 'Package';
    protected static ?string $navigationGroup = 'Service Settings';
    protected static ?int $navigationSort = 2;
    protected static ?string $breadcrumb = 'Package';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make()
                    ->steps([
                        // Step 1: Package Information
                        Forms\Components\Wizard\Step::make('Package Information')
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

                                Forms\Components\TextInput::make('working_time')
                                    ->label('Working Time')
                                    ->required()
                                    ->numeric()
                                    ->placeholder('Enter working time'),

                                Forms\Components\Select::make('unit')
                                    ->label('Unit')
                                    ->options([
                                        'minutes' => 'Minutes',
                                        'hours' => 'Hours',
                                        'days' => 'Days',
                                        'months' => 'Months',
                                        'years' => 'Years',
                                    ])
                                    ->default('hours')
                                    ->required(),
                            ])
                            ->columns(2),

                        // Step 2: Benefits
                        Forms\Components\Wizard\Step::make('Benefits')->schema([
                            Forms\Components\Repeater::make('benefits')
                                ->label('Benefits')
                                ->relationship('benefitPackages')
                                ->schema([
                                    Forms\Components\TextInput::make('benefit')
                                        ->label('Benefit')
                                        ->required()
                                        ->placeholder('Enter benefit details')
                                        ->hint('Provide details about the benefit.')
                                ])
                                ->createItemButtonLabel('Add Benefit')
                                ->collapsible()
                                ->required(),
                        ]),
                    ])
                    ->columnSpan(2)
            ]);
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
                    ->icon('heroicon-o-archive-box'),

                TextColumn::make('price')
                    ->label('Price')
                    ->sortable()
                    ->formatStateUsing(fn($state) => 'IDR ' . number_format($state, 0, ',', '.')),

                TextColumn::make('working_time')
                    ->label('Working Time')
                    ->sortable()
                    ->getStateUsing(fn($record) => $record->working_time . ' ' . $record->unit)
                    ->icon('heroicon-o-clock'),
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