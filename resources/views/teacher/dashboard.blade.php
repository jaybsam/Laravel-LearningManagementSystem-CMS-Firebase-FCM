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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
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
    <link href="{{asset('sleeze/assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
    <link href="{{asset('sleeze/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link
      href="{{asset('sleeze/assets/plugins/daterangepicker/daterangepicker.css')}}"
      rel="stylesheet"
      />
      <link rel="stylesheet" type="text/css" href="{{asset('vendor/introjs/introjs.css')}}">
    <!-- SLEEK CSS -->
    <link rel="stylesheet" href="{{asset('sleeze/assets/css/styles.css')}}" />

    <link href="{{asset('sleeze/assets/img/favicon.png')}}" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate.css/animate.css')}}">

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
              
              function checksection(){
                $.ajax({
                  type:'GET',
                  url: '/mrhs/teacher/checker1/{{$mysect['id']}}',
                  success:function(response){
                    
                    if(response.close){
                        setTimeout(checksection, 5000);
                        $('button[id=hideaddstudent]').replaceWith('<button type="button" id="hideaddstudent" class="mb-1 mt-1 btn btn-outline-danger" disabled title="Section is Closed">Section Close</button>');
                        $('span[id=statusbadge]').replaceWith('<span id="statusbadge" class="badge badge-danger">Close</span>');
                        $('#addstudent').modal('hide');  

                    }else if(response.open){
                      setTimeout(checksection, 5000);
                      $('button[id=hideaddstudent]').replaceWith('<button type="button" id="hideaddstudent" class="mb-1 mt-1 btn btn-outline-primary" data-toggle="modal" data-target="#addstudent">Add Student</button>');
                      $('span[id=statusbadge]').replaceWith('<span id="statusbadge" class="badge badge-success">Open</span>');

                    }
                    
                  }
                });
              }
              checksection();
              pulse();
      $(document).ready(function(){
        // $('#statistics').modal('show');
        $('#showhide').css({'display': "none"});


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
              $('#studentlist').append('<tr id="r'+response.students.id+'"><td><img src="http://127.0.0.1:8000/'+response.students.profile+'" width="35" height="35" style="border-radius:100px;"></td><td>'+response.students.student_id+'</td><td>'+response.students.firstname+'</td><td>'+ response.students.lastname +'</td></tr>');
              $('tr[id=s'+response.students.id+']').remove();
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
                $('tr[id=r'+ response.id+']').remove();
                console.log(response);
                @if(!empty($mysect))
                  @if(!empty($profile))
                $('tbody[id=redo]').append('<tr id="s'+response.student.id+'"><td><img src="http://127.0.0.1:8000/'+response.student.profile+'" width="35" height="35" style="border-radius:100px;"></td><td>'+response.student.student_id+'</td><td>'+response.student.firstname+'</td><td>'+ response.student.lastname +'</td><td><span class="badge badge-warning">'+response.student.role+'</span></td><td><a class="mb-1 btn btn-sm btn-primary btn-pill render" href="#" id="gostudent" sid="'+response.student.student_id+'" tid="'+{{$profile['teacher_id']}}+'" sec="'+{{$mysect['section_id']}}+'">Add as student</a></td></tr>');
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
    background-color: #384461;
  }
  .box {
  position: relative;
  max-width: 600px;
  width: 90%;
  height: 400px;
  background: #fff;
  box-shadow: 0 0 15px rgba(0,0,0,.1);
}
div.dataTables_wrapper div.dataTables_filter{
  text-align: left;
}
div.dataTables_wrapper div.dataTables_paginate{
  margin-top:25px;
}
.pagination .page-item:first-child .page-link, .pagination .page-item:last-child .page-link{
  height: auto !important;
}
.page-link{
  padding:10px;
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
.studentTable{
  display: flex;
    flex-direction: column;
     overflow: hidden; 
    height: 100%;
    z-index: 1050;
}
#studentlist{
  display: inline-block;
  overflow: hidden;
    width: auto;
    height: 100%;
}
#studentbody{
  position: fixed;
    bottom: 150px;
    top: 125px;
}
.mysubject > tr:hover{
  cursor: pointer;
}
.mysection > tr:hover{
  cursor: pointer;
}
#studentlist > tr:hover{
  cursor: pointer;
}
@media (min-width: 1200px){
    .right-sidebar-in .content-wrapper {
      margin-right: 60px;
      transition: margin-right .3s ease-in-out;
  }
}
label{
  color:#4c84ff;
}
.form-group label, .input-group label{
  color:#4c84ff;
}
.nav-tabs.nav-style-border .nav-item .nav-link{
  color:#4c84ff;
}
.student-information{
    border-radius: 15px;
    width: 150px;
    height: 150px;
}
.a-student{
  color:#4c84ff !important;
}
.nav-tabs.nav-style-border .nav-item .nav-link{
  font-size: 16px;
}
.dropdown-item{
  transition: none !important;
}
.dropdown-item:hover, .dropdown-item:focus {
    color: #fff;
    text-decoration: none;
    background-color: #4c84ff;
}
#postbody{
  position: fixed;
    bottom: 150px;
    top: 125px;
}
.form-post{
  margin-right: 43px;
}
#body-post{
  width: auto;
    position: fixed;
    overflow: scroll;
    overflow-x: hidden;
    top: 137px;
    bottom: 0;
    margin-right: 62px;
}
@media (min-width: 768px){
  .sidebar-fixed.sidebar-minified.header-fixed .page-wrapper .main-header{
    padding-left: 0px !important;
  }
  .sidebar-fixed.sidebar-minified .page-wrapper{
    padding-left: 0px !important;
  }
}
.right-nav-container{
  background:  #19202b;
}
.right-sidebar-tab{
  background :#19202bf0;
}
.navbar{
  border-bottom: 0;
}
.table thead th{
  border-bottom: 0;
}
.table th, .table td{
  border-top:0;
}
.table-striped tbody tr:nth-of-type(odd){
  background-color: rgba(247, 201, 201, 0.05);
}
thead th, tbody tr td:first-child{
  color:#616161;
}
.right-nav-container{
  border-left: 0;
}
.card-right-sidebar .card-header{
  color: #fff;
}
.card-right-sidebar .card-header .close{
  color:#fff;
}
.card{
  background: transparent;
}
.dark{
  background: #19202b;
}

