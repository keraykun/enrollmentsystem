<?php

namespace App\Http\Controllers\Admin\TeacherSchedule;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\YearLevel;
use App\Models\TeacherSchedule;
use App\Models\Schedule;
use App\Models\Section;
use App\Models\Subject;
use App\Models\User;
use App\Models\StudentSchedule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TeacherScheduleController extends Controller
{
    public function index(){
          $teacherschedules = TeacherSchedule::with([
            'subject',
            'department',
            'yearlevel',
            'section',
            'schedule',
            'teacher',
            ])
            ->where('status','active')
            ->withCount(['student_schedule'])->get();
        return view('admin.teacherschedule.index',['teacherschedules'=>$teacherschedules]);
    }

    public function add(){
        $subjects = Subject::all();
        $departments = Department::all();
        $yearlevels = YearLevel::all();
        $sections = Section::all();
        $schedules = Schedule::all();

        return view('admin.teacherschedule.add',[
            'subjects'=>$subjects,
            'departments'=>$departments,
            'yearlevels'=>$yearlevels,
            'sections'=>$sections,
            'schedules'=>$schedules,
        ]);
    }

    public function edit(TeacherSchedule $teacherschedule){

        $subjects = Subject::all();
        $departments = Department::all();
        $yearlevels = YearLevel::all();
        $sections = Section::all();
        $schedules = Schedule::all();

        $teachers = User::where('role','teacher')->with('detail')->get();

        $teacherschedule = TeacherSchedule::where('id',$teacherschedule->id)
        ->with(['subject','department','yearlevel','section','schedule','teacher'])
        ->first();
        return view('admin.teacherschedule.edit',[
            'teacherschedule'=>$teacherschedule,
            'subjects'=>$subjects,
            'departments'=>$departments,
            'yearlevels'=>$yearlevels,
            'sections'=>$sections,
            'schedules'=>$schedules,
            'teachers'=>$teachers,
        ]);
    }

    public function show(TeacherSchedule $teacherschedule){
        //return $teacherschedule;
          $students =  DB::table('users')
        ->select('*','student_academics.id as academic_id','departments.name as department_name','year_levels.name as year_name')
        ->leftJoin('details','details.user_id','=','users.id')
        ->leftJoin('student_academics','users.id','=','student_academics.user_id')
        ->leftJoin('year_levels','student_academics.yearlevel_id','=','year_levels.id')
        ->leftJoin('departments','student_academics.department_id','=','departments.id')
        ->where('student_academics.status','active')
        ->where('yearlevel_id',$teacherschedule->yearlevel_id)
        ->where('department_id',$teacherschedule->department_id)
        ->orderBy('lastname','asc')
        ->get();

         $teacherschedule_show = TeacherSchedule::where('id',$teacherschedule->id)
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
        return view('admin.teacherschedule.show',['teacherschedule'=>$teacherschedule_show,'students'=>$students]);
    }

    public function grade(TeacherSchedule $teacherschedule){

        $teacherschedule_grade = TeacherSchedule::where('id',$teacherschedule->id)
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
       return view('admin.teacherschedule.grade',['teacherschedule'=>$teacherschedule_grade]);
    }

    public function destroy(TeacherSchedule $teacherschedule){
        StudentSchedule::where('teacher_schedule_id',$teacherschedule->id)->delete();
        TeacherSchedule::destroy($teacherschedule->id);
        return redirect()->route('admin.teacherschedule.index')->with('danger','teacherschedule schedule Deleted Added');
    }

    public function update(Request $request, TeacherSchedule $teacherschedule){
        $request->validate([
            'department_id' =>[Rule::unique('teacher_schedules')->where(function ($query) use ($request) {
                return $query
                   ->where('department_id', $request->department_id)
                   ->where('yearlevel_id', $request->yearlevel_id)
                   ->where('section_id', $request->section_id)
                   ->where('schedule_id', $request->schedule_id)
                   ->where('user_id', $request->user_id);
             })],
        ]);

        TeacherSchedule::where('id',$teacherschedule->id)->update([
            'subject_id'=>$request->subject_id,
            'department_id'=>$request->department_id,
            'yearlevel_id'=>$request->yearlevel_id,
            'section_id'=>$request->section_id,
            'schedule_id'=>$request->schedule_id,
            'user_id'=>$request->user_id,
       ]);
       return redirect()->back()->with('success','Updated Successful');
    }

    public function create(Request $request){
        $request->validate([
            'department_id' =>[Rule::unique('teacher_schedules')->where(function ($query) use ($request) {
                return $query
                //    ->where('subject_id', $request->subject_id)
                   ->where('department_id', $request->department_id)
                   ->where('yearlevel_id', $request->yearlevel_id)
                   ->where('section_id', $request->section_id)
                   ->where('schedule_id', $request->schedule_id);
             })],
        ]);

        TeacherSchedule::create([
            'subject_id'=>$request->subject_id,
            'department_id'=>$request->department_id,
            'yearlevel_id'=>$request->yearlevel_id,
            'section_id'=>$request->section_id,
            'schedule_id'=>$request->schedule_id,
            'user_id'=>null,
        ]);

        return redirect()->route('admin.teacherschedule.index')->with('success','teacherschedule New Added');
    }
}
