<?php

// app/Models/RoommateApplication.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoommateApplication extends Model
{
    use HasFactory;

    protected $fillable = ['applicant_id', 'roommate_id', 'status'];

    // Define relationships
    public function applicant()
    {
        return $this->belongsTo(User::class, 'applicant_id');
    }

    public function roommate()
    {
        return $this->belongsTo(User::class, 'roommate_id');
    }

    public function applicationsSent()
    {
        return $this->hasMany(RoommateApplication::class, 'applicant_id');
    }

    // Applications received by this user
    public function applicationsReceived()
    {
        return $this->hasMany(RoommateApplication::class, 'roommate_id');
    }


}
