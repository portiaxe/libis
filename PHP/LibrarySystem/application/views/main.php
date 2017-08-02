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
			<ui-view></ui-view>
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
    <script src="<?php echo base_url()?>ng/controllers/LoginController.js"></script>
    <script src="<?php echo base_url()?>ng/services/LoginService.js"></script>

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

    <script src="<?php echo base_url()?>ng/controllers/ProfileController.js"></script>
    <script src="<?php echo base_url()?>ng/services/ProfileService.js"></script>



  </body>
</html>
