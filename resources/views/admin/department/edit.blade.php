@extends('admin.layouts.admin')
@section('layout')

<div class="row">
    <form class="form-horizontal span6" action="{{ route('admin.department.update',$department->id) }}" method="POST">
        @csrf
        {{ method_field('put') }}
        <div class="row">
          <div class="col-lg-12">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @elseif(Session::has('danger'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('danger') }}
                </div>
                @endif
             <h1 class="page-header">Edit Department <a href="{{ route('admin.department.index') }}" class="btn btn-default">Back</a></h1>
           </div>
           </div>
                <div class="form-group">
                 <div class="col-md-8">
                   <label class="col-md-4 control-label" for=
                   "SUBJ_CODE">Department:</label>
                   <div class="col-md-8">
                    @error('department')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                    <input class="form-control input-sm" id="SUBJ_CODE" name="department" placeholder=
                         "Department" type="text" value="{{ $department->name }}">
                   </div>
                 </div>
               </div>


            <div class="form-group">
                 <div class="col-md-8">
                   <label class="col-md-4 control-label" for=
                   "idno"></label>

                   <div class="col-md-8">
                    <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Update</button>
                       <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>List of Users</strong></a> -->
                    </div>
                 </div>
               </div>
     </form>
</div>
@endsection
