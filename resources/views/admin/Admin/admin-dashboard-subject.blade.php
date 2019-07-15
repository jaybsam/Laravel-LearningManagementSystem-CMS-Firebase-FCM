<!DOCTYPE html>
<html style="background: none;">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>だｓｈぼあｒｄ</title>
      <!-- Fontawsome CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
      <!-- UIkit CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.16/css/uikit.min.css" />
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- UIkit JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.16/js/uikit.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.16/js/uikit-icons.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="js/script.js"></script>
   </head>
   <body style="background:#fff;">
      <div class="uk-offcanvas-content">
         <header  uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
            <nav class="uk-navbar-container dashboard-navbar uk-position-fixed-top uk-secondary" uk-navbar>
               <div class="uk-navbar-left">
                  <a class="uk-navbar-item uk-logo" href="#">Logo</a>
                  <div class="uk-navbar-item">
                  </div>
               </div>
               <div class="uk-navbar-center dashboard-navbar-center">
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
                        <a href="#" type="button" class="uk-icon" uk-icon="icon: grid;"  uk-tooltip="title: Wekonek apps; delay: 700; pos: bottom"></a>
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
                        <a href="#" class="uk-icon" uk-icon="icon: bell;"  uk-tooltip="title: Notifications; delay: 700; pos: bottom"></a>
                     </li>
                     <li>
                        <a href="#" type="button" uk-tooltip="title: Profile; delay: 700; pos: bottom">
                        <img class="dashboard-profile uk-border-circle uk-margin-small-right" src="images/avatar.jpg">
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
         <div class="uk-card uk-card-default uk-card-body uk-secondary dashboard-sidenav" style="position: fixed; z-index: 1000;" >
            <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
               <li class="uk-nav-header">General</li>
               <li><a href="admin-dashboard.html">Dashboard</a></li>
               <li><a href="#">Message</a></li>
               <li><a href="notification">Notification</a></li>
               <li><a href="#">Settings</a></li>
               <li class="uk-nav-header">Getting Started</li>
               <li><a href="admin-dashboard-users.html">Users</a></li>
               <li><a href="admin-dashboard-students.html">Students</a></li>
               <li class="uk-active"><a href="admin-dashboard-teachers.html">Teachers</a></li>
               <li><a href="admin-dashboard-parents.html">Parents</a></li>
               <li><a href="#">Library</a></li>
               <li><a href="#">Account</a></li>
               <li><a href="#">Class</a></li>
               <li><a href="#">Subject</a></li>
               <li><a href="#">Attendance</a></li>
               <li><a href="#">Exam</a></li>
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
               <li class="uk-nav-header">Header</li>
               <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Item</a></li>
               <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item</a></li>
               <li class="uk-nav-divider"></li>
               <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
            </ul>
         </div>
         <div class="uk-card uk-card-default uk-card-body uk-secondary dashboard-sidenav" style="opacity: 0;">
            <ul class="uk-nav-default uk-nav-parent-icon" uk-nav uk-switcher="connect: #component-nav; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
               <li class="uk-nav-header">General</li>
               <li class="uk-active"><a href="index.html">Dashboard</a></li>
               <li class="uk-active" id="#student"><a href="#">Message</a></li>
               <li class="uk-active"><a href="notification">Notification</a></li>
               <li class="uk-active"><a href="#">Settings</a></li>
               <li class="uk-nav-header">Getting Started</li>
               <li class="uk-active"><a href="students.html">Students</a></li>
               <li class="uk-active"><a href="#">Teachers</a></li>
               <li class="uk-active"><a href="#">Parents</a></li>
               <li class="uk-active"><a href="#">Library</a></li>
               <li class="uk-active"><a href="#">Account</a></li>
               <li class="uk-active"><a href="#">Class</a></li>
               <li class="uk-active"><a href="#">Subject</a></li>
               <li class="uk-active"><a href="#">Attendance</a></li>
               <li class="uk-active"><a href="#">Exam</a></li>
               <li class="uk-nav-header">Components</li>
               <li class="uk-active"><a href="#">Map</a></li>
               <li class="uk-active"><a href="#">Reports</a></li>
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
               <li class="uk-nav-header">Header</li>
               <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Item</a></li>
               <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item</a></li>
               <li class="uk-nav-divider"></li>
               <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
            </ul>
         </div>
            <!-- Dashboard inner content -->
                  <div class="dashboard-inner" style="background: #fff;" uk-grid  uk-scrollspy="cls: uk-animation-slide-left; target: > .dashboard-content-header > .uk-breadcrumb > li, .dashboard-content-header > h3, .dashboard-width-100 > .dashboard-float-right > .uk-button, .uk-overflow-auto > .uk-table > thead > tr > th, .uk-overflow-auto > .uk-table > tbody > tr > td; delay: 100">

                     <!-- end of grid 3 -->
                     <!-- start of grid 2 -->
                     <div class="dashboard-content-header">
                     	<ul class="uk-breadcrumb">
						    <li><a class="uk-text-primary" href="admin-dashboard.html">Dashboard</a></li>
						    <li><a class="uk-text-primary" href="admin-dashboard-users.html">Users</a></li>
						    <li><span>Teachers</span></li>
						</ul>
                     	<h3><span class="uk-icon uk-margin-small-right" uk-icon="icon: list;"></span>Teachers List</h3>
                     </div>
                     <div class="dashboard-width-100">

    					<div class="dashboard-float-right">
                     		<button class="uk-button uk-button-primary uk-margin-small-right dashboard-icon-button" type="button" uk-toggle="target: #add-modal"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: plus;"></span></button>
                     		<button class="uk-button dashboard-danger dashboard-light dashboard-icon-button"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: trash;"></span></button>
                     		</div>
                     	</div>
                     <div class="uk-overflow-auto dashboard-width-100 dashboard-margin-0">
    <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
        <thead>
            <tr>
                <th class="uk-table-shrink"><input class="uk-checkbox" id="dashboard-checkbox" type="checkbox"></th>
                <th class="uk-table-shrink">Profile</th>
                <th class="uk-table-expand">Users</th>
                <th class="uk-table-expand">Status</th>
                <th class="uk-width-small">Date Added</th>
                <th class="uk-table-shrink uk-text-nowrap">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input class="uk-checkbox" type="checkbox"></td>
                <td><img class="uk-preserve-width uk-border-circle" src="images/avatar.jpg" width="40" alt=""></td>
                <td class="uk-table-link">
                    <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a>
                </td>
                <td><span>Offline</span></td>
                <td class="uk-text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</td>
                <td class="uk-text-nowrap"><button class="uk-button uk-button-primary dashboard-icon-button"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: pencil;"></span></button></td>
            </tr>
            <tr>
                <td><input class="uk-checkbox" type="checkbox"></td>
                <td><img class="uk-preserve-width uk-border-circle" src="images/avatar.jpg" width="40" alt=""></td>
                <td class="uk-table-link">
                    <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a>
                </td>
                <td><span>Offline</span></td>
                <td class="uk-text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</td>
                <td class="uk-text-nowrap"><button class="uk-button uk-button-primary dashboard-icon-button"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: pencil;"></span></button></td>
            </tr>
            <tr>
                <td><input class="uk-checkbox" type="checkbox"></td>
                <td><img class="uk-preserve-width uk-border-circle" src="images/avatar.jpg" width="40" alt=""></td>
                <td class="uk-table-link">
                    <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a>
                </td>
                <td><span>Offline</span></td>
                <td class="uk-text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</td>
                <td class="uk-text-nowrap"><button class="uk-button uk-button-primary dashboard-icon-button"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: pencil;"></span></button></td>
            </tr>
            <tr>
                <td><input class="uk-checkbox" type="checkbox"></td>
                <td><img class="uk-preserve-width uk-border-circle" src="images/avatar.jpg" width="40" alt=""></td>
                <td class="uk-table-link">
                    <a class="uk-link-reset" href="">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a>
                </td>
                <td><span>Offline</span></td>
                <td class="uk-text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</td>
                <td class="uk-text-nowrap"><button class="uk-button uk-button-primary dashboard-icon-button"><span class="uk-icon dashboard-custom-icon" uk-icon="icon: pencil;"></span></button></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="dashboard-pagination" uk-scrollspy="cls: uk-animation-slide-bottom; target: > ul; delay: 700;">
	<ul class="uk-pagination" uk-margin>
    <li><a href="#"><span uk-pagination-previous></span></a></li>
    <li><a href="#">1</a></li>
    <li class="uk-disabled"><span>...</span></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">6</a></li>
    <li class="uk-active"><span>7</span></li>
    <li><a href="#">8</a></li>
    <li><a href="#">9</a></li>
    <li><a href="#">10</a></li>
    <li class="uk-disabled"><span>...</span></li>
    <li><a href="#">20</a></li>
    <li><a href="#"><span uk-pagination-next></span></a></li>
