@if(session()->has('email'))
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
      <script type="text/javascript">
         $(document).ready(function(){
             $('span[id="show-nav"]').hide();
             $('.vertical-sidenav').hover(function(){
         
               $('span[id="show-nav"]').fadeIn();
               // $('.dashboard-icon-button').css({"display": "none"});
             }, function(){
               $('span[id="show-nav"]').hide();
               
               // setTimeout( function(){
               // $('.dashboard-icon-button').css({"display": "block"});
               //    },400);
             });
         
             $('.hot').click(function(){
               $('.vertical-sidenav').css({"background": "linear-gradient(to bottom, #e50f68, #f77a10e6)"});
               $('body').css({"background": "url('https://wallpapertag.com/wallpaper/full/c/c/b/143196-nature-background-hd-2304x1440-notebook.jpg')", "background-attachment": "fixed", "background-size": "cover"});
               $('.uk-navbar-container:not(.uk-navbar-transparent)').css({"background": "#5d515440", "box-shadow": "0 0 20px 0 #222"});
               $('.dashboard-unique-color').css({"background": "#e34635e8", "box-shadow": "0 0 20px 0 #222"});
               $('.dashboard-icon-button').css({"background": "linear-gradient(to right, #e5195f, #ff5135)"});
             });
             $('.cold').click(function(){
               $('.vertical-sidenav').css({"background": "linear-gradient(to bottom, #1f87f0, #3f0fff)"});
               $('body').css({"background": "url('http://1.bp.blogspot.com/-YpX1_pXkBCM/US5O6aPjGlI/AAAAAAAAT0c/yjygW2zepYs/s1600/Snow+Mountains+Wallpapers+2.jpg')", "background-attachment": "fixed", "background-size": "cover"});
               $('.uk-navbar-container:not(.uk-navbar-transparent)').css({"background": "#1f87f04a", "box-shadow": "0 0 20px 0 #222"});
               $('.dashboard-unique-color').css({"background": "#3c18fdd4", "box-shadow": "0 0 20px 0 #222"});
             });
         
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function(){
           var data = {
             "role": "Student",
             "age": "15",
             "email": "marie@yahoo.com",
             "firstname": "Marie",
             "lastname": "Sheena",
             "gender": "Female",
             "address": "Metro Clark Homes Rome.st block 22 lot 35-36",
             "contact": "09066805419",
             "username": "mariemarie22",
           }
           var data1 = {
             "role": "Student",
             "age": "16",
             "email": "tina@yahoo.com",
             "firstname": "Tina",
             "lastname": "Sprout",
             "gender": "Female",
             "address": "Newyork st. 211 block 5 gate",
             "contact": "0552244400",
             "username": "tinaspt",
           }
           var data2 = {
             "role": "Teacher",
             "age": "17",
             "email": "john@yahoo.com",
             "firstname": "John",
             "lastname": "Wick",
             "gender": "Male",
             "address": "Los Angeles 0418.st lot",
             "contact": "06331089900",
             "username": "john09",
           }
           var data3 = {
             "role": "Parent",
             "age": "18",
             "email": "smith@yahoo.com",
             "firstname": "Smith",
             "lastname": "Kayle",
             "gender": "Male",
             "address": "Evan Los grave block 233.st",
             "contact": "05324467888",
             "username": "smith011",
           }
           var data4 = {
             "role": "Parent",
             "age": "19",
             "email": "curry@yahoo.com",
             "firstname": "Curry",
             "lastname": "James",
             "gender": "Male",
             "address": "Evan tol house. road block 9044.st",
             "contact": "234566678881",
             "username": "jcurry11",
           }
           var data5 = {
             "role": "Student",
             "age": "15",
             "email": "lina@yahoo.com",
             "firstname": "Lina",
             "lastname": "Inverse",
             "gender": "Female",
             "address": "my newmonth st. block road 557.",
             "contact": "888333561457",
             "username": "linerie05",
           }
           var data6 = {
             "role": "Teacher",
             "age": "20",
             "email": "eric@yahoo.com",
             "firstname": "Eric",
             "lastname": "Richard",
             "gender": "Male",
             "address": "new haragana st. 2578",
             "contact": "23305555340",
             "username": "wizard12",
           }
           var unfill = {
             "age": "",
             "email": "",
             "firstname": "",
             "lastname": "",
             "gender": "",
             "address": "",
             "contact": "",
             "username": "",
           }
           var myArray = [
         data,
         data1,
         data2,
         data3,
         data4,
         data5,
         data6
         ];
         
         
           $("#fill").change(function(){
             if($('#fill option:selected').val() == 'fill'){
               var randomItem = myArray[Math.floor(Math.random()*myArray.length)];
               $('#auto').autofill( randomItem );
             }
             else{
               $('#auto').autofill( unfill );
             }
             
           });
           
         
         });
      </script>
      @if($theme !== null)
   <style type="text/css">
    /*  .vertical-sidenav{
      background: {{$theme['sidebarcolor']}} ;
      }*/
      body{
      background: {{$theme['background']}} ;
      background-attachment: fixed;
      background-size: cover;
      background-repeat:no-repeat;
      }
      .uk-navbar-container:not(.uk-navbar-transparent){
      background: {{$theme['navbarcolor']}};
      }
      .dashboard-unique-color{
      background: {{$theme['ucolor']}};
      }
      .dashboard-icon-button{
      background: {{$theme['button']}};
      }
      .dashboard-alert-success{
      background: {{$theme['alert']}};
      }
   </style>
   @endif
   </head>
   <body>
      <div class="loader"></div>
      <div class="vertical-sidenav">
         <div class="uk-card uk-card-body uk-secondary vertical-sidenav-content uk-light" uk-scrollspy="cls: uk-animation-scale-up; target: > ul > li; delay: 500;">
            <ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
               <a class="uk-navbar-item uk-logo" href="#">Logo</a>
               <li><a href="/admin"><span class="uk-icon uk-margin-small-right" uk-icon="icon:home;"></span>
                  </a>
               </li>
               <li><a href="#"><span class="uk-icon uk-margin-small-right" uk-icon="icon:mail;"></span></a></li>
               <li><a href="notification"><span class="uk-icon uk-margin-small-right" uk-icon="icon:bell;"></span></a></li>
               <li><a href="#modal-example" uk-toggle><span class="uk-icon uk-margin-small-right" uk-icon="icon:cog;"></span></a></li>
               <li class="uk-nav-divider"></li>
            </ul>
         </div>
      </div>
      <button id="create" class="uk-button uk-button-primary dashboard-icon-button" uk-toggle="target: #add-modal"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: plus; ratio:2;"></span></button> 
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
               <!-- Dashboard inner content -->
               <div class="dashboard-inner" uk-grid uk-scrollspy="cls: uk-animation-scale-up; target: > .dashboard-margin-0 > .dashboard-unique-color, .dashboard-margin-0 > .dashboard-unique-color > table, .dashboard-unique-color > table > thead, .dashboard-unique-color > table > tbody, .dashboard-unique-color > table > thead > tr; delay: 400">
                  <!-- end of grid 3 -->
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
                           <li>
                              <span class="uk-badge dashboard-badge-online" style="z-index: 1000; top:20px; right:76px; position: absolute; background:red; height: 16px;">1</span>
                              <a href="#" class="uk-icon" uk-icon="icon: bell;" uk-tooltip="title: Notifications; delay: 700; pos: bottom"></a>
                              <div class="uk-navbar-dropdown" uk-dropdown="mode:click;" style="z-index: 999;">
                                 <div class="uk-nav-header dashboard-nav-header"><span class="dashboard-sign">Notifications</span></div>
                                 <ul class="uk-nav uk-navbar-dropdown-nav dashboard-dropdown-nav">
                                    <div class="uk-divider"></div>
                                    @foreach($mynotif as $notification)
                                    <li><a href="#"><strong>You</strong> Successfully Created <strong>{{$notification['firstname']}}...</strong></a></li>
                                    @endforeach
                                    <div class="uk-divider"></div>
                                    <li><a class="uk-text-center" href="#">View All</a></li>
                                 </ul>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </nav>
                  <!-- start of grid 2 -->
                  <!-- nav 2 -->
                  @if(session()->has('success'))
                  <div uk-scrollspy="cls: uk-animation-slide-top; target: > .uk-alert-success; delay: 200;">
                     <div class="uk-alert-success uk-width-1-2 dashboard-alert-success" uk-alert="animation: uk-animation-slide-bottom; duration:1000">
                        <a class="uk-alert-close" uk-close></a>
                        <p><strong><span class="fa fa-check-circle uk-margin-small-right dashboard-notif"></span>{{ session()->get('success') }}</strong></p>
                     </div>
                  </div>
                  @endif
                  <div class="dashboard-width-100 dashboard-padding-50 dashboard-margin-0">
                     <div class="uk-overflow-auto dashboard-padding-20 dashboard-unique-color uk-light">
                        <table id="tableExample2" class="table uk-table uk-table-small uk-table-hover uk-table-middle uk-table-divider uk-table-striped">
                           <thead>
                              <tr>
                                 <th class="uk-table-shrink">
                                    <input class="uk-checkbox" id="dashboard-checkbox" type="checkbox">
                                 </th>
                                 <th class="uk-table-shrink">Profile</th>
                                 <th class="uk-table-shrink">
                                    Firstname
                                 </th>
                                 <th class="uk-table-shrink">
                                    Lastname
                                 </th>
                                 <th class="uk-table-shrink">Password</th>
                                 <th class="uk-table-shrink">
                                    Role
                                 </th>
                                 <th class="uk-table-shrink">
                                    Status
                                 </th>
                                 <th class="uk-width-small">Date Added</th>
                                 <th class="uk-table-shrink uk-text-nowrap"></th>
                                 <th class="uk-table-shrink uk-text-nowrap">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <form action="multiDestroy" method="POST" uk-grid>
                                 @if($datas !== null)
                                 @foreach($realdata as $users)
                                 <tr>
                                    <td>
                                       <input class="uk-checkbox" type="checkbox" name="checkid" value="{{$users['id']}}">
                                    </td>
                                    <td><img class="uk-preserve-width uk-border-circle" src="{{asset($users['profile'])}}" width="40" alt=""></td>
                                    <td class="uk-table-link">
                                       <span class="uk-link-reset" href="">{{$users['firstname']}}</span>
                                    </td>
                                    <td class="uk-table-link">
                                       <span class="uk-link-reset" href="">{{$users['lastname']}}</span>
                                    </td>
                                    <td class="uk-table-link">
                                       <span class="uk-badge">Hidden</span>
                                    </td>
                                    <td class="uk-table-link">
                                       <span class="uk-link-reset" href="">
                                          {{$users['role']}}
                                       </span>
                                    </td>
                                    <td><span class="uk-badge">Offline</span></td>
                                    <td class="uk-text-truncate">{{$users['created_at']}}</td>
                                    <td class="uk-text-nowrap">
                                       <a  uk-tooltip="title:View;" class="uk-margin-small-right uk-button uk-border-rounded uk-button-primary" href="users/update/{{$users['id']}}"><span class="dashboard-custom-icon fa fa-eye" style="padding: 0px 5px;"></span></a>
                                       <a uk-tooltip="title:Edit;" class="uk-margin-small-right uk-button uk-border-rounded uk-button-primary" href="users/update/{{$users['id']}}"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: file-edit;"></span></a>
                                       <a  uk-tooltip="title:Delete;" uk-toggle="target: #delete-modal{{$users['id']}}" class="uk-button uk-border-rounded uk-button-danger"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: trash;"></span></a>
                                    </td>
                                    <td>
                                       <select class="uk-select">
                                          <option>Action</option>
                                          <option selected>Enable</option>
                                          <option>Disable</option>
                                       </select>
                                    </td>
                                 </tr>
                                 @endforeach
                                 @endif                          
                              </form>
                           </tbody>
                        </table>
                        @foreach($realdata as $modal)
                        <div id="delete-modal{{$modal['id']}}" uk-modal>
                                    <div class="uk-modal-dialog uk-modal-body">
                                       <h2 class="uk-modal-title uk-text-danger">Remove</h2>
                                       <p><span class="uk-icon uk-text-danger uk-margin-small-right" uk-icon="icon: trash;"></span>Are you sure want to remove {{$modal['role']}} <strong class="uk-text-danger">{{$modal['firstname']}}</strong>?</p>
                                       <p class="uk-text-right">
                                          <button class="uk-button uk-button-default uk-modal-close uk-margin-small-right" type="button">Cancel</button>
                                          <a href="/admin/destroy/{{$users['id']}}" class="uk-button uk-button-danger" type="submit" ><span class="uk-icon" uk-icon="icon:trash;"></span> Delete</a>
                                       </p>
                                    </div>
                                 </div>
                        @endforeach
                        <!-- <div class="dashboard-pagination" uk-scrollspy="cls: uk-animation-fade; target: .dashboard-pagination-body; delay:200;">
                           <div class="dashboard-pagination-body">
                                                                       @if ($items->lastPage() > 1)
                           <ul class="uk-pagination uk-flex-center" uk-margin>
                           <li class="{{ ($items->currentPage() == 1) ? ' disabled' : '' }}">
                           <a href="{{ $items->url(1) }}"><span uk-tooltip="title: Previous; delay: 100; pos: left" uk-pagination-previous></span></a>
                           </li>
                           @for ($i = 1; $i <= $items->lastPage(); $i++)
                           <li>
                           <a  class="{{ ($items->currentPage() == $i) ? 'dashboard-pagination-active uk-disabled' : '' }}" href="{{ $items->url($i) }}">{{ $i }}</a>
                           </li>
                           @endfor
                           <li class="{{ ($items->currentPage() == $items->lastPage()) ? ' disabled' : '' }}">
                           <a href="{{ $items->url($items->currentPage()+1) }}" ><span uk-tooltip="title: Next; delay: 100; pos: right" uk-pagination-next></span></a>
                           </li>
                           </ul>
                           @endif
                           </div>
                           </div> -->
                     </div>
                  </div>
               </div>
            </div>
            <div id="add-modal" uk-modal>
               <div class="uk-modal-dialog uk-modal-body dashboard-modal-dialog">
                  <form id="auto" action="store" method="POST">
                     @csrf
                     <div class="uk-modal-body">
                        <div uk-grid>
                           <div class="uk-width-1-6@m">
                              <h5 class="uk-text-primary uk-heading-line"><span>Settings</span></h5>
                              <div class="uk-margin">
                                 <label class="uk-form-label uk-margin-medium-bottom" for="form-stacked-text">Roles *</label>
                                 <select class="uk-select" name="role" required>
                                    <option>ROLE</option>
                                    <option value="Student">STUDENT</option>
                                    <option value="Teacher">TEACHER</option>
                                    <option value="Parent">PARENT</option>
                                 </select>
                              </div>
                              <div class="uk-margin">
                                 <label class="uk-form-label uk-margin-medium-bottom" for="form-stacked-text">Fill forms *</label>
                                 <select id="fill" class="uk-select">
                                    <option value="unfill">UNFILL</option>
                                    <option value="fill">AUTOFILL</option>
                                 </select>
                              </div>
                           </div>
                           <div class="uk-width-1-6@m">
                              <h5 class="uk-text-primary uk-heading-line"><span>Personal Information</span></h5>
                              <div id="image-holder"></div>
                              <label class="uk-form-label uk-margin-medium-bottom" for="form-stacked-text">Profile *</label>
                              <input id="fileUpload" class="uk-input" multiple="multiple" type="file" />
                              <label class="uk-form-label uk-margin-medium-bottom" for="form-stacked-text">Firstname *</label>
                              <input class="uk-input uk-margin" type="text" name="firstname" placeholder="Firstname" required>
                              <label class="uk-form-label uk-margin-medium-bottom" for="form-stacked-text">Lastname *</label>
                              <input class="uk-input uk-margin" type="text" name="lastname" placeholder="Lastname" required>
                              <label class="uk-form-label uk-margin-medium-bottom" for="form-stacked-text">Age *</label>
                              <input class="uk-input uk-margin" type="number" min="1" max="99" name="age" placeholder="Age" required>
                              <label class="uk-form-label uk-margin-medium-bottom" for="form-stacked-text">Gender *</label>
                              <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                 <div style="margin:0 auto; width: 50%">
                                    <label>Male
                                    <input class="uk-radio uk-margin-small-left" type="radio" name="gender" value="Male" required>
                                    </label>
                                    <label>Female
                                    <input class="uk-radio uk-margin-small-left" type="radio" name="gender" value="Female" required>
                                    </label>
                                 </div>
                                 <div class="uk-margin">
                                    <label class="uk-form-label uk-margin-medium-bottom" for="form-stacked-text">Address *</label>
                                    <textarea class="uk-text-area dashboard-width-100" cols="80" rows="10" name="address" placeholder="Address" required></textarea>
                                 </div>
                                 <label class="uk-form-label uk-margin-medium-bottom" for="form-stacked-text">Mobile *</label>
                                 <input class="uk-input uk-margin dashboard-width-100" type="number" name="contact" placeholder="Phone" required>
                              </div>
                           </div>
                           <div class="uk-width-expand@m">
                              <h5 class="uk-text-primary uk-heading-line">User Account</h5>
                              <input class="uk-input uk-margin" type="text" name="" placeholder="Teacher ID" value="{{$teacher['teacher_id']}}" disabled>
                              <input class="uk-input uk-margin" type="email" name="email" placeholder="Email..." required>
                              <input class="uk-input uk-margin5" type="password" name="password" placeholder="Password..." required>
                              <button class="uk-button uk-button-primary dashboard-radius-10 flash" type="submit"><span class="uk-icon uk-margin-small-right" uk-icon="icon: plus;"></span>Create Account</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
@else
<script>window.location = "/admin/login";</script>
@endif