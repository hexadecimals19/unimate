<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'roommate_id', 'rating', 'review'];

    // Relationship to the user who posted the review
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship to the roommate being reviewed
    public function roommate()
    {
        return $this->belongsTo(User::class, 'roommate_id');
    }
}
