<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Validation\Rule;

class ScheduleController extends Controller
{
    public function index(){
        $schedules = Schedule::all();
        return view('admin.schedule.index',['schedules'=>$schedules]);
    }

    public function add(){
        return view('admin.schedule.add');
    }

    public function edit(Schedule $schedule){
        $schedule = Schedule::findOrfail($schedule->id);
       return view('admin.schedule.edit',['schedule'=>$schedule]);
    }

    public function update(Request $request, Schedule $schedule){
        $request->validate([
            'start_time'=>['required'],
            'end_time'=>['required'],
            'day' =>['required',Rule::unique('schedules')->where(function ($query) use ($request) {
                return $query->where('day', $request->day)
                   ->where('start_time', $request->start_time)
                   ->where('end_time', $request->end_time);
             })],
        ]);

        Schedule::where('id',$schedule->id)->update([
            'day'=>ucwords($request->day),
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
        ]);
        return redirect()->back()->with('success','Updated Successful');
   }

    public function create(Request $request){

        $request->validate([
            'start_time'=>['required'],
            'end_time'=>['required'],
            'day' =>['required',Rule::unique('schedules')->where(function ($query) use ($request) {
                return $query->where('day', $request->day)
                   ->where('start_time', $request->start_time)
                   ->where('end_time', $request->end_time);
             })],
        ]);

        Schedule::create([
            'day'=>ucwords($request->day),
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
        ]);
        return redirect()->route('admin.schedule.index')->with('success','Schedule New Added');
    }

    public function destroy(Schedule $schedule){
        Schedule::destroy($schedule->id);
        return redirect()->route('admin.schedule.index')->with('danger','Schedule Deleted Added');
   }
}
