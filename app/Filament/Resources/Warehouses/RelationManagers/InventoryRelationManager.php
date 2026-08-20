<?php

namespace App\Filament\Resources\Warehouses\RelationManagers;

use App\Filament\Resources\Inventories\InventoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class InventoryRelationManager extends RelationManager
{
    protected static string $relationship = 'inventory';

    protected static ?string $relatedResource = InventoryResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
