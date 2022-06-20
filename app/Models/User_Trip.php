<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Trip extends Model
{
    protected $fillable = [
        'user_id',
        'trip_id',
    ];

    use HasFactory;
    public function trip()
    {
        return $this->belongsTo('App\Models\Trip','trip_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}
