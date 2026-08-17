<?php

namespace App\Filament\Resources\Producers\Pages;

use App\Filament\Resources\Producers\ProducerResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProducer extends ViewRecord
{
    protected static string $resource = ProducerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