/*#launch {
    width: 100%;
    display:block;
}
#body {
    height: 700px;
    display: inline-block;
    overflow: scroll;
}

#body::-webkit-scrollbar{
  display: none;

}*/

/*table {
    width: 100%;
    display:block;
}

#studentlist::-webkit-scrollbar{
  display: none;

}
@media screen and (max-height: 1024px){
      #studentlist {
        height: 580px;
        display: inline-block;
        overflow: scroll;
      }
}
@media screen and (min-height: 640px){
      #studentlist {
        height: 300px;
        display: inline-block;
        overflow: scroll;
      }
}*/

    </style>
  </head>
  <body class="sidebar-fixed-offcanvas sidebar-dark header-fixed header-dark sidebar-collapse" id="body">
    <script>
      NProgress.configure({ showSpinner: true });
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
         
          <div class="app-brand">
            <a href="/mrhs/teacher">
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
         
          <div class="sidebar-scrollbar">
  
            <ul class="nav sidebar-inner" id="sidebar-menu">
              <li class="active">
                <a onclick="$('#showhide').fadeIn(); $('body').addClass('sidebar-collapse');"
                  class="sidenav-item-link"
                  href="/mrhs/teacher"
                  >
                <i class="mdi mdi-home"></i>
                <span class="nav-text">Dashboard</span>
                </a>
              </li>
              <li>
                <a onclick="$('#showhide').fadeIn(); $('body').addClass('sidebar-collapse');" class="sidenav-item-link" href="/mrhs/teacher">
                <i class="mdi mdi-bell"></i>
                <span class="nav-text">Notification</span>
                <span class="badge badge-success">new</span>
                </a>
              </li>
              <li>
                <a onclick="$('#showhide').fadeIn(); $('body').addClass('sidebar-collapse');" class="sidenav-item-link" href="/mrhs/teacher">
                <i class="mdi mdi-message-processing"></i>
                <span class="nav-text">Discussions</span>
                </a>
              </li>
              <li>
                <a onclick="$('#showhide').fadeIn(); $('body').addClass('sidebar-collapse');" class="sidenav-item-link" href="/mrhs/teacher">
                <i class="mdi mdi-calendar-today"></i>
                <span class="nav-text">Calendar</span>
                </a>
              </li>
              <li>
                <a onclick="$('#showhide').fadeIn(); $('body').addClass('sidebar-collapse');" class="sidenav-item-link" href="/mrhs/teacher/lessons">
                <i class="mdi mdi-book"></i>
                <span class="nav-text">Lessons</span>
                <span class="badge badge-success">new</span>
                </a>
              </li>
              <li>
                <a onclick="$('#showhide').fadeIn(); $('body').addClass('sidebar-collapse');" class="sidenav-item-link" href="/mrhs/teacher">
                <i class="mdi mdi-account-multiple"></i>
                <span class="nav-text">Students</span>
                </a>
              </li>
              <li>
                <a onclick="$('#showhide').fadeIn(); $('body').addClass('sidebar-collapse');" class="sidenav-item-link" href="/mrhs/teacher">
                <i class="mdi mdi-format-float-left"></i>
                <span class="nav-text">Post</span>
                </a>
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
        <header class="main-header " id="header" data-intro='This is your navigation bar where you could access search, notification, and your account. the magnifying glass icon indicates the search, while the bell icon indicates the notification. at the rightside indicates your account where you could toggle to your profile, message and logout !'>
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
            <div class="navbar-center">
              <ul class="nav navbar-nav">
                <li class="dropdown user-menu" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Date Today">
                  <button
                    href="#"
                    class="dropdown-toggle nav-link"
                    data-toggle="dropdown"
                    >
                  <span class="d-none d-lg-inline-block text-light">
                {{$date}}
              </span>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <!-- User image -->
                    <li class="dropdown-header">
                      Calendar
                    </li>
                    <li>
                      <a href="/mrhs/teacher/account/profile">
                      <i class="mdi mdi-calendar-today"></i> Calendar
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
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
                      <a href="/mrhs/teacher/logout" onclick="$('#showhide').fadeIn();"> <i class="mdi mdi-logout"></i> Log Out </a>
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
    top: 35%;">
    <div class="rect1"></div>
    <div class="rect2"></div>
    <div class="rect3"></div>
    <div class="rect4"></div>
