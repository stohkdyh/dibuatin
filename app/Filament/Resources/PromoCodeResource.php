<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\PromoCode;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PromoCodeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PromoCodeResource\RelationManagers;
use Carbon\Carbon;

class PromoCodeResource extends Resource
{
    protected static ?string $model = PromoCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-percent-badge';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->label('Promo Code')
                    ->required()
                    ->placeholder('Enter the promo code here')
                    ->maxLength(50),

                Forms\Components\Select::make('discount_type')
                    ->label('Discount Type')
                    ->options([
                        'percentage' => 'Percentage',
                        'fixed' => 'Fixed Amount',
                    ])
                    ->required()
                    ->placeholder('Select discount type'),

                Forms\Components\TextInput::make('discount')
                    ->label('Discount Amount')
                    ->numeric()
                    ->required()
                    ->minValue(1)
                    ->placeholder('Enter the discount amount'),

                Forms\Components\DatePicker::make('valid_until')
                    ->label('Valid Until')
                    ->required()
                    ->placeholder('Select expiry date'),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->label('Promo Code')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('discount_type')
                    ->label('Discount Type')
                    ->formatStateUsing(fn($state) => $state === 'percentage' ? 'Percentage' : 'Fixed Amount')
                    ->sortable()
                    ->color(fn($state) => $state === 'percentage' ? 'success' : 'warning'),

                TextColumn::make('discount')
                    ->label('Discount Amount')
                    ->formatStateUsing(fn($state, $record) =>
                    $record->discount_type === 'percentage'
                        ? "{$state}%"
                        : "IDR {$state}")
                    ->sortable(),

                TextColumn::make('valid_until')
                    ->label('Valid Until')
                    ->sortable()
                    ->date('F j, Y')
                    ->color(fn($state) => Carbon::parse($state)->isPast() ? 'danger' : ''),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->date('F j, Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('discount_type')
                    ->options([
                        'percentage' => 'Percentage',
                        'fixed' => 'Fixed Amount',
                    ])
                    ->label('Discount Type'),
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
            'index' => Pages\ListPromoCodes::route('/'),
            'create' => Pages\CreatePromoCode::route('/create'),
            'edit' => Pages\EditPromoCode::route('/{record}/edit'),
        ];
    }
}