<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
            'name' => 'Math',
        ]);
        Subject::create([
            'name' => 'Filipino',
        ]);
        Subject::create([
            'name' => 'Science',
        ]);
        Subject::create([
            'name' => 'Aral Pan',
        ]);
        Subject::create([
            'name' => 'English',
        ]);

        Subject::create([
            'name' => 'TLE',
        ]);
    }
}
