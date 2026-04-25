<?php

namespace App\Filament\Resources\Stores\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class StoreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Toko')
                    ->required()
                    ->maxLength(255),

                Select::make('level')
                    ->label('Level Toko')
                    ->options([
        
                        'pusat' => 'Kantor Pusat',
                        'cabang' => 'Toko Cabang',
                        'retail' => 'Retail/Eceran',
                        'gudang' => 'Gudang Stok',
                    ])
                    ->native(false)
                    ->required(),

                Textarea::make('address')
                    ->label('Alamat Lengkap')
                    ->columnSpanFull()
                    ->rows(3),
            ]);
    }
}