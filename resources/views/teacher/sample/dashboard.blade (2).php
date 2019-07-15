<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from sleek.tafcoder.com/layouts/sidebar-navs/sidebar-minimized.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 12:47:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Sidebar Minimized - Sleek Admin Dashboard Template</title>

  <!-- GOOGLE FONTS -->
  <link
    href="{{asset('sleeze/fonts.googleapis.com/css0e32.css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500')}}"
    rel="stylesheet"
  />
  <link
    href="{{asset('sleeze/cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css')}}"
    rel="stylesheet"
  />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{asset('sleeze/assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
  <link href="{{asset('sleeze/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
  <link
    href="{{asset('sleeze/assets/plugins/flag-icons/css/flag-icon.min.css')}}"
    rel="stylesheet"
  />
  <link
    href="{{asset('sleeze/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}"
    rel="stylesheet"
  />
  <link href="{{asset('sleeze/assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
  <link href="{{asset('sleeze/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
  <link
    href="{{asset('sleeze/assets/plugins/daterangepicker/daterangepicker.css')}}"
    rel="stylesheet"
  />

  <!-- SLEEK CSS -->
  <link rel="stylesheet" href="{{asset('sleeze/assets/css/styles.css')}}" />

  <!-- FAVICON -->
  <link href="{{asset('sleeze/assets/img/favicon.png')}}" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{asset('assets/plugins/nprogress/nprogress.js')}}"></script>
</head>


  <body class="sidebar-fixed sidebar-dark sidebar-minified header-fixed header-light" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
              <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
          <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
              <a href="../../index.html">
                <svg
                  class="brand-icon"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid"
                  width="30"
                  height="33"
                  viewBox="0 0 30 33"
                >
                  <g fill="none" fill-rule="evenodd">
                    <path
                      class="logo-fill-blue"
                      fill="#7DBCFF"
                      d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
                    />
                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                  </g>
                </svg>
                <span class="brand-name">Sleek Dashboard</span>
              </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

              <!-- sidebar menu -->
              <ul class="nav sidebar-inner" id="sidebar-menu">
                
                  <li
                    
                      class="has-sub"
                    
                    >
                      <a
                        class="sidenav-item-link"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#dashboard"
                        aria-expanded="false"
                        aria-controls="dashboard"
                      >
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span> <b class="caret"></b>
                      </a>
                      <ul
                        
                          class="collapse"
                        
                        id="dashboard"
                        data-parent="#sidebar-menu"
                      >
                        <div class="sub-menu">

                          

                            
                                <li  
                                >
                                  <a href="../../index.html">Ecommerce</a>
                                </li>
                            

                          

                            
                                <li  
                                >
                                  <a href="../../analytics.html">Analytics</a>
                                </li>
                            

                          
                        </div>
                      </ul>
                  </li>
                
                  <li
                    
                      class="has-sub active expand"
                    
                    >
                      <a
                        class="sidenav-item-link"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#layouts"
                        aria-expanded="false"
                        aria-controls="layouts"
                      >
                        <i class="mdi mdi-widgets"></i>
                        <span class="nav-text">Layouts</span> <b class="caret"></b>
                      </a>
                      <ul
                        
                          class="collapse show"
                        
                        id="layouts"
                        data-parent="#sidebar-menu"
                      >
                        <div class="sub-menu">

                          

                            
                                <li
                                  
                                    class="has-sub"
                                   >
                                  <a
                                    class="sidenav-item-link"
                                    href="javascript:void(0)"
                                    data-toggle="collapse"
                                    data-target="#headers"
                                    aria-expanded="false"
                                    aria-controls="headers"
                                  >
                                    <span class="nav-text">Headers</span> <b class="caret"></b>
                                  </a>
                                  <ul

                                    
                                      class="collapse"
                                    
                                    id="headers"
                                  >
                                    <div class="sub-menu">
                                      
                                        <li  
                                        >
                                          <a href="../headers/header-fixed.html">Header Fixed</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../headers/header-static.html">Header Static</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../headers/header-light.html">Header Light</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../headers/header-dark.html">Header Dark</a>
                                        </li>
                                      
                                    </div>
                                  </ul>
                                </li>
                            

                          

                            
                                <li
                                  
                                    class="has-sub active expand"
                                   >
                                  <a
                                    class="sidenav-item-link"
                                    href="javascript:void(0)"
                                    data-toggle="collapse"
                                    data-target="#sidebar-navs"
                                    aria-expanded="false"
                                    aria-controls="sidebar-navs"
                                  >
                                    <span class="nav-text">Sidebar Navs</span> <b class="caret"></b>
                                  </a>
                                  <ul

                                    
                                      class="collapse show"
                                    
                                    id="sidebar-navs"
                                  >
                                    <div class="sub-menu">
                                      
                                        <li  
                                        >
                                          <a href="sidebar-open.html">Sidebar Open</a>
                                        </li>
                                      
                                        <li 
                                              class="active"
                                             
                                        >
                                          <a href="sidebar-minimized.html">Sidebar Minimized</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="sidebar-offcanvas.html">Sidebar Offcanvas</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="sidebar-with-footer.html">Sidebar With Footer</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="sidebar-without-footer.html">Sidebar Without Footer</a>
                                        </li>
                                      
                                    </div>
                                  </ul>
                                </li>
                            

                          
                        </div>
                      </ul>
                  </li>
                
                  <li
                    
                      class="has-sub"
                    
                    >
                      <a
                        class="sidenav-item-link"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#ui-elements"
                        aria-expanded="false"
                        aria-controls="ui-elements"
                      >
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">UI Elements</span> <b class="caret"></b>
                      </a>
                      <ul
                        
                          class="collapse"
                        
                        id="ui-elements"
                        data-parent="#sidebar-menu"
                      >
                        <div class="sub-menu">

                          

                            
                                <li
                                  
                                    class="has-sub"
                                   >
                                  <a
                                    class="sidenav-item-link"
                                    href="javascript:void(0)"
                                    data-toggle="collapse"
                                    data-target="#components"
                                    aria-expanded="false"
                                    aria-controls="components"
                                  >
                                    <span class="nav-text">Components</span> <b class="caret"></b>
                                  </a>
                                  <ul

                                    
                                      class="collapse"
                                    
                                    id="components"
                                  >
                                    <div class="sub-menu">
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/alert.html">Alert</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/badge.html">Badge</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/button-default.html">Button Default</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/button-dropdown.html">Button Dropdown</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/button-group.html">Button Group</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/button-social.html">Button Social</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/button-loading.html">Button Loading</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/breadcrumb.html">Breadcrumb</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/card.html">Card</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/carousel.html">Carousel</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/collapse.html">Collapse</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/list-group.html">List Group</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/modal.html">Modal</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/pagination.html">Pagination</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/popover-tooltip.html">Popover & Tooltip</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/progress-bar.html">Progress Bar</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/spinner.html">Spinner</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/switcher.html">Switcher</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/table.html">Table</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/components/tab.html">Tab</a>
                                        </li>
                                      
                                    </div>
                                  </ul>
                                </li>
                            

                          

                            
                                <li
                                  
                                    class="has-sub"
                                   >
                                  <a
                                    class="sidenav-item-link"
                                    href="javascript:void(0)"
                                    data-toggle="collapse"
                                    data-target="#icons"
                                    aria-expanded="false"
                                    aria-controls="icons"
                                  >
                                    <span class="nav-text">Icons</span> <b class="caret"></b>
                                  </a>
                                  <ul

                                    
                                      class="collapse"
                                    
                                    id="icons"
                                  >
                                    <div class="sub-menu">
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/icons/material-icon.html">Material Icon</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/icons/flag-icon.html">Flag Icon</a>
                                        </li>
                                      
                                    </div>
                                  </ul>
                                </li>
                            

                          

                            
                                <li
                                  
                                    class="has-sub"
                                   >
                                  <a
                                    class="sidenav-item-link"
                                    href="javascript:void(0)"
                                    data-toggle="collapse"
                                    data-target="#forms"
                                    aria-expanded="false"
                                    aria-controls="forms"
                                  >
                                    <span class="nav-text">Forms</span> <b class="caret"></b>
                                  </a>
                                  <ul

                                    
                                      class="collapse"
                                    
                                    id="forms"
                                  >
                                    <div class="sub-menu">
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/forms/basic-input.html">Basic Input</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/forms/input-group.html">Input Group</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/forms/checkbox-radio.html">Checkbox & Radio</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/forms/form-validation.html">Form Validation</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/forms/form-advance.html">Form Advance</a>
                                        </li>
                                      
                                    </div>
                                  </ul>
                                </li>
                            

                          

                            
                                <li
                                  
                                    class="has-sub"
                                   >
                                  <a
                                    class="sidenav-item-link"
                                    href="javascript:void(0)"
                                    data-toggle="collapse"
                                    data-target="#maps"
                                    aria-expanded="false"
                                    aria-controls="maps"
                                  >
                                    <span class="nav-text">Maps</span> <b class="caret"></b>
                                  </a>
                                  <ul

                                    
                                      class="collapse"
                                    
                                    id="maps"
                                  >
                                    <div class="sub-menu">
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/maps/google-map.html">Google Map</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/maps/vector-map.html">Vector Map</a>
                                        </li>
                                      
                                    </div>
                                  </ul>
                                </li>
                            

                          

                            
                                <li
                                  
                                    class="has-sub"
                                   >
                                  <a
                                    class="sidenav-item-link"
                                    href="javascript:void(0)"
                                    data-toggle="collapse"
                                    data-target="#widgets"
                                    aria-expanded="false"
                                    aria-controls="widgets"
                                  >
                                    <span class="nav-text">Widgets</span> <b class="caret"></b>
                                  </a>
                                  <ul

                                    
                                      class="collapse"
                                    
                                    id="widgets"
                                  >
                                    <div class="sub-menu">
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/widgets/general-widget.html">General Widget</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../ui-elements/widgets/chart-widget.html">Chart Widget</a>
                                        </li>
                                      
                                    </div>
                                  </ul>
                                </li>
                            

                          
                        </div>
                      </ul>
                  </li>
                
                  <li
                    
                      class="has-sub"
                    
                    >
                      <a
                        class="sidenav-item-link"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#charts"
                        aria-expanded="false"
                        aria-controls="charts"
                      >
                        <i class="mdi mdi-chart-pie"></i>
                        <span class="nav-text">Charts</span> <b class="caret"></b>
                      </a>
                      <ul
                        
                          class="collapse"
                        
                        id="charts"
                        data-parent="#sidebar-menu"
                      >
                        <div class="sub-menu">

                          

                            
                                <li  
                                >
                                  <a href="../../charts/chartjs.html">ChartJS</a>
                                </li>
                            

                          
                        </div>
                      </ul>
                  </li>
                
                  <li
                    
                      class="has-sub"
                    
                    >
                      <a
                        class="sidenav-item-link"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#pages"
                        aria-expanded="false"
                        aria-controls="pages"
                      >
                        <i class="mdi mdi-image-filter-none"></i>
                        <span class="nav-text">Pages</span> <b class="caret"></b>
                      </a>
                      <ul
                        
                          class="collapse"
                        
                        id="pages"
                        data-parent="#sidebar-menu"
                      >
                        <div class="sub-menu">

                          

                            
                                <li  
                                >
                                  <a href="../../pages/user-profile.html">User Profile</a>
                                </li>
                            

                          

                            
                                <li
                                  
                                    class="has-sub"
                                   >
                                  <a
                                    class="sidenav-item-link"
                                    href="javascript:void(0)"
                                    data-toggle="collapse"
                                    data-target="#authentication"
                                    aria-expanded="false"
                                    aria-controls="authentication"
                                  >
                                    <span class="nav-text">Authentication</span> <b class="caret"></b>
                                  </a>
                                  <ul

                                    
                                      class="collapse"
                                    
                                    id="authentication"
                                  >
                                    <div class="sub-menu">
                                      
                                        <li  
                                        >
                                          <a href="../../pages/authentication/sign-in.html">Sign In</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../pages/authentication/sign-up.html">Sign Up</a>
                                        </li>
                                      
                                    </div>
                                  </ul>
                                </li>
                            

                          

                            
                                <li
                                  
                                    class="has-sub"
                                   >
                                  <a
                                    class="sidenav-item-link"
                                    href="javascript:void(0)"
                                    data-toggle="collapse"
                                    data-target="#others"
                                    aria-expanded="false"
                                    aria-controls="others"
                                  >
                                    <span class="nav-text">Others</span> <b class="caret"></b>
                                  </a>
                                  <ul

                                    
                                      class="collapse"
                                    
                                    id="others"
                                  >
                                    <div class="sub-menu">
                                      
                                        <li  
                                        >
                                          <a href="../../pages/others/invoice.html">invoice</a>
                                        </li>
                                      
                                        <li  
                                        >
                                          <a href="../../pages/others/error.html">Error</a>
                                        </li>
                                      
                                    </div>
                                  </ul>
                                </li>
                            

                          
                        </div>
                      </ul>
                  </li>
                
              </ul>

            </div>

            <hr class="separator" />

            <div class="sidebar-footer">
              <div class="sidebar-footer-content">
                <h6 class="text-uppercase">
                  Cpu Uses <span class="float-right">40%</span>
                </h6>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar active"
                    style="width: 40%;"
                    role="progressbar"
                  ></div>
                </div>
                <h6 class="text-uppercase">
                  Memory Uses <span class="float-right">65%</span>
                </h6>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar progress-bar-warning"
                    style="width: 65%;"
                    role="progressbar"
                  ></div>
                </div>
              </div>
            </div>
          </div>
        </aside>


      <div class="page-wrapper">
                  <!-- Header -->
          <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <!-- search form -->
              <form action="#" method="get" class="search-form hidden-xs">
                <div class="input-group">
                  <button
                    type="submit"
                    name="search"
                    id="search-btn"
                    class="btn btn-flat"
                  >
                    <i class="mdi mdi-magnify"></i>
                  </button>
                  <input
                    type="text"
                    name="query"
                    class="form-control"
                    placeholder="Search & Enter......"
                    autofocus
                  />
                </div>
              </form>

              <div class="navbar-right ">
                <ul class="nav navbar-nav">
                  <!-- Notifications -->
                  <li class="dropdown notifications-menu">
                    <button class="dropdown-toggle" data-toggle="dropdown">
                      <i class="mdi mdi-bell-outline"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li class="dropdown-header">You have 5 notifications</li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-account-plus"></i> New user registered
                          <span class=" font-size-12 d-inline-block float-right"
                            ><i class="mdi mdi-clock-outline"></i> 10 AM</span
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-account-remove"></i> User deleted
                          <span class=" font-size-12 d-inline-block float-right"
                            ><i class="mdi mdi-clock-outline"></i> 07 AM</span
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                          <span class=" font-size-12 d-inline-block float-right"
                            ><i class="mdi mdi-clock-outline"></i> 12 PM</span
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-account-supervisor"></i> New client
                          <span class=" font-size-12 d-inline-block float-right"
                            ><i class="mdi mdi-clock-outline"></i> 10 AM</span
                          >
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="mdi mdi-server-network-off"></i> Server overloaded
                          <span class=" font-size-12 d-inline-block float-right"
                            ><i class="mdi mdi-clock-outline"></i> 05 AM</span
                          >
                        </a>
                      </li>
                      <li class="dropdown-footer">
                        <a class="text-center" href="#"> View All </a>
                      </li>
                    </ul>
                  </li>
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button
                      href="#"
                      class="dropdown-toggle nav-link"
                      data-toggle="dropdown"
                    >
                      <img
                        src="../../assets/img/user/user.png"
                        class="user-image"
                        alt="User Image"
                      />
                      <span class="d-none d-lg-inline-block">Abdus Salam</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <!-- User image -->
                      <li class="dropdown-header">
                        <img
                          src="../../assets/img/user/user.png"
                          class="img-circle"
                          alt="User Image"
                        />
                        <div class="d-inline-block">
                          Abdus Salam <small class="pt-1">abdus@gmail.com</small>
                        </div>
                      </li>

                      <li>
                        <a href="profile.html">
                          <i class="mdi mdi-account"></i> My Profil
                        </a>
                      </li>
                      <li>
                        <a href="email-inbox.html">
                          <i class="mdi mdi-email"></i> Message
                        </a>
                      </li>
                      <li>
                        <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                      </li>
                      <li>
                        <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
                      </li>

                      <li class="dropdown-footer">
                        <a href="signin.html"> <i class="mdi mdi-logout"></i> Log Out </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>
          </header>


        <div class="content-wrapper">
          <div class="content">							<div class="row">
								<div class="col-lg-12">
									<div class="card card-default mb-4 mt-3 mt-md-0 bg-white">
										<div class="card-header d-flex flex-wrap justify-content-between bg-white border-bottom-0 pb-xl-0 pt-5">
											<h2>Sidebar Minimized </h2>
										</div>
										<div class="card-body">
											<blockquote class="blockquote">
												<p class="mb-0">Add class
													<code>sidebar-static sidebar-minified</code> or
													<code>sidebar-fixed sidebar-minified</code> to
													<code>&lt;body id="body"&gt;</code> like below.</p>
											</blockquote>
											<pre class="mt-4"><code>&lt;body id="body" class="sidebar-static sidebar-minified"&gt;</code></pre>
											<blockquote class="blockquote">
												<p class="mb-0">or</p>
											</blockquote>
											<pre class="mt-4"><code>&lt;body id="body" class="sidebar-fixed sidebar-minified"&gt;</code></pre>
										</div>
									</div>
								</div>
							</div>
</div>

                      <!--
              ====================================
              ——— RIGHT SIDEBAR
              =====================================
            -->

            <div class="right-sidebar">
              <div class="btn-right-sidebar-toggler">
                <i class="mdi mdi-chevron-left"></i>
              </div>
              <!-- Nav Right -->
              <div class="right-nav-container">
                <ul class="nav nav-right-sidebar">
                  <li class="nav-item">
                    <a
                      class="nav-link text-danger icon-sm"
                      data-toggle="tab"
                      href="#find-replace"
                      role="tab"
                      aria-controls="nav-home"
                      aria-selected="true"
                    >
                      <i class="mdi mdi-note-plus-outline"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link text-primary icon-sm"
                      data-toggle="tab"
                      href="#launch"
                      role="tab"
                      aria-controls="nav-profile"
                      aria-selected="false"
                    >
                      <i class="mdi mdi-launch"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link text-purple icon-sm"
                      data-toggle="tab"
                      href="#question-answer"
                      role="tab"
                      aria-controls="nav-contact"
                      aria-selected="false"
                    >
                      <i class="mdi mdi-qrcode-edit"></i>
                    </a>
                  </li>
                </ul>
              </div>

              <!-- Nav Right Sidebar Tab Content -->
              <div class="right-sidebar-tab">
                <div class="tab-content" id="nav-tabContent">
                  <div
                    class="tab-pane"
                    id="find-replace"
                    role="tabpanel"
                    aria-labelledby="nav-profile-tab"
                  >
                    <div class="card card-right-sidebar">
                      <div class="card-header">
                        <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="card-title">New Report</h5>
                      </div>
                      <div class="card-body">
                        <form action="#">
                          <div class="form-group">
                            <label for="exampleInputEmail13">Email address</label>
                            <input
                              type="email"
                              class="form-control"
                              id="exampleInputEmail13"
                              aria-describedby="emailHelp"
                              placeholder="Enter email"
                            />
                            <small id="emailHelp" class="form-text text-muted"
                              >We'll never share your email with anyone else.</small
                            >
                          </div>
                          <div class="form-group">
                            <label for="categorySelect">Category</label>
                            <select class="form-control" id="categorySelect">
                              <option>Finance</option>
                              <option>Sales</option>
                              <option>System</option>
                              <option>Customers</option>
                              <option>Orders</option>
                            </select>
                          </div>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" placeholder="Units" />
                          </div>

                          <div class="form-group">
                            <label>filter:</label>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="pending"
                              />
                              <label class="custom-control-label" for="pending"
                                >Pending transations</label
                              >
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="marginss2"
                              />
                              <label class="custom-control-label" for="marginss2"
                                >Include margins</label
                              >
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="balance"
                              />
                              <label class="custom-control-label" for="balance"
                                >Include balance</label
                              >
                            </div>
                          </div>
                          <button class="btn btn-primary">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div
                    class="tab-pane"
                    id="launch"
                    role="tabpanel"
                    aria-labelledby="nav-contact-tab"
                  >
                    <div class="card card-right-sidebar">
                      <div class="card-header">
                        <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="card-title">Notification</h5>
                      </div>
                      <div class="card-body px-0">
                        <ul class="notifications-list">
                          <li>
                            <a href="#">
                              <i class="mdi mdi-account-plus"></i> New user registered
                              <span class=" font-size-12 d-inline-block float-right"
                                ><i class="mdi mdi-clock-outline"></i> 10 AM</span
                              >
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="mdi mdi-account-remove"></i> User deleted
                              <span class=" font-size-12 d-inline-block float-right"
                                ><i class="mdi mdi-clock-outline"></i> 07 AM</span
                              >
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                              <span class=" font-size-12 d-inline-block float-right"
                                ><i class="mdi mdi-clock-outline"></i> 12 PM</span
                              >
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="mdi mdi-account-supervisor"></i> New client
                              <span class=" font-size-12 d-inline-block float-right"
                                ><i class="mdi mdi-clock-outline"></i> 10 AM</span
                              >
                            </a>
                          </li>
                          <li>
                            <a href="#">
                              <i class="mdi mdi-server-network-off"></i> Server overloaded
                              <span class=" font-size-12 d-inline-block float-right"
                                ><i class="mdi mdi-clock-outline"></i> 05 AM</span
                              >
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <div
                    class="tab-pane"
                    id="question-answer"
                    role="tabpanel2"
                    aria-labelledby="nav-contact-tab"
                  >
                    <div class="card card-right-sidebar">
                      <div class="card-header">
                        <button type="button" class="close" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="card-title">Event Create</h5>
                      </div>

                      <div class="card-body">
                        <form action="#">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input
                              type="email"
                              class="form-control"
                              id="exampleInputEmail1"
                              aria-describedby="emailHelp"
                              placeholder="Enter email"
                            />
                            <small id="emailHelp" class="form-text text-muted"
                              >Please enter your email address.</small
                            >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail15">Location:</label>
                            <input
                              type="email"
                              class="form-control"
                              id="exampleInputEmail15"
                              aria-describedby="emailHelp"
                              placeholder="Enter Location"
                            />
                            <small id="emailHelp" class="form-text text-muted"
                              >please enter your location.</small
                            >
                          </div>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" placeholder="Units" />
                          </div>

                          <div class="form-group">
                            <label>filter:</label>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="pending1"
                              />
                              <label class="custom-control-label" for="pending1"
                                >Pending transations</label
                              >
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="marginss"
                              />
                              <label class="custom-control-label" for="marginss"
                                >Include margins</label
                              >
                            </div>
                            <div class="custom-control custom-checkbox mb-2">
                              <input
                                type="checkbox"
                                class="custom-control-input"
                                id="balance2"
                              />
                              <label class="custom-control-label" for="balance2"
                                >Include balance</label
                              >
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>

                  <footer class="footer mt-auto">
            <div class="copyright bg-white">
              <p>
                &copy; 2018 Copyright Sleek Dashboard Bootstrap Template by
                <a
                  class="text-primary"
                  href="../../../www.iamabdus.com/index.html"
                  target="_blank"
                  >Abdus</a
                >.
              </p>
            </div>
          </footer>
                  
      </div>
    </div>

    
<script src="{{asset('maps.googleapis.com/maps/api/js2ecd?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM')}}" defer></script>
<script src="{{asset('sleeze/assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('sleeze/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('sleeze/assets/plugins/toaster/toastr.min.js')}}../../"></script>
<script src="{{asset('sleeze/assets/plugins/slimscrollbar/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('sleeze/assets/plugins/charts/Chart.min.js')}}"></script>
<script src="{{asset('sleeze/assets/plugins/ladda/spin.min.js')}}"></script>
<script src="{{asset('sleeze/assets/plugins/ladda/ladda.min.js')}}"></script>
<script src="{{asset('sleeze/assets/plugins/jquery-mask-input/jquery.mask.min.js')}}"></script>
<script src="{{asset('sleeze/assets/plugins/select2/js/select2.min.js')}}../../"></script>
<script src="{{asset('sleeze/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
<script src="{{asset('sleeze/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
<script src="{{asset('sleeze/assets/plugins/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('sleeze/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('sleeze/assets/js/sleek.js')}}"></script>
<script src="{{asset('sleeze/assets/js/chart.js')}}"></script>
<script src="{{asset('sleeze/assets/js/date-range.js')}}"></script>
<script src="{{asset('sleeze/assets/js/map.js')}}"></script>
<script src="{{asset('sleeze/assets/js/custom.js')}}"></script>


  </body>

<!-- Mirrored from sleek.tafcoder.com/layouts/sidebar-navs/sidebar-minimized.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Dec 2018 12:47:02 GMT -->
</html>
