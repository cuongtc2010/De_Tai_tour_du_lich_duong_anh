
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
            <?php
            if (!is_null($list)) {
                $i = 1;
                $Ids = '';
                foreach ($list as $value) {
                    ?>

                    <div class="row">
                        <div class="w3-container">
                            <div class="w3-panel w3-card no-padding" style="background-color: #fff; margin-top: 0">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                    <span class="tourItemName" style="font-size: 30px;color: #00c1de;padding-left: 15px ">
                                        <?= $value["TenTour"] ?>
                                    </span><br>
                                    <div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 tourItemImage">
                                            <img class="img-responsive"  src="<?php echo $value["HinhAnh"] ?>">

                                        </div>
                                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                            <div class="row v-margin-top-10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourItemContentPrice">
                                                    <div class="col-md-4 no-padding"><div class="edit-booking-guest-info-title">Mã đặt tour</div></div>
                                                    <div class="col-md-8 no-padding"><div class="edit-booking-guest-info-title"><?= $value["MaDatTour"] ?></div></div>
                                                </div>

                                            </div>
                                            <div class="edit-booking-block-separator"></div>
                                            <div class="row v-margin-top-10">

                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourItemContentPrice">
                                                    <div class="col-md-4 no-padding"><div class="edit-booking-guest-info-title">Số lượng khách đi</div></div>
                                                    <div class="col-md-8 no-padding"><div class="edit-booking-guest-info-title"><?= $value["SoLuongKhachDi"] ?></div></div>
                                                </div>
                                            </div>
                                            <div class="edit-booking-block-separator"></div>

                                            <div class="row v-margin-top-10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourItemContentPrice">
                                                    <div class="col-md-4 no-padding"><div class="edit-booking-guest-info-title">Tên khách hàng</div></div>
                                                    <div class="col-md-8 no-padding"><div class="edit-booking-guest-info-title"><?= $value["TenKH"] ?></div></div>

                                                </div>
                                            </div>
                                            <div class="edit-booking-block-separator"></div>

                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourItemContentPrice">
                                                    <div class="col-md-4 no-padding"><div class="tourItemContentPrice">Tổng tiền</div></div>
                                                    <div class="col-md-8 no-padding"><div class="tourItemContentPrice"><?= number_format($value["SoLuongKhachDi"] * $value["GiaTien"], 0, ",", ".") ?> VND</div></div>
                                                </div>
                                            </div>
                                            <div class="edit-booking-block-separator"></div>
                                            
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourItemContentPrice">
                                                    <div class="col-md-4 no-padding"><div class="tourItemContentPrice">Ngày đi - ngày về</div></div>
                                                    <div class="col-md-8 no-padding"><div class="tourItemContentPrice"><?= date('d/m/Y',strtotime($value["NgayBatDau"]))." - ".date('d/m/Y',strtotime($value["NgayKetThuc"])) ?></div></div>
                                                </div>
                                            </div>
                                            <div class="edit-booking-block-separator"></div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourItemContentPrice">
                                                    <div class="col-md-4 no-padding"><div class="tourItemContentPrice">Thông tin liên lạc</div></div>
                                                    <div class="col-md-8 no-padding"><div class="tourItemContentPrice"><?= $value["SDT"] . " - " .  $value["Email"] ?></div></div>
                                                </div>
                                            </div>
                                            <div class="edit-booking-block-separator"></div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourItemContentPrice">
                                                    <div class="col-md-4 no-padding"><div class="tourItemContentPrice">Tình trạng</div></div>
                                                    <div class="col-md-8 no-padding"><div class="tourItemContentPrice" style="color: <?= ($value["TrangThai"] == 0) ? "#fe0000" : "#23b22e" ?>;"><?= ($value["TrangThai"] == 0) ? "Chưa xác nhận" : "Đã xác nhận" ?></div></div>
                                                </div>
                                            </div>
                                            <div class="edit-booking-block-separator"></div>
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

<style>
    .edit-booking-block-separator {
        height: 1px;
        margin-top: 10px;
        margin-bottom: 10px;
        background-color: #e1e1e1;
        border-width: inherit;
        border-color: #e1e1e1;
        clear: both;
    }
</style>