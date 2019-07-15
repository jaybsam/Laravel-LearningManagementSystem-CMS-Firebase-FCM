<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="uk-background-muted" lang="en"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>
    <link rel="icon" href="images/favicon-96x96.png" type="image/jpeg">
    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

    <title>Wekonek</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/uikit.min.css" />
    <!-- uikit -->
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="assets/css/login_page.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script>
$(function() {
    $(".loader").fadeOut(3000, function() {
        $(".page").fadeIn(100);        
    });
});
</script>

</head>
<body class="login_page login_page_v2">
<div class="loader uk-container">
      <div class="uk-position-center">
      <div class="uk-margin">
          <h1 class="uk-position-center" style="font-size: 60pt; opacity: 0.3;">WEKONEK</h1>
          <span style="font-size: 200pt; opacity: 0.3;">...</span>
          </div>

      </div>
   </div>
<div class="page">
    <div class="uk-container uk-container-center">
        <div class="md-card">
            <div class="md-card-content padding-reset">
                <div class="uk-grid uk-grid-collapse">
                    <div class="uk-width-large-2-3 uk-hidden-medium uk-hidden-small">
                        <div class="login_page_info uk-height-1-1" style="background-image: url('assets/img/others/sabri-tuzcu-331970.jpg')">
                            <div class="info_content">
                                <h1 class="heading_b">Quote</h1>
                            <blockquote class="uk-light">CMS features vary widely. Most CMSs include Web-based publishing, format management, history editing and version control, indexing, search, and retrieval. By their nature, content management systems support the separation of content and preparation</blockquote>

                            </div>
                        </div>
                    </div>
                    <div class="uk-width-large-1-3 uk-width-medium-2-3 uk-container-center">
                        <div class="login_page_forms">
                            <div id="login_card">
                                <div id="login_form">
                                    <div class="login_heading">
                                        WEKONEK
                                    </div>
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="uk-form-row">
                                            <label for="login_username">Username</label>
                                            <input class="md-input" type="text" id="login_username" name="username" required>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="login_password">Password</label>
                                            <input class="md-input" type="password" id="login_password" name="password" required>
                                        </div>
                                        <div class="uk-margin-medium-top">
                                            <input type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" value="Sign in">
                                        </div>
                                        <div class="uk-margin-top">
                                            <a href="#" id="login_help_show" class="uk-float-right">Need help?</a>
                                            <span class="icheck-inline">
                                                <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                                                <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                <div class="uk-position-relative" id="login_help" style="display: none">
                                    <button type="button" class="uk-position-top-right uk-close uk-margin-right back_to_login"></button>
                                    <h2 class="heading_b uk-text-success">Can't log in?</h2>
                                    <p>Here’s the info to get you back in to your account as quickly as possible.</p>
                                    <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
                                    <p>If your password still isn’t working, it’s time to <a href="#" id="password_reset_show">reset your password</a>.</p>
                                </div>
                                <div id="login_password_reset" style="display: none">
                                    <button type="button" class="uk-position-top-right uk-close uk-margin-right back_to_login"></button>
                                    <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                                    <form>
                                        <div class="uk-form-row">
                                            <label for="login_email_reset">Your email address</label>
                                            <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                                        </div>
                                        <div class="uk-margin-medium-top">
                                            <a href="index.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="uk-margin-top uk-text-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
    <!-- common functions -->
    <script src="assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="assets/js/uikit_custom.min.js"></script>
    <!-- altair core functions -->
    <script src="assets/js/altair_admin_common.min.js"></script>

    <!-- altair login page functions -->
    <script src="assets/js/pages/login.min.js"></script>

    <script>
        // check for theme
        if (typeof(Storage) !== "undefined") {
            var root = document.getElementsByTagName( 'html' )[0],
                theme = localStorage.getItem("altair_theme");
            if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
                root.className += ' app_theme_dark';
            }
        }
    </script>

</body>
</html>