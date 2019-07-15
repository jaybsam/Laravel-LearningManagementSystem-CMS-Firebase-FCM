<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="close">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/uikit.min.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon-96x96.png') }}">
    <!-- UIkit JS -->
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/loader.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    
    <style type="text/css">
    	.cover {
		  position: fixed;
		  right: 0;
		  bottom: 0;
		  min-width: 100%; 
		  min-height: 100%;
		}

		.content {
		  position: fixed;
		  bottom: 0;
		  background: rgba(0, 0, 0, 0.5);
		  color: #f1f1f1;
		  width: 100%;
		  padding: 20px;
		}

		#myBtn {
		  width: 200px;
		  font-size: 18px;
		  padding: 10px;
		  border: none;
		  background: #000;
		  color: #fff;
		  cursor: pointer;
		}

		#myBtn:hover {
		  background: #ddd;
		  color: black;
		}
		video{
			max-width: none !important;
		}
		.uk-button {
		    margin: 0;
		    border: none;
		    border-radius: 100px;
		    overflow: visible;
		    font: inherit;
		    color: inherit;
		    text-transform: none;
		    display: inline-block;
		    box-sizing: border-box;
		    padding: 10px 55px;
		    vertical-align: middle;
		    font-size: 21px;
		    line-height: 38px;
		    text-align: center;
		    text-decoration: none;
		    text-transform: uppercase;
		    transition: .1s ease-in-out;
		    transition-property: color,background-color,border-color;
		}
		.uk-button-default{
			background-color: #062717	;
    color: #fff !important;
   /* border: 2px solid #25d8a4;*/
		}
		.uk-button-default:hover{
			background:#111 !important;
		}
		.uk-position-center{
			top:40%;
		}
    </style>
</head>
<body>
		<div class="introcover">
			<div class="new" style="
			    background: linear-gradient(to right, #2af492, #85a2fcde);
			    height: 100%;
			    width: 100%;
			    position: fixed;
			    z-index: 99999;
			    /* box-shadow: 0 0 black; */
			">
    	<div class="uk-position-center text-center">
				<div style="position: relative; left:20%;">
					<img src="{{asset('images/logo/cover.png')}}" style="width: 65%;">
				<div class="uk-margin">
					<div uk-grid class="" style="margin-left: 16px;">
						<div>
							<button class="uk-button uk-button-default">Visit</button></div>
						<div><button class="uk-button uk-button-default" style="
    background: transparent;
    color: #062717 !important;
    border: 1px solid #062717;
">Apply</button></div>
					</div>
				</div>
				</div>
			</div>
    </div>
		</div>
		<video autoplay muted loop id="myVideo" class="cover">
		  <source src="{{asset('video/mrh.MKV')}}">
		</video>
	


</body>
</html>