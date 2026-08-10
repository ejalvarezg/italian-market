<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    public $timestamps = false;
    protected $table = 'invoices';
    protected $primaryKey = 'invoice_id';
    protected $fillable = [
        'order_id',
        'invoice_number',
        'issue_date',
        'total_net',
        'total_vat',
        'total_gross',
    ];

    protected function casts(): array
    {
        return [
            'issue_date'  => 'date',
            'total_net'   => 'float',
            'total_vat'   => 'float',
            'total_gross' => 'float',
        ];
    }

    /**
     * Relación Inversa (1:N): Esta factura pertenece a una Orden de compra
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
