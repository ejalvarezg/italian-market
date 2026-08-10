<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    public $timestamps = false;
    protected $table = 'order_items';
    protected $primaryKey = 'item_id';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
        'vat_rate',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'float',
            'unit_price' => 'float',
            'vat_rate' => 'float',
        ];
    }

    /**
     * Relación Inversa (1:N): Esta línea de detalle pertenece a una Orden
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    /**
     * Relación Inversa (1:N): Esta línea de detalle referencia a un Producto
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}