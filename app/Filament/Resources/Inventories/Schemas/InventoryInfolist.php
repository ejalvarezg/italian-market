<?php

namespace App\Filament\Resources\Inventories\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InventoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('warehouse.name')
                    ->label('Warehouse'),
                TextEntry::make('product.name')
                    ->label('Product'),
                TextEntry::make('quantity_available')
                    ->numeric(),
                TextEntry::make('quantity_reserved')
                    ->numeric(),
                TextEntry::make('lot_number')
                    ->placeholder('-'),
                TextEntry::make('expiry_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
