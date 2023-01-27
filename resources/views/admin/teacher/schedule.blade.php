@extends('admin.layouts.admin')
@section('layout')

<div class="row">
    <div class="col-lg-12">
    <div class="col-lg-6">
        <h1 class="page-header">Schedule of: <u><span>{{ $teacher->detail->lastname.' '.$teacher->detail->middlename.' '.$teacher->detail->firstname }}</span></u></h1>
        <h2 class="page-header"><span>ID NO: <u>{{ str_pad($teacher->id, 10,0, STR_PAD_LEFT); }}</u></span></h2>
        <h2 class="page-header"><span>Role : </span><span>{{Str::ucfirst( $teacher->role) }}</span></h2>
    </div>
    <div class="col-lg-6" >
               <img style="float:right; width: 20%" src="{{ asset('images/main/agdaologo.jpg') }}" >
           </div>
           </div>
   		 </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-md-12">
            @if(Session::has('success'))
            <div style="margin: 10px 0px;" class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @elseif(Session::has('danger'))
            <div style="margin: 10px 0px;" class="alert alert-danger" role="alert">
                {{ Session::get('danger') }}
            </div>
        @endif
        </div>
        @foreach ($teacher->teacher_schedules as $schedule)

        @switch($schedule->status)
            @case('active')
            <div class="col-lg-3" style="margin:15px 0px;">
                <div class="card" style="box-shadow: rgba(4, 144, 55, 0.703) 0px 3px 8px; padding:10px;">
                    <div class="card-header">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Teacher : </span><span>@if($teacher->detail!=null){{ $teacher->detail->lastname.' '.$teacher->detail->middlename.' '.$teacher->detail->firstname }} @endif</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Subject : </span><span>{{ $schedule->subject->name??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Department : </span><span>{{ $schedule->department->name??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Year Level : </span><span>{{ $schedule->yearlevel->name??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Room Number : </span><span>{{ $schedule->section->name??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Schedule : </span><span>@if($schedule->schedule!=null){{ $schedule->schedule->day }} - {{ date('h:i a',strtotime($schedule->schedule->start_time)).' ~ '.date('h:i a',strtotime($schedule->schedule->end_time)) }} @endif</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Year : </span><span>{{ date('Y',strtotime($schedule->created_at)) }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Total Students : </span><span>{{ $schedule->student_count??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Status : </span><span style="color:green">{{ Str::ucfirst($schedule->status)??'' }} </span></span></li>
                            <li class="list-group-item">
                                <span style="font-weight: bold; letter-spacing:1px; margin-right:10px; display: flex; justify-content:space-between"><a href="{{ route('admin.teacherschedule.show',$schedule->id) }}" class="btn btn-info">View Room</a>
                                <a href="{{ route('admin.teacher.ended',$schedule->id) }}" class="btn btn-warning">End Room</a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @break
            @case('ended')
            <div class="col-lg-3 " style="margin:15px 0px;">
                <div class="card ended-subject" style="box-shadow: rgb(205, 90, 94) 0px 3px 8px; padding:10px; opacity:0.6;">
                    <div class="card-header">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Teacher : </span><span>@if($teacher->detail!=null){{ $teacher->detail->lastname.' '.$teacher->detail->middlename.' '.$teacher->detail->firstname }} @endif</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Subject : </span><span>{{ $schedule->subject->name??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Department : </span><span>{{ $schedule->department->name??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Year Level : </span><span>{{ $schedule->yearlevel->name??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Room Number : </span><span>{{ $schedule->section->name??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Schedule : </span><span>@if($schedule->schedule!=null){{ $schedule->schedule->day }} - {{ date('h:i a',strtotime($schedule->schedule->start_time)).' ~ '.date('h:i a',strtotime($schedule->schedule->end_time)) }} @endif</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Year : </span><span>{{ date('Y',strtotime($schedule->created_at)) }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Total Students : </span><span>{{ $schedule->student_count??'' }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Status : </span><span style="color:red">{{ Str::ucfirst($schedule->status)??'' }} </span></span></li>
                            <li class="list-group-item" style="display: flex; justify-content:space-between"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;"><a href="{{ route('admin.teacherschedule.show',$schedule->id) }}" class="btn btn-info">View Room</a></li>
                        </ul>
                    </div>
                </div>
            </div>
                @break
            @default

        @endswitch

        @endforeach
    </div>
    <div class="col-md-12" style="margin-top: 20px;">
        <a href="{{ URL::previous() }}" class="btn btn-default">Back</i></a>
     </div>
</div>
<script>
 $(document).ready( function () {
    // $('#teacherschedule-table').DataTable();
} );
</script>
@endsection
