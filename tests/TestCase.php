<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}


// grades           /belongsto student_schedule
// id , student_schedule_id prelim, midterm
// 5	1                   55	66
// 6    1                   80  85


// student_schedule /belongsto teacher_schedule
// id  user_id    teacher_schedule_id, status,
// 1      1		    5	               active
// 3      6		    7	               active


// student_data             /hasone transferee_school
// user_id, status,    transferee_school_id
// 1        transferee    1
// 2        new           0
// 3        old           0


//transferee_school        /hasMany transferee_schedule_taken
//id   name    address    year
//1    BNHS    boquig    2022~2024


//transferee_schedule_taken /belongsto transferee_grades
//id   transferee_school_id      name        year    section     adviser
//1        1                     math 7        7     pataas      Kanlungan
//2        1                     filipino 7    7     pataas      Kanlungan
//3        1                     english 7     7     pataas      Kanlungan

// transferee_grades
// id ,transferee_schedule_id prelim, midterm    final      avg status
// 4	1                     55	    66         80       99  pass


// <tbody >
// @foreach ($teacherschedule->student_schedule as $student)
//    <tr ondblclick="setGrade(event)">
//     <td>{{ $student->detail->lastname.' '.$student->detail->firstname.' , '.$student->detail->middlename }}</td>
//     <td style="border-bottom:none; display:flex; gap:10px; align-items:center; justify-content:center;" id="{{ $student->grade->prelim }}">
//         @if($student->grade->prelim!=null && $student->grade->prelim<=74)
//             <p>{{ $student->grade->prelim }} ( Bagsak )</p>
//         @elseif($student->grade->prelim!=null && $student->grade->prelim<=79)
//             <p>{{ $student->grade->prelim }} ( Sakto )</p>
//         @elseif($student->grade->prelim!=null && $student->grade->prelim<=89)
//             <p>{{ $student->grade->prelim }} ( Katamtaman )</p>
//         @elseif($student->grade->prelim!=null && $student->grade->prelim<=95)
//             <p>{{ $student->grade->prelim }} ( Matalino )</p>
//         @else
//         <p>{{ $student->grade->prelim }}</p>
//         @endif
//     </td>
//     <td id="{{ $student->grade->midterm }}">
//         @if($student->grade->midterm!=null && $student->grade->midterm<=74)
//             <p>{{ $student->grade->midterm }} ( Bagsak )</p>
//         @elseif($student->grade->midterm!=null && $student->grade->midterm<=79)
//             <p>{{ $student->grade->midterm }} ( Sakto )</p>
//         @elseif($student->grade->midterm!=null && $student->grade->midterm<=89)
//             <p>{{ $student->grade->midterm }} ( Katamtaman )</p>
//         @elseif($student->grade->midterm!=null && $student->grade->midterm<=95)
//             <p>{{ $student->grade->midterm }} ( Matalino )</p>
//         @else
//             <p>{{ $student->grade->midterm }}</p>
//         @endif
//     </td>
//     <td id="{{ $student->grade->semi }}">
//         @if($student->grade->semi!=null && $student->grade->semi<=74)
//             <p>{{ $student->grade->semi }} ( Bagsak )</p>
//         @elseif($student->grade->semi!=null && $student->grade->semi<=79)
//             <p>{{ $student->grade->semi }} ( Sakto )</p>
//         @elseif($student->grade->semi!=null && $student->grade->semi<=89)
//             <p>{{ $student->grade->semi }} ( Katamtaman )</p>
//         @elseif($student->grade->semi!=null && $student->grade->semi<=95)
//             <p>{{ $student->grade->semi }} ( Matalino )</p>
//         @else
//             <p>{{ $student->grade->semi }}</p>
//         @endif
//     </td>
//     <td id="{{ $student->grade->final }}">
//         @if($student->grade->final!=null && $student->grade->final<=74)
//             <p>{{ $student->grade->final }} ( Bagsak )</p>
//         @elseif($student->grade->final!=null && $student->grade->final<=79)
//             <p>{{ $student->grade->final }} ( Sakto )</p>
//         @elseif($student->grade->final!=null && $student->grade->final<=89)
//             <p>{{ $student->grade->final }} ( Katamtaman )</p>
//         @elseif($student->grade->final!=null && $student->grade->final<=95)
//             <p>{{ $student->grade->final }} ( Matalino )</p>
//         @else
//             <p>{{ $student->grade->final }}</p>
//         @endif
//     </td>
//     <td id="{{ $student->grade->id }}"><span>
//         @if($student->grade->average!=null && $student->grade->average<=74)
//             <span>{{ number_format($student->grade->average) }} ( Bagsak )</span>
//         @elseif($student->grade->average!=null && $student->grade->average<=79)
//             <span>{{ number_format($student->grade->average) }} ( Sakto )</span>
//         @elseif($student->grade->average!=null && $student->grade->average<=89)
//             <span>{{ number_format($student->grade->average) }} ( Katamtaman )</span>
//         @elseif($student->grade->average!=null && $student->grade->average<=95)
//             <span>{{ number_format($student->grade->average) }} ( Matalino )</span>
//         @else
//             <span>{{ $student->grade->average }}</span>
//         @endif
//     </td>
//     </tr>
// @endforeach
// </tbody>


