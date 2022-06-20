<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        'id_type_of_place',
        'id_governorate',
        'name',
    ];

    use HasFactory;
    public function type_of_place()
    {
        return $this->belongsTo('App\Models\Type_Of_Place', 'id_type_of_place');
    }
    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate', 'id_governorate');
    }
    public function place_trip_governorate()
    {
        return $this->hasMany('App\Models\Place_Trip_Governorate');
    }


}
