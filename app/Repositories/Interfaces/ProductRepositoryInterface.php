<?php

namespace App\Repositories\Interfaces;

Interface ProductRepositoryInterface{
    public function allProducts();
    public function storeProduct($data);
    public function destroyProduct($id);
}
