<?php

namespace App\Http\Controllers\Student\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $users = User::where('role','student')->limit(5)->get();
        return view('student.dashboard.index',['users'=>$users]);
    }
}
