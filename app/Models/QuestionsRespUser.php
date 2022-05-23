<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsRespUser extends Model
{
    use HasFactory;
    protected $table = "question_resp_user";
    protected $fillable = [
        'user_id', 
        'category',
        'question', 
        'answer_num', 
        'answer_text', 
        'answer_other_ specify',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
    
}
