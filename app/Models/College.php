<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    protected $fillable = ['collegename', 'collegeimage', 'collegedesc', 'collegetype'];

    public function students()
    {
        return $this->hasMany(User::class);
    }
}
