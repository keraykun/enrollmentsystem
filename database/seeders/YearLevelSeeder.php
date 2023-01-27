<?php

namespace Database\Seeders;

use App\Models\YearLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        YearLevel::create([
            'name' => 'SHS 7',
        ]);
        YearLevel::create([
            'name' => 'SHS 8',
        ]);
        YearLevel::create([
            'name' => 'SHS 9',
        ]);
        YearLevel::create([
            'name' => 'SHS 10',
        ]);
        YearLevel::create([
            'name' => 'SHS 11',
        ]);
    }
}
