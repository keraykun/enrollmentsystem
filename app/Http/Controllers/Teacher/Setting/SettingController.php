<?php

namespace App\Http\Controllers\Teacher\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Details;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{

   public function index(){
        $auth = Auth::id();
        $teacher = User::with(['detail'])->where('id', $auth)->first();
       return view('teacher.setting.index',['teacher'=>$teacher]);
   }

   public function password(Request $request){
        $auth = Auth::id();
        $request->validate([
            'current_password'=>['required', new MatchOldPassword],
            'password'=>['required','confirmed','min:7','max:255'],
        ]);

        User::where('id',$auth)->update([
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->back()->with('success','Password has been Updated');
    }

    public function update(Request $request){
        $auth = Auth::id();
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
        ]);

        Details::where('user_id',$auth)->update([
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

        return redirect()->back()->with('success','Profile has been Updated');

    }
}
