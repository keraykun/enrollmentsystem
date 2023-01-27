<?php

namespace App\Http\Controllers\Admin\Student;

use App\Models\User;
use App\Models\Department;
use App\Models\YearLevel;
use App\Models\StudentAcademic;
use App\Http\Controllers\Controller;
use App\Models\StudentSchedule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AcademicController extends Controller
{
    public function create(Request $request){
        if (StudentAcademic::where('user_id',$request->user_id)->where('status','active')->exists()) {
            return redirect()->back()->withErrors(['exist_schedule' => "You can't create another Academic there is still on going Active or Try to clean your Delete history"]);
        }
       $request->validate([
           'year_id'=>['required'],
           'department_id'=>['required'],
           'start_year'=>['required'],
           'end_year'=>['required'],
           'user_id' =>[Rule::unique('student_academics')->where(function ($query) use ($request) {
               return $query
                  ->where('department_id', $request->department_id)
                  ->where('yearlevel_id', $request->year_id)
                  ->where('user_id', $request->user_id);
            })],
       ]);
       StudentAcademic::create([
           'user_id'=>$request->user_id,
           'yearlevel_id'=>$request->year_id,
           'department_id'=>$request->department_id,
           'start_year'=>$request->start_year,
           'end_year'=>$request->end_year,
           'status'=>'active'
       ]);
       return redirect()->route('admin.student.schedule',$request->user_id)->with('success','Academic has been Added');
    }

    public function show(User $student){
       $student = User::where('id',$student->id)->verified()->with('detail')->first();
       $years = YearLevel::all();
       $departments = Department::all();

       return view('admin.student.academic',[
           'student'=>$student,
           'departments'=>$departments,
           'years'=>$years
       ]);
    }

    public function destroy(StudentAcademic $academic){
        StudentAcademic::destroy($academic->id);
        StudentSchedule::where('student_academic_id',$academic->id)->delete();
        return redirect()->back()->with('danger','Academic has been Deleted');
    }

    public function update(User $student, StudentAcademic $academic){

        StudentAcademic::where('user_id',$student->id)->where('id',$academic->id)->update([
            'status'=>'ended'
        ]);

        StudentSchedule::where('student_academic_id',$academic->id)->update([
            'status'=>'ended'
        ]);
        return redirect()->back()->with('danger','Academic has been Ended');
    }
}
