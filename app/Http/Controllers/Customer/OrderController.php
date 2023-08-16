<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function all()
    {
        //
    }

    public function cart()
    {
        $orders = $this->orderRepository->allOrders();

        return view('customer.market.cart', compact('orders'));
    }

    public function cartCreate(Request $request, Product $product)
    {

        if ($request->discount !== null){
            $paymentType = 0;
        }else {
            $paymentType = 1;
        }

        $result = $this->orderRepository->storeOrder([
            'product_id' => $product->id,
            'payment_type' => $paymentType,
            'product_price' => $product->price,
            'order_discount_amount' => $request->discount,
            'order_instalment_amount' => $request->instalment,
            'number' => $request->number,
            'order_total_products_amount' => $request->final_price,
            'order_status' => 1
        ]);

        return redirect()->route('home')->with('toast-success', 'محصول شما با موفقیت به سبد خرید اضافه شد');
    }

}
