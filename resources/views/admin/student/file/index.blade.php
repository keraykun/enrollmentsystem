@extends('admin.layouts.admin')
@section('layout')

<div class="row">
    <div class="col-lg-12">
    <div class="col-lg-6">
        <h1 class="page-header">Fullname : <u><span>{{ $student->detail->lastname.' '.$student->detail->middlename.' '.$student->detail->firstname }}</span></u></h1>
        <h2 class="page-header"><span>ID NO: <u>{{ str_pad($student->id, 10,0, STR_PAD_LEFT); }}</u></span></h2>
        <h2 class="page-header"><span>{{Str::ucfirst( $student->role) }}</span></h2>
    </div>
    <div class="col-lg-6" >
               <img style="float:right; width: 20%" src="{{ asset('images/main/agdaologo.jpg') }}" >
           </div>
           </div>
   		 </div>
 <style>
    #input-uploadpdf{
        opacity: 0;
        position: absolute;
        top: 0;
        cursor: grab;
    }
    #label-uploadpdf{
        cursor: grab;
        padding: 10px;
        border: 4px dotted #ccc;
    }
 </style>
    <div class="row" style="margin-top: 30px;">
            <div class="col-lg-10" >
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
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; padding:10px;">
                    <div class="card-header">
                      @if($student->file!=null)
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Status : </span><span>{{ Str::ucfirst($student->data->status) }}</span></li>
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Transferee File : </span><span>{{ $student->file->name }}</span></li>
                        <li class="list-group-item"><span style="display:flex; justify-content:space-between; font-weight: bold; letter-spacing:1px; margin-right:10px;">
                            <a href="{{ route('admin.student.file.show',['student'=>$student->id,'file'=>$student->file->id]) }}" class="btn btn-info">Show File</a>
                            <form method="POST" action="{{ route('admin.student.file.destroy',$student->file->id) }}">
                               @csrf
                               {{ method_field('delete') }}
                               <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </li>
                      </ul>
                    @else
                    <ul class="list-group list-group-flush">
                      <form method="POST" enctype="multipart/form-data" action="{{ route('admin.student.file.create',$student->id) }}">
                        @csrf
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">Status : </span><span>{{ Str::ucfirst($student->data->status) }}</span></li>
                        <li class="list-group-item"><span style="position:relative; font-weight: bold; letter-spacing:1px; margin-right:10px;">
                            <label id="label-uploadpdf" for="input-uploadpdf">Upload File PDF</label>
                            <input accept="application/pdf" name="file" id="input-uploadpdf" type="file" class="form-control">
                            @error('file')
                                <p style="color:red;">{{ $message }}</p>
                            @enderror
                        </span></li>
                        <li class="list-group-item"><span style="font-weight: bold; letter-spacing:1px; margin-right:10px;">
                        <button type="submit" class="btn btn-success">Upload</button>
                        </li>
                      </form>
                      </ul>
                    @endif
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 20px;">
                <a href="{{ URL::previous() }}" class="btn btn-default">Back</i></a>
             </div>
    </div>
</div>
<script>
 $(document).ready( function () {
    // $('#teacherschedule-table').DataTable();
} );
</script>
@endsection
