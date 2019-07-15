@if(session()->has('teacher_id'))
<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <!-- /Added by HTTrack -->
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MRHS Teacher Dashboard</title>
    <!-- GOOGLE FONTS -->
    <link
      href="{{asset('sleeze/fonts.googleapis.com/css0e32.css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500')}}"
      rel="stylesheet"
      />
    <link
      href="{{asset('sleeze/cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css')}}"
      rel="stylesheet"
      />
    <!-- PLUGINS CSS STYLE -->
    <link href="{{asset('sleeze/assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
    <link href="{{asset('sleeze/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
    <link
      href="{{asset('sleeze/assets/plugins/flag-icons/css/flag-icon.min.css')}}"
      rel="stylesheet"
      />
    <link
      href="{{asset('sleeze/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}"
      rel="stylesheet"
      />
    <link rel="stylesheet" href="{{asset('vendor/datatables/datatables.min.css')}}"/>
    <link href="{{asset('sleeze/assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
    <link href="{{asset('sleeze/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link
      href="{{asset('sleeze/assets/plugins/daterangepicker/daterangepicker.css')}}"
      rel="stylesheet"
      />
    <!-- SLEEK CSS -->
    <link rel="stylesheet" href="{{asset('sleeze/assets/css/styles.css')}}" />

    <link href="{{asset('sleeze/assets/img/favicon.png')}}" rel="shortcut icon" />

        <script src="{{asset('sleeze/assets/plugins/jquery/jquery.min.js')}}"></script>
            <script type="text/javascript">
              function pulse(){
               $.ajax({
                  type: 'GET',
                  url: '/mrhs/teacher/heartbeat/{{$profile['teacher_id']}}',
                  success:function(response){
                    console.log(response.success);
                    setTimeout(pulse, 60000);
                  }
                });
              }
              pulse();
      $(document).ready(function(){
        $('#showhide').hide();

        $('body').on('click', '.render', function(e){
          $('#addstudent').modal('hide');
          $('#showhide').fadeIn();
          e.preventDefault();
          var sid = $(this).attr('sid');
          var tid = $(this).attr('tid');
          var sec = $(this).attr('sec');
          $.ajax({
            type: 'GET',
            url: '/mrhs/teacher/addstudent/'+ sid + '/' + tid + '/' + sec,
            success:function(response){
              console.log(response);
              $('tbody[id=studentlist]').append('<tr id="r'+response.students.id+'"><td><img src="http://127.0.0.1:8000/'+response.students.profile+'" width="35" style="border-radius:100px;"></td><td>'+response.students.student_id+'</td><td>'+response.students.firstname+'</td><td>'+ response.students.lastname +'</td><td><span class="badge badge-warning">'+response.students.role+'</span></td><td><a class="btn btn-danger btn-sm btn-pill" href="#" id="remove" sid="'+response.students.student_id+'">Remove</a></td></tr>');
              $('#s'+response.students.id).remove();
              $('span[id=totalstudents]').replaceWith('<span id="totalstudents">'+response.totalStudents+'</span>');

              if(response.totalStudents < response.section.capacity){
                $('div[id=progressbar]').replaceWith('<div class="progress" id="progressbar"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: '+response.totalStudents * 100 / response.section.capacity +'%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10">Capacity ' + response.totalStudents + '/' + response.section.capacity + '</div></div>');
                $('button[id=remstudent]').hide();
                $('a[id=gostudent]').show();

              }else if(response.totalStudents == response.section.capacity){

                $('div[id=progressbar]').replaceWith('<div class="progress" id="progressbar"><div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: '+response.totalStudents * 100 / response.section.capacity +'%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10">Capacity '+response.totalStudents + '/' + response.section.capacity + '</div></div>');
                
                $('a[id=gostudent]').hide();
                $('button[id=remstudent]').show();
              }
              
            },
            complete:function(){
              $('#showhide').fadeOut();
              $('#addstudent').modal('show');
            }
          });
        });
        $('body').on('click', '#remove', function(e){
            e.preventDefault();
            $('#showhide').fadeIn();
            var del = $(this).attr('sid');

            $.ajax({
              type:'GET',
              url:'/mrhs/teacher/removestudent/'+ del +'/' + {{$mysect['section_id']}},
              success:function(response){
                $('tr[id=r'+ response.id+ ']').remove();
                console.log(response);
                @if(!empty($mysect))
                  @if(!empty($profile))
                $('#redo').append('<tr id="s'+response.student.id+'"><td><img src="http://127.0.0.1:8000/'+response.student.profile+'" width="35" style="border-radius:100px;"></td><td>'+response.student.student_id+'</td><td>'+response.student.firstname+'</td><td>'+ response.student.lastname +'</td><td><span class="badge badge-warning">'+response.student.role+'</span></td><td><a class="mb-1 btn btn-sm btn-primary btn-pill render" href="#" id="gostudent" sid="'+response.student.student_id+'" tid="'+{{$profile['teacher_id']}}+'" sec="'+{{$mysect['section_id']}}+'">Add as student</a></td></tr>');
                $('span[id=totalstudents]').replaceWith('<span id="totalstudents">'+ (response.totalStudents != 0 ? response.totalStudents : '0')+'</span>');

                if(response.totalStudents < response.section.capacity){
                $('div[id=progressbar]').replaceWith('<div class="progress" id="progressbar"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: '+response.totalStudents * 100 / response.section.capacity +'%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10">Capacity ' + response.totalStudents + '/' + response.section.capacity + '</div></div>');

                $('button[id=remstudent]').hide();
                $('a[id=gostudent]').show();

              }else if(response.totalStudents == response.section.capacity){
                $('div[id=progressbar]').replaceWith('<div class="progress" id="progressbar"><div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: '+response.totalStudents * 100 / response.section.capacity +'%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10">Capacity '+response.totalStudents + '/' + response.section.capacity + '</div></div>');

                 $('a[id=gostudent]').hide();
                 $('button[id=remstudent]').show();
               
              }
                  @endif
                @endif
              },
              complete:function(){
                $('#showhide').fadeOut();

              }
            });
        });
      });
    </script>
    <script src="{{asset('sleeze/assets/plugins/nprogress/nprogress.js')}}"></script>
       <!--  <script type="text/javascript">

        
      $(document).ready(function(){
        function read(){

            $.ajax({
              type: 'GET',
              url: '/mrhs/teacher/read',
              success:function(res){
                
                $.each(res.arryNotif, function(c, val){
                  if(res.arryNotif){
                     


                   $('#output').append('<div class="media py-3 align-items-center justify-content-between"><div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">'+
                    '<i class="mdi mdi-poll font-size-20"></i>'+
                  '</div>'+
                  '<div class="media-body pr-3 ">'+
                    '<a class="mt-0 mb-1 font-size-15 text-dark" href="#">'+val.title+'</a>'+
                    '<p class="">'+ val.message +'</p>'+
                  '</div>'+
                  '<span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> <time class="timeago" id="timeag" datetime="'+ val.time_stamp +'"></time></span>'+
                '</div>');
                  }
                 
                });
                 
               
               // $.each(data.)
              }
            });
          // $('a[id=output]').load($('#output').attr('href'));
          
            
        }
      setInterval(read, 3000);
      });
    </script> -->
    <style type="text/css">
      .login-button {
    position: fixed;
    transition: 0.5s;
    padding: 10px 85px;
    top: 45%;
    right: -24px;
    color: #fff;
    transform: rotate(270deg);
    border-bottom: 42px solid #212a39 !important;
    border-left: 30px solid transparent;
    border-right: 30px solid transparent;
    height: 0;
    z-index: 1000;
    width: 90px;
}
  .text {
    color: #fff;
    position: relative;
    top: 22px;
    left: -16px !important; 
    z-index: 100;
}
.sk-wave>div{
    background-color: #4c84ff;
  }
  .box {
  position: relative;
  max-width: 600px;
  width: 90%;
  height: 400px;
  background: #fff;
  box-shadow: 0 0 15px rgba(0,0,0,.1);
}

