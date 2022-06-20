<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Of_Place extends Model
{
    protected $fillable = [
        'name',
    ];

    use HasFactory;

    public function place()
    {
        return $this->hasMany('App\Models\Place');
    }
}
