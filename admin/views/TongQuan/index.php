<div class="row">
    <div class="col-md-12">
        <div class="card p-30 gg">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-md-2">
                            <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                        </div>
                        <div class="col-md-10">
                            <h2 style="color: #007bff">TỔNG DOANH THU</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="media-body media-text-right">
                        <h2 style="color: #f00"><?= UtilityController::formatNumber($TongDoanhThu[0]["DoanhThu"]) ?> VNĐ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card p-30 gg">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-md-2">
                            <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                        </div>
                        <div class="col-md-10">
                            <h2 style="color: #26dad2">TỔNG TOUR ĐÃ ĐẶT</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="media-body media-text-right">
                        <h2 style="color: #43f7a5"><?= UtilityController::formatNumber($TongTourDaDat[0]["SoLuongTourDat"]) ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card p-30 gg">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-md-2">
                            <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                        </div>
                        <div class="col-md-10">
                            <h2 style="color: #ffb64d">TỔNG SỐ TOUR HIỆN CÓ</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="media-body media-text-right">
                        <h2 style="color:#ff9600"><?= UtilityController::formatNumber($SoLuongTour[0]["SoLuongTour"]) ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card p-30 gg">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-md-2">
                            <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                        </div>
                        <div class="col-md-10">
                            <h2 style="color: #fc6180">TỔNG SỐ KHÁCH HÀNG</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="media-body media-text-right">
                        <h2 style="color:#fc6180"><?= UtilityController::formatNumber($SoLuongKhach[0]["SoLuongKhach"]) ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
    .gg:hover{
        background: #ececec;
    }
</style>