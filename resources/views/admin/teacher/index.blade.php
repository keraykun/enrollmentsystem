@extends('admin.layouts.admin')
@section('layout')

<div class="row">
      <div class="col-lg-12">
        <div class="col-lg-6">
            <h1 class="page-header">List of Teacher </h1>
            <h3 style="margin: 20px 0px;">
                <a href="{{ route('admin.teacher.add') }}" class="btn btn-success">Add New Teacher <i class="fa fa-plus"></i></a></h3>
           </div>
       		<div class="col-lg-6" >
       			<img style="float:right; width: 20%" src="{{ asset('images/main/agdaologo.jpg') }}" >
       		</div>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <div class="table-responsive">
				<table id="teacher-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @elseif(Session::has('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('danger') }}
                    </div>
                    @endif
				  <thead>
				  	<tr>
				  		<th>LRN</th>
				  		<th>Name</th>
                        <th>Username</th>
                        <th>Contact</th>
				  		<th width="8%" >Schedule</th>
                        <th width="8%" >Detail</th>
                        <th width="8%" >Action</th>
				  	</tr>
				  </thead>
				  <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->lrn->name??'' }}</td>
                             <td>@if($user->detail!=null){{ $user->detail->lastname.' '.$user->detail->firstname.', '.$user->detail->middlename }}@endif</td>
                             <td>{{ $user->email }}</td>
                             <td>@if($user->detail!=null){{ $user->detail->contact }}@endif</td>
                             <td>
                                 <a href="{{ route('admin.teacher.schedule',$user->id) }}" class="btn btn-info" style="background: rgb(4, 127, 189)"><i class="fa fa-eye"> {{ $user->count }}</i></a>
                             </td>
                             <td>
                                 <a href="{{ route('admin.teacher.detail',$user->id) }}" class="btn btn-info"><i class="fa fa-folder-open"></i></a>
                             </td>
                             <td>
                                <a href="{{ route('admin.teacher.edit',$user->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('admin.teacher.destroy',$user->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                         </tr>
                        @endforeach
				  </tbody>

				</table>
			</div>
</div>
<script>
 $(document).ready( function () {
    $('#teacher-table').DataTable();
} );
</script>
@endsection
