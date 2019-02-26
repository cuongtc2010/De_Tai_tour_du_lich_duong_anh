<?php
$root_ctl = "ChucVu";
?>
<div class="card">
    <div class="card-body">
        <div class="form-validation">
            <form class="form-valide" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>" method="post" novalidate="novalidate">
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Mã chức vụ <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtMaCV" placeholder="Nhập Mã chức vụ.." value="<?= isset($_MaCV) ? $_MaCV : "" ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Tên chức vụ <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtTenCV" placeholder="Nhập tên chức vụ.." value="<?= isset($_TenCV) ? $_TenCV : "" ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Phụ cấp <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtPhuCap" value="<?= isset($_PhuCap) ? $_PhuCap : "" ?>"  >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Lương <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <select class="form-control" name="txtLuongId">
                            <option value="">-- Chọn --</option>
                            <?php
                            if (!is_null($list_luong)) {
                                foreach ($list_luong as $value) {
                                    if ($value["Id"] == $_LuongId) {
                                        ?>
                                        <option value="<?= $value["Id"] ?>" selected><?= $value["MucLuong"] ?></option>    
                                    <?php } else { ?>
                                        <option value="<?= $value["Id"] ?>"><?= $value["MucLuong"] ?></option>    
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
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
                txtMaCV: "required",
                txtTenCV: "required",
                txtLuongId: "required",
                
            },
            messages: {
                txtMaCV: "vui lòng nhập mã chức vụ",
                txtTenCV: "vui lòng nhập tên chức vụ",
                txtLuongId: "vui lòng chọn mức lương"
            }
        });
    });
</script>