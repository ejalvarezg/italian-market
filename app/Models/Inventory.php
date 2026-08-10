<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    const CREATED_AT = null;
    protected $table = 'inventory';
    protected $primaryKey = 'inventory_id';
    protected $fillable = [
        'warehouse_id',
        'product_id',
        'quantity_available',
        'quantity_reserved',
        'lot_number',
        'expiry_date',
    ];

    protected function casts(): array
    {
        return [
            'quantity_available' => 'float',
            'quantity_reserved' => 'float',
            'expiry_date' => 'date',
        ];
    }

    /**
     * Relación Inversa (1:N): Este registro de inventario pertenece a un Depósito
     */
    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'warehouse_id');
    }

    /**
     * Relación Inversa (1:N): Este registro de inventario pertenece a un Producto
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}