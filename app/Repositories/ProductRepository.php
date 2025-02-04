<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function find(int $productId): ?Product
    {
        return Product::find($productId);
    }
}
