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
    < <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/animate.css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}"/>
    <link rel="icon" href="{{ asset('images/favicon-96x96.png') }}">

    <!-- App styles -->

    <link rel="stylesheet" href="{{asset('styles/pe-icons/pe-icon-7-stroke.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/pe-icons/helper.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/toastr/toastr.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/stroke-icons/style.css')}}"/>

    <link rel="stylesheet" href="{{asset('vendor/summernote/summernote.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select/select.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/summernote/style.css')}}">
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
        .note-editor.note-frame .note-statusbar{
            border:0px;
        }
        .note-editor.panel-default .note-editing-area .note-editable{
            background-color: #202020a8;
        }
        .img-card2{
           border-radius: 5px;
        }
        .note-group-select-from-files {
    display:block;
}
        .note-recent-color{
            background: transparent !important;
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
                            <img src="{{asset($admins['profile'])}}" width="35" height="35" class="img-circle" alt="">
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
                <li class="active">
                    <a href="#database" data-toggle="collapse" aria-expanded="false">
                        <span class="pe pe-7s-server icons"></span>
                        Database <span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="database" class="nav nav-second collapse in">
                        <li class="active"><a href="/admin/database/export">Export</a></li>
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
    <!-- Loader -->
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
                            <small>Database<br> <span class="c-white">Export</span></small>
                        </div>
                        <div class="header-icon">
                                <i class="pe page-header-icon pe-7s-server"></i>
                            </div>
                            <div class="header-title">
                                <h3 class="m-b-xs">Database</h3>
                                <small>
                                    “Backing up your database is a smart choice in case of emegency or database failure always <br> remember to backup your files to avoid any data loss regarding to our system.” 
                                </small>
                            </div>
                    </div>
                    <hr>
                </div>
            </div>
            <!-- content 2 -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-filled">
                            <div class="panel-body">
                                <div class="header-title">
                                <h3 class="m-b-xs">Export Database</h3>
                                <small>
                                    “Break up the various elements of the event into sections (e.g. registration, catering, transport),<br> and assign a section to each member of your team.” 
                                </small><br/>
                                <br/>
                                <div class="row">
                                    <!-- <div class="col-lg-6"><input type="text" class="form-control" name=""></div> -->
                                    <div class="col-lg-3"><a class="btn btn-default" href="/admin/database/export/ok">Export</a></div>
                                </div>
                                
                                </div><br/>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                
                <!-- add event -->

               
              
               
        </div>
    </section>
    <!-- End main content-->

</div>
<!-- End wrapper-->

<!-- Vendor scripts -->
<script src="{{asset('vendor/pacejs/pace.min.js')}}"></script>
<script src="{{asset('vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/summernote/summernote.min.js')}}"></script>
<script src="{{asset('vendor/select/select.js')}}"></script>
<script src="{{asset('vendor/toastr/toastr.min.js')}}"></script>
<script src="{{asset('vendor/push/push.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('scripts/luna.js')}}"></script>

<script>
    $(document).ready(function () {

        $(".summernote").on("summernote.change", function (e) {   // callback as jquery custom event 
                        $('input[name=hideme]').val($('.summernote').summernote('code'));
        });
        @if(session()->has('success'))
        toastr.warning('{{session()->get("success")}}', 'Event')
        Push.create('Event', {
                            body: '{{session()->get("success")}}',
                            icon: '{{asset($admins['profile'])}}',
                            timeout: 6000,
                            onClick: function () {
                                window.focus();
                                window.location = "/admin/notification";
                            }
                        });
        @endif
        
        $('#form-hide').hide();
        $('button[id=show]').click(function(){
            if($('#form-hide:visible').length)
            $('#form-hide').fadeOut();
            else
                $('#form-hide').fadeIn();
        });
        $('.summernote').summernote({
            placeholder: 'Hello Type your topic here.',
            tabsize: 2,
            height: 300,
            
        });
        $(document).ready(function(){
        $(".select2_demo_1").select2();
        $(".select2_demo_2").select2({
            placeholder: "Select a state",
            allowClear: true
        });
        $(".select2_demo_3").select2();
    })
        // $('#post').click(function(e){
        //     $('#event').modal('hide');
        //     $('.loader').fadeIn();
        //     e.preventDefault();
        //      $.ajaxSetup({
        //       headers: {
        //           'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        //               }
        //           });
        //     $.ajax({
        //          type: 'POST',
        //         url: '/admin/events/events&program/store',
        //         data: {
        //             '_token': $('input[name=_token]').val(),
        //             'cover': $('input[name=file]').val(),
        //             'shortcontent': $('textarea[name=shortcontent]').val(),
        //             'category': $('select[name=cat]').val(),
        //             'content': $('.summernote').summernote('code'),
        //             'title': $('input[name=title]').val(),
        //             'tags': $('select[name=tags]').val(),
        //         },
        //         dataType: 'json',
        //         success:function(data){
        //             console.log(data);
        //             if(data.errors){
        //                 toastr.error(''+ data.errors, 'Missing Fields');
        //             }
        //         },
        //         complete:function(){
        //             $('.loader').fadeOut();
        //         }
        //     });
        // });
        
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
        @if(session()->has('errors'))
         toastr.error('{{session()->get('errors')}}', 'Missing Fields');
         @endif
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
</script>

</body>

</html>
@else
  <script>window.location = "/admin/login";</script>
@endif