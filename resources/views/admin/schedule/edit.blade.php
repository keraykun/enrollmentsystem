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
    <form class="form-horizontal span6" action="{{ route('admin.schedule.update',$schedule->id) }}" method="POST">
        @csrf
        {{ method_field('put') }}
        <div class="row">
          <div class="col-lg-12">
             <h1 class="page-header">Edit Schedule <a href="{{ route('admin.schedule.index') }}" class="btn btn-default">Back</a></h1>
           </div>
           </div>
                <div class="form-group">
                 <div class="col-md-8">
                   <label class="col-md-4 control-label" for=
                   "SUBJ_CODE">Day:</label>
                   <div class="col-md-8">
                    @error('day')
                    {{-- <p style="color: red;">{{ $message }}</p> --}}
                    <p style="color: red;">Schedule Already Exist!</p>
                    @enderror
                    <input class="form-control input-sm" id="SUBJ_CODE" name="day" placeholder=
                         "Eg. M/W/T" type="text" value="{{ $schedule->day }}">
                   </div>
                 </div>
               </div>

               <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-4 control-label" for=
                  "SUBJ_CODE">Start Time:</label>
                  <div class="col-md-8">
                   @error('start_time')
                   <p style="color: red;">{{ $message }}</p>
                   {{-- <p style="color: red;">Field Required or schedule and year Already Exist!</p> --}}
                   @enderror
                   <input class="form-control input-sm" id="SUBJ_CODE" name="start_time" placeholder=
                        "schedule" type="time"  value="{{ $schedule->start_time }}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8">
                  <label class="col-md-4 control-label" for=
                  "SUBJ_CODE">End Time:</label>
                  <div class="col-md-8">
                   @error('end_time')
                   <p style="color: red;">{{ $message }}</p>
                   {{-- <p style="color: red;">Field Required or schedule and year Already Exist!</p> --}}
                   @enderror
                   <input class="form-control input-sm" id="SUBJ_CODE" name="end_time" placeholder=
                        "schedule" type="time" value="{{ $schedule->end_time }}">
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
