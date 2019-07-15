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
                        <li class="active"><a href="/admin/subject/section">Section</a></li>
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
                               <p id="errorz"></p>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-photo-gallery"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Section</h3>
                                <small>
                                    “Education is not just about going to school and getting a degree. It's about widening<br> your knowledge and absorbing the truth about life.” 
                                </small>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-filled">
                            <div class="panel-body">
                                <div class="header-title">
                                <h3 class="m-b-xs">Create Section</h3>
                                <p class=""><span class="text-white">Tips</span>: Press create your section and after your section has been created add as subject <br>by order and set the section specific time and what grade level.</p>
                                </div><br/>
                                 <button class="btn btn-default" data-toggle="modal" data-target="#createsection">Create Section</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <!-- create modal -->
                <div class="modal fade" id="createsection" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Create Sections</h4>
                                                <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                            </div>
                                            <form id="section-modal">
                                                @csrf
                                                <div class="modal-body">
                                                   <div class="form-group">
                                                       <label for="#sectioname">Section Name *</label>
                                                       <input type="text" id="sectionname" class="form-control" placeholder="Enter Section Name" name="name" autofocus required>
                                                       <small class="mt-3">ex. ITS-1</small>
                                                   </div>
                                                   <div class="form-group">
                                                       <label for="#description">Section Description *</label>
                                                       <textarea class="form-control" id="description" name="description" placeholder="Enter Section Description" required></textarea>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                           <label for="#level">Grade Level *</label>
                                                           <select class="form-control" id="level" name="level">
                                                               <option value="">Select Level</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="11">Grade 11</option>
                                                                <option value="12">Grade 12</option>
                                                           </select>
                                                           <small>for section which grade it is. grade level list grade 1 to K-12</small>
                                                            </div>
                                                       </div>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-md-6">
                                                            <div class="form-group">
                                                               <label for="#roomNumber">Room Number *</label>
                                                               <input type="text" id="roomNumber" class="form-control" placeholder="Enter Room Number" name="room" required>
                                                               <small class="mt-3">ex. 102</small>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-md-6">
                                                            <div class="form-group">
                                                               <label for="#capacity">Capacity *</label>
                                                               <input type="number" id="capacity" class="form-control" min="1" max="60" placeholder="Max Capacity" name="capacity" required>
                                                               <small class="mt-3">ex. 31</small>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                           <label for="#status">Section Status *</label>
                                                           <select class="form-control" id="status" name="status" required>
                                                               <option value="">Status</option>
                                                               <option value="Open">Open</option>
                                                               <option value="Close">Close</option>
                                                           </select>
                                                           <small>to restrict entry to designated date.</small>
                                                            </div>
                                                       </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-accent" id="addsection">Add Section</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end create -->

                                <!-- content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-filled">
                            <div class="panel-body">
                                <div class="table-responsive">

                                <table id="tableExample3" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Section Name</th>
                                        <th>Section Description</th>
                                        <th>Room Number</th>
                                        <th>Grade Level</th>
                                        <th>Capacity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tablebod">
                                @if(!empty($sections))
                                    @foreach($sections as $sect)
                                    <tr class="sections{{$sect['id']}}">
                                        <td>{{$sect['id']}}</td>
                                        <td>{{$sect['sectionName']}}</td>
                                        <td style="width: 25%;">{{$sect['description']}}</td>
                                        <td>{{$sect['room']}}</td>
                                        <td><span class="label label-primary">Grade {{$sect['level']}}</span></td>
                                        <td>{{$sect['students']['studentsCount']}}/{{$sect['capacity']}}</td>
                                        <td>@if($sect['status'] == 'Open')
                                            <span class="label label-success">{{$sect['status']}}</span>
                                            @else
                                            <span class="label label-danger">{{$sect['status']}}</span>
                                            @endif
                                        </td>
                                        <td><button class="btn btn-default" style="margin-right:5px;" data-toggle="modal" data-target="#edit{{$sect['id']}}"><span class="fa fa-edit"></span></button>
                                            <button class="btn btn-default" data-toggle="modal" data-target="#delete{{$sect['id']}}"><span class="fa fa-trash"></span></button></td>
                                    </tr>
                                    <div class="modal fade editmodal" id="edit{{$sect['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Edit Sections</h4>
                                                <small>"You could edit the section of your choice depending of the type of the changes."</small>
                                            </div>
                                            <form id="section-modal">
                                                @csrf
                                                <div class="modal-body">
                                                   <div class="form-group">
                                                       <label for="#sectioname">Section Name *</label>
                                                       <input type="text" id="sectionname" class="form-control" placeholder="Enter Section Name" name="updatename{{$sect['id']}}" autofocus  value="{{$sect['sectionName']}}" required>
                                                       <small class="mt-3">ex. ITS-1</small>
                                                   </div>
                                                   <div class="form-group">
                                                       <label for="#description">Section Description *</label>
                                                       <textarea class="form-control" id="description" name="updatedescription{{$sect['id']}}" placeholder="Enter Section Description" required>{{$sect['description']}}</textarea>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                           <label for="#level">Grade Level *</label>
                                                           <select class="form-control" id="level" name="updatelevel{{$sect['id']}}">
                                                               <option value="">Select Level</option>
                                                               @if($sect['level'] == '1')
                                                                <option value="1" selected>Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="11">Grade 11</option>
                                                                <option value="12">Grade 12</option>
                                                                @elseif($sect['level'] == '2')
                                                                <option value="2" selected>Grade 2</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="11">Grade 11</option>
                                                                <option value="12">Grade 12</option>
                                                                @elseif($sect['level'] == '3')
                                                                <option value="3" selected>Grade 3</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="11">Grade 11</option>
                                                                <option value="12">Grade 12</option>
                                                                @elseif($sect['level'] == '4')
                                                                <option value="4" selected>Grade 4</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="11">Grade 11</option>
                                                                <option value="12">Grade 12</option>
                                                                @elseif($sect['level'] == '5')
                                                                <option value="5" selected>Grade 5</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="11">Grade 11</option>
                                                                <option value="12">Grade 12</option>
                                                                @elseif($sect['level'] == '6')
                                                                <option value="6" selected>Grade 6</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="11">Grade 11</option>
                                                                <option value="12">Grade 12</option>
                                                                @elseif($sect['level'] == '7')
                                                                <option value="7" selected>Grade 7</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="11">Grade 11</option>
                                                                <option value="12">Grade 12</option>
                                                                @elseif($sect['level'] == '8')
                                                                <option value="8" selected>Grade 8</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="11">Grade 11</option>
                                                                <option value="12">Grade 12</option>
                                                                @elseif($sect['level'] == '9')
                                                                <option value="9" selected>Grade 9</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="11">Grade 11</option>
                                                                <option value="12">Grade 12</option>
                                                                @elseif($sect['level'] == '10')
                                                                <option value="10" selected>Grade 10</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="11">Grade 11</option>
                                                                <option value="12">Grade 12</option>
                                                                @elseif($sect['level'] == '11')
                                                                <option value="11" selected>Grade 11</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="12">Grade 12</option>
                                                                @elseif($sect['level'] == '12')
                                                                <option value="12" selected>Grade 12</option>
                                                                <option value="1">Grade 1</option>
                                                                <option value="2">Grade 2</option>
                                                                <option value="3">Grade 3</option>
                                                                <option value="4">Grade 4</option>
                                                                <option value="5">Grade 5</option>
                                                                <option value="6">Grade 6</option>
                                                                <option value="7">Grade 7</option>
                                                                <option value="8">Grade 8</option>
                                                                <option value="9">Grade 9</option>
                                                                <option value="10">Grade 10</option>
                                                                <option value="11">Grade 11</option>
                                                                @endif
                                                           </select>
                                                           <small>for section which grade it is. grade level list grade 1 to K-12</small>
                                                            </div>
                                                       </div>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-md-6">
                                                            <div class="form-group">
                                                               <label for="#roomNumber">Room Number *</label>
                                                               <input type="text" id="roomNumber" class="form-control" placeholder="Enter Room Number" name="updateroom{{$sect['id']}}" value="{{$sect['room']}}" required>
                                                               <small class="mt-3">ex. 102</small>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-md-6">
                                                            <div class="form-group">
                                                               <label for="#editcapacity">Section Capacity *</label>
                                                               <input type="number" min="1" max="50" id="editcapacity" class="form-control" placeholder="Enter Capacity Number" name="updatecapacity{{$sect['id']}}" value="{{$sect['capacity']}}" required>
                                                               <small class="mt-3"></small>
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="row">
                                                       <div class="col-md-4">
                                                           <div class="form-group">
                                                           <label for="#status">Section Status *</label>
                                                           <select class="form-control" id="status" name="updatestatus{{$sect['id']}}" required>
                                                               <option value="">Status</option>
                                                               @if($sect['status'] == 'Open')
                                                               <option value="Open" selected>Open</option>
                                                               <option value="Close">Close</option>
                                                               @elseif($sect['status'] == 'Close')
                                                               <option value="Open">Open</option>
                                                               <option value="Close" selected>Close</option>
                                                               @endif
                                                           </select>
                                                           <small>to restrict entry to designated date.</small>
                                                            </div>
                                                       </div>
                                                   </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary editsection" id="{{$sect['id']}}">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end edit modal -->

                                <!-- delete modal -->
                            <div class="mydelete">
                                <div class="modal fade deletemodal" id="delete{{$sect['id']}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Delete Section</h4>
                                                <small>Tips :Be aware on what you are deleting.</small>
                                            </div>
                                            <div class="modal-body text-center">
                                                <p>Are you sure you want to delete ? Section <strong class="text-white">{{$sect['sectionName']}}</strong></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger deletesection" id="{{$sect['id']}}">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- end delete modal -->
                                  
                                        @endforeach
                                    @endif                       
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
<!-- 
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-filled">

                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-3 col-xs-6 text-center">
                                    <h2 class="no-margins">
                                        534
                                    </h2>
                                    <span class="c-white">Commits</span> in last week
                                </div>
                                <div class="col-md-3 col-xs-6 text-center">
                                    <h2 class="no-margins">
                                        126
                                    </h2>
                                    <span class="c-white">Public</span> gists
                                </div>
                                <div class="col-md-3 col-xs-6 text-center">
                                    <h2 class="no-margins">
                                        680
                                    </h2>
                                    <span class="c-white">New code</span> line
                                </div>
                                <div class="col-md-3 col-xs-6 text-center">
                                    <h2 class="no-margins">
                                        14
                                    </h2>
                                    <span class="c-white">New</span> builds
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </div> -->
                
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="{{asset('vendor/datatables/datatables.min.js')}}"></script>
<script src="{{asset('vendor/push/push.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('scripts/luna.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.close').click(function(){
                            $('.alert-danger').css({'display': 'none'});
                        });
        $('#addsection').click(function(e){
            e.preventDefault();
            $('#createsection').modal('hide');
            $('.loader').fadeIn();
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                      }
                  });
            $.ajax({
                type: 'POST',
                url: '/admin/subject/section/addsection',
                data: {
                    '_token': $('input[name=_token]').val(), sectionname: $('input[name=name]').val(), description: $('textarea[name=description]').val(), level: $('select[name=level]').val(), room: $('input[name=room]').val(), capacity: $('input[name=capacity]').val(), status: $('select[name=status]').val()
                },
                dataType:'json',
                 success: function(data){
                    if(data.errors){
                        $('.loader').fadeOut();
                        $('.alert-danger').show();
                        $('.alert-danger').replaceWith( '<div class="alert alert-danger" style="background: #db524bba;"><h5>Validation Error</h5>' + data.errors[0] + '</div>');
                        toastr.error(data.errors[0], 'Validation Error');
                        console.log(value);
                   
                    }else{
                         if(data.errorName){
                            $('.alert-danger').show();
                            $('.alert-danger').replaceWith( '<div class="alert alert-danger" style="background: #db524bba;"><h5>Validation Error</h5>' + data.errorName + '</div>');
                            toastr.error(data.errorName, 'Validation Error');
                         }else{
                            if(data.errorRoom){
                            $('.alert-danger').show();
                            $('.alert-danger').replaceWith( '<div class="alert alert-danger" style="background: #db524bba;"><h5>Validation Error</h5>' + data.errorRoom + '</div>');
                            toastr.error(data.errorRoom, 'Validation Error');
                            }else{
                            $('.alert-danger').hide();
                            Push.create('New Section Alert !', {
                            body: 'Created a section ' + data.sectionname,
                            icon: '{{asset($admins['profile'])}}',
                            timeout: 6000,
                            onClick: function () {
                                window.focus();
                                window.location = "/admin/notification";
                            }
                        });
                        $('#tablebod').append('<tr class="sections' + data.id + '">'+
                                        '<td>'+ data.id +'</td>' +
                                        '<td>' + data.sectionname +'</td>' +
                                        '<td style="width: 25%;">' + data.description +'</td>' +
                                        '<td>' + data.room + '</td>' +
                                        '<td><span class="label label-primary">Grade ' + data.level + '</span></td>' +
                                        '<td>' + data.count + '/' + data.capacity + '</td>' +
                                        '<td>' + (data.status == 'Open'? '<span class="label label-success">' + data.status + '</span>' : '<span class="label label-danger">' + data.status + '</span>')      
                                     + '</td>' +
                                        '<td><button class="btn btn-default" style="margin-right: 5px;"><span class="fa fa-edit" data-toggle="modal" data-target="#edit'+ data.id +'"></span></button><button class="btn btn-default" data-toggle="modal" data-target="#delete'+ data.id +'"><span class="fa fa-trash"></span></button></td>' +
                                    '</tr>');
                        $('.mydelete').append('<div class="modal fade deletemodal" id="delete'+ data.id +'" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">'+
                                    '<div class="modal-dialog modal-sm">'+
                                        '<div class="modal-content">'+
                                            '<div class="modal-header text-center">'+
                                                '<h4 class="modal-title">Delete Section</h4>'+
                                                '<small>Tips :Be aware on what you are deleting.</small>'+
                                            '</div>'+
                                            '<div class="modal-body text-center">'+
                                                '<p>Are you sure you want to delete ? Section <strong class="text-white">'+data.sectionname+'</strong></p>'+
                                            '</div>'+
                                            '<div class="modal-footer">'+
                                                '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'+
                                                '<button type="button" class="btn btn-danger deletesection" id="'+data.id+'">Delete</button>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>');
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
                    '_token': $('input[name=_token]').val(), updatename: $('input[name=updatename'+id+']').val(), updatedescription: $('textarea[name=updatedescription'+id+']').val(), updatelevel: $('select[name=updatelevel'+id+']').val(), updateroom: $('input[name=updateroom'+id+']').val(), updatecapacity: $('input[name=updatecapacity'+id+']').val(), updatestatus: $('select[name=updatestatus'+id+']').val()
                },
                success:function(data){
                   
                   if(data.errors){
                    $('.loader').fadeOut();
                        $('.alert-danger').show();
                        $('.alert-danger').replaceWith( '<div class="alert alert-danger" style="background: #db524bba;"><h5>Validation Error</h5>' + data.errors[0] + '</div>');
                        toastr.error(data.errors[0], 'Validation Error');
                   }else{
                        if(data.errorcapacity){
                            $('.alert-danger').show();
                             $('.alert-danger').replaceWith( '<div class="alert alert-danger" style="background: #db524bba;"><h5>Validation Error</h5>' + data.errorcapacity + '</div>');
                             toastr.error(data.errorcapacity, 'Validation Error');
                        }else{
                            $('.alert-danger').hide();
                            console.log(data);
                    
                        Push.create('Updated Section', {
                                body: 'Updated Successful ' + data.updatename,
                                icon: '{{asset($admins['profile'])}}',
                                timeout: 6000,
                                onClick: function () {
                                    window.focus();
                                    window.location = "/admin/notification";
                                }
                            });
                        $('.sections'+data.id).replaceWith('<tr class="sections'+data.id+'"><td>'+ data.id +'</td>' +
                                            '<td>' + data.updatename +'</td>' +
                                            '<td style="width: 25%;">' + data.updatedescription +'</td>' +
                                            '<td>' + data.updateroom + '</td>' +
                                            '<td><span class="label label-primary">Grade ' + data.updatelevel + '</span></td>' +
                                            '<td>'+ data.count + '/' + data.updatecapacity +'</td><td>' + (data.updatestatus == 'Open'? '<span class="label label-success">' + data.updatestatus + '</span>' : '<span class="label label-danger">' + data.updatestatus + '</span>')      
                                         + '</td>' +
                                            '<td><button class="btn btn-default" style="margin-right:5px;" data-toggle="modal" data-target="#edit'+data.id+'"><span class="fa fa-edit"></span></button>'+
                                                '<button class="btn btn-default" data-toggle="modal" data-target="#delete'+data.id+'"><span class="fa fa-trash"></span></button></td></tr>');
                        }
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
                    
                    Push.create('Deleted Section', {
                            body: 'Deleted the section.',
                            icon: '{{asset($admins['profile'])}}',
                            timeout: 6000,
                            onClick: function () {
                                window.focus();
                                window.location = "/admin/notification";
                            }
                        });
                    console.log(data);
                    $('.sections'+ data.id).remove();
                },
                 complete: function(){
              $('.loader').fadeOut();
            }
            });
        });

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
        $('#tableExample3').DataTable({
            ordering:  false,
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
            ]
        });

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