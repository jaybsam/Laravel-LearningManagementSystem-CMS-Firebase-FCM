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
        .nav-second >.active > a:hover{
            margin-left: none !important;
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
        .fade{
            background: #222222c2;
        }
        .mb-5{
            margin-bottom:30px;
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
                    @if(!empty($admins))
                    <li class=" profil-link">
                        <a href="login.html" data-toggle="dropdown">
                            <span class="profile-address">{{$admins['email']}}</span>
                            <img src="{{asset($admins['profile'])}}" class="img-circle" alt="">
                        </a>
                        <ul class="dropdown-menu">
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Messages</a></li>
                                    <li><a href="/admin/notification">Notifications</a></li>
                                    <li class="divider"></li>
                                    <li class="li-logout"><a class="logout" href="/admin/logout">Sign Out</a></li>
                                </ul>
                    </li>
                    @endif
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
                <li class="active">
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


    <!-- Main content-->
    <section class="content">
            <div class="container-fluid">
                <div class="back-link mb-5">
                    <a href="/admin/users" class="btn btn-accent">Back to Users</a>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-note"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">User Update</h3>
                                <small>
                                    “A performance dashboard is a practical tool to improve management effectiveness and efficiency,<br/> not just a pretty retrospective picture in an annual report.” 
                                </small>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            <form action="/admin/users/edit/{{$users['id']}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-filled">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                            User Account
                        </div>
                        <div class="panel-body">

                            <p>Use Bootstrap's predefined grid classes to align labels and groups of form controls in a horizontal layout by adding <code>.form-horizontal</code> to the form (which doesn't have to be a <code>&lt;form&gt;</code>). Doing so changes <code>.form-group</code>s to behave as grid rows, so no need for <code>.row</code>.</p>

                            <div class="form-horizontal">
                                <div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">User ID *</label>

                                        <div class="col-xs-9"><input type="text" class="form-control" style="margin-bottom:10px;" name="idnumber" placeholder="ID number" autofocus required value="{{$users['id_number']}}" disabled></div>
                                      
                                 
                                </div>
                                <div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">Password *</label>

                                    <div class="col-xs-9"><input type="password" class="form-control" name="password" placeholder="Password" required value="{{$users['password']}}"></div>

                                </div>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-filled">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
                                <a class="panel-close"><i class="fa fa-times"></i></a>
                            </div>
                            Account Information
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <div class="form-group" style="width: 100%;">
                                    <label class="col-sm-2 control-label" for="exampleInputFile">Profile *</label> 
                                    <div style="width: 26.8%; border-radius: 5px; margin: 0 auto; background: #ffffff14; padding: 30px;">
                                    <img src="{{asset($users['profile'])}}" id="profile-img-tag" width="200px" style="border-radius: 500px; border: 4px solid #fff;" />
                                    </div>
                                    <div style="width:50%; margin: 0 auto; padding-top:40px;">
                                    <label for="profile-img" class="custom-file-upload"><span class="fa fa-upload"></span> Choose a file...</label>
                                    <input type="file" name="file" id="profile-img">
                                     </div>
                                 </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Firstname *</label>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="Firstname..." value="{{$users['firstname']}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Lastname *</label>
                                    <div class="col-xs-9"><input type="text" class="form-control" name="lastname" placeholder="Lastname..." value="{{$users['lastname']}}" required></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Birthdate *</label>
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <input class="form-control" type="text" name="month" value="{{$users['month']}}" placeholder="MM" required>
                                        </div>
                                        <div class="col-xs-2">
                                            <input class="form-control" type="number" name="day" min="1" value="{{$users['day']}}" placeholder="DD" required>
                                        </div>
                                        <div class="col-xs-2">
                                            <input class="form-control" type="number" name="year" min="1" value="{{$users['year']}}" placeholder="YYYY" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Age *</label>
                                    <div class="col-xs-3"><input type="number" min="1" max="99" class="form-control" name="age" placeholder="Age" value="{{$users['age']}}" required></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Gender *</label>
                                    <div class="col-xs-3">
                                        <select class="form-control" name="gender">
                                            <option>Gender</option>
                                            @if($users['gender'] == 'Male')
                                            <option value="Male" selected>Male</option>
                                            <option value="Female">Female</option>
                                            @elseif($users['gender'] == 'Female')
                                            <option value="Male">Male</option>
                                            <option value="Female" selected>Female</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Address *</label>
                                    <div class="col-xs-5">
                                        <textarea class="form-control" placeholder="Address" name="address" rows="5" required>{{$users['address']}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Contact *</label>
                                    <div class="col-xs-3"><input type="number" min="1" class="form-control" name="contact" placeholder="Contact" value="{{$users['contact']}}" required></div>
                                </div>
                                @if($users['role'] !== 'Admin')
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Role *</label>
                                    <div class="col-xs-3">
                                        <select class="form-control" name="role" required>
                                            <option value=''>Role</option>
                                            @if($users['role'] == 'Student')
                                            <option value="Student" selected>Student</option>
                                            <option value="Teacher">Teacher</option>
                                            <option value="Parent">Parent</option>
                                            @elseif($users['role'] == 'Teacher')
                                            <option value="Student">Student</option>
                                            <option value="Teacher" selected>Teacher</option>
                                            <option value="Parent">Parent</option>
                                            @elseif($users['role'] == 'Parent')
                                            <option value="Student">Student</option>
                                            <option value="Teacher">Teacher</option>
                                            <option value="Parent" selected>Parent</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group">
                                    <div class="col-xs-3 pull-right">
                                        <a class="btn btn-accent btn-lg" data-toggle="modal" data-target="#update">Update User</a>
                                    </div>
                                </div>
                                <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Register User</h4>
                                                <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h5 class="m-t-none">Are you sure you want to make changes in this user?</h5>
                                                <p class="text-primary"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                                                <button type="submit" class="btn btn-accent update">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        </div>
                    </div>
                    </div>
                </div>
                 </form>
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
        $('.update').click(function() {
            $(this).attr('disabled','disabled');
            $(this).text("Updating...");
        },500);
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $('#myButton').on('click', function () {
            var $btn = $(this).button('loading')
            // business logic...
            $btn.button('reset')
          });
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "progressBar": true
        };

    });
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
    var start = 1900;
    var end = new Date().getFullYear();
    var options = "";
    for(var year = start ; year <=end; year++){
      options += "<option>"+ year +"</option>";
    }
    document.getElementById("year").innerHTML = options;

    $('#tableExample3').DataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'btn-sm'},
                {extend: 'csv',title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                {extend: 'print',className: 'btn-sm'}
            ]
        });
</script>
</body>

</html>
@else
  <script>window.location = "/admin/login";</script>
@endif