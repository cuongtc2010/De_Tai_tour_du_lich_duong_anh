<?php
$root_ctl = "quanlydattour";
?>
<div class="card">
    <div class="card-body">
        <div class="form-validation">
            <form class="form-valide" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>" method="post" novalidate="novalidate">


                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Mã đặt tour </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtMaDatTour" readonly value="<?= isset($_MaDatTour) ? $_MaDatTour : "" ?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Tour <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <select class="form-control" name="txtTourId">
                            <option value="">-- Chọn --</option>
                            <?php
                            if (!is_null($list_tour)) {
                                foreach ($list_tour as $value) {
                                    if ($value["Id"] == $_TourId) {
                                        ?>
                                        <option value="<?= $value["Id"] ?>" selected><?= $value["TenTour"] ?></option>    
                                    <?php } else { ?>
                                        <option value="<?= $value["Id"] ?>"><?= $value["TenTour"] ?></option>    
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Tên khách hàng <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <select class="form-control" name="txtKhachHang">
                            <option value="">-- Chọn --</option>
                            <?php
                            if (!is_null($list_KH)) {
                                foreach ($list_KH as $value) {
                                    if ($value["Id"] == $_KHId) {
                                        ?>
                                        <option value="<?= $value["Id"] ?>" selected><?= $value["TenKH"] ?></option>    
                                    <?php } else { ?>
                                        <option value="<?= $value["Id"] ?>"><?= $value["TenKH"] ?></option>    
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Số Lượng Khách Đi<span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtSoLuongKhachDi" value="<?= isset($_SoLuongKhachDi) ? $_SoLuongKhachDi : "" ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Ngày Đi</label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" name="txtNgayDi" value="<?= isset($_NgayDi) ? $_NgayDi : "" ?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Ngày Về</label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" name="txtNgayVe" value="<?= isset($_NgayVe) ? $_NgayVe : "" ?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Nơi Khởi Hành</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtNoiKhoiHanh" value="<?= isset($_NoiKhoiHanh) ? $_NoiKhoiHanh : "" ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Hành Trình</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtHanhTrinh" value="<?= isset($_HanhTrinh) ? $_HanhTrinh : "" ?>" >
                    </div>
                </div>






                <div class="form-group row">
                    <div class="col-lg-8 ml-auto">
                        <button type="submit" name="btnSave" value="save" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-floppy-o"></i> Lưu</button>

                        <a href="index.php?ctl=<?= $root_ctl ?>" class="btn btn-sm btn-danger"><i class="ace-icon fa fa-arrow-left"></i> Quay lại </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {


        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $(".form-valide").validate({

            errorClass: "invalid-feedback animated fadeInDown",
            errorElement: "div",
            errorPlacement: function (e, a) {
                jQuery(a).parents(".form-group > div").append(e);
            },
            highlight: function (e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid");
            },
            success: function (e) {
                jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove();
            },
            rules: {
               
                txtTourId: "required",
                txtKhachHang: "required",
                txtSoLuongKhachDi: "required"

            },
            messages: {
            
                txtTourId: "vui lòng chọn tour",
                txtKhachHang: "vui lòng chọn tên khách hàng",
                txtSoLuongKhachDi: "vui lòng chọn số lượng khách đi"
            }
        });
    });
</script>

