<?php

namespace App\Http\Controllers\Teacher\Schedule;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherSchedule;
use App\Models\StudentSchedule;

class ScheduleController extends Controller
{
    public function index(){
        $auth = Auth::id();
        $teacher_show = User::where('id', $auth)
        ->where('role','teacher')
        ->with([
            'detail',
            'teacher_schedules',
            'teacher_schedules.department',
            'teacher_schedules.yearlevel',
            'teacher_schedules.section',
            'teacher_schedules.schedule',
            'teacher_schedules.subject',
            'teacher_schedules'=>function($count){
                $count->withCount(['student_schedule as student_count'],);
            }
            ])
        ->first();
        return view('teacher.schedule.index',['teacher'=>$teacher_show]);
    }

    public function show(TeacherSchedule $schedule){
        $auth = Auth::id();
         $teacherschedule_show = TeacherSchedule::where('id', $schedule->id)
        ->with([
            'subject',
            'department',
            'yearlevel',
            'section',
            'schedule',
            'teacher',
            'student_schedule',
            'student_schedule.academic',
            'student_schedule.academic.detail'
            ])
        ->first();
        abort_if($auth!=$schedule->user_id,404);
        return view('teacher.schedule.show',['teacherschedule'=>$teacherschedule_show]);
    }

    public function ended(TeacherSchedule $teacher){
        TeacherSchedule::where('user_id',$teacher->user_id)->where('id',$teacher->id)->update([
            'status'=>'ended'
        ]);
        StudentSchedule::where('teacher_schedule_id',$teacher->id)->update([
            'status'=>'ended'
        ]);
        return redirect()->back()->with('danger','Schedule has been Ended');
    }
}
