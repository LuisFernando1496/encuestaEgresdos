<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduated extends Model
{
    use HasFactory;
    protected $fillable = [
        'enrollment',
        'date_graduate',
        'phone_house',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
