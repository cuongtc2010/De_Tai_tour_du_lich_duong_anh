<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CTY TNHH VIECNET</title>

    <!-- Vendor CSS -->
    <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/sweetalert.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/material-design-iconic-font.min.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <!--<link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/lightgallery.min.css" rel="stylesheet">-->

    <!-- CSS -->

    <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/chosen.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/app_1.min.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_ADMIN_URL; ?>/css/app_2.min.css" rel="stylesheet">
    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/jquery.min.js"></script>
</head>
<body>
    <style type="text/css">
        .lb-required:after{
            content: "*";
            color:red;
            font-weight: bold;
        }
    </style>
    <header id="header" class="clearfix" data-ma-theme="blue">
        <ul class="h-inner">
            <li class="hi-trigger ma-trigger" data-ma-action="sidebar-open" data-ma-target="#sidebar">
                <div class="line-wrap">
                    <div class="line top"></div>
                    <div class="line center"></div>
                    <div class="line bottom"></div>
                </div>
            </li>
            <li class="hi-logo hidden-xs">
                <a href="<?= ROOT_URL . "/admin" ?>">VIECNET.COM</a>
            </li>

            <li class="pull-right">
                <ul class="hi-menu">   
                    <button type="button" class="btn btn-success btn-sm m-t-5 waves-effect" data-toggle="modal" data-target="#ungvien_excel"><i class="zmdi zmdi-file-text"></i> Xuất Excel</button>
                    <?php
                    if (isset($_SESSION["user_info_admin"])) {
                        ?>
                        <li>
                            <a href="<?= ROOT_URL . "/dang-nhap.html" ?>"><span class="btn btn-warning him-label"><i class="zmdi zmdi-lock-open"></i> Đăng nhập</span></a>
                        </li>
                        <li>
                            <a href="<?= ROOT_URL . "/dang-ky.html" ?>"><span class="btn btn-danger him-label"><i class="zmdi zmdi-plus-square"></i> Thoát</span></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
        </ul>

        <!-- Top Search Content -->
        <div class="h-search-wrap">
            <div class="hsw-inner">
                <i class="hsw-close zmdi zmdi-arrow-left" data-ma-action="search-close"></i>
                <input type="text">
            </div>
        </div>
    </header>
    
    <form class="row p-10" role="form" method="post" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&tabid=<?= $tabid ?>">
    <div class="modal fade" id="ungvien_excel" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tạo danh sách ứng viên</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <td align='left'><label><input type="checkbox" name="HoTen_ex" checked/>&nbsp;Họ tên</label></td>
                                <td align='left'><label><input type="checkbox" name="ViTri_ex" checked />&nbsp;Vị trí việc làm</label></td>
                                <td align='left'><label><input type="checkbox" name="NgaySinh_ex" checked />&nbsp;Ngày sinh</label></td>
                            </tr>
                            <tr>
                                <td align='left'><label><input type="checkbox" name="GioiTinh_ex" checked/>&nbsp;Giới tính</label></td>
                                <td align='left'><label><input type="checkbox" name="Email_ex" checked />&nbsp;Email</label></td>
                                <td align='left'><label><input type="checkbox" name="DienThoai_ex" checked />&nbsp;Điện thoại</label></td>
                            </tr>
                            <tr>
                                <td align='left'><label><input type="checkbox" name="DiaChi_ex" checked/>&nbsp;Địa chỉ</label></td>
                                <td align='left'><label><input type="checkbox" name="KinhNghiem_ex" checked />&nbsp;Kinh nghiệm</label></td>
                                <td align='left'><label><input type="checkbox" name="HTLV_ex" checked />&nbsp;Hình thức làm việc</label></td>
                            </tr>
                            <tr>
                                <td align='left'><label><input type="checkbox" name="MucLuong_ex" checked />&nbsp;Mức lương</label></td>
                                <td align='left'><label><input type="checkbox" name="TinhThanh_ex" checked/>&nbsp;Tỉnh thành</label></td>
                                <td align='left'><label><input type="checkbox" name="CapBac_ex" checked />&nbsp;Cấp bậc</label></td>
                            </tr>
                            <tr>
                                <td align='left'><label><input type="checkbox" name="NganhNghe_ex" checked/>&nbsp;Ngành nghề</label></td>
                                <td align='left'><label><input type="checkbox" name="BangCap_ex" checked />&nbsp;Bằng cấp</label></td>
                                <td align='left'><label><input type="checkbox" name="NgoaiNgu_ex" checked />&nbsp;Ngoại Ngữ</label></td>
                            </tr>
                            <tr>
                                <td align='left'><label><input type="checkbox" name="TrinhDoNgoaiNgu_ex" checked/>&nbsp;Trình độ ngoại ngữ</label></td>
                                <td align='left'><label><input type="checkbox" name="TinHoc_ex" checked />&nbsp;Tin học</label></td>
                                <td align='left'><label><input type="checkbox" name="TrinhDoTinHoc_ex" checked />&nbsp;Trình độ tin học</label></td>
                            </tr>
                            <tr>
                                <td align='left'><label><input type="checkbox" name="TinhTrangHonNhan_ex" checked/>&nbsp;Tình trạng hôn nhân</label></td>
                                <td align='left'><label><input type="checkbox" name="TrangThai_ex" checked/>&nbsp;Trạng thái</label></td>
                                <td align='left'><label></label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" name="btnExcel" onclick="xuat_excel()" class="btn bgm-bluegray btn-sm m-t-5 waves-effect">In danh sách</button>
                    <button type="button" class="btn btn-danger btn-sm m-t-5 waves-effect" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>
</form>
    <section id="main">
        <?php
        require_once TEMPLATE_DIRECTORY . DS . "menu.php";
        ?>
        <section id="content">
            <div class="container container-alt">
                <?php
                require_once ADMIN_CONTROLLER_DIRECTORY . DS . "Router.php";
                ?>
            </div>
        </section>
    </section>

    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/bootstrap.min.js"></script>   

    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/waves.min.js"></script>
    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/bootstrap-growl.min.js"></script>
    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/sweetalert.min.js"></script>
    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/lightgallery-all.min.js"></script>
    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/autosize.min.js"></script>
    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/chosen.jquery.js"></script>
    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/moment.min.js"></script>
    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/fileinput.min.js"></script>
    <!--<script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/bootstrap-select.js"></script>-->
    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/bootstrap-datetimepicker.min.js"></script>

    <script src="<?php echo TEMPLATE_ADMIN_URL; ?>/js/app.min.js"></script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async='async'></script>
    <script type="text/javascript">        
        function Subscribed(Id) {
            var url = "<?= ROOT_ADMIN_URL . "/index.php?ctl=Register_onesignal_app&act=doSubscribed" ?>";
            var postData = {Id: Id};
            var post = $.post(url, postData)
                    .done(function (data) {
                    })
                    .fail(function () {
                    });
        }
        function UnSubscribed(Id) {
            var url = "<?= ROOT_ADMIN_URL . "/index.php?ctl=Register_onesignal_app&act=doUnSubscribed" ?>";
            var postData = {Id: Id};
            var post = $.post(url, postData)
                    .done(function (data) {
                    })
                    .fail(function () {
                    });
        }
        var OneSignal = window.OneSignal || [];
        OneSignal.push(["init", {
                appId: "df543744-0cca-4081-9a69-edc79d1d4f9f",
                autoRegister: true, /* Set to true to automatically prompt visitors */
                httpPermissionRequest: {
                    enable: true
                },
                notifyButton: {
                    enable: true /* Set to false to hide */
                },
                welcomeNotification: {
                    title: "VIECNET.COM xin cám ơn bạn đã ghé thăm",
                    message: "Cám ơn bạn đã đăng ký nhận thông tin từ chúng tôi!",
                    // "url": "" /* Leave commented for the notification to not open a window on Chrome and Firefox (on Safari, it opens to your webpage) */
                },
                promptOptions: {
                    /* These prompt options values configure both the HTTP prompt and the HTTP popup. */
                    /* actionMessage limited to 90 characters */
                    actionMessage: "Bạn có muốn nhận các thông tin mới nhất về việc làm và ứng viên, Hãy nhấn nút đồng ý.",
                    /* acceptButtonText limited to 15 characters */
                    acceptButtonText: "Đồng ý",
                    /* cancelButtonText limited to 15 characters */
                    cancelButtonText: "Không, cảm ơn"
                }
            }]);
        OneSignal.push(function () {
            OneSignal.on('subscriptionChange', function (isSubscribed) {
                if (isSubscribed) {
                    OneSignal.getUserId(function (userId) {
                        Subscribed(userId);
                    });
                } else {
                    OneSignal.getUserId(function (userId) {
                        UnSubscribed(userId);
                    });
                }
            });
        });


    </script>
</body>
</html>
