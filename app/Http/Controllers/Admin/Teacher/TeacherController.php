<?php

namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Details;
use App\Models\StudentSchedule;
use App\Models\TeacherLRN;
use App\Models\TeacherSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function index(){
         $users = User::where('role','teacher')->join('details','details.user_id','=','users.id')
         ->orderBy('details.lastname')
         ->with(['detail','lrn'])
         ->withCount(['teacher_schedules as count'=>function($query){
             $query->where('status','active');
         }])
         ->get();
        return view('admin.teacher.index',['users'=>$users]);
     }

     public function add(){
        return view('admin.teacher.add');

    }

    public function edit(User $teacher){
          $teacher = User::with(['detail','lrn'])->where('id',$teacher->id)->first();
        return view('admin.teacher.edit',['teacher'=>$teacher]);

    }

    public function update(User $teacher, Request $request){

        $request->validate([
            'firstname'=>['required'],
            'middlename'=>['required'],
            'lastname'=>['required'],
            'contact'=>['required','digits_between:11,11'],
            'gender'=>['required'],
            'status'=>['required'],
            'birthdate'=>['required'],
            'birthdate_place'=>['required','min:10','max:255'],
            'religion'=>['required'],
            'address'=>['required'],
            'street'=>['required'],
            'city'=>['required'],
            'province'=>['required'],
            'nationality'=>['required'],
            'lrn'=>['required','min:12']
        ]);
        $teacher = User::with(['detail','data'])->where('id',$teacher->id)->first();


        Details::where('user_id',$teacher->id)->update([
            'firstname'=>$request->firstname,
            'middlename'=>$request->middlename,
            'lastname'=>$request->lastname,
            'contact'=>$request->contact,
            'birthdate'=>$request->birthdate,
            'birthdate_place'=>$request->birthdate_place,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'street'=>$request->street,
            'city'=>$request->city,
            'province'=>$request->province,
            'nationality'=>$request->nationality,
            'religion'=>$request->religion,
            'status'=>$request->status,
        ]);

        TeacherLRN::where('user_id',$teacher->id)->update([
            'name'=>$request->lrn
        ]);

        User::where('id',$teacher->id)->update([
            'role'=>$request->role,
        ]);

        return redirect()->back()->with('success','Teacher has been Updated');

    }

    public function create(Request $request){
        $request->validate([
            'email'=>['required','min:5','max:255','unique:users,email'],
            'password'=>['required','confirmed','min:5','max:255'],
            'firstname'=>['required'],
            'middlename'=>['required'],
            'lastname'=>['required'],
            'contact'=>['required','digits_between:11,11'],
            'gender'=>['required'],
            'status'=>['required'],
            'birthdate'=>['required'],
            'birthdate_place'=>['required','min:10','max:255'],
            'religion'=>['required'],
            'address'=>['required'],
            'street'=>['required'],
            'city'=>['required'],
            'province'=>['required'],
            'nationality'=>['required'],
            'lrn'=>['required','min:12'],
        ]);

       \DB::transaction(function () use($request){
            $user = User::create([
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=>$request->role,
                'email_verified_at'=>now(),
                'remember_token' => Str::random(10),
            ]);
            TeacherLRN::create([
                'user_id'=>$user->id,
                'name'=>$request->lrn
            ]);
            Details::create([
                'user_id'=>$user->id,
                'firstname'=>$request->firstname,
                'middlename'=>$request->middlename,
                'lastname'=>$request->lastname,
                'contact'=>$request->contact,
                'birthdate'=>$request->birthdate,
                'birthdate_place'=>$request->birthdate_place,
                'gender'=>$request->gender,
                'address'=>$request->address,
                'street'=>$request->street,
                'city'=>$request->city,
                'province'=>$request->province,
                'nationality'=>$request->nationality,
                'religion'=>$request->religion,
                'status'=>$request->status,
            ]);
        });

       return redirect()->back()->with('success','Teacher has been Added');
    }

    public function schedule(User $teacher){

        $teacher_show = User::where('id',$teacher->id)
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
        return view('admin.teacher.schedule',['teacher'=>$teacher_show]);
     }

     public function detail(User $teacher){
         $student = User::where('id',$teacher->id)
        ->where('role','teacher')
        ->with(['detail'])
        ->first();
     return view('admin.teacher.detail',['student'=>$student]);
    }

    public function destroy(User $teacher){
        User::destroy($teacher->id);
        return redirect()->back()->with('danger','Teacher has been Deleted');
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
