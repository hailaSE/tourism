<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip_Governorate extends Model
{
    protected $fillable = [
        'trip_id',
        'governorate_id',
    ];

    use HasFactory;
    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate','governorate_id');
    }
    public function trip()
    {
        return $this->belongsTo('App\Models\Trip','trip_id');
    }
    public function hotel_trip_governorate()
    {
        return $this->hasMany('App\Models\Hotel_Trip_Governorate');
    }
    public function place_trip_governorate()
    {
        return $this->hasMany('App\Models\Place_Trip_Governorate');
    }
}
