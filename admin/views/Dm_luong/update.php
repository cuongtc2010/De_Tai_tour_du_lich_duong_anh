<?php
$root_ctl = "Dm_luong";
?>
<script src="plugin/ckfinder/ckfinder_v1.js"></script>

<div class="card">
    <div class="card-body">
        <div class="form-validation">
            <form class="form-valide" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>" method="post" novalidate="novalidate">
                <!--                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Mã khách hàng <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="txtMaKH" placeholder="Nhập mã khách hàng.." value="<?= isset($_MaKH) ? $_MaKH : "" ?>" required>
                                    </div>
                                </div>-->
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Mã Lương <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtMaLuong" placeholder="Nhập Mã Lương.." value="<?= isset($_MaLuong) ? $_MaLuong : "" ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Mức Lương <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtMucLuong" placeholder="Nhập Mức Lương.." value="<?= isset($_MucLuong) ? $_MucLuong : "" ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Hệ Số Lương </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtHeSoLuong" placeholder="Nhập Hệ Số Lương.." value="<?= isset($_HeSoLuong) ? $_HeSoLuong : "" ?>" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Ngày Áp Dụng <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" name="txtNgayApDung" placeholder="Nhập Ngày Áp Dụng .." value="<?= isset($_NgayApDung) ? $_NgayApDung : "" ?>" required>
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
                txtMaLuong: "required",
                txtMucLuong: "required",
                txtNgayApDung: "required",
            },
            messages: {
               txtMaLuong: "vui lòng nhập mã lương",
                txtMucLuong: "vui lòng nhập mức lương",
                txtNgayApDung: "vui lòng nhập ngày áp dụng"
            }
        });
    });
</script>

