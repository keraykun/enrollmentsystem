<?php

namespace App\Http\Controllers\Admin\TeacherSchedule;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\StudentSchedule;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class StudentScheduleController extends Controller
{

    public function create(Request $request){
        $request->validate([
            'teacher_schedule_id'=>['required'],
            'student_academic_id' =>[Rule::unique('student_schedules')->where(function ($query) use ($request) {
                return $query
                ->where('student_academic_id',$request->student_academic_id)
                ->where('teacher_schedule_id', $request->teacher_schedule_id);
            }),'required'],
        ]);

        $student_schedule = StudentSchedule::create([
            'teacher_schedule_id'=>$request->teacher_schedule_id,
            'student_academic_id'=>$request->student_academic_id,
            'status'=>'active'
        ]);

        Grade::create([
            'student_schedule_id'=>$student_schedule->id,
            'prelim'=>null,
            'midterm'=>null,
            'semi'=>null,
            'final'=>null,
        ]);

         return redirect()->back()->with('success','Student Added Successful');
    }

    public function destroy(StudentSchedule $studentschedule){
        StudentSchedule::where($studentschedule->id);
       return redirect()->back()->with('danger','Student has been Removed');
    }

}
