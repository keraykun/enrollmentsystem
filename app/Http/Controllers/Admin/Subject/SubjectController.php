<?php

namespace App\Http\Controllers\Admin\Subject;

use App\Http\Controllers\Controller;
use App\Models\DeletedData;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('admin.subject.index',['subjects'=>$subjects]);
    }

    public function add(){
        return view('admin.subject.add');
    }

    public function edit(Subject $subject){
        $subject = Subject::findOrfail($subject->id);
       return view('admin.subject.edit',['subject'=>$subject]);
    }

    public function update(Request $request, Subject $subject){

        $request->validate([
            'subject'=>['required','unique:subjects,name']
        ]);
        Subject::where('id',$subject->id)->update([
            'name'=>ucfirst($request->subject),
        ]);
        return redirect()->back()->with('success','Updated Successful');
    }

    public function create(Request $request){

        $request->validate([
            'subject'=>['required','unique:subjects,name']
        ]);

        Subject::create(['name'=>ucfirst($request->subject)]);
        return redirect()->route('admin.subject.index')->with('success','Subject New Added');
    }

    public function destroy(Subject $subject){
        Subject::destroy($subject->id);
        return redirect()->route('admin.subject.index')->with('danger','Subject Deleted Added');
   }
}
