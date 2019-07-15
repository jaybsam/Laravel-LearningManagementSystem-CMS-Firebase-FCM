<!DOCTYPE html>
<html>
<head>
	<title>Blank</title>
</head>
<!-- UIkit CSS -->
<link rel="stylesheet" href="css/uikit.min.css" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="icon" href="images/favicon-96x96.png" type="image/jpeg">

<!-- UIkit JS -->
<script src="js/uikit.min.js"></script>
<script src="js/uikit-icons.min.js"></script>
<body>

<div class="uk-navbar-container" style="padding: 15px; background:#fff; border-bottom:1px solid #222;" uk-navbar>
    <div class="uk-navbar-left">
        <ul class="uk-navbar-nav"><li class="uk-margin-medium-top"><a href="/" class="uk-navbar-item uk-logo uk-margin"><img src="images/logo/logo2.png" width="500px"></a></li></ul>
    </div>
    <div class="uk-navbar-right uk-secondary">
        <ul class="uk-navbar-nav">
          <li class=""><a style="color:#222 !important;">Student ID:{{$username}}</a></li>
          <li>
                     <a href="#" style="color:#222;">Account<span class="fa fa-chevron-down uk-margin-small-left"></span></a>
                     <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                           
                           <li><a href="/Logout">Logout <span class="fa fa-sign-out
"></span></a></li>
                        </ul>
                     </div>
                  </li>
        </ul>
    </div>
</div>
<div class="uk-container">
  <div class="uk-section">
    <div class="uk-child-width-1-4" uk-grid>
      <div>
      <a class="uk-button"><span class="fa fa-database
" style="font-size: 30pt;"></span><br/>View Online Grades</a>
    </div>
    <div>
      <a class="uk-button"><span class="fa fa-book
" style="font-size: 30pt;"></span><br/>View Class Records</a>
    </div>
    <div>
      <a class="uk-button"><span class="fa fa-clipboard
" style="font-size: 30pt;"></span><br/>View Profile</a>
    </div>
    <div>
      <a class="uk-button"><span class="fa fa-clipboard
" style="font-size: 30pt;"></span><br/>Status Graph</a>
    </div>
  </div>
</div>
</body>
</html>