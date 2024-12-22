<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Order;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Transaction;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Filament\Resources\TransactionResource\Widgets\WeeklyEarningsWidget;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Transactions';

    protected static ?string $breadcrumb = 'Transactions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('order_id')
                    ->label('Order')
                    ->relationship('order', 'request')
                    ->required()
                    ->placeholder('Select Order')
                    ->searchable()
                    ->options(function () {
                        return Order::where('status', 'pending')
                            ->pluck('request', 'id');
                    })
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $order = Order::with('user')->find($state);
                        if ($order) {
                            $set('grandtotal', $order->price);
                            $set('user_id', $order->user->name);
                        } else {
                            $set('grandtotal', 0);
                            $set('user_id', null);
                        }
                    }),

                Forms\Components\TextInput::make('user_id')
                    ->label('User')
                    ->required()
                    ->disabled()
                    ->placeholder('Will be automatically filled'),

                Forms\Components\TextInput::make('grandtotal')
                    ->label('Grand Total')
                    ->numeric()
                    ->required()
                    ->placeholder('Will be automatically filled')
                    ->minValue(0)
                    ->helperText('Total amount for the transaction')
                    ->reactive()
                    ->disabled()
                    ->default(function ($get) {
                        $order_id = $get('order_id');
                        if ($order_id) {
                            $order = Order::find($order_id);
                            return $order ? $order->price : 0;
                        }
                        return 0;
                    }),

                Forms\Components\Select::make('payment_method')
                    ->label('Payment Method')
                    ->required()
                    ->placeholder('Select Payment Method')
                    ->options([
                        'credit_card' => 'Credit Card',
                        'debit_card' => 'Debit Card',
                        'bank_transfer' => 'Bank Transfer',
                        'e_wallet' => 'E-Wallet (e.g., OVO, GoPay, DANA)',
                        'cash' => 'Cash',
                        'paypal' => 'PayPal',
                        'google_pay' => 'Google Pay',
                        'apple_pay' => 'Apple Pay',
                        'cryptocurrency' => 'Cryptocurrency (e.g., Bitcoin, Ethereum)',
                        'check' => 'Check',
                        'mobile_banking' => 'Mobile Banking',
                        'virtual_account' => 'Virtual Account',
                        'cod' => 'Cash on Delivery (COD)',
                        'qris' => 'QRIS Payment',
                        'direct_debit' => 'Direct Debit',
                    ])
                    ->searchable(),

                Forms\Components\Select::make('payment_status')
                    ->label('Payment Status')
                    ->options([
                        'paid' => 'Paid',
                        'unpaid' => 'Unpaid',
                        'refunded' => ' ',
                    ])
                    ->default('unpaid')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order.request')
                    ->label('Order Request')
                    ->sortable()
                    ->searchable()
                    ->limit(15),  // Membatasi panjang teks

                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('grandtotal')
                    ->label('Grand Total')
                    ->sortable()
                    ->money('IDR', true),  // Format mata uang

                Tables\Columns\TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->sortable(),

                Tables\Columns\TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'paid' => 'Paid',
                            'unpaid' => 'Unpaid',
                            'refunded' => 'Refunded',
                            default => $state,
                        };
                    })
                    ->color(function ($state) {
                        return match ($state) {
                            'paid' => 'success',
                            'unpaid' => 'info',
                            'refunded' => 'danger',
                            default => 'gray',
                        };
                    })
                    ->icon(function ($state) {
                        return match ($state) {
                            'paid' => 'heroicon-o-arrow-path',
                            'unpaid' => 'heroicon-o-clock',
                            'refunded' => 'heroicon-o-check',
                            default => 'heroicon-o-information-circle',
                        };
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Payment Date')
                    ->dateTime('M d, Y h:i A')
                    ->sortable()
                    ->alignCenter(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('payment_status')
                    ->options([
                        'paid' => 'Paid',
                        'unpaid' => 'Unpaid',
                        'refunded' => 'Refunded',
                    ])
                    ->label('Payment Status'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('View')
                    ->icon('heroicon-o-eye'),

                // Tables\Actions\EditAction::make()
                //     ->icon('heroicon-o-pencil')
                //     ->label('Edit'),

                // Tables\Actions\DeleteAction::make()
                //     ->icon('heroicon-o-trash')
                //     ->label('Delete'),
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
            'index' => Pages\ListTransactions::route('/'),
            // 'create' => Pages\CreateTransaction::route('/create'),
            // 'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}