</ul>
</div>
                  </div>

        <ul id="component-nav" class="uk-switcher">
               <li>
               </li>
            </ul>
         </div>
         <!-- Message button -->
         <div uk-scrollspy="cls: uk-animation-slide-bottom; target: > a; delay: 900;">
         <a href="#" class="uk-position-fixed uk-position-bottom-right uk-margin-small-bottom uk-margin-small-right uk-button-primary dashboard-messenger messenger-hide" uk-tooltip="title: Messenger; delay: 700; pos: left">
            <div class="dashboard-messenger-ring">
               <span>Question? Send us a message.</span>
            </div>
         </a>
         <a href="#" class="uk-position-fixed uk-position-bottom-right uk-margin-small-bottom uk-margin-small-right uk-button-primary dashboard-messenger messenger-show" uk-tooltip="title: Messenger; delay: 700; pos: left">
            <div class="dashboard-messenger-ring">
               <span class="uk-icon" uk-icon="icon: comment;"></span>
            </div>
         </a>
         </div>
      </div>
      <!-- Mobile responsive sidebar push -->
      <div id="offcanvas-push" uk-offcanvas="mode: push; overlay: true">
      <div class="uk-offcanvas-bar">
         <button class="uk-offcanvas-close" type="button" uk-close></button>
         <div class="uk-nav">
            <div class="uk-panel">
               <ul class="uk-nav uk-nav-default" uk-switcher="connect: #component-nav; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                  <li class="uk-nav-header">General</li>
                  <li><a href="../index">Dashboard</a></li>
                  <li><a href="../pro">Messages</a></li>
                  <li><a href="../changelog">Notification</a></li>
                  <li><a href="../download">Settings</a></li>
                  <li class="uk-nav-header">Getting started</li>
                  <li exact=""><a href="./introduction">Students</a></li>
                  <li exact=""><a href="./installation">Teachers</a></li>
                  <li exact=""><a href="./less">Parents</a></li>
                  <li exact=""><a href="./sass">Library</a></li>
                  <li exact=""><a href="./javascript">Account</a></li>
                  <li exact=""><a href="./webpack">Class</a></li>
                  <li exact=""><a href="./custom-icons">Subject</a></li>
                  <li exact=""><a href="./avoiding-conflicts">Attendance</a></li>
                  <li exact=""><a href="./rtl">Exam</a></li>
                  <li class="uk-nav-header">Components</li>
                  <li exact=""><a href="./accordion">Map</a></li>
                  <li exact=""><a href="./alert">Report</a></li>
                  <li exact=""><a href="./alert">Settings</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Add Modal -->

