<?php

namespace App\Http\Controllers\Teacher\Dashboard;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class DashboardController extends Controller
{
    public function index(){

        $users = User::where('role','teacher')->paginate(5);
        return view('teacher.dashboard.index',['users'=>$users]);
    }

    public function print(){


        $users = User::where('role','student')->limit(10)->get();
        $pdf = Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        return $pdf->loadView('teacher.dashboard.print',compact('users'))->stream();
       // $pdf->download('pdfview.pdf');

        // if($request->has('download'))
        // {
            //  $pdf = PDF::loadView('teacher.dashboard.index',compact('user'));
            // $pdf->download('pdfview.pdf');
        //}
    }
}
