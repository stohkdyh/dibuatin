<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Customers';
    protected static ?string $navigationGroup = 'Datas';

    protected static ?int $navigationSort = 1;

    protected static ?string $breadcrumb = 'Customers';


    protected function getTitle(): string
    {
        return 'Customers';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->label('ID')
                    ->default(fn($record) => substr($record->id, 0, 8))
                    ->disabled()
                    ->dehydrated(false), // Tidak menyimpan data

                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->disabled()
                    ->dehydrated(false),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->disabled()
                    ->dehydrated(false),

                Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->disabled()
                    ->dehydrated(false),

                Forms\Components\DatePicker::make('created_at')
                    ->label('Registered At')
                    ->displayFormat('F j, Y')
                    ->disabled()
                    ->dehydrated(false),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(fn() => User::query()->where('role', 'customer'))
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->formatStateUsing(fn($state) => substr($state, 0, 8))
                    ->toggleable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Customer Name')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-user-circle'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-o-envelope'),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->sortable()
                    ->icon('heroicon-o-phone'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Registered At')
                    ->sortable()
                    ->date('F j, Y')
                    ->icon('heroicon-o-calendar'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListCustomers::route('/'),
        ];
    }
}