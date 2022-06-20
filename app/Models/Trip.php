<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'governorate_id',
        'offer_id',
        'tourist_guide_id',
        'transport_id',
        'name',
        'trip_date',
        'cost',
        'period',
        'cost_after_offer',
    ];
    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate','governorate_id');
    }
    public function offer()
    {
        return $this->belongsTo('App\Models\Governorate','offer_id');
    }
    public function tourist_guide()
    {
        return $this->belongsTo('App\Models\Tourist_Guide','tourist_guide_id');
    }
    public function transport()
    {
        return $this->belongsTo('App\Models\Transport','transport_id');
    }
    public function trip_governorate()
    {
        return $this->hasMany('App\Models\Trip_Governorate');
    }
    public function user_trip()
    {
        return $this->hasMany('App\Models\User_Trip');
    }



    use HasFactory;
}
