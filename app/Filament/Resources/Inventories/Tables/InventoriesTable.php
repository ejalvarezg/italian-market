<?php

namespace App\Filament\Resources\Inventories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InventoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('warehouse.name')
                    ->label('Depósito')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('product.name')
                    ->label('Producto')
                    ->searchable()
                    ->sortable(),
                    
                TextColumn::make('quantity_available')
                    ->label('Disponible')
                    ->numeric()
                    ->sortable()
                    ->badge()
                    ->color(fn (float $state): string => match (true) {
                        $state <= 10 => 'danger',
                        $state <= 50 => 'warning',
                        default => 'success',
                    }),
                    
                TextColumn::make('quantity_reserved')
                    ->label('Reservado')
                    ->numeric()
                    ->sortable(),
                    
                TextColumn::make('lot_number')
                    ->label('Lote')
                    ->searchable(),
                    
                TextColumn::make('expiry_date')
                    ->label('Vencimiento')
                    ->date('d/m/Y')
                    ->sortable(),
                    
                TextColumn::make('updated_at')
                    ->label('Última actualización')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
