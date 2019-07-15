@extends('layouts.app')

@section('content')
      <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="animation: fade; autoplay: true">
         <ul class="uk-slideshow-items">
            <li>
               <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                  <img src="https://scontent.fcrk1-1.fna.fbcdn.net/v/t1.15752-9/s2048x2048/32117036_1704712689584083_5309818890669260800_n.jpg?_nc_cat=0&oh=5be028ff2350492dc3cb0b5b69414c0b&oe=5B9542C9" alt="" uk-cover>
               </div>
               <div class="uk-overlay uk-position-center-left uk-position-small uk-margin-large-left" uk-scrollspy="cls: uk-animation-fade; target: > h1; delay: 500; repeat: false" style="background:none;">
                  <h1 uk-slideshow-parallax="x: 100,-100">Brigada Eskwela 2018</h1>
                  <p uk-slideshow-parallax="x: 200,-200">May 28 - June 2</p>
               </div>
            </li>
            <li>
               <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-top-right">
                  <img src="images/rotary-evap_banner.jpg" alt="" uk-cover>
               </div>
               <div class="uk-overlay uk-position-center-right uk-position-small">
                  <h1 uk-secondary uk-slideshow-parallax="x: 100,-100">Heading</h1>
                  <p uk-slideshow-parallax="x: 200,-200">Lorem ipsum dolor sit amet.</p>
               </div>
            </li>
         </ul>
         <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
         <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
      </div>
         <div class="uk-container" >
      <div class="uk-card uk-card-default uk-card-body" uk-scrollspy="cls: uk-animation-fade; target: > ul; delay: 500; repeat: false">
         <div uk-switcher="animation: uk-animation-fade uk-margin">
    <button class="uk-button uk-button-default switcher_font_weight" type="button">Campus Life</button>
    <button class="uk-button uk-button-default switcher_font_weight" type="button">About MRHS</button>
    <button class="uk-button uk-button-default switcher_font_weight" type="button">Resources</button>
    <button class="uk-button uk-button-default switcher_font_weight" type="button">Location</button>
</div>
<hr>

<ul class="uk-switcher uk-margin">
<li>
    <div class="uk-child-width-1-3" uk-grid>
         <div>
         <img src="https://scontent.fcrk1-1.fna.fbcdn.net/v/t1.0-9/17883889_1900606900197318_827589863623353921_n.jpg?_nc_cat=0&oh=4adae732bcec98a3c1fffeca99c6c76a&oe=5B970710" width="300px">
         </div>
         <div>
         <h5 style="font-weight: 500; color:#22370b;"><span>CAMPUS LIFE</span></h5>
               <p>Campus life is a portfolio entry of students as they sojourn, discover and embrace the wondrous things about being students and walk their way through achieving their dreams at MRHS.</p>
               <button class="uk-button uk-button-default uk-button-small uk-float-right button_green">Read More...</button>
         </div>
         <div>
         <h5 class="uk-heading-line" style="font-weight: 500; color:#22370b;"><span>DOWNLOADABLE FORMS</span></h5>
         <hr>
         <a href="#" style="font-family: calibri !important;"><span class="fa fa-file"></span><small> Enrollment Application Form</small></a>
         </div>
   </div>
   </li>

    <li>
    <img src="https://scontent.fcrk1-1.fna.fbcdn.net/v/t1.15752-9/s2048x2048/32117036_1704712689584083_5309818890669260800_n.jpg?_nc_cat=0&oh=5be028ff2350492dc3cb0b5b69414c0b&oe=5B9542C9" width="300px" style="float:left; margin:15px;">
    <div class="uk-padding">
     <h5 class="uk-heading-line" style="font-weight: 500; color:#22370b;"><span>BRIEF HISTORY MRHS</span></h5>
     <hr>
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

         <div class="uk-container">
            <div class="uk-grid-match uk-child-width-1-3@m" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > div> .uk-card; delay: 500; repeat: false">
               <div>
                  <a class="news_title uk-text-center" href="news.html">News</a>
                  <hr>
                  <!-- card -->
                  <div class="uk-card uk-card-default uk-card-body">
                     <div class="uk-card-badge uk-label badge_color">News</div>
                     
                     <div class="uk-margin">

                        <a href="news_1.html"><img class="image_left" src="https://scontent.fcrk1-1.fna.fbcdn.net/v/t1.0-9/17884030_1900606373530704_3810959106441801031_n.jpg?_nc_cat=0&oh=01c351472c0430d3914d763da6d08017&oe=5B95AD91">
                        Mauaque Resettlement Graduation of the first K12 High School Students</a> <small style="border-left:1px solid grey; padding:5px;">April 08 2018</small>
                     </div>
                     <div>
                        <small>Congratulation honor students of MRHS keep up the good work</small>
                     </div>
                     <hr>
                     <div class="uk-margin uk-text-right">
                        <a class="uk-button uk-button-text button_effect_1" href="news_1.html">Read more <span uk-icon="arrow-right" class="uk-icon"></span></a>
                     </div>
                  </div>
                  <hr>
                  <!-- card_2 -->
                  <div class="uk-card uk-card-default uk-card-body">
                     <div class="uk-card-badge uk-label badge_color">News</div>
                     <div class="uk-margin">
                        <a href="news_1.html"><img class="image_left" src="images/news.jpg">
                        Mauaque Resettlement Approved Wekonek Monitoring Application</a> 
                     </div>
                     <div>
                        <small>The head principal of MRHS approved the cict grant the web developer to create a web application for their school. </small>
                     </div>
                     <hr>
                     <div class="uk-margin uk-text-right">
                        <a class="uk-button uk-button-text button_effect_1" href="news_1.html">Read more <span uk-icon="arrow-right" class="uk-icon"></span></a>
                     </div>
                  </div>
               </div>
               <div class="uk-margin-medium-top" style="width: 60%;">

                  <div uk-slider="autoplay:true; delay:100">
