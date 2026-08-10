<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shipment extends Model
{
    public $timestamps = false;
    protected $table = 'shipments';
    protected $primaryKey = 'shipment_id';
    protected $fillable = [
        'order_id',
        'carrier_id',
        'tracking_number',
        'shipped_date',
        'delivered_date',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'shipped_date' => 'date',
            'delivered_date' => 'date',
        ];
    }

    /**
     * Relación Inversa (1:N): Este envío pertenece a una Orden de compra
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    /**
     * Relación Inversa (1:N): Este envío es manejado por un Transportista
     */
    public function carrier(): BelongsTo
    {
        return $this->belongsTo(Carrier::class, 'carrier_id', 'carrier_id');
    }

    /**
     * Relación Directa (1:N): Documentos de exportación/aduana asociados a este paquete
     */
    public function exportDocuments(): HasMany
    {
        return $this->hasMany(ExportDocument::class, 'shipment_id', 'shipment_id');
    }
}