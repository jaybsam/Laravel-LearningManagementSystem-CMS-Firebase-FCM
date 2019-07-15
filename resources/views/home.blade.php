<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/uikit.min.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon-96x96.png') }}">
    <!-- UIkit JS -->
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/loader.js') }}"></script>
</head>
<body>

    <div class="loader uk-container">
      <div class="uk-position-center">
      <div class="uk-margin">
          <h1 class="uk-position-center" style="font-size: 60pt; opacity: 0.3;">MRHS</h1>
          <span style="font-size: 200pt; opacity: 0.3;">...</span>
          </div>

      </div>
   </div>
   <div class="page">
     <div class="uk-navbar-container" style="background:transparent;" uk-navbar>
         <div class="uk-navbar-left">
            <ul class="uk-navbar-nav" uk-scrollspy="cls: uk-animation-fade; target: > li; delay: 500; repeat: false">
               <li class="uk-margin-medium-top"><a href="/" class="uk-navbar-item uk-logo uk-margin"><img src="images/logo/logo3.png" width="500px"></a></li>
            </ul>
         </div>
<!--          <div class="uk-navbar-right">
            <div class="uk-margin uk-padding">
    <form class="uk-search uk-search-default">
        <span class="uk-search-icon-flip" uk-search-icon></span>
        <input class="uk-search-input" type="search">
    </form>
