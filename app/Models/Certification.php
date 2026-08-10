<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Certification extends Model
{
    public $timestamps = false;
    protected $table = 'certifications';
    protected $primaryKey = 'cert_id';
    protected $fillable = [
        'code',
        'name',
    ];

    /**
     * Relación Muchos a Muchos (M:N): Una certificación puede estar en múltiples productos
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class, 
            'product_certifications', 
            'cert_id', 
            'product_id'
        );
    }
}