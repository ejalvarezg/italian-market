<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Warehouse extends Model
{
    const UPDATED_AT = null;
    protected $table = 'warehouses';
    protected $primaryKey = 'warehouse_id';
    protected $fillable = [
        'name',
        'country',
        'city',
        'address',
    ];

    /**
     * Relación Directa (1:N): Este depósito tiene múltiples registros de Inventario
     */
    public function inventory(): HasMany
    {
        // Parámetros: Modelo Destino, Llave Foránea Destino, Llave Local
        return $this->hasMany(Inventory::class, 'warehouse_id', 'warehouse_id');
    }
}