</div>
         </div> -->
      </div>
      <nav class="uk-navbar-container uk-margin-medium-top uk-secondary display" uk-navbar>
         <div class="nav-overlay uk-navbar-center">
            <div uk-scrollspy="cls: uk-animation-slide-top; target: > .uk-navbar-nav > li > a; delay: 300; repeat: false">
               <ul class="uk-navbar-nav">
                  <li>
                     <a class="a_effect_hover" href="/">MR-Home</a>
                  </li>
                  <li>
                     <a class="a_effect_hover"><span uk-icon="icon:  triangle-down">Administration</span></a>
                     <div uk-dropdown="mode: click;">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                           <li><a href="#">The Prinicpal III</a></li>
                           <li><a href="#">The Head Teacher I, Filipino</a></li>
                           <li><a href="#">The Head Teacher I, Science</a></li>
                           <li><a href="#">The Head Teacher I, T.L.E</a></li>
                           <li><a href="#">The Head Teacher I, MAPEH</a></li>
                           <li><a href="#">The Head Teacher I, Mathematics</a></li>
                           <li><a href="#">The Head Teacher I, English</a></li>
                        </ul>
                     </div>
                  </li>
                  <li>
                     <a class="uk-active a_effect_hover" href="/research&academics">Research & Academics</a>
                     <div class="uk-navbar-dropdown" uk-drop="boundary: !nav; boundary-align: true; pos: bottom-justify;" style="top:60px !important;">
                        <div class="uk-navbar-dropdown-grid uk-child-width-1-4" uk-grid>
                           <div>
                              
                           </div>
                           <div>
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                 <li class="uk-nav-header">Specialization</li>
                                 <li><a href="#">Special Curricular Program in Science, Technology & Engineering (SCP-STE)</a></li>
                              
                                 <li><a href="#">Special Program in Arts</a></li>
                                 <li><a href="#">Hearing Impaired-Special Education (HI-SPED)</a></li>
                                 <li><a href="#">Basic Education Program</a></li>
                              </ul>
                           </div>
                           <div>
                              
                           </div>
                           <div>
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                 <li>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et</p>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li>
                     <a class="a_effect_hover" href="/admissions">Admissions</a>
                     <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                           <li><a href="/admissions/admissionrequirement">Admission Requirement</a></li>
                           <li><a href="/admissions/admissionprocedure">Admission Procedure</a></li>
                        </ul>
                     </div>
                  </li>
                  <li>
                     <a class="a_effect_hover" href="/resource">Resources</a>
                     <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="/login">Campus</a></li>
                        </ul>
                     </div>
                  </li>
                   <li>
                     <a class="uk-active a_effect_hover" href="/about">About</a>
                     <div class="uk-navbar-dropdown" uk-drop="boundary: !nav; boundary-align: true; pos: bottom-justify;" style="top:60px !important;">
                        <div class="uk-navbar-dropdown-grid uk-child-width-1-4" uk-grid>
                           <div>
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                 <li class="uk-nav-header">MRHS</li>
                                 <li><a href="/about">About us</a></li>
                                 <li><a href="/about/briefhistory">Brief History</a></li>
                              </ul>
                           </div>
                           <div>
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                 <li class="uk-nav-header">Mission & Vision</li>
                                 <li><a href="/about/mission">Mission</a></li>
                                 <li><a href="/about/vision">Vision</a></li>
                                 <li><a href="/about/corevalues">Core Values</a></li>
                              </ul>
                           </div>
                           <div>
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                              <li class="uk-nav-header">Where abouts</li>
                                 <li><a href="/about/location">Location</a></li>

                              </ul>
                           </div>
                           <div>
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                 <li>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et</p>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li>
                     <a class="a_effect_hover" href="/alumni">Alumni</a>
                  </li>
               </ul>
            </div>
         </div>

      <!--    <div class="nav-overlay uk-navbar-right">

        <a class="uk-navbar-toggle" uk-search-icon uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>

    </div>

    <div class="nav-overlay uk-navbar-right uk-flex-1" hidden>

        <div class="uk-navbar-item uk-width-expand">
            <form class="uk-search uk-search-navbar uk-width-1-1">
                <input class="uk-search-input" type="search" placeholder="Search..." autofocus>
            </form>
        </div>

        <a class="uk-navbar-toggle" uk-close uk-toggle="target: .nav-overlay; animation: uk-animation-fade" href="#"></a>

    </div> -->

  <!--       <div class="uk-navbar-right">

        <div>
            <a class="uk-navbar-toggle" href="#" uk-search-icon></a>
            <div class="uk-navbar-dropdown" uk-drop="mode: click; cls-drop: uk-navbar-dropdown; boundary: !nav">

                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-expand">
                        <form class="uk-search uk-search-navbar uk-width-1-1">
                            <input class="uk-search-input" type="search" placeholder="Search..." autofocus>
                        </form>
                    </div>
                    <div class="uk-width-auto">
                        <a class="uk-navbar-dropdown-close" href="#" uk-close></a>
                    </div>
                </div>

            </div>
        </div>

    </div> -->

      </nav>

      <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="animation: fade; autoplay: true">
         <ul class="uk-slideshow-items">
            <li>
               <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                  <img src="images/Cabangis_carousel_final.jpg" alt="" uk-cover>
               </div>
               <div class="uk-overlay uk-position-center-left uk-position-small uk-margin-large-left" uk-scrollspy="cls: uk-animation-fade; target: > h1; delay: 500; repeat: false" style="background:none;">
                  <h1 uk-slideshow-parallax="x: 100,-100">Brigada Eskwela 2018</h1>
                  <p uk-slideshow-parallax="x: 200,-200" style="color:#fff;">May 28 - June 2</p>
               </div>
            </li>
            <li>
               <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right">
                  <img src="images/rotary-evap_banner.jpg" alt="" uk-cover>
               </div>
               <div class="uk-overlay uk-position-center-right uk-position-small">
                  <h1 uk-secondary uk-slideshow-parallax="x: 100,-100">Heading</h1>
                  <p uk-slideshow-parallax="x: 200,-200" style="color:#fff;">Lorem ipsum dolor sit amet.</p>
               </div>
            </li>
         </ul>
         <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
         <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
      </div>

<!-- content -->
<div>
      <div class="uk-card uk-card-default uk-card-body" uk-scrollspy="cls: uk-animation-fade; target: > ul; delay: 500; repeat: false">
       <div class="uk-container">
           <div uk-switcher="animation: uk-animation-fade uk-margin">
    <button class="uk-button uk-button-default switcher_font_weight" type="button">Campus Life</button>
    <button class="uk-button uk-button-default switcher_font_weight" type="button">About MRHS</button>
    <button class="uk-button uk-button-default switcher_font_weight" type="button">Resources</button>
    <button class="uk-button uk-button-default switcher_font_weight" type="button">Location</button>
