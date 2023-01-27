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
                    <h2>Edit Teacher</h2>
                </div>
                <div class="panel-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @elseif(Session::has('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('danger') }}
                    </div>
                    @endif
                    <form action="{{ route('admin.teacher.update',$teacher->id) }}" method="POST">
                        @csrf
                        {{ method_field('put') }}
                        <div class="row">
                        <h3 style="color: #ccc;">Account LRN</h3>
                        <hr>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label >LRN</label>
                                <input type="number" value="{{ $teacher->lrn->name }}" min="12"  placeholder="Enter Teacher LRN"  name="lrn" class="form-control">
                                @error('lrn')<p class="message-error"> {{ $message }}</p>@enderror
                            </div>
                        </div>
                        </div>
                       <h3 style="color: #ccc;">Account Detail</h3>
                        <hr>
                       <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="text"  value="{{ $teacher->detail->firstname }}" placeholder="Enter First name" name="firstname" class="form-control">
                                    @error('firstname')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >Middlename</label>
                                    <input type="text"  value="{{ $teacher->detail->middlename }}" placeholder="Enter Middle name" name="middlename" class="form-control">
                                    @error('middlename')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text"  value="{{ $teacher->detail->lastname }}" placeholder="Enter Last name" name="lastname" class="form-control">
                                    @error('lastname')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text"  value="{{ $teacher->detail->contact }}" title="Number must be start at 09 and 11 digits only"  pattern="^(09|\+639)\d{9}$" placeholder="09 XXX XXX XXX"  name="contact" class="form-control">
                                    @error('contact')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Gender">Gender</label>
                                    <select  class="form-control" name="gender">
                                        @if ($teacher->detail->gender)
                                        <option selected value="{{ $teacher->detail->gender }}">{{ ucfirst($teacher->detail->gender) }}</option>
                                        @endif
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                        <option value="other">Other</option>

                                    </select>
                                </div>
                                @error('gender')<p class="message-error"> {{ $message }}</p>@enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Birthdate</label>
                                    <input type="date"  value="{{ $teacher->detail->birthdate }}" name="birthdate" class="form-control">
                                </div>
                                @error('birthdate')<p class="message-error"> {{ $message }}</p>@enderror
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Birthdate Place</label>
                                    <input type="text"  value="{{ $teacher->detail->birthdate_place }}"  placeholder="Enter Birthplace Eg. Catholic Street City" name="birthdate_place" class="form-control">
                                    @error('birthdate_place')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Religion">Religion</label>
                                    <input type="text"  value="{{ $teacher->detail->religion }}" placeholder="Catholic" name="religion" class="form-control">
                                    @error('religion')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="Gender">Status</label>
                                    <select  class="form-control" name="status">
                                        @if ($teacher->detail->status)
                                        <option selected value="{{ $teacher->detail->status }}">{{ ucfirst($teacher->detail->status) }}</option>
                                        @endif
                                        <option value="single">Single</option>
                                        <option value="married">Married</option>
                                        <option value="complicated">Complicated</option>
                                        <option value="other">Other</option>
                                    </select>
                                    @error('status')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                            </div>
                       </div>
                       <h3 style="color: #ccc;">Account Address</h3>
                       <hr>
                      <div class="row" >
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label>Address</label>
                                   <input type="text"  value="{{ $teacher->detail->address }}" placeholder="Enter Address" name="address" class="form-control">
                                   @error('address')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                           </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label>Street</label>
                                   <input type="text"  value="{{ $teacher->detail->street }}" placeholder="Enter Street"  name="street" class="form-control">
                                   @error('street')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                           </div>
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label >City</label>
                                   <input type="text"  value="{{ $teacher->detail->city }}" placeholder="Enter City" name="city" class="form-control">
                                   @error('city')<p class="message-error"> {{ $message }}</p>@enderror
                                </div>
                           </div>
                           <div class="col-md-4">
                            <div class="form-group">
                                <label>Province</label>
                                <input type="text"  value="{{ $teacher->detail->province }}" placeholder="Enter Province" name="province" class="form-control">
                                @error('province')<p class="message-error"> {{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nationality</label>
                                <input type="text"  value="{{ $teacher->detail->nationality }}" placeholder="Filipino"  name="nationality" class="form-control">
                                @error('nationality')<p class="message-error"> {{ $message }}</p>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name="role" id="">
                                    <option value="teacher">Teacher</option>
                                    <option value="admin">Administrator</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-info">Update Teacher <i class="fa fa-check"></i></button>
                        </div>
                      </div>
                    </form>
                </div>
           </div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top: 20px;">
        <a href="{{ route('admin.teacher.index') }}" class="btn btn-default">Back</i></a>
     </div>
</div>
<script>
 $(document).ready( function () {
    // $('#teacherschedule-table').DataTable();
} );
</script>
@endsection
