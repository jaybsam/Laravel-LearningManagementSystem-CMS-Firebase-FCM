<!DOCTYPE html>
<html style="background: none;">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>だｓｈぼあｒｄ</title>
    <!-- Fontawsome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{ asset('css/uikit.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard/admin-dash.css') }}">
     <!-- UIkit JS -->
    <script src="{{ asset('js/uikit.min.js')}}"></script>
    <script src="{{ asset('js/uikit-icons.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js')}}"></script>
</head>

<body>
    <div class="uk-offcanvas-content">
        <header uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
            <nav class="uk-navbar-container dashboard-navbar uk-position-fixed-top uk-secondary" uk-navbar>
                <div class="uk-navbar-left">
                    <a class="uk-navbar-item uk-logo" href="#">Logo</a>
                    <div class="uk-navbar-item">
                    </div>
                </div>
                <div class="uk-navbar-center dashboard-navbar-center" class="uk-navbar-center dashboard-navbar-center" uk-scrollspy="cls: uk-animation-fade; target: > div > form;">
                    <div class="uk-navbar-item">
                        <form action="javascript:void(0)">
                            <div class="uk-inline">
                                <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: search" style="right:8px;"></span>
                                <input class="uk-input dashboard-input" type="text" placeholder="Search">
                            </div>
                            <!--                        <a href="#" class="uk-icon uk-margin-small-left dashboard-btn" uk-icon="icon:search;" uk-tooltip="title: Search; delay: 700; pos: bottom"></a> -->
                        </form>
                    </div>
                </div>
                <div class="uk-navbar-right dashboard-navbar-right" uk-scrollspy="cls: uk-animation-fade; target: > ul > li; delay: 400">
                    <ul class="uk-navbar-nav">
                        <li>
                            <!-- dashboard active -> -->
                            <a href="#" type="button" class="uk-icon" uk-icon="icon: grid;" uk-tooltip="title: Wekonek apps; delay: 700; pos: bottom"></a>
                            <div class="uk-width-large" uk-dropdown="mode:click;">
                                <div class="uk-dropdown-grid uk-child-width-1-2@m" uk-grid>
                                    <div>
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li class="uk-active"><a href="#">Active</a></li>
                                            <li><a href="#">Item</a></li>
                                            <li class="uk-nav-header">Header</li>
                                            <li><a href="#">Item</a></li>
                                            <li><a href="#">Item</a></li>
                                            <li class="uk-nav-divider"></li>
                                            <li><a href="#">Item</a></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul class="uk-nav uk-dropdown-nav">
                                            <li class="uk-active"><a href="#">Active</a></li>
                                            <li><a href="#">Item</a></li>
                                            <li class="uk-nav-header">Header</li>
                                            <li><a href="#">Item</a></li>
                                            <li><a href="#">Item</a></li>
                                            <li class="uk-nav-divider"></li>
                                            <li><a href="#">Item</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                        <a href="#" class="uk-icon" uk-icon="icon: mail;"  uk-tooltip="title: Message; delay: 700; pos: bottom"></a>
                     </li>
                        <li>
                            <span class="uk-badge dashboard-badge-online" style="z-index: 1000; top:20px; right:76px; position: fixed; background:red; height: 16px;">1</span>
                            <a href="#" class="uk-icon" uk-icon="icon: bell;" uk-tooltip="title: Notifications; delay: 700; pos: bottom"></a>
                        </li>
                        <li>
                            <a href="#" type="button" uk-tooltip="title: Profile; delay: 700; pos: bottom">
                                <img class="dashboard-profile uk-border-circle uk-margin-small-right" src="{{asset('images/avatar.jpg')}}">
                            </a>
                            <div uk-dropdown="mode: click;">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active"><a href="#">Active</a></li>
                                    <li><a href="#">Item</a></li>
                                    <li class="uk-nav-header">Header</li>
                                    <li><a href="#">Item</a></li>
                                    <li><a href="#">Item</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="#">Item</a></li>
                                </ul>
                                <span class="uk-icon dashboard-drop-down-arrow" uk-icon="icon:triangle-up; ratio: 2;"></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="uk-navbar-right dashboard-navbar-right-show">
                    <ul class="uk-navbar-nav">
                        <li>
                            <a class="uk-navbar-toggle uk-margin-small-right" uk-toggle="target: #offcanvas-push" uk-navbar-toggle-icon href="#"></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Dashboard-content -->
        <div class="dashboard-content">
            <!-- Sidebar -->
            <!-- Sidenav -->
            <div class="uk-card uk-card-default uk-card-body uk-secondary dashboard-sidenav" style="position: fixed; z-index: 1000;">
                <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
                    <li class="uk-nav-header">General</li>
                    <li><a href="/admin">Dashboard</a></li>
                    <li><a href="#">Message</a></li>
                    <li><a href="notification">Notification</a></li>
                    <li><a href="#">Settings</a></li>
                    <li class="uk-nav-divider"></li>
                    <li class="uk-nav-header">Getting Started</li>
                    <li class="uk-active"><a href="admin-dashboard-users.html">Users</a></li>
                    <li><a href="admin-dashboard-students.html">Students</a></li>
                    <li><a href="admin-dashboard-teachers.html">Teachers</a></li>
                    <li><a href="admin-dashboard-parents.html">Parents</a></li>
                    <li><a href="#">Library</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Class</a></li>
                    <li><a href="#">Subject</a></li>
                    <li><a href="#">Attendance</a></li>
                    <li><a href="#">Exam</a></li>
                    <li class="uk-nav-divider"></li>
                    <li class="uk-nav-header">Components</li>
                    <li><a href="#">Map</a></li>
                    <li><a href="#">Reports</a></li>
                    <li class="uk-parent">
                        <a href="#">Parent</a>
                        <ul class="uk-nav-sub">
                            <li><a href="#">Sub item</a></li>
                            <li><a href="#">Sub item</a></li>
                        </ul>
                    </li>
                    <li class="uk-parent">
                        <a href="#">Parent</a>
                        <ul class="uk-nav-sub">
                            <li><a href="#">Sub item</a></li>
                            <li><a href="#">Sub item</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="uk-card uk-card-default uk-card-body uk-secondary dashboard-sidenav" style="opacity: 0;">
            <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
               <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
            </ul>
         </div>
            <!-- Dashboard inner content -->
            <div class="dashboard-inner" uk-grid uk-scrollspy="cls: uk-animation-scale-up; target: > .uk-navbar-container > .uk-navbar-left > .uk-navbar-nav > li, form > .uk-navbar-container > .dashboard-content-header, form > .uk-padding > .uk-navbar-container > .uk-navbar-left > ul > li, .uk-overflow-auto > .uk-table > thead > tr > th, .uk-overflow-auto > .uk-table > tbody > tr > td; delay: 70;">
               <nav class="uk-navbar-container dashboard-width-100" uk-navbar style="border-bottom:1px solid #8080803b;">
                      <div class="uk-navbar-left" style="padding:15px;">
                        <ul class="uk-navbar-nav">
                            <li>                            <ul class="uk-breadcrumb">
                                <li><a class="uk-text-primary" href="admin-dashboard.html">Dashboard</a></li>
                                <li><a class="uk-text-primary" href="/admin/users">Users</a></li>
                                <li><span>Update</span></li>
                            </ul></li>
                        </ul>
                      </div>
                    </nav>
               
                    <form class="dashboard-width-100 uk-margin" action="" method="post">
                      <div class="uk-padding">
                        <button class="uk-button uk-button-primary uk-float-right dashboard-button dashboard-radius-5" type="submit">Update</button>
                          <h4 class="uk-text-primary">Personal Information</h4>
                      <div uk-grid>
                          <div class="uk-width-1-2@m" uk-grid>
                            <div>
                              <label class="uk-margin-small-bottom">Firstname *</label>
                              <input type="text" class="uk-input dashboard-radius-5" name="firstname" placeholder="Firstname" value="{{$users['firstname']}}">
                            </div>
                            <div class="uk-width-expand@m"><label class="uk-margin-small-bottom">Lastname *</label>
                              <input type="text" class="uk-input dashboard-radius-5" name="lastname" placeholder="Lastname" value="{{$users['lastname']}}">
                          </div>
                          <div class="dashboard-width-100">
                              <label>Gender *</label>
                              <div class="uk-margin uk-grid-small dashboard-center uk-child-width-auto uk-grid">
                                
                                @if($users['gender'] == "Male")
                                  <label>Male <input class="uk-radio uk-margin-small-right" name="radio" type="radio" value="Male" checked></label>
                                  <label>Female <input class="uk-radio" name="radio" type="radio" value="Female"></label>
                                @endif
                                @if($users['gender'] == "Female")
                                <label>Male <input class="uk-radio uk-margin-small-right" name="radio" type="radio" value="Male"></label>
                                  <label>Female <input class="uk-radio" name="radio" type="radio" value="Female" checked></label>
                                @endif
                                
                              </div>
                          </div>
                          <div class="dashboard-width-100">
                              <label>Age *</label>
                              <input type="number" class="uk-input dashboard-radius-5" name="age" placeholder="Age" value="{{$users['age']}}">
                          </div>
                          <div class="dashboard-width-100">
                              <label>Address *</label>
                              <textarea type="text" class="uk-textarea" rows="5" cols="10" name="address" placeholder="Addess">{{$users['address']}}</textarea>
                          </div>
                          <div class="dashboard-width-100">
                              <label>Contact *</label>
                              <input type="number" class="uk-input dashboard-radius-5" name="contact" placeholder="Contact" value="{{$users['contact']}}">
                          </div>
                          </div>
                          
                          <div class="uk-width-expand@m">
                            <div class="uk-margin">
                              <label>Role *</label>
                              <select class="uk-select dashboard-radius-5">
                                <option>ROLE</option>
                                @if($users['role'] == "student")
                                <option selected value="student">Student</option>
                                <option value="teacher">Teacher</option>
                                <option value="parent">Parent</option>
                                @elseif($users['role'] == "teacher")
                                <option selected value="teacher">Teacher</option>
                                <option value="student">Student</option>
                                <option value="parent">Parent</option>
                                @elseif($users['role'] == "parent")
                                <option selected value="parent">Parent</option>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                                @endif
                              </select>
                          </div>
                            @if($users['role'] == 'student')
                              <div class="dashboard-width-100">
                              <label>Student ID *</label>
                              <input type="number" class="uk-input dashboard-radius-5" name="contact" placeholder="Student ID" value="{{$users['student_id']}}">
                            </div>
                            @elseif($users['role'] == 'teacher')
                            <div class="dashboard-width-100">
                              <label>Teacher ID *</label>
                              <input type="number" class="uk-input dashboard-radius-5" name="contact" placeholder="Teacher ID" value="{{$users['teacher_id']}}">
                            </div>
                             @elseif($users['role'] == 'parent')
                             <div class="dashboard-width-100">
                              <label>Parent ID *</label>
                              <input type="number" class="uk-input dashboard-radius-5" name="contact" placeholder="Parent ID" value="{{$users['parent_id']}}">
                            </div>
                            @endif
                          <div class="dashboard-width-100 uk-margin">
                              <label>Password *</label>
                              <input type="password" class="uk-input dashboard-radius-5" name="contact" placeholder="Password" value="{{$users['password']}}">
                          </div>

                          </div>             
                      </div>
                      </div>
                    </form>
      
            </div>
        </div>
        <!-- Message button -->
      <div uk-scrollspy="cls: uk-animation-slide-bottom; target: > x; delay: 900;">
        <a href="#" class="uk-position-fixed uk-position-bottom-right uk-button-primary dashboard-messenger messenger-hide" uk-tooltip="title: Messenger; delay: 700; pos: left">
            <div class="dashboard-messenger-ring">
                <span>Question? Send us a message. <span class="fa fa-paper-plane"></span></span>
            </div>
        </a>
        <a href="#" class="uk-position-fixed uk-position-bottom-right uk-margin-small-bottom uk-margin-small-right uk-button-primary dashboard-messenger messenger-show" uk-tooltip="title: Messenger; delay: 700; pos: left">
            <div class="dashboard-messenger-ring">
                <span class="fa fa-paper-plane"></span>
            </div>
        </a>
      </div>
      <div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>

        <h3>Title</h3>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <button class="uk-button uk-button-default uk-margin-small-right" type="button" uk-toggle="target: #offcanvas-reveal">Reveal</button>
    </div>
</div>
    </div>
    
</body>
</html>