</div>
<hr/>

<ul class="uk-switcher uk-margin">
<li>
    <div class="uk-child-width-1-3" uk-grid>
         <div>
         <img src="images/36864593_10214849619706909_523363622106169344_n.jpg" width="300px">
         </div>
         <div>
         <h5 style="font-weight: 500; color:#22370b;"><span>CAMPUS LIFE</span></h5>
               <p>Campus life is a portfolio entry of students as they sojourn, discover and embrace the wondrous things about being students and walk their way through achieving their dreams at MRHS.</p>
               <button class="uk-button uk-button-default uk-button-small uk-float-right button_green">Read More...</button>
         </div>
         <div>
         <h5 class="uk-heading-line" style="font-weight: 500; color:#22370b;"><span>DOWNLOADABLE FORMS</span></h5>
         <hr/>
         <a href="#" style="font-family: calibri !important;"><span class="fa fa-file"></span><small> Enrollment Application Form</small></a>
         </div>
   </div>
   </li>

    <li>
    <img src="images/398740_107662439407808_1981501313_n.jpg" width="300px" style="float:left; margin:15px;">
    <div class="uk-padding">
     <h5 class="uk-heading-line" style="font-weight: 500; color:#22370b;"><span>BRIEF HISTORY MRHS</span></h5>
     <hr/>
       <p class="">Mr. Venancio S. Belnas was the first assigned school head as the Officer-in-Charge. Under his administration, he had placed Mauaque Resettlement High School as one of the competitive schools in the Division of Pampanga....
       </p>
       <div class="uk-margin">

       <a href="#" class="uk-button uk-button-default uk-button-small button_green" style="float:right;">Read More...</a>
       </div>
    </div>
    </li>

    <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur, sed do eiusmod.</li>
    <li><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d358639.7126701772!2d120.49634572450034!3d15.232673661289203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396edcbd255e26f%3A0xf9784718ddacf4bd!2sMauaque+Resettlement+High+School%2C+15th+Street%2C+Mabalacat%2C+Pampanga!5e0!3m2!1sen!2sph!4v1525686022639" width="700" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    <div style="float:right; flex:auto;"><h4><span class="fa fa-map"></span> Location</h4></div></li>
</ul>
       </div>
