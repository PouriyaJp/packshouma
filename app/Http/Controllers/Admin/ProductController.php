<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Admin\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->allProducts();

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(ProductRequest $request)
    {
        //dd($request->name);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            //dd($imageName);

            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'images/product/' . $imageName;
            $imageUrl = $request->image->move(public_path('images/product'), $imageName);

            //date fixed
            $realTimestampStart = substr($request->published_at,0 ,10);
            $published_at = date("Y-m-d H:i:s", (int)$realTimestampStart);

            $result = $this->productRepository->storeProduct([
                'name' => $request->name,
                'introduction' => $request->introduction,
                'image' => $imagePath,
                'price' => $request->price,
                'status' => $request->status,
                'published_at' => $request->$published_at
            ]);

            return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول جدید شما با موفقیت ثبت شد');
        } else{
            return redirect()->route('admin.market.product.index')->with('swal-error', 'متاسفانه در هنگام ایجاد محصول خطایی رخ داده است');
        }
    }

    public function destroy(Product $product)
    {
        $this->productRepository->destroyProduct($product->id);

        return redirect()->route('admin.market.product.index')->with('swal-success', 'محصول شما با موفقیت حذف شد');
    }
}

