@extends('student.layouts.student')
@section('layout')


<div class="row">
    <div class="col-lg-12">
    <div class="col-lg-6">
        <h3 class="page-header">Subject of: <u><span>{{ $student->detail->lastname??''.' '.$student->detail->middlename??''.' '.$student->detail->firstname??'' }}</span></u></h3>
        <h4 class="page-header"><span>ID: <u>{{ str_pad($student->id, 10,0, STR_PAD_LEFT); }}</u></span></h4>
        <h4 class="page-header"><span>Grade : <u>{{Str::ucfirst( $student->academic->year->name??'') }}</u></span></h4>
        <h4 class="page-header"><span>Department : <u>{{Str::ucfirst( $student->academic->department->name??'') }}</u></span></h4>
        <h4 class="page-header"><span>Academic : <u>@if($student->academic!=null){{ $student->academic->start_year.' - '.$student->academic->end_year }} @endif</u></span></h4>
        <h4 class="page-header"><span>Role : </span><span>{{Str::ucfirst( $student->role)??'' }}</span></h4>
    </div>
    <div class="col-lg-6" >
               <img style="float:right; width: 20%" src="{{ asset('images/main/agdaologo.jpg') }}" >
           </div>
           </div>
   		 </div>
            <div class="col-md-12">
                <a href="{{ route('student.schedule.gradeprint',['student'=>$student->id,'department'=>$student->academic->department->id,'year'=>$student->academic->year->id]) }}" class="btn btn-info"><i class="fa fa-print">Print Grade</i></a>
            </div>
    <div class="row" style="margin-top: 30px;">

        <table class="table table-bordered">
            <thead>
              <tr align="center">
                <th scope="col">Teacher</th>
                <th scope="col">Subject</th>
                <th scope="col">Code</th>
                <th scope="col">Prelim</th>
                <th scope="col">Midterm</th>
                <th scope="col">Semi Final</th>
                <th scope="col">Final</th>
                <th scope="col">Average</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($student->academic->schedules as $schedule)
              <tr>
                <td>@if($schedule->teacher_schedule->teacher!=null){{ $schedule->teacher_schedule->teacher->lastname.' '.$schedule->teacher_schedule->teacher->middlename.' '.$schedule->teacher_schedule->teacher->firstname }} @endif</td>
                <td>{{ $schedule->teacher_schedule->subject->name??'' }}</td>
                <td>{{ $schedule->teacher_schedule->yearlevel->name??'' }}</td>
                <td>{{ $schedule->grade->prelim }}</td>
                <td>{{ $schedule->grade->midterm }}</td>
                <td>{{ $schedule->grade->semi }}</td>
                <td>{{ $schedule->grade->final }}</td>
                <td>{{ $schedule->grade->average }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <div class="col-md-12" style="margin-top:20px;">
        <a href="{{ URL::previous() }}" class="btn btn-default">Back</i></a>
     </div>
</div>
@endsection