</div>

  <div class="uk-section uk-padding" style="background: linear-gradient(to right, #ffffffb3, #fcfcfc57); box-shadow: 0 0 30px 1px #2222226b;">
    <div uk-grid>
      <div class="uk-width-1-4 uk-text-center">
        <a href="#" class="news_title">Latest News</a>
        <table class="uk-table uk-table-divider">
          <thead>
          <tr>
            <td><img src="data:image/jpeg;base64,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"></td>
          </tr>
          </thead>
          <tbody>
          <tr>
          <td style="text-align:left"><a href="#">Define an abbreviation using the <abbr title="Title Text">abbr element with a title</abbr>.</a></td>
          </tr>
          <tr>
          <td style="text-align:left">Create bold text with the <b>b element</b>.</td>
          </tr>
          <tr>
          <td style="text-align:left">Define the title of a work with the <cite>cite element</cite>.</td>
          </tr>
          <tr>
          <td style="text-align:left">Define the title of a work with the <cite>cite element</cite>.</td>
          </tr>
          <tr>
          <td style="text-align:left">Define the title of a work with the <cite>cite element</cite>.</td>
          </tr>
          </tbody>
        </table>
      </div>
      <div class="uk-width-1-2">
        <div class="uk-text-center">
          <a href="#" class="news_title">Featured Events</a>
        </div>
        <table class="uk-table uk-table-divider">
          <thead>
            <tr>
                <div class="uk-position-relative uk-margin-medium-top uk-visible-toggle uk-light" uk-slideshow="animation: scale; autoplay:true;" style="border:0px; ">

                          <ul class="uk-slideshow-items custom-slideshow">
                  @if(!empty($get))
                    @foreach($get as $ev)
                      @if($ev['category'] == 'Event')
                              <li>
                                  <img src="{{asset($ev['cover'])}}" alt="" uk-cover>
                                  <div class="uk-overlay uk-overlay-primary uk-position-bottom" style="background: rgba(34, 55, 11, 0.88);">
                                    <div uk-grid>
                                      <div class="uk-width-1-4">
                                        <div class="uk-background-cover uk-margin-small-top">
                                          <img src="{{asset('images/logo/logo.png')}}" width="90px" style="border-radius: 500px;">
                                        </div>
                                      </div>
                                      <div class="uk-width-expand">
                                        <h4 class="uk-margin-remove"><br>{{str_limit($ev['title'], 25)}}</h4>
                                          <small class="uk-margin-remove">{{str_limit($ev['shortcontent'], 70)}}</small>
                                      </div>
                                    </div>
                                    
                                      
                                  </div>
                              </li>
                            @endif
                    @endforeach
                  @endif
                          </ul>

                          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

                      </div>
            
            </tr>
          </thead>
          <tbody>
            @if(!empty($get))
                    @foreach($get as $ev)
                      @if($ev['category'] == 'Event')
            <tr>
              <td>{{$ev['title']}}</td>
              <td><button class="uk-button uk-button-default">Read More</button></td>
            </tr>
            @endif
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
      <div class="uk-width-expand">
        <a href="#" class="news_title">Announcements</a>
        <table class="uk-table uk-table-divider">
          <thead>
            <tr>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          <tr>
          <td><span uk-icon="icon:calendar; ratio:2;"></span></td>
          <td style="text-align:left"><a href="#">Define an abbreviation using the <abbr title="Title Text">abbr element with a title</abbr>.</a></td>
          </tr>
          <tr>
          <td><span uk-icon="icon:calendar; ratio:2;"></span></td>
          <td style="text-align:left">Create bold text with the <b>b element</b>.</td>
          </tr>
          <tr>
            <td><span uk-icon="icon:calendar; ratio:2;"></span></td>
          <td style="text-align:left">Define the title of a work with the <cite>cite element</cite>.</td>
          </tr>
          <tr>
            <td><span uk-icon="icon:calendar; ratio:2;"></span></td>
          <td style="text-align:left">Define the title of a work with the <cite>cite element</cite>.</td>
          </tr>
          <tr>
            <td><span uk-icon="icon:calendar; ratio:2;"></span></td>
          <td style="text-align:left">Define the title of a work with the <cite>cite element</cite>.</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- login -->
  <div class="uk-container">
       @if(session()->has('teacher_id'))
          <a class="login-button" href="/mrhs/teacher" style="border-bottom: 42px solid #0d1c18;">
            <div class="text" style="left:5%;">Dashboard</div>
          </a>
          @else
          <a class="login-button" uk-toggle="target: #offcanvas-slide">
            <div class="text" style="">Login</div>
          </a>
         @endif

<div id="offcanvas-slide" uk-offcanvas="overlay: true; flip:true;">
    <div class="uk-offcanvas-bar uk-dark uk-background-muted uk-float-right">
      <div id="loading" style="
    background: rgba(255, 255, 255, 0.76);
    position: fixed;
    z-index: 9999;
    left: 0;
    height: 100%;
    width: 100%;
    ">
      <div uk-spinner="ratio: 4.5" style="
    position: fixed;
    top: 35%;
    left: 30%;
     color: #2ba36c;
"></div>
    <p style="
    font-weight: 500;
    color: #2ba36c;
    position: fixed;
    top: 41%;
    left: 42%;
    box-shadow: 0 0 black;
">Loading</p></div>
<div class="uk-margin uk-text-center">
  <h4 class="login-header" style="font-family: times new roman;">Mauaque Resettlement <br/>
    Highschool 
  </h4>
</div>
<ul class="uk-subnav uk-subnav-pill uk-flex-center myswitch" uk-switcher="animation: uk-animation-slide-right-medium uk-animation-slow">
    <li><a class="switch" href="#">Student</a></li>
    @if(session()->has('class'))
    <li class="uk-active"><a class="switch" href="#">Teacher</a></li>
    @else
    <li><a class="switch" href="#">Teacher</a></li>
    @endif
    <li><a class="switch" href="#">Parent</a></li>
