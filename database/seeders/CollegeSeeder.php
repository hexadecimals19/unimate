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
            'collegedesc' => 'A premier institution for engineering studies.',
            'collegetype' => 2, // Female college
        ]);

        College::create([
            'collegename' => 'Melati',
            'collegeimage' => 'images/melatiLogo.png',
            'collegedesc' => 'A top-ranked school for business and management.',
            'collegetype' => 2, // Female college
        ]);

        College::create([
            'collegename' => 'Seroja',
            'collegeimage' => 'images/serojaLogo.jpg',
            'collegedesc' => 'Dedicated to the arts and humanities.',
            'collegetype' => 2, // Female college
        ]);

        College::create([
            'collegename' => 'Teratai',
            'collegeimage' => 'images/terataiLogo.jpg',
            'collegedesc' => 'A premier institution for engineering studies.',
            'collegetype' => 1, // Male college
        ]);

        College::create([
            'collegename' => 'Delima',
            'collegeimage' => 'images/delimaLogo.png',
            'collegedesc' => 'A top-ranked school for business and management.',
            'collegetype' => 1, // Male college
        ]);

        College::create([
            'collegename' => 'Perindu',
            'collegeimage' => 'images/perinduLogo.png',
            'collegedesc' => 'Dedicated to the arts and humanities.',
            'collegetype' => 1, // Male college
        ]);

        College::create([
            'collegename' => 'Meranti',
            'collegeimage' => 'images/merantiLogo.jpg',
            'collegedesc' => 'Dedicated to the arts and humanities.',
            'collegetype' => 1, // Male college
        ]);
    }
}
