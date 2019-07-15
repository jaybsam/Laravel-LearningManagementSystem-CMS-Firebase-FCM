@if(session()->has('email'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>Mauaque Resettlement Highschool</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/animate.css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/toastr/toastr.min.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <link rel="icon" href="{{ asset('images/favicon-96x96.png') }}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('styles/pe-icons/pe-icon-7-stroke.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/pe-icons/helper.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/stroke-icons/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/datatables/datatables.min.css')}}"/>
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
        a:hover >.active{
            margin-left:0px !important;
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
        .modal-open .modal{
            background: #222222ab;
        }
        .text-white{
            color:#fff;
        }
        .mt-3{
            margin-top:5px;
        }
        #toast-success > .toast:before {
            font-size: 18px;
        }
        .modal-open .modal{
            background:#0000001f;
        }
        .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus{
            background:transparent;
            color: #121212;
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
                            <img src="{{asset($admins['profile'])}}" width="35" class="img-circle" alt="">
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/account/profile">Profile</a></li>
                            <li><a href="#">Messages</a></li>
                            <li><a href="/admin/notification">Notifications</a></li>
                            <li class="divider"></li>
                            <li class="li-logout"><a class="logout" href="/admin/logout">Sign Out</a></li>
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
                <li class="active">
                    <a href="#subject" data-toggle="collapse" aria-haspopup="true" aria-expanded="true">
                        <span class="pe pe-7s-notebook icons"></span>
                        Subject<span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="subject" class="nav nav-second collapse in">
                        <li><a href="/admin/subject/section">Section</a></li>
                        <li><a href="/admin/subject/class">Class</a></li>
                        <li class="active"><a href="/admin/subject/schedule">Schedule</a></li>
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
<div class="loader" style="background:#1d212b8f; position: fixed; z-index: 1; width: 100%; height: 100%; display: none;">
            <i class="fa fa-spinner fa-spin" style="font-size:50px; color:#fff; position: relative; top:40%; left:50%;"></i>
        </div>

    <!-- Main content-->
    <section class="content">
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger" style="display: none; background: #db524bba;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <!-- append -->
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-alarm"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Schedule</h3>
                                <small>
                                    “Education is not just about going to school and getting a degree. It's about widening<br> your knowledge and absorbing the truth about life.” 
                                </small>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            <div class="row">
                <div class="panel">
                        <div class="panel-heading">   
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table cellpadding="1" cellspacing="1" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Adviser</th>
                                        <th>Section</th>
                                        <th>Room Number</th>
                                        <th>Grade Level</th>
                                        <th>Capacity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($realsched))
                                        @foreach($realsched as $sched)
                                            
                                    <tr>
                                        <td>
                                        @if($sched['adviser'] == 'Not yet assigned')
                                    <div id="mark{{$sched['id']}}">
                                        <a class="text-danger" data-toggle="modal" data-target="#myModal{{$sched['id']}}" href="#">{{$sched['adviser']}}</a>
                                    </div>
                                        @else
                            <div id="mark{{$sched['id']}}">
                                    <div class="btn-group">
                                          <a href="#" style="text-decoration: none;" class="dropdown-toggle" data-toggle="dropdown"> <img src="{{asset($sched['profile'])}}" class="img-circle" style="margin-right: 7px;" width="25px"><strong style="color:#fff;">{{$sched['adviser']}}</strong></a>
                                        <ul class="dropdown-menu" style="background:#ffffffde;">
                                            <li><a class="removead" rem-id="{{$sched['id']}}" href="#"><span class="fa fa-trash"></span> Remove Advisory</a></li>
                                        </ul>
                                    </div>
                                </div>
                                        @endif
                                    </td>
                                        <td>{{$sched['sectionName']}}</td>
                                        <td>{{$sched['room']}}</td>
                                        <td><span class="label label-primary">Grade {{$sched['level']}}</span></td>
                                        <td>{{$sched['students']['studentsCount']}}/{{$sched['capacity']}}</td>
                                        <td>@if($sched['status'] == 'Open')
                                            <span class="label label-success">{{$sched['status']}}</span>
                                            @elseif($sched['status'] == 'Close')
                                            <span class="label label-danger">{{$sched['status']}}</span>
                                            @endif
                                        </td>
                                        <td><a class="btn btn-default" href="/admin/subject/schedule/manageschedule/{{$sched['id']}}">Manage Schedule</a></td>
                                    </tr>
                                        
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                @if(!empty($realsched))
                                    @foreach($realsched as $sched)
                                             <div class="modal fade" id="myModal{{$sched['id']}}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h4 class="modal-title">{{$sched['sectionName']}}</h4>
                                                <small>{{$sched['description']}}</small>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">

                                                    <table id="data{{$sched['id']}}" class="table table-striped table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>Profile</th>
                                                            <th>Teacher ID</th>
                                                            <th>Firstname</th>
                                                            <th>Lastname</th>
                                                            
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="show"></tr>
                                                    @if(!empty($teachers))
                                                        @foreach($teachers as $sense)
                                                            @if($sense['adviser'] == 0)
                                                            @csrf
                                                        
                                                        <tr class="deletes{{$sense['id']}}">
                                                            <td><img src="{{asset($sense['profile'])}}" class="img-circle" width="35px"></td>
                                                            <td>{{$sense['teacher_id']}}</td>
                                                            <td>{{$sense['firstname']}}</td>
                                                            <td>{{$sense['lastname']}}</td>
                                                            <td><a href="#" class="btn btn-default addadviser" data-id="{{$sched['id']}}" sense-id="{{$sense['id']}}">Add as Adviser</a></td>
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
                                    @endforeach
                                @endif
                            </div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
<script src="{{asset('vendor/datatables/datatables.min.js')}}"></script>
<script src="{{asset('vendor/push/push.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('scripts/luna.js')}}"></script>

<script>
    $(document).ready(function () {
         toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": true,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        } 
       
        $('.close').click(function(){
                            $('.alert-danger').css({'display': 'none'});
                        });
        $('body').on('click', '.addadviser', function(e){
            e.preventDefault();
            var id = $(this).attr('sense-id');
            var id1 = $(this).attr('data-id');

            $('#myModal'+id1).modal('hide');
            $('.loader').fadeIn();
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                      }
                  });
            $.ajax({
                type: 'POST',
                url: '/admin/subject/schedule/editadviser',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': id,
                    'id1': id1
                },
                dataType: 'json',
                success:function(data){
                    toastr.warning('Successfully: made ' + data.adviser + 'as an adviser', 'Added Adviser');
                    Push.create('New Adviser Alert !', {
                            body: 'Added ' + data.adviser + ' as Adviser',
                            icon: '{{asset($admins['profile'])}}',
                            timeout: 8000,
                            onClick: function () {
                                window.focus();
                                window.location = '/admin/notification';
                            }
                        });
                    console.log(data);
                    $('.deletes'+data.id).remove();
                    $('#mark'+ data.id1).replaceWith('<div id="mark'+ data.id1 +'">'+
                                    '<div class="btn-group">'+
                                          '<a href="#" style="text-decoration: none;" class="dropdown-toggle" data-toggle="dropdown"><img src="http://localhost:8000/'+data.profile+'" class="img-circle" style="margin-right: 7px;" width="25px"><strong style="color:#fff;">'+ data.adviser +'</strong></a>' +
                                        '<ul class="dropdown-menu" style="background:#ffffffde;">'+
                                            '<li><a id="removead" rem-id="'+data.id1+'" href="#"><span class="fa fa-trash"></span> Remove Advisory</a></li>'+
                                        '</ul>'+
                                    '</div>'+
                            '</div>');
                    
                },
                complete:function(){
                    $('.loader').fadeOut();
                }
            });
        });
        $('body').on('click', '.removead',function(e){
            e.preventDefault();
            var id = $(this).attr('rem-id');
             $('.loader').fadeIn();
              $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                      }
                  });
             $.ajax({
                type: 'get',
                url: '/admin/subject/schedule/unsetadviser',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': id
                },
                dataType: 'json',
                success:function(data){
                    toastr.error('Successfully: Removed the Adviser', 'Remove');
                    console.log(data);
                    $('#mark'+data.id).replaceWith('<div id="mark'+data.id+'">'+
                                        '<a class="text-danger" data-toggle="modal" data-target="#myModal'+data.id+'" href="#">Not yet assigned</a>'+
                                    '</div>');
                    $('.show').replaceWith('<tr class="show"></tr><tr class="deletes'+data.uid+'">'+
                                                            '<td><img src="http://localhost:8000/'+ data.profile +'" class="img-circle" width="35px"></td>'+
                                                            '<td>'+ data.teacher_id +'</td>'+
                                                            '<td>'+ data.firstname +'</td>'+
                                                            '<td>'+ data.lastname +'</td>'+
                                                            '<td><a href="#" class="btn btn-default addadviser" data-id="'+data.id+'" sense-id="'+data.uid+'">Add as Adviser</a></td>'+
                                                        '</tr>');
                },
                complete:function(){
                    $('.loader').fadeOut();
                }
             });
        });
        @foreach($realsched as $sched)
         $('#data{{$sched['id']}}').DataTable({
            ordering:  false,
            dom: "<'row'<'col-sm-3'l><'col-sm-3 text-center'B><'col-sm-3'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
            ]
        });
         @endforeach
    });
</script>

</body>

</html>
@else
  <script>window.location = "/admin/login";</script>
@endif