/* common */
.ribbon {
  width: 150px;
  height: 150px;
  overflow: hidden;
  position: absolute;
}
.ribbon::before,
.ribbon::after {
  position: absolute;
  z-index: -1;
  content: '';
  display: block;
  border: 5px solid #2980b9;
}
.ribbon span {
  position: absolute;
  display: block;
  width: 225px;
  padding: 15px 0;
  background-color: #3498db;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
  color: #fff;
  font: 700 18px/1 'Lato', sans-serif;
  text-shadow: 0 1px 1px rgba(0,0,0,.2);
  text-transform: uppercase;
  text-align: center;
}

/* top left*/
.ribbon-top-left {
  top: -10px;
  left: -10px;
}
.ribbon-top-left::before,
.ribbon-top-left::after {
  border-top-color: transparent;
  border-left-color: transparent;
}
.ribbon-top-left::before {
  top: 0;
  right: 0;
}
.ribbon-top-left::after {
  bottom: 0;
  left: 0;
}
.ribbon-top-left span {
  right: -25px;
  top: 30px;
  transform: rotate(-45deg);
}

/* top right*/
.ribbon-top-right {
  top: -10px;
  right: -10px;
}
.ribbon-top-right::before,
.ribbon-top-right::after {
  border-top-color: transparent;
  border-right-color: transparent;
}
.ribbon-top-right::before {
  top: 0;
  left: 0;
}
.ribbon-top-right::after {
  bottom: 0;
  right: 0;
}
.ribbon-top-right span {
  left: -25px;
  top: 30px;
  transform: rotate(45deg);
}

