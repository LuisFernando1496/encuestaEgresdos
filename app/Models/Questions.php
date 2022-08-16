<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = [
        'question', 
        'category_question_id',
        'question_id',
        'alias',
        'status',
    ];

    public function categoryQuestion()
    {
        return $this->belongsTo(CategoryQuestions::class,'category_question_id');
    }
    public function subQuestion()
    {
        return $this->hasMany(Questions::class,'question_id','id');
    }
    public function answers()
    {
        return $this->hasMany(Answers::class,'question_id');
    }
}
