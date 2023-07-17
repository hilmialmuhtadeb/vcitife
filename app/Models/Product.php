<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'slug', 'thumbnail', 'price', 'discount', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    public function getTakeImageAttribute()
    {
        return '/storage/public/' . $this->thumbnail;
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function getCountAttribute()
    {
        $orders = Order::where('status', '>=', 2)->get();
        $details = Detail::where('product_id', $this->id)->get();

        $i = 0;
        foreach ($details as $detail) {
            foreach ($orders as $order) {
                if ($detail->order_id == $order->id) {
                    $i++;
                }
            }
        }

        return $i;
    }

    public function getRatingCountAttribute()
    {
        $rates = Rating::where('product_id', $this->id);
        return $rates->count();
    }

    public function getRatingAttribute()
    {
        $rates = Rating::where('product_id', $this->id)->get();
        $rateCount = $this->getRatingCountAttribute();

        $sumrate = 0;
        foreach ($rates as $rate) {
            $sumrate += $rate->star;
        }

        return $sumrate / $rateCount;
    }
}
