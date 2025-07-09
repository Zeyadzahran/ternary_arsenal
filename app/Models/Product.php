<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    //
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function arsenal()
    {
        return $this->hasMany(Arsenal::class);
    }

}
