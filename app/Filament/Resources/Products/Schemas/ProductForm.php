<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Pastikan nama relasi 'store' sama persis dengan fungsi di Model Product
                Select::make('store_id')
                    ->label('Store')
                    ->relationship('store', 'name') 
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                TextInput::make('sku')
                    ->label('SKU')
                    ->required()
                    ->maxLength(255),

                TextInput::make('price')
                    ->numeric()
                    ->prefix('IDR ')
                    ->required(),

                TextInput::make('stock')
                    ->numeric()
                    ->default(0)
                    ->required(),
            ]);
    }
}