/* bottom left*/
.ribbon-bottom-left {
  bottom: -10px;
  left: -10px;
}
.ribbon-bottom-left::before,
.ribbon-bottom-left::after {
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.ribbon-bottom-left::before {
  bottom: 0;
  right: 0;
}
.ribbon-bottom-left::after {
  top: 0;
  left: 0;
}
.ribbon-bottom-left span {
  right: -25px;
  bottom: 30px;
  transform: rotate(225deg);
}

/* bottom right*/
.ribbon-bottom-right {
  bottom: -10px;
  right: -10px;
}
.ribbon-bottom-right::before,
.ribbon-bottom-right::after {
  border-bottom-color: transparent;
  border-right-color: transparent;
}
.ribbon-bottom-right::before {
  bottom: 0;
  left: 0;
}
.ribbon-bottom-right::after {
  top: 0;
  right: 0;
}
.ribbon-bottom-right span {
  left: -25px;
  bottom: 30px;
  transform: rotate(-225deg);
}
    </style>
  </head>
  <body class="sidebar-fixed sidebar-dark sidebar-minified header-fixed header-light" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>
    <div class="mobile-sticky-body-overlay"></div>
    <div class="wrapper">
      <!--
        ====================================
        ——— LEFT SIDEBAR WITH FOOTER
        =====================================
        -->
      <aside class="left-sidebar bg-sidebar">
        <div id="sidebar" class="sidebar sidebar-with-footer">
          <!-- Aplication Brand -->
          <div class="app-brand">
            <a href="../../index.html">
              <svg
                class="brand-icon"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="xMidYMid"
                width="30"
                height="33"
                viewBox="0 0 30 33"
                >
                <g fill="none" fill-rule="evenodd">
                  <path
                    class="logo-fill-blue"
                    fill="#7DBCFF"
                    d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                    />
                  <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                </g>
              </svg>
              <span class="brand-name">WEKONEK</span>
            </a>
          </div>
          <!-- begin sidebar scrollbar -->
          <div class="sidebar-scrollbar">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
              <li
                class="has-sub"
                >
                <a
                  class="sidenav-item-link"
                  href="javascript:void(0)"
                  data-toggle="collapse"
                  data-target="#dashboard"
                  aria-expanded="false"
                  aria-controls="dashboard"
                  >
                <i class="mdi mdi-home"></i>
                <span class="nav-text">Dashboard</span> <b class="caret"></b>
                </a>
                <ul
                  class="collapse"
                  id="dashboard"
                  data-parent="#sidebar-menu"
                  >
                  <div class="sub-menu">
                    <li>
                      <a href="/mrhs/teacher">Home</a>
                    </li>
                  </div>
                </ul>
              </li>
              <li
                class="has-sub active expand"
                >
                <a
                  class="sidenav-item-link"
                  href="javascript:void(0)"
                  data-toggle="collapse"
                  data-target="#layouts"
                  aria-expanded="false"
                  aria-controls="layouts"
                  >
                <i class="mdi mdi-widgets"></i>
                <span class="nav-text">Academics</span> <b class="caret"></b>
                </a>
                <ul
                  class="collapse show"
                  id="layouts"
                  data-parent="#sidebar-menu"
                  >
                  <div class="sub-menu">
                    <li
                      class="has-sub"
                      >
                      <a
                        class="sidenav-item-link"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#headers"
                        aria-expanded="false"
                        aria-controls="headers"
                        >
                      <span class="nav-text">My Class</span> <b class="caret"></b>
                      </a>
                      <ul
                        class="collapse"
                        id="headers"
                        >
                        <div class="sub-menu">
                          <li  
                            >
                            <a href="/mrhs/teacher/academics/class/activities">Activities</a>
                          </li>
                          <li  
                            >
                            <a href="/mrhs/teacher/academics/class/assignments">Assignments</a>
                          </li>
                          <li  
                            >
                            <a href="/mrhs/teacher/academics/class/submission">Class</a>
                          </li>
                        </div>
                      </ul>
                    </li>
                    <li
                      class="has-sub"
                      >
                      <a
                        class="sidenav-item-link"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#sidebar-navs"
                        aria-expanded="false"
                        aria-controls="sidebar-navs"
                        >
                      <span class="nav-text">Subject</span> <b class="caret"></b>
                      </a>
                      <ul
                        class="collapse"
                        id="sidebar-navs"
                        >
                        <div class="sub-menu">
                          <li  
                            >
                            <a href="/mrhs/teacher/academics/subject">Subject</a>
                          </li>
                          <!--  -->
                        </div>
                      </ul>
                    </li>
                    <li class="active"  
                      >
                      <a href="/mrhs/teacher/academics/schedule">Advisory</a>
                    </li>
                  </div>
                </ul>
              </li>
              <li
                class="has-sub"
                >
                <a
                  class="sidenav-item-link"
                  href="javascript:void(0)"
                  data-toggle="collapse"
                  data-target="#ui-elements"
                  aria-expanded="false"
                  aria-controls="ui-elements"
                  >
                <i class="mdi mdi-account-multiple"></i>
                <span class="nav-text">Students</span> <b class="caret"></b>
                </a>
                <ul
                  class="collapse"
                  id="ui-elements"
                  data-parent="#sidebar-menu"
                  >
                  <div class="sub-menu">
                    <li>
                      <a href="/mrhs/teacher/students">Student List</a>
                    </li>
                    <li
                      class="has-sub"
                      >
                      <a
                        class="sidenav-item-link"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#icons"
                        aria-expanded="false"
                        aria-controls="icons"
                        >
                      <span class="nav-text">Rankings</span> <b class="caret"></b>
                      </a>
                      <ul
                        class="collapse"
                        id="icons"
                        >
                        <div class="sub-menu">
                          <li  
                            >
                            <a href="/mrhs/teacher/students/rankings">Top 1 to 10</a>
                          </li>
                        </div>
                      </ul>
                    </li>
                  </div>
                </ul>
              </li>
              <li
                class="has-sub"
                >
                <a
                  class="sidenav-item-link"
                  href="javascript:void(0)"
                  data-toggle="collapse"
                  data-target="#charts"
                  aria-expanded="false"
                  aria-controls="charts"
                  >
                <i class="mdi mdi-chart-pie"></i>
                <span class="nav-text">Statistics</span> <b class="caret"></b>
                </a>
                <ul class="collapse" id="charts" data-parent="#sidebar-menu">
                  <div class="sub-menu">
                    <li>
                      <a href="/mrhs/teacher/statistics/graph">Graphs</a>
                    </li>
                  </div>
                </ul>
              </li>
              <li class="has-sub">
                <a class="sidenav-item-link"
                  href="javascript:void(0)"
                  data-toggle="collapse"
                  data-target="#pages"
                  aria-expanded="false"
                  aria-controls="pages"
                  >
                <i class="mdi mdi-book-open-variant"></i>
                <span class="nav-text">Grades</span> <b class="caret"></b>
                </a>
                <ul
                  class="collapse"
                  id="pages"
                  data-parent="#sidebar-menu"
                  >
                  <div class="sub-menu">
                    <li  
                      >
                      <a href="/mrhs/teacher/grades/firstgrading">First</a>
                    </li>
                    <li  
                      >
                      <a href="/mrhs/teacher/grades/secondgrading">Second</a>
                    </li>
                    <li  
                      >
                      <a href="/mrhs/teacher/grades/thirdgrading">Third</a>
                    </li>
                    <li  
                      >
                      <a href="/mrhs/teacher/grades/finalgrading">Final Grading</a>
                    </li>
                  </div>
                </ul>
              </li>
              <li class="has-sub">
                <a class="sidenav-item-link"
                  href="javascript:void(0)"
                  data-toggle="collapse"
                  data-target="#account"
                  aria-expanded="false"
                  aria-controls="pages"
                  >
                <i class="mdi mdi-settings"></i>
                <span class="nav-text">Account</span> <b class="caret"></b>
                </a>
                <ul
                  class="collapse"
                  id="account"
                  data-parent="#sidebar-menu"
                  >
                  <div class="sub-menu">
                    <li  
                      >
                      <a href="/mrhs/teacher/account/profile">Profile</a>
                    </li>
                    <li  
                      >
                      <a href="/mrhs/teacher/accountsettings">Account Settings</a>
                    </li>
                  </div>
                </ul>
              </li>
            </ul>
          </div>
          <hr class="separator" />
          <!-- <div class="sidebar-footer">
            <div class="sidebar-footer-content">
              <h6 class="text-uppercase">
                Cpu Uses <span class="float-right">40%</span>
              </h6>
              <div class="progress progress-xs">
                <div
                  class="progress-bar active"
                  style="width: 40%;"
                  role="progressbar"
                ></div>
              </div>
              <h6 class="text-uppercase">
                Memory Uses <span class="float-right">65%</span>
              </h6>
              <div class="progress progress-xs">
                <div
                  class="progress-bar progress-bar-warning"
                  style="width: 65%;"
                  role="progressbar"
                ></div>
              </div>
            </div>
            </div> -->
        </div>
      </aside>
      <div class="page-wrapper">
        <!-- Header -->
        <header class="main-header " id="header">
          <nav class="navbar navbar-static-top navbar-expand-lg">
            <!-- Sidebar toggle button -->
            <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
            </button>
            <!-- search form -->
            <form action="#" method="get" class="search-form hidden-xs">
              <div class="input-group">
                <button
                  type="submit"
                  name="search"
                  id="search-btn"
                  class="btn btn-flat"
                  >
                <i class="mdi mdi-magnify"></i>
                </button>
                <input
                  type="text"
                  name="query"
                  class="form-control"
                  placeholder="Search & Enter......"
                  autofocus
                  />
              </div>
            </form>
            <div class="navbar-right ">
              <ul class="nav navbar-nav">
                <!-- Notifications -->
                <li class="dropdown notifications-menu">
                  <button class="dropdown-toggle" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header">You have {{$totalNotif}} notifications</li>
                    @if(!empty($arryNotif))
                      @foreach($arryNotif as $notif)
                      @if($notif['type'] == 'advisory')
                    <li>
                      <a href="#">
                      <i class="mdi mdi-poll"></i> {{$notif['message']}}
                      <span class=" font-size-12 d-inline-block float-right"
                        ><i class="mdi mdi-clock-outline"></i> <time class="timeago" datetime="{{$notif['time_stamp']}}"></time></span
                        >
                      </a>
                    </li>
                    @endif
                    @endforeach
                 @endif
                    <li class="dropdown-footer">
                      <a class="text-center" href="#"> View All </a>
                    </li>
                  </ul>
                </li>
                <!-- User Account -->
                <li class="dropdown user-menu">
                  <button
                    href="#"
                    class="dropdown-toggle nav-link"
                    data-toggle="dropdown"
                    >
                  <img
                    src="{{asset($profile['profile'])}}"
                    class="user-image" style="border-radius: 25px;"
                    alt="User Image"
                    />
                  <span class="d-none d-lg-inline-block">
                @if($profile['gender'] == 'Female')
                  Ms.{{$profile['firstname']}}
                @elseif($profile['gender'] == 'Male')
                Mr.{{$profile['firstname']}}
                 @endif
              </span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <!-- User image -->
                    <li class="dropdown-header">
                      <img
                        src="{{asset($profile['profile'])}}"
                        class="img-circle" style="border-radius: 25px;"
                        alt="User Image"
                        />
                      <div class="d-inline-block">
                        
                        {{$profile['firstname']}} {{$profile['lastname']}}

                       
                        <small class="pt-1"><span class="mb-2 mr-2 badge badge-dark">USER ID {{$profile['teacher_id']}}</span></small> 
                      </div>
                    </li>
                    <li>
                      <a href="/mrhs/teacher/account/profile">
                      <i class="mdi mdi-account"></i> My Profile
                      </a>
                    </li>
                    <li>
                      <a href="email-inbox.html">
                      <i class="mdi mdi-email"></i> Message
                      </a>
                    </li>
                    <li>
                      <a href="/mrhs/teacher/accountsettings"> <i class="mdi mdi-settings"></i> Account Setting </a>
                    </li>
                    <li class="dropdown-footer">
                      <a href="/mrhs/teacher/logout"> <i class="mdi mdi-logout"></i> Log Out </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <div class="loading" id="showhide" style="
    position: fixed;
    width: 100%;
    height: 100%;
    background: #ffffffc7;
    z-index: 5;
    "><!-- <h1 style="
    position: relative;
    top: 35%;
    left: 500px;
    color: #4c84ffeb;
">Creating...</h1> --><div class="sk-wave" id="showhide" style="
    position: relative;
    top: 40%;
">
    <div class="rect1"></div>
    <div class="rect2"></div>
    <div class="rect3"></div>
    <div class="rect4"></div>
</div></div>
        <div class="content-wrapper">
          <div class="content">
            <div class="bg-white border-rounded">
              <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                  <div class="card-header card-header-border-bottom">
                    <h2>Advisory</h2>
                  </div>
                  <div class="card-body">
                    <p class="mb-5"><strong>{{$mysect['sectionName']}}</strong><br>{{$mysect['description']}}<br>Room {{$mysect['room']}}<br>Capacity <span id="totalstudents">{{$totalStudents}}</span>/{{$mysect['capacity']}}</a></p>
                     @if(!empty($mysect))
                      <table id="user1" class="table table-striped table-hover mt-2">

                        <thead>
                          <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">S.N</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody id="studentlist">
                          @if(!empty($mystudents))
                            @foreach($mystudents as $cs)
                            <tr id="r{{$cs['id']}}">
                              <td><img src="{{asset($cs['profile'])}}" width="35" height="35" style="border-radius: 100px;"></td>
                              <td>{{$cs['student_id']}}</td>
                              <td>{{$cs['firstname']}}</td>
                              <td>{{$cs['lastname']}}</td>
                              <td><span class="badge badge-warning">{{$cs['role']}}</span></td>
                              <td><a href="#" id="remove" sid="{{$cs['student_id']}}" class="btn btn-danger btn-sm btn-pill">Remove</a></td>
                            </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                      @else
                      @endif
          
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>

            <div class="modal fade" id="addstudent" tabindex="-1" role="dialog" aria-labelledby="addstudent" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalGridTitle">Student List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="modal-body">
                      <div class="container-fluid">
                        <label>My Section Capacity</label>
                        <div class="progress" id="progressbar">
                          @if($totalStudents < $mysect['capacity'])
                        <div class="progress-bar progress-bar-striped progress-bar-animated role="progressbar" style="width: {{$totalStudents * 100 / $mysect['capacity']}}%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10">Capacity {{$totalStudents}}/{{$mysect['capacity']}}</div>
                        @elseif($totalStudents == $mysect['capacity'])
                         <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{$totalStudents * 100 / $mysect['capacity']}}%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10">Capacity {{$totalStudents}}/{{$mysect['capacity']}}</div>
                        @endif
                      </div>
                        <table id="user2" class="table table-hover table-striped mt-3">
                        <thead>
                          <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">S.N</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody id="redo">
                          @if(!empty($mystudent))
                            @foreach($mystudent as $count=>$student)
                              @if($student['section_id'] == 0)
                          <tr id="s{{$student['id']}}">
                            <td><img src="{{asset($student['profile'])}}" style="border-radius: 100px;" width="35"></td>
                            <td>{{$student['student_id']}}</td>
                            <td>{{$student['firstname']}}</td>
                            <td>{{$student['lastname']}}</td>
                            <td><span class="mb-2 mr-2 badge badge-warning">{{$student['role']}}</span></td>
                            <td>
                              <div>
                              @if($totalStudents < $mysect['capacity'])
                              <a class="mb-1 btn btn-sm btn-primary btn-pill render" href="#" id="gostudent" sid="{{$student['student_id']}}" tid="{{$profile['teacher_id']}}" sec="{{$mysect['section_id']}}">Add as student</a>
                              @elseif($totalStudents == $mysect['capacity'])
                              <button type="button" class="mb-1 btn btn-sm btn-warning btn-pill render" id="remstudent" style="color:#fff;" href="#" sid="{{$student['student_id']}}" tid="{{$profile['teacher_id']}}" sec="{{$mysect['section_id']}}" disabled>Section Full</button>
                              @endif
                              <button type="button" class="mb-1 btn btn-sm btn-warning btn-pill render" id="remstudent" style="color:#fff; display: none;" href="#" sid="{{$student['student_id']}}" tid="{{$profile['teacher_id']}}" sec="{{$mysect['section_id']}}" disabled>Section Full</button>
                              </div>
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
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-pill" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

                      <!--
              ====================================
              ——— RIGHT SIDEBAR
              =====================================
            -->

            <div class="right-sidebar">
              <div class="btn-right-sidebar-toggler">
                <i class="mdi mdi-chevron-left"></i>
              </div>
              <!-- Nav Right -->
              <div class="right-nav-container">
                <ul class="nav nav-right-sidebar">
                  <li class="nav-item" title="Task">
                    <a
                      class="nav-link text-danger icon-sm"
                      data-toggle="tab"
                      href="#find-replace"
                      role="tab"
                      aria-controls="nav-home"
                      aria-selected="true"
                    >
                      <i class="mdi mdi-note-plus-outline"></i>
                    </a>
                  </li>

                   <li class="nav-item" title="Invite Students">
                    <a
                      class="nav-link text-primary icon-sm"
                      data-toggle="tab"
                      href="#launch"
                      role="tab"
                      aria-controls="nav-profile"
                      aria-selected="false"
                    >
                      <i class="mdi mdi-launch"></i>
                    </a>
                  </li>

                  <li class="nav-item" title="Subjects">
                    <a
                      class="nav-link text-purple icon-sm"
                      data-toggle="tab"
                      href="#question-answer"
                      role="tab"
                      aria-controls="nav-contact"
                      aria-selected="false"
                    >
                      <i class="mdi mdi-qrcode-edit"></i>
                    </a>
                  </li>
                 
                  <li class="nav-item" title="Drop">
                    <a
                      class="nav-link text-purple icon-sm"
                      data-toggle="tab"
                      href="#storage"
                      role="tab"
                      aria-controls="nav-contact"
                      aria-selected="false"
                    >
                      <i class="mdi mdi-dropbox"></i>
                    </a>
                  </li>
                </ul>
              </div>

              <!-- Nav Right Sidebar Tab Content -->
              <div class="right-sidebar-tab">
                <div class="tab-content" id="nav-tabContent">
                  <div
                    class="tab-pane"
                    id="find-replace"
                    role="tabpanel"
                    aria-labelledby="nav-profile-tab"
                  >
                    <div class="card card-right-sidebar">
                      <div class="card-header">
                        <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="card-title">New Task</h5>
                      </div>
                      <div class="card-body">
                        <form action="#">
                          <div class="form-group">
                            <label for="exampleInputEmail13">Email address</label>
                            <input
                              type="email"
                              class="form-control"
                              id="exampleInputEmail13"
                              aria-describedby="emailHelp"
                              placeholder="Enter email"
                            />
                            <small id="emailHelp" class="form-text text-muted"
                              >We'll never share your email with anyone else.</small
                            >
                          </div>
                          <div class="form-group">
                            <label for="categorySelect">Category</label>
                            <select class="form-control" id="categorySelect">
                              <option>Finance</option>
                              <option>Sales</option>
                              <option>System</option>
                              <option>Customers</option>
                              <option>Orders</option>
                            </select>
                          </div>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" placeholder="Units" />
                          </div>

                          <div class="form-group">
                            <label>filter:</label>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="pending"
                              />
                              <label class="custom-control-label" for="pending"
                                >Pending transations</label
                              >
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="marginss2"
                              />
                              <label class="custom-control-label" for="marginss2"
                                >Include margins</label
                              >
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="balance"
                              />
                              <label class="custom-control-label" for="balance"
                                >Include balance</label
                              >
                            </div>
                          </div>
                          <button class="btn btn-primary">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div
                    class="tab-pane"
                    id="launch"
                    role="tabpanel"
                    aria-labelledby="nav-contact-tab"
                  >
                    <div class="card card-right-sidebar">
                      <div class="card-header">
                        <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="card-title">Invite Student</h5>
                      </div>
                      <div class="card-body px-0 text-center">
                        @if(!empty($mysect))
                      <button type="button" class="mb-1 mt-1 btn btn-primary" data-toggle="modal" data-target="#addstudent">Add Student</button>
                      <table class="table table-striped table-hover mt-2">

                        <thead>
                          <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">S.N</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                           <!--  <th scope="col">Role</th>
                            <th scope="col">Action</th> -->
                          </tr>
                        </thead>
                        <tbody id="studentlist">
                          @if(!empty($mystudents))
                            @foreach($mystudents as $cs)
                            <tr id="r{{$cs['id']}}">
                              <td><img src="{{asset($cs['profile'])}}" width="35" height="35" style="border-radius: 100px;"></td>
                              <td>{{$cs['student_id']}}</td>
                              <td>{{$cs['firstname']}}</td>
                              <td>{{$cs['lastname']}}</td>
                              <!-- <td><span class="badge badge-warning">{{$cs['role']}}</span></td>
                              <td><a href="#" id="remove" sid="{{$cs['student_id']}}" class="btn btn-danger btn-sm btn-pill">Remove</a></td> -->
                            </tr>
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                      @else
                      @endif
                      <div class="mt-3 text-center">
                        <a href="#">View All Student</a>
                      </div>
                      </div>
                    </div>
                  </div>

                  <div
                    class="tab-pane"
                    id="question-answer"
                    role="tabpanel2"
                    aria-labelledby="nav-contact-tab"
                  >
                    <div class="card card-right-sidebar">
                      <div class="card-header">
                        <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="card-title">Handled Subject</h5>
                      </div>

                      <div class="card-body">
                        <table class="table table-striped table-hover mt-2">

                        <thead>
                          <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">S.N</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                           <!--  <th scope="col">Role</th>
                            <th scope="col">Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                  <!--  -->
                   <div
                    class="tab-pane"
                    id="storage"
                    role="tabpanel2"
                    aria-labelledby="nav-contact-tab"
                  >
                    <div class="card card-right-sidebar">
                      <div class="card-header">
                        <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="card-title">Drop</h5>
                      </div>

                      <div class="card-body">
                        <form action="#">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input
                              type="email"
                              class="form-control"
                              id="exampleInputEmail1"
                              aria-describedby="emailHelp"
                              placeholder="Enter email"
                            />
                            <small id="emailHelp" class="form-text text-muted"
                              >Please enter your email address.</small
                            >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail15">Location:</label>
                            <input
                              type="email"
                              class="form-control"
                              id="exampleInputEmail15"
                              aria-describedby="emailHelp"
                              placeholder="Enter Location"
                            />
                            <small id="emailHelp" class="form-text text-muted"
                              >please enter your location.</small
                            >
                          </div>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" placeholder="Units" />
                          </div>

                          <div class="form-group">
                            <label>filter:</label>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="pending1"
                              />
                              <label class="custom-control-label" for="pending1"
                                >Pending transations</label
                              >
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="marginss"
                              />
                              <label class="custom-control-label" for="marginss"
                                >Include margins</label
                              >
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="balance2"
                              />
                              <label class="custom-control-label" for="balance2"
                                >Include balance</label
                              >
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!--  -->
                </div>
              </div>
            </div>
        </div>
        <footer class="footer mt-auto">
          <div class="copyright bg-white">
            <p>
              &copy; 2018 Copyright <a
                class="text-primary"
                href="../../../www.iamabdus.com/index.html"
                target="_blank"
                >MRHS</a> Powered by
              <a
                class="text-primary"
                href="../../../www.iamabdus.com/index.html"
                target="_blank"
                >Wekonek</a
                >.
            </p>
          </div>
        </footer>
      </div>
    </div>

    <script src="{{asset('sleeze/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('sleeze/assets/plugins/toaster/toastr.min.js')}}"></script>
    <script src="{{asset('sleeze/assets/plugins/slimscrollbar/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('sleeze/assets/plugins/charts/Chart.min.js')}}"></script>
    <script src="{{asset('sleeze/assets/plugins/ladda/spin.min.js')}}"></script>
    <script src="{{asset('sleeze/assets/plugins/ladda/ladda.min.js')}}"></script>
    <script src="{{asset('sleeze/assets/plugins/jquery-mask-input/jquery.mask.min.js')}}"></script>
    <script src="{{asset('sleeze/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('sleeze/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
    <script src="{{asset('sleeze/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
    <script src="{{asset('sleeze/assets/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('sleeze/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('sleeze/assets/js/sleek.js')}}"></script>
    <script src="{{asset('sleeze/assets/js/chart.js')}}"></script>
    <script src="{{asset('sleeze/assets/js/date-range.js')}}"></script>
    <script src="{{asset('sleeze/assets/js/map.js')}}"></script>
    <script src="{{asset('sleeze/assets/js/custom.js')}}"></script>
    <script src="{{asset('vendor/datatables/datatables.min.js')}}"></script>
