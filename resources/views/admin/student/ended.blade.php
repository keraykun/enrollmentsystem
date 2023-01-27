@extends('admin.layouts.admin')
@section('layout')

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <h1 class="page-header">Schedule of: <u><span>{{ $student->detail->lastname.' '.$student->detail->middlename.' '.$student->detail->firstname }}</span></u></h1>
            <h2 class="page-header"><span>ID NO: <u>{{ str_pad($student->id, 10,0, STR_PAD_LEFT); }}</u></span></h2>
            <h2 class="page-header"><span>{{Str::ucfirst( $student->role) }}</span></h2>
        </div>
    <div class="col-lg-6" >
               <img style="float:right; width: 20%" src="{{ asset('images/main/agdaologo.jpg') }}" >
           </div>
           </div>
   		 </div>

    <div class="row" style="margin-top: 30px;">
        @foreach ($student->student_schedules as $student)
            @if($student->status=='ended')
            <div class="col-lg-4" >
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px;">
                    <div class="card-header">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Teacher : </span><span>@if($student->schedule->teacher!=null){{ $student->schedule->teacher->lastname.' '.$student->schedule->teacher->middlename.' '.$student->schedule->teacher->firstname }} @endif</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Subject : </span><span>{{ $student->schedule->subject->name }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Department : </span><span>{{ $student->schedule->department->name }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Year Level : </span><span>{{ $student->schedule->yearlevel->name }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Room Number : </span><span>{{ $student->schedule->section->name }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Schedule : </span><span>{{ $student->schedule->schedule->day }} - {{ date('h:i a',strtotime($student->schedule->schedule->start_time)).' ~ '.date('h:i a',strtotime($student->schedule->schedule->end_time)) }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Year : </span><span>{{ date('Y',strtotime($student->schedule->created_at)) }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Status : </span>

                                    @switch($student->status)
                                        @case('active')
                                             <span style="color:green">{{ Str::ucfirst($student->status) }} </span>
                                            @break
                                        @case('ended')
                                             <span style="color:red">{{ Str::ucfirst($student->status) }} </span>
                                            @break
                                        @default

                                    @endswitch
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    <div class="col-md-12">
        <a href="{{ URL::previous() }}" class="btn btn-default">Back</i></a>
     </div>
</div>
<script>
 $(document).ready( function () {
    // $('#teacherschedule-table').DataTable();
} );
</script>
@endsection
