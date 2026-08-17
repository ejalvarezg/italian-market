<?php

namespace App\Filament\Resources\Producers\Schemas;

use App\Models\Producer;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProducerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('company_name'),
                TextEntry::make('vat_number')
                    ->placeholder('-'),
                TextEntry::make('country')
                    ->placeholder('-'),
                TextEntry::make('region')
                    ->placeholder('-'),
                TextEntry::make('address')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('phone')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Producer $record): bool => $record->trashed()),
            ]);
    }
}
