<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\StudentData;
use App\Models\User;


class DashboardController extends Controller
{
    public function index(){

        $verify = User::where('role','student')
        ->whereNull('email_verified_at')
        ->count();

        $hasfile = StudentData::where('status','transferee')
        ->whereHas('student',function($query){
            $query->whereNotNull('email_verified_at');
        })
        ->has('file')
        ->count();

         $hasnofile = StudentData::where('status','transferee')
        ->whereHas('student',function($query){
            $query->whereNotNull('email_verified_at');
        })
        ->doesntHave('file')
        ->count();

        $students = User::with('data')->verified()->where('role','student')->get();
        $count = $students->count();

        $maps = collect($students)->pluck('created_at')->map(function($map){
            return (int)date('Y',strtotime($map));
        });

        $years = $maps->sort()->unique()->values()->toArray();
         $list_years = array_fill_keys($years,0);
        foreach($maps as $key => $value){
            if (array_key_exists($value,$list_years)){
                $list_years[$value] += 1;
            }
        }

        $maps_student_data = collect($students)->map(function($map){
            return $map->data;
        })->pluck('status');
         $status = $maps_student_data->sort()->unique()->values()->toArray();
        $list_status = array_fill_keys($status,0);
        foreach($maps_student_data as $key => $value){
            if (array_key_exists($value,$list_status)){
                $list_status[$value] += 1;
            }
        }



        $keys_status = collect($list_status)->keys();
        $values_status = collect($list_status)->values();


        $keys = collect($list_years)->keys();
        $values = collect($list_years)->values();
        return view('admin.dashboard.index',[
            'line'=>[$keys,$values],
            'bar'=>[$keys_status,$values_status],
            'count'=>$count,
            'student'=>[$verify,$hasfile,$hasnofile]
        ]);
    }
}
