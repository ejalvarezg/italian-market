<?php

namespace App\Filament\Resources\Producers;

use App\Filament\Resources\Producers\Pages\CreateProducer;
use App\Filament\Resources\Producers\Pages\EditProducer;
use App\Filament\Resources\Producers\Pages\ListProducers;
use App\Filament\Resources\Producers\Pages\ViewProducer;
use App\Filament\Resources\Producers\Schemas\ProducerForm;
use App\Filament\Resources\Producers\Schemas\ProducerInfolist;
use App\Filament\Resources\Producers\Tables\ProducersTable;
use App\Models\Producer;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProducerResource extends Resource
{
    protected static ?string $model = Producer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice;
    
    protected static string|UnitEnum|null $navigationGroup = 'Catálogo';

    protected static ?string $recordTitleAttribute = 'company_name';

    public static function form(Schema $schema): Schema
    {
        return ProducerForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProducerInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProducersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProducers::route('/'),
            'create' => CreateProducer::route('/create'),
            'view' => ViewProducer::route('/{record}'),
            'edit' => EditProducer::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
