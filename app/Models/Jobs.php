<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_enterprise',
        'market_stall',
        'description',
        'city_origin',
        'workday',
        'phone_number',
        'email',
        'image',
        'status'
    ];
}
