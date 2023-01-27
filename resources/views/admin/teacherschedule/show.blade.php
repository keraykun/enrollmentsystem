@extends('admin.layouts.admin')
@section('layout')

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
        <h1 class="page-header">Schedule of {{ $teacherschedule->subject->name??'' }}
        <a  class="btn btn-info"data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">New Student <i class="fa fa-plus"></i></a></h1>
        @error('student_academic_id')
        <p style="color:red;">Student Already Exist</p>
        @enderror
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form action="{{ route('admin.studentschedule.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                          <label class=" control-label" for="">Student name</label>
                           <select class="form-control input-sm" name="student_academic_id" id="">
                            @foreach ($students as $student)
                                <option value="{{ $student->academic_id }}">{{ $student->lastname.' '.$student->firstname.' , '.$student->middlename  }} {{ ' ( '.$student->year_name.' ) ' }} - {{ ' ( '.$student->department_name.' ) ' }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="teacher_schedule_id" value="{{ $teacherschedule->id }}">
                        <button type="submit" class="btn btn-success">Add <i class="fa fa-plus"></i></button>
                      </div>
                </form>
            </div>

          </div>

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
				<table  id="teacherschedule-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px;" cellspacing="0">
				  <thead>
				  	<tr>
				  		<th>Students Full Name</th>
                        <th>Status</th>
                        <th width="7%" >Detail</th>
				  		<th width="7%" >Action</th>
				  	</tr>
				  </thead>
				  <tbody >
                        @foreach ($teacherschedule->student_schedule as $student)
                           <tr>
                            <td>{{ $student->academic->detail->lastname.' '.$student->academic->detail->firstname.' , '.$student->academic->detail->middlename }}</td>
                            <td>{{ $student->status }}</td>
                            <td>
                                <a href="{{ route('admin.student.detail',$student->academic->user_id) }}" class="btn btn-info"><i class="fa fa-folder-open"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('admin.studentschedule.destroy',$student->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button type="submit"  class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12" style="margin-top: 20px;">
        <a href="{{ route('admin.teacherschedule.index') }}" class="btn btn-default">Back</i></a>
    </div>
</div>
<script>
 $(document).ready( function () {
    // $('#teacherschedule-table').DataTable();
} );
</script>
@endsection