<a class="news_title" href="news.html">Announcements</a>
    <div class="uk-position-relative uk-visible-toggle uk-light">

        <ul class="uk-slider-items uk-child-width-1-2@s uk-grid"  uk-scrollspy="cls: uk-animation-fade; target: > li; delay: 500; repeat: false">
            <li>
                <div class="uk-card uk-card-default" style="border:1px solid #222;     height: 225px;">
                  <div class="uk-card-title" style="font-size: 11pt; background: #22370b; color:#fff; padding:5px;">
                     <small>April 19 2018</small>
                     </div>
                    <div class="uk-card-body">
                        <p>Mass Training of The Grade 8 Science  Teachers,  from May 28 - June 8, 2018 (Tentative)</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-card uk-card-default" style="border:1px solid #222;     height: 225px;">
                     <div class="uk-card-title" style="font-size: 11pt; background: #22370b; color:#fff; padding:5px;">
                     <small>April 19 2018</small>
                     </div>
                    <div class="uk-card-body">
                        <p>Enrollment Starting May 3 - 16 from Grade 7 to Grade 10, </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-card uk-card-default" style="border:1px solid #222;     height: 225px;">
                  <div class="uk-card-title" style="font-size: 11pt; background: #22370b; color:#fff; padding:5px;">
                     <small>April 19 2018</small>
                     </div>
                    <div class="uk-card-body">
                        <p>May 17 - 18, 2018 will be the Late Enrolees and Transferees students</p>
                    </div>
                </div>
            </li>
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>

    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

</div>
               </div>
               <!-- carousel-->
               <div>
            
               </div>
            </div>
           <div class="wekonek_position uk-position-fixed"  uk-scrollspy="cls: uk-animation-slide-right-medium; target: > div> .wekonek_button; delay: 500; repeat: false">
           
               <div class="wekonek uk-margin uk-float-right">
                  <div class="wekonek_access_control">
                  <a class="button_title uk-text-right" href="news.html">Access Control</a>
               </div>
                  <a href="/login" class="wekonek_button badge_color uk-float-right"><span class="fa fa-users"></span></a>
                  </div>
               </div>
         </div>
      <div class="uk-section uk-padding uk-margin-medium-top uk-dark-blue uk-light" style="width: 100%;">
      <div class="uk-navbar-container" style="background:none;" uk-navbar>
      <div class="uk-child-width-1-2" uk-grid>
         <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
               <li class="uk-margin-medium-top"><a href="/" class="uk-navbar-item uk-logo uk-margin"><img src="images/logo/sample_logo3.png" width="120px" style="opacity: 0.8;"></a></li>
               <li><strong>Mauaque Resettlement High School Mabalacat 1994</strong><br/>
               Copyright &copy; 2018<br/>
               Mauaque Resettlement High School, 61st St, 2010<br/>
               Mabalacat City, Pampanga<br/>
               Contact Number: +63 906 977 8339
               </li>
            </ul>
         </div>
         <div style="width: 50%;">
         <h5>Quick links</h5>
            <div class="uk-child-width-1-3" uk-grid>
                  <div class="quicklink">
                     <ul>
                        <li><a href="/about"><small>About MRHS</small></a></li>
                        <li><a href="/administration"><small>Administration</small></a></li>
                        <li><a href="/research&academics"><small>Research & Academics</small></a></li>
                        <li><a href="/admissions"><small>Admissions</small></a></li>
                     </ul>
                  </div>
                  <div class="quicklink">
                     <ul>
                        <li><a href="/about/location"><small>Location</small></a></li>
                        <li><a href="/resource"><small>Resources</small></a></li>
                        <li><a href="/termservice"><small>Terms of Service</small></a></li>
                        <li><a href="/termsagreement"><small>Terms of Agreement</small></a></li>
                     </ul>
                  </div>
                  <div class="quicklink">
                     <ul>
                        <li><a href="/about/mission"><small>Mission</small></a></li>
                        <li><a href="/about/vision"><small>Vision</small></a></li>
                        <li><a href="/about/corevalues"><small>Core Values</small></a></li>
                        <li><a href="/about/campuslife"><small>Campus Life</small></a></li>
                     </ul>
                  </div>
            </div>
         </div>
         </div>
      </div>
         </div>
</div>     
@endsection