<?php

namespace App\Http\Controllers\Admin\Yearlevel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Yearlevel;
use App\Models\DeletedData;
class YearlevelController extends Controller
{
    public function index(){
        $yearlevels = Yearlevel::all();
        return view('admin.yearlevel.index',['yearlevels'=>$yearlevels]);
    }
    public function add(){
        return view('admin.yearlevel.add');
    }

    public function edit(Yearlevel $yearlevel){
        $yearlevel = Yearlevel::findOrfail($yearlevel->id);
       return view('admin.yearlevel.edit',['yearlevel'=>$yearlevel]);
    }

    public function update(Request $request, Yearlevel $yearlevel){

        $request->validate([
            'yearlevel'=>['required','unique:year_levels,name']
        ]);
        Yearlevel::where('id',$yearlevel->id)->update([
            'name'=>ucfirst($request->yearlevel),
        ]);
        return redirect()->back()->with('success','Updated Successful');
   }

    public function create(Request $request){

        $request->validate([
            'yearlevel'=>['required','unique:year_levels,name']
        ]);

        Yearlevel::create(['name'=>ucfirst($request->yearlevel)]);
        return redirect()->route('admin.yearlevel.index')->with('success','Yearlevel New Added');
    }

    public function destroy(Yearlevel $yearlevel){
        Yearlevel::destroy($yearlevel->id);
        return redirect()->route('admin.yearlevel.index')->with('danger','Yearlevel Deleted Added');
   }
}
