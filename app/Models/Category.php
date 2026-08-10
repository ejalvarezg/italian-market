<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    public $timestamps = false;
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'parent_id',
        'name',
    ];

    /**
     * Relación Recursiva: Esta categoría pertenece a una categoría "Padre"
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id', 'category_id');
    }

    /**
     * Relación Recursiva: Esta categoría tiene muchas Subcategorías "Hijas"
     */
    public function subcategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id', 'category_id');
    }

    /**
     * Relación: Una categoría tiene muchos Productos (1:N)
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
}