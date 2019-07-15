@if(session()->has('email'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>Mauaque Resettlement HighSchool Master Admin</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.css')}}"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('vendor/animate.css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/toastr/toastr.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/datatables/datatables.min.css')}}"/>
    <link rel="icon" href="{{ asset('images/favicon-96x96.png') }}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('styles/pe-icons/pe-icon-7-stroke.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/pe-icons/helper.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/stroke-icons/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
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
                            <img src="{{asset($admins['profile'])}}" class="img-circle" alt="">
                        </a>
                        <ul class="dropdown-menu">
                                    <li><a href="/admin/account/profile">Profile</a></li>
                                    <li><a href="#">Messages</a></li>
                                    <li><a href="/admin/notification">Notifications</a></li>
                                    <li class="divider"></li>
                                    <li class="li-logout"><a class="logout" href="logout">Logout</a></li>
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
                        <span class="pe pe-7s-bell icons"></span>Notification<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
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
                <li  class="active">
                    <a href="#subject" data-toggle="collapse" aria-haspopup="true" aria-expanded="true">
                        <span class="pe pe-7s-notebook icons"></span>
                        Subject<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="subject" class="nav nav-second collapse in">
                        <li><a href="/admin/subject/section">Section</a></li>
                        <li><a href="/admin/subject/class">Class</a></li>
                        <li><a href="/admin/subject/schedule">Schedule</a></li>
                        <li  class="active"><a href="/admin/subject">Subject</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#grades" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-bookmarks icons"></span>
                        Grades<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="grades" class="nav nav-second collapse">
                        <li><a href="admin/grades">Grades</a></li>
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


    <!-- Main content-->
    <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="view-header">
                            <div class="pull-right text-right" style="line-height: 14px">
                            <small>Academics<br><span class="c-white">Subject</span></small>
                            </div>
                            <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-notebook"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Subject</h3>
                                <small>
                                    “A performance dashboard is a practical tool to improve management effectiveness and efficiency,<br/> not just a pretty retrospective picture in an annual report.” 
                                </small>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

            @if($errors->has('file'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <p><span class="pe pe-7s-attention"></span> Failed: {{$errors->first('fail')}}</p>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="top:-18px;">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
            @if(session()->has('fail'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <p><span class="pe pe-7s-attention"></span> Failed: {{session()->get('fail')}}</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="top:-18px;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-filled">
                            <div class="panel-body">
                                <div class="header-title">
                                <h3 class="m-b-xs">Create Subject</h3>
                                <small>
                                    “The best thing for being sad, replied Merlin, beginning to puff and blow, <br>is to learn something. That's the only thing that never fails.” 
                                </small><br/>
                                <br/>
                                <button class="btn btn-default" data-toggle="modal" data-target="#myModal">Create Subject</button>
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/admin/subject/create" method="POST" enctype="multipart/form-data">
                                                @csrf
                                            <div class="modal-body">
                                                    <div class="form-group" style="width: 100%;">
                                                        <label class="col-sm-2 control-label" for="exampleInputFile">Cover *</label> 
                                                        <div style="border-radius: 5px; margin: 0 auto; padding: 30px;">
                                                        <img src="" id="profile-img-tag" width="100%" style="border-radius: 5px;" />
                                                        </div>
                                                        <div style="width:50%; margin: 0 auto; padding-top:40px;">
                                                            <label for="profile-img" class="custom-file-upload"><span class="fa fa-upload"></span> Choose a file...</label>
                                                        <input type="file" name="file" id="profile-img">
                                                        <br>
                                                        <small>Image Dimension 1920 x 1080p</small>
                                                         </div>
                                                     </div>
                                                    <div class="form-group">
                                                        <label>Subject name *</label>
                                                        <input type="text" class="form-control" name="name" placeholder="Subject name" required autofocus>
                                                        <small>ex. Filipino2</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Grade Level *</label>
                                                        <select class="form-control" name="level" required>
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
                                                        <small>This indicates the level of the subjects. note that section with the same level subject can only view their corresponding grade level order.</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description *</label>
                                                        <textarea class="form-control" name="description" rows="5" placeholder="Subject Description" required></textarea>
                                                        <small>ex. Filipino2 Subject for the Grade 2 students etc.</small>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-accent createSubject">Save Subject</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div><br/>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                             <p>Subject List</p>
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                       
                        <div class="panel-body">
                            <p>
                                The Buttons library for DataTables provides a framework with common options and API that can be used with DataTables, but is also very extensible, recognising that you will likely want to use buttons which perform an action unique to your applications.
                            </p>
                            <div class="table-responsive">

                                <table id="adminslist" class="table table-hover cell-border">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject Name</th>
                                        <th>Description</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                @if(!empty($teacher))
                                   @foreach($teacher as $disabled)
                                    @if($disabled['disable'] == 1)
                                        <div class="modal fade" id="myModal{{$disabled['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Delete User</h4>
                                                <small>Sometimes you have to delete characters from a scene <br/>just to keep from overcrowding the image. "Scott Westerfeld"</small>
                                            </div>
                                            <div class="modal-body text-center">
                                            
                                                <h5>Are you sure you want to remove a <strong class="text-danger">{{$disabled['role']}}</strong> named <strong class="text-danger text-bold">{{$disabled['firstname']}}</strong> ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <a type="button" id="delete" class="btn btn-danger" data-loading-text="Deleting..." autocomplete="off" href="destroy/{{$disabled['id']}}">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <tr>
                                        <td><img src="{{asset($disabled['profile'])}}" width="35" style="border-radius:200px;"></td>
                                        <td>{{$disabled['id_number']}}</td>
                                        <td>{{$disabled['firstname']}}</td>
                                        <td>{{$disabled['lastname']}}</td>
                                        <td><span class="label label-success">{{$disabled['role']}}</span></td>
                                        <td><span class="label label-primary">offline</span></td>
                                        <td>{{$disabled['created_at']}}</td>
                                        <td>
                                             @if($disabled['disable'] == 1)
                                                <span class="label label-danger">Deactivated</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="/admin/edit/teachers/account/{{$disabled['id']}}" method="POST">
                                                @csrf
                                            <select name="account" class="form-control" onchange="this.form.submit()">
                                                @if($disabled['disable'] == 1)
                                                 <option value="0" >Enable</option>
                                                 <option selected>Disabled</option>
                                                 @endif
                                            </select>
                                            </form>
                                        </td>
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
                </div> -->
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 1</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '1')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 2</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '2')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 3</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '3')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 4</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '4')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 5</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '5')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 6</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '6')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 7</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '7')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 8</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '8')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 9</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '9')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 10</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '10')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 11</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '11')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="row">
                    <h4 style="font-weight: 100;">Grade 12</h4>
                    <hr>
                </div>
                @if(!empty($subjects))
                    @foreach($subjects as $subs)
                        @if($subs['level'] == '12')
                        <div class="col-lg-3 col-xs-6">
                            <div class="panel custom-filled">
                                <img class="img-card" src="{{asset($subs['image'])}}" width="100%" height="150px">
                                <div class="panel-body">
                                    <h4 class="m-b-none">
                                        {{$subs['name']}} <span class="slight"></span>
                                    </h4>
                                    <div class="small" style="margin-top:20px;">{{$subs['description']}}</div>
                                    <div class="text-center" style="margin-top:20px;">
                                        <button class="btn btn-default"><span class="pe pe-7s-note"></span> Edit</button>
                                        <button class="btn btn-danger"><span class="pe pe-7s-trash"></span> Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                                <table cellpadding="1" cellspacing="1" class="table table-bordered">
                                    
                                </table>
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
<script src="{{asset('vendor/datatables/datatables.min.js')}}"></script>
<script src="{{asset('vendor/push/push.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('scripts/luna.js')}}"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
    $(document).ready(function () {
        // $('.createSubject').click(function() {
        //     $(this).attr('disabled','disabled');
        //     $(this).text("Creating...");
        // });
        $('#delete').on('click', function () {
                var $btn = $(this).button('loading')
                // business logic...
                $btn.button('reset')
              })
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-top-right",
            "closeButton": true,
            "progressBar": true
        };
        @if(session()->has('error'))
        toastr.error('{{session()->get('error')}}');
        @endif
        @if(session()->has('success'))
        Push.create('Subject Created', {
                            body: '{{session()->get('success')}}',
                            icon: '{{asset($admins['profile'])}}',
                            timeout: 8000,
                            onClick: function () {
                                window.focus();
                                window.location = '/admin/notification';
                            }
                        });
        @endif


    });
    
    $('#teacherslist').DataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                
            ]
        });
    $('#adminslist').DataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                
            ]
        });

</script>
</body>

</html>
@else
  <script>window.location = "/admin/login";</script>
@endif