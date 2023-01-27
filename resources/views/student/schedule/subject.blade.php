@extends('student.layouts.student')
@section('layout')

<div class="row">
    <div class="col-lg-12">
    <div class="col-lg-6">
        <h3 class="page-header">Subject of: <u><span>{{ $student->detail->lastname.' '.$student->detail->middlename.' '.$student->detail->firstname }}</span></u></h3>
        <h4 class="page-header"><span>ID: <u>{{ str_pad($student->id, 10,0, STR_PAD_LEFT); }}</u></span></h4>
        <h4 class="page-header"><span>Department : <u>{{Str::ucfirst( $student->academic->department->name) }}</u></span></h4>
        <h4 class="page-header"><span>Grade : <u>{{Str::ucfirst( $student->academic->year->name) }}</u></span></h4>
        <h4 class="page-header"><span>Academic : <u>{{ $student->academic->start_year.' - '.$student->academic->end_year }}</u></span></h4>
        <h4 class="page-header"><span>Role : </span><span>{{Str::ucfirst( $student->role) }}</span></h4>
    </div>
    <div class="col-lg-6" >
               <img style="float:right; width: 20%" src="{{ asset('images/main/agdaologo.jpg') }}" >
           </div>
    </div>
 </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-md-12">
            <a href="{{ route('student.schedule.subjectprint',['department'=>$student->academic->department->id,'year'=>$student->academic->year->id]) }}" class="btn btn-info"><i class="fa fa-print">Print Subject</i></a>
        </div>
        @foreach ($student->academic->schedules as $schedule)
            <div class="col-lg-4" style="margin:15px 0px;">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px;">
                    <div class="card-header">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Teacher : </span><span>@if($schedule->teacher_schedule->teacher!=null){{ $schedule->teacher_schedule->teacher->lastname.' '.$schedule->teacher_schedule->teacher->middlename.' '.$schedule->teacher_schedule->teacher->firstname }} @endif</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Subject : </span><span>{{ $schedule->teacher_schedule->subject->name }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Subject Code : </span><span>{{ $schedule->teacher_schedule->yearlevel->name }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Department : </span><span>{{ $schedule->teacher_schedule->department->name }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Room Number : </span><span>{{ $schedule->teacher_schedule->section->name }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Schedule : </span><span>{{ $schedule->teacher_schedule->schedule->day }} - {{ date('h:i a',strtotime($schedule->teacher_schedule->schedule->start_time)).' ~ '.date('h:i a',strtotime($schedule->teacher_schedule->schedule->end_time)) }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Status : </span>

                                    @switch($schedule->status)
                                        @case('active')
                                             <span style="color:green">{{ Str::ucfirst($schedule->status) }} </span>
                                            @break
                                        @case('dropped')
                                             <span style="color:red">{{ Str::ucfirst($schedule->status) }} </span>
                                            @break
                                        @default

                                    @endswitch
                                </span>
                            </li>
                            {{-- <li class="list-group-item"><a href="{{ route('student.schedule.room',['teacherschedule'=>$schedule->teacher_schedule->id,'academic'=>$student->academic->id]) }}" class="btn btn-info">View Room</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-12" style="margin-top:20px;">
        <a href="{{ route('student.schedule.index',$student->id) }}" class="btn btn-default">Back</i></a>
     </div>
</div>
@endsection
