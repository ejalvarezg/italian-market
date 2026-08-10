<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'customer_id',
        'billing_address_id',
        'shipping_address_id',
        'order_date',
        'status',
        'currency',
        'exchange_rate',
        'total_amount',
    ];

    protected function casts(): array
    {
        return [
            'order_date' => 'datetime',
            'exchange_rate' => 'float',
            'total_amount' => 'float',
        ];
    }

    /**
     * Relación Inversa (1:N): Esta orden le pertenece a un Cliente
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    /**
     * Relación Inversa (1:N): Dirección de Facturación
     */
    public function billingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'billing_address_id', 'address_id');
    }

    /**
     * Relación Inversa (1:N): Dirección de Envío
     */
    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_address_id', 'address_id');
    }

    /**
     * Relación Directa (1:N): Una orden tiene muchas líneas de detalle (productos)
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    /**
     * Relación Directa (1:N): Una orden puede tener múltiples intentos de pago
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'order_id', 'order_id');
    }

    /**
     * Relación Directa (1:N): Una orden puede dividirse en múltiples envíos
     */
    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'order_id', 'order_id');
    }

    /**
     * Relación Directa (1:1 o 1:N): Facturas asociadas a esta orden
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, 'order_id', 'order_id');
    }
}