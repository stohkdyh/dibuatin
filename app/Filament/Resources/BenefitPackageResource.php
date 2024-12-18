<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Package;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BenefitPackage;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BenefitPackageResource\Pages;
use App\Filament\Resources\BenefitPackageResource\RelationManagers;

class BenefitPackageResource extends Resource
{
    protected static ?string $model = BenefitPackage::class;
    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    protected static ?string $navigationLabel = 'Benefit Packages';
    protected static ?string $navigationGroup = 'Service Settings';

    protected static ?int $navigationSort = 3;

    protected static ?string $breadcrumb = 'Benefit Packages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('packages_id')
                    ->label('Package')
                    ->options(Package::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('Select a package'),


                Forms\Components\TextInput::make('benefit')
                    ->label('Benefit')
                    ->required()
                    ->placeholder('Enter the benefit'),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('package.name')
                    ->label('Package Name')
                    ->sortable()
                    ->searchable()
                    ->icon('heroicon-o-cube'),

                Tables\Columns\TextColumn::make('benefit')
                    ->label('Benefit')
                    ->limit(50)
                    ->tooltip(fn($record) => $record->benefit)
                    ->icon('heroicon-o-sparkles'),
            ])
            ->defaultSort('package.name')
            ->filters([
                Tables\Filters\SelectFilter::make('packages_id')
                    ->label('Filter by Package')
                    ->options(Package::all()->pluck('name', 'id')),
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
            'index' => Pages\ListBenefitPackages::route('/'),
            'create' => Pages\CreateBenefitPackage::route('/create'),
            'edit' => Pages\EditBenefitPackage::route('/{record}/edit'),
        ];
    }
}