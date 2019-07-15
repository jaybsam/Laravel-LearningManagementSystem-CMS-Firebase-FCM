@if(session()->has('email'))
<!DOCTYPE html>
<html style="background: none;">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>だｓｈぼあｒｄ</title>
      <!-- Fontawsome CSS -->
      <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css"
      rel="stylesheet">
      <!-- UIkit CSS -->
      <link rel="stylesheet" href="{{ asset('css/uikit.min.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{ asset('css/admin-dashboard/admin-dash.css') }}">
      <link rel="stylesheet" href="{{asset('js/datatables/datatables.min.css')}}"/>
      <!-- UIkit JS -->
      <script src="{{ asset('js/uikit.min.js')}}"></script>
      <script src="{{ asset('js/uikit-icons.min.js')}}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="{{asset('js/datatables/datatables.min.js')}}"></script>
      <script>
         $(document).ready( function () {
           $('#tableExample2').DataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 uk-text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            buttons: [
                {extend: 'copy',className: 'uk-button uk-button-default uk-margin-small-right'},
                {extend: 'csv',title: 'Users_File', className: 'uk-button uk-button-default uk-margin-small-right'},
                {extend: 'pdf', title: 'Users_File', className: 'uk-button uk-button-default uk-margin-small-right'},
                {extend: 'print',className: 'uk-button uk-button-default'}
            ]
        });
         } );
      </script>
      <script src="{{asset('js/script.js')}}"></script>
   <body>
      <div class="loader"></div>
      <aside class="vertical-sidenav">
         <div class="uk-card uk-card-body uk-secondary vertical-sidenav-content uk-light" uk-scrollspy="cls: uk-animation-scale-up; target: > ul > li; delay: 500;">
            <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
               <a class="uk-navbar-item uk-logo dashboard-logo" href="#">Logo</a>
               <li class="uk-margin-medium-top active"><a href="/admin"><span class="mdi mdi-chart-bar uk-margin-small-right dash-icon"></span>
                  </a>
               </li>
               <li><a href="#"><span class="mdi mdi-library-books uk-margin-small-right dash-icon"></span></a></li>
               <li><a href="notification"><span class="mdi mdi-timetable uk-margin-small-right dash-icon"></span></a></li>
               <li><a href="#modal-example" uk-toggle><span class="fa fa-pie-chart uk-margin-small-right dash-icon"></span></a></li>
               <li class="uk-nav-divider"></li>
            </ul>
         </div>
      </aside>
      <div id="modal-example" uk-modal>
         <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Theme</h2>
            <div uk-grid>
               <form action="theme" method="post">
                  @csrf
                  <div><input type="submit" class="hot-theme" name="hot" value="1"></div>
                  <div><input type="submit" class="cold-theme" name="cold" value="1"></div>
               </form>
            </div>
            <p class="uk-text-right">
               <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
               <button class="uk-button uk-button-primary" type="button">Save</button>
            </p>
         </div>
      </div>
      <div uk-grid>
         <div class="uk-width-1-6@m vertical-spacing">
            <!-- Sidebar -->
            <!-- Sidenav -->
         </div>
         <div class="uk-width-expand@m vertical-dashboard-content">
            <!-- Dashboard-content -->
            <div class="dashboard-content">
              <!-- navbar fixed top -->
              <nav class="uk-navbar-container dashboard-width-100 uk-light" uk-navbar style="border-bottom:1px solid #8080803b;">
                     <div class="uk-navbar-left" style="padding:15px;">
                        <ul class="uk-navbar-nav">
                           <li>
                              <ul class="uk-breadcrumb">
                                 <li><a class="uk-text-primary" href="admin-dashboard.html">Dashboard</a></li>
                                 <li><span>Users</span></li>
                              </ul>
                           </li>
                        </ul>
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
                              <a href="#" class="uk-icon cold" uk-icon="icon: mail;"  uk-tooltip="title: Message; delay: 700; pos: bottom"></a>
                           </li>
                        </ul>
                     </div>
                  </nav>
               <!-- Dashboard inner content -->
               <section class="uk-section" style="position: relative; top:10px;">
                <div class="uk-card uk-card-default uk-card-body uk-width-1-6@s" style="position: fixed; right:0; height:100%; width:5%; border:1px solid #e5e9f2 !important">
                            <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
                                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Item</a></li>
                                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
                            </ul>
                    </div>
                  <div class="uk-text-center" style="border:1px solid #222;" uk-grid>
                      <div class="uk-width-1-3@m">
                          <div class="uk-card uk-card-default uk-card-body">Auto</div>
                      </div>
                      <div class="uk-width-expand@m">
                          <div class="uk-card uk-card-default uk-card-body">Expand</div>
                      </div>
                      <div class="uk-width-1-6@m"  style="border:1px solid #222;">
                          
                      </div>
                   </div>
               </section>
            </div>
            
         </div>
      </div>
   </body>
</html>
@else
<script>window.location = "/admin/login";</script>
@endif