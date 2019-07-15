
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>LUNA | Responsive Admin Theme</title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/animate.css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.css')}}"/>

    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('styles/pe-icons/pe-icon-7-stroke.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/pe-icons/helper.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/stroke-icons/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/style.css')}}">
</head>
<body class="blank">

<!-- Wrapper-->
<div class="wrapper">


    <!-- Main content-->
    <section class="content">
        <div class="back-link">
            <a href="/admin/login" class="btn btn-accent">Back to Dashboard</a>
        </div>

        <div class="container-center animated slideInDown">


            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-id"></i>
                </div>
                <div class="header-title">
                    <h3>Reset password</h3>
                    <small>
                        Please enter your email to reset your password.
                    </small>
                </div>
            </div>

            <div class="panel panel-filled">
                <div class="panel-body">
                    <form action="index.html" id="loginForm" novalidate>
                        <div class="form-group">
                            <label class="control-label" for="email">Email adress</label>
                            <input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="email" id="email" class="form-control">
                            <span class="help-block small">Your address email to sent new password</span>
                        </div>
                        <div>
                            <button class="btn btn-accent" style="margin-right:10px;">Reset Password</button>
                            <a class="btn btn-default" href="/admin/login">Cancel</a>
                        </div>
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

</body>

</html>