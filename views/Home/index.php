<!--<div class="clearfix"></div>
<div class="row">
<div style="cursor:pointer;background: url(//cdn1.ivivu.com/iVivu/2018/05/24/14/undefined.jpg) no-repeat center center;background-size:cover;" title="Khu nghỉ dưỡng Fusion Phú Quốc">

        <div class="container-fluid">
            <div id="homePageSearchModule" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="searchtxt col-xs-12 col-sm-12 col-md-12 col-lg-12 vremoveSpacing">
                    <h1 class="txtshadow">Đặt khách sạn đảm bảo giá tốt nhất</h1>
                    <h4 class="txtshadow">Hơn 5.000 khách sạn ở Việt Nam và 345.000 khách sạn toàn thế giới</h4>
                </div>
                <div style="cursor:default" class="searchbox col-xs-12 col-sm-12 col-md-8 col-lg-8" title="" tmp_title="">
                    <div class="searchbox-wrap clearfix">
                        <form id="homepage-search-form" action="//www.ivivu.com/tim-kiem" method="GET" onsubmit="if ($('#search-home-text').val().trim() == '')
                                    return false;">


                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
                                <ul>
                                    <li class="searchHeadLine">&nbsp;</li>
                                    <li>
                                        <input type="button" id="homepage-search-button" value="TÌM KIẾM" class="btn btn-warning vbackground-warning btn-sm">
                                    </li>
                                </ul>
                            </div>

                            <br>
                        </form>
                        <i class="sprites icn-plane"></i>
                         Home Search Suggest 
                        <div class="search-suggest clearfix" id="homepage-search-suggest"> <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> <h4>Các địa điểm HOT nhất</h4>  </div><div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <a href="/khach-san-nha-trang">Khách sạn Nha Trang</a>  </div><div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"><a href="/khach-san-phan-thiet">Khách sạn Phan Thiết</a> </div><div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <a href="/khach-san-phu-quoc">Khách sạn Phú Quốc</a></div> <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <a href="/khach-san-vung-tau">Khách sạn Vũng Tàu</a> </div> <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"><a href="/khach-san-da-lat">Khách sạn Đà Lạt</a></div> <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"><a href="/khach-san-hoi-an">Khách sạn Hội An</a> </div> <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <a href="/khach-san-da-nang">Khách sạn Đà Nẵng</a> </div> <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"><a href="/khach-san-hue">Khách sạn Huế</a></div> <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <a href="/khach-san-sapa">Khách sạn Sapa</a> </div> <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <a href="/khach-san-ha-noi">Khách sạn Hà Nội</a></div><div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"><a href="/khach-san-vinh-ha-long">Khách sạn Vịnh Hạ Long</a></div><div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <a href="/khach-san-ho-chi-minh">Khách sạn Tp. Hồ Chí Minh (Sài Gòn)</a> </div></div>
                         END Home Search Suggest 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<?php
    $TourMoi = new TourPhoBienController();
    $TourMoi->index();
?>

<section id="portfolio" class="light-bg">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-12 text-left no-padding">
                <div class="section-title hasLine">
                    <h3 style="font-size: 30px; color: #003c71"><span>Các điểm du lịch phổ biến</span></h3>
                </div>
            </div>
        </div>
        <div class="row row-0-gutter">
            <!-- start portfolio item -->
            <div class="col-md-4 col-0-gutter">
                <div class="ot-portfolio-item">
                    <figure class="effect-bubba">
                        <a href="index.php?ctl=TimKiemTour&act=search&DiaDiemId=2">
                        <img src="<?php echo TEMPLATE_HOME_URL; ?>/images/con-dao.jpg" alt="img02" class="img-responsive" style="height: 240px" />
                        <div class="che">
                            <h3>Côn Đảo</h3>
                        </div>
                        </a>
                    </figure>

                </div>
            </div>
            <!-- end portfolio item -->
            <!-- start portfolio item -->
            <div class="col-md-4 col-0-gutter">
                <div class="ot-portfolio-item">
                    <figure class="effect-bubba">
                         <a href="index.php?ctl=TimKiemTour&act=search&DiaDiemId=4">
                        <img src="<?php echo TEMPLATE_HOME_URL; ?>/images/DiepSon.jpg" alt="img02" class="img-responsive" style="height: 240px" />
                        <div class="che">
                            <h3>Điệp Sơn</h3>
                        </div>
                         </a>
                    </figure>

                </div>
            </div>
            <!-- end portfolio item -->
            <!-- start portfolio item -->
            <div class="col-md-4 col-0-gutter">
                <div class="ot-portfolio-item">
                    <figure class="effect-bubba">
                         <a href="index.php?ctl=TimKiemTour&act=search&DiaDiemId=4">
                        <img src="<?php echo TEMPLATE_HOME_URL; ?>/images/HaLong.jpg" alt="img02" class="img-responsive" style="height: 240px" />
                        <div class="che">
                            <h3>Hạ Long</h3>
                        </div>
                         </a>
                    </figure>

                </div>
            </div>
            <!-- end portfolio item -->
        </div>
        <div class="row row-0-gutter">
            <!-- start portfolio item -->
            <div class="col-md-4 col-0-gutter">
                <div class="ot-portfolio-item">
                    <figure class="effect-bubba">
                        <a href="index.php?ctl=TimKiemTour&act=search&DiaDiemId=5">
                        <img src="<?php echo TEMPLATE_HOME_URL; ?>/images/sapaa.jpg" alt="img02" class="img-responsive" style="height: 240px" />
                        <div class="che">
                            <h3>Sa Pa</h3>
                        </div>
                        </a>
                    </figure>

                </div>
            </div>
            <!-- end portfolio item -->
            <!-- start portfolio item -->
            <div class="col-md-4 col-0-gutter">
                <div class="ot-portfolio-item">
                    <figure class="effect-bubba">
                        <a href="index.php?ctl=TimKiemTour&act=search&DiaDiemId=6">
                        <img src="<?php echo TEMPLATE_HOME_URL; ?>/images/dalat.jpg" alt="img02" class="img-responsive" style="height: 240px" />
                        <div class="che">
                            <h3>Đà Lạt</h3>
                        </div>
                        </a>
                    </figure>

                </div>
            </div>
            <!-- end portfolio item -->
            <!-- start portfolio item -->
            <div class="col-md-4 col-0-gutter">
                <div class="ot-portfolio-item">
                    <figure class="effect-bubba">
                         <a href="index.php?ctl=TimKiemTour&act=search&DiaDiemId=7">
                        <img src="<?php echo TEMPLATE_HOME_URL; ?>/images/Hue.jpg" alt="img02" class="img-responsive" style="height: 240px" />
                        <div class="che">
                            <h3>Huế</h3>
                        </div>
                         </a>
                    </figure>

                </div>
            </div>
            
            <!-- end portfolio item -->
        </div>
    </div><!-- end container -->
</section>