<!-- This is the modal -->
<div id="add-modal" uk-modal>
    <div class="uk-modal-dialog uk-modal-body dashboard-modal-dialog dashboard-radius-10">
    	<div class="uk-modal-header">
    		<h3 class="uk-modal-title uk-text-primary">New Teacher</h3>
    	</div>
        
        <div class="uk-modal-body">
            <form action="#">
            	<div class="uk-child-width-expand@s" uk-grid>
            		
            		<div>
            			<h5 class="uk-text-primary uk-heading-line"><span>Personal Information</span></h5>
            			<div id="image-holder"></div>
            			<input id="fileUpload" class="uk-input" multiple="multiple" type="file"/> 
            		<input class="uk-input uk-margin dashboard-radius-25" type="text" name="" placeholder="Firstname">
    
            		<input class="uk-input uk-margin dashboard-radius-25" type="text" name="" placeholder="Lastname">
        
            		<div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
            			<div style="margin:0 auto; width: 50%">
		            <label>Male<input class="uk-radio uk-margin-small-left" type="radio" name="radio2"></label>
		            <label>Female<input class="uk-radio uk-margin-small-left" type="radio" name="radio2"></label>
        			</div>
        			<div class="uk-margin">
            		<textarea class="uk-text-area dashboard-width-100 dashboard-radius-10" cols="80" rows="10" placeholder="Address"></textarea>
            		</div>
            		<input class="uk-input uk-margin dashboard-width-100 dashboard-radius-25" type="number" name="" placeholder="Contact">
            		</div>
            		</div>

            		
            		<div>
            			<h5 class="uk-text-primary uk-heading-line">User Account</h5>
            		<input class="uk-input uk-margin dashboard-radius-25"" type="text" name="" placeholder="Teacher ID" value="10255330909" disabled>
            	
            		<input class="uk-input uk-margin dashboard-radius-25" type="text" name="" placeholder="Username...">
            	
            		<input class="uk-input uk-margin dashboard-radius-25" type="text" name="" placeholder="Password...">
            	
            		</div>
            	</div>
            </form>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close dashboard-radius-10" type="button">Cancel</button>
            <a href="#modal-group-1" class="uk-button uk-button-primary dashboard-radius-10" uk-toggle>Add Teacher</a>
        </div>
    </div>
</div>
   </body>

</html>