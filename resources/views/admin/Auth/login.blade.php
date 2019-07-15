@if(session()->has('email'))
    <script>window.location = "/admin";</script>
@else
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>Mauaque Resettlement Admin login</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/animate.css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}"/>
    <link rel="icon" href="{{ asset('images/favicon-96x96.png') }}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('styles/pe-icons/pe-icon-7-stroke.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/pe-icons/helper.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/stroke-icons/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
    <style type="text/css">
        .alert-dismissable .close, .alert-dismissible .close{
            position: relative;
            top: -21px;
            right: -21px;
            color: inherit;
        }
        .alert-danger{
            color: #ffffff;
            border-color: #DB524B;
            background-color: #db524b3d;
        }
    </style>
</head>
<body class="blank">

<div class="loader" style="background:#1d212b8f; position: fixed; z-index: 1; width: 100%; height: 100%; display: none;">
            <i class="fa fa-spinner fa-spin" style="font-size:50px; color:#fff; position: relative; top:40%; left:48%;"></i>
        </div>
<!-- Wrapper-->
<div class="wrapper">


    <!-- Main content-->
    <section class="content">
        <div class="container-center animated slideInDown">
            <div class="alert alert-danger alert-dismissible" role="alert" id="error1" style="display: none;">
                              
                            </div>
           @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <p>{{session()->get('error')}}</p>
              <small><span class="text-warning">Warning:</span> Recording your <strong class="text-danger">IP address</strong> just in case.</small>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <div class="view-header">
                <div class="header-icon">
                	<img src="{{asset('images/logo/sample_logo3.png')}}" width="60px">
                </div>
                <div class="header-title">
                    <h3>Admin Login</h3>
                    <small>
                        Please enter your credentials to login.
                    </small>
                </div>
            </div>

            <div class="panel panel-filled">
                <div class="panel-body">
                    <form id="loginForm">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="email" placeholder="Your username" title="Please enter you username" name="username" id="username" class="form-control" required>
                            <span class="help-block small">Your unique username to app</span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" name="password" id="password" class="form-control" required>
                            <span class="help-block small">Your strong password</span>
                        </div>
                        <div>
                            <button class="btn btn-accent" type="submit" id="login">Sign In</button>
                        </div>
                        <div style="margin-top:20px;"><a href="/admin/forgotpassword" class="text-info">Forgot Password?</a></div>
                    </form>
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

<!-- App scripts -->
<script src="{{asset('scripts/luna.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#login').click(function(e){
            e.preventDefault();
            $('.loader').fadeIn();
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                      }
                  });
            $.ajax({
                type:'POST',
                url:'/admin/masterkey',
                data:{
                    '_token': $('input[name=_token]').val(),
                    username : $('input[name=username]').val(),
                    password : $('input[name=password]').val()
                },
                dataType:'json',
                success:function(data){
                    
                    console.log(data.errors);
                    if(data.errors){
                    	$('.loader').fadeOut();
                        $('#error1').show();
                        $('#error1').replaceWith('<div class="alert alert-danger alert-dismissible" role="alert" id="error1"><strong>Validation Error</strong><br/><p style="color:white;">'+data.errors+'</p></div>');
                    }else{
                        $('#error1').hide();
                        if(data.error){
                        	$('.loader').fadeOut();
                            $('#error1').show();
                            $('#error1').replaceWith('<div class="alert alert-danger alert-dismissible" role="alert" id="error1"><strong>Incorrect User</strong><br/><p style="color:white;">'+data.error+'</p></div>');
                        }else{
                            if(data.success){
                                window.location = "/admin";
                            }
                        }
                    }
                },
                
            });
        });


    });
</script>
</body>

</html>
@endif