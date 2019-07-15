@if(session()->has('email'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>Mauaque Resettlement Highschool</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/animate.css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/toastr/toastr.min.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="icon" href="{{ asset('images/favicon-96x96.png') }}">

    <!-- App styles -->

    <link rel="stylesheet" href="{{asset('styles/pe-icons/pe-icon-7-stroke.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/pe-icons/helper.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/stroke-icons/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
    <style type="text/css">
    .luna-nav.nav .nav-second li > a{
        margin:0px;
        transition: .5s;
    }
        .luna-nav.nav .nav-second li > a:hover{
            margin-left:15px;
            color:#fff;
        }
        a:hover >.active{
            margin-left:0px !important;
        }
        #subject>li,  #users>li, 
        #grades>li, #taskmanager>li, 
        #account>li, #pages>li, 
        #agenda>li, #notification>li{
            background:#282b33;
        }
        .dropdown-menu{
            border:0px;
            min-width: 205px;
        }
        .nav .open > a, .nav .open > a:hover, .nav .open > a:focus{
            background:#fff !important;
        }
        .dropdown-menu > li > .logout{
            color:#fff;
            padding:8px 20px;
             margin-bottom: -5px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        }
        .dropdown-menu > li> .logout:hover{
            background: #eaa01f;
            color:#fff; 
        }
        .dropdown-menu > .li-logout{
            background: #f6a821;
            margin-bottom: -5px;
            border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    
        }
        .modal-open .modal{
            background: #222222ab;
        }
    </style>
</head>
<body>

<!-- Wrapper-->
<div class="wrapper">

    <!-- Header-->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <div id="mobile-menu">
                    <div class="left-nav-toggle">
                        <a href="#">
                            <i class="stroke-hamburgermenu"></i>
                        </a>
                    </div>
                </div>
                <a class="navbar-brand" href="/">
                    MRHS
                    <span>v.1.0</span>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <div class="left-nav-toggle">
                    <a href="">
                        <i class="stroke-hamburgermenu"></i>
                    </a>
                </div>
                <form class="navbar-form navbar-left">
                    <input type="text" class="form-control" placeholder="Search data for analysis" style="width: 175px">
                </form>

                <ul class="nav navbar-nav navbar-right">
                    
                    <li class=" profil-link">
                        <a href="login.html" data-toggle="dropdown">
                            <span class="profile-address">{{$admins['email']}}</span>
                            <img src="{{asset($admins['profile'])}}" width="35" height="35" class="img-circle" alt="">
                        </a>
                        <ul class="dropdown-menu">
                                    <li><a href="/admin/account/profile">Profile</a></li>
                                    <li><a href="#">Messages</a></li>
                                    <li><a href="/admin/notification">Notifications</a></li>
                                    <li class="divider"></li>
                                    <li class="li-logout"><a class="logout" href="/admin/logout">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End header-->

    <!-- Navigation-->
    <aside class="navigation">
        <nav>
            <ul class="nav luna-nav">
                <li class="nav-category">
                    General
                </li>
                <li class="active">
                    <a href="/admin"><span class="pe pe-7s-home icons"></span>Dashboard</a>
                </li>
                <li>
                    <a href="/admin/message"><span class="pe pe-7s-chat icons"></span>Message</a>
                </li>
                <li>
                    <a href="#notification" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-bell icons"></span>
                        Notification<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                        <span class="badge pull-right">2</span>
                    </a>
                    <ul id="notification" class="nav nav-second collapse">
                        <li><a href="/admin/notification">Notification <span class="badge pull-right">2</span></a></li>
                        <li><a href="/admin/notification-settings">Setting</a></li>
                    </ul>
                </li>
                <li class="nav-category">
                   Academics
                </li>
                <li>
                    <a href="#users" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-users icons"></span>
                        Users<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="users" class="nav nav-second collapse in">
                        <li><a href="/admin/users">Users</a></li>
                        <li><a href="/admin/users/admin">Admin</a></li>
                        <li><a href="/admin/users/students">Student</a></li>
                        <li><a href="/admin/users/teachers">Teacher</a></li>
                        <li><a href="/admin/users/parents">Parent</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#taskmanager" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-graph1 icons"></span>
                        Task Manager<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="taskmanager" class="nav nav-second collapse">
                        <li><a href="/admin/taskmanager/account">Account</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#subject" data-toggle="collapse" aria-haspopup="true" aria-expanded="true">
                        <span class="pe pe-7s-notebook icons"></span>
                        Subject<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="subject" class="nav nav-second collapse in">
                        <li><a href="/admin/subject/section">Section</a></li>
                        <li><a href="/admin/subject/class">Class</a></li>
                        <li><a href="/admin/subject/schedule">Schedule</a></li>
                        <li><a href="/admin/subject">Subject</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#grades" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-bookmarks icons"></span>
                        Grades<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="grades" class="nav nav-second collapse">
                        <li><a href="/admin/grades">Grades</a></li>
                        <li><a href="/admin/grades/grading-system">Grading System</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#events" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-star icons"></span>
                        Events <span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="events" class="nav nav-second collapse">
                        <li><a href="/admin/events/events&program">Event/Program</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#account" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-config icons"></span>
                        Account<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="account" class="nav nav-second collapse">
                        <li><a href="/admin/account/profile">Profile</a></li>
                        <li><a href="/admin/account/account-settings">Account Settings</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#pages" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-copy-file icons"></span>
                        Pages <span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="pages" class="nav nav-second collapse in">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">List</a></li>
                        <li><a href="#">Timeline</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#agenda" data-toggle="collapse" aria-expanded="false">
                        <span class="fa fa-calendar-check-o icons"></span>
                        Agenda <span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="agenda" class="nav nav-second collapse">
                        <li><a href="/admin/agenda/events">Events</a></li>
                        <li><a href="/admin/agenda/program">Program</a></li>
                        <li><a href="/admin/agenda/news">News</a></li>
                        <li><a href="/admin/agenda/announcement">Announcement</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#database" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-server icons"></span>
                        Database <span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="database" class="nav nav-second collapse">
                        <li><a href="/admin/database/export">Export</a></li>
                    </ul>
                </li>  
                <li class="nav-info">
                    <i class="pe pe-7s-science text-accent"></i>
                    <div class="m-t-xs">
                        <span class="c-white">Wekonek</span> "WE" as a family connecting to become one and to make your life easier with <strong>wekonek</strong>.
                    </div>
                </li>
            </ul>
        </nav>
    </aside>
    <!-- End navigation-->


    <!-- Main content-->
    <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-home"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Dashboard</h3>
                                <small>
                                    “A performance dashboard is a practical tool to improve management effectiveness and efficiency,<br/> not just a pretty retrospective picture in an annual report.” 
                                </small>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-2 col-xs-6" data-toggle="tooltip" data-placement="bottom" title="Total Users">
                        <div class="panel panel-filled">
                            <div class="panel-body">
                                <h2 class="m-b-none">
                                    <span id="totalusers">0</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +20%</span>
                                </h2>
                                <div class="small">Total Users</div>
                                @if(!empty($mydaterecents))
                                <div class="slight m-t-sm"><i class="fa fa-clock-o"> </i> Updated: <span class="c-white"><time class="timeago" datetime="{{$mydaterecents}}"></time></span>  </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6" data-toggle="tooltip" data-placement="top" title="Total Students">
                        <div class="panel panel-filled">
                            <div class="panel-body">
                                <h2 class="m-b-none">
                                    <span id="totalstudents">0</span> <span class="slight"><i class="fa fa-play fa-rotate-90 c-white"> </i> 5%</span>
                                </h2>
                                <div class="small">Total students</div>
                                @if(!empty($firsts))
                                <div class="slight m-t-sm"><i class="fa fa-clock-o"> </i> Updated: <span class="c-white"><time class="timeago1" datetime="{{$firsts}}"></time></span></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="panel panel-filled">
                            <div class="panel-body">
                                <h2 class="m-b-none">
                                    <span id="totalteachers">0</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +56%</span>
                                </h2>
                                <div class="small">Total Employees</div>
                                @if(!empty($seconds))
                                <div class="slight m-t-sm"><i class="fa fa-clock-o"> </i> Updated: <span class="c-white"><time class="timeago2" datetime="{{$seconds}}"></time></span> </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-6">
                        <div class="panel panel-filled">
                            <div class="panel-body">
                                <h2 class="m-b-none">
                                    <span id="totalparents">0</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> +18%</span>
                                </h2>
                                <div class="small">Total parents</div>
                                @if(!empty($thirds))
                                <div class="slight m-t-sm"><i class="fa fa-clock-o"> </i> Updated: <span class="c-white"><time class="timeago3" datetime="{{$thirds}}"></time></span> </div>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-xs-12">
                        <div class="panel panel-filled" style="position:relative;height: 114px">
                            <div style="position: absolute;bottom: 0;left: 0;right: 0">
                                <span class="sparkline"></span>
                            </div>
                            <div class="panel-body">
                                <div class="m-t-sm">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-xs">See locations</a>
                                    </div>
                                    <div class="c-white"><span class="label label-accent">+45</span> New visitor</div>
                                    <span class="small c-white">120,312 <i class="fa fa-play fa-rotate-270 text-warning"> </i> -22%</span>
                                    <!--<span class="sparkline"></span>-->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel">
                            <div class="panel-body">
                                <h1 class="m-t-md m-b-xs" style="margin-top: 30px">
                                    <i class="pe pe-7s-global text-warning"> </i>
                                    <span id="analytics">0</span> <span class="slight"><i class="fa fa-play fa-rotate-270 text-warning"> </i> -22%</span>
                                </h1>
                                <div class="small">
                                    <span class="c-white">Total users</span> from the beginning of activity. See detailed charts for more information locations and traffic source.
                                </div>
                                <div class="m-t-sm">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <small class="c-white">
                                            </small>
                                            <div class="sparkline3"></div>
                                            <small class="slight">
                                            </small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="panel panel-filled">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel-body h-200 list">
                                        <div class="stats-title pull-left">
                                            <h4>Traffic source</h4>
                                        </div>
                                        <div class="m-t-xl">
                                            <small>
                                                More than 30% percent of users come from direct links. Check details page for more information.
                                            </small>
                                        </div>


                                        <div class="progress m-t-xs full progress-small">
                                            <div style="width: 35%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class=" progress-bar progress-bar-warning">
                                                <span class="sr-only">35% Complete (success)</span>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-6">
                                                <small class="stat-label">Today</small>
                                                <h4 class="m-t-xs">170,20 <i class="fa fa-level-up text-warning"></i></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <small class="stat-label">Last month %</small>
                                                <h4 class="m-t-xs">%20,20 <i class="fa fa-level-down c-white"></i></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="panel-body">
                                        <div class="text-center slight">
                                        </div>

                                        <div class="flot-chart" style="height: 160px;margin-top: 5px">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>

                                        <div class="small text-center">All active users from last month.</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-filled">
                            <div class="panel-heading">
                            Recent Added Users
                        </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>Profile</th>
                                            <th>ID number</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        	 @if(!empty($users))
                                            @foreach($recentU as $RecentUser)
                                        <tr>
                                            <td><a href="{{$RecentUser['profile']}}" data-toggle="lightbox"><img src="{{asset($RecentUser['profile'])}}" class="img-circle" width="35" height="35"></a></td>
                                            <td>{{$RecentUser['idnumber']}}</td>
                                            <td>{{$RecentUser['firstname']}}</td>
                                            <td>{{$RecentUser['lastname']}}</td>
                                            <td>@if($RecentUser['role'] == 'Student')
                                                <span class="label label-warning">{{$RecentUser['role']}}</span>
                                                @elseif($RecentUser['role'] == 'Teacher')
                                                <span class="label label-info">{{$RecentUser['role']}}</span>
                                                @elseif($RecentUser['role'] == 'Parent')
                                                <span class="label label-danger">{{$RecentUser['role']}}</span>
                                                @elseif($RecentUser['role'] == 'Admin')
                                                <span class="label label-success">{{$RecentUser['role']}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($RecentUser['status'] == 0)
                                                <span class="label label-primary">Offline</span>
                                                @else
                                                <span class="label label-success">Online</span>
                                                @endif
                                            </td> 
                                            <td><a href="#" class="btn btn-default btn-xs">View</a></td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="panel panel-filled">
                            <div class="panel-body text-center p-m">
                                <canvas id="myChart" width="269px" height="269px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
    </section>
    <!-- End main content-->
</div>

<!-- End wrapper-->

<!-- Vendor scripts -->
<script src="{{asset('vendor/pacejs/pace.min.js')}}"></script>
<script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/toastr/toastr.min.js')}}"></script>
<script src="{{asset('vendor/sparkline/index.js')}}"></script>
<script src="{{asset('vendor/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('vendor/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('vendor/flot/jquery.flot.spline.js')}}"></script>
<script src="{{asset('vendor/animateNumber/jquery.animateNumber.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="{{asset('js/chartjs/plugin.js')}}"></script>
<script src="vendor/lightbox/lightbox.js"></script>
<script src="{{asset('js/appscript.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('scripts/luna.js')}}"></script>

<script>
    function pulse(){
               $.ajax({
                  type: 'GET',
                  url: '/admin/heartbeat/{{$admins['email']}}',
                  success:function(response){
                    console.log(response.success);
                    setTimeout(pulse, 60000);
                  }
                });
              }
              pulse();

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
    $(document).ready(function () {
        @if(!empty($mydaterecents))
        $("time.timeago").timeago();
        @endif
    	@if(!empty($firsts))
        $("time.timeago1").timeago();
        @endif
        @if(!empty($seconds))
        $("time.timeago2").timeago();
        @endif
        @if(!empty($thirds))
        $("time.timeago3").timeago();
        @endif

        // Sparkline charts
        var sparklineCharts = function () {
            $(".sparkline").sparkline([20, 34, 43, 43, 35, 44, 32, 44, 52, 45], {
                type: 'line',
                lineColor: '#FFFFFF',
                lineWidth: 3,
                fillColor: '#404652',
                height: 47,
                width: '100%'
            });

            $(".sparkline7").sparkline([10, 34, 13, 33, 35, 24, 32, 24, 52, 35], {
                type: 'line',
                lineColor: '#FFFFFF',
                lineWidth: 3,
                fillColor: '#f7af3e',
                height: 75,
                width: '100%'
            });

            $(".sparkline1").sparkline([0, 6, 8, 3, 2, 4, 3, 4, 9, 5, 3, 4, 4, 5, 1, 6, 7, 15, 6, 4, 0], {
                type: 'line',
                lineColor: '#2978BB',
                lineWidth: 3,
                fillColor: '#2978BB',
                height: 170,
                width: '100%'
            });

            $(".sparkline3").sparkline([-8, 2, 4, 3, 5, 4, 3, 5, 5, 6, 3, 9, 7, 3, 5, 6, 9, 5, 6, 7, 2, 3, 9, 6, 6, 7, 8, 10, 15, 16, 17, 15], {

                type: 'line',
                lineColor: '#fff',
                lineWidth: 3,
                fillColor: '#393D47',
                height: 70,
                width: '100%'
            });

            $(".sparkline5").sparkline([0, 6, 8, 3, 2, 4, 3, 4, 9, 5, 3, 4, 4, 5], {
                type: 'line',
                lineColor: '#f7af3e',
                lineWidth: 2,
                fillColor: '#2F323B',
                height: 20,
                width: '100%'
            });
            $(".sparkline6").sparkline([0, 1, 4, 2, 2, 4, 1, 4, 3, 2, 3, 4, 4, 2, 4, 2, 1, 3], {
                type: 'bar',
                barColor: '#f7af3e',
                height: 20,
                width: '100%'
            });

            $(".sparkline8").sparkline([4, 2], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline9").sparkline([3, 2], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline10").sparkline([4, 1], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline11").sparkline([1, 3], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline12").sparkline([3, 5], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
            $(".sparkline13").sparkline([6, 2], {
                type: 'pie',
                sliceColors: ['#f7af3e', '#404652']
            });
        };

        var sparkResize;

        // Resize sparkline charts on window resize
        $(window).resize(function () {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineCharts, 100);
        });

        // Run sparkline
        sparklineCharts();


        // Flot charts data and options
        var data1 = [ [0, 16], [1, 24], [2, 11], [3, 7], [4, 10], [5, 15], [6, 24], [7, 30] ];
        var data2 = [ [0, 26], [1, 44], [2, 31], [3, 27], [4, 36], [5, 46], [6, 56], [7, 66] ];

        var chartUsersOptions = {
            series: {
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 1,
                    fill: 1

                }

            },
            grid: {
                tickColor: "#404652",
                borderWidth: 0,
                borderColor: '#404652',
                color: '#404652'
            },
            colors: [ "#f7af3e","#DE9536"]
        };
        

        $.plot($("#flot-line-chart"), [data2, data1], chartUsersOptions);

        var ctx = document.getElementById("myChart").getContext('2d');
Chart.defaults.global.animation.duration = 4000;

function timeout(){
    var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Student", "Teacher", "Parent"],
        datasets: [{
            label: '# of Votes',
            data: [{{$totalStudents}}, {{$totalTeachers}}, {{$totalParents}}],
            backgroundColor: [
                'rgba(247, 175, 62, 0.79)',
                'rgba(222, 149, 54, 0.82)',
                'rgba(197, 134, 51, 0.78)',
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        legend: {
            labels: {
                // This more specific font property overrides the global property
                fontColor: '#fff'
            }
        }
    }
});
}
setTimeout(timeout, 2800);
        $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });

        // Run toastr notification with Welcome message
        setTimeout(function(){
            toastr.options = {
                "positionClass": "toast-top-right",
                "closeButton": true,
                "progressBar": true,
                "showEasing": "swing",
                "timeOut": "6000"
            };
            toastr.warning('<strong>Welcome Back {{$admins['firstname']}}</strong> <br/><small>Powered By Wekonek. </small>');
        },1600)

    $('#totalusers').delay(4000).animateNumber({ number: {{$totalUsers}} },800);
        $('#totalstudents').delay(3500).animateNumber({ number: {{$totalStudents}} },800);
        $('#totalteachers').delay(3500).animateNumber({ number: {{$totalTeachers}} },800);
        $('#totalparents').delay(3500).animateNumber({ number: {{$totalParents}} },800);
        $('#analytics').delay(3500).animateNumber({ number: {{$totalUsers}}},800);



        


    });
</script>

</body>

</html>
@else
  <script>window.location = "/admin/login";</script>
@endif