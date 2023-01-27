@extends('student.layouts.student')
@section('layout')

    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Schedule of: <u><span>{{ $student->detail->lastname.' '.$student->detail->middlename.' '.$student->detail->firstname }}</span></u></h1>
            <h2 class="page-header"><span>ID NO: <u>{{ str_pad($student->id, 10,0, STR_PAD_LEFT); }}</u></span></h2>
            <h2 class="page-header"><span>Role : </span><span>{{Str::ucfirst( $student->role) }}</span></h2>
        </div>
        <div class="col-lg-6" >
            <img style="float:right; width: 20%" src="{{ asset('images/main/agdaologo.jpg') }}" >
        </div>
    </div>
    <div class="row" style="margin-top: 30px;">
        @foreach ($student->academics as $academic)
        @switch($academic->status)
        @case('active')
            <div class="col-lg-4" style="margin:15px 0px;">
                <div class="card" style="box-shadow: rgba(4, 144, 55, 0.703) 0px 3px 8px; padding:10px;">
                    <div class="card-header">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Year : </span><span>{{ $academic->year->name??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Department : </span><span>{{ $academic->department->name??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Academic : </span><span>{{ date('Y',strtotime($academic->start_year))  }} - {{ date('Y',strtotime($academic->end_year)) }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Subjects :  </span><span>{{ $academic->schedules->count()??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Status : </span>
                              <span style="color:green;"> {{ ucfirst( $academic->status) }}</span>
                            </li>
                            <li class="list-group-item" style="display: flex; justify-content:space-between">
                              <div style="display:flex; gap:10px;">
                                <a href="{{ route('student.schedule.subject',['department'=>$academic->department->id,'year'=>$academic->year->id]) }}" class="btn btn-info">View Schedule</a>
                                <a href="{{ route('student.schedule.grade',['department'=>$academic->department->id,'year'=>$academic->year->id]) }}" class="btn btn-info">View Grade</a>
                              </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @break;
        @case('ended')
            <div class="col-lg-4 " style="margin:15px 0px;">
                <div class="card ended-subject" style="box-shadow: rgb(205, 90, 94) 0px 3px 8px; padding:10px; opacity:0.6;">
                    <div class="card-header"  style="margin:10px 0px; display:flex; justify-content:center;">
                        <p style="color:red;">Term Ended</p>
                    </div>
                    <div class="card-header ">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Year : </span><span>{{ $academic->year->name }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Department : </span><span>{{ $academic->department->name }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Academic : </span><span>{{ date('Y',strtotime($academic->start_year))  }} - {{ date('Y',strtotime($academic->end_year)) }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Subjects :  </span><span>{{ $academic->schedules->count() }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Status : </span>
                                <span style="color:red;"> {{ ucfirst( $academic->status) }}</span>
                            </li>
                            <li class="list-group-item" style="display: flex; justify-content:space-between">
                                <div style="display:flex; gap:10px;">
                                    <a href="{{ route('student.schedule.subject',['department'=>$academic->department->id,'year'=>$academic->year->id]) }}" class="btn btn-info">View Schedule</a>
                                    <a href="{{ route('student.schedule.grade',['department'=>$academic->department->id,'year'=>$academic->year->id]) }}" class="btn btn-info">View Grade</a>
                                  </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @break;
        @default
        @endswitch
        @endforeach
    </div>
    <div class="col-md-12" style="margin-top:20px;">
        <a href="{{ URL::previous() }}" class="btn btn-default">Back</i></a>
     </div>
</div>
<script>
 $(document).ready( function () {
    // $('#teacherschedule-table').DataTable();
} );
</script>
@endsection
