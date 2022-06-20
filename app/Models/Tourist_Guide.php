<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourist_Guide extends Model
{
    protected $fillable = [
        'name',
        'phoneNumber',
        'evaluation',
    ];

    use HasFactory;
    public function trip()
    {
        return $this->hasMany('App\Models\Trip');
    }
}
