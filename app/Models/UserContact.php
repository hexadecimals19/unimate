<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone_number',
        'whatsapp',
        'telegram',
        'facebook_profile',
        'twitter_profile',
        'instagram_profile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
