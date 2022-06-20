<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $fillable = [
        'name',
    ];

    use HasFactory;
    public function trip_governorate()
    {
        return $this->hasMany('App\Models\Trip_Governorate');
    }
    public function trip()
    {
        return $this->hasMany('App\Models\Trip');
    }
    public function place()
    {
        return $this->hasMany('App\Models\Place');
    }
    public function hotel()
    {
        return $this->hasMany('App\Models\Hotel');
    }
}
