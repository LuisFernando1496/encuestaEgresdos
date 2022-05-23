<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;
    protected $fillable = [
        'option', 
        'question_id',
        'status',
        'flag_to_complement',
    ];

    public function question()
    {
        return $this->belongsTo(Questions::class,'id','question_id');
    }

}
