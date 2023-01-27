@extends('admin.layouts.admin')
@section('layout')

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
        <h1 class="page-header">Grading of {{ $teacherschedule->subject->name??'' }}</h1>
        @error('user_id')
        <p style="color:red;">Student Already Exist</p>
        @enderror

         </div>
           <div class="col-lg-6" >
               <img style="float:right; width: 20%" src="{{ asset('images/main/agdaologo.jpg') }}" >
           </div>
           </div>
   		 </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-lg-4" >
            <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px;">
                <div class="card-header">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Teacher : </span><span>@if($teacherschedule->teacher!=null){{ $teacherschedule->teacher->lastname.' '.$teacherschedule->teacher->middlename.' '.$teacherschedule->teacher->firstname }} @endif</span></li>
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Subject : </span><span>{{ $teacherschedule->subject->name??'' }}</span></li>
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Subject Code : </span><span>{{ $teacherschedule->yearlevel->name??'' }}</span></li>
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Department : </span><span>{{ $teacherschedule->department->name??'' }}</span></li>
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Room Number : </span><span>{{ $teacherschedule->section->name??'' }}</span></li>
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Schedule : </span><span>@if($teacherschedule->schedule!=null){{ $teacherschedule->schedule->day }} - {{ date('h:i a',strtotime($teacherschedule->schedule->start_time)).' ~ '.date('h:i a',strtotime($teacherschedule->schedule->end_time)) }} @endif</span></li>
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Year : </span><span>{{ date('Y',strtotime($teacherschedule->created_at??'')) }}</span></li>
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Status : </span>
                            @switch($teacherschedule->status)
                                 @case('active')
                                      <span style="color:green">{{ Str::ucfirst($teacherschedule->status) }} </span>
                                     @break
                                 @case('ended')
                                      <span style="color:red">{{ Str::ucfirst($teacherschedule->status) }} </span>
                                     @break
                                 @default

                             @endswitch
                         </span>
                     </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div  class="table-responsive"  style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;  padding:20px;">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @elseif(Session::has('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('danger') }}
                </div>
                @endif
                <form action="{{ route('admin.studentgrade.update') }}" method="POST">
                    @csrf
                    {{ method_field('put') }}
				<table  id="teacherschedule-table" class="table  table-bordered  table-responsive" style="font-size:12px;" cellspacing="0">
				  <thead>
				  	<tr>
				  		<th>Students Full Name</th>
                        <th>1st Quarter</th>
                        <th>2nd Quarter</th>
                        <th>3rd Quarter</th>
                        <th>4th Quarter</th>
                        <th>Average</th>
				  	</tr>
				  </thead>
				  <tbody >
                        @foreach ($teacherschedule->student_schedule as $student)
                           <tr ondblclick="setGrade(event)">
                            <td>{{ $student->academic->detail->lastname.' '.$student->academic->detail->firstname.' , '.$student->academic->detail->middlename }}</td>
                            <td id="{{ $student->grade->prelim }}"><p>{{ $student->grade->prelim }}</p></td>
                            <td id="{{ $student->grade->midterm }}"><p>{{ $student->grade->midterm }}</p></td>
                            <td id="{{ $student->grade->semi }}"><p>{{ $student->grade->semi }}</p></td>
                            <td id="{{ $student->grade->final }}"><p>{{ $student->grade->final }}</p></td>
                            <td id="{{ $student->grade->id }}"><span> <span>{{ number_format($student->grade->average) }}</span></td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
             <button style="display:none;" id="updateGradeButton" class="btn btn-info" type="submit">Update <i class="fa fa-check"></i></button>
             <a style="display:none;" id="cancelGradeButton" href="{{ route('redirect.back'); }}" class="btn btn-default">Cancel</a>
            </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12" style="margin-top: 20px; display:flex; justify-content:space-around">
        <a href="{{ route('admin.teacherschedule.index') }}" class="btn btn-default">Back</i></a>
        <p style="font-size:2rem;">Takte note:  <i>Double click the table field set when creating or updating Grade</i></p>
    </div>
</div>
<script>
    function setGrade(event){
        document.querySelector('#cancelGradeButton').style.display='inline'
        document.querySelector('#updateGradeButton').style.display='inline'
        let td1 = document.createElement('input')
        td1.type="text"
        td1.name="prelim[]"
        td1.value=event.currentTarget.children[1].id
        td1.style.border='none'
        td1.style.outline="0"
        td1.style.borderBottom="2px solid red"
        td1.style.width="80px"
        event.currentTarget.children[1].children[0].remove()
        event.currentTarget.children[1].appendChild(td1)

        let td2 = document.createElement('input')
        td2.type="text"
        td2.name="midterm[]"
        td2.value=event.currentTarget.children[2].id
        td2.style.border='none'
        td2.style.outline="0"
        td2.style.borderBottom="2px solid red"
        td2.style.width="80px"
        event.currentTarget.children[2].children[0].remove()
        event.currentTarget.children[2].appendChild(td2)

        let td3 = document.createElement('input')
        td3.type="text"
        td3.name="semi[]"
        td3.value=event.currentTarget.children[3].id
        td3.style.border='none'
        td3.style.outline="0"
        td3.style.borderBottom="2px solid red"
        td3.style.width="80px"
        event.currentTarget.children[3].children[0].remove()
        event.currentTarget.children[3].appendChild(td3)

        let td4 = document.createElement('input')
        td4.type="text"
        td4.name="finals[]"
        td4.value=event.currentTarget.children[4].id
        td4.style.border='none'
        td4.style.outline="0"
        td4.style.borderBottom="2px solid red"
        td4.style.width="80px"
        event.currentTarget.children[4].children[0].remove()
        event.currentTarget.children[4].appendChild(td4)

        let td5 = document.createElement('input')
        td5.type="hidden"
        td5.name="grade_id[]"
        td5.value=event.currentTarget.children[5].id
        td5.style.border='none'
        td5.style.outline="0"
        td5.style.borderBottom="2px solid red"
        td5.style.width="80px"
        event.currentTarget.children[5].children[0].remove()
        event.currentTarget.children[5].appendChild(td5)
    }
</script>
<script>
 $(document).ready( function () {
    // $('#teacherschedule-table').DataTable();
} );
</script>
@endsection
