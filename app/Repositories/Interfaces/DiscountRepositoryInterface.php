<?php

namespace App\Repositories\Interfaces;

Interface DiscountRepositoryInterface
{
    public function allDiscounts();
    public function storeDiscount($data);
    public function updateDiscount($data);
    public function destroyDiscount($id);
}
