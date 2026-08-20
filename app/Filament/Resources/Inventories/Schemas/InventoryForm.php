<?php

namespace App\Filament\Resources\Inventories\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InventoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Ubicación y Producto')
                    ->schema([
                        Select::make('warehouse_id')
                            ->label('Depósito')
                            ->relationship('warehouse', 'name')
                            ->searchable()
                            ->required(),
                            
                        Select::make('product_id')
                            ->label('Producto')
                            ->relationship('product', 'name')
                            ->searchable()
                            ->required(),
                    ])->columns(2),

                Section::make('Stock y Trazabilidad')
                    ->schema([
                        TextInput::make('quantity_available')
                            ->label('Cantidad Disponible')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                            
                        TextInput::make('quantity_reserved')
                            ->label('Cantidad Reservada')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                            
                        TextInput::make('lot_number')
                            ->label('Número de Lote')
                            ->maxLength(100),
                            
                        DatePicker::make('expiry_date')
                            ->label('Fecha de Vencimiento'),
                    ])->columns(2),
            ]);
    }
}
