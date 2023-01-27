<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentFile;
use Illuminate\Http\Request;
use App\Models\User;
use Response;
use make;
class StudentFileController extends Controller
{
    public function index(User $student){
        $student = User::where('id',$student->id)
        ->where('role','student')
        ->with(['detail','file'])
        ->verified()
        ->whereHas('data',function($query){
            $query->where('status','transferee');
        })
        ->first();
        abort_if($student==null,404);
      return view('admin.student.file.index',['student'=>$student]);
    }

    public function create(User $student, Request $request){
        $request->validate([
            'file' => ['required','mimes:pdf'],
        ]);
        $imageName = 'Student-File-'.$student->id.'-'.time().'.'.$request->file->extension();
        StudentFile::create([
            'user_id'=>$student->id,
            'name'=>$imageName
        ]);
        $request->file->move(public_path('documents'), $imageName);
        return redirect()->back()->with('success','File has been Uploaded');
    }

    public function show(User $student, StudentFile $file){
        $filePath = public_path('documents/'.$file->name);
        if(file_exists($filePath)){
          return Response::make(file_get_contents($filePath), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline'
           ]);
        }
       abort(404);
    }

    public function destroy(StudentFile $file){
        $filePath = public_path('documents/'.$file->name);
        if(file_exists($filePath)){
           unlink($filePath);
        }
        StudentFile::destroy($file->id);
        return redirect()->back()->with('danger','File has been Deleted');
    }
}
