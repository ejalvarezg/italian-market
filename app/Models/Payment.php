<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    public $timestamps = false;
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'order_id',
        'amount',
        'method',
        'status',
        'transaction_ref',
        'payment_date',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'float',
            'payment_date' => 'datetime',
        ];
    }

    /**
     * Relación Inversa (1:N): Este pago pertenece a una Orden de compra
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}