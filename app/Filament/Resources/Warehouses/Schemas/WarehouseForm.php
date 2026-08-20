<?php

namespace App\Filament\Resources\Warehouses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class WarehouseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Información del Depósito')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nombre')
                            ->required()
                            ->maxLength(100),
                            
                        TextInput::make('country')
                            ->label('País')
                            ->maxLength(100),
                            
                        TextInput::make('city')
                            ->label('Ciudad')
                            ->maxLength(100),
                            
                        Textarea::make('address')
                            ->label('Dirección')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
