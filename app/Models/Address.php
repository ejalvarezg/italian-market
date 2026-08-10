<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    public $timestamps = false;
    protected $table = 'addresses';
    protected $primaryKey = 'address_id';
    protected $fillable = [
        'customer_id',
        'address_type',
        'country',
        'city',
        'postal_code',
        'address',
    ];

    /**
     * Relación Inversa (1:N): Esta dirección pertenece a un Cliente
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    /**
     * Relación Directa (1:N): Órdenes que usan esta dirección para Facturación (Billing)
     */
    public function billingOrders(): HasMany
    {
        return $this->hasMany(Order::class, 'billing_address_id', 'address_id');
    }

    /**
     * Relación Directa (1:N): Órdenes que usan esta dirección para Envío (Shipping)
     */
    public function shippingOrders(): HasMany
    {
        return $this->hasMany(Order::class, 'shipping_address_id', 'address_id');
    }
}