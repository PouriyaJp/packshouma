<?php

namespace App\Models\Customer;

use App\Models\Admin\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // productPrice
    public function cartItemProductPrice()
    {
        return $this->product->price;
    }

    // productPrice * (discountPercentage / 100)
    public function cartItemProductDiscount()
    {
        $cartItemProductPrice = $this->cartItemProductPrice();
        $productDiscount = empty($this->product->activeDiscounts()) ? 0 : $cartItemProductPrice * ($this->product->activeDiscounts()->percentage / 100);

        return $productDiscount;
    }

    //number * (productPrice - discountPrice)
    public function cartItemFinalPrice()
    {
        $cartItemProductPrice = $this->cartItemProductPrice();
        $productDiscount = $this->cartItemProductDiscount();

        return $this->number * ($cartItemProductPrice - $productDiscount);
    }

    //number * productDiscount
    public function cartItemFinalDiscount()
    {
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * $productDiscount;
    }
}
