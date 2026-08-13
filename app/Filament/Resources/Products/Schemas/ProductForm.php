<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Tarjeta 1: Información Principal
                Section::make('Información Principal')
                    ->description('Datos básicos y clasificación del producto')
                    ->components([
                        TextInput::make('name')
                            ->label('Nombre del Producto')
                            ->required(),

                        TextInput::make('sku')
                            ->label('SKU (Código Interno)')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Select::make('category_id')
                            ->label('Categoría')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('producer_id')
                            ->label('Productor')
                            ->relationship('producer', 'company_name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])->columns(2),

                // Tarjeta 2: Detalles
                Section::make('Detalles y Origen')
                    ->components([
                        Textarea::make('description')
                            ->label('Descripción')
                            ->columnSpanFull(),

                        TextInput::make('origin_region')
                            ->label('Región de Origen'),

                        TextInput::make('barcode')
                            ->label('Código de Barras'),
                    ])->columns(2),

                // Tarjeta 3: Precio, Logística y Estado
                Section::make('Precio y Logística')
                    ->components([
                        TextInput::make('unit_price')
                            ->label('Precio Unitario')
                            ->required()
                            ->numeric()
                            ->prefix('$'),

                        TextInput::make('weight_kg')
                            ->label('Peso (Kg)')
                            ->numeric()
                            ->suffix('kg'),

                        TextInput::make('shelf_life_days')
                            ->label('Días de Vida Útil')
                            ->numeric(),

                        Toggle::make('is_active')
                            ->label('Producto Activo')
                            ->default(true),
                    ])->columns(3),
            ]);
    }
}