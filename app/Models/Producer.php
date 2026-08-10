<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Producer extends Model
{
    use SoftDeletes;
    protected $table = 'producers';
    protected $primaryKey = 'producer_id';
    protected $fillable = [
        'company_name',
        'vat_number',
        'country',
        'region',
        'address',
        'email',
        'phone',
    ];

    /**
     * Relación: Un Productor tiene muchos Productos (1:N)
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'producer_id', 'producer_id');
    }
}