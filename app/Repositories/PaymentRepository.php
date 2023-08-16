<?php
namespace App\Repositories;

use App\Models\Customer\Payment;
use App\Repositories\Interfaces\PaymentRepositoryInterface;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function storePayment($data)
    {
        return Payment::create($data);
    }
}
