<?php

namespace App\Providers;

use App\Models\Customer\Order;
use App\Repositories\DiscountRepository;
use App\Repositories\InstalmentRepository;
use App\Repositories\Interfaces\DiscountRepositoryInterface;
use App\Repositories\Interfaces\InstalmentRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\PaymentRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(DiscountRepositoryInterface::class, DiscountRepository::class);
        $this->app->bind(InstalmentRepositoryInterface::class, InstalmentRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
    }

    public function boot()
    {
        view()->composer('customer.layouts.header', function ($veiw){
            $orderItems = Order::all();
            $veiw->with('orderItems', $orderItems);
        });
    }
}
