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
                <a class="navbar-brand" href="index.html">
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
                                    <li class="li-logout"><a class="logout" href="/admin/logout">Logout</a></li>
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
                <li class="active">
                    <a href="#users" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-users icons"></span>
                        Users<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="users" class="nav nav-second collapse in">
                        <li class="active"><a href="/admin/users">Users</a></li>
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
                    <ul id="subject" class="nav nav-second collapse">
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
                            <small>Academics<br><span class="c-white">Users</span></small>
                            </div>
                            <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-users"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Users</h3>
                                <small>
                                    “A performance dashboard is a practical tool to improve management effectiveness and efficiency,<br/> not just a pretty retrospective picture in an annual report.” 
                                </small>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row">

                <div class="col-md-12">
                    <div class="panel panel-filled">

                        <div class="panel-body">

                            <div class="row"> 
                                <div class="col-md-3 col-xs-6 text-center">
                                    <h2 class="no-margins" id="totalStudents">
                                        
                                        0
                                    </h2>
                                    <span class="c-white">Students</span> Total
                                </div>                               
                                <div class="col-md-3 col-xs-6 text-center">
                                    <h2 class="no-margins" id="totalTeachers">
                                        0
                                        
                                    </h2>
                                    <span class="c-white">Teachers</span> Total
                                </div>
                                <div class="col-md-3 col-xs-6 text-center">
                                    <h2 class="no-margins" id="totalParents">
                                        0
                                    </h2>
                                    <span class="c-white">Parents</span> Total
                                </div>
                                <div class="col-md-3 col-xs-6 text-center">
                                    <h2 class="no-margins" id="totalAdmins">
                                        0
                                    </h2>
                                    <span class="c-white">Admin</span> Total
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

                <div class="row">
                    
                    <div class="col-md-6">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                            Enrolled List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="enrolled" cellpadding="1" cellspacing="1" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>S.N</th>
                                        <th>Student Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                            @if($student !== null)
                              @foreach($student as $students)
                                    <tr>
                                        <td><img src="{{asset($students['profile'])}}" width="35" class="img-circle"></td>
                                        <td>{{$students['student_id']}}</td>
                                        <td>{{$students['firstname']}} {{$students['lastname']}}</td>
                                        <td><span class="label label-warning">{{$students['role']}}</span></td>
                                        <td>@if($students['status'] == '0')
                                            <span class="label label-primary">Offline</span>
                                            @elseif($students['status'] == '1')
                                            <span class="label label-success">Online</span>
                                            @endif</td>
                                    </tr>
                                      @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                
               
                <div class="col-md-6">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                              Employee List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="employees" cellpadding="1" cellspacing="1" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>T.N</th>
                                        <th>Teacher Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                            @if($employee !== null)
                                @foreach($employee as $employees)
                                    <tr>
                                        <td><img src="{{asset($employees['profile'])}}" width="35" class="img-circle"></td>
                                        <td>{{$employees['teacher_id']}}</td>
                                        <td>{{$employees['firstname']}} {{$employees['lastname']}}</td>
                                         <td><span class="label label-info">{{$employees['role']}}</span></td>
                                       <td>
                                        @if($employees['status'] == '0')
                                            <span class="label label-primary">Offline</span>
                                            @elseif($employees['status'] == '1')
                                            <span class="label label-success">Online</span>
                                            @endif
                                        </td> 
                                        
                                    </tr>
                                    @endforeach
                                     @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
               
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                            Parent List
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="parent" cellpadding="1" cellspacing="1" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>P.N</th>
                                        <th>Parent Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($parent !== null)
                              @foreach($parent as $parents)
                                    <tr>
                                        <td><img src="{{asset($parents['profile'])}}" width="35" class="img-circle"></td>
                                        <td>{{$parents['parent_id']}}</td>
                                        <td>{{$parents['firstname']}} {{$parents['lastname']}}</td>
                                         <td><span class="label label-danger">{{$parents['role']}}</span></td>
                                        <td>
                                            @if($parents['status'] == '0')
                                            <span class="label label-primary">Offline</span>
                                            @elseif($parents['status'] == '1')
                                            <span class="label label-success">Online</span>
                                            @endif
                                        </td>
                                    </tr>
                                      @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                
                
                <div class="col-md-6">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                            Assigned Admins
                        </div>
                        <div class="panel-body">
                            
                            <div class="table-responsive">
                                <table id="admin" cellpadding="1" cellspacing="1" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>AH.N</th>
                                        <th>Admin Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($tadmin !== null)
                                        @foreach($tadmin as $myadmin)
                                    <tr>
                                        <td><img src="{{asset($myadmin['profile'])}}" width="35" class="img-circle"></td>
                                        <td>{{$myadmin['teacher_id']}}</td>
                                        <td>{{$myadmin['firstname']}} {{$myadmin['lastname']}}</td>
                                         <td><span class="label label-success">{{$myadmin['role']}}</span></td>
                                        <td>
                                            @if($myadmin['status'] == '1')
                                            <span class="label label-success">Online</span>
                                            @elseif($myadmin['status'] == '0')
                                            <span class="label label-primary">Offline</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                 @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
               
                </div>
          
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                                
                            <div class="table-responsive" style="margin-top:10px;">

                                <table id="userslist" class="table table-hover table-bordered cell-border">
                                    <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>ID Number</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Date Added</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     @if(!empty($recents))
                                    @foreach($recents as $data)
                                        <div class="modal fade" id="myModal{{$data['idnumber']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Delete User</h4>
                                                <small>Sometimes you have to delete characters from a scene <br/>just to keep from overcrowding the image. "Scott Westerfeld"</small>
                                            </div>
                                            <div class="modal-body text-center">
                                            
                                                <h5>Are you sure you want to remove a <strong class="text-danger">{{$data['role']}}</strong> named <strong class="text-danger text-bold">{{$data['firstname']}}</strong> ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <a type="button" class="btn btn-danger delete" href="destroy/{{$data['idnumber']}}">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <tr>
                                        <td><img src="{{asset($data['profile'])}}" width="35" style="border-radius:200px;"></td>
                                        <td>{{$data['idnumber']}}</td>
                                        <td>{{$data['firstname']}}</td>
                                        <td>{{$data['lastname']}}</td>
                                        <td>
                                            @if($data['role'] == 'Admin')
                                            <span class="label label-success">{{$data['role']}}</span>
                                            @elseif($data['role'] == 'Teacher')
                                            <span class="label label-primary">{{$data['role']}}</span>
                                            @elseif($data['role'] == 'Student')
                                            <span class="label label-warning">{{$data['role']}}</span>
                                            @elseif($data['role'] == 'Parent')
                                            <span class="label label-danger">{{$data['role']}}</span>
                                            @endif
                                        
                                        </td>
                                        <td>@if($data['status'] == '0')
                                        <span class="label label-primary">Offline</span>
                                        @elseif($data['status'] == '1')
                                        <span class="label label-success">Online</span>
                                        @endif
                                        </td>
                                        <td><time class="timeago" datetime="{{$data['created_at']}}"></time></td>
                                        <td><a class="btn btn-default" href="editaccountinfo/{{$data['id']}}"><i class="pe pe-7s-note"></i></a>
                                            <button class="btn btn-default" data-toggle="modal" data-target="#myModal{{$data['idnumber']}}" data-toggle="tooltip" data-placement="right" title="Delete"><span class="pe pe-7s-trash"></span></button>
                                    </tr>
                                     @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
