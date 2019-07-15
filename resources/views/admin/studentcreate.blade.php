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
                                    <li><a href="/admin/account/profile">Profile</a></li>
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
                    <a href="index.html" class="btn btn-accent">Back to Users</a>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-study"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Add Student</h3>
                                <small>
                                    “A performance dashboard is a practical tool to improve management effectiveness and efficiency,<br/> not just a pretty retrospective picture in an annual report.” 
                                </small>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            <form action="/admin/createusers" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-filled">
                        <div class="panel-heading">
                            User Account
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">User ID *</label>
                                    @if($id == null)
                                    <div class="col-xs-9"><input type="text" class="form-control" style="margin-bottom:10px;" name="idnumber" placeholder="ID number" autofocus required></div>
                                    @else
                                        <div class="col-xs-9"><input type="text" class="form-control" style="margin-bottom:10px;" name="idnumber" placeholder="ID number" autofocus required value="{{$id + 1}}" readonly></div>
                                        
                                    @endif
                                </div>
                                <div class="form-group"><label for="inputPassword3" class="col-sm-2 control-label">Password *</label>

                                    <div class="col-xs-9"><input type="password" class="form-control" name="password" placeholder="Password" required></div>

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
                            Account Information
                        </div>
                        <div class="panel-body">
                            <div class="form-horizontal">
                                <div class="form-group" style="width: 100%;">
                                    <label class="col-sm-2 control-label" for="exampleInputFile">Profile (optional)*</label> 
                                    <div style="width: 26.8%; border-radius: 5px; margin: 0 auto; background: #ffffff14; padding: 30px;">
                                    <img src="" id="profile-img-tag" width="200px" height="200px" style="border-radius: 500px; border: 4px solid #fff;" />
                                    </div>
                                    <div style="width:50%; margin: 0 auto; padding-top:40px;">
                                    <label for="profile-img" class="custom-file-upload"><span class="fa fa-upload"></span> Upload profile...</label>
                                    <input type="file" name="file" id="profile-img">
                                     </div>
                                 </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Firstname *</label>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="Firstname..." required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Lastname *</label>
                                    <div class="col-xs-9"><input type="text" class="form-control" name="lastname" placeholder="Lastname..." required></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Birthdate *</label>
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <select class="form-control" name="month" required>
                                                <option value=''>Month</option>
                                                <option value='January'>January</option>
                                                <option value='February'>February</option>
                                                <option value='March'>March</option>
                                                <option value='April'>April</option>
                                                <option value='May'>May</option>
                                                <option value='June'>June</option>
                                                <option value='July'>July</option>
                                                <option value='August'>August</option>
                                                <option value='September'>September</option>
                                                <option value='October'>October</option>
                                                <option value='November'>November</option>
                                                <option value='December'>December</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-2">
                                            <select class="form-control" name="day" required>
                                                  <option value=''>dd -------</option>
                                                  <option value="01">01</option>
                                                  <option value="02">02</option>
                                                  <option value="03">03</option>
                                                  <option value="04">04</option>
                                                  <option value="05">05</option>
                                                  <option value="06">06</option>
                                                  <option value="07">07</option>
                                                  <option value="08">08</option>
                                                  <option value="09">09</option>
                                                  <option value="10">10</option>
                                                  <option value="11">11</option>
                                                  <option value="12">12</option>
                                                  <option value="13">13</option>
                                                  <option value="14">14</option>
                                                  <option value="15">15</option>
                                                  <option value="16">16</option>
                                                  <option value="17">17</option>
                                                  <option value="18">18</option>
                                                  <option value="19">19</option>
                                                  <option value="20">20</option>
                                                  <option value="21">21</option>
                                                  <option value="22">22</option>
                                                  <option value="23">23</option>
                                                  <option value="24">24</option>
                                                  <option value="25">25</option>
                                                  <option value="26">26</option>
                                                  <option value="27">27</option>
                                                  <option value="28">28</option>
                                                  <option value="29">29</option>
                                                  <option value="30">30</option>
                                                  <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-2">
                                            <select class="form-control" name="year" required>
                                                  <option value=''>yyyy ------</option>
                                                  <option value="2019">2019</option>
                                                  <option value="2018">2018</option>
                                                  <option value="2017">2017</option>
                                                  <option value="2016">2016</option>
                                                  <option value="2015">2015</option>
                                                  <option value="2014">2014</option>
                                                  <option value="2013">2013</option>
                                                  <option value="2012">2012</option>
                                                  <option value="2011">2011</option>
                                                  <option value="2010">2010</option>
                                                  <option value="2009">2009</option>
                                                  <option value="2008">2008</option>
                                                  <option value="2007">2007</option>
                                                  <option value="2006">2006</option>
                                                  <option value="2005">2005</option>
                                                  <option value="2004">2004</option>
                                                  <option value="2003">2003</option>
                                                  <option value="2002">2002</option>
                                                  <option value="2001">2001</option>
                                                  <option value="2000">2000</option>
                                                  <option value="1999">1999</option>
                                                  <option value="1998">1998</option>
                                                  <option value="1997">1997</option>
                                                  <option value="1996">1996</option>
                                                  <option value="1995">1995</option>
                                                  <option value="1994">1994</option>
                                                  <option value="1993">1993</option>
                                                  <option value="1992">1992</option>
                                                  <option value="1991">1991</option>
                                                  <option value="1990">1990</option>
                                                  <option value="1989">1989</option>
                                                  <option value="1988">1988</option>
                                                  <option value="1987">1987</option>
                                                  <option value="1986">1986</option>
                                                  <option value="1985">1985</option>
                                                  <option value="1984">1984</option>
                                                  <option value="1983">1983</option>
                                                  <option value="1982">1982</option>
                                                  <option value="1981">1981</option>
                                                  <option value="1980">1980</option>
                                                  <option value="1979">1979</option>
                                                  <option value="1978">1978</option>
                                                  <option value="1977">1977</option>
                                                  <option value="1976">1976</option>
                                                  <option value="1975">1975</option>
                                                  <option value="1974">1974</option>
                                                  <option value="1973">1973</option>
                                                  <option value="1972">1972</option>
                                                  <option value="1971">1971</option>
                                                  <option value="1970">1970</option>
                                                  <option value="1969">1969</option>
                                                  <option value="1968">1968</option>
                                                  <option value="1967">1967</option>
                                                  <option value="1966">1966</option>
                                                  <option value="1965">1965</option>
                                                  <option value="1964">1964</option>
                                                  <option value="1963">1963</option>
                                                  <option value="1962">1962</option>
                                                  <option value="1961">1961</option>
                                                  <option value="1960">1960</option>
                                                  <option value="1959">1959</option>
                                                  <option value="1958">1958</option>
                                                  <option value="1957">1957</option>
                                                  <option value="1956">1956</option>
                                                  <option value="1955">1955</option>
                                                  <option value="1954">1954</option>
                                                  <option value="1953">1953</option>
                                                  <option value="1952">1952</option>
                                                  <option value="1951">1951</option>
                                                  <option value="1950">1950</option>
                                                  <option value="1949">1949</option>
                                                  <option value="1948">1948</option>
                                                  <option value="1947">1947</option>
                                                  <option value="1946">1946</option>
                                                  <option value="1945">1945</option>
                                                  <option value="1944">1944</option>
                                                  <option value="1943">1943</option>
                                                  <option value="1942">1942</option>
                                                  <option value="1941">1941</option>
                                                  <option value="1940">1940</option>
                                                  <option value="1939">1939</option>
                                                  <option value="1938">1938</option>
                                                  <option value="1937">1937</option>
                                                  <option value="1936">1936</option>
                                                  <option value="1935">1935</option>
                                                  <option value="1934">1934</option>
                                                  <option value="1933">1933</option>
                                                  <option value="1932">1932</option>
                                                  <option value="1931">1931</option>
                                                  <option value="1930">1930</option>
                                                  <option value="1929">1929</option>
                                                  <option value="1928">1928</option>
                                                  <option value="1927">1927</option>
                                                  <option value="1926">1926</option>
                                                  <option value="1925">1925</option>
                                                  <option value="1924">1924</option>
                                                  <option value="1923">1923</option>
                                                  <option value="1922">1922</option>
                                                  <option value="1921">1921</option>
                                                  <option value="1920">1920</option>
                                                  <option value="1919">1919</option>
                                                  <option value="1918">1918</option>
                                                  <option value="1917">1917</option>
                                                  <option value="1916">1916</option>
                                                  <option value="1915">1915</option>
                                                  <option value="1914">1914</option>
                                                  <option value="1913">1913</option>
                                                  <option value="1912">1912</option>
                                                  <option value="1911">1911</option>
                                                  <option value="1910">1910</option>
                                                  <option value="1909">1909</option>
                                                  <option value="1908">1908</option>
                                                  <option value="1907">1907</option>
                                                  <option value="1906">1906</option>
                                                  <option value="1905">1905</option>
                                                  <option value="1904">1904</option>
                                                  <option value="1903">1903</option>
                                                  <option value="1902">1902</option>
                                                  <option value="1901">1901</option>
                                                  <option value="1900">1900</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Age *</label>
                                    <div class="col-xs-3"><input type="number" min="1" max="99" class="form-control" name="age" placeholder="Age" required></div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Gender *</label>
                                    <div class="col-xs-3">
                                        <select class="form-control" name="gender">
                                            <option>Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Address *</label>
                                    <div class="col-xs-5">
                                        <textarea class="form-control" placeholder="Address" name="address" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Contact *</label>
                                    <div class="col-xs-3"><input type="number" min="1" class="form-control" name="contact" placeholder="Contact" required></div>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Role *</label>
                                    <div class="col-xs-3">
                                        <select class="form-control" name="role" required>
                                            <option value=''>Role</option>
                                            <option value="Student" selected>Student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3 pull-right">
                                        <a class="btn btn-accent" data-toggle="modal" data-target="#createUser">Register Student</a>
                                    </div>
                                </div>
                                <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">Register User</h4>
                                                <small>" Successful and unsuccessful people do not vary greatly in their abilities."</small>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h5 class="m-t-none">Are you sure you want to register this student?</h5>
                                                <p class="text-primary"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                                                <button type="submit" class="btn btn-accent register">Register</button>
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
        // $('.register').click(function() {
        //     $(this).text("Creating...");
        //     $(this).attr('disabled','disabled');
        // });
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