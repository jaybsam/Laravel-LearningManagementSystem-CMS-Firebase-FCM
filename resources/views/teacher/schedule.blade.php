@if(session()->has('teacher_id'))
<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <!-- /Added by HTTrack -->
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="_token" content="{{ csrf_token() }}"/>
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
    <link href="{{asset('sleeze/assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
    <link href="{{asset('sleeze/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link
      href="{{asset('sleeze/assets/plugins/daterangepicker/daterangepicker.css')}}"
      rel="stylesheet"
      />
    <!-- SLEEK CSS -->
    <link rel="stylesheet" href="{{asset('sleeze/assets/css/styles.css')}}" />
    <!-- FAVICON -->
    <link href="{{asset('sleeze/assets/img/favicon.png')}}" rel="shortcut icon" />
    <!--
      HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
      -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset('sleeze/assets/plugins/nprogress/nprogress.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#showhide').hide();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
          }
      });
        $('#addschedule').click(function(e){
          e.preventDefault();
          $('#showhide').fadeIn();
          $.ajax({
            type: 'POST',
            url: "/mrhs/teacher/academics/schedule/add/blankschedule",
            data: {'_token': $('input[name=_token]').val(), 'class': $('input[name=classname').val(), 'subject': $('select[name=classtype').val(), 'section': $('select[name=section').val(), 'room': $('select[name=room').val(), 'description': $('input[name=description').val(), 'timestart': $('input[name=start').val(), 'timeend': $('input[name=end').val(), 'day': $('select[name=day').val(), 'date': $('input[name=date').val(), 'capacity': $('input[name=capacity').val(), 'option': $('select[name=option').val()},
            dataType: 'json',
            success: function(data){
              $.each(data.errors, function(key, value){
                        $('.alert-danger').show();
                        $('.alert-danger').append('<p>'+value+'</p>');
                      });
              console.log(data);
                if(data.errors){

                }
                else{
                  
                  $('#notif').append('<div class="alert alert-success" role="alert"><i class="mdi mdi-check mr-1"></i> Success: your schedule has been created.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>');
                  $('.alert-danger').hide();
                  $('tbody').append('<tr class="sc'+ data.id +'">'+
                            '<td scope="row">' + data.classcode + '</td>' +
                            '<td>' + data.class + '</td>' +
                            '<td class="text-dark font-weight-medium">' + data.section + '</td>' +
                            '<td>' + data.description + '</td>' +
                            '<td>' + data.timestart + '-' + data.timeend + ' ' + data.day + '</td>' +
                            '<td>0/'+ data.capacity + '</td>' +
                            '<td><span class="badge badge-success">Open</span></td>' +
                            '<td class="text-right"><div class="dropdown show d-inline-block widget-dropdown">' +
                                '<a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>' +
                                '<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">' + 
                                  '<li class="dropdown-item">' +
                                    '<a href="/mrhs/teacher/academics/schedule/view/'+data.id+'" class="text-primary font-weight-medium"><i class="mdi mdi-eye"></i> View</a>' +
                                  '</li>' +
                                  '<li class="dropdown-item">' +
                                    '<a class="delete text-danger font-weight-medium"  id="'+ data.id+ '" href="#"><i class="mdi mdi-delete"></i> Remove</a>' +
                                  '</li>' +
                                '</ul>' +
                              '</div></td>' +
                          '</tr>');
                }
            },
            complete: function(){
              $('#showhide').fadeOut();
            }
          });
        });

        $("body").on("click", ".delete",function(e){
                    e.preventDefault();
            var id = $(this).attr('id');
            $('#showhide').fadeIn();
          $.ajax({
            type: 'GET',
            url: "/mrhs/teacher/academics/schedule/delete/" + id,
            dataType: 'json',
            success: function(){
              $('.sc'+id).hide();
              $('.alert-danger').fadeIn();
              $('#notif').append('<div class="alert alert-dismissible fade show alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="mdi mdi-delete mr-1"></i> Success : Your schedule has been removed.</div>');
            },
            complete: function(){
              $('#showhide').fadeOut();
            }
          });
        });
      });
    </script>
    <style type="text/css">
  .btn-primary{
    color:#fff !important;
  }
  .sk-wave>div{
    background-color: #4c84ff;
  }
  .form-group label, .input-group label{
    font-size: 13px;
  }
  .form-group .form-control, .input-group .form-control{
    font-size: 14px;
  }
  .alert-danger{
    background: #ff9eb9;
    color:#ff0000 !important;
  }
  .alert-success{
    color:#156a4f!important;
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
                      <a href="/mrhs/teacher">Dashboard</a>
                    </li>
                    <li  
                      >
                      <a href="/mrhs/teacher/analytics">Analytics</a>
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
                      <span class="nav-text">Class</span> <b class="caret"></b>
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
                            <a href="/mrhs/teacher/academics/class/submission">Manage Submission</a>
                          </li>
                        </div>
                      </ul>
                    </li>
                    <li
                      class="has-sub expand"
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
                    <li
                      class="has-sub"
                      >
                      <a
                        class="sidenav-item-link"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#section-navs"
                        aria-expanded="false"
                        aria-controls="sidebar-navs"
                        >
                      <span class="nav-text">Section</span> <b class="caret"></b>
                      </a>
                      <ul
                        class="collapse"
                        id="section-navs"
                        >
                        <div class="sub-menu">
                          <li  
                            >
                            <a href="/mrhs/teacher/academics/section">Section</a>
                          </li>
                          <!--  -->
                        </div>
                      </ul>
                    </li>
                    <li class="active">
                      <a href="/mrhs/teacher/academics/schedule">Schedule</a>
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
                  <i class="mdi mdi-email"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li class="dropdown-header">You have 5 notifications</li>
                    <li>
                      <a href="#">
                      <i class="mdi mdi-account-plus"></i> New user registered
                      <span class=" font-size-12 d-inline-block float-right"
                        ><i class="mdi mdi-clock-outline"></i> 10 AM</span
                        >
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      <i class="mdi mdi-account-remove"></i> User deleted
                      <span class=" font-size-12 d-inline-block float-right"
                        ><i class="mdi mdi-clock-outline"></i> 07 AM</span
                        >
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                      <span class=" font-size-12 d-inline-block float-right"
                        ><i class="mdi mdi-clock-outline"></i> 12 PM</span
                        >
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      <i class="mdi mdi-account-supervisor"></i> New client
                      <span class=" font-size-12 d-inline-block float-right"
                        ><i class="mdi mdi-clock-outline"></i> 10 AM</span
                        >
                      </a>
                    </li>
                    <li>
                      <a href="#">
                      <i class="mdi mdi-server-network-off"></i> Server overloaded
                      <span class=" font-size-12 d-inline-block float-right"
                        ><i class="mdi mdi-clock-outline"></i> 05 AM</span
                        >
                      </a>
                    </li>
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
                  <span class="d-none d-lg-inline-block">{{$profile['firstname']}}</span>
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
                        {{$profile['firstname']}} {{$profile['lastname']}} <small class="pt-1">{{$profile['id_number']}}</small>
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
    width: 90%;
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
            <!-- content -->
              <div id="notif">
                  
 
                </div>
                    
             <div class="row">
              <div class="col-lg-4">
                  <div class="card card-default rounded bg-white mb-4">
                    <div class="card-header d-flex flex-wrap justify-content-between bg-white border-bottom-0 pb-xl-0 pt-5">
                      <h2><span class="mdi mdi-calendar-clock"></span> Class Schedule</h2>
                    </div>
                    <div class="card-body">
                      <form>
                        @csrf
                      <label class="text-dark font-weight-medium" for="">Class Name</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="mdi mdi-tag"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control" name="classname" aria-label="" autocomplete="off" autofocus required>
                      </div>
                      <p style="font-size: 90%">ex. Math2</p>

                      <label class="text-dark font-weight-medium mt-3" for="">Class Type</label>
                      <div class="input-group mb-2">
                        <select class="form-control" name="classtype" required>
                          <option value=""></option>
                          @if(!empty($subjects))
                            @foreach($subjects as $subs)
                            <option value="{{$subs['name']}}">{{$subs['name']}}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>

                      <label class="text-dark font-weight-medium mt-3" for="">Section</label>
                      <div class="input-group mb-2">
                        <select class="form-control" name="section" required>
                          <option value=""></option>
                          @if(!empty($sections))
                            @foreach($sections as $sect)
                            <option value="{{$sect['section']}}">{{$sect['section']}}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>

                      <label class="text-dark font-weight-medium mt-3" for="">Room Number</label>
                      <div class="input-group mb-2">
                        <select class="form-control" name="room" required>
                          <option value=""></option>
                          @if(!empty($sections))
                            @foreach($sections as $sect)
                            <option value="{{$sect['room']}}">{{$sect['room']}}</option>
                            @endforeach
                          @endif
                        </select>
                      </div>

                      <label class="text-dark font-weight-medium mt-3" for="">Description</label>
                      <div class="input-group mb-2">
                        <input type="text" class="form-control" name="description" required>
                      </div>
                      <p style="font-size: 90%">ex. Math2</p>

                      <div class="row mt-4">
                        <div class="col-md-6">
                          <label class="text-dark font-weight-medium">Start time</label>
                          <div class="input-group mb-2">
                        <input type="time" class="form-control"  name="start" aria-label="" autocomplete="off" required>
                      </div>
                        </div>
                        <div class="col-md-6">
                          <label class="text-dark font-weight-medium">End time</label>
                          <div class="input-group mb-2">
                        <input type="time" class="form-control" name="end" aria-label="" autocomplete="off" required>
                      </div>
                        </div>
                      </div>

                      <label class="text-dark font-weight-medium mt-3" for="">Day</label>
                      <div class="input-group mb-2">
                        <select class="form-control" name="day" required>
                          <option value="">Day</option>
                          <option value="Monday">Monday</option>
                          <option value="Tuesday">Tuesday</option>
                          <option value="Wednesday">Wednesday</option>
                          <option value="Thursday">Thursday</option>
                          <option value="Friday">Friday</option>
                          <option value="">---------------------</option>
                          <option value="MWF">MWF</option>
                          <option value="TTH">TTH</option>
                          <option value="">---------------------</option>
                          <option value="Regular">Regular</option>
                        </select>
                      </div>

                      <label class="text-dark font-weight-medium mt-3" for="">Date</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="mdi mdi-calendar-range"></i>
                          </span>
                        </div>
                        <input type="date" class="form-control" placeholder="mm-dd-yyyy" name="date" aria-label="" autocomplete="off" required>
                      </div>

                      <label class="text-dark font-weight-medium mt-3" for="">Capacity</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="mdi mdi-account-multiple-plus"></i>
                          </span>
                        </div>
                        <input type="number" min="1" max="60" class="form-control" name="capacity" required>
                      </div>

                      <p style="font-size: 90%">ex. 01/01/2019</p>
                      <label class="text-dark font-weight-medium mt-3" for="">Schedule Options</label>
                      <div class="input-group mb-2">
                        <select class="form-control" name="option" required>
                           <option value="1">Students will add schedule for them selves</option>
                           <option value="2">I will add students on my own</option>
                        </select>
                      </div>
                      <div class="mt-5 text-right">
                        <button type="reset" class="btn btn-outline-danger">Reset</button>
                        <button type="submit" id="addschedule" class="btn btn-outline-primary">Save</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
              <div class="col-lg-8">
                  <div class="card card-default rounded bg-white mb-4">
                    <div class="card-header d-flex flex-wrap justify-content-between bg-white border-bottom-0 pb-xl-0 pt-5">
                      <h2><span class="mdi mdi-table-large"></span> Schedule Table</h2>
                    </div>
                    <div class="card-body">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Class Code</th>
                            <th scope="col">Class Name</th>
                            <th scope="col">Section</th>
                            <th>Subject</th>
                            <th>Time</th> 
                            <th>Capacity</th>
                            <th>Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if(!empty($myschedule))
                          @foreach($myschedule as $sched)
                          <tr class="sc{{$sched['id']}}">
                            <td scope="row">{{$sched['classcode']}}</td>
                            <td>{{$sched['class']}}</td>
                            <td class="text-dark font-weight-medium">{{$sched['section']}}</td>
                            <td>{{$sched['description']}}</td>
                            <td>{{$sched['timestart']}} - {{$sched['timeend']}} {{$sched['day']}}</td>
                            <td>0/{{$sched['capacity']}}</td>
                            <td><span class="badge badge-success">Open</span></td>
                            <td class="text-right"><div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="" role="button" id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                  <li class="dropdown-item">
                                    <a href="/mrhs/teacher/academics/schedule/view/{{$sched['id']}}" class="text-primary font-weight-medium"><i class="mdi mdi-eye"></i> View</a>
                                  </li>
                                  <li class="dropdown-item">
                                    <a href="#" class="delete text-danger font-weight-medium" id="{{$sched['id']}}"><i class="mdi mdi-delete"></i> Remove</a>
                                  </li>
                                </ul>
                              </div></td>
                          </tr>
                          @endforeach
                          @endif              
                        </tbody>
                      </table>
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
                <li class="nav-item">
                  <a
                    class="nav-link text-primary icon-sm"
                    data-toggle="tab"
                    href="#launch"
                    role="tab"
                    aria-controls="nav-profile"
                    aria-selected="false"
                    >
                  <i class="mdi mdi-bell-outline"></i>
                  </a>
                </li>
                <li class="nav-item">
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
                      <h5 class="card-title">New Schedule</h5>
                    </div>
                    <div class="card-body">
                      <form action="#">
                        <div class="form-group">
                          <label for="exampleInputEmail13">Section Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="exampleInputEmail13"
                            aria-describedby="emailHelp"
                            placeholder="Enter Section Name"
                            />
                          <small id="emailHelp" class="form-text text-muted"
                            >We'll never share your email with anyone else.</small
                            >
                        </div>
                        <div class="form-group">
                          <label for="categorySelect">Subject</label>
                          <select class="form-control" id="categorySelect">
                            <option>Filipino III</option>
                            <option>Sales</option>
                            <option>System</option>
                            <option>Customers</option>
                            <option>Orders</option>
                          </select>
                        </div>
                        <div class="row">
                          <div class="col-lg-8">
                            <div class="form-group">
                              <label for="firstTime">Time</label>
                              <input type="time" min="1" id="firstTime" class="form-control" name="start">
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <label for="lastTime">To</label>
                              <input type="time" min="1" id="lastTime" class="form-control" name="end">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="day">Day</label>
                          <input type="text" id="day" class="form-control" name="day" placeholder="Example MWF | TTH">
                        </div>
                        <div class="form-group">
                          <label>Status</label>
                          <div class="custom-control custom-checkbox mb-2">
                            <input
                              type="checkbox"
                              class="custom-control-input"
                              id="pending"
                              />
                            <label class="custom-control-label" for="pending"
                              >Open</label
                              >
                          </div>
                          <div class="custom-control custom-checkbox mb-2">
                            <input
                              type="checkbox"
                              class="custom-control-input"
                              id="marginss2"
                              />
                            <label class="custom-control-label" for="marginss2"
                              >Close</label
                              >
                          </div>
                        </div>
                        <button class="btn btn-primary">Add Schedule</button>
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
                      <h5 class="card-title">Notification</h5>
                    </div>
                    <div class="card-body px-0">
                      <ul class="notifications-list">
                        <li>
                          <a href="#">
                          <i class="mdi mdi-account-plus"></i> New user registered
                          <span class=" font-size-12 d-inline-block float-right"
                            ><i class="mdi mdi-clock-outline"></i> 10 AM</span
                            >
                          </a>
                        </li>
                        <li>
                          <a href="#">
                          <i class="mdi mdi-account-remove"></i> User deleted
                          <span class=" font-size-12 d-inline-block float-right"
                            ><i class="mdi mdi-clock-outline"></i> 07 AM</span
                            >
                          </a>
                        </li>
                        <li>
                          <a href="#">
                          <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                          <span class=" font-size-12 d-inline-block float-right"
                            ><i class="mdi mdi-clock-outline"></i> 12 PM</span
                            >
                          </a>
                        </li>
                        <li>
                          <a href="#">
                          <i class="mdi mdi-account-supervisor"></i> New client
                          <span class=" font-size-12 d-inline-block float-right"
                            ><i class="mdi mdi-clock-outline"></i> 10 AM</span
                            >
                          </a>
                        </li>
                        <li>
                          <a href="#">
                          <i class="mdi mdi-server-network-off"></i> Server overloaded
                          <span class=" font-size-12 d-inline-block float-right"
                            ><i class="mdi mdi-clock-outline"></i> 05 AM</span
                            >
                          </a>
                        </li>
                      </ul>
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
                      <h5 class="card-title">Event Create</h5>
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
    <script src="{{asset('sleeze/maps.googleapis.com/maps/api/js2ecd?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM')}}" defer></script>
    <script src="{{asset('sleeze/assets/plugins/jquery/jquery.min.js')}}"></script>
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
  </body>
  <!-- Mirrored from sleek.tafcoder.com/layouts/sidebar-navs/sidebar-minimized.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 12:47:02 GMT -->
</html>
@else
<script>window.location = "/";</script>
@endif