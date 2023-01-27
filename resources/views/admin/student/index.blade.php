@extends('admin.layouts.admin')
@section('layout')


<div class="row">
      <div class="col-lg-12">
            <div class="col-lg-6">
                <h1 class="page-header">List of Students </h1>
                <h3 style="margin: 20px 0px;">
                    <a href="{{ route('admin.student.add') }}" class="btn btn-success">Add New Student <i class="fa fa-plus"></i></a></h3>
       		</div>
       		<div class="col-lg-6" >
       			<img style="float:right; width: 20%" src="{{ asset('images/main/agdaologo.jpg') }}" >
       		</div>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
            @include('admin.student.navbar')
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
				<table id="student-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">

				  <thead>
				  	<tr>
				  		<th>LRN</th>
                        <th>Year</th>
                        <th>Department</th>
				  		<th>Name</th>
                        <th>Username</th>
                        <th>Contact</th>
				  		<th>Status</th>
				  		<th width="8%" >Schedule</th>
                        <th width="8%" >Detail</th>
                        <th width="8%" >Action</th>
				  	</tr>
				  </thead>
				  <tbody>
                        @foreach ($users as $user)

                        <tr>
                             <td>{{ str_pad($user->user_id, 10,0, STR_PAD_LEFT) }}</td>
                             <td>{{ $user->user->academic->year->name??'' }}</td>
                             <td>{{ $user->user->academic->department->name??'' }}</td>
                             <td>{{ $user->lastname.' '.$user->firstname.', '.$user->middlename }}</td>
                             <td>{{ $user->user->email }}</td>
                             <td>{{ $user->contact }}</td>
                             <td>{{ucwords($user->student_data->status) }}</td>
                             <td>
                                <a href="{{ route('admin.student.schedule',$user->user_id) }}" class="btn btn-info" style="background: rgb(4, 127, 189)"><i class="fa fa-eye"> {{ $user->user->academic->schedules_count??0 }}</i></a>
                             </td>
                             <td>
                                 <a href="{{ route('admin.student.detail',$user->user_id) }}" class="btn btn-info"><i class="fa fa-folder-open"></i></a>
                                @if($user->user->data->status=='transferee' && $user->user->has('file'))
                                    <a href="{{  route('admin.student.file',$user->user_id) }}" class="btn btn-info"><i class="fa fa-file-pdf-o"></i></a>
                                @endif
                            </td>
                             <td>
                                <a href="{{ route('admin.student.edit',$user->user_id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('admin.student.destroy',$user->user_id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                         </tr>
                        @endforeach
				  </tbody>

				</table>
			</div>
</div>
<script>
 $(document).ready( function () {
    $('#student-table').DataTable();
} );
</script>
@endsection
