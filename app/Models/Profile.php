<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'bio',
        'nationality',
        'home',
        'age',
        'date_of_birth',
        'interest1',
        'interest2',
        'interest3',
        'lifestyle1',
        'lifestyle2',
        'lifestyle3',
        'pref1',
        'pref2',
        'pref3',
        'pref4',
        'pref5',
        'show_nationality',  // Add this
        'show_home',          // Add this
        'show_age',           // Add this
        'show_date_of_birth', // Add this
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'show_nationality' => 'boolean',
        'show_home' => 'boolean',
        'show_age' => 'boolean',
        'show_date_of_birth' => 'boolean',
    ];


    /**
     * Define an inverse one-to-one relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
