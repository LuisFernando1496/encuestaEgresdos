<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespUserTemp extends Model
{
    use HasFactory;
    protected $table = "resp_user_temp";
    protected $fillable = [
        'question',
        'answer',
        'total',
    ];
}
