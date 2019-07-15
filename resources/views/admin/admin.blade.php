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
                        <li class="active"><a href="/admin/users/admin">Admin</a></li>
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
                            <small>Academics<br>Users<br><span class="c-white">Admin</span></small>
                            </div>
                            <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-key"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Admin</h3>
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
                                <h3 class="m-b-xs">Promote Account</h3>
                                <small>
                                    “A performance dashboard is a practical tool to improve management effectiveness and efficiency,<br/> not just a pretty retrospective picture in an annual report.” 
                                </small>
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
                            <p>Teachers List</p>
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">

                                <table id="teacherslist" class="table table-hover table-bordered cell-border">
                                    <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>ID Number</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Admin Priviledge</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($teachers))
                                        @foreach($teachers as $data)
                                        <div class="modal fade" id="myModal{{$data['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                <a type="button" id="delete" class="btn btn-danger" data-loading-text="Deleting..." autocomplete="off" href="destroy/{{$data['id']}}">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <tr>
                                        <td><img src="{{asset($data['profile'])}}" width="35" style="border-radius:200px;"></td>
                                        <td>{{$data['teacher_id']}}</td>
                                        <td>{{$data['firstname']}}</td>
                                        <td>{{$data['lastname']}}</td>
                                        <td><span class="label label-info">{{$data['role']}}</span></td>
                                        <td><span class="label label-primary">offline</span></td>
                                        <td>{{$data['created_at']}}</td>
                                        <td>
                                            <form action="/admin/edit/adminpriviledge/{{$data['id']}}" method="POST">
                                                @csrf
                                            <select name="role" class="form-control" onchange="this.form.submit()">
                                                @if($data['role'] == 'Teacher')
                                                <option value="Teacher" selected>Default</option>
                                                 <option value="Admin">Activate</option>
                                                 @endif
                                            </select>
                                            </form>
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
                             <p>Promoted Admins</p>
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                       
                        <div class="panel-body">
                            <div class="table-responsive">

                                <table id="adminslist" class="table table-hover table-bordered cell-border">
                                    <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>ID Number</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th>Remove Priviledge</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                 @if(!empty($adminPriviledge))
                                   @foreach($adminPriviledge as $admini)
                                        <div class="modal fade" id="myModal{{$admini['id']}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Delete User</h4>
                                                <small>Sometimes you have to delete characters from a scene <br/>just to keep from overcrowding the image. "Scott Westerfeld"</small>
                                            </div>
                                            <div class="modal-body text-center">
                                            
                                                <h5>Are you sure you want to remove a <strong class="text-danger">{{$admini['role']}}</strong> named <strong class="text-danger text-bold">{{$admini['firstname']}}</strong> ?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <a type="button" id="delete" class="btn btn-danger" data-loading-text="Deleting..." autocomplete="off" href="destroy/{{$admini['id']}}">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <tr>
                                        <td><img src="{{asset($admini['profile'])}}" width="35" style="border-radius:200px;"></td>
                                        <td>{{$admini['teacher_id']}}</td>
                                        <td>{{$admini['firstname']}}</td>
                                        <td>{{$admini['lastname']}}</td>
                                        <td><span class="label label-success">{{$admini['role']}}</span></td>
                                        <td><span class="label label-primary">offline</span></td>
                                        <td>{{$admini['created_at']}}</td>
                                        <td>
                                            <form action="/admin/edit/adminpriviledge/{{$admini['id']}}" method="POST">
                                                @csrf
                                            <select name="role" class="form-control" onchange="this.form.submit()">
                                                @if($admini['role'] == 'Admin')
                                                 <option value="Admin" selected>Activated</option>
                                                 <option value="Teacher" >Default</option>
                                                 @endif
                                            </select>
                                            </form>
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

<!-- App scripts -->
<script src="{{asset('scripts/luna.js')}}"></script>
<script>
    $(document).ready(function () {
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
        toastr.success('{{session()->get('success')}}');
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