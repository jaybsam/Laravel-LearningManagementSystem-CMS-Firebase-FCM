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
                    <li class="dropdown">
                        <a href="versions.html" >Versions
                            <span class="label label-warning pull-right">2</span>
                        </a>
                    </li>
                    <li class=" profil-link">
                        <a href="login.html" data-toggle="dropdown">
                            <span class="profile-address">luna@company.io</span>
                            <img src="{{asset('images/profile.jpg')}}" class="img-circle" alt="">
                        </a>
                        <ul class="dropdown-menu">
                                    <li><a href="#">Profile</a></li>
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
                    <a href="/admin">Dashboard</a>
                </li>
                <li>
                    <a href="admin/message">Message</a>
                </li>
                <li>
                    <a href="#notification" data-toggle="collapse" aria-expanded="false">
                        Notification<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                        <span class="badge pull-right">2</span>
                    </a>
                    <ul id="notification" class="nav nav-second collapse">
                        <li><a href="admin/notification">Notification <span class="badge pull-right">2</span></a></li>
                        <li><a href="admin/notification-settings">Setting</a></li>
                    </ul>
                </li>
                <li class="nav-category">
                   Academics
                </li>
                <li>
                    <a href="#users" data-toggle="collapse" aria-expanded="false">
                        Users<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="users" class="nav nav-second collapse">
                        <li><a href="admin/users/admin">Admin</a></li>
                        <li><a href="admin/users/students">Student</a></li>
                        <li><a href="admin/users/teachers">Teacher</a></li>
                        <li><a href="admin/users/parents">Parent</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#taskmanager" data-toggle="collapse" aria-expanded="false">
                        Task Manager<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="taskmanager" class="nav nav-second collapse">
                        <li><a href="admin/taskmanager/account">Account</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#subject" data-toggle="collapse" aria-haspopup="true" aria-expanded="true">
                        Subject<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="subject" class="nav nav-second collapse">
                        <li><a href="admin/subject/section">Section</a></li>
                        <li><a href="admin/subject/class">Class</a></li>
                        <li><a href="admin/subject/schedule">Schedule</a></li>
                        <li><a href="admin/subject/subject">Subject</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#grades" data-toggle="collapse" aria-expanded="false">
                        Grades<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="grades" class="nav nav-second collapse in">
                        <li class="active"><a class="active" href="admin/grades">Grades</a></li>
                        <li><a href="admin/grades/grading-system">Grading System</a></li>
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
                        Account<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="account" class="nav nav-second collapse">
                        <li><a href="admin/account/profile">Profile</a></li>
                        <li><a href="admin/account/account-settings">Account Settings</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#pages" data-toggle="collapse" aria-expanded="false">
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
                        Agenda <span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="agenda" class="nav nav-second collapse">
                        <li><a href="admin/agenda/events">Events</a></li>
                        <li><a href="admin/agenda/program">Program</a></li>
                        <li><a href="admin/agenda/news">News</a></li>
                        <li><a href="admin/agenda/announcement">Announcement</a></li>
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
                                <i class="pe page-header-icon pe-7s-bookmarks"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Grades</h3>
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
                        <button type="button" class="btn btn-default btn-md padding" data-toggle="modal" data-target="#myModal1">Table Head</button>
                        <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal1">Table Rows</button>
                        <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal1">Table Columns</button>
                        <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal1">Update Tables</button>
                        <button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#myModal1">Delete Tables</button>
                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-hidden="false">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Grades</h4>
                                                <small>Lorem Ipsum is simply dummy text.</small>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="POST">
                                                    <div class="col-lg-12">
                    <div class="tabs-container">

                        <div class="tabs-left">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-6" aria-expanded="true"> Set Head Table boxes</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-7" aria-expanded="false">Fill Input Boxes</a></li>
                            </ul>
                            <div class="tab-content ">
                                <div id="tab-6" class="tab-pane active">
                                    <div class="panel-body">
                                        <strong class="c-white">Lorem ipsum dolor sit amet, consectetuer adipiscing</strong>

                                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of
                                            existence in this spot, which was created for the bliss of souls like mine.</p>

                                        <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at
                                            the present moment; and yet I feel that I never was a greater artist than now. When.</p>
                                    </div>
                                </div>
                                <div id="tab-7" class="tab-pane">
                                    <div class="panel-body">
                                        <strong class="c-white">Donec quam felis</strong>

                                        <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                            and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                        <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                            sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-accent">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <hr>
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

<!-- App scripts -->
<script src="{{asset('scripts/luna.js')}}"></script>
</body>

</html>
@else
  <script>window.location = "/admin/login";</script>
@endif