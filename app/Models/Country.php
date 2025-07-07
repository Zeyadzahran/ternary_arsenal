<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable = ['name', 'currency', 'team'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function weapons()
    {
        return $this->hasMany(Weapon::class);
    }

}
