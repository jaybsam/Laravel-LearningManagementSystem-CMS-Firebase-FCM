<!DOCTYPE html>
<html>
   <head>
      <title>Wekonek</title>
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


      <div class="uk-navbar-container" style="background:#fff;" uk-navbar>
         <div class="uk-navbar-left">
            <ul class="uk-navbar-nav" uk-scrollspy="cls: uk-animation-fade; target: > li; delay: 500; repeat: false">
               <li class="uk-margin-medium-top"><a href="/" class="uk-navbar-item uk-logo uk-margin"><img src="images/logo/logo3.png" width="500px"></a></li>
            </ul>
         </div>
         <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
               
            </ul>
         </div>
      </div>
      <nav class="uk-navbar-container uk-margin-medium-top uk-secondary" uk-navbar>
         <div class="uk-navbar-center">
            <div>
               <ul class="uk-navbar-nav">
                  <li>
                     <a class="active a_effect_hover" href="/">Home</a>
                  </li>
                  <li>
                     <a class="a_effect_hover" href="/administration"><span>Administration</span></a>
                     <div class="uk-navbar-dropdown">
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
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                 <li class="uk-active"><a href="#">Header</a></li>
                                 <li><a href="#">Item</a></li>
                                 <li class="uk-nav-header">Header</li>
                                 <li><a href="#">Item</a></li>
                                 <li><a href="#">Item</a></li>
                                 <li class="uk-nav-divider"></li>
                                 <li><a href="#">Item</a></li>
                              </ul>
                           </div>
                           <div>
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                 <li class="uk-active"><a href="#">Header</a></li>
                                 <li><a href="#">Item</a></li>
                                 <li class="uk-nav-header">Header</li>
                                 <li><a href="#">Item</a></li>
                                 <li><a href="#">Item</a></li>
                                 <li class="uk-nav-divider"></li>
                                 <li><a href="#">Item</a></li>
                              </ul>
                           </div>
                           <div>
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                 <li class="uk-active"><a href="#">Header</a></li>
                                 <li><a href="#">Item</a></li>
                                 <li class="uk-nav-header">Header</li>
                                 <li><a href="#">Item</a></li>
                                 <li><a href="#">Item</a></li>
                                 <li class="uk-nav-divider"></li>
                                 <li><a href="#">Item</a></li>
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
                     <a class="a_effect_hover" href="/admissions">Admissions</a>
                     <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                           <li><a href="#">Admission Requirement</a></li>
                           <li><a href="#">Admission Procedure</a></li>
                        </ul>
                     </div>
                  </li>
                  <li>
                     <a class="a_effect_hover" href="/resource">Resources</a>
                     <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                        <li><a href="#">Teacher Portal</a></li>
                           <li><a href="#">Student Portal</a></li>
                           <li><a href="#">Parental Access</a></li>
                        </ul>
                     </div>
                  </li>
                   <li>
                     <a class="uk-active a_effect_hover" href="/about">About</a>
                     <div class="uk-navbar-dropdown" uk-drop="boundary: !nav; boundary-align: true; pos: bottom-justify;" style="top:60px !important;">
                        <div class="uk-navbar-dropdown-grid uk-child-width-1-4" uk-grid>
                           <div>
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                 <li class="uk-active"><a href="#">MRHS</a></li>
                                 <li><a href="#">About us</a></li>
                                 <li><a href="#">Brief History</a></li>
                              </ul>
                           </div>
                           <div>
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                 <li class="uk-nav-header">Mission & Vision</li>
                                 <li><a href="/about/mission">Mission</a></li>
                                 <li><a href="#">Vision</a></li>
                                 <li><a href="#">Core Values</a></li>
                              </ul>
                           </div>
                           <div>
                              <ul class="uk-nav uk-navbar-dropdown-nav">
                                 <li><a href="#">Location</a></li>

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
                     <a class="uk-active a_effect_hover" href="/alumni">Alumni</a>
                     <div class="uk-navbar-dropdown" uk-drop="boundary: !nav; boundary-align: true; pos: bottom-justify;">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                           <li class="uk-active"><a href="#">Active</a></li>
                           <li><a href="#">Item</a></li>
                           <li class="uk-nav-header">Header</li>
                           <li><a href="#">Item</a></li>
                           <li><a href="#">Item</a></li>
                           <li class="uk-nav-divider"></li>
                           <li><a href="#">Item</a></li>
                        </ul>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="uk-container uk-padding" style="height: 400px;">
      <p class="uk-font maintenance uk-position-center">SORRY FOR THE INCONVENIENCE THIS PAGE IS UNDERMAINTENANCE...</p>
      </div>
      <div class="uk-section uk-padding uk-margin-medium-top uk-background-secondary uk-light" style="width: 100%;">
      <div class="uk-navbar-container" style="background:none;" uk-navbar>
      <div class="uk-child-width-1-2" uk-grid>
         <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
               <li class="uk-margin-medium-top"><a href="/" class="uk-navbar-item uk-logo uk-margin"><img src="images/logo/logo.png" width="120px" style="opacity: 0.8;"></a></li>
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
   
   </body>
</html>