<?php
$_Id = "";
if (isset($_GET["id"])) {
    $_Id = $_GET["id"];
}
?>

<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 tourSideBar">
        <h1 class="pageTitle vcolor-primary v-margin-top-0 v-margin-bottom-15 hidden-xs"><b><?= isset($_TenTour) ? $_TenTour : "" ?></b></h1></div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-push-8 col-md-push-8 tourSideBar" >
        <ul class="nav nav-tabs nav-stacked no-padding v-margin-bottom-15">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="col-xs-12 floatBox highlight">
                        <div class="col-xs-12  no-padding v-margin-bottom-15 priceDiv">
                            <input type="hidden" id='GiaTour' value="<?= isset($_GiaTien) ? $_GiaTien : "" ?>"/>
                            <span class="price totalPrice" id='TongTien'><?= isset($_GiaTien) ? number_format($_GiaTien, 0, ",", ".") : "" ?> VND</span>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding v-margin-bottom-15">
                                <div class="form-group a-white">
                                    <label class="col-xs-12 col-sm-12 col-md-12 col-lg-4 control-label no-padding">Khởi hành</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 no-padding">
                                        <input type="date" name="name" class="form-control" value="<?= isset($_NgayBatDau) ? $_NgayBatDau : "" ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding v-margin-bottom-15">
                                <div class="form-group a-white">
                                    <label class="col-xs-12 col-sm-12 col-md-12 col-lg-4 control-label no-padding">Kết thúc</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 no-padding">
                                        <input type="date" name="name" class="form-control" value="<?= isset($_NgayKetThuc) ? $_NgayKetThuc : "" ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding v-margin-bottom-15">
                                <div class="form-group a-white">
                                    <label class="col-xs-12 col-sm-12 col-md-12 col-lg-4 control-label no-padding">Số khách</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 no-padding">
                                        <select class="form-control" id='SoKhach'>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                <div class="form-group no-margin">
                                    <label class="visible-sm">&nbsp;</label>
                                    <div class="col-xs-12 no-padding">
                                        <div class="col-xs-12 no-padding">
                                            <button class="btn btn-flat btn-book btn-md btn-block" id='dattour' data-toggle="modal" data-target="#edit_TaiSan">ĐẶT TOUR</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <li class="gach-chan-li"><a href="#tour-schedule">LỊCH TRÌNH TOUR</a></li>
            <li class="gach-chan-li"><a href="#tour-services">DỊCH VỤ ĐI KÈM</a></li>
            <li class="gach-chan-li"><a href="#tour-rules">ĐIỀU KHOẢN</a></li>
            <li class="gach-chan-li"><a href="#tour-cancellation-rules">QUY ĐỊNH</a></li>
        </ul>


    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-lg-pull-4 col-md-pull-4">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding tourHeaderContainer v-margin-bottom-30">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourHeaderContent v-margin-bottom-15" >


                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding tourDetailContainer v-margin-bottom-30">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding tourDetailMainDiv">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding" id="tour-schedule">
                            <h3 class="tourDetailheadLine vcolor-primary">
                                LỊCH TRÌNH TOUR
                            </h3>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourScheduleContainer">
                                <div class="tourSchedule">
                                    <?= isset($_MoTa) ? $_MoTa : "" ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding" id="tour-services">
                            <h3 class="tourDetailheadLine vcolor-primary">DỊCH VỤ ĐI KÈM</h3>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="row tourService">
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 tourServiceItem">
                                        <span><i class="fa fa-plus-square" aria-hidden="true"></i> Bảo hiểm</span>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 tourServiceItem">
                                        <span><i class="fa fa-coffee" aria-hidden="true"></i> Bữa ăn</span>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 tourServiceItem">
                                        <span><i class="fa fa-flag" aria-hidden="true"></i> Hướng dẫn viên</span>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 tourServiceItem">
                                        <span><i class="fa fa-ticket" aria-hidden="true"></i> Vé tham quan</span>
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 tourServiceItem">
                                        <span><i class="fa fa-bus" aria-hidden="true"></i> Xe đưa đón</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding" id="tour-rules">
                            <h3 class="tourDetailheadLine vcolor-primary">ĐIỀU KHOẢN</h3>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                <div class="tourRule ">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#tabpanel1" role="tab" id="tab1" data-toggle="tab" aria-controls="tabpanel1" aria-expanded="true"><span class="visible-lg-inline">Giá Tour</span> Bao Gồm</a>
                                        </li>
                                        <li role="presentation" class="">
                                            <a href="#tabpanel2" role="tab" id="tab2" data-toggle="tab" aria-controls="tabpanel2" aria-expanded="false"><span class="visible-lg-inline">Giá Tour</span> Không Bao Gồm</a>
                                        </li>
                                        <li role="presentation" class="">
                                            <a href="#tabpanel3" role="tab" id="tab3" data-toggle="tab" aria-controls="tabpanel3" aria-expanded="false">Phụ Thu</a>
                                        </li>
                                        <li role="presentation" class="">
                                            <a href="#tabpanel4" role="tab" id="tab4" data-toggle="tab" aria-controls="tabpanel4" aria-expanded="false">Đối Tác</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="tabpanel1" aria-labelledby="tab1">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <?= isset($_GiaTourBaoGom) ? $_GiaTourBaoGom : "" ?>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade " id="tabpanel2" aria-labelledby="tab2">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <?= isset($_GiaTourKhongBaoGom) ? $_GiaTourKhongBaoGom : "" ?>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade " id="tabpanel3" aria-labelledby="tab3">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <?= isset($_PhuThu) ? $_PhuThu : "" ?>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade " id="tabpanel4" aria-labelledby="tab4">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div>
                                                    <br><label for="lblOrganizationName" style="text-decoration: underline;">Đơn vị tổ chức: </label>
                                                    <span id="lblOrganizationName">Công ty du lịch Nam Á Châu</span>
                                                    <br><label for="lblAddress" style="text-decoration: underline;">Địa chỉ: </label>
                                                    <span id="lblAddress">219 - 221 Phạm Ngũ Lão,Q.1,Tp.HCM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding v-margin-bottom-15" id="tour-cancellation-rules">
                            <h3 class="tourDetailheadLine vcolor-primary">QUY ĐỊNH</h3>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                <div class="tourRule">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#cancellationtabpanel3" role="tab" id="cancellationtab3" data-toggle="tab" aria-controls="cancellationtabpanel3" aria-expanded="true">Chú Ý</a>
                                        </li>
                                        <li role="presentation" class="">
                                            <a href="#cancellationtabpanel1" role="tab" id="cancellationtab1" data-toggle="tab" aria-controls="cancellationtabpanel1" aria-expanded="true">Hủy Tour</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="cancellationtabpanel3" aria-labelledby="cancellationtab3">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <p>-&nbsp;Chương trình có thể thay đổi tùy thuộc vào lịch bay hoặc sử dụng các hãng hàng không thay thế,&nbsp; các điểm tham quan trong chương trình có thể được thay đổi, sắp xếp theo tình hình tham quan thực tế tại địa phương nhưng vẫn đảm bảo đầy đủ các điểm theo chương trình.</p>
                                                <p>-&nbsp;Do tính chất là đoàn ghép khách lẻ, công ty chúng tôi sẽ có trách nhiệm nhận khách cho đủ đoàn (15 khách người lớn trở lên) và đoàn sẽ khởi hành đúng lịch trình. Trường hợp số lượng đoàn dưới 15 khách, công ty sẽ thông báo đến Quý khách trước ngày khởi hành 4 ngày và thông tin lại ngày khởi hành mới, hoặc hoàn trả lại toàn bộ số tiền cọc khách đã đăng ký trước đó.</p>
                                                <p>-&nbsp;Chương trình tour&nbsp; là du lịch trọn gói&nbsp; kết hợp tham quan mua sắm, khách hàng không tự ý tách đoàn, các dịch vụ không sử dụng sẽ không được hoàn lại. Các chi phí phát sinh (nếu có) do khách hàng tự thanh toán.</p>
                                                <p>- Trong những trường hợp khách quan như: đình công, khủng bố, thiên tai hoặc do thay đổi lịch trình của các phương tiện vận chuyển công cộng như: máy bay, tàu hỏa… thì công ty du lịch sẽ giữ quyền thay đổi lộ trình vì sự thuận tiện, an toàn cho khách hàng và sẽ không chịu trách nhiệm bồi thường những thiệt hại phát sinh.</p>
                                                <p>-&nbsp;Đối với khách hàng từ 70 tuồi đến 85 tuổi, gia đình vá quý khách phải cam kết đảm bảo tình trạng sức khỏe với cty chúng tôi trước khi tham gia tour. Nếu có bất cứ sự cố nào xảy ra trên tour, công ty&nbsp;sẽ không chịu trách nhiệm dưới mọi tình huống.</p>
                                                <p>-&nbsp;Công ty chúng tôi không chịu trách nhiệm trong trường hợp khách tham gia đoàn vi phạm vào các điều khoản quy định về thủ tục xuất nhập cảnh hoặc bị từ chối nhập cảnh hay xuất cảnh theo quyết định của cơ quan an ninh sở tại Singapore hoặc tại Việt Nam. Chi phí tour sẽ không hoàn lại và các chi phí phát sinh (nếu có) sẽ do khách tự thanh toán.</p>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade " id="cancellationtabpanel1" aria-labelledby="cancellationtab1">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <p>- Hủy tour ngay sau khi đăng ký và ngoài 10 ngày trước khi tour khởi hành phí phạt = 40% tổng giá trị tour bị hủy.</p>
                                                <p>- Hủy tour trong vòng 10 ngày phí phạt = 75% tổng giá tour chương trình.</p>
                                                <p>- Sau thời gian trên phí phạt = 100% tổng giá trị chương trình. (Các ngày trên chỉ tính theo ngày làm việc,và không chấp nhận hủy tour qua điện thoại.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form class="form-horizontal row p-10 form-validation" role="form" method="post" action="<?= ROOT_URL ?>/index.php?ctl=PhanHoiKhachHang&act=doUpdate<?= isset($_GET["id"]) ? "&id=" . $_GET["id"] : "" ?><?= isset($_GET["tourid"]) ? "&tourid=" . $_GET["tourid"] : "" ?>">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourHeaderContent" style="margin-top: 0px">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding tourDetailContainer v-margin-bottom-30">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding" id="tour-schedule">
                                <h6 class="vcolor-primary" style="border-bottom: solid 1px #5a6268">
                                    Bình luận
                                </h6>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourScheduleContainer v-margin-bottom-15">
                                    <div class="col-md-2 hidden-xs">
                                        <img src="<?= $_Avatar ?>" class="profile-pic" />
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-10">
                                        <textarea style="width: 100%" name="txtBinhLuan" required></textarea>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <button type="submit" class="btn btn-sm btn-primary" style="float: right" name="btnSave" value="save" onclick="return kiem_tra_email()"><i class="ace-icon fa fa-arrow-circle-o-right"></i> Gửi </button>
                                    </div>
                                </div>
                                <div class="edit-booking-block-separator"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <!-- about module -->
                <?php
                if (!is_null($List_binh_luan)) {
                    $i = 1;
                    $Ids = '';
                    foreach ($List_binh_luan as $value) {
                        ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                    <center> <img src="<?= $_Avatar ?>" class="profile-pic" /></center>
                                    <p style="text-align: center"><?= $value["TenKH"] ?></p>
                                </div>
                                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tourItemContentPrice">
                                        <div class="col-md-8 no-padding"><div class="edit-booking-guest-info-title"><?= $value["NoiDung"] ?></div></div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="edit-booking-block-separator no-padding"></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#TongKhach').val(1);
        $('#SoKhach').on('change', function (e) {
            SoKhach = $('#SoKhach').val();
            TongTien = parseFloat($('#GiaTour').val()) * parseFloat(SoKhach);
            $('#TongTien').text(coverMoney(TongTien) + " VND");

            $('#dattour').click(function () {
                $('#giatiendattour').val(TongTien);
                $('#TongKhach').val(SoKhach);
            });
        });


        function coverMoney($value) {
            var result = parseFloat($value).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
            return result;
        }
    });
</script>

<!--<form name="myform" role="form" method="post" action="<?= ROOT_URL ?>/index.php?ctl=DatTour&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>">-->
<div class="modal fade" id="edit_TaiSan" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông tin đặt tour</h4>
            </div>
            <div class="modal-body" style="padding-bottom: 20px; padding-top: 20px">
                <center><h3 class="tourDetailheadLine vcolor-primary no-padding"><?= isset($_TenTour) ? $_TenTour : "" ?></h3></center>
                <div class="row" style="padding-bottom: 10px">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label class="col-xs-12 col-sm-12 col-md-12 col-lg-4 control-label">Số lượng khách</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <input type="number" name="txtSoLuongKhach" id="TongKhach" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label class="col-xs-12 col-sm-12 col-md-12 col-lg-4 control-label">Tổng tiền</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <input type="text" name="txtTongTien" class="form-control" id="giatiendattour" value="<?= isset($_GiaTien) ? $_GiaTien : "" ?>" readonly />
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label class="col-xs-12 col-sm-12 col-md-12 col-lg-4 control-label">Khởi hành</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <input type="text" name="txtNgayBatDau" id="NgayDi" class="form-control"  value="<?= isset($_NgayBatDau) ? date('d/m/Y', strtotime($_NgayBatDau)) : "" ?>" readonly />
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label class="col-xs-12 col-sm-12 col-md-12 col-lg-4 control-label">Kết thúc</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <input type="text" name="txtNgayKetThuc" id="NgayVe" class="form-control" value="<?= isset($_NgayKetThuc) ? date('d/m/Y', strtotime($_NgayKetThuc)) : "" ?>" readonly />
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label class="col-xs-12 col-sm-12 col-md-12 col-lg-4 control-label">Yêu cầu khác</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <textarea name="txtHanhTrinh" id="HanhTrinh" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-bottom: 10px">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label class="col-xs-12 col-sm-12 col-md-12 col-lg-4 control-label">Địa chỉ khách hàng</label>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                            <input type="radio" name="data" onclick="hidediachi()" checked> Sử dụng địa chỉ đăng nhập
                            <input type="radio" name="data" onclick="showdiachi()" style="margin-left: 5px"> Địa chỉ khác
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="diachikhac" style="display:none; margin-top: 5px">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-4">
                            <textarea  id="NoiKhoiHanh" class="form-control"></textarea>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <center><button type="submit" id='edit' class="btn btn-primary" style="width: 100%">Đặt tour</button></center>
            </div>
        </div>

    </div>
</div>
<!--</form>-->

<script type="text/javascript" language="javascript">


    function showdiachi() {
        $("#diachikhac").css('display', 'block');
    }
    function hidediachi() {
        $("#diachikhac").val("");
        $("#diachikhac").css('display', 'none');
    }

    $("#edit").click(function () {
        var SoLuongKhach = $("#TongKhach").val();
        var NoiKhoiHanh = $("#NoiKhoiHanh").val();
        var HanhTrinh = $("#HanhTrinh").val();
        var NgayDi = $("#NgayDi").val();
        var NgayVe = $("#NgayVe").val();

        var postPage = '<?= ROOT_URL ?>/index.php?ctl=DatTour&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>';
                var postData = {
                    postType: "ajax",
                    txtSoLuongKhach: SoLuongKhach, txtNgayBatDau: NgayDi, txtNgayKetThuc: NgayVe, txtNoiKhoiHanh: NoiKhoiHanh, txtHanhTrinh: HanhTrinh
                };
                var post = $.post(postPage, postData)
                        .done(function (data) {
                            if (data === "ok") {
                                $('#edit_TaiSan').modal('hide');
                                alert("Thành công");
                            } else {
                                alert("Bạn chưa đăng nhập!");
                            }
                        })
                        .fail(function () {

                        });
            });
</script>
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
    .edit-booking-block-separator:last-child {
        height: 1px;
        margin-top: 10px;
        margin-bottom: 10px;
        background-color: #e1e1e1;
        border-width: inherit;
        border-color: #e1e1e1;
        clear: both;
    }
</style>