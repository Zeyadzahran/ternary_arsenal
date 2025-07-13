<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
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
    public function discount()
    {
        return $this->hasOne(Discount::class);
    }
        public function getIsSameCountryAttribute()
    {
        $user = auth()->user();
        return $user && $user->country_id === $this->country_id;
    }

    public function getIsSameTeamAttribute()
    {
        $user = auth()->user();
        $userTeam = $user?->country?->team;

        return $user && $user->role === 'admin' && $userTeam && $this->country && $this->country->team === $userTeam;
    }

    public function getFinalPriceAttribute()
    {
        if ($this->discount && ($this->is_same_country || $this->is_same_team)) {
            return $this->discount->discounted_price;
        }

        return $this->price;
    }



}
