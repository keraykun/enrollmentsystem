<?php

namespace App\Http\Controllers\Admin\TeacherSchedule;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function update(Request $request){
        $grades = [];
        foreach($request->grade_id as $key =>$value){
            $prelim = $request->prelim[$key];
            $midterm = $request['midterm'][$key];
            $semi = $request['semi'][$key];
            $finals = $request['finals'][$key];
            $grades[] =
            ['grade_id'=>$value,
            'prelim'=>$prelim,
            'midterm'=>$midterm,
            'semi'=>$semi,
            'finals'=>$finals,
            'average'=>collect([$prelim,$midterm,$semi,$finals])->avg()
         ];
        }

        foreach($grades as $grade){
            Grade::where('id',$grade['grade_id'])->update([
                'prelim'=>$grade['prelim'],
                'midterm'=>$grade['midterm'],
                'semi'=>$grade['semi'],
                'final'=>$grade['finals'],
                'average'=>$grade['average']
            ]);
        }
        return redirect()->back()->with('success','Successfully Grade Updated');
    }
}
