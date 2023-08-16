<?php
namespace App\Repositories\Interfaces;

Interface OrderRepositoryInterface
{
    public function allOrders();
    public function storeOrder($data);
    public function updateOrder($data);
    public function destroyOrder($id);
}
