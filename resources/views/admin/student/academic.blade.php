@extends('admin.layouts.admin')
@section('layout')
<style>
    p.message-error{
        color: red;
        margin: 10px 0px;
        font-size: 1.6rem;
    }
</style>
<div class="row">
    <div class="row" style="margin-top: 30px;">
        <div class="col-lg-10" >
           <div class="panel">
                <div class="panel-body">
                    <h2>New Academic</h2>

                </div>
                <div class="panel-body">
                    @error('exist_schedule')
                    <div style="margin: 10px 0px;" class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @elseif(Session::has('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('danger') }}
                    </div>
                    @endif
                    @error('user_id')
                        <p style="color:red">Academics Already Exist </p>
                    @enderror
                    <form action="{{ route('admin.student.academic.create') }}" method="POST">
                        @csrf
                       <h3 style="color: #ccc;">Account Detail</h3>
                        <hr>
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Student Full Name</label>
                                    <input type="text"  value="{{ $student->detail->firstname.' '.$student->detail->middlename.' '.$student->detail->lastname }}" disabled class="form-control">
                                    @error('firstname')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >Student ID</label>
                                    <input type="text"  value="{{ str_pad($student->id,10,0,STR_PAD_LEFT) }}" disabled class="form-control">
                                    @error('middlename')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                            </div>
                       </div>
                    <h3 style="color: #ccc;">New Academics</h3>
                       <hr>
                    <div class="row" >
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Gender">Student Year</label>
                                <select  class="form-control" name="year_id">
                                   @foreach ($years as $year)
                                   <option value="{{ $year->id }}">{{ $year->name }}</option>
                                   @endforeach
                                </select>
                                @error('transferee')<p class="message-error"> {{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Gender">Department</label>
                                <select  class="form-control" name="department_id">
                                   @foreach ($departments as $department)
                                   <option value="{{ $department->id }}">{{ $department->name }}</option>
                                   @endforeach
                                </select>
                                @error('transferee')<p class="message-error"> {{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="">Start Year</label>
                            <input type="number" name="start_year" class="form-control" min="{{ date('Y') }}" max="2099" step="1" value="{{ date('Y') }}" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                            <label for="">End Year</label>
                            <input type="number" name="end_year" class="form-control" min="{{ date('Y') }}" max="2099" step="1" value="{{ date('Y') }}" />
                            </div>
                        </div>
                        <div class="col-md-10">
                            <input type="hidden" value="{{ $student->id }}" name="user_id">
                            <button type="submit" class="btn btn-success">Create Academic <i class="fa fa-plus"></i></button>
                        </div>
                      </div>
                    </form>
                </div>
           </div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top: 20px;">
        <a href="{{ route('admin.student.schedule',$student->id) }}" class="btn btn-default">Back</i></a>
     </div>
</div>
<script>
 $(document).ready( function () {
    // $('#teacherschedule-table').DataTable();
} );
</script>
@endsection
