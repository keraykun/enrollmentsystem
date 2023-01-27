@extends('admin.layouts.admin')
@section('layout')

<div class="row">
    <form class="form-horizontal span6" action="{{ route('admin.teacherschedule.create') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-lg-12">
             <h1 class="page-header">Add New Teacher Schedule</h1>
           </div>
           </div>

           <div class="form-group">
            <div class="col-md-8">
              <label class="col-md-4 control-label" for=
              "">Subjects: </label>
              <div class="col-md-8">
               @error('department_id')
               <p style="color: red;">Schedule already Exist or  Schedule Day Exist</p>
               @enderror
               <select class="form-control input-sm" name="subject_id" id="">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
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
                        <option value="{{ $yearlevel->id }}">{{ $yearlevel->name }}</option>
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
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
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
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
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
                        <option value="{{ $schedule->id }}">{{ $schedule->day.' - '.date('h:i a',strtotime($schedule->start_time)).' - '.date('h:i a',strtotime($schedule->end_time))}}</option>
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
                    <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button>
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
