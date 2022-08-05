<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    protected $fillable = [
        "to_id", 
        "by_id", 
        "mensaje",
        'status'
    ];


    public function user()
    {
       return $this->belongsTo(User::class,'to_id','id');
    }
    public function userBy()
    {
       return $this->belongsTo(User::class,'by_id','id');
    }
}
