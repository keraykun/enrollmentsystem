<?php

namespace App\Http\Controllers\Admin\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\TeacherSchedule;
class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('admin.department.index',['departments'=>$departments]);
    }
    public function add(){
        return view('admin.department.add');
    }

    public function edit(Department $department){
        $department = Department::findOrfail($department->id);
       return view('admin.department.edit',['department'=>$department]);
    }

    public function update(Request $request, Department $department){

        $request->validate([
            'department'=>['required','unique:departments,name']
        ]);
        Department::where('id',$department->id)->update([
            'name'=>ucfirst($request->department),
        ]);
        return redirect()->back()->with('success','Updated Successful');
   }

    public function create(Request $request){

        $request->validate([
            'department'=>['required','unique:departments,name']
        ]);

        Department::create(['name'=>$request->department]);
        return redirect()->route('admin.department.index')->with('success','Department New Added');
    }

    public function destroy(Department $department){
        Department::destroy($department->id);
        return redirect()->route('admin.department.index')->with('danger','Department Deleted Added');
   }
}
