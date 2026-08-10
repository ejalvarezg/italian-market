<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrier extends Model
{
    public $timestamps = false;
    protected $table = 'carriers';
    protected $primaryKey = 'carrier_id';
    protected $fillable = [
        'name',
        'phone',
    ];

    /**
     * Relación Directa (1:N): Un transportista se encarga de múltiples envíos (Shipments)
     */
    public function shipments(): HasMany
    {
        return $this->hasMany(Shipment::class, 'carrier_id', 'carrier_id');
    }
}
