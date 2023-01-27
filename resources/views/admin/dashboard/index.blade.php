@extends('admin.layouts.admin')
@section('layout')

<div class="row" style="padding: 0px 10px;">
    <div class="col-md-6">
        <div>
            <p style="color:rgb(128, 126, 126);font-weight:bold; font-size:2;"> <i class="fa fa-users">
                </i> Total Students: {{ number_format($count) }}</p>
            <canvas id="lineChart"></canvas>
        </div>
    </div>

    <div class="col-md-6">
        <div>
            <div style="display: flex; justify-content:space-between">
                @foreach ($bar[0] as $key => $value)
                    @if ($value=='dropped')
                    <p style="color:rgb(128, 126, 126);font-weight:bold; font-size:2;">
                        <i class="fa fa-users"></i> Total Students Dropped: {{ number_format($bar[1][$key]) }}
                    </p>
                    @elseif ($value=='regular')
                    <p style="color:rgb(128, 126, 126);font-weight:bold; font-size:2;">
                        <i class="fa fa-users"></i> Total Students Regular: {{ number_format($bar[1][$key]) }}
                    </p>
                    @elseif ($value=='transferee')
                    <p style="color:rgb(128, 126, 126);font-weight:bold; font-size:2;">
                        <i class="fa fa-users"></i> Total Students Transferee: {{ number_format($bar[1][$key]) }}
                    </p>
                    @endif
                @endforeach
            </div>
            <canvas id="barChart"></canvas>
        </div>
    </div>
</div>


<style>
.dashboard-list{
    margin: 10px;
    color: white !important;
    display: flex;
    padding: 5px 10px;
    align-items: center;
    color:#000;
    letter-spacing: 1px;
    border-radius: 5px;
    font-family: sans-serif;
}
</style>

<div class="row" style="padding: 0px 10px;">
    <div class="col-md-4">
        <a href="{{ route('admin.student.verify') }}" class="dashboard-list" style="background: #f55742;">
            <div style="margin-right:10px;">
                <i style="font-size: 2rem;" class="fa fa-users"></i>
            </div>
            <div>
                <h5 style="font-weight: bold;">Student Verify</h5>
                <h5 style="font-weight: bold;">Total : {{ $student[0] }}</h5>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.student.hasfile') }}" class="dashboard-list" style="background: #12c7bb;">
            <div style="margin-right:10px;">
                <i style="font-size: 2rem;" class="fa fa-file"></i>
            </div>
            <div>
                <h5 style="font-weight: bold;">Student Transferee Data</h5>
                <h5 style="font-weight: bold;">Total :  {{ $student[1] }}</h5>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a href="{{ route('admin.student.hasnofile') }}" class="dashboard-list" style="background: #c929cc;">
            <div style="margin-right:10px;">
                <i style="font-size: 2rem;" class="fa fa-file-excel-o"></i>
            </div>
            <div>
                <h5 style="font-weight: bold;">Student No Transferee Data</h5>
                <h5 style="font-weight: bold;">Total :  {{ $student[2] }}</h5>
            </div>
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

const line = document.getElementById('lineChart');
new Chart(line, {
    type: 'line',
    data: {
    labels: @json($line[0]),
    datasets: [{
        label: 'Students Enrolled',
        data: @json($line[1]),
        borderWidth: 4,
        borderColor: '#00cc00',
        backgroundColor:'#385c1c',
        hoverOffset: 4,
    }]
    },
    options: {
    scales: {
        y: {
        beginAtZero: true
        }
    }
    }
});

const bar = document.getElementById('barChart');
new Chart(bar, {
    type: 'bar',
    data: {
    labels: @json($bar[0]),
    datasets: [{
        label: 'Students',
        data: @json($bar[1]),
        borderWidth: 1,
        backgroundColor:[
        '#f55742',
        '#00cc00',
        '#49248a'
        ],
        borderColor:[
        '#f55742',
        '#00cc00',
        '#49248a'
        ],

    }]
    },
    options: {
    scales: {
        y: {
        beginAtZero: true
        }
    }
    }
});
</script>

@endsection