</ul>
<div id="error1"></div>
<ul class="uk-switcher uk-margin-large-top" >
    <li>
      
      <form>
        @csrf
        <div class="uk-margin">
          <input class="uk-input w-radius w-input" type="number" name="sid" placeholder="Student ID" uk-tooltip="title:  IP address tracker enabled; pos:top-left;" autofocus required>
        </div>
        <div class="uk-margin">
          <input class="uk-input w-radius w-input" type="password" name="student_pass" uk-tooltip="title:  IP address tracker enabled; pos:top-left;" placeholder="Password" required>
        </div>
        <div class="uk-margin">
          <button id="student_login" class="uk-button uk-margin-large-top uk-light bg-light-green w-button uk-width-1-1 text-transform-n uk-margin-small-bottom uk-radius">Sign in</button>
          <div>
            <small href="#" style="color:#5e79fd;"><u>Forgot Password?</u></small>
          </div>
        </div>
      </form>
    </li>
    <li>
      
      <form action="mrhs/teacher/login" method="POST">
        @csrf
        <div class="uk-margin">
          <input class="uk-input w-radius w-input" type="number" min="1" name="tid" uk-tooltip="title:  IP address tracker enabled; pos:top-left;" placeholder="Teacher ID" value="{{ old('tid') }}" autofocus required>
        </div>
        <div class="uk-margin" type="submit">
          <input class="uk-input w-radius w-input" type="password" name="teacher_pass" placeholder="Password" uk-tooltip="title:  IP address tracker enabled; pos:top-left;" value="{{ old('teacher_pass') }}" required>
        </div>
        <div class="uk-margin">
          <button class="uk-button uk-margin-large-top uk-light bg-light-green w-button uk-width-1-1 text-transform-n uk-margin-small-bottom uk-radius teacher-sign" id="teacherlogin" type="submit">Sign in</button>
          <div>
            <small href="#" style="color:#5e79fd;"><u>Forgot Password?</u></small>
          </div>
        </div>
      </form></li>
    <li>
      
      <form action="#" method="post">
        <div class="uk-margin">
          <input class="uk-input w-radius w-input" type="text" name="pid" placeholder="Parent ID" autofocus required>
        </div>
        <div class="uk-margin">
          <input class="uk-input w-radius w-input" type="password" name="parent_pass" placeholder="Password" required>
        </div>
        <div class="uk-margin">
          <button class="uk-button uk-margin-large-top uk-light bg-light-green w-button uk-width-1-1 text-transform-n uk-margin-small-bottom uk-radius" type="submit">Sign in</button>
          <div>
            <small href="#" style="color:#5e79fd;"><u>Forgot Password?</u></small>
          </div>
        </div>
      </form></li>
</ul>
    </div>
</div>
  </div>

         <!-- <div class="uk-container">
     
