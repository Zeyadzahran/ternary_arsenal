<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $guarded = [];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function fromCountry()
    {
        return $this->belongsTo(Country::class, 'from_country_id');
    }

    public function toCountry()
    {
        return $this->belongsTo(Country::class, 'to_country_id');
    }
    public function discountForCountry($countryId)
    {
        return $this->discounts->firstWhere('to_country_id', $countryId);
    }
    
}