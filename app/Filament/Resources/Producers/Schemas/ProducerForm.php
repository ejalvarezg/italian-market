<?php

namespace App\Filament\Resources\Producers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProducerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_name')
                    ->required(),
                TextInput::make('vat_number'),
                TextInput::make('country'),
                TextInput::make('region'),
                Textarea::make('address')
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
            ]);
    }
}
