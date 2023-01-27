<?php

namespace App\Http\Controllers\Admin\Section;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
class SectionController extends Controller
{
    public function index(){
        $sections = Section::all();
        return view('admin.section.index',['sections'=>$sections]);
    }

    public function add(){
        return view('admin.section.add');
    }

    public function edit(Section $section){
       $section = Section::findOrfail($section->id);
       return view('admin.section.edit',['section'=>$section]);
    }

    public function update(Request $request, Section $section){

        $request->validate([
            'section'=>['required','unique:sections,name','integer']
        ]);
        Section::where('id',$section->id)->update([
            'name'=>ucfirst($request->section),
        ]);
        return redirect()->back()->with('success','Updated Successful');
   }

    public function create(Request $request){

        $request->validate([
            'section'=>['required','unique:sections,name','integer']
        ]);

        Section::create(['name'=>ucfirst($request->section)]);
        return redirect()->route('admin.section.index')->with('success','Section New Added');
    }

    public function destroy(Section $section){
        Section::destroy($section->id);


        return redirect()->route('admin.section.index')->with('danger','Section Deleted Added');
   }
}
