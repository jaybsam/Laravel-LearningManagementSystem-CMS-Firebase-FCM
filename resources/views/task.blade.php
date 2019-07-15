<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" style="background:#252725!important;"> <!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="../assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="../assets/img/favicon-32x32.png" sizes="32x32">

    <title>Wekonek</title>

    <!-- additional styles for plugins -->
        <!-- weather icons -->

        <link rel="stylesheet" href="../bower_components/weather-icons/css/weather-icons.min.css" media="all">
        <!-- metrics graphics (charts) -->
        <link rel="stylesheet" href="../bower_components/metrics-graphics/dist/metricsgraphics.css">
        <!-- chartist -->
        <link rel="stylesheet" href="../bower_components/chartist/dist/chartist.min.css">
    
    <!-- uikit -->
    <link rel="stylesheet" href="../bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="../assets/icons/flags/flags.min.css" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="../assets/css/style_switcher.min.css" media="all">
    
    <!-- altair admin -->
    <link rel="stylesheet" href="../assets/css/main.min.css" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="../assets/css/themes/themes_combined.min.css" media="all">

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
        <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
        <link rel="stylesheet" href="assets/css/ie.css" media="all">
    <![endif]-->

</head>
<style>
#sidebar_main .sidebar_main_header{
    background:none;
}
thead>tr>th{
    color:#fff !important;
}
td{
    margin-top:20px;
    height: 50px;
    padding: 10px;
}
</style>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <header id="header_main" style="background:#333435 !important;">
        <div class="header_main_content">
            <nav class="uk-navbar">
                                
                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>
                
                <!-- secondary sidebar switch -->
                <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>
                
                    <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small">
                        <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                            <a href="#" class="top_menu_toggle"><i class="material-icons md-24">&#xE8F0;</i></a>
                            <div class="uk-dropdown uk-dropdown-width-3">
                                <div class="uk-grid uk-dropdown-grid">
                                    <div class="uk-width-2-3">
                                        <div class="uk-grid uk-grid-width-medium-1-3 uk-margin-bottom uk-text-center">
                                            <a href="page_mailbox.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-light-green-600">&#xE158;</i>
                                                <span class="uk-text-muted uk-display-block">Mailbox</span>
                                            </a>
                                            <a href="page_invoices.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-purple-600">&#xE53E;</i>
                                                <span class="uk-text-muted uk-display-block">Invoices</span>
                                            </a>
                                            <a href="page_chat.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-cyan-600">&#xE0B9;</i>
                                                <span class="uk-text-muted uk-display-block">Chat</span>
                                            </a>
                                            <a href="page_scrum_board.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-red-600">&#xE85C;</i>
                                                <span class="uk-text-muted uk-display-block">Scrum Board</span>
                                            </a>
                                            <a href="page_snippets.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-blue-600">&#xE86F;</i>
                                                <span class="uk-text-muted uk-display-block">Snippets</span>
                                            </a>
                                            <a href="page_user_profile.html" class="uk-margin-top">
                                                <i class="material-icons md-36 md-color-orange-600">&#xE87C;</i>
                                                <span class="uk-text-muted uk-display-block">User profile</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-3">
                                        <ul class="uk-nav uk-nav-dropdown uk-panel">
                                            <li class="uk-nav-header">Components</li>
                                            <li><a href="components_accordion.html">Accordions</a></li>
                                            <li><a href="components_buttons.html">Buttons</a></li>
                                            <li><a href="components_notifications.html">Notifications</a></li>
                                            <li><a href="components_sortable.html">Sortable</a></li>
                                            <li><a href="components_tabs.html">Tabs</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>
                        <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            
                            <div class="uk-dropdown uk-dropdown-xlarge">
                                <div class="md-card-content">
                                    <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                        <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (12)</a></li>
                                        <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts (4)</a></li>
                                    </ul>
                                    <ul id="header_alerts" class="uk-switcher uk-margin">
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-cyan">ba</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Maiores facere omnis.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Non laudantium earum consequatur sed est rerum et repellat.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_07_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Ipsam rem autem.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Corrupti eaque repellat consequatur et vel eveniet tempora nisi aut aperiam.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-light-green">wp</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Veritatis sit.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Iure et ratione corrupti sed voluptas ut veritatis dolorem assumenda.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_02_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Aspernatur minima.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Sequi aut esse et est similique a consequatur nobis aperiam eaque.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_09_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="page_mailbox.html">Vel ipsum eius.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Et sed est ea nulla ab mollitia numquam laudantium.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                                <a href="page_mailbox.html" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                                            </div>
                                        </li>
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Necessitatibus quaerat dolor.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Sed repellendus ab illo recusandae.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Numquam quas.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Aut et ratione veniam.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Nihil modi.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Quo qui atque est ipsam.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-primary">&#xE8FD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Voluptas minima dolores.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Omnis eius minus dolores.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <p><span class="uk-margin-small-right" style="color:#fff;">Welcome Back </span> <a href="#" class="user_action_image uk-button uk-button-text"> {{ $username }} <span style="content:'\e5c5';"></span></a></p>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="page_user_profile.html">My profile</a></li>
                                    <li><a href="page_settings.html">Settings</a></li>
                                    <li><a href="/logout">Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
                <input type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
                <script type="text/autocomplete">
                    <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
                        
                        
                        <li data-value="autocomplete-value">
                            <a class="needsclick">
                                Autocomplete Text<br>
                                <span class="uk-text-muted uk-text-small">Helper text</span>
                            </a>
                        </li>
                    </ul>
                </script>
            </form>
        </div>
    </header><!-- main header end -->
    <!-- main sidebar -->
    <aside id="sidebar_main" style="background:#333435 !important;">
        
        <div class="sidebar_main_header">
            <div class="sidebar_logo">
                <a href="index.html" class="sSidebar_hide sidebar_logo_large" style="font-size: 15pt; font-weight: 500; color:#fff;">
                    WEKONEK
                </a>
                <a href="index.html" class="sSidebar_show sidebar_logo_small">
                    <img class="logo_regular" src="assets/img/logo_main_small.png" alt="" height="32" width="32"/>
                    <img class="logo_light" src="assets/img/logo_main_small_light.png" alt="" height="32" width="32"/>
                </a>
            </div>
        </div>
        
        <div class="menu_section">
            <ul>
                <li class="current_section" title="Dashboard">
                    <a href="/admin/dashboard">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Dashboard</span>
                    </a>
                    
                </li>
                <li title="User Profile">
                    <a href="page_user_profile.html">
                        <span class="menu_icon"><i class="material-icons">&#xE87C;</i></span>
                        <span class="menu_title">Users Lists</span>
                    </a>
                    
                </li>
                <li title="Mailbox">
                    <a href="page_mailbox.html">
                        <span class="menu_icon"><i class="material-icons">&#xE158;</i></span>
                        <span class="menu_title">Mailbox</span>
                    </a>
                    
                </li>

                
    
            </ul>
        </div>
    </aside><!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">

            <!-- statistics (small charts) -->
            <!-- <div class="uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-2 uk-grid-medium uk-sortable sortable-handler hierarchical_show" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_visitors peity_data">5,3,9,6,5,9,7</span></div>
                            <span class="uk-text-muted uk-text-small">Visitors (last 7d)</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>12456</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_sale peity_data">5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Sale</span>
                            <h2 class="uk-margin-remove">$<span class="countUpMe">0<noscript>142384</noscript></span></h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_orders peity_data">64/100</span></div>
                            <span class="uk-text-muted uk-text-small">Orders Completed</span>
                            <h2 class="uk-margin-remove"><span class="countUpMe">0<noscript>64</noscript></span>%</h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="md-card">
                        <div class="md-card-content">
                            <div class="uk-float-right uk-margin-top uk-margin-small-right"><span class="peity_live peity_data">5,3,9,6,5,9,7,3,5,2,5,3,9,6,5,9,7,3,5,2</span></div>
                            <span class="uk-text-muted uk-text-small">Users (live)</span>
                            <h2 class="uk-margin-remove" id="peity_live_text">46</h2>
                        </div>
                    </div>
                </div>
            </div>

 -->
            <!-- circular charts -->
            <div class="uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-3 uk-grid-width-xlarge-1-5 uk-text-center uk-sortable sortable-handler" id="dashboard_sortable_cards" data-uk-sortable data-uk-grid-margin>
                <div>
                    <div class="md-card md-card-hover md-card-overlay md-card-overlay-active">
                        <div class="md-card-content" id="canvas_1">
                            <div class="epc_chart" data-percent="37" data-bar-color="#9c27b0">
                                <span class="epc_chart_icon"><i class="material-icons">&#xE85D;</i></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    Tasks List
                                </h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <button class="md-btn md-btn-primary">More</button>
                        </div>
                    </div>
                </div>
                <div>
                <a href="/register">
                    <div class="md-card md-card-hover md-card-overlay" style="cursor: pointer !important;">
                        <div class="md-card-content">
                            <div class="epc_chart" data-percent="37" data-bar-color="#607d8b">
                                <span class="epc_chart_icon"><i class="material-icons">&#xE7FE;</i></span>
                            </div>
                        </div>
                        <div class="md-card-overlay-content">
                            <div class="uk-clearfix md-card-overlay-header">
                                <i class="md-icon material-icons md-card-overlay-toggler">&#xE5D4;</i>
                                <h3>
                                    User Registrations
                                </h3>
                            </div>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </div>
                    </div>
                    </a>
                </div>
            </div>
                <div class="mark uk-margin-medium-top">
        

                                           <table class="uk-table uk-table-hover uk-table-divider uk-ext-right">
    <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($data as $users)
        <tr>
            <td>{{ $users->username }}</td>
            <td class="uk-width-1-3">{{ $users->password }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->role }}</td>
            <td><button class="md-btn md-btn-primary"><i class="material-icons">
