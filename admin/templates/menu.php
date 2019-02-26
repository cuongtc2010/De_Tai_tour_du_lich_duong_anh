<!-- header header  -->
<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                <!--End Logo icon -->
                <!-- Logo text -->
                <span><img src="<?php echo TEMPLATE_ADMIN_URL; ?>/images/logo_2.png" class="dark-logo" style="width: 130px"/></span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <!-- Messages -->
            </ul>
            <!-- User profile and search -->
            <ul class="navbar-nav my-lg-0">

                <!-- Profile -->
                <li class="nav-item dropdown">
                    <?php
                    if (isset($_SESSION["user_info_admin"]["nhanvienid"])) {
                        $nhanvien_model = new Dm_nhanvienModel();
                        $nhanvien = $nhanvien_model->getAvatar($_SESSION["user_info_admin"]["nhanvienid"]);
                    }
                    ?>
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= $nhanvien->HinhAnh ?>" alt="user" class="profile-pic" style="width:  50px"/></a>
                    <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-user">
                            <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=DoiMatKhau"><i class="ti-user"></i> Đổi mật khẩu</a></li>
                            <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=Account&act=doLogout"><i class="fa fa-power-off"></i> Thoát</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- End header header -->
<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label"></li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-compass"></i><span class="hide-menu">Tours </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=Dm_tour">Quản lý tours </a></li>
                        <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=Dm_diadiem">Quản lý địa điểm </a></li>
                        <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=quanlydattour">Quản lý đặt tours </a></li>
                        <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=quanlyloaitour">Quản lý loại tours </a></li>
                        <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=yeucautour">Quản lý yêu cầu tours </a></li>
                        <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=TinTuc">Tin tức </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Khách hàng </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=Dm_kh">Quản lý khách hàng </a></li>
                        <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=quanlytaikhoankhachhang">Quản lý tài khoản khách hàng </a></li>
                        <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=Phanhoitukhachhang">Quản lý phản hồi </a></li>

                    </ul>
                </li>
                <?php
                if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && ($_SESSION["user_info_admin"]["chucvuid"] != 5 && $_SESSION["user_info_admin"]["chucvuid"] != 3 && $_SESSION["user_info_admin"]["chucvuid"] != 2)) {
                    ?>
                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-address-card"></i><span class="hide-menu">Nhân viên </span></a>
                        <ul aria-expanded="false" class="collapse">

                            <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=Dm_nhanvien">Quản lý nhân viên </a></li>
                            <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=quanlytaikhoannhanvien">Quản lý tài khoản nhân viên </a></li>
                            <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=ChucVu">Quản lý chức vụ </a></li>
                            <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=Dm_luong">Quản lý lương </a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && ($_SESSION["user_info_admin"]["chucvuid"] != 5 && $_SESSION["user_info_admin"]["chucvuid"] != 3 && $_SESSION["user_info_admin"]["chucvuid"] != 2)) {
                    ?>
                    <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-credit-card"></i><span class="hide-menu">Thống kê </span></a>
                        <ul aria-expanded="false" class="collapse">

                            <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=ThongKe&act=DoanhThu">Doanh thu </a></li>
                            <li><a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=ThongKe">Số lượng đặt tour </a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->