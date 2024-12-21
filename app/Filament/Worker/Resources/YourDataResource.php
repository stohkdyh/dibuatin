<?php

namespace App\Filament\Worker\Resources;

use App\Filament\Worker\Resources\YourDataResource\Pages;
use App\Filament\Worker\Resources\YourDataResource\RelationManagers;
use App\Models\User;
use App\Models\YourData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class YourDataResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-bug-ant';

    protected static ?string $navigationLabel = 'Dashboard';
    protected static ?string $breadcrumb = 'Dashboard';

    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('id', Auth::id());
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('phone')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Toggle::make('is_active')
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Worker Name')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-user-circle'),

                Tables\Columns\TextColumn::make('email')
                    ->badge()
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-envelope'),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->sortable()
                    ->icon('heroicon-o-phone'),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active Status')
                    ->sortable()
                    ->onColor('success')
                    ->tooltip('Please turn on toogle if you are working')
                    ->alignCenter(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListYourData::route('/'),
            'create' => Pages\CreateYourData::route('/create'),
            'edit' => Pages\EditYourData::route('/{record}/edit'),
        ];
    }
}