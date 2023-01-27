
<ul style="list-style-type:none; display:flex; gap:10px;">
    <li><a class="btn btn-default {{ Route::is('admin.student.index')?'active':''}}" href="{{ route('admin.student.index') }}">All Student</a></li>
    <li><a class="btn btn-default {{ Route::is('admin.student.verify')?'active':''}}" href="{{ route('admin.student.verify') }}">Verify Student</a></li>
    <li><a class="btn btn-default {{ Route::is('admin.student.hasfile')?'active':''}}" href="{{ route('admin.student.hasfile') }}">Transferee Data</a></li>
    <li><a class="btn btn-default {{ Route::is('admin.student.hasnofile')?'active':''}}"href="{{ route('admin.student.hasnofile') }}">No Transferee Data</a></li>
    <li><a class="btn btn-default {{ Route::is('admin.student.dropped')?'active':''}}"href="{{ route('admin.student.dropped') }}">Dropped</a></li>
</ul>
