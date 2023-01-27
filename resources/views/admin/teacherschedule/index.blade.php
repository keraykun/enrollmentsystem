@extends('admin.layouts.admin')
@section('layout')

<div class="row">
      <div class="col-lg-12">
       	 <div class="col-lg-6">
            <h1 class="page-header">List of Teacher Schedules <a href="{{ route('admin.teacherschedule.add') }}" class="btn btn-info">New Teacher Schedule <i class="fa fa-plus"></i></a></h1>
       		</div>
       		<div class="col-lg-6" >
       			<img style="float:right; width: 20%" src="{{ asset('images/main/agdaologo.jpg') }}" >
       		</div>
       		</div>

        	<!-- /.col-lg-12 -->
   		 </div>
			    <div class="table-responsive">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @elseif(Session::has('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('danger') }}
                </div>
                @endif
				<table id="teacherschedule-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				  <thead>
				  	<tr>
				  		<th>Subject</th>
				  		<th>Subject Code</th>
                        <th>Room</th>
                        <th>Schedule</th>
                        <th>Department</th>
                        <th>Adviser</th>
                        <th width="12%">Number of Students</th>
                        <th width="7%" >Grade</th>
				  		<th width="7%" >Action</th>
				  	</tr>
				  </thead>
				  <tbody>
                        @foreach ($teacherschedules as $teacherschedule)
                        <tr>
                            <td>{{ $teacherschedule->subject->name??'' }}</td>
                            <td>{{ $teacherschedule->yearlevel->name??'' }}</td>
                            <td>{{ $teacherschedule->section->name??'' }}</td>
                            <td>@if($teacherschedule->schedule!=null){{ $teacherschedule->schedule->day.' / '.date('h i a',strtotime($teacherschedule->schedule->start_time)).' ~ '.date('h i a',strtotime($teacherschedule->schedule->end_time))  }} @endif</td>
                            <td>{{ $teacherschedule->department->name??'' }}</td>
                            <td>{{ $teacherschedule->teacher->lastname?? "" }} {{ $teacherschedule->teacher->middlename?? "" }} {{ $teacherschedule->teacher->firstname?? "" }}</td>
                            <td><a href="{{ route('admin.teacherschedule.show',$teacherschedule->id) }}" class="btn btn-info" style="background: #83687c;"><i class="fa fa-users" style="margin-right:10px;"></i>{{ number_format($teacherschedule->student_schedule_count) }}</a></td>
                            <td><a href="{{ route('admin.teacherschedule.grade',$teacherschedule->id) }}" class="btn btn-info" style="background: #258848;"><i class="fa fa-bar-chart"></i></a></td>
                            <td style="display: flex; gap:10px;">
                                <a href="{{ route('admin.teacherschedule.edit',$teacherschedule->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <form action="{{ route('admin.teacherschedule.destroy',$teacherschedule->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('delete') }}
                                    <button type="submit"  class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
				  </tbody>

				</table>
			</div>
</div>
<script>
 $(document).ready( function () {
    $('#teacherschedule-table').DataTable();
} );
</script>
@endsection
