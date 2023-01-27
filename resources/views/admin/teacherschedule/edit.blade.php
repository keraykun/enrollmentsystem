@extends('admin.layouts.admin')
@section('layout')

<div class="row">
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @elseif(Session::has('danger'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('danger') }}
    </div>
    @endif
    <form class="form-horizontal span6" action="{{ route('admin.teacherschedule.update',$teacherschedule->id) }}" method="POST">
        @csrf
        {{ method_field('put') }}
        <div class="row">
          <div class="col-lg-12">
             <h1 class="page-header">Edit Teacher Schedule</h1>
           </div>
           </div>

           <div class="form-group">


            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "">Subjects: </label>
              <div class="col-md-8">
               @error('department_id')
               <p style="color: red;">Schedule already Exist or Schedule Day Exist</p>
               @enderror
               <select class="form-control input-sm" name="subject_id" id="">
                    @foreach ($subjects as $subject)
                        @if($teacherschedule->subject->id==$subject->id)
                        <option value="{{ $teacherschedule->subject->id }}" selected>{{ $teacherschedule->subject->name }}</option>
                        @else
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endif
                    @endforeach
                </select>
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "">Subject Year: </label>
              <div class="col-md-8">
               @error('yearlevel')
               <p style="color: red;">{{ $message }}</p>
               @enderror
               <select class="form-control input-sm" name="yearlevel_id" id="">
                    @foreach ($yearlevels as $yearlevel)
                        @if($teacherschedule->yearlevel->id==$yearlevel->id)
                        <option value="{{ $teacherschedule->yearlevel->id }}" selected>{{ $teacherschedule->yearlevel->name }}</option>
                        @else
                        <option value="{{ $yearlevel->id }}">{{ $yearlevel->name }}</option>
                        @endif
                    @endforeach
                </select>
              </div>
            </div>
          </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "">Department: </label>
              <div class="col-md-8">
               @error('department')
               <p style="color: red;">{{ $message }}</p>
               @enderror
               <select class="form-control input-sm" name="department_id" id="">
                    @foreach ($departments as $department)
                        @if($teacherschedule->department->id==$department->id)
                        <option value="{{ $teacherschedule->department->id }}" selected>{{ $teacherschedule->department->name }}</option>
                        @else
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endif
                    @endforeach
                </select>
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "">Room: </label>
              <div class="col-md-8">
               @error('section')
               <p style="color: red;">{{ $message }}</p>
               @enderror
               <select class="form-control input-sm" name="section_id" id="">
                    @foreach ($sections as $section)
                        @if($teacherschedule->section->id==$section->id)
                        <option value="{{ $teacherschedule->section->id }}" selected>{{ $teacherschedule->section->name }}</option>
                        @else
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endif
                    @endforeach
                </select>
              </div>
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "">Schedules: </label>
              <div class="col-md-8">
               @error('schedule')
               <p style="color: red;">{{ $message }}</p>
               @enderror
               <select class="form-control input-sm" name="schedule_id" id="">
                    @foreach ($schedules as $schedule)
                       @if($teacherschedule->schedule->id==$schedule->id)
                       <option value="{{ $teacherschedule->schedule->id }}" selected>{{ $teacherschedule->schedule->day.' - '.date('h:i a',strtotime($teacherschedule->schedule->start_time)).' - '.date('h:i a',strtotime($teacherschedule->schedule->end_time)) }}</option>
                       @else
                        <option value="{{ $schedule->id }}">{{ $schedule->day.' - '.date('h:i a',strtotime($schedule->start_time)).' - '.date('h:i a',strtotime($schedule->end_time))}}</option>>
                       @endif
                    @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "">Teacher: </label>
              <div class="col-md-8">
               @error('user_id')
               <p style="color: red;">{{ $message }}</p>
               @enderror
               <select class="form-control input-sm" name="user_id" id="">
                    <option value="">Select</option>
                    @foreach ($teachers as $teacher)
                        @if($teacherschedule->teacher!=null)
                            @if($teacherschedule->teacher->id==$teacher->id)
                            <option value="{{ $teacherschedule->teacher->id}}" selected>{{ $teacherschedule->teacher->lastname.' '.$teacherschedule->teacher->middlename.' '.$teacherschedule->teacher->firstname }}</option>
                            @else
                            <option value="{{ $teacher->id }}">{{ $teacher->detail->lastname.' '.$teacher->detail->middlename.' '.$teacher->detail->firstname }}</option>
                            @endif
                        @else
                        <option value="{{ $teacher->id }}">{{ $teacher->detail->lastname.' '.$teacher->detail->middlename.' '.$teacher->detail->firstname }}</option>
                        @endif
                    @endforeach

                </select>
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
     <div class="col-md-12">
        <a href="{{ route('admin.teacherschedule.index') }}" class="btn btn-default">Back</i></a>
     </div>
</div>
@endsection