edit
</i></<button><td>
            <td><button class="md-btn md-btn-danger"><i class="material-icons">
delete
</i></<button></td>
        </tr>
         @endforeach
    </tbody>
</table> 
    </div>
        </div>
    </div>
    <!-- secondary sidebar -->
    <aside id="sidebar_secondary" class="tabbed_sidebar">
        <ul class="uk-tab uk-tab-icons uk-tab-grid" data-uk-tab="{connect:'#dashboard_sidebar_tabs', animation:'slide-horizontal'}">
            <li class="uk-active uk-width-1-3"><a href="#"><i class="material-icons">&#xE422;</i></a></li>
            <li class="uk-width-1-3 chat_sidebar_tab"><a href="#"><i class="material-icons">&#xE0B7;</i></a></li>
            <li class="uk-width-1-3"><a href="#"><i class="material-icons">&#xE8B9;</i></a></li>
        </ul>

        <div class="scrollbar-inner">
            <ul id="dashboard_sidebar_tabs" class="uk-switcher">
                <li>
                    <div class="timeline timeline_small uk-margin-bottom">
                        <div class="timeline_item">
                            <div class="timeline_icon timeline_icon_success"><i class="material-icons">&#xE85D;</i></div>
                            <div class="timeline_date">
                                09<span>Jan</span>
                            </div>
                            <div class="timeline_content">Created ticket <a href="#"><strong>#3289</strong></a></div>
                        </div>
                        <div class="timeline_item">
                            <div class="timeline_icon timeline_icon_danger"><i class="material-icons">&#xE5CD;</i></div>
                            <div class="timeline_date">
                                15<span>Jan</span>
                            </div>
                            <div class="timeline_content">Deleted post <a href="#"><strong>Est qui est quasi nulla pariatur.</strong></a></div>
                        </div>
                        <div class="timeline_item">
                            <div class="timeline_icon"><i class="material-icons">&#xE410;</i></div>
                            <div class="timeline_date">
                                19<span>Jan</span>
                            </div>
                            <div class="timeline_content">
                                Added photo
                                <div class="timeline_content_addon">
                                    <img src="assets/img/gallery/Image16.jpg" alt=""/>
                                </div>
                            </div>
                        </div>
                        <div class="timeline_item">
                            <div class="timeline_icon timeline_icon_primary"><i class="material-icons">&#xE0B9;</i></div>
                            <div class="timeline_date">
                                21<span>Jan</span>
                            </div>
                            <div class="timeline_content">
                                New comment on post <a href="#"><strong>Iste ipsum sequi.</strong></a>
                                <div class="timeline_content_addon">
                                    <blockquote>
                                        Est quidem et voluptatem qui est repellat nisi suscipit consequatur veniam perferendis incidunt.&hellip;
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                        <div class="timeline_item">
                            <div class="timeline_icon timeline_icon_warning"><i class="material-icons">&#xE7FE;</i></div>
                            <div class="timeline_date">
                                29<span>Jan</span>
                            </div>
                            <div class="timeline_content">
                                Added to Friends
                                <div class="timeline_content_addon">
                                    <ul class="md-list md-list-addon">
                                        <li>
                                            <div class="md-list-addon-element">
                                                <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_02_tn.png" alt=""/>
                                            </div>
                                            <div class="md-list-content">
                                                <span class="md-list-heading">Connie Waters</span>
                                                <span class="uk-text-small uk-text-muted">Aspernatur recusandae molestiae.</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <ul class="md-list md-list-addon chat_users">
                        <li>
                            <div class="md-list-addon-element">
                                <span class="element-status element-status-success"></span>
                                <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_02_tn.png" alt=""/>
                            </div>
                            <div class="md-list-content">
                                <div class="md-list-action-placeholder"></div>
                                <span class="md-list-heading">Josefa Gerlach</span>
                                <span class="uk-text-small uk-text-muted uk-text-truncate">Reprehenderit animi.</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-addon-element">
                                <span class="element-status element-status-success"></span>
                                <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_09_tn.png" alt=""/>
                            </div>
                            <div class="md-list-content">
                                <div class="md-list-action-placeholder"></div>
                                <span class="md-list-heading">Nyah Schmeler</span>
                                <span class="uk-text-small uk-text-muted uk-text-truncate">Quia ratione quas.</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-addon-element">
                                <span class="element-status element-status-danger"></span>
                                <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_04_tn.png" alt=""/>
                            </div>
                            <div class="md-list-content">
                                <div class="md-list-action-placeholder"></div>
                                <span class="md-list-heading">Mary Torp</span>
                                <span class="uk-text-small uk-text-muted uk-text-truncate">Dignissimos et.</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-addon-element">
                                <span class="element-status element-status-warning"></span>
                                <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_07_tn.png" alt=""/>
                            </div>
                            <div class="md-list-content">
                                <div class="md-list-action-placeholder"></div>
                                <span class="md-list-heading">Albertha Turner</span>
                                <span class="uk-text-small uk-text-muted uk-text-truncate">Rerum et.</span>
                            </div>
                        </li>
                    </ul>
                    <div class="chat_box_wrapper chat_box_small" id="chat">
                        <div class="chat_box chat_box_colors_a">
                            <div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <img class="md-user-image" src="assets/img/avatars/avatar_11_tn.png" alt=""/>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, eum? </p>
                                    </li>
                                    <li>
                                        <p> Lorem ipsum dolor sit amet.<span class="chat_message_time">13:38</span> </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                    <img class="md-user-image" src="assets/img/avatars/avatar_03_tn.png" alt=""/>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem delectus distinctio dolor earum est hic id impedit ipsum minima mollitia natus nulla perspiciatis quae quasi, quis recusandae, saepe, sunt totam.
                                            <span class="chat_message_time">13:34</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper">
                                <div class="chat_user_avatar">
                                    <img class="md-user-image" src="assets/img/avatars/avatar_11_tn.png" alt=""/>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.
                                            <span class="chat_message_time">23 Jun 1:10am</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat_message_wrapper chat_message_right">
                                <div class="chat_user_avatar">
                                    <img class="md-user-image" src="assets/img/avatars/avatar_03_tn.png" alt=""/>
                                </div>
                                <ul class="chat_message">
                                    <li>
                                        <p> Lorem ipsum dolor sit amet, consectetur. </p>
                                    </li>
                                    <li>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            <span class="chat_message_time">Friday 13:34</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <h4 class="heading_c uk-margin-small-bottom uk-margin-top">General Settings</h4>
                    <ul class="md-list">
                        <li>
                            <div class="md-list-content">
                                <div class="uk-float-right">
                                    <input type="checkbox" data-switchery data-switchery-size="small" checked id="settings_site_online" name="settings_site_online" />
                                </div>
                                <span class="md-list-heading">Site Online</span>
                                <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <div class="uk-float-right">
                                    <input type="checkbox" data-switchery data-switchery-size="small" id="settings_seo" name="settings_seo" />
                                </div>
                                <span class="md-list-heading">Search Engine Friendly URLs</span>
                                <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <div class="uk-float-right">
                                    <input type="checkbox" data-switchery data-switchery-size="small" id="settings_url_rewrite" name="settings_url_rewrite" />
                                </div>
                                <span class="md-list-heading">Use URL rewriting</span>
                                <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                            </div>
                        </li>
                    </ul>
                    <hr class="md-hr">
                    <h4 class="heading_c uk-margin-small-bottom uk-margin-top">Other Settings</h4>
                    <ul class="md-list">
                        <li>
                            <div class="md-list-content">
                                <div class="uk-float-right">
                                    <input type="checkbox" data-switchery data-switchery-size="small" data-switchery-color="#7cb342" checked id="settings_top_bar" name="settings_top_bar" />
                                </div>
                                <span class="md-list-heading">Top Bar Enabled</span>
                                <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <div class="uk-float-right">
                                    <input type="checkbox" data-switchery data-switchery-size="small" data-switchery-color="#7cb342" id="settings_api" name="settings_api" />
                                </div>
                                <span class="md-list-heading">Api Enabled</span>
                                <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                            </div>
                        </li>
                        <li>
                            <div class="md-list-content">
                                <div class="uk-float-right">
                                    <input type="checkbox" data-switchery data-switchery-size="small" data-switchery-color="#d32f2f" id="settings_minify_static" checked name="settings_minify_static" />
                                </div>
                                <span class="md-list-heading">Minify JS files automatically</span>
                                <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <button type="button" class="chat_sidebar_close uk-close"></button>
        <div class="chat_submit_box">
            <div class="uk-input-group">
                <input type="text" class="md-input" name="submit_message" id="submit_message" placeholder="Send message">
                <span class="uk-input-group-addon">
                    <a href="#"><i class="material-icons md-24">&#xE163;</i></a>
                </span>
            </div>
        </div>

    </aside>
    <!-- secondary sidebar end -->

    <!-- google web fonts -->
    <script>
        WebFontConfig = {
            google: {
                families: [
                    'Source+Code+Pro:400,700:latin',
                    'Roboto:400,300,500,700,400italic:latin'
                ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- common functions -->
    <script src="../assets/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="../assets/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="../assets/js/altair_admin_common.min.js"></script>

    <!-- page specific plugins -->
        <!-- d3 -->
        <script src="../bower_components/d3/d3.min.js"></script>
        <!-- metrics graphics (charts) -->
        <script src="../bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
        <!-- chartist (charts) -->
        <script src="../bower_components/chartist/dist/chartist.min.js"></script>
        <!-- maplace (google maps) -->
        <script src="../http://maps.google.com/maps/api/js"></script>
        <script src="../bower_components/maplace-js/dist/maplace.min.js"></script>
        <!-- peity (small charts) -->
        <script src="../bower_components/peity/jquery.peity.min.js"></script>
        <!-- easy-pie-chart (circular statistics) -->
        <script src="../bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        <!-- countUp -->
        <script src="../bower_components/countUp.js/dist/countUp.min.js"></script>
        <!-- handlebars.js -->
        <script src="../bower_components/handlebars/handlebars.min.js"></script>
        <script src="../assets/js/custom/handlebars_helpers.min.js"></script>
        <!-- CLNDR -->
        <script src="../bower_components/clndr/clndr.min.js"></script>

        <!--  dashbord functions -->
        <script src="../assets/js/pages/dashboard.min.js"></script>
    
    <script>
        $(function() {
            if(isHighDensity()) {
                $.getScript( "assets/js/custom/dense.min.js", function(data) {
                    // enable hires images
                    altair_helpers.retina_images();
                });
            }
            if(Modernizr.touch) {
                // fastClick (touch devices)
                FastClick.attach(document.body);
            }
        });
        $window.load(function() {
            // ie fixes
            altair_helpers.ie_fix();
        });
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-65191727-1', 'auto');
        ga('send', 'pageview');
    </script>

    <div id="style_switcher">
        <div id="style_switcher_toggle"><i class="material-icons">&#xE8B8;</i></div>
        <div class="uk-margin-medium-bottom">
            <h4 class="heading_c uk-margin-bottom">Colors</h4>
            <ul class="switcher_app_themes" id="theme_switcher">
                <li class="app_style_default active_theme" data-app-theme="">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_a" data-app-theme="app_theme_a">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_b" data-app-theme="app_theme_b">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_c" data-app-theme="app_theme_c">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_d" data-app-theme="app_theme_d">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_e" data-app-theme="app_theme_e">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_f" data-app-theme="app_theme_f">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_g" data-app-theme="app_theme_g">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_h" data-app-theme="app_theme_h">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_i" data-app-theme="app_theme_i">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
                <li class="switcher_theme_dark" data-app-theme="app_theme_dark">
                    <span class="app_color_main"></span>
                    <span class="app_color_accent"></span>
                </li>
            </ul>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Sidebar</h4>
            <p>
                <input type="checkbox" name="style_sidebar_mini" id="style_sidebar_mini" data-md-icheck />
                <label for="style_sidebar_mini" class="inline-label">Mini Sidebar</label>
            </p>
            <p>
                <input type="checkbox" name="style_sidebar_slim" id="style_sidebar_slim" data-md-icheck />
                <label for="style_sidebar_slim" class="inline-label">Slim Sidebar</label>
            </p>
        </div>
        <div class="uk-visible-large uk-margin-medium-bottom">
            <h4 class="heading_c">Layout</h4>
            <p>
                <input type="checkbox" name="style_layout_boxed" id="style_layout_boxed" data-md-icheck />
                <label for="style_layout_boxed" class="inline-label">Boxed layout</label>
            </p>
        </div>
        <div class="uk-visible-large">
            <h4 class="heading_c">Main menu accordion</h4>
            <p>
                <input type="checkbox" name="accordion_mode_main_menu" id="accordion_mode_main_menu" data-md-icheck />
                <label for="accordion_mode_main_menu" class="inline-label">Accordion mode</label>
            </p>
        </div>
    </div>

    <script>
        $(function() {
            var $switcher = $('#style_switcher'),
                $switcher_toggle = $('#style_switcher_toggle'),
                $theme_switcher = $('#theme_switcher'),
                $mini_sidebar_toggle = $('#style_sidebar_mini'),
                $slim_sidebar_toggle = $('#style_sidebar_slim'),
                $boxed_layout_toggle = $('#style_layout_boxed'),
                $accordion_mode_toggle = $('#accordion_mode_main_menu'),
                $html = $('html'),
                $body = $('body');


            $switcher_toggle.click(function(e) {
                e.preventDefault();
                $switcher.toggleClass('switcher_active');
            });

            $theme_switcher.children('li').click(function(e) {
                e.preventDefault();
                var $this = $(this),
                    this_theme = $this.attr('data-app-theme');

                $theme_switcher.children('li').removeClass('active_theme');
                $(this).addClass('active_theme');
                $html
                    .removeClass('app_theme_a app_theme_b app_theme_c app_theme_d app_theme_e app_theme_f app_theme_g app_theme_h app_theme_i app_theme_dark')
                    .addClass(this_theme);

                if(this_theme == '') {
                    localStorage.removeItem('altair_theme');
                    $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.material.min.css');
                } else {
                    localStorage.setItem("altair_theme", this_theme);
                    if(this_theme == 'app_theme_dark') {
                        $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.materialblack.min.css')
                    } else {
                        $('#kendoCSS').attr('href','bower_components/kendo-ui/styles/kendo.material.min.css');
                    }
                }

            });

            // hide style switcher
            $document.on('click keyup', function(e) {
                if( $switcher.hasClass('switcher_active') ) {
                    if (
                        ( !$(e.target).closest($switcher).length )
                        || ( e.keyCode == 27 )
                    ) {
                        $switcher.removeClass('switcher_active');
                    }
                }
            });

            // get theme from local storage
            if(localStorage.getItem("altair_theme") !== null) {
                $theme_switcher.children('li[data-app-theme='+localStorage.getItem("altair_theme")+']').click();
            }


        // toggle mini sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_mini") !== null && localStorage.getItem("altair_sidebar_mini") == '1') || $body.hasClass('sidebar_mini')) {
                $mini_sidebar_toggle.iCheck('check');
            }

            $mini_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_mini", '1');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                });

        // toggle slim sidebar

            // change input's state to checked if mini sidebar is active
            if((localStorage.getItem("altair_sidebar_slim") !== null && localStorage.getItem("altair_sidebar_slim") == '1') || $body.hasClass('sidebar_slim')) {
                $slim_sidebar_toggle.iCheck('check');
            }

            $slim_sidebar_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_sidebar_slim", '1');
                    localStorage.removeItem('altair_sidebar_mini');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_sidebar_slim');
                    location.reload(true);
                });

        // toggle boxed layout

            if((localStorage.getItem("altair_layout") !== null && localStorage.getItem("altair_layout") == 'boxed') || $body.hasClass('boxed_layout')) {
                $boxed_layout_toggle.iCheck('check');
                $body.addClass('boxed_layout');
                $(window).resize();
            }

            $boxed_layout_toggle
                .on('ifChecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.setItem("altair_layout", 'boxed');
                    location.reload(true);
                })
                .on('ifUnchecked', function(event){
                    $switcher.removeClass('switcher_active');
                    localStorage.removeItem('altair_layout');
                    location.reload(true);
                });

        // main menu accordion mode
            if($sidebar_main.hasClass('accordion_mode')) {
                $accordion_mode_toggle.iCheck('check');
            }

            $accordion_mode_toggle
                .on('ifChecked', function(){
                    $sidebar_main.addClass('accordion_mode');
                })
                .on('ifUnchecked', function(){
                    $sidebar_main.removeClass('accordion_mode');
                });


        });
    </script>
</body>
</html>