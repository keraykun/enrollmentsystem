<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Details;
use App\Models\StudentData;
use App\Models\StudentAcademic;
use App\Models\YearLevel;
use App\Models\Department;
use App\Models\StudentFile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['logout']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function authenticate(Request $request)
     {
         $credentials = $request->validate([
             'email' => ['required', 'email'],
             'password' => ['required'],
         ]);
         if (Auth::attempt($credentials)) {
             $request->session()->regenerate();
            // if(auth()->user()->deleted===0){
                 return match(auth()->user()->role) {
                     'admin' => to_route('admin.dashboard.index'),
                     'teacher' => to_route('teacher.schedule.index'),
                     'student' => to_route('student.schedule.index')
                  };
            //  }else{
            //      return $this->statusLoginAttemp();
            //  }
         }
         return back()->withErrors([
             'email' => 'The provided credentials do not match our records.',
         ])->onlyInput('email');
     }

     public function statusLoginAttemp(){
         Session::flush();
         Auth::logout();
         return back()->withErrors([
             'email' => 'The Users Data has been Suspended or Deleted, Please contact us.',
         ])->onlyInput('email');

     }

     protected function validators(UserRequest $request)
     {
        return 'validators register';
        $user = User::create([
             'name'=>$request->name,
             'email'=>$request->email,
             'email_verified_at'=>null,
             'role_id'=>$request->role,
             'password'=> Hash::make($request->password),
             'verification_code'=>null,
             'is_verified'=>0
         ]);
         usersState::create([
             'user_id'=>$user->_id,
             'status'=>"active",
         ]);

         event(new Registered($user));
         Auth::login($user);
         return match(auth()->user()->role) {
             'user' => to_route('user.dashboard'),
             'client' => to_route('client.dashboard')
          };
          abort(404);
     }


    public function logout()
    {
         Auth::logout();
         Session::flush();
         return to_route('guest.login');
    }

    public function login()
    {
         return view('login');
    }

    public function index()
    {
        return view('welcome');
    }

    public function contact(){
        return view('contact');
    }

    public function about(){
        return view('about');
    }

    public function department(){
        return view('department');
    }

    public function register(){
        $years = YearLevel::all();
        $departments = Department::all();
        return view('register',['years'=>$years,'departments'=>$departments]);
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
                'student_transferee'=>['required'],
                'year_id'=>['required'],
                'department_id'=>['required'],
                'start_year'=>['required'],
                'end_year'=>['required'],
            ]);

            \DB::transaction(function () use($request){
                $user = User::create([
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'role'=>'student',
                    'email_verified_at'=>null,
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
                    'status'=>$request->student_transferee,
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

                if($request->file!=null && $request->student_transferee=='transferee'){
                    if($request->file->getClientMimeType()==='application/pdf'){
                        $imageName = 'Student-File-'.$user->id.'-'.time().'.'.$request->file->extension();
                        $request->file->move(public_path('documents'), $imageName);
                        StudentFile::create([
                            'user_id'=>$user->id,
                            'name'=>$imageName
                        ]);
                    }
                }
                event(new Registered($user));
                Auth::login($user);
            });
            return match(auth()->user()->role) {
                'student' => to_route('student.schedule.index'),
            };
    }


    public function redirectBack(){
        return redirect()->back();
    }
}
