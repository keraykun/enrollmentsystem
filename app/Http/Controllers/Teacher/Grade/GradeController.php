<?php

namespace App\Http\Controllers\Teacher\Grade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherSchedule;

class GradeController extends Controller
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
        return view('teacher.grade.index',['teacher'=>$teacher_show]);
    }

    public function show(TeacherSchedule $schedule){
        $auth = Auth::id();
        $teacherschedule_grade = TeacherSchedule::where('id',$schedule->id)
        ->with([
            'subject',
            'department',
            'yearlevel',
            'section',
            'schedule',
            'teacher',
            'student_schedule',
            'student_schedule.grade',
            'student_schedule.academic.detail',
            ])
       ->first();
       abort_if($auth!=$schedule->user_id,404);
       return view('teacher.grade.show',['teacherschedule'=>$teacherschedule_grade]);
    }

    public function update(Request $request){
        $grades = [];
        foreach($request->grade_id as $key =>$value){
            $prelim = $request->prelim[$key];
            $midterm = $request['midterm'][$key];
            $semi = $request['semi'][$key];
            $finals = $request['finals'][$key];
            $grades[] =
            ['grade_id'=>$value,
            'prelim'=>$prelim,
            'midterm'=>$midterm,
            'semi'=>$semi,
            'finals'=>$finals,
            'average'=>collect([$prelim,$midterm,$semi,$finals])->avg()
         ];
        }

        foreach($grades as $grade){
            Grade::where('id',$grade['grade_id'])->update([
                'prelim'=>$grade['prelim'],
                'midterm'=>$grade['midterm'],
                'semi'=>$grade['semi'],
                'final'=>$grade['finals'],
                'average'=>$grade['average']
            ]);
        }
        return redirect()->back()->with('success','Successfully Grade Updated');
    }
}
