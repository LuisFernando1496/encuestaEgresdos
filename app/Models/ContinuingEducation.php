<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContinuingEducation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_courses',
        'fecha_courses',
        'description',
        'place',
        'cel_phone',
        'image',
        'status',
    ];
}
