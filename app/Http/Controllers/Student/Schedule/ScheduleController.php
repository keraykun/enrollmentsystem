<?php

namespace App\Http\Controllers\Student\Schedule;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\StudentAcademic;
use App\Models\TeacherSchedule;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Department;
use App\Models\YearLevel;
use Illuminate\Support\Facades\Auth;
class ScheduleController extends Controller
{
    public function index(){
        $auth = Auth::id();
        $student = User::where('id',$auth)
        ->where('role','student')
        ->with([
            'detail',
            'academics',
            'academics.year',
            'academics.department',
            'academics.schedules.teacher_schedule.department',
            'academics.schedules.teacher_schedule'])->first();
        return view('student.schedule.index',['student'=>$student]);
    }

    public function subject(Department $department, YearLevel $year){
        $auth = Auth::id();
        $student = User::where('id',$auth)
       ->where('role','student')
       ->with([
           'detail',
           'academic'=>function($query) use($department,$year){
               return $query->where('department_id',$department->id)
               ->where('yearlevel_id',$year->id);
           },
           'academic.year',
           'academic.department',
           'academic.schedules.teacher_schedule',
           'academic.schedules.teacher_schedule.teacher',
           'academic.schedules.teacher_schedule.subject',
           'academic.schedules.teacher_schedule.yearlevel',
           'academic.schedules.teacher_schedule.department',
           'academic.schedules.teacher_schedule.section',
           'academic.schedules'=>function($schedule)  use($department,$year){
               $schedule->whereHas('teacher_schedule',function($query) use($department,$year){
                   $query->where('department_id',$department->id)
                   ->where('yearlevel_id',$year->id);
               });
           },
           ])
       ->first();
        abort_if($student->academic==null,404);
        abort_if($auth!=$student->academic->user_id,404);
        return view('student.schedule.subject',['student'=>$student]);
   }


    public function subjectprint(Department $department, YearLevel $year){
        $auth = Auth::id();
        $student = User::where('id', $auth)
        ->where('role','student')
        ->with([
            'detail',
            'academic'=>function($query) use($department,$year){
                return $query->where('department_id',$department->id)
                ->where('yearlevel_id',$year->id);
            },
            'academic.year',
            'academic.department',
            'academic.schedules.teacher_schedule',
            'academic.schedules.teacher_schedule.teacher',
            'academic.schedules.teacher_schedule.subject',
            'academic.schedules.teacher_schedule.yearlevel',
            'academic.schedules.teacher_schedule.department',
            'academic.schedules.teacher_schedule.section',
            'academic.schedules'=>function($schedule)  use($department,$year){
                $schedule->whereHas('teacher_schedule',function($query) use($department,$year){
                    $query->where('department_id',$department->id)
                    ->where('yearlevel_id',$year->id);
                });
            },
            ])
        ->first();

        abort_if($student->academic==null,404);

        $customPaper = array(0,0,567.00,1024.80);
        $pdf = PDF::setPaper($customPaper, 'landscape');
        return $pdf->loadView('student.schedule.subjectprint',compact('student'))->stream();
    // return view('student.schedule.subjectprint',['student'=>$student]);
    }

    public function grade(Department $department, YearLevel $year){
        $auth = Auth::id();
        $student = User::where('id',$auth)
       ->where('role','student')
       ->with([
           'detail',
           'academic'=>function($query) use($department,$year){
               return $query->where('department_id',$department->id)
               ->where('yearlevel_id',$year->id);
           },
           'academic.year',
           'academic.department',
           'academic.schedules.grade',
           'academic.schedules.teacher_schedule',
           'academic.schedules.teacher_schedule.teacher',
           'academic.schedules.teacher_schedule.subject',
           'academic.schedules.teacher_schedule.yearlevel',
           'academic.schedules.teacher_schedule.department',
           'academic.schedules.teacher_schedule.section',
           'academic.schedules'=>function($schedule)  use($department,$year){
               $schedule->whereHas('teacher_schedule',function($query) use($department,$year){
                   $query->where('department_id',$department->id)
                   ->where('yearlevel_id',$year->id);
               });
           },
           ])
       ->first();

        abort_if($student->academic==null,404);
       return view('student.schedule.grade',['student'=>$student]);
   }

    public function gradeprint(Department $department, YearLevel $year){
        $auth = Auth::id();
        $student = User::where('id',$auth)
        ->where('role','student')
        ->with([
            'detail',
            'academic'=>function($query) use($department,$year){
                return $query->where('department_id',$department->id)
                ->where('yearlevel_id',$year->id);
            },
            'academic.year',
            'academic.department',
            'academic.schedules.grade',
            'academic.schedules.teacher_schedule',
            'academic.schedules.teacher_schedule.teacher',
            'academic.schedules.teacher_schedule.subject',
            'academic.schedules.teacher_schedule.yearlevel',
            'academic.schedules.teacher_schedule.department',
            'academic.schedules.teacher_schedule.section',
            'academic.schedules'=>function($schedule)  use($department,$year){
                $schedule->whereHas('teacher_schedule',function($query) use($department,$year){
                    $query->where('department_id',$department->id)
                    ->where('yearlevel_id',$year->id);
                });
            },
            ])
        ->first();

        abort_if($student->academic==null,404);
        $customPaper = array(0,0,567.00,1024.80);
        $pdf = PDF::setPaper($customPaper, 'landscape');
        return $pdf->loadView('student.schedule.gradeprint',compact('student'))->stream();

    }


}
