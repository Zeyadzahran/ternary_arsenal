<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = ['product_id', 'user_id', 'discount_amount','discounted_price'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
