<section id="portfolio" class="light-bg" style="padding-bottom: 0px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title" >
                   <h3 class="text-center" style="font-family: sans-serif; color:  #003c71;">Đặt phòng nhanh hơn. Đặt phòng thông minh hơn. Đặt với Dương Anh Travel.</h3>
        <p class="text-center" style="font-family: sans-serif; ">Với bầu nhiệt huyết được truyền lửa từ niềm đam mê du lịch, Dương Anh luôn nỗ lực để mang đến cho bạn những tour du lịch độc đáo, thú vị và hơn thế nữa. Hãy tìm kiếm trong số hàng triệu chỗ ở đa dạng và lên kế hoạch cho một chuyến đi hoàn hảo: đi phượt, du lịch bụi, hưởng tuần trăng mật hay nghỉ mát cùng gia đình, chúng tôi luôn có chọn lựa phù hợp cho bạn.</p>
       
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-left no-padding">
                <div class="section-title hasLine">
                    <h3 style="font-size: 30px; color: #003c71"><span>Địa điểm du lịch mới nhất</span></h3>
                </div>
            </div>
        </div>
        <div class="row row-0-gutter">
        <?php
        if (!is_null($list)) {
            $i = 1;
            $Ids = '';
            foreach ($list as $value) {
                ?>
                <!-- Card -->
                
                    <!-- start portfolio item -->
                    <div class="col-md-4 col-0-gutter">
                        <div class="ot-portfolio-item">
                            <figure class="effect-bubba">
                                <a href="index.php?ctl=Dm_tour&act=Chitiettour&id=<?= $value["Id"] ?>">
                                <img src="<?php echo $value["HinhAnh"] ?>" alt="img02" class="img-responsive" style="height: 240px" />
                                <div class="che">
                                    <h3><?php echo $value["TenTour"] ?></h3>
                                </div>
                                </a>
                            </figure>

                        </div>
                    </div>
                    <!-- end portfolio item -->

                <?php
            }
        }
        ?>
        </div>
    </div><!-- end container -->
</section>
