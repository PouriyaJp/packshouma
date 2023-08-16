<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\PaymentRepositoryInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct(PaymentRepositoryInterface $paymentRepository, OrderRepositoryInterface $orderRepository)
    {
        $this->paymentRepository = $paymentRepository;
        $this->orderRepository = $orderRepository;
    }

    public function create(Order $order)
    {

        $result = $this->paymentRepository->storePayment([
            'amount' => $order->order_total_products_amount,
            'status' => 1,
            'type' => $order->payment_type,
        ]);

        $resultOrder = $this->orderRepository->updateOrder([
            'id' => $order->id,
            'payment_id' => $result->id,
            'payment_status' => 1,
            'order_status' => 0
        ]);

        $resultDestroyOrder = $this->orderRepository->destroyOrder($resultOrder->id);

        return redirect()->route('home');
    }

}
