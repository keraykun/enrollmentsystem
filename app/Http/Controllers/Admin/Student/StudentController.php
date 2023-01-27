<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Details;
use App\Models\StudentAcademic;
use App\Models\StudentData;
use App\Models\User;
use App\Models\YearLevel;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class StudentController extends Controller
{
    public function index(){
         $users = Details::whereHas('user',function($role){
            $role->where('role','student');
        })
        ->with([
            'user.file',
            'user.data',
            'user.academic'=>function($query){
                $query->where('status','active')->latest();
            },
            'user.academic'=>function($query){
                $query->withCount(['schedules'=>function($q){
                    $q->where('status','active');
                }]);
            },
            'user.academic.year',
            'user.academic.department',
            ])
        ->whereHas('user',function($query){
            $query->whereNotNull('email_verified_at');
        })
        ->orderBy('lastname','asc')
        ->get();
        return view('admin.student.index',['users'=>$users]);
    }


    public function verify(){
         $users = Details::whereHas('user',function($role){
            $role->where('role','student')->whereNull('email_verified_at');
        })
        ->with([
            'user.file',
            'user.data',
            'user.academic'=>function($query){
                $query->where('status','active')->latest();
            },
            'user.academic'=>function($query){
                $query->withCount(['schedules'=>function($q){
                    $q->where('status','active');
                }]);
            },
            'user.academic.year',
            'user.academic.department',
            ])
        ->orderBy('lastname','asc')
        ->get();
        return view('admin.student.verify',['users'=>$users]);
    }


    public function verifyemail(User $student){
        User::where('id',$student->id)->update(['email_verified_at'=>now()]);
        return redirect()->route('admin.student.index')->with('success','Email has been Verified');
    }

    public function hasfile(){
        $users = Details::whereHas('user',function($role){
           $role->where('role','student');
       })
       ->whereHas('user',function($query){
        $query->whereNotNull('email_verified_at');
        })
       ->whereHas('student_data',function($query){
            $query->where('status','transferee');
        })
       ->has('file')
       ->with([
           'user.file',
           'user.academic'=>function($query){
               $query->where('status','active')->latest();
           },
           'user.academic'=>function($query){
               $query->withCount(['schedules'=>function($q){
                   $q->where('status','active');
               }]);
           },
           'user.academic.year',
           'user.academic.department',
           ])
       ->orderBy('lastname','asc')
       ->get();
       return view('admin.student.hasfile',['users'=>$users]);
    }

    public function hasnofile(){
            $users = Details::whereHas('user',function($role){
            $role->where('role','student');
        })
        ->whereHas('user',function($query){
            $query->whereNotNull('email_verified_at');
        })
        ->whereHas('student_data',function($query){
            $query->where('status','transferee');
            })
            ->doesntHave('file')
        ->with([
            'user.file',
            'user.data',
            'user.academic'=>function($query){
                $query->where('status','active')->latest();
            },
            'user.academic'=>function($query){
                $query->withCount(['schedules'=>function($q){
                    $q->where('status','active');
                }]);
            },
            'user.academic.year',
            'user.academic.department',
            ])
        ->orderBy('lastname','asc')
        ->get();
        return view('admin.student.hasnofile',['users'=>$users]);
    }

    public function dropped(){
        $users = Details::whereHas('user',function($role){
        $role->where('role','student');
       })
       ->whereHas('user',function($query){
        $query->whereNotNull('email_verified_at');
        })
       ->whereHas('student_data',function($query){
            $query->where('status','dropped');
       })
       ->with([
           'user.file',
           'student_data',
           'user.academic'=>function($query){
               $query->where('status','active');
           },
           'user.academic'=>function($query){
               $query->withCount(['schedules'=>function($q){
                   $q->where('status','active');
               }]);
           },
           'user.academic.year',
           'user.academic.department',
           ])
       ->orderBy('lastname','asc')
       ->get();
       return view('admin.student.dropped',['users'=>$users]);
    }

    public function add(){
        $years = YearLevel::all();
        $departments = Department::all();
        return view('admin.student.add',['years'=>$years,'departments'=>$departments]);

    }

    public function edit(User $student){
        $years = YearLevel::all();
        $departments = Department::all();
        $student = User::with(['detail','academic.year','academic.department','data'])->where('id',$student->id)->first();
        return view('admin.student.edit',['student'=>$student,'years'=>$years,'departments'=>$departments]);

    }

    public function update(User $student, Request $request){
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
            'transferee'=>['required'],
        ]);
        $student = User::with(['detail','data'])->where('id',$student->id)->first();
        StudentData::where('user_id',$student->id)->update([
            'status'=>$request->transferee,
            'transferee_school_id'=>null
        ]);
        Details::where('user_id',$student->id)->update([
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

        StudentAcademic::where('user_id',$student->id)->update([
            'status'=>'active'
        ]);

        return redirect()->back()->with('success','Student has been Updated');

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
            'transferee'=>['required'],
            'year_id'=>['required'],
            'department_id'=>['required'],
            'start_year'=>['required'],
            'end_year'=>['required'],
        ]);
        $user = User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>'student',
            'email_verified_at'=>now(),
            'remember_token' => Str::random(10),
        ]);
        StudentAcademic::create([
            'user_id'=>$user->id,
            'yearlevel_id'=>$request->year_id,
            'department_id'=>$request->department_id,
            'start_year'=>$request->start_year,
            'end_year'=>$request->end_year,
            'status'=>'active'
        ]);
        StudentData::create([
            'user_id'=>$user->id,
            'status'=>$request->transferee,
            'transferee_school_id'=>null
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

       return redirect()->back()->with('success','Student has been Added');
    }

    public function grade(User $student, Department $department, YearLevel $year){
        $student = User::where('id',$student->id)
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
       return view('admin.student.grade',['student'=>$student]);
   }

    public function gradeprint(User $student, Department $department, YearLevel $year){
            $student = User::where('id',$student->id)
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
        return $pdf->loadView('admin.student.gradeprint',compact('student'))->stream();

    }

    public function subject(User $student, Department $department, YearLevel $year){
         $student = User::where('id',$student->id)
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

        return view('admin.student.subject',['student'=>$student]);
    }

    public function subjectprint(User $student, Department $department, YearLevel $year){
        $student = User::where('id',$student->id)
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
        return $pdf->loadView('admin.student.subjectprint',compact('student'))->stream();
       // return view('admin.student.subjectprint',['student'=>$student]);
   }

    public function schedule(User $student){
        $student = User::where('id',$student->id)
       ->where('role','student')
       ->with([
           'detail',
           'academics',
           'academics.year',
           'academics.department',
           'academics.schedules.teacher_schedule.department',
           'academics.schedules.teacher_schedule'])->first();
       return view('admin.student.schedule',['student'=>$student]);
   }

    public function detail(User $student){
        $student = User::where('id',$student->id)
        ->where('role','student')
        ->with(['detail'])
        ->first();
     return view('admin.student.detail',['student'=>$student]);
    }

    public function destroy(User $student){
        User::destroy($student->id);
        return redirect()->back()->with('danger','Student has been Deleted');
   }


}
