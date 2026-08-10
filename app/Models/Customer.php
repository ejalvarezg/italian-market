<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

// NOTA: Este modelo se va a autenticar con Laravel Sanctum,
// para conectarse a la API y obtener un token de acceso.
// Se implementará 'Authenticatable' en lugar de 'Model' estándar.

class Customer extends Model
{
    use SoftDeletes;
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_type',
        'company_name',
        'first_name',
        'last_name',
        'vat_number',
        'email',
        'phone',
    ];

    /**
     * Relación Directa (1:N): Un cliente tiene múltiples direcciones guardadas
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'customer_id', 'customer_id');
    }

    /**
     * Relación Directa (1:N): Un cliente tiene un historial de múltiples órdenes de compra
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id', 'customer_id');
    }
}
