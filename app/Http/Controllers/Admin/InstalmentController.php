<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InstalmentRequest;
use App\Models\Admin\Instalment;
use App\Repositories\Interfaces\InstalmentRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class InstalmentController extends Controller
{
    public function __construct(InstalmentRepositoryInterface $instalmentRepository, ProductRepositoryInterface $productRepository)
    {
        $this->instalmentRepository = $instalmentRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $instalments = $this->instalmentRepository->allInstalments();

        return view('admin.discount.instalment', compact('instalments'));
    }

    public function create()
    {
        $products = $this->productRepository->allProducts();

        return view('admin.discount.instalment-create', compact('products'));
    }

    public function store(InstalmentRequest $request)
    {
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $start_date = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date, 0, 10);
        $end_date = date("Y-m-d H:i:s", (int)$realTimestampEnd);

        $this->instalmentRepository->storeInstalment([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'percentage' => $request->percentage,
            'instalment_type' => $request->instalment_type,
            'status' => $request->status,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);

        return redirect()->route('admin.market.buy.instalment')->with('swal-success', 'قسط جدید شما با موفقیت ثبت شد');
    }

    public function edit(Instalment $instalment)
    {
        $products = $this->productRepository->allProducts();

        return view('admin.discount.instalment-edit', compact('instalment', 'products'));
    }

    public function update(InstalmentRequest $request, Instalment $instalment)
    {
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $start_date = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date, 0, 10);
        $end_date = date("Y-m-d H:i:s", (int)$realTimestampEnd);

        $result = $this->instalmentRepository->updateInstalment([
            'id' => $instalment->id,
            'product_id' => $request->product_id,
            'name' => $request->name,
            'percentage' => $request->percentage,
            'instalment_type' => $request->instalment_type,
            'status' => $request->status,
            'start_date' => $start_date,
            'end_date' => $end_date
        ]);

        return redirect()->route('admin.market.buy.instalment')->with('swal-success', 'قسط جدید شما با موفقیت ویرایش شد');
    }

    public function destroy(Instalment $instalment)
    {
        $result = $this->instalmentRepository->destroyInstalment($instalment->id);

        return redirect()->route('admin.market.buy.instalment')->with('swal-success', 'قسط جدید شما با موفقیت حذف شد');
    }
}
