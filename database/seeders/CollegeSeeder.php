<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\College;

class CollegeSeeder extends Seeder
{
    public function run()
    {
        College::create([
            'collegename' => 'Mawar',
            'collegeimage' => 'images/mawarLogo.png',
            'collegedesc' => 'Female College',
            'collegetype' => 2, // Female college
        ]);

        College::create([
            'collegename' => 'Melati',
            'collegeimage' => 'images/melatiLogo.png',
            'collegedesc' => 'Female College',
            'collegetype' => 2, // Female college
        ]);

        College::create([
            'collegename' => 'Seroja',
            'collegeimage' => 'images/serojaLogo.jpg',
            'collegedesc' => 'Female College',
            'collegetype' => 2, // Female college
        ]);

        College::create([
            'collegename' => 'Anggerik',
            'collegeimage' => 'images/anggerikLogo.png',
            'collegedesc' => 'Female College',
            'collegetype' => 2, // Female college
        ]);

        College::create([
            'collegename' => 'Teratai',
            'collegeimage' => 'images/terataiLogo.jpg',
            'collegedesc' => 'Male College',
            'collegetype' => 1, // Male college
        ]);

        College::create([
            'collegename' => 'Delima',
            'collegeimage' => 'images/delimaLogo.png',
            'collegedesc' => 'Male College',
            'collegetype' => 1, // Male college
        ]);

        College::create([
            'collegename' => 'Perindu',
            'collegeimage' => 'images/perinduLogo.png',
            'collegedesc' => 'Male College',
            'collegetype' => 1, // Male college
        ]);

        College::create([
            'collegename' => 'Meranti',
            'collegeimage' => 'images/merantiLogo.jpg',
            'collegedesc' => 'Male College',
            'collegetype' => 1, // Male college
        ]);
    }
}
