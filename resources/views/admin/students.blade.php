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
                <li class="active">
                    <a href="#users" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-users icons"></span>
                        Users<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="users" class="nav nav-second collapse in">
                        <li><a href="/admin/users">Users</a></li>
                        <li><a href="/admin/users/admin">Admin</a></li>
                        <li class="active"><a href="/admin/users/students">Student</a></li>
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

<div class="loader" style="background:#1d212b8f; position: fixed; z-index: 1; width: 100%; height: 100%; display: none;">
            <i class="fa fa-spinner fa-spin" style="font-size:50px; color:#fff; position: relative; top:40%; left:50%;"></i>
        </div>
    <!-- Main content-->
    <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="view-header">
                            <div class="pull-right text-right" style="line-height: 14px">
                            <small>Academics<br>Users<br><span class="c-white">Students</span></small>
                            </div>
                            <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-id"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Students</h3>
                                <small>
                                    “A performance dashboard is a practical tool to improve management effectiveness and efficiency,<br/> not just a pretty retrospective picture in an annual report.” 
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
                                <h3 class="m-b-xs">Create Students</h3>
                                <small>
                                    “The best thing for being sad, replied Merlin, beginning to puff and blow, <br>is to learn something. That's the only thing that never fails.” 
                                </small><br/>
                                <br/>
                                <a class="btn btn-default" href="/admin/users/students/studentaccount" id="create">Create Students</a>
                                </div><br/>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                
           
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                            <p>Students List</p>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                                <table id="teacherslist" class="table table-hover table-bordered cell-border">
                                    <thead>
                                    <tr>
                                        <th id="rn">#</th>
                                        <th id="rm">Profile</th>
                                        <th>Student Number</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Status</th>
                                        <th>Date Added</th>
                                        <th>Account</th>
                                        <th id="rl">Restriction</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                 @if(!empty($students))
                                    @foreach($students as $stud)
                                    @if($stud['disable'] == 0)
                                    <tr>
                                        <td>{{$stud['id']}}</td>
                                        <td><img src="{{asset($stud['profile'])}}" class="img-circle" width="35px" height="35px"></td>
                                        <td>{{$stud['student_id']}}</td>
                                        <td>{{$stud['firstname']}}</td>
                                        <td>{{$stud['lastname']}}</td>
                                        <td>@if($stud['status'] == 0)
                                            <span class="label label-primary">Offline</span>
                                            @elseif($stud['status'] == 1)
                                            <span class="label label-success">Online</span>
                                            @endif
                                        </td>
                                        <td><time class="timeago" datetime="{{$stud['created_at']}}"></time></time></td>
                                        <td>@if($stud['disable'] == 0)
                                            <span class="label label-success">Activated</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="/admin/edit/students/account/{{$stud['id']}}" method="POST">
                                                @csrf
                                            <select name="account" class="form-control" onchange="this.form.submit()" required>
                                                @if($stud['disable'] == 0)
                                                 <option>Action</option>
                                                 <option value="1">Block</option>
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
            </div>
                <!-- disabled accounts -->
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-filled">
                        <div class="panel-heading">
                            <p>Deactivated List</p>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                                <table id="teacherslist1" class="table table-hover table-bordered cell-border">
                                    <thead>
                                    <tr>
                                        <th id="rn">#</th>
                                        <th id="rm">Profile</th>
                                        <th>Student Number</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Account</th>
                                        <th id="rl">Restriction</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                 @if(!empty($students))
                                    @foreach($students as $stud)
                                    @if($stud['disable'] == 1)
                                    <tr>
                                        <td>{{$stud['id']}}</td>
                                        <td><img src="{{asset($stud['profile'])}}" class="img-circle" width="35px"></td>
                                        <td>{{$stud['student_id']}}</td>
                                        <td>{{$stud['firstname']}}</td>
                                        <td>{{$stud['lastname']}}</td>
                                        <td>@if($stud['status'] == 0)
                                            <span class="label label-primary">Offline</span>
                                            @elseif($stud['status'] == 1)
                                            <span class="label label-success">Online</span>
                                            @endif
                                        </td>
                                        <td><time class="timeago1" datetime="{{$stud['created_at']}}"></time></td>
                                        <td>@if($stud['disable'] == 1)
                                            <span class="label label-danger">Deactivated</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="/admin/edit/students/account/{{$stud['id']}}" method="POST">
                                                @csrf
                                            <select name="account" class="form-control" onchange="this.form.submit()">
                                                @if($stud['disable'] == 1)
                                                 <option value="0" >Unblock</option>
                                                 <option selected>Blocked</option>
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
            </div>
                
               
            </div>
    </section>
    <!-- End main content-->
</div>

<!-- create teacher -->
<div class="modal fade" id="createTeacher" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Modal title</h4>
                                                <small>Lorem Ipsum is simply dummy text.</small>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                                                    printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                                                    remaining essentially unchanged.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-accent">Save changes</button>
                                            </div>
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
<script src="{{asset('vendor/datatables/datatables.min.js')}}"></script>
<script src="{{asset('vendor/time/script.js')}}"></script>
<script src="{{asset('vendor/push/push.js')}}"></script>


<!-- App scripts -->
<script src="{{asset('scripts/luna.js')}}"></script>
<script>
    $(document).ready(function () {
        
        $("time.timeago1").timeago();
      
       
        $("time.timeago").timeago();
        
        $('#create').click(function(){
            $('loader').css({'display': 'block'});
        });
        $('th[id=rn]').replaceWith('<th>#</th>');
        $('th[id=rm]').replaceWith('<th>Profile</th>');
        $('th[id=rl]').replaceWith('<th>Restriction</th>');
        
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
        toastr.warning('{{session()->get('success')}}', 'Registration');
        Push.create('New User Alert', {
                            body: '{{session()->get('success')}}',
                            icon: '{{asset($admins['profile'])}}',
                            timeout: 6000,
                            onClick: function () {
                                window.focus();
                                window.location = "/admin/notification";
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
    $('#teacherslist1').DataTable({
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