<div id="modal-close-outside" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-outside" type="button" uk-close></button>
        <h2 class="uk-modal-title">Outside</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</div>

            <div class="uk-margin-medium-top" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > div> .uk-card, div > div > .uk-position-relative > ul > li > .uk-card, div > .uk-position-relative > .custom-slideshow; delay: 500; repeat: false">
              
               <div class="uk-width-expand">
                <a class="news_title uk-text-center" href="news.html">Events</a>
                  <hr>
                  
                  <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="animation: scale; autoplay:true;" style="border:0px; ">

                          <ul class="uk-slideshow-items custom-slideshow">
                  @if(!empty($get))
                    @foreach($get as $ev)
                      @if($ev['category'] == 'Event')
                              <li>
                                  <img src="{{asset($ev['cover'])}}" alt="" uk-cover>
                                  <div class="uk-overlay uk-overlay-primary uk-position-right uk-text-left uk-transition-slide-right uk-width-medium" style="background: rgba(34, 55, 11, 0.88);">
                                    <div class="uk-background-cover">
                                      <img src="{{asset('images/logo/logo.png')}}" width="90px" style="border-radius: 500px;">
                                    </div>
                                      <h4 class="uk-margin-remove"><br>{{str_limit($ev['title'], 25)}}</h4>
                                      <small class="uk-margin-remove">{{str_limit($ev['shortcontent'], 70)}}</small><br><br>
                                      <button class="uk-button uk-button-default">Read More</button>
                                  </div>
                              </li>
                            @endif
                    @endforeach
                  @endif
                          </ul>

                          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

                      </div>
                  
                   <a class="news_title uk-text-center uk-margin-medium-top" href="news.html">Upcoming Program</a>
                <div class="uk-margin-medium-top" uk-slider="autoplay:true;">
                 
                      <div class="uk-position-relative uk-visible-toggle uk-light">

                          <ul class="uk-slider-items uk-child-width-1-2@s uk-grid">
                            @if(!empty($get))
                    @foreach($get as $ev)
                      @if($ev['category'] == 'Program')
                              <li>
                                  <div class="uk-card uk-card-default">
                                      <div class="uk-card-media-top uk-inline">
                                          <img src="{{asset($ev['cover'])}}" alt="">
                                      </div>
                                      <div class="uk-card-body" style="padding: 20px 20px; height: 120px;">
                                            <div class="uk-card-badge label program" style="top: 119px;
    right: 10px;">{{$ev['category']}}</div>
                                          <a href="#" class="card-head">{{str_limit($ev['title'], 25)}}</a><br>
                                          <small>{{str_limit($ev['shortcontent'], 70)}}</small>
                                      </div>
                                  </div>
                              </li>
                              @endif
                    @endforeach
                  @endif
             
                         </ul>
                          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                      </div>
                      <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
                  </div>
               </div>
               
               <div class="uk-width-1-3@m">
                  <a class="news_title uk-text-center" href="news.html">News</a>
                  <hr>
                  
                  @if(!empty($get))
                    @foreach($get as $ev)
                      @if($ev['category'] == 'News')
                  <div class="uk-card uk-card-default uk-card-body">
                     <div class="uk-card-badge label news">{{$ev['category']}}</div>
                     
                     <div class="uk-margin">

                        <a href="news_1.html"><img class="image_left" src="{{asset($ev['cover'])}}" width="200px" height="200px" style="width: 100px; height: 80px !important;">
                        {{$ev['title']}}</a> <small style="border-left:1px solid grey; padding:5px;">April 08 2018</small>
                     </div>
                     <div>
                        <small>{{$ev['shortcontent']}}</small>
                     </div>
                     <hr>
                     <div class="uk-margin uk-text-right">
                        <a class="uk-button uk-button-text button_effect_1" href="news_1.html">Read more <span uk-icon="arrow-right" class="uk-icon"></span></a>
                     </div>
                  </div>
                  <hr>
                  @endif
                    @endforeach
                  @endif
               </div>
            </div>
         </div> -->


         <!-- footer -->
      <div class="uk-dark-blue uk-light" style="width: 100%; position: relative; bottom: 0; margin-top:30px;">
      <div  class="uk-padding" uk-grid>
        <div class="uk-width-auto">
          <div uk-lightbox>
            <a href="{{asset('images/logo/sample_logo3.png')}}">
           <img src="{{asset('images/logo/sample_logo3.png')}}" width="120px">
           </a>
         </div>
        </div>
         <div class="uk-width-1-3@m">
              <strong style="color:#fff;">Mauaque Resettlement High School <br>Mabalacat 1994</strong><br/>
               Copyright &copy; 2018<br/>
               Mauaque Resettlement High School, 61st St, 2010<br/>
               Mabalacat City, Pampanga<br/>
               Contact Number: +63 906 977 8339
              <div>
            <small style="color:#fff;">Powered by Wekonek</small>
         </div>
         </div>
            <div class="uk-width-expand">
              <h5>QuickLinks</h5>
              <div uk-grid>
                  <div class="quicklink">
                     <ul class="dashed">
                        <li><a href="/about"><small>About MRHS</small></a></li>
                        <li><a href="/administration"><small>Administration</small></a></li>
                        <li><a href="/research&academics"><small>Research & Academics</small></a></li>
                        <li><a href="/admissions"><small>Admissions</small></a></li>
                     </ul>
                  </div>
                  <div class="quicklink">
                     <ul class="dashed">
                        <li><a href="/about/location"><small>Location</small></a></li>
                        <li><a href="/resource"><small>Resources</small></a></li>
                        <li><a href="/termservice"><small>Terms of Service</small></a></li>
                        <li><a href="/termsagreement"><small>Terms of Agreement</small></a></li>
                     </ul>
                  </div>
                  <div class="quicklink">
                     <ul class="dashed">
                        <li><a href="/about/mission"><small>Mission</small></a></li>
                        <li><a href="/about/vision"><small>Vision</small></a></li>
                        <li><a href="/about/corevalues"><small>Core Values</small></a></li>
                        <li><a href="/about/campuslife"><small>Campus Life</small></a></li>
                     </ul>
                  </div>
                  <div class="quicklink">
                     <ul class="dashed">
                        <li><a href="/admin/login"><small>Admin Login</small></a></li>
                        <li><a href="#" uk-toggle="target: #modal-close-outside"><small>Help</small></a></li>
                     </ul>
                  </div>
                </div>
            </div>        
         </div>
      </div>
   </div>
      

