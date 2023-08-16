<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->allProducts();

        return view('customer.index', compact('products'));
    }
}
