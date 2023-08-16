<?php
namespace App\Repositories;

use App\Models\Customer\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    public function allOrders()
    {
        return Order::where('order_status', 1)->get();
    }

    public function storeOrder($data)
    {
        return Order::create($data);
    }

    public function updateOrder($data)
    {
        $order = Order::find($data['id']);
        $order->update($data);
        return $order;
    }

    public function destroyOrder($id)
    {
        return Order::destroy($id);
    }
}
