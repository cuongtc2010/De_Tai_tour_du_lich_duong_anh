<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<?php
$chucnang = $controller;
if (isset($_GET["ctl"])) {
    $chucnang = $_GET["ctl"];
}
if (isset($_SESSION["user_info_admin"])) {
    if (isset($_SESSION["user_info_admin"]["chucvuid"])) {
        if ($_SESSION["user_info_admin"]["chucvuid"] == 1) {

            UtilityController::gotoPage("admin/index.php");
        }
    }
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tour</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo TEMPLATE_HOME_URL; ?>/css/font-awesome.min.css">
    <link href="<?php echo TEMPLATE_HOME_URL; ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_HOME_URL; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_HOME_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_HOME_URL; ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_HOME_URL; ?>/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_HOME_URL; ?>/css/style.css" rel="stylesheet">

    <script src="<?php echo TEMPLATE_HOME_URL; ?>/js/jquery.min.js"></script>
    <script src="<?php echo TEMPLATE_HOME_URL; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo TEMPLATE_HOME_URL; ?>/js/jquery.ThreeDots.js"></script>
    <script src="<?php echo TEMPLATE_HOME_URL; ?>/js/pace.min.js"></script>


    <!-- CSS -->
</head>
<body>
<!--    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>-->
    <nav class="navbar navbar-default navbar-expand-md" style="margin-bottom: 0px; border-radius: 0;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="<?= ROOT_URL ?>"><img src="<?php echo TEMPLATE_HOME_URL; ?>/images/logo.png" style="height: 50px; width: 100px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="<?php echo ROOT_URL; ?>">TRANG CHỦ</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= ROOT_URL ?>/index.php?ctl=GioiThieu">GIỚI THIỆU</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= ROOT_URL ?>/index.php?ctl=Dm_tour">TOUR</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?= ROOT_URL ?>/index.php?ctl=TinTuc">CẨM NANG DU LỊCH</a>
                    </li>

                    <li>
                        <a class="page-scroll" href="<?= ROOT_URL ?>/index.php?ctl=nhanvienhotro">NHÂN VIÊN HỖ TRỢ</a>
                    </li>

                    <?php
                    if (!isset($_SESSION["user_info_admin"])) {
                        ?>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#login-modal">Đăng nhập</a>
                        </li>
                        <li>
                            <a href="<?= ROOT_URL ?>/index.php?ctl=Signup">Đăng ký</a>
                        </li>
                        <?php
                    } else {
                        ?>
                        <li>
                            <a class="page-scroll" href="<?= ROOT_URL ?>/index.php?ctl=dattourtheoyeucau"> Yêu cầu tour</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chào, <?= $_SESSION["user_info_admin"]["username"] ?></a>
                            <ul class="navbar-default dropdown-menu">
                                <li><a href="<?= ROOT_URL ?>/index.php?ctl=LichSu">Lịch sử</a></li>
                                <li><a href="<?= ROOT_URL ?>/index.php?ctl=ThongTinCaNhan">Thông tin cá nhân</a></li>
                                <li><a href="<?= ROOT_URL ?>/index.php?ctl=Login&act=doLogout">Thoát</a></li>
                            </ul>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->


    </nav>

    <?php
    if ($chucnang == "Home" || ($chucnang == "Dm_tour" && !isset($_GET["act"]))) {
        $Slider = new SliderController();
        $Slider->index();
    }
    ?>

    <section class="light-bg">
        <div class="container">
            <?php
            require_once HOME_CONTROLLER_DIRECTORY . DS . "Router.php";
            ?>
        </div>
    </section>
    <?php
    $LoginController = new LoginController();
    $LoginController->index();
    ?>
    <?php
    $FooterController = new FooterController();
    $FooterController->index();
    ?>

    <!-- Javascript Libraries -->


    <script src="<?php echo TEMPLATE_HOME_URL; ?>/js/jquery.easing.min.js"></script>

    <script src="<?php echo TEMPLATE_HOME_URL; ?>/js/cbpAnimatedHeader.js"></script>
    <script src="<?php echo TEMPLATE_HOME_URL; ?>/js/jquery.appear.js"></script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async='async'></script>
    <script>
        $(function () {
            $(".dropdown").hover(
                    function () {
                        $('.dropdown-menu', this).stop(true, true).fadeIn("fast");
                        $(this).toggleClass('open');
                        $('b', this).toggleClass("caret caret-up");
                    },
                    function () {
                        $('.dropdown-menu', this).stop(true, true).fadeOut("fast");
                        $(this).toggleClass('open');
                        $('b', this).toggleClass("caret caret-up");
                    });
        });

    </script>

</body>
</html>
