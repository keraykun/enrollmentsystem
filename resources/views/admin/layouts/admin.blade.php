<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<style></style>

     <!-- Bootstrap Core CSS -->

<link rel="stylesheet" href="{{ asset('css/admin/css/bootstrap.min.css') }}">



<!-- MetisMenu CSS -->


<link rel="stylesheet" href="{{ asset('css/admin/css/metisMenu.css') }}">


<!-- Timeline CSS -->


<link rel="stylesheet" href="{{ asset('css/admin/css/timeline.css') }}">

<!-- Custom CSS -->

<link rel="stylesheet" href="{{ asset('css/admin/css/sb-admin-2.css') }}">
<!-- Morris Charts CSS -->

<link rel="stylesheet" href="{{ asset('css/admin/css/morris.css') }}">

<!-- Custom Fonts -->

<link rel="stylesheet" href="{{ asset('css/admin/font/css/font-awesome.css') }}">

<!-- DataTables CSS -->


<link rel="stylesheet" href="{{ asset('css/admin/css1/bootstrap-datetimepicker.css') }}">

<link rel="stylesheet" href="{{ asset('css/admin/css1/datepicker.css') }}">

<link rel="stylesheet" href="{{ asset('css/admin/css/costum.css') }}">

<link rel="stylesheet" href="{{ asset('css/admin/css1/ekko-lightbox.css') }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
{{-- <link rel="stylesheet" href="{{ asset('css/admin/css/modal.css')}}"> --}}
<style>
    .active{
        background: #428bca !important;
        color:white !important;
    }
    a.paginate_button.current{
        background: #428bca !important;
        border: solid 1px  #428bca !important;

    }
    .paginate_button{
        background-color: #fff !important;
        border: 1px solid #ddd !important;
    }

    a.paginate_button.previous,a.paginate_button.next{
               cursor: not-allowed;
    }
    .ended-subject:hover{
        opacity: 1 !important;
        transition: 500ms ease-in;
    }
</style>
</head>

<body style="width:100%; height:100vh;" >

   <div id="wrapper" style="100%;">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top  " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  href="" >
                <img src="{{ asset('images/main/agdaologo.jpg') }}" height="23">
                Agdao Integrated School</a>
            </div>

            <br/>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <div class="display:flex; flex-direction:column;">
                        <div style="font-weight:700; padding:5px 15px; font-size:1.6rem; color:rgb(147, 94, 94)">{{ Auth::user()->detail->firstname.' '.Auth::user()->detail->middlename.' '.Auth::user()->detail->lastname }}</div>
                    </div>
                    <ul class="nav" id="side-menu">
                        <li >
                            <a class="{{ Route::is('admin.dashboard.*')?'active':''}}" href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard fa-fw "></i> Dashboard</a>
                        </li>
                        <li>
                            <a class="{{ Route::is('admin.subject.*')?'active':''}} "  href="{{ route('admin.subject.index') }}" ><i class="fa  fa-book fa-fw"></i>  Subject</a>
                        </li>
                        <li>
                            <a class="{{ Route::is('admin.yearlevel.*')?'active':''}} "  href="{{ route('admin.yearlevel.index') }}" ><i class="fa  fa-level-up fa-fw"></i>  Subject Year </a>
                        </li>
                        <li>
                             <a class="{{ Route::is('admin.department.*')?'active':''}} "  href="{{ route('admin.department.index') }}" ><i class="fa  fa-building fa-fw"></i>  Department</a>
                         </li>
                        <li>
                            <a class="{{ Route::is('admin.section.*')?'active':''}} "  href="{{ route('admin.section.index') }}" ><i class="fa  fa-graduation-cap fa-fw"></i> Section/Room </a>
                       </li>

                        <li>
                            <a class="{{ Route::is('admin.schedule.*')?'active':''}} "  href="{{ route('admin.schedule.index') }}" ><i class="fa  fa-clock-o fa-fw"></i>  Schedule </a>
                        </li>
                        <li>
                            <a  class="{{ Route::is('admin.teacherschedule.*')?'active':''}} " href="{{ route('admin.teacherschedule.index') }}"><i class="fa fa-book fa-fw"></i>Teacher Schedule </a>
                       </li>
                            <li>
                             <a class="{{ Route::is('admin.student.*')?'active':''}}" href="{{ route('admin.student.index') }}" ><i class="fa fa-group fa-fw"></i>  Students </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('admin.teacher.*')?'active':''}}" href="{{ route('admin.teacher.index') }}" ><i class="fa fa-group fa-fw"></i>  Teachers </a>
                        </li>
                        <li>
                            <a class="{{ Route::is('admin.setting.*')?'active':''}}" href="{{ route('admin.setting.index') }}" ><i class="fa fa-cog fa-fw"></i>  Setting </a>
                        </li>
                        <li>
                            <a class="" href="{{ route('guest.logout') }}" ><i class="fa fa-power-off fa-fw"></i>  Sign Out </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
            <div id="page-wrapper" style="padding: 30px;">
            <!--content-->

            @yield('layout')

            <!--end content-->

            <!-- /.row -->
         </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
</body>
</html>
