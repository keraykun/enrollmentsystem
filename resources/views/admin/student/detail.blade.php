@extends('admin.layouts.admin')
@section('layout')

<div class="row">
    <div class="col-lg-12">
    <div class="col-lg-6">
        <h1 class="page-header">Fullname : <u><span>{{ $student->detail->lastname.' '.$student->detail->middlename.' '.$student->detail->firstname }}</span></u></h1>
        <h2 class="page-header"><span>ID NO: <u>{{ str_pad($student->id, 10,0, STR_PAD_LEFT); }}</u></span></h2>
        <h2 class="page-header"><span>{{Str::ucfirst( $student->role) }}</span></h2>
    </div>
    <div class="col-lg-6" >
               <img style="float:right; width: 20%" src="{{ asset('images/main/agdaologo.jpg') }}" >
           </div>
           </div>
   		 </div>

    <div class="row" style="margin-top: 30px;">
            <div class="col-lg-10" >
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px;">
                    <div class="card-header">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Fullname : </span><span>{{ $student->detail->lastname.' '.$student->detail->middlename.' '.$student->detail->firstname }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Email : </span><span>{{ $student->email }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Contact : </span><span>{{ $student->detail->contact }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Birthdate : </span><span>{{ date('M d , Y',strtotime($student->detail->birthdate))}}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Age : </span><span>{{ date('Y') - date('Y',strtotime($student->detail->birthdate))}}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Birth Place :</span><span>{{ $student->detail->birthdate_place }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Gender :</span><span>{{ $student->detail->gender }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Address :</span><span>{{ $student->detail->address.' '.$student->detail->street.' , '.$student->detail->city }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Status :</span><span>{{ $student->detail->status }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Province :</span><span>{{ $student->detail->province }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Religion :</span><span>{{ $student->detail->religion }}</span></li>
                            <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Nationality :</span><span>{{ $student->detail->nationality }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
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
