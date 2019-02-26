<?php
$root_ctl = "Dm_tour";
?>

<div class="col-lg-12 text-left no-padding">
    <div class="section-title hasLine">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="index.php?ctl=TimKiemTour">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <h3 style="font-size: 30px; color: #003c71"><span>Các tour mới nhất</span></h3>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hidden-xs">
                        <h6 style=" color: #003c71; float: right; padding-top: 25px; padding-right: 0px"><span>Xem thêm</span><i class="glyphicon glyphicon-chevron-right"></i></h6>
                    </div>
                </a>    
            </div>

        </div>
    </div>
</div>
<div class="row">
    <!-- about module -->
    <?php
    if (!is_null($list_tour_pho_bien)) {
        $i = 1;
        $Ids = '';
        foreach ($list_tour_pho_bien as $value) {
            $Ids .= $value['Id'] . ",";
            ?>
            <!-- Card -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 grow">
                <div class="w3-card-4" style="margin-bottom: 20px">
                    <a href="index.php?ctl=<?= $root_ctl ?>&act=Chitiettour&id=<?= $value["Id"] ?>" style="text-decoration:none">
                        <img src="<?php echo $value["HinhAnh"] ?>" alt="Norway" style="width: 100%; height: 250px" >
                        <div class="w3-container w3-center text_here">
                            <span class="ellipsis_text" style="font-size: 20px;color: #003c71;"><?= $value["TenTour"] ?></span>
                        </div>
                        <div class="row" style="padding: 0 10px">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cardItemPrice">
                                <span>
                                    <i class="glyphicon glyphicon-calendar"></i> <?= $value["LichTrinh"] ?>
                                </span>
                            </div>
                        </div>
                        <div class="row" style="padding: 5px 10px">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cardItemPrice">
                                <span style="font-size: 20px;color: #00c1de;"><?= number_format($value["GiaTien"], 0, ",", ".") ?> VND</span>
                            </div>
                        </div>

                    </a>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <!-- end about module -->
</div>
<div class="col-lg-12 text-left no-padding">
    <div class="section-title hasLine">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="index.php?ctl=TimKiemTour&act=search&Time=7">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <h3 style="font-size: 30px; color: #003c71"><span>Tours nước ngoài</span></h3>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hidden-xs">
                        <h6 style=" color: #003c71; float: right; padding-top: 25px; padding-right: 0px"><span>Xem thêm</span><i class="glyphicon glyphicon-chevron-right"></i></h6>
                    </div>
                </a>    
            </div>

        </div>
    </div>
</div>
<div class="row">
    <!-- about module -->
    <?php
    if (!is_null($list_tour_nuoc_ngoai)) {
        $i = 1;
        $Ids = '';
        foreach ($list_tour_nuoc_ngoai as $value) {
            $Ids .= $value['Id'] . ",";
            ?>
            <!-- Card -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 grow">
                <div class="w3-card-4" style="margin-bottom: 20px">
                    <a href="index.php?ctl=<?= $root_ctl ?>&act=Chitiettour&id=<?= $value["Id"] ?>" style="text-decoration:none">
                        <img src="<?php echo $value["HinhAnh"] ?>" alt="Norway" style="width: 100%; height: 250px" >
                        <div class="w3-container w3-center limittitle">
                            <span style="font-size: 20px;color: #003c71;"><?= $value["TenTour"] ?></span>
                        </div>
                        <div class="row" style="padding: 0 10px">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cardItemPrice">
                                <span>
                                    <i class="glyphicon glyphicon-calendar"></i> <?= $value["LichTrinh"] ?>
                                </span>
                            </div>
                        </div>
                        <div class="row" style="padding: 5px 10px">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cardItemPrice">
                                <span style="font-size: 20px;color: #00c1de;"><?= number_format($value["GiaTien"], 0, ",", ".") ?> VND</span>
                            </div>
                        </div>

                    </a>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <!-- end about module -->
</div>
<div class="col-lg-12 text-left no-padding">
    <div class="section-title hasLine">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="index.php?ctl=TimKiemTour&act=search&Time=11">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <h3 style="font-size: 30px; color: #003c71"><span>Các tour trong nước</span></h3>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hidden-xs">
                        <h6 style=" color: #003c71; float: right; padding-top: 25px; padding-right: 0px"><span>Xem thêm</span><i class="glyphicon glyphicon-chevron-right"></i></h6>
                    </div>
                </a>    
            </div>

        </div>
    </div>
</div>
<div class="row">
    <!-- about module -->
    <?php
    if (!is_null($list_tour_trong_nuoc)) {
        $i = 1;
        $Ids = '';
        foreach ($list_tour_trong_nuoc as $value) {
            $Ids .= $value['Id'] . ",";
            ?>
            <!-- Card -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 grow">
                <div class="w3-card-4" style="margin-bottom: 20px">
                    <a href="index.php?ctl=<?= $root_ctl ?>&act=Chitiettour&id=<?= $value["Id"] ?>" style="text-decoration:none">
                        <img src="<?php echo $value["HinhAnh"] ?>" alt="Norway" style="width: 100%; height: 250px" >
                        <div class="w3-container w3-center limittitle">
                            <span style="font-size: 20px;color: #003c71;"><?= $value["TenTour"] ?></span>
                        </div>
                        <div class="row" style="padding: 0 10px">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cardItemPrice">
                                <span>
                                    <i class="glyphicon glyphicon-calendar"></i> <?= $value["LichTrinh"] ?>
                                </span>
                            </div>
                        </div>
                        <div class="row" style="padding: 5px 10px">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cardItemPrice">
                                <span style="font-size: 20px;color: #00c1de;"><?= number_format($value["GiaTien"], 0, ",", ".") ?> VND</span>
                            </div>
                        </div>

                    </a>
                </div>
            </div>
            <?php
        }
    }
    ?>
            
    
</div>
<div class="col-lg-12 text-left no-padding">
    <div class="section-title hasLine">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="index.php?ctl=TimKiemTour&act=search&Time=10">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <h3 style="font-size: 30px; color: #003c71"><span>Các tour miền tây</span></h3>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 hidden-xs">
                        <h6 style=" color: #003c71; float: right; padding-top: 25px; padding-right: 0px"><span>Xem thêm</span><i class="glyphicon glyphicon-chevron-right"></i></h6>
                    </div>
                </a>    
            </div>

        </div>
    </div>
</div>
<div class="row">
    <!-- about module -->
   
       <?php
    if (!is_null($list_tour_mien_tay)) {
        $i = 1;
        $Ids = '';
        foreach ($list_tour_mien_tay as $value) {
            $Ids .= $value['Id'] . ",";
            ?>
            <!-- Card -->
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 grow">
                <div class="w3-card-4" style="margin-bottom: 20px">
                    <a href="index.php?ctl=<?= $root_ctl ?>&act=Chitiettour&id=<?= $value["Id"] ?>" style="text-decoration:none">
                        <img src="<?php echo $value["HinhAnh"] ?>" alt="Norway" style="width: 100%; height: 250px" >
                        <div class="w3-container w3-center limittitle">
                            <span style="font-size: 20px;color: #003c71;"><?= $value["TenTour"] ?></span>
                        </div>
                        <div class="row" style="padding: 0 10px">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cardItemPrice">
                                <span>
                                    <i class="glyphicon glyphicon-calendar"></i> <?= $value["LichTrinh"] ?>
                                </span>
                            </div>
                        </div>
                        <div class="row" style="padding: 5px 10px">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cardItemPrice">
                                <span style="font-size: 20px;color: #00c1de;"><?= number_format($value["GiaTien"], 0, ",", ".") ?> VND</span>
                            </div>
                        </div>

                    </a>
                </div>
            </div>
            <?php
        }
    }
    ?>
            
    
</div>
<style>
    .hasLine a{
        text-decoration: none;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () {
        // SECTION ONE: basic demos/tests //

        // row 1 & 1.5
        var the_obj = $('.text_here').ThreeDots({
            max_rows: 1.5
        });
    });
</script>