</body>
<script type="text/javascript">
  $(document).ready(function(){
    $('#loading').hide();
    $("#teacherlogin").click(function(e){
      $('#loading').fadeIn();
      e.preventDefault();
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                      }
             });
      $.ajax({
         type:'POST',
                url:'/mrhs/teacher/login',
                data:{
                '_token': $('input[name=_token]').val(),
                username : $('input[name=tid]').val(),
                password : $('input[name=teacher_pass]').val()
              },
              dataType: "json",
              success:function(data){
                console.log(data);
                if(data.errors){
                    $('#error1').hide();
                      $('#loading').fadeOut();
                        $('#error1').show();
                        $('#error1').replaceWith('<div id="error1"><div uk-scrollspy="cls: uk-animation-slide-top; target: > .uk-alert-danger; delay: 100; repeat: false">'+
  '<div class="uk-alert-danger" style="background: #fb5e5e; position: fixed; width: 75%; top:20%; color:#fff; border-radius: 2px; box-shadow: 0px 6px 10px 0 #22222273;" uk-alert><a class="uk-alert-close" uk-close></a>'+
    '<p>'+data.errors+'</p></div></div></div>');
                    }else{
                      if(data.success){
                        $('#error1').hide();
                        window.location = "/mrhs/teacher";

                      }
                    }
              }
      });
    });
     $("#student_login").click(function(e){
      e.preventDefault();
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
                      }
             });
      $.ajax({
                type:'POST',
                url:'/mrhs/student/login',
                data:{
                '_token': $('input[name=_token]').val(),
                Susername : $('input[name=sid]').val(),
                Spassword : $('input[name=student_pass]').val()
              },
              dataType: "json",
              success:function(data){
                console.log(data);
                if(data.errors){
                  $('#loading').fadeOut();
                    $('#error1').show();
                        $('#error1').show();
                        $('#error1').replaceWith('<div id="error1"><div uk-scrollspy="cls: uk-animation-slide-top; target: > .uk-alert-danger; delay: 100; repeat: false">'+
  '<div class="uk-alert-danger" style="background: #fb5e5e; position: fixed; width: 75%; top:20%; color:#fff; border-radius: 2px; box-shadow: 0px 6px 10px 0 #22222273;" uk-alert><a class="uk-alert-close" uk-close></a>'+
    '<p>'+data.errors+'</p></div></div></div>');
                    }else{
                      if(data.success){
                       console.log(data.success);
                        window.location = "/mrhs/student";
                        return false;
                      }
                    }
              }
      });
    });
    @if(session()->has('error'))
    setTimeout(function(){ 
      UIkit.offcanvas('#offcanvas-slide').show();
    }, 700);
    @endif
    @if(session()->has('logout'))
    setTimeout(function(){ 
      UIkit.offcanvas('#offcanvas-slide').show();
    }, 700);
    @endif

  });

</script>
</html>
