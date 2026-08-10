<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'producer_id',
        'category_id',
        'sku',
        'name',
        'description',
        'origin_region',
        'weight_kg',
        'shelf_life_days',
        'barcode',
        'unit_price',
        'is_active',
    ];

    // Definición de los tipos de datos para los atributos del modelo
    protected function casts(): array
    {
        return [
            'unit_price' => 'float',
            'weight_kg' => 'float',
            'is_active' => 'boolean',
            'shelf_life_days' => 'integer',
        ];
    }

    /**
     * Relación Inversa (1:N): Este producto pertenece a un Productor
     */
    public function producer(): BelongsTo
    {
        return $this->belongsTo(Producer::class, 'producer_id', 'producer_id');
    }

    /**
     * Relación Inversa (1:N): Este producto pertenece a una Categoría
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    /**
     * Relación Muchos a Muchos (M:N): Un producto tiene múltiples certificaciones
     */
    public function certifications(): BelongsToMany
    {
        return $this->belongsToMany(
            Certification::class, 
            'product_certifications', 
            'product_id', 
            'cert_id'
        );
    }

    /**
     * Relación Directa (1:N): Este producto tiene registros en el Inventario (Depósitos)
     */
    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class, 'product_id', 'product_id');
    }

    /**
     * Relación Directa (1:N): Este producto aparece en múltiples Detalles de Órdenes
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'product_id');
    }
}