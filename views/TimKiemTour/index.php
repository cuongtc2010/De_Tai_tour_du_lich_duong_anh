<form name="myform" role="form" method="post" action="<?= ROOT_URL ?>/index.php?ctl=TimKiemTour&act=search">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 tourSideBar" >
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">Tìm Tours</h4>
                </div>
                <div class="panel-collapse">
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding typeAHeadDiv" id="typeAHeadDiv">
                            <label>Bạn muốn đi du lịch đến:</label>
                            <div class="input-group">
                                <input type="text" name="txtSearch" class="form-control input-group" >

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary btn-flat" id="searchButton" style="padding: 6px 12px;"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title">Gợi ý địa điểm</h4>
                </div>
                <div class="panel-collapse">
                    <div class="panel-body">
                        <?php
                        if (!is_null($list_DiaDiem)) {
                            foreach ($list_DiaDiem as $diadiem_value) {
                                ?>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3 col-md-12 col-lg-12">
                                        <a href="<?= ROOT_URL ?>/index.php?ctl=TimKiemTour&act=search&DiaDiemId=<?= $diadiem_value["Id"] ?>">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                                <?= $diadiem_value["TenDiaDiem"] ?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                <div class="box box-default text-center non-border">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 orderList">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 orderTitle hidden-xs">
                                <p class="text-left">Sắp xếp theo:</p>
                            </div>
                            <a href="<?= ROOT_URL ?>/index.php?ctl=TimKiemTour" class="col-xs-6 col-sm-4 col-md-4 col-lg-4 orderItem <?= !isset($_GET["act"]) || isset($_GET["DiaDiemId"]) ? "active" : "" ?>">
                                <p class="text-center"> Đề xuất</p>
                            </a>
                            <a href="<?= ROOT_URL ?>/index.php?ctl=TimKiemTour&act=search&SortGia=1" class="col-xs-6 col-sm-4 col-md-4 col-lg-4 orderItem <?= isset($_GET["SortGia"]) ? "active" : "" ?>">
                                <p class="text-center ">Giá </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                <?php
                if (!is_null($list_search)) {
                    $i = 1;
                    $Ids = '';
                    foreach ($list_search as $value) {
                        $Ids .= $value['Id'] . ",";
                        ?>

                        <div class="row grow">
                            <div class="w3-container">
                                <div class="w3-panel w3-card no-padding" style="background-color: #fff; margin-top: 0">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                        <div>
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 tourItemImage">
                                                <a href="index.php?ctl=Dm_tour&act=Chitiettour&id=<?= $value["Id"] ?>">

                                                    <img class="img-responsive"  src="<?php echo $value["HinhAnh"] ?>">
                                                </a>
                                            </div>
                                            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                                <div class="row v-margin-top-10">
                                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                                        <span class="tourItemName">
                                                            <a href="index.php?ctl=Dm_tour&act=Chitiettour&id=<?= $value["Id"] ?>">
                                                                <?= $value["TenTour"] ?>
                                                            </a>
                                                        </span><br>
                                                        <div class="v-margin-top-10">
                                                            <span class="v-margin-right-15">Mã: <span><?= $value["MaTour"] ?></span></span>
                                                            <span class="v-margin-right-15"><i class="glyphicon glyphicon-time"></i> 5 Ngày 4 Đêm</span><br class="visible-xs visible-sm">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 tourItemContentPrice text-right">
                                                        <span class="tourItemPricePerGuest">Giá 1 khách</span><br>
                                                        <span class="tourItemPrice"><?= number_format($value["GiaTien"], 0, ",", ".") ?><span class="tourItemCurrency"> VND</span></span><br>
                                                        <a class="btn btn-flat btn-warning btn-block vbackground-warning text-uppercase " href="index.php?ctl=Dm_tour&act=Chitiettour&id=<?= $value["Id"] ?>" style="    margin-bottom: 10px;">
                                                            chi tiết <i class="glyphicon glyphicon-chevron-right"></i>
                                                        </a>
                                                        <br class="hidden-xs">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>

        </div>
    </div>
</form>