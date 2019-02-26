<?php
$root_ctl = "quanlyloaitour";
?>
<div class="card">
    <div class="card-body">
        <div class="form-validation">
            <form class="form-valide" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>" method="post" novalidate="novalidate">


                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Mã loại <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtMaLoai" value="<?= !empty($_MaLoai) ? $_MaLoai : "" ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Tên Loại <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtTenLoai" value="<?= isset($_TenLoai) ? $_TenLoai : "" ?>" required>
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
                txtTenLoai: "required",
                

            },
            messages: {
              txtTenLoai: "vui lòng nhập tên loại"
               
            }
        });
    });
</script>
