<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DiscountRequest;
use App\Models\Admin\Discount;
use App\Models\Admin\Product;
use App\Repositories\Interfaces\DiscountRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function __construct(DiscountRepositoryInterface $discountRepository, ProductRepositoryInterface $productRepository)
    {
        $this->discountRepository = $discountRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $discounts = $this->discountRepository->allDiscounts();

        return view('admin.discount.discount', compact('discounts'));
    }

    public function create()
    {
        $products = $this->productRepository->allProducts();

        return view('admin.discount.discount-create', compact('products'));
    }

    public function store(DiscountRequest $request)
    {

        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $start_date = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date, 0, 10);
        $end_date = date("Y-m-d H:i:s", (int)$realTimestampEnd);

        $result = $this->discountRepository->storeDiscount([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'percentage' => $request->percentage,
            'status' => $request->status,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);

        return redirect()->route('admin.market.offer.discount')->with('swal-success', 'تخفیف جدید شما با موفقیت ثبت شد');
    }

    public function edit(Discount $discount)
    {
        $products = $this->productRepository->allProducts();

        return view('admin.discount.discount-edit', compact('products', 'discount'));
    }

    public function update(DiscountRequest $request, Discount $discount)
    {
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $start_date = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date, 0, 10);
        $end_date = date("Y-m-d H:i:s", (int)$realTimestampEnd);

        $result = $this->discountRepository->updateDiscount([
            'id' => $discount->id,
            'product_id' => $request->product_id,
            'name' => $request->name,
            'percentage' => $request->percentage,
            'status' => $request->status,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);

        return redirect()->route('admin.market.offer.discount')->with('swal-success', 'تخفیف جدید شما با موفقیت ویرایش شد');
    }

    public function destroy(Discount $discount)
    {
        $result = $this->discountRepository->destroyDiscount($discount->id);

        return redirect()->route('admin.market.offer.discount')->with('swal-success', 'تخفیف جدید شما با موفقیت حذف شد');
    }
}
