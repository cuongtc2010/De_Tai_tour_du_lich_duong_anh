<?php
$root_ctl = "DoiMatKhau";
?>

<div class="card">
    <div class="card-body">
        <div class="form-validation">
            <form class="form-valide" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>" method="post" novalidate="novalidate">
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Mật khẩu cũ <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="txtMatKhauCu" placeholder="Nhập mật khẩu cũ.."  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Mật khẩu mới <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" id="txtMatKhauMoi" name="txtMatKhauMoi" placeholder="Nhập mật khẩu mới.."  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Nhập lại mật khẩu mới <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="password" class="form-control" name="NhapLaiMatKhauMoi" placeholder="Nhập mật lại khẩu mới.."  required>
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
                "txtMatKhauCu": "required",
                "txtMatKhauMoi": {
                    required: true,
                    minlength: 6},
                "NhapLaiMatKhauMoi": {required: !0, equalTo: "#txtMatKhauMoi"}

            },
            messages: {
                "txtMatKhauCu": "Vui lòng mật khẩu cũ",
                "txtMatKhauMoi": {required :"Vui lòng nhập mật khẩu mới", minlength : "Mật khẩu phải trên 8 ký tự"},
                "NhapLaiMatKhauMoi": {required: "Vui lòng nhập lại mật khẩu mới", equalTo: "Không trùng với mật khẩu mới"}
            }
        });
    });
</script>