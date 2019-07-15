@if(session()->has('email'))
	<script>window.location = "/admin";</script>
@else
<!DOCTYPE html>
<html>
 <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>MRH Login</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
      <!-- UIkit CSS -->
      <link rel="stylesheet" href="{{ asset('css/uikit.min.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard/admin-dash.css') }}">
      <!-- UIkit JS -->
      <script src="{{ asset('js/uikit.min.js')}}"></script>
      <script src="{{ asset('js/uikit-icons.min.js')}}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

   </head>
   <style type="text/css">
   	.uk-nav>li>a{
   		padding:20px;
   	}
   	.uk-card-default{
   		color:#222;
   		width: 400px;
   		box-shadow:0 4px 15px 0px #2222224a;;
   	}
   </style>
<body class="uk-background-muted">
<div class="uk-container">
	<div class="uk-position-center">
		<div class="uk-card uk-card-default uk-border-rounded">
			<div class="uk-card-header"><H3>Admin Priviledge</H3></div>
			<div class="uk-card-body">
				<form action="/admin/masterkey" method="POST">
        	@csrf
        	<div class="uk-margin">
        		<label>Username or Email *</label>
        		<input class="uk-input uk-border-rounded" type="email" name="username" placeholder="Username or Email">
        	</div>
        	<div class="uk-margin">
        		<label>Password *</label>
        		<input class="uk-input uk-border-rounded" type="password" name="password" placeholder="Password">
        	</div>
        	<div class="uk-margin">
        		<button type="submit" class="uk-button uk-button-primary uk-border-rounded">Sign In</button>
        	</div>
        </form>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>
@endif