</div></div>
        <div class="content-wrapper">
       <div class="content">        
          <div class="bg-white border rounded">
                <div class="row p-3">
                  <div class="col-lg-4">
                  <div class="card card-default" style="overflow: hidden;" data-intro='Your profile analytics'>
                    <div class="card-header">
                      <h2>Profile</h2>
                    </div>
                    <div class="card-body text-center">
                      <img class="rounded-circle d-flex mx-auto" src="{{asset($profile['profile'])}}" width="80" alt="user image">
                      <h4 class="py-2 text-dark">@if($profile['gender'] == 'Female')
                  Ms.{{$profile['firstname']}} {{$profile['lastname']}}
                @elseif($profile['gender'] == 'Male')
                Mr.{{$profile['firstname']}} {{$profile['lastname']}}
                 @endif</h4>
                      <p>Albrecht.straub@gmail.com</p>
                      <a class="btn btn-primary btn-pill btn-lg my-4" href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();">Settings</a>
                    </div>
                    <div class="d-flex justify-content-between px-5 pb-4">
                      <div class="text-center pb-4">
                        <h6 class="text-dark pb-2"><span id="totalstudents">{{$totalStudents}}</span></h6>
                        <p>Students</p>
                      </div>
                      <div class="text-center pb-4">
                        <h6 class="text-dark pb-2">@if(!empty($totalLesson)){{$totalLesson}} @else 0 @endif</h6>
                        <p>Lessons</p>
                      </div>
                      <div class="text-center pb-4">
                        <h6 class="text-dark pb-2">@if(!empty($total_section)){{$total_section}} @else 0 @endif</h6>
                        <p>Section</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="row">
                  <div class="col-md-6">
                    <div class="border rounded"  data-intro='Your current subject lessons where you are designated to teach.'>
                      <div class="card-header pt-5 flex-column align-items-start">
                                    <h4 class="text-dark mb-4">Current Lessons</h4>
                                    <div class="mb-3">
                                      <p class="my-2">My Lessons remaining</p>
                                      <h4>{{$totalLesson}}</h4>
                                    </div>
                                  </div>
                        <table class="table">
                        <thead class="text-center">
                          <tr>
                            <th scope="col">Lessons</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th>Students</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          @if(!empty($sched))
                           @foreach($getsection as $sect)
                            @foreach($sched as $myschedule)
                              @if($myschedule['teacher_id'] == $profile['teacher_id'])
                                @if($sect['section_id'] == $myschedule['section_id'])
                                  <tr>
                                    <td><a href="#" data-toggle="modal" data-target="#subjectdetails{{$myschedule['id']}}">{{$myschedule['subject']}}</a></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                      {{$sect['students']['studentsCount']}} <i class="mdi mdi-account-multiple"></i>
                                    </td>
                                  </tr>
                                   
                                @endif
                              @endif
                              @endforeach
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-md-6">
                  <div style=" overflow: hidden;"  data-intro='Graph of your lessons and how many students are in it!'>
                    <div class="card-header pt-5 flex-column align-items-start">
                      <h4 class="text-dark mb-4">Lessons graph</h4>
                    </div>
                    <div class="border-bottom"></div>
                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                      <canvas id="currentUser" class="chartjs chartjs-render-monitor" width="244" height="283" style="display: block; width: 244px; height: 283px;"></canvas>
                    </div>
                    <div class="card-footer d-flex flex-wrap bg-white border-top">
                      <a href="#" class="text-uppercase py-3">View All Subjects</a>
                    </div>
                  </div>
                  </div>
                  </div>
                </div>
                <div class="col-md-4" data-intro='Your recent activity logs you can see all of your actions involving the activity in your dashboard !'>
                   <div class="card card-default" id="analytics-device" data-scroll-height="580" style="height: 580px; overflow: hidden;">
                            <div class="card-header justify-content-between">
                              <h2>Section {{$mysect['sectionName']}}</h2>
                            </div>
                            <div class="card-body">
                              <div class="pb-5"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <canvas id="deviceChart" width="380" height="230" class="chartjs-render-monitor" style="display: block; width: 380px; height: 230px;"></canvas>
                              </div>
                              <div class="row no-gutters justify-content-center">
                                <div class="col-4 col-lg-6">
                                  <div class="card card-icon-info text-center border-0">
                                    <i class="mdi mdi-gender-male"></i>
                                    <p class="pt-3 pb-1">Male</p>
                                    <h4 class="text-dark pb-1">60.0%</h4>
                                    <span class="text-danger">1.5% <i class="mdi mdi-arrow-down-bold"></i></span>
                                  </div>
                                </div>
                                <div class="col-4 col-lg-6">
                                  <div class="card card-icon-info text-center border-0">
                                    <i class="mdi mdi-gender-female"></i>
                                    <p class="pt-3 pb-1">Female</p>
                                    <h4 class="text-dark pb-1">15.0%</h4>
                                    <span class="text-success">1.5% <i class="mdi mdi-arrow-up-bold"></i></span>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                          </div>
                </div>
                <div class="col-md-4" data-intro='You could also add a to do notes whether you have something to do within the nextday as a reminder !'>
                  <!-- To Do list -->
                  <div class="card card-default mb-4 bg-white pt-5 todo-table" id="todo" data-scroll-height="560">
                    <div class="card-header d-flex flex-wrap justify-content-between bg-white border-bottom-0 align-items-center pb-5">
                      <h2 class="d-inline-block">To Do List</h2>
                      <a class="btn btn-primary btn-pill" id="add-task" href="#" role="button"> Add task </a>
                    </div>
                    <div class="card-body slim-scroll pt-0">
                      <div class="todo-single-item d-none" id="todo-input">
                        <form class="">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Todo" autofocus>
                          </div>
                        </form>
                      </div>
                      <div class="todo-list" id="todo-list">
                        <div class="todo-single-item d-flex flex-row justify-content-between finished">
                          <i class="mdi"></i>
                          <span class="">Finish Dashboard UI Kit update</span>
                          <span class="badge badge-primary">Finished</span>
                        </div>
                        <div class="todo-single-item d-flex flex-row justify-content-between current">
                          <i class="mdi"></i>
                          <span class="">Create new prototype for the landing page</span>
                          <span class="badge badge-primary">Today</span>
                        </div>
                        <div class="todo-single-item d-flex flex-row justify-content-between ">
                          <i class="mdi"></i>
                          <span class=""> Add new Google Analytics code to all main files </span>
                          <span class="badge badge-danger">Yesterday</span>
                        </div>

                        <div class="todo-single-item d-flex flex-row justify-content-between ">
                          <i class="mdi"></i>
                          <span class="">Update parallax scroll on team page</span>
                          <span class="badge badge-success">Dec 15, 2018</span>
                        </div>

                        <div class="todo-single-item d-flex flex-row justify-content-between ">
                          <i class="mdi"></i>
                          <span class="">Update parallax scroll on team page</span>
                          <span class="badge badge-success">Dec 15, 2018</span>
                        </div>
                        <div class="todo-single-item d-flex flex-row justify-content-between ">
                          <i class="mdi"></i>
                          <span class="">Create online customer list book</span>
                          <span class="badge badge-success">Dec 15, 2018</span>
                        </div>
                        <div class="todo-single-item d-flex flex-row justify-content-between ">
                          <i class="mdi"></i>
                          <span class="">Lorem ipsum dolor sit amet, consectetur.</span>
                          <span class="badge badge-success">Dec 15, 2018</span>
                        </div>

                        <div class="todo-single-item d-flex flex-row justify-content-between mb-1">
                          <i class="mdi"></i>
                          <span class="">Update parallax scroll on team page</span>
                          <span class="badge badge-success">Dec 15, 2018</span>
                        </div>
                      </div>
                    </div>
                    <div class="mt-3"></div>
                  </div>
                </div>
                <div class="col-md-4" data-intro='You could view your notifications whether admin has an update or some parents or students wants to have a moment with you !'>
                  <!-- Notification Table -->
                        <div class="card card-default mb-4 bg-white pt-5" data-scroll-height="590">
                          <div class="card-header d-flex flex-wrap justify-content-between bg-white border-bottom-0 mb-4">
                            <h2>Latest Notifications</h2>
                            <div>
                                <button class="text-black-50 mr-2 font-size-20"><i class="mdi mdi-cached"></i></button>
                                <div class="dropdown show d-inline-block widget-dropdown">
                                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-notification">
                                      <li class="dropdown-item"><a  href="#">Action</a></li>
                                      <li class="dropdown-item"><a  href="#">Another action</a></li>
                                      <li class="dropdown-item"><a  href="#">Something else here</a></li>
                                    </ul>
                                  </div>
                            </div>

                          </div>
                          <div class="card-body slim-scroll py-0 mb-4">
                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                <i class="mdi mdi-cart-outline font-size-20"></i>
                              </div>
                              <div class="media-body pr-3 ">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New Order</a>
                                <p class="">Selena has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </div>

                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                                <i class="mdi mdi-email-outline font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New Enquiry</a>
                                <p class="">Phileine has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 9 AM</span>
                            </div>


                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                                <i class="mdi mdi-stack-exchange font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">Support Ticket</a>
                                <p class="">Emma has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </div>

                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                <i class="mdi mdi-cart-outline font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New order</a>
                                <p class="">Ryan has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </div>

                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-info text-white">
                                <i class="mdi mdi-calendar-blank font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">Comapny Meetup</a>
                                <p class="">Phileine has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </div>

                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-warning text-white">
                                <i class="mdi mdi-stack-exchange font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">Support Ticket</a>
                                <p class="">Emma has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 10 AM</span>
                            </div>

                            <div class="media py-3 align-items-center justify-content-between">
                              <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                                <i class="mdi mdi-email-outline font-size-20"></i>
                              </div>
                              <div class="media-body pr-3">
                                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New Enquiry</a>
                                <p class="">Phileine has placed an new order</p>
                              </div>
                              <span class=" font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> 9 AM</span>
                            </div>

                          </div>
                          <div class="mt-3"></div>
                        </div>
                </div>
                </div>
              </div>
            </div>
            @if(!empty($mystudent))
            @foreach($mystudent as $cs)
            <div class="modal fade" id="studentinfo{{$cs['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Student Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="p-3">
                          <img src="{{asset($cs['profile'])}}" class="student-information">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="p-3">
                          <p><a class="a-student">Student Number</a> : <span class="mb-2 mr-2 badge badge-primary">{{$cs['student_id']}}</span><p>
                        <p><a class="a-student">Name:</a> {{$cs['firstname']}} {{$cs['lastname']}}</p>
                        <p><a class="a-student">Gender:</a> {{$cs['gender']}}</p>
                        <p><a class="a-student">Age:</a> {{$cs['age']}}</p>
                        <p><a class="a-student">Birthdate:</a> {{$cs['month']}}-{{$cs['day']}}-{{$cs['year']}}</p>
                        <p><a class="a-student">Address:</a> {{$cs['address']}}</p>
                        <p><a class="a-student">Contact:</a> {{$cs['contact']}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-pill" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-pill">View Grade</button>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif
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
                        <table class="table table-hover table-striped mt-3" id="datatable1">
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
                            <td><img src="{{asset($student['profile'])}}" style="border-radius: 100px;" width="35" height="35"></td>
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

            <!-- Statistics Modal -->
            <div class="modal fade" id="statistics" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end statistics -->

            <!-- Subject details -->
    @if(!empty($sched))
       @foreach($getsection as $sect)
        @foreach($sched as $myschedule)
          @if($myschedule['teacher_id'] == $profile['teacher_id'])
            @if($sect['section_id'] == $myschedule['section_id'])
              <div class="modal fade" id="subjectdetails{{$myschedule['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h6 class="text-primary">Subject Information</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body p-5">
                      <h3 class="text-primary">{{$myschedule['subject']}}</h3><br>
                      <p>(school) Subjects are the parts into which learning can be divided. At school, each lesson usually covers one subject only. Some of the most common subjects at school are English, history, mathematics, physical education and science.</p>
                      <div class="row">
                        <table class="table table-bordered">
                          <tbody>
                            @if(!empty($myteachers))
                              @foreach($myteachers as $teacher)
                                @if($sect['teacher_id'] == $teacher['teacher_id'])
                            <tr>
                              <td scope="row">Section</td>
                              <td>{{$sect['sectionName']}}</td>
                            </tr>
                            <tr>
                              <td>Adviser</td>
                              <td>
                                <img src="{{asset($teacher['profile'])}}" width="45px" height="45px" class="rounded-circle mr-2">
                                @if($sect['teacher_id'] == $profile['teacher_id'])
                                  @if($teacher['gender'] == 'Female')
                                  Ms.{{$teacher['firstname']}} {{$teacher['lastname']}} (You)
                                  @elseif($teacher['gender'] == 'Male')
                                  Mr.{{$teacher['firstname']}} {{$teacher['lastname']}} (You)
                                  @endif
                                @else
                                  @if($teacher['gender'] == 'Female')
                                  Ms.{{$teacher['firstname']}} {{$teacher['lastname']}}
                                  @elseif($teacher['gender'] == 'Male')
                                  Mr.{{$teacher['firstname']}} {{$teacher['lastname']}}
                                  @endif
                                @endif
                              </td>
                            </tr>
                                @endif
                              @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
                      <div class="row">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Subject</th>
                              <th scope="col">Time start</th>
                              <th scope="col">Time end</th>
                              <th>Students</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td scope="row">{{$myschedule['subject']}}</td>
                              <td>{{$myschedule['start']}}</td>
                              <td>{{$myschedule['end']}}</td>
                              <td>{{$sect['students']['studentsCount']}} <i class="mdi mdi-account-multiple"></i></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                      <div class="row" id="viewstudents" style="display: none;">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Profile</th>
                              <th scope="col">Student Number</th>
                              <th scope="col">Student Name</th>
                              <th>Role</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(!empty($mystudent))
                              @foreach($mystudent as $stud)
                                @if($stud['section_id'] == $myschedule['section_id'])
                            <tr>
                              <td scope="row"><img src="{{asset($stud['profile'])}}" width="45px" height="45px" class="rounded-circle"></td>
                              <td>{{$stud['student_id']}}</td>
                              <td>{{$stud['firstname']}} {{$stud['lastname']}}</td>
                              <td>{{$stud['role']}} <i class="mdi mdi-account-multiple"></i></td>
                            </tr>
                              @endif
                              @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
                      <div class="text-center">
                        <a href="#" class="trigger"> View Students for this subject.</a>
                        <a href="#" class="trigger1" style="display: none;"> Hide Students for this subject.</a>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              @endif
            @endif
          @endforeach
        @endforeach
      @endif
            <!--  -->

                      <!--
              ====================================
              ——— RIGHT SIDEBAR
              =====================================
            -->

            <div class="right-sidebar" data-intro='Quickbar links where you could add students view all subjects and activate the post section !'>
              <div class="btn-right-sidebar-toggler">
                <i class="mdi mdi-chevron-left"></i>
              </div>
              <!-- Nav Right -->
              <div class="right-nav-container">
                <ul class="nav nav-right-sidebar">
                  <li class="nav-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Post">
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
                  <li class="nav-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Invite Students">
                    <a
                      class="nav-link text-primary icon-sm"
                      data-toggle="tab"
                      href="#launch"
                      role="tab"
                      aria-controls="nav-profile"
                      aria-selected="false"
                    >
                      <i class="mdi  mdi-account-plus"></i>
                    </a>
                  </li>
                  <li class="nav-item" data-toggle="tooltip" data-placement="left" title="" data-original-title="Section and Lessons">
                    <span class="badge badge-pill badge-warning" style="position: fixed; right: 0;">New</span>
                    <a
                      class="nav-link text-purple icon-sm"
                      data-toggle="tab"
                      href="#question-answer"
                      role="tab"
                      aria-controls="nav-contact"
                      aria-selected="false"
                    >
                      <i class="mdi mdi-book-open"></i>
                    </a>
                  </li>
                 
                  <!-- <li class="nav-item" title="Drop">
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
                  </li> -->
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
                    <div class="card card-right-sidebar dark">
                      <div class="card-header">
                        <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="card-title">New Posts</h5>
                      </div>
                      <div class="card-body" id="body-post">
                        <form class="form-post" action="/mrhs/teacher/post/act" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                            <label>Subject / Section</label>
                            <select class="form-control" autofocus name="subsec" required>
                              <option value=""></option>
                              <optgroup label="Section">
                                @if(!empty($mysect))
                                <option value="{{$mysect['section_id']}}">{{$mysect['sectionName']}}</option>
                                @endif
                              </optgroup>
                              <optgroup label="Subject">
                              @if(!empty($sched))
                                @foreach($sched as $schedule)
                                  @if($schedule['teacher_id'] == $profile['teacher_id'])
                                    <option value="{{$schedule['subject_id']}}">{{$schedule['subject']}}</option>
                                          @endif
                                      @endforeach
                                    @endif
                              </optgroup>
                            </select>
                             <small id="emailHelp" class="form-text text-muted"
                              >Select your prefered section / subject to drop this topic</small
                            >
                          </div>
                          <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category" required>
                              <option value=""></option>
                              <option value="Activity">Activity</option>
                              <option value="Assignment">Assignment</option>
                              <option value="Seatwork">Seatwork</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Topic</label>
                            <input type="text" class="form-control" name="topic" placeholder="Type your topic here" required>
                             <small id="emailHelp" class="form-text text-muted"
                              >ex. Activity 6 Essay</small
                            >
                          </div>
                         
                          <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="5" cols="10" placeholder="Type your description here" name="description" required></textarea>
                            <small id="emailHelp" class="form-text text-muted"
                              >Always give the students a best topic or assignments every morning of the school year.</small
                            >
                          </div>
                          <div class="form-group">
                            <label>Files</label>
                            <input type="file" name="file">
                          </div>
                          <div class="form-group">
                            <label>Options:</label>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="pending"
                                name="onhold"
                              />
                              <label class="custom-control-label" for="pending"
                                >On Hold this post</label
                              >
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary">Post</button>
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
                    <div class="card card-right-sidebar dark">
                      <div class="card-header">
                        <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="card-title">Invite Student</h5>
                      </div>
                      <div class="card-body px-0 ml-2 text-center" id="studentbody">
                        @if(!empty($mysect))
                         @if($mysect['status'] == 'Open')
                          <button type="button" id="hideaddstudent" class="mb-1 mt-1 btn btn-outline-primary" data-toggle="modal" data-target="#addstudent">Add Student</button>
                          @elseif($mysect['status'] == 'Close')
                          <button type="button" id="hideaddstudent" class="mb-1 mt-1 btn btn-outline-danger" disabled title="Section is Closed">Closed</button>
                          @endif
                      <div class="p-3">
                        <div class="progress" id="progressbar">
                          @if($totalStudents < $mysect['capacity'])
                        <div class="progress-bar progress-bar-striped progress-bar-animated role="progressbar" style="width: {{$totalStudents * 100 / $mysect['capacity']}}%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10">Capacity {{$totalStudents}}/{{$mysect['capacity']}}</div>
                        @elseif($totalStudents == $mysect['capacity'])
                         <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: {{$totalStudents * 100 / $mysect['capacity']}}%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10">Capacity {{$totalStudents}}/{{$mysect['capacity']}}</div>
                        @endif
                      </div>
                      </div>
                      <table class="table table-striped table-hover mt-2 studentTable">

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
                        <tbody class="fixed_header" id="studentlist">
                          @if(!empty($mystudents))
                            @foreach($mystudents as $cs)
                            
                            <tr onclick="$('#studentinfo{{$cs['id']}}').modal('show');" id="r{{$cs['id']}}">
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
                      <div class="text-center">
                        <a href="/mrhs/teacher/academics/advisory">View All Student</a>
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
                    <div class="card card-right-sidebar dark">
                      <div class="card-header">
                        <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="card-title">Section/Lessons</h5>
                      </div>

                      <div class="card-body px-0 ml-2 text-center" id="studentbody">
                        <table class="table table-striped table-hover">
                          <thead>
                              <tr>
                                <th>Section</th>
                                <th>Status</th>
                                <th>Capacity</th>
                                <th>Room</th>
                              </tr>
                          </thead>
                          <tbody class="mysection">
                             @if(!empty($mysect))
                            <tr onclick="window.location='/mrhs/teacher';" class="table-active">
                              <td>{{$mysect['sectionName']}}</td>
                              <td>
                                @if($mysect['status'] == 'Close')
                                <span id="statusbadge" class="badge badge-danger">{{$mysect['status']}}</span>
                                @elseif($mysect['status'] == 'Open')
                                <span id="statusbadge" class="badge badge-success">{{$mysect['status']}}</span>
                                @endif
                              </td>
                              <td><span id="totalstudents">{{$totalStudents}}</span>/{{$mysect['capacity']}}</td>
                              <td>{{$mysect['room']}}</td>
                            </tr>
                          @endif
                            
                          </tbody>
                        </table>
                        <table class="table table-striped table-hover mt-2 studentTable">

                        <thead>
                          <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Category</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                            
                           <!--  <th scope="col">Role</th>
                            <th scope="col">Action</th> -->
                          </tr>
                        </thead>
                        <tbody class="mysubject" id="studentlist">
                          @if(!empty($sched))
                            @foreach($sched as $schedule)
                              @if($schedule['teacher_id'] == $profile['teacher_id'])
                           
                            <tr>
                              <td><a href="#" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false">{{$schedule['subject']}}</a>
                         <div class="dropdown-menu">
                          <a onclick="$('#showhide').fadeIn();" class="dropdown-item" href="/mrhs/teacher/academics/lessons/{{$schedule['subject_id']}}"><i class="mdi mdi-pencil-box-outline mr-2"></i>Visit {{$schedule['subject']}} Post</a>
                          <a onclick="$('#showhide').fadeIn();" class="dropdown-item" href="/mrhs/teacher/grades/{{$schedule['subject_id']}}"><i class="mdi mdi-book mr-2"></i>Visit {{$schedule['subject']}} Grading</a>
                          <a class="dropdown-item" href="#" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-close mr-2"></i>Close</a>
                        </div></td>
                              <td>
                                @if($schedule['category'] == 'Primary')
                              <span class="badge badge-primary">{{$schedule['category']}}</span>
                              @elseif($schedule['category'] == 'Secondary')
                              <span class="badge badge-warning">{{$schedule['category']}}</span>
                              @endif
                            </td>
                              <td>{{$schedule['start']}}p</td>
                              <td>{{$schedule['end']}}p</td>
                            </tr>
                            
                            
                           
                              @endif
                            @endforeach
                          @endif
                        </tbody>
                      </table>
                      <div class="text-center">
                        <a href="#">View All Subjects</a>
                      </div>
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
                            <label>Email address</label>
                            <input
                              type="email"
                              class="form-control"
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
    <script src="{{asset('sleeze/assets/plugins/jekyll/search.min.js')}}"></script>
    <script src="{{asset('sleeze/assets/js/map.js')}}"></script>
    <script src="{{asset('sleeze/assets/js/custom.js')}}"></script>
    <script src="{{asset('vendor/datatables/studentdatatables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('vendor/introjs/intro.js')}}"></script>
    <script type="text/javascript">
      $(function(){
        $('tbody[id=studentlist]').slimScroll({
          height: '100%'
        });
        $('form[id=postbody]').slimScroll({
          height: '100%'
        });
      });
      introJs().start();
    </script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#datatable1').DataTable({
            dom: "<<'filter mt-4 mb-2'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            'ordering': false,
            'bInfo': false,
            'bLengthChange': false,
            "oLanguage": {
              "sSearch": "Filter "
            },
            buttons: [
                
            ]
        });
        $('a.trigger').click(function(){
          $('div[id=viewstudents]').fadeIn(100);
          $('a.trigger').hide();
          $('a.trigger1').show();
        });
        $('a.trigger1').click(function(){
          $('div[id=viewstudents]').fadeOut(100);
          $('a.trigger').show();
          $('a.trigger1').hide();
        });

      });
    </script>
    <script type="text/javascript">

(function (factory) {
  if (typeof define === 'function' && define.amd) {
 // * @version 1.6.3
 // * @requires jQuery v1.2.3+
    // AMD. Register as an anonymous module.
    define(['jquery'], factory);
  } else if (typeof module === 'object' && typeof module.exports === 'object') {
    factory(require('jquery'));
  } else {
    // Browser globals
    factory(jQuery);
  }
}(function ($) {
  $.notification = function(timestamp) {
    if (timestamp instanceof Date) {
      return inWords(timestamp);
    } else if (typeof timestamp === "string") {
      return inWords($.notification.parse(timestamp));
    } else if (typeof timestamp === "number") {
      return inWords(new Date(timestamp));
    } else {
      return inWords($.notification.datetime(timestamp));
    }
  };
  var $t = $.notification;

  $.extend($.notification, {
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
      $(this).data('notification', { datetime: date });
      if ($t.settings.localeTitle) {
        $(this).attr("title", date.toLocaleString());
      }
      refresh.apply(this);
    },
    updateFromDOM: function() {
      $(this).data('notification', { datetime: $t.parse( $t.isTime(this) ? $(this).attr("datetime") : $(this).attr("title") ) });
      refresh.apply(this);
    },
    dispose: function () {
      if (this._timeagoInterval) {
        window.clearInterval(this._timeagoInterval);
        this._timeagoInterval = null;
      }
    }
  };

  $.fn.notification = function(action, options) {
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
      $(this).notification("dispose");
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
    if (!element.data("notification")) {
      element.data("notification", { datetime: $t.datetime(element) });
      var text = $.trim(element.text());
      if ($t.settings.localeTitle) {
        element.attr("title", element.data('notification').datetime.toLocaleString());
      } else if (text.length > 0 && !($t.isTime(element) && element.attr("title"))) {
        element.attr("title", text);
      }
    }
    return element.data("notification");
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
        $("time.timeago").notification();
        @endif
    </script>
    <script src="{{asset('vendor/time/script.js')}}"></script>
    <script type="text/javascript">
      $("time.posttime").timeago();
    </script>
    <script type="text/javascript">
      /*======== 14. CURRENT USER BAR CHART ========*/
  var cUser = document.getElementById("currentUser");
  if (cUser !== null) {
    var myUChart = new Chart(cUser, {
      type: "bar",
      data: {
        labels: [
        @if(!empty($sched))
                           @foreach($getsection as $sect)
                            @foreach($sched as $myschedule)
                              @if($myschedule['teacher_id'] == $profile['teacher_id'])
                                @if($sect['section_id'] == $myschedule['section_id'])
          "{{$myschedule['subject']}}",
          @endif
          @endif
          @endforeach
          @endforeach
          @endif
        ],
        datasets: [
          {
            label: "Students per subject",
            data: [@if(!empty($sched))
                           @foreach($getsection as $sect)
                            @foreach($sched as $myschedule)
                              @if($myschedule['teacher_id'] == $profile['teacher_id'])
                                @if($sect['section_id'] == $myschedule['section_id'])
                                {{$sect['students']['studentsCount']}},
                                @endif
                                @endif
                                @endforeach
                                @endforeach
                                @endif],
            // data: [2, 3.2, 1.8, 2.1, 1.5, 3.5, 4, 2.3, 2.9, 4.5, 1.8, 3.4, 2.8],
            backgroundColor: "#4c84ff"
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        title: {
          display: true
        },
        scales: {
          xAxes: [
            {
              gridLines: {
                drawBorder: true,
                display: false,
              },
              ticks: {
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif",
                display: false, // hide main x-axis line
                beginAtZero: true,
                callback: function(tick, index, array) {
                  return index % 2 ? "" : tick;
                }
              },
              barPercentage: 1.8,
              categoryPercentage: 0.2
            }
          ],
          yAxes: [
            {
              gridLines: {
                drawBorder: true,
                display: true,
                color: "#eee",
                zeroLineColor: "#eee"
              },
              ticks: {
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif",
                display: true,
                beginAtZero: true
              }
            }
          ]
        },

        tooltips: {
          mode: "index",
          titleFontColor: "#888",
          bodyFontColor: "#555",
          titleFontSize: 12,
          bodyFontSize: 15,
          backgroundColor: "rgba(256,256,256,0.95)",
          displayColors: true,
          xPadding: 10,
          yPadding: 7,
          borderColor: "rgba(220, 220, 220, 0.9)",
          borderWidth: 2,
          caretSize: 6,
          caretPadding: 5
        }
      }
    });
  }
    </script>
  </body>
  <!-- Mirrored from sleek.tafcoder.com/layouts/sidebar-navs/sidebar-minimized.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 12:47:02 GMT -->
</html>
@else
<script>window.location = "/";</script>
@endif