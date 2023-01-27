<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\YearLevel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\User::factory(10)->create();

        $this->call([
            SubjectSeeder::class,
            DepartmentSeeder::class,
            YearLevelSeeder::class,
            RoomSeeder::class,
            StudentSeeder::class,
            ScheduleSeeder::class,
            AdminSeeder::class,
            TeacherSeeder::class,
        ]);
        //$this->call([AdminSeeder::class,TeacherSeeder::class]);
    }
}