<!--     <script type="text/javascript">
       $('#user1').DataTable({
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>tp",
            "bPaginate": false,
            "bLengthChange": false,
            "ordering": false,
            buttons:[
            ]
        });
    </script> -->
    <script type="text/javascript">
      /**
 * Timeago is a jQuery plugin that makes it easy to support automatically
 * updating fuzzy timestamps (e.g. "4 minutes ago" or "about 1 day ago").
 *
 * @name timeago
 * @version 1.6.3
 * @requires jQuery v1.2.3+
 * @author Ryan McGeary
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 *
 * For usage and examples, visit:
 * http://timeago.yarp.com/
 *
 * Copyright (c) 2008-2017, Ryan McGeary (ryan -[at]- mcgeary [*dot*] org)
 */

(function (factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as an anonymous module.
    define(['jquery'], factory);
  } else if (typeof module === 'object' && typeof module.exports === 'object') {
    factory(require('jquery'));
  } else {
    // Browser globals
    factory(jQuery);
  }
}(function ($) {
  $.timeago = function(timestamp) {
    if (timestamp instanceof Date) {
      return inWords(timestamp);
    } else if (typeof timestamp === "string") {
      return inWords($.timeago.parse(timestamp));
    } else if (typeof timestamp === "number") {
      return inWords(new Date(timestamp));
    } else {
      return inWords($.timeago.datetime(timestamp));
    }
  };
  var $t = $.timeago;

  $.extend($.timeago, {
    settings: {
      refreshMillis: 60000,
      allowPast: true,
      allowFuture: false,
      localeTitle: false,
      cutoff: 0,
      autoDispose: true,
      strings: {
        prefixAgo: null,
        prefixFromNow: null,
        suffixAgo: "",
        suffixFromNow: "from now",
        inPast: 'any moment now',
        seconds: "%ds",
        minute: "%dmin",
        minutes: "%dmin",
        hour: "%dh",
        hours: "%dh",
        day: "%dd",
        days: "%dd",
        month: "%dm",
        months: "%dm",
        year: "%dy",
        years: "%dy",
        wordSeparator: " ",
        numbers: []
      }
    },

    inWords: function(distanceMillis) {
      if (!this.settings.allowPast && ! this.settings.allowFuture) {
          throw 'timeago allowPast and allowFuture settings can not both be set to false.';
      }

      var $l = this.settings.strings;
      var prefix = $l.prefixAgo;
      var suffix = $l.suffixAgo;
      if (this.settings.allowFuture) {
        if (distanceMillis < 0) {
          prefix = $l.prefixFromNow;
          suffix = $l.suffixFromNow;
        }
      }

      if (!this.settings.allowPast && distanceMillis >= 0) {
        return this.settings.strings.inPast;
      }

      var seconds = Math.abs(distanceMillis) / 1000;
      var minutes = seconds / 60;
      var hours = minutes / 60;
      var days = hours / 24;
      var years = days / 365;

      function substitute(stringOrFunction, number) {
        var string = $.isFunction(stringOrFunction) ? stringOrFunction(number, distanceMillis) : stringOrFunction;
        var value = ($l.numbers && $l.numbers[number]) || number;
        return string.replace(/%d/i, value);
      }

      var words = seconds < 45 && substitute($l.seconds, Math.round(seconds)) ||
        seconds < 90 && substitute($l.minute, 1) ||
        minutes < 45 && substitute($l.minutes, Math.round(minutes)) ||
        minutes < 90 && substitute($l.hour, 1) ||
        hours < 24 && substitute($l.hours, Math.round(hours)) ||
        hours < 42 && substitute($l.day, 1) ||
        days < 30 && substitute($l.days, Math.round(days)) ||
        days < 45 && substitute($l.month, 1) ||
        days < 365 && substitute($l.months, Math.round(days / 30)) ||
        years < 1.5 && substitute($l.year, 1) ||
        substitute($l.years, Math.round(years));

      var separator = $l.wordSeparator || "";
      if ($l.wordSeparator === undefined) { separator = " "; }
      return $.trim([prefix, words, suffix].join(separator));
    },

    parse: function(iso8601) {
      var s = $.trim(iso8601);
      s = s.replace(/\.\d+/,""); // remove milliseconds
      s = s.replace(/-/,"/").replace(/-/,"/");
      s = s.replace(/T/," ").replace(/Z/," UTC");
      s = s.replace(/([\+\-]\d\d)\:?(\d\d)/," $1$2"); // -04:00 -> -0400
      s = s.replace(/([\+\-]\d\d)$/," $100"); // +09 -> +0900
      return new Date(s);
    },
    datetime: function(elem) {
      var iso8601 = $t.isTime(elem) ? $(elem).attr("datetime") : $(elem).attr("title");
      return $t.parse(iso8601);
    },
    isTime: function(elem) {
      // jQuery's `is()` doesn't play well with HTML5 in IE
      return $(elem).get(0).tagName.toLowerCase() === "time"; // $(elem).is("time");
    }
  });

  // functions that can be called via $(el).timeago('action')
  // init is default when no action is given
  // functions are called with context of a single element
  var functions = {
    init: function() {
      functions.dispose.call(this);
      var refresh_el = $.proxy(refresh, this);
      refresh_el();
      var $s = $t.settings;
      if ($s.refreshMillis > 0) {
        this._timeagoInterval = setInterval(refresh_el, $s.refreshMillis);
      }
    },
    update: function(timestamp) {
      var date = (timestamp instanceof Date) ? timestamp : $t.parse(timestamp);
      $(this).data('timeago', { datetime: date });
      if ($t.settings.localeTitle) {
        $(this).attr("title", date.toLocaleString());
      }
      refresh.apply(this);
    },
    updateFromDOM: function() {
      $(this).data('timeago', { datetime: $t.parse( $t.isTime(this) ? $(this).attr("datetime") : $(this).attr("title") ) });
      refresh.apply(this);
    },
    dispose: function () {
      if (this._timeagoInterval) {
        window.clearInterval(this._timeagoInterval);
        this._timeagoInterval = null;
      }
    }
  };

  $.fn.timeago = function(action, options) {
    var fn = action ? functions[action] : functions.init;
    if (!fn) {
      throw new Error("Unknown function name '"+ action +"' for timeago");
    }
    // each over objects here and call the requested function
    this.each(function() {
      fn.call(this, options);
    });
    return this;
  };

  function refresh() {
    var $s = $t.settings;

    //check if it's still visible
    if ($s.autoDispose && !$.contains(document.documentElement,this)) {
      //stop if it has been removed
      $(this).timeago("dispose");
      return this;
    }

    var data = prepareData(this);

    if (!isNaN(data.datetime)) {
      if ( $s.cutoff === 0 || Math.abs(distance(data.datetime)) < $s.cutoff) {
        $(this).text(inWords(data.datetime));
      } else {
        if ($(this).attr('title').length > 0) {
            $(this).text($(this).attr('title'));
        }
      }
    }
    return this;
  }

  function prepareData(element) {
    element = $(element);
    if (!element.data("timeago")) {
      element.data("timeago", { datetime: $t.datetime(element) });
      var text = $.trim(element.text());
      if ($t.settings.localeTitle) {
        element.attr("title", element.data('timeago').datetime.toLocaleString());
      } else if (text.length > 0 && !($t.isTime(element) && element.attr("title"))) {
        element.attr("title", text);
      }
    }
    return element.data("timeago");
  }

  function inWords(date) {
    return $t.inWords(distance(date));
  }

  function distance(date) {
    return (new Date().getTime() - date.getTime());
  }

  // fix for IE6 suckage
  document.createElement("abbr");
  document.createElement("time");
}));

  @if(!empty($arryNotif))
        $("time.timeago").timeago();
        @endif
    </script>
  </body>
  <!-- Mirrored from sleek.tafcoder.com/layouts/sidebar-navs/sidebar-minimized.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 12:47:02 GMT -->
</html>
@else
<script>window.location = "/";</script>
@endif