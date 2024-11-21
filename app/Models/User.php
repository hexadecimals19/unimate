<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile;
use App\Models\UserContact;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'studentemail',
        'password',
        'studentcollege',
        'studentid',
        'studentgender',
        'studentimage', // Student image field
        'verification_code', // Add verification_code to fillable
        'role',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Override the method used to retrieve the user's email for verification.
     *
     * @return string
     */
    public function getEmailForVerification()
    {
        return $this->studentemail;  // Use 'studentemail' for email verification
    }

    /**
     * Send custom email verification notification.
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\CustomVerifyEmailNotification());
    }

    /**
     * Accessor to get the full URL for the student's image.
     * If no student image is available, return the default image URL.
     *
     * @return string
     */
    public function getStudentImageUrlAttribute()
    {
        return $this->studentimage
            ? Storage::url($this->studentimage)
            : asset('images/default-profile.png');
    }

    /**
     * Define a one-to-one relationship with the Profile model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function reviewsGiven()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    // Reviews received by the user (roommate being reviewed)
    public function reviewsReceived()
    {
        return $this->hasMany(Review::class, 'roommate_id');
    }

    public function contact()
    {
        return $this->hasOne(UserContact::class);
    }
}
