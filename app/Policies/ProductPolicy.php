<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determinar si el usuario puede ver los productos.
     */
    public function viewAny(User $user): bool
    {
        return true; // Permite que cualquier usuario vea la lista de productos
    }

    /**
     * Determinar si el usuario puede ver un producto específico.
     */
    public function view(User $user, Product $product): bool
    {
        return true; // Permite que cualquier usuario vea un producto específico
    }

    /**
     * Determinar si el usuario puede crear un nuevo producto.
     */
    public function create(User $user): bool
    {
        return true; // Permite que cualquier usuario cree un nuevo producto
    }

    /**
     * Determinar si el usuario puede editar un producto.
     */
    public function update(User $user, Product $product): bool
    {
        return true; // Permite que cualquier usuario edite un producto
    }

    /**
     * Determinar si el usuario puede eliminar un producto.
     */
    public function delete(User $user, Product $product): bool
    {
        return true; // Permite que cualquier usuario elimine un producto
    }

    /**
     * Determinar si el usuario puede restaurar un producto.
     */
    public function restore(User $user, Product $product): bool
    {
        return true; // Permite que cualquier usuario restaure un producto
    }

    /**
     * Determinar si el usuario puede eliminar permanentemente un producto.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        return false;
    }
}
