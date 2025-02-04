<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{

    public function isStock(Product $product, int $quantity): bool
    {
        return $product->stock >= $quantity;
    }
}
