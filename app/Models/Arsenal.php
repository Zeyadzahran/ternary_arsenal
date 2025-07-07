<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsenal extends Model
{
    //
    protected $fillable = ['weapon_id', 'quantity'];
    
    public function weapon()
    {
        return $this->belongsTo(Weapon::class);
    }

}
