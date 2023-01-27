@extends('admin.layouts.admin')
@section('layout')

<div class="row">
      <div class="col-lg-12">
       	 <div class="col-lg-6">
            <h1 class="page-header">List of Subject <a href="{{ route('admin.subject.add') }}" class="btn btn-info">New subject <i class="fa fa-plus"></i></a></h1>
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
				<table id="subject-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				  <thead>
				  	<tr>
				  		<th>Name</th>
				  		<th width="14%" >Action</th>
				  	</tr>
				  </thead>
				  <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                            <td>{{ $subject->name }}</td>
                            <td style="display: flex; gap:10px;">
                                <a href="{{ route('admin.subject.edit',$subject->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <form action="{{ route('admin.subject.destroy',$subject->id) }}" method="POST">
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
    $('#subject-table').DataTable();
} );
</script>
@endsection
