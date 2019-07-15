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
    <link rel="stylesheet" href="{{asset('vendor/datatables/datatables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/timepicker/jquery.timepicker.min.css')}}">
    <script src="{{asset('vendor/timepicker/jquery.timepicker.min.js')}}"></script>
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
        .text-white{
            color:#fff;
        }
        .mt-3{
            margin-top:5px;
        }
        #toast-success > .toast:before {
            font-size: 18px;
        }
        .modal-open .modal{
            background:#0000001f;
        }
        .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    right: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.form-control > option{
    line-height: 20px;
    }
    .alert-danger{
        background: #db524b9c;
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
                            <img src="{{asset($admins['profile'])}}" width="35" class="img-circle" alt="">
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
                <li>
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
                    <ul id="users" class="nav nav-second collapse">
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
                <li class="active">
                    <a href="#subject" data-toggle="collapse" aria-haspopup="true" aria-expanded="true">
                        <span class="pe pe-7s-notebook icons"></span>
                        Subject<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="subject" class="nav nav-second collapse in">
                        <li><a href="/admin/subject/section">Section</a></li>
                        <li><a href="/admin/subject/class">Class</a></li>
                        <li class="active"><a href="/admin/subject/schedule">Schedule</a></li>
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
                    <ul id="pages" class="nav nav-second collapse">
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
<div class="loader" style="background:#1d212b8f; position: fixed; z-index: 1; width: 100%; height: 100%; display: none;">
            <i class="fa fa-spinner fa-spin" style="font-size:50px; color:#fff; position: relative; top:40%; left:50%;"></i>
        </div>

    <!-- Main content-->
    <section class="content">
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger" style="display: none; background: #db524bba;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <!-- append -->
                            </div>
                    </div>
                </div>
                <a class="btn btn-default" href="/admin/subject/schedule"><span class="pe pe-7s-back"></span>Back To Schedule</a>
                <br>
                <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-filled">
                        <div class="panel-body">

                            <div class="row">
                                
                                <div class="col-md-3">
                                    <div class="media">
                                        <h2 class="m-t-xs m-b-none">
                                           {{$child['sectionName']}}
                                        </h2>
                                        <small>
                                            {{$child['description']}}
                                        </small>
                                    </div>
                                    <br>
                                    <a class="btn btn-default" data-toggle="modal" data-target="#addschedule">Add Subject Schedule</a>

                                </div>
                                <div class="col-md-3">
                                    <table class="table small m-t-sm">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <strong class="c-white">
                                                    {{$child['adviser']}}
                                                <!--   -->
                                                </strong><br> Adviser
                                            </td>
                                            <td>
                                                <strong class="c-white">
                                                    <span class="label label-primary">Grade {{$child['level']}}</span>
                                                    <!--   -->
                                                </strong> <br>Section Level
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="c-white">
                                                   Room {{$child['room']}} 
                                                   <!--   -->
                                                </strong><br> Room Number
                                                
                                            </td>
                                            <td>
                                                <strong class="c-white">
                                            {{$child['students']['studentsCount']}}/{{$child['capacity']}}
                                                   <!--                                                      0
                                                     -->
                                                </strong><br>Capacity
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong class="c-white">
                                                    @if(!empty($totalsched))
                                                    {{$totalsched}}
                                                    @else
                                                    0
                                                    @endif/10
                                                </strong><br>
                                                Total Subjects
                                            </td>
                                            <td>
                                                <strong class="c-white">
                                                    @if($child['status'] == 'Open')
                                                    <span class="label label-success">Open</span>
                                                    @elseif($child['status'] == 'Close')
                                                     <span class="label label-danger">Close</span>
                                                    @endif
                                                </strong>
                                                <br>Status
                                            </td>
                                        </tr>
                                        
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-3 m-t-sm"></div>
                                <div class="col-md-3 m-t-sm">
                                <span class="c-white">
                                    <strong>More</strong> Information
                                </span>
                                    <br>
                                    <small>
                                        Mauaque Resettlement A Highschool Institution in Mauaque 1st gate, Mabalacat City, Pampanga
                                            © 2018
                                    </small>
                                    <div class="btn-group m-t-sm">
                                        <a href="#" class="btn btn-default btn-sm"><i class="fa fa-user-plus "></i> Assign Adviser</a>
                                        <a href="#" class="btn btn-default btn-sm"><i class="fa fa-edit "></i> Edit Section</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                
                            </div>
                            Primary Subject Schedule
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table cellpadding="1" cellspacing="1" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Day</th>
                                        <th>Instructor</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tb">
                            @if(!empty($schedules))
                                @foreach($schedules as $plan)
                                    @if($plan['category'] == 'Primary')
                                    <tr class="sched{{$plan['id']}}">
                                        <td>{{$plan['subject']}}</td>
                                        <td>
                                        @if($plan['start'] == 7.00)
                                            07:00 AM
                                        @elseif($plan['start'] == 7.50)
                                       <option value="7.50">07:30 AM</option>
                                       @elseif($plan['start'] == 8.00)
                                       <option value="8.00">08:00 AM</option>
                                       @elseif($plan['start'] == 8.50)
                                       <option value="8.50">08:30 AM</option>
                                       @elseif($plan['start'] == 9.00)
                                       <option value="9.00">09:00 AM</option>
                                       @elseif($plan['start'] == 9.50)
                                       <option value="9.50">09:30 AM</option>
                                       @elseif($plan['start'] == 10.00)
                                       <option value="10.00">10:00 AM</option>
                                       @elseif($plan['start'] == 10.50)
                                       <option value="10.50">10:30 AM</option>
                                       @elseif($plan['start'] == 11.00)
                                       <option value="11.00">11:00 AM</option>
                                       @elseif($plan['start'] == 11.50)
                                       <option value="11.50">11:30 AM</option>
                                       @elseif($plan['start'] == 12.00)
                                       <option value="12.00">12:00 PM</option>
                                       @elseif($plan['start'] == 12.50)
                                       <option value="12.50">12:30 PM</option>
                                       @elseif($plan['start'] == 13.00)
                                       <option value="13.00">01:00 PM</option>
                                       @elseif($plan['start'] == 13.50)
                                       <option value="13.50">01:30 PM</option>
                                       @elseif($plan['start'] == 14.00)
                                       <option value="14.00">02:00 PM</option>
                                       @elseif($plan['start'] == 14.50)
                                       <option value="14.50">02:30 PM</option>
                                       @elseif($plan['start'] == 15.00)
                                       <option value="15.00">03:00 PM</option>
                                       @elseif($plan['start'] == 15.50)
                                       <option value="15.50">03:30 PM</option>
                                       @elseif($plan['start'] == 16.00)
                                       <option value="16.00">04:00 PM</option>
                                       @elseif($plan['start'] == 16.50)
                                       <option value="16.50">04:30 PM</option>
                                       @elseif($plan['start'] == 17.00)
                                       <option value="17.00">05:00 PM</option>
                                       @elseif($plan['start'] == 17.50)
                                       <option value="17.50">05:30 PM</option>
                                       @elseif($plan['start'] == 18.00)
                                       <option value="18.00">06:00 PM</option>
                                        @endif
                                        </td>
                                        <td>@if($plan['end'] == 7.00)
                                            07:00 AM
                                        @elseif($plan['end'] == 7.50)
                                       <option value="7.50">07:30 AM</option>
                                       @elseif($plan['end'] == 8.00)
                                       <option value="8.00">08:00 AM</option>
                                       @elseif($plan['end'] == 8.50)
                                       <option value="8.50">08:30 AM</option>
                                       @elseif($plan['end'] == 9.00)
                                       <option value="9.00">09:00 AM</option>
                                       @elseif($plan['end'] == 9.50)
                                       <option value="9.50">09:30 AM</option>
                                       @elseif($plan['end'] == 10.00)
                                       <option value="10.00">10:00 AM</option>
                                       @elseif($plan['end'] == 10.50)
                                       <option value="10.50">10:30 AM</option>
                                       @elseif($plan['end'] == 11.00)
                                       <option value="11.00">11:00 AM</option>
                                       @elseif($plan['end'] == 11.50)
                                       <option value="11.50">11:30 AM</option>
                                       @elseif($plan['end'] == 12.00)
                                       <option value="12.00">12:00 PM</option>
                                       @elseif($plan['end'] == 12.50)
                                       <option value="12.50">12:30 PM</option>
                                       @elseif($plan['end'] == 13.00)
                                       <option value="13.00">01:00 PM</option>
                                       @elseif($plan['end'] == 13.50)
                                       <option value="13.50">01:30 PM</option>
                                       @elseif($plan['end'] == 14.00)
                                       <option value="14.00">02:00 PM</option>
                                       @elseif($plan['end'] == 14.50)
                                       <option value="14.50">02:30 PM</option>
                                       @elseif($plan['end'] == 15.00)
                                       <option value="15.00">03:00 PM</option>
                                       @elseif($plan['end'] == 15.50)
                                       <option value="15.50">03:30 PM</option>
                                       @elseif($plan['end'] == 16.00)
                                       <option value="16.00">04:00 PM</option>
                                       @elseif($plan['end'] == 16.50)
                                       <option value="16.50">04:30 PM</option>
                                       @elseif($plan['end'] == 17.00)
                                       <option value="17.00">05:00 PM</option>
                                       @elseif($plan['end'] == 17.50)
                                       <option value="17.50">05:30 PM</option>
                                       @elseif($plan['end'] == 18.00)
                                       <option value="18.00">06:00 PM</option>
                                        @endif</td>
                                        <td>{{$plan['day']}}</td>
                                        <td>{{$plan['instructor']}}</td>
                                        <td style="width: 25%;"><button class="btn btn-default" style="margin-right: 5px;" data-toggle="modal" data-target="#edit{{$plan['id']}}"><span class="fa fa-edit"></span></button><button class="btn btn-default" data-toggle="modal" data-target="#delete{{$plan['id']}}"><span class="fa fa-trash"></span></button></td>
                                    </tr>
                                        @endif
                                    @endforeach
                            @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                
                                
                            </div>
                            Secondary Subject Schedule
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table cellpadding="1" cellspacing="1" class="table table-bordered">
                                    <thead>
                                    <tr>
                                         <th>Subject</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Day</th>
                                        <th>Instructor</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="td">
                                @if(!empty($schedules))
                                @foreach($schedules as $plan)
                                    @if($plan['category'] == 'Secondary')
                                    <tr class="sched{{$plan['id']}}">
                                        <td>{{$plan['subject']}}</td>
                                        <td>{{$plan['start']}}</td>
                                        <td>{{$plan['end']}}</td>
                                        <td>{{$plan['day']}}</td>
                                        <td>{{$plan['instructor']}}</td>
                                        <td style="width: 25%;"><button class="btn btn-default" style="margin-right: 5px;" data-toggle="modal" data-target="#edit{{$plan['id']}}"><span class="fa fa-edit"></span></button><button class="btn btn-default" data-toggle="modal" data-target="#delete{{$plan['id']}}"><span class="fa fa-trash"></span></button></td>
                                    </tr>
                                        @endif
                                    @endforeach
                            @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End main content-->
</div>

<!-- addschedule modal -->
<div class="modal fade" id="addschedule" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Add Subject Schedule</h4>
                                                <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                            </div>
                                            <form id="section-modal">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="alert alert-danger alert-dismissible" role="alert" id="error1" style="display: none;">
                                                        
                                                        </div>
                                                    <input class="form-control" type="number" name="section_id" value="{{$child['section_id']}}" style="display: none;">
                                                    
                                                   <div class="form-group">
                                                       <label for="#sectioname">Subject *</label>
                                                       <select class="form-control" name="subject" autofocus>
                                                        <option value="">Subject</option>
                                                        @if(!empty($subjects))
                                                                @foreach($subjects as $sub)
                                                                    @if($sub['level'] == $child['level'])
                                                                <option value="{{$sub['name']}}" sub-id="{{$sub['subject_id']}}">
                                                                {{$sub['name']}}</option>
                                                                @endif
                                                               @endforeach
                                                           @endif
                                                       </select>
                                                       <small class="mt-3">ex. ITS-1</small>
                                                   </div>
                                                   <div class="form-group">
                                                       <label for="#description">Subject Category *</label>
                                                       <select class="form-control" name="category" required>
                                                            <option value="">Category</option>
                                                            <option value="Primary">Primary Subject</option>
                                                            <option value="Secondary">Secondary Subject</option>
                                                       </select>
                                                   </div>
                                                   <div class="form-group">
                                                       <label for="#description">Available Subject Teacher *</label>
                                                       <select class="form-control" name="teacher" required>
                                                        <option value="">Subject Teacher</option>
                                                        @if(!empty($teachers))
                                                            @foreach($teachers as $teach)
                                                                @if($teach['role'] == 'Teacher')
                                                                <option value="{{$teach['teacher_id']}}">{{$teach['firstname']}} {{$teach['lastname']}}</option>
                                                                @endif
                                                            @endforeach
                                                           @endif
                                                       </select>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                           <label for="#level">Subject Start *</label>
                                                           <select class="form-control" name="start" required>
                                                               <option value="">--:-- --</option>
                                                               <option value="7.00">07:00 AM</option>
                                                               <option value="7.50">07:30 AM</option>
                                                               <option value="8.00">08:00 AM</option>
                                                               <option value="8.50">08:30 AM</option>
                                                               <option value="9.00">09:00 AM</option>
                                                               <option value="9.50">09:30 AM</option>
                                                               <option value="10.00">10:00 AM</option>
                                                               <option value="10.50">10:30 AM</option>
                                                               <option value="11.00">11:00 AM</option>
                                                               <option value="11.50">11:30 AM</option>
                                                               <option value="12.00">12:00 PM</option>
                                                               <option value="12.50">12:30 PM</option>
                                                               <option value="13.00">01:00 PM</option>
                                                               <option value="13.50">01:30 PM</option>
                                                               <option value="14.00">02:00 PM</option>
                                                               <option value="14.50">02:30 PM</option>
                                                               <option value="15.00">03:00 PM</option>
                                                               <option value="15.50">03:30 PM</option>
                                                               <option value="16.00">04:00 PM</option>
                                                               <option value="16.50">04:30 PM</option>
                                                               <option value="17.00">05:00 PM</option>
                                                               <option value="17.50">05:30 PM</option>
                                                               <option value="18.00">06:00 PM</option>
                                                           </select>
                                                           <small>for section which grade it is. grade level list grade 1 to K-12</small>
                                                            </div>
                                                       </div>
                                                       
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                           <label for="#level">Subject End *</label>
                                                           <select class="form-control" name="end" required>
                                                               <option value="">--:-- --</option>
                                                               <option value="7.00">07:00 AM</option>
                                                               <option value="7.50">07:30 AM</option>
                                                               <option value="8.00">08:00 AM</option>
                                                               <option value="8.50">08:30 AM</option>
                                                               <option value="9.00">09:00 AM</option>
                                                               <option value="9.50">09:30 AM</option>
                                                               <option value="10.00">10:00 AM</option>
                                                               <option value="10.50">10:30 AM</option>
                                                               <option value="11.00">11:00 AM</option>
                                                               <option value="11.50">11:30 AM</option>
                                                               <option value="12.00">12:00 PM</option>
                                                               <option value="12.50">12:30 PM</option>
                                                               <option value="13.00">01:00 PM</option>
                                                               <option value="13.50">01:30 PM</option>
                                                               <option value="14.00">02:00 PM</option>
                                                               <option value="14.50">02:30 PM</option>
                                                               <option value="15.00">03:00 PM</option>
                                                               <option value="15.50">03:30 PM</option>
                                                               <option value="16.00">04:00 PM</option>
                                                               <option value="16.50">04:30 PM</option>
                                                               <option value="17.00">05:00 PM</option>
                                                               <option value="17.50">05:30 PM</option>
                                                               <option value="18.00">06:00 PM</option>
                                                           </select>
                                                           <small>for section which grade it is. grade level list grade 1 to K-12</small>
                                                            </div>
                                                       </div>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                           <label for="#level">Day *</label>
                                                           <select class="form-control" name="day" required>
                                                               <option value=" "></option>
                                                               <option value="Monday">Monday</option>
                                                               <option value="Tuesday">Tuesday</option>
                                                               <option value="Wednesday">Wednesday</option>
                                                               <option value="Thursday">Thursday</option>
                                                               <option value="Friday">Friday</option>
                                                               <option value=" "></option>
                                                               <option value="Regular">Regular</option>
                                                               <option value="TTH">TTH</option>
                                                               <option value="MWF">MWF</option>
                                                           </select>
                                                           <small>for section which grade it is. grade level list grade 1 to K-12</small>
                                                            </div>
                                                       </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-accent" id="addsched">Add Schedule</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="{{asset('vendor/datatables/datatables.min.js')}}"></script>


<!-- App scripts -->
<script src="{{asset('scripts/luna.js')}}"></script>

<script>
    $(document).ready(function() {
        
        $('.close').click(function(){
                            $('.alert-danger').css({'display': 'none'});
                        });
        $('#addsched').click(function(e){
            e.preventDefault();

            
            $('#addschedule').modal('hide');
            $('.loader').fadeIn();
            var sub_id = $('select[name=subject] option:selected').attr('sub-id');

            $.ajax({
                type: 'POST',
                url: '/admin/subject/schedule/manageschedule/add',
                data: {
                    '_token': $('input[name=_token]').val(), section_id: $('input[name=section_id]').val(), subject_id: sub_id, subject: $('select[name=subject]').val(), category: $('select[name=category]').val(), teacher: $('select[name=teacher]').val(), timestart: $('select[name=start]').val(), timeend: $('select[name=end]').val(), day: $('select[name=day]').val()
                },
                dataType:'json',
                 success: function(data){
                    console.log(data);
                    
                    if(data.timeend == '7.00'){
                        var timeend = '07:00 AM';
                    }else if(data.timeend == '7.50'){
                        var timeend = '07:30 AM';
                    }else if(data.timeend == '8.00'){
                        var timeend = '08:00 AM';
                    }else if(data.timeend == '8.50'){
                        var timeend = '08:30 AM';
                    }else if(data.timeend == '9.00'){
                        var timeend = '09:00 AM';
                    }else if(data.timeend == '9.50'){
                        var timeend = '09:30 AM';
                    }else if(data.timeend == '10.00'){
                        var timeend = '10:00 AM';
                    }else if(data.timeend == '10.50'){
                        var timeend = '10:30 AM';
                    }else if(data.timeend == '11.00'){
                        var timeend = '11:00 AM';
                    }else if(data.timeend == '11.50'){
                        var timeend = '11:30 AM';
                    }else if(data.timeend == '12.00'){
                        var timeend = '12:00 PM';
                    }else if(data.timeend == '12.50'){
                        var timeend = '12:30 PM';
                    }else if(data.timeend == '13.00'){
                        var timeend = '01:00 PM';
                    }else if(data.timeend == '13.50'){
                        var timeend = '01:30 PM';
                    }else if(data.timeend == '14.00'){
                        var timeend = '02:00 PM';
                    }else if(data.timeend == '14.50'){
                        var timeend = '02:30 PM';
                    }else if(data.timeend == '15.00'){
                        var timeend = '03:00 PM';
                    }else if(data.timeend == '15.50'){
                        var timeend = '03:30 PM';
                    }else if(data.timeend == '16.00'){
                        var timeend = '04:00 PM';
                    }else if(data.timeend == '16.50'){
                        var timeend = '04:30 PM';
                    }else if(data.timeend == '17.00'){
                        var timeend = '05:00 PM';
                    }else if(data.timeend == '17.50'){
                        var timeend = '05:30 PM';
                    }else if(data.timeend == '18.00'){
                        var timeend = '06:30 PM';
                    }

                    if(data.timestart == '7.00'){
                        var timestart = '07:00 AM';
                    }else if(data.timestart == '7.50'){
                        var timestart = '07:30 AM';
                    }else if(data.timestart == '8.00'){
                        var timestart = '08:00 AM';
                    }else if(data.timestart == '8.50'){
                        var timestart = '08:30 AM';
                    }else if(data.timestart == '9.00'){
                        var timestart = '09:00 AM';
                    }else if(data.timestart == '9.50'){
                        var timestart = '09:30 AM';
                    }else if(data.timestart == '10.00'){
                        var timestart = '10:00 AM';
                    }else if(data.timestart == '10.50'){
                        var timestart = '10:30 AM';
                    }else if(data.timestart == '11.00'){
                        var timestart = '11:00 AM';
                    }else if(data.timestart == '11.50'){
                        var timestart = '11:30 AM';
                    }else if(data.timestart == '12.00'){
                        var timestart = '12:00 PM';
                    }else if(data.timestart == '12.50'){
                        var timestart = '12:30 PM';
                    }else if(data.timestart == '13.00'){
                        var timestart = '01:00 PM';
                    }else if(data.timestart == '13.50'){
                        var timestart = '01:30 PM';
                    }else if(data.timestart == '14.00'){
                        var timestart = '02:00 PM';
                    }else if(data.timestart == '14.50'){
                        var timestart = '02:30 PM';
                    }else if(data.timestart == '15.00'){
                        var timestart = '03:00 PM';
                    }else if(data.timestart == '15.50'){
                        var timestart = '03:30 PM';
                    }else if(data.timestart == '16.00'){
                        var timestart = '04:00 PM';
                    }else if(data.timestart == '16.50'){
                        var timestart = '04:30 PM';
                    }else if(data.timestart == '17.00'){
                        var timeend = '05:00 PM';
                    }else if(data.timestart == '17.50'){
                        var timestart = '05:30 PM';
                    }else if(data.timestart == '18.00'){
                        var timestart = '06:30 PM';
                    }


                    if(data.errors){
                        $('div[id=error1]').fadeIn();
                            $('div[id=error1]').replaceWith('<div class="alert alert-danger alert-dismissible" role="alert" id="error1">'+ data.errors +
                                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                                            '<span aria-hidden="true">&times;</span>' +
                                                          '</button>' +
                                                        '</div>');
                        toastr.error(
                        $.each(data.errors, function(key, value){
                        '<p>' + value + '</p>'
                        
                      }), 'Invalid Input');
                        $('#addschedule').modal('show');
                    }else{
                        if(data.fail_subject){
                            $('#addschedule').modal('show');
                            toastr.error(data.fail_subject, 'Already Exist');
                            $('div[id=error1]').fadeIn();
                            $('div[id=error1]').replaceWith('<div class="alert alert-danger alert-dismissible" role="alert" id="error1">'+ data.fail_subject +
                                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                                            '<span aria-hidden="true">&times;</span>' +
                                                          '</button>' +
                                                        '</div>');
                        }else{
                            if(data.conflict){
                                toastr.error(data.conflict, 'Schedule conflict');
                                $('#addschedule').modal('show');
                                $('div[id=error1]').fadeIn();
                                $('div[id=error1]').replaceWith('<div class="alert alert-danger alert-dismissible" role="alert" id="error1">'+ data.conflict +
                                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                                            '<span aria-hidden="true">&times;</span>' +
                                                          '</button>' +
                                                        '</div>');
                            }else{
                                $('#addschedule').modal('hide');
                                $('div[id=error1]').hide();
                                toastr.success('Created a Subject Schedule', 'Time Schedule');
                                    if(data.category == 'Primary'){
                                        $('#tb').append('<tr class="'+data.id+'">'+
                                                    '<td>'+data.subject+'</td>'+
                                                    '<td>'+ timestart +'</td>'+
                                                    '<td>'+ timeend +'</td>'+
                                                    '<td>'+data.day +'</td>'+
                                                    '<td>'+data.teacher_name+'</td>'+
                                                    '<td style="width:25%;"><button class="btn btn-default" style="margin-right: 5px;" data-toggle="modal" data-target="#edit'+data.id+'"><span class="fa fa-edit"></span></button><button class="btn btn-default" data-toggle="modal" data-target="#delete'+data.id+'"><span class="fa fa-trash"></span></button></td>'+
                                                '</tr>');
                                    }
                                    else if(data.category == 'Secondary'){
                                        $('#td').append('<tr class="'+data.id+'">'+
                                                    '<td>'+data.subject+'</td>'+
                                                    '<td>'+ timestart +'</td>'+
                                                    '<td>'+ timeend +'</td>'+
                                                    '<td>'+data.day +'</td>'+
                                                    '<td>'+data.teacher_name+'</td>'+
                                                    '<td style="width:25%;"><button class="btn btn-default" style="margin-right: 5px;" data-toggle="modal" data-target="#edit'+data.id+'"><span class="fa fa-edit"></span></button><button class="btn btn-default" data-toggle="modal" data-target="#delete'+data.id+'"><span class="fa fa-trash"></span></button></td>'+
                                                '</tr>');
                                    }
                            }
                        }
                        
                    }
                    
                 },
                 complete: function(){
              $('.loader').fadeOut();
            }
            });
        });
        $("body").on('click', '.editsection', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            $('.loader').fadeIn();
            $('.editmodal').modal('hide');
            $.ajax({
                type: 'POST',
                url: '/admin/subject/section/editsection/' + id,
                data: {
                    '_token': $('input[name=_token]').val(), updatename: $('input[name=updatename]').val(), updatedescription: $('textarea[name=updatedescription]').val(), updatelevel: $('select[name=updatelevel]').val(), updateroom: $('input[name=updateroom]').val(), updatestatus: $('select[name=updatestatus]').val()
                },
                success:function(data){
                   $.each(data.errors, function(key, value){
                        $('.alert-danger').show();
                        $('.alert-danger').append('<p>'+value+'</p>'); 
                      });
                   if(data.errors){

                   }else{
                    console.log(data);
                    toastr.warning('Successfully: Updated ' + data.updatename, 'Time Schedule');
                    $('.sections'+data.id).replaceWith('<tr class="sections'+data.id+'"><td>'+ data.id +'</td>' +
                                        '<td>' + data.updatename +'</td>' +
                                        '<td>' + data.updatedescription +'</td>' +
                                        '<td>' + data.updateroom + '</td>' +
                                        '<td><span class="label label-primary">Grade ' + data.updatelevel + '</span></td>' +
                                        '<td>' + (data.updatestatus == 'Open'? '<span class="label label-success">' + data.updatestatus + '</span>' : '<span class="label label-danger">' + data.updatestatus + '</span>')      
                                     + '</td>' +
                                        '<td><button class="btn btn-primary" style="margin-right: 5px;"><span class="fa fa-edit" data-toggle="modal" data-target="#edit'+ data.id +'"></span></button><button class="btn btn-danger" data-toggle="modal" data-target="#delete'+ data.id +'"><span class="fa fa-trash"></span></button></td></tr>');
                   }
                },
                 complete: function(){
              $('.loader').fadeOut();
            }
            });
        });

        $("body").on('click', '.deletesection', function(e){
            e.preventDefault();
            $('.loader').fadeIn();
            $('.deletemodal').modal('hide');
            var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: '/admin/subject/section/deletesection/' + id,
                data : {
                    '_token': $('input[name=_token]').val(),
                },
                dataType: 'json',
                success:function(data){
                    toastr.error('Successfully: Deleted the section !', 'Removed');
                    console.log(data);
                    $('.sections'+ data.id).remove();
                },
                 complete: function(){
              $('.loader').fadeOut();
            }
            });
        });

 
       toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": true,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        } 
       


    });
</script>

</body>

</html>
@else
  <script>window.location = "/admin/login";</script>
@endif