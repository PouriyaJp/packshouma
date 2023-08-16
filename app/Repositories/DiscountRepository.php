<?php
namespace App\Repositories;

use App\Models\Admin\Discount;
use App\Repositories\Interfaces\DiscountRepositoryInterface;

class DiscountRepository implements DiscountRepositoryInterface
{
    public function allDiscounts()
    {
        return Discount::all();
    }

    public function storeDiscount($data)
    {
        return Discount::create($data);
    }

    public function updateDiscount($data)
    {
        $discount = Discount::find($data['id']);
        $discount->update($data);
        return $discount;
    }

    public function destroyDiscount($id)
    {
        return Discount::destroy($id);
    }
}
