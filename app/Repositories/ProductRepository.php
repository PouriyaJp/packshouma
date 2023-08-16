<?php
namespace App\Repositories;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Admin\Product;

class ProductRepository implements ProductRepositoryInterface
{

    public function allProducts()
    {
        return Product::all();
    }

    public function storeProduct($data)
    {
        return Product::create($data);
    }

    public function destroyProduct($id)
    {
        return Product::destroy($id);
    }
}
