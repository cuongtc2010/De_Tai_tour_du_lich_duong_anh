<!DOCTYPE html>
<?php
if (isset($_SESSION["user_info_admin"])) {
    if (isset($_SESSION["user_info_admin"]["chucvuid"])) {
        if ($_SESSION["user_info_admin"]["chucvuid"] == 5) {
            
            UtilityController::gotoPage("tour/index.php");
        }
    }
}
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
        <title>Tour Du Lịch Dương Anh</title>

        <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/lib/chartist/chartist.min.css" rel="stylesheet">
        <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/helper.css" rel="stylesheet">
        <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/style.css" rel="stylesheet">
        <script src="<?php echo TEMPLATE_ADMIN_URL ?>/js/jquery.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL ?>/js/jquery.ThreeDots.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL ?>/js/lib/form-validation/jquery.validate.min.js"></script>
        
        

        <![endif]-->
    </head>

    <body class="fix-header fix-sidebar">
        <!-- Preloader - style you can find in spinners.css -->
<!--                <div class="preloader">
                    <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
                </div>-->

        <!-- Main wrapper  -->
        <div id="main-wrapper">
            <?php
            require_once TEMPLATE_DIRECTORY . DS . "menu.php";
            ?>
            <!-- Page wrapper  -->
            <div class="page-wrapper">

                <!-- Container fluid  -->

                <div class="container-fluid">
                    <section id="content">
                        <div class="container container-alt">
                            <?php
                            require_once ADMIN_CONTROLLER_DIRECTORY . DS . "Router.php";
                            ?>
                        </div>
                    </section>

                </div>

            </div>
            <!-- End Page wrapper  -->
        </div>
        <!-- End Wrapper -->
        <!-- All Jquery -->
        <!-- Form validation -->
        

        <!-- Bootstrap tether Core JavaScript -->
        
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/jquery.slimscroll.js"></script>
        <!--Menu sidebar -->
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/sidebarmenu.js"></script>
        <!--stickey kit -->
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/chart-js/Chart.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/chart-js/Chart.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/datamap/d3.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/datamap/topojson.js"></script>

        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/weather/jquery.simpleWeather.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/weather/weather-init.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/owl-carousel/owl.carousel-init.js"></script>


        <!--Custom JavaScript -->
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/custom.min.js"></script>
        <script src="<?php echo ROOT_ADMIN_URL; ?>/plugin/ckeditor/ckeditor.js"></script>


        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/datatables/datatables.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lib/datatables/datatables-init.js"></script>
        <script src="<?php echo TEMPLATE_ADMIN_URL ?>/js/Utility.js"></script>
    </body>

</html>