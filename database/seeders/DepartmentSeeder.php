<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Elementary',
        ]);
        Department::create([
            'name' => 'Junior High School',
        ]);
        Department::create([
            'name' => 'Senior High School',
        ]);
    }
}
