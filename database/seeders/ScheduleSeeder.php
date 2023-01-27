<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'day' => 'M',
            'start_time'=>date('H:i',strtotime('8:00')),
            'end_time'=>date('H:i',strtotime('10:00'))
        ]);
        Schedule::create([
            'day' => 'M',
            'start_time'=>date('H:i',strtotime('10:00')),
            'end_time'=>date('H:i',strtotime('12:00'))
        ]);
        Schedule::create([
            'day' => 'M',
            'start_time'=>date('H:i',strtotime('13:00')),
            'end_time'=>date('H:i',strtotime('15:00'))
        ]);
        Schedule::create([
            'day' => 'M',
            'start_time'=>date('H:i',strtotime('15:00')),
            'end_time'=>date('H:i',strtotime('17:00'))
        ]);

        Schedule::create([
            'day' => 'T',
            'start_time'=>date('H:i',strtotime('8:00')),
            'end_time'=>date('H:i',strtotime('10:00'))
        ]);
        Schedule::create([
            'day' => 'T',
            'start_time'=>date('H:i',strtotime('10:00')),
            'end_time'=>date('H:i',strtotime('12:00'))
        ]);
        Schedule::create([
            'day' => 'T',
            'start_time'=>date('H:i',strtotime('13:00')),
            'end_time'=>date('H:i',strtotime('15:00'))
        ]);
        Schedule::create([
            'day' => 'T',
            'start_time'=>date('H:i',strtotime('15:00')),
            'end_time'=>date('H:i',strtotime('17:00'))
        ]);


        Schedule::create([
            'day' => 'W',
            'start_time'=>date('H:i',strtotime('8:00')),
            'end_time'=>date('H:i',strtotime('10:00'))
        ]);
        Schedule::create([
            'day' => 'W',
            'start_time'=>date('H:i',strtotime('10:00')),
            'end_time'=>date('H:i',strtotime('12:00'))
        ]);
        Schedule::create([
            'day' => 'W',
            'start_time'=>date('H:i',strtotime('13:00')),
            'end_time'=>date('H:i',strtotime('15:00'))
        ]);
        Schedule::create([
            'day' => 'W',
            'start_time'=>date('H:i',strtotime('15:00')),
            'end_time'=>date('H:i',strtotime('17:00'))
        ]);


        Schedule::create([
            'day' => 'TH',
            'start_time'=>date('H:i',strtotime('8:00')),
            'end_time'=>date('H:i',strtotime('10:00'))
        ]);
        Schedule::create([
            'day' => 'TH',
            'start_time'=>date('H:i',strtotime('10:00')),
            'end_time'=>date('H:i',strtotime('12:00'))
        ]);
        Schedule::create([
            'day' => 'F',
            'start_time'=>date('H:i',strtotime('13:00')),
            'end_time'=>date('H:i',strtotime('15:00'))
        ]);
        Schedule::create([
            'day' => 'F',
            'start_time'=>date('H:i',strtotime('15:00')),
            'end_time'=>date('H:i',strtotime('17:00'))
        ]);

        Schedule::create([
            'day' => 'F',
            'start_time'=>date('H:i',strtotime('8:00')),
            'end_time'=>date('H:i',strtotime('10:00'))
        ]);
        Schedule::create([
            'day' => 'F',
            'start_time'=>date('H:i',strtotime('10:00')),
            'end_time'=>date('H:i',strtotime('12:00'))
        ]);
        Schedule::create([
            'day' => 'F',
            'start_time'=>date('H:i',strtotime('13:00')),
            'end_time'=>date('H:i',strtotime('15:00'))
        ]);
        Schedule::create([
            'day' => 'F',
            'start_time'=>date('H:i',strtotime('15:00')),
            'end_time'=>date('H:i',strtotime('17:00'))
        ]);

    }
}
