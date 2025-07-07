<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Weapon extends Model
{
    //
    protected $fillable = ['name', 'model', 'category_id','country_id','price'];

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
