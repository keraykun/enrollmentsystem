<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'name' => '100',
        ]);
        Section::create([
            'name' => '101',
        ]);
        Section::create([
            'name' => '102',
        ]);
        Section::create([
            'name' => '103',
        ]);
        Section::create([
            'name' => '104',
        ]);
        Section::create([
            'name' => '105',
        ]);
    }
}
