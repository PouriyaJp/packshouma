<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'introduction', 'image', 'status', 'price', 'published_at'];

    public function discounts()
    {
        return $this->hasMany(Discount::class);

    }

    public function instalments()
    {
        return $this->hasMany(Instalment::class);

    }

    public function activeInstalments()
    {
        return $this->instalments()->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->first();
    }

    public function activeDiscounts()
    {
        return $this->discounts()->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->first();
    }


}