<script src="{{asset('vendor/time/script.js')}}"></script>

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
    $(document).ready(function () {
        // setInterval('time.timeago', 1000);
        $("time.timeago").timeago();

        $('.delete').click(function() {
            $(this).attr('disabled','disabled');
            $(this).text("Deleting...");
        });
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
        toastr.success('{{session()->get('success')}}');
        @endif


    });
    
    $('#userslist').DataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'print',className: 'btn-sm'}
            ]
        });
    $('#enrolled').DataTable({
            dom: "<'row'<'col-sm-3'l><'col-sm-3 text-center'B><'col-sm-3'f>>tp",
            "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
            buttons:[
            ]
        });
     $('#employees').DataTable({
            dom: "<'row'<'col-sm-3'l><'col-sm-3 text-center'B><'col-sm-3'f>>tp",
            "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
            buttons: [
            
            ]
        });
     $('#parent').DataTable({
            dom: "<'row'<'col-sm-3'l><'col-sm-3 text-center'B><'col-sm-3'f>>tp",
            "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
            buttons: [
            
            ]
        });
     $('#admin').DataTable({
            dom: "<'row'<'col-sm-3'l><'col-sm-3 text-center'B><'col-sm-3'f>>tp",
            "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ],
            buttons: [
            
            ]
        });
     @if(!empty($totalAdmins))
        $('#totalAdmins').delay(800).animateNumber({ number: {{$totalAdmins}} },500);
     @endif
     @if(!empty($totalStudents))
        $('#totalStudents').delay(800).animateNumber({ number: {{$totalStudents}} },500);
    @endif
    @if(!empty($totalTeachers))
        $('#totalTeachers').delay(800).animateNumber({ number: {{$totalTeachers}} },500);
    @endif
    @if(!empty($totalParents))
        $('#totalParents').delay(800).animateNumber({ number: {{$totalParents}} },500);
    @endif
</script>
</body>

</html>
@else
  <script>window.location = "/admin/login";</script>
@endif