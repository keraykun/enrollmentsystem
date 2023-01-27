<!DOCTYPE html>
<html lang="en">
<head>
  <title>Agdao School</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    table {
        border-left: 0.01em solid #ccc;
        border-right: 0;
        border-top: 0.01em solid #ccc;
        border-bottom: 0;
        border-collapse: collapse;
    }
    table td,
    table th {
        border-left: 0;
        border-right: 0.01em solid #ccc;
        border-top: 0;
        border-bottom: 0.01em solid #ccc;
    }
    th,td{
      font-family: sans-serif;
      padding: 10px 6px;
      color:  #36454F;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    </style>
</head>
<body>

<div class="container" style="padding: 30px;">
  <table class="table table-bordered">
    <thead>
    <tr>
        <th colspan="5" style="text-align:center; border-right:none;">
            <h3 style="font-size: 1.5rem;">Agdaon National High School </h3>
        </th>
        <th style="border-left: none;">
            <img height="80" src="{{public_path().'/images/main/agdaologo.jpg'}}">
        </th>
    </tr>
    <tr>
        <th>Name</th>
        <th colspan="1" style="text-align: left; font-weight:normal;">{{  $student->detail->firstname.' '.$student->detail->middlename.' '.$student->detail->lastname }}</th>
        <th>ID</th>
        <th colspan="1" style="text-align: left; font-weight:normal;">{{ str_pad($student->id ,10,0,STR_PAD_LEFT); }}</th>
        <th>Contact</th>
        <th colspan="1" style="text-align: left; font-weight:normal;">{{ $student->detail->contact }}</th>
    </tr>
    <tr>
        <th>Address</th>
        <th colspan="5" style="text-align: left; font-weight:normal;">{{ $student->detail->address.' '.$student->detail->street.' , '.$student->detail->city.' , '.$student->detail->province }}</th>
    </tr>
    <tr>
        <th>Department</th>
        <th colspan="5" style="text-align: left; font-weight:normal;">{{ $student->academic->department->name }}</th>
    </tr>
    <tr>
        <th>Grade / Year</th>
        <th colspan="3" style="text-align: left; font-weight:normal;">{{ $student->academic->year->name }}</th>
        <th>Academics</th>
        <th colspan="1" style="text-align: left; font-weight:normal;">{{ $student->academic->start_year }} - {{ $student->academic->end_year }}</th>
    </tr>
      <tr align="left" style="font-size: 1.2rem;">
        <th height="30" colspan="2"></th>
        <th height="30" align="left" style="padding-left: 40px !important" colspan="4">Schedule</th>
      </tr>
      <tr>
        <th>Code</th>
        <th>Subject</th>
        <th>Day</th>
        <th>Time</th>
        <th>Room</th>
        <th>Teacher</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($student->academic->schedules as $schedule)
        <tr align="center">
            <td>{{ $schedule->teacher_schedule->yearlevel->name }}</td>
            <td>{{ $schedule->teacher_schedule->subject->name }}</td>
            <td>{{ $schedule->teacher_schedule->schedule->day }}</td>
            <td>{{ date('h:i a',strtotime($schedule->teacher_schedule->schedule->start_time)).' ~ '.date('h:i a',strtotime($schedule->teacher_schedule->schedule->end_time)) }}</td>
            <td>{{ $schedule->teacher_schedule->section->name }}</td>
            <td>{{ $schedule->teacher_schedule->teacher->firstname??''}} {{ $schedule->teacher_schedule->teacher->middlename??'' }} {{  $schedule->teacher_schedule->teacher->lastname??'' }}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
