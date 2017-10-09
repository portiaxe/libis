<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
    </title>
    <!-- Bootstrap Core CSS -->
   <link rel="stylesheet/less" type="text/css" href="<?php echo base_url()?>bower_components/bootstrap/less/bootstrap.less"/>
   <script type="text/javascript" src="<?php echo base_url()?>bower_components/less/dist/less.js"></script>

   <!-- MetisMenu CSS -->
   <link href="<?php echo base_url()?>bower_components/metisMenu/dist/metisMenu.css" rel="stylesheet"/>

   <!-- Custom CSS -->
   <link href="<?php echo base_url()?>assets/styles/bootstrap-modal.min.css" rel="stylesheet"/>

   <link href="<?php echo base_url()?>assets/styles/sb-admin-2.min.css" rel="stylesheet"/>
   <link href="<?php echo base_url()?>assets/styles/angular-datepicker.css" rel="stylesheet"/>
   <link href="<?php echo base_url()?>assets/styles/jquery.gritter.min.css" rel="stylesheet"/>

   <!-- Morris Charts CSS -->
   <link href="<?php echo base_url()?>bower_components/morris.js/morris.css" rel="stylesheet"/>

   <!-- Custom Fonts -->
   <link href="<?php echo base_url()?>bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>



   <!-- Miscellaneous Plugins -->
   <link href="<?php echo base_url()?>bower_components/bootstrap-notify/css/bootstrap-notify.css" rel="stylesheet" type="text/css"/>
   <link href="<?php echo base_url()?>bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>

   <!-- Back custom styles -->
   <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500"/> -->
   <!-- <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css"/> -->
   <link href="<?php echo base_url()?>assets/styles/libraryportal.css" rel="stylesheet"/>


  </head>
  <body ng-app="LibraryPortalApp">
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#/home"><strong>Library</strong> System</a>
            </div>
            <!-- /.navbar-head er -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a ui-sref="home" ui-sref-active="active"><i class="fa fa-dashboard fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a ui-sref="books" ui-sref-active="active"><i class="fa fa-book fa-fw"></i> Books</a>
                        </li>
                        <li>
                            <a ui-sref="categories" ui-sref-active="active"><i class="fa fa-table fa-fw"></i> Categories</a>
                        </li>
                        <li>
                            <a ui-sref="inventories" ui-sref-active="active"><i class="fa fa-line-chart" aria-hidden="true"></i> Inventory</a>
                        </li>
                        <li>
                            <a ui-sref="borrower" ui-sref-active="active"><i class="fa fa-exchange" aria-hidden="true"></i> Borrower</a>
                        </li>
                        <li>
                            <a ui-sref="borrowlogs" ui-sref-active="active"><i class="fa fa-exchange" aria-hidden="true"></i> Borrow Logs</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		 <div id="page-wrapper">
            <div class="row">
			<ui-view></ui-view>
            <!-- /.row -->
			</div>
		</div>
        <!-- /#page-wrapper -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url()?>bower_components/jquery/dist/jquery.js"></script>

    <!-- Angular JS -->
    <script type="text/javascript" src="<?php echo base_url()?>bower_components/angular/angular.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>bower_components/angular-route/angular-route.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>bower_components/angular-ui-router/angular-ui-router.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url()?>bower_components/bootstrap/dist/js/bootstrap.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="<?php echo base_url()?>bower_components/metisMenu/dist/metisMenu.js"></script>

    <!-- Morris Charts JavaScript -->
    <!-- <script type="text/javascript" src="/bower_components/raphael/raphael.min.js"></script>
    <script type="text/javascript" src="/bower_components/morris.js/morris.js"></script>
    <script type="text/javascript" src="/data/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="<?php echo base_url()?>assets/scripts/sb-admin-2.js"></script>

    <!-- Miscellaneous Plugins -->
    <script type="text/javascript" src="<?php echo base_url()?>bower_components/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>bower_components/bootstrap-notify/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>bower_components/angular-animate/angular-animate.js"></script>



    <!--Angular app scripts  -->
    <script src="<?php echo base_url()?>ng/app.js"></script>
    <script src="<?php echo base_url()?>ng/controllers/HomeController.js"></script>
    <script src="<?php echo base_url()?>ng/services/HomeService.js"></script>

    <script src="<?php echo base_url()?>ng/controllers/BookController.js"></script>
    <script src="<?php echo base_url()?>ng/services/BookService.js"></script>

    <script src="<?php echo base_url()?>ng/controllers/CategoryController.js"></script>
    <script src="<?php echo base_url()?>ng/services/CategoryService.js"></script>

    <script src="<?php echo base_url()?>ng/controllers/InventoryController.js"></script>
    <script src="<?php echo base_url()?>ng/services/InventoryService.js"></script>

    <script src="<?php echo base_url()?>ng/controllers/BorrowerController.js"></script>
    <script src="<?php echo base_url()?>ng/services/BorrowerService.js"></script>

    <script src="<?php echo base_url()?>ng/controllers/BorrowLogController.js"></script>
    <script src="<?php echo base_url()?>ng/services/BorrowLogService.js"></script>



  </body>
</html>
