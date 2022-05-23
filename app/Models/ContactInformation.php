<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;
    protected $table = 'contact_information';
    protected $fillable = [
        'enrollment',
        'address',
        'second_email',
        'date_graduate',
        'phone_house',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
