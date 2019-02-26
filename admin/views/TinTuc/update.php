<?php
$root_ctl = "TinTuc";
?>
<script src="plugin/ckfinder/ckfinder_v1.js"></script>
<script type="text/javascript">
    function BrowseServer() {
        var finder = new CKFinder();
        finder.BasePath = 'plugin/ckfinder/';
        finder.startupPath = "Images:/";
        finder.SelectFunction = SetFileField;
        finder.Popup();
    }
    function SetFileField(fileUrl) {
        //var _fileUrl = fileUrl.replace(/^.*[\/\\]/g, '');
        $("input[name='HinhAnh']").val(fileUrl);
        $('#img-slider').attr("src", fileUrl);
    }
    function DeleteImage() {
        var ok = confirm("Bạn có muốn xóa ảnh");
        if (ok) {
            $("input[name='Image']").val("");
            $('#img-slider').attr("src", "templates/images/no_images.png");
        }
    }
    function gotoPage() {
        var url = $("input[name='Url']").val();
        window.open(url, "_blank");
    }
</script>
<div class="card">
    <div class="card-body">
        <div class="form-validation">
            <form class="form-valide" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>" method="post" novalidate="novalidate">

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Tên tin tức <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtTenTinTuc" placeholder="Nhập tên tin tức.." value="<?= isset($_TenTinTuc) ? $_TenTinTuc : "" ?>" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Nội dung<span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <textarea class="ckeditor" name="txtNoiDung" required><?= isset($_NoiDung) ? $_NoiDung : "" ?>  </textarea>                   
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Hình ảnh <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <div class="cform-group row">						
                            <img src="<?= (!empty($_HinhAnh)) ? $_HinhAnh : UPLOAD_IMAGE_URL . "/" . "no-image.jpg" ?>" class="img-responsive" id="img-slider" style="border:1px solid #ccc;cursor: pointer;width:200px;height: 100%" onclick="BrowseServer()"/>
                            <div class="row">
                                <div class="col-md-6" style="padding-right: 5px">
                                    <button type="button" class="btn btn-primary btn-sm btn-block" onclick="BrowseServer()"><i class="fa fa-image"></i> Chọn ảnh</button>
                                </div>

                                <div class="col-md-6" style="padding-left: 0px">
                                    <button type="button" class="btn btn-danger btn-sm btn-block" onclick="DeleteImage()"><i class="fa fa-trash"></i> Xóa ảnh</button>
                                </div>
                            </div>
                            <input type="hidden" class="form-control input-sm" placeholder="" name="HinhAnh" value="<?= $_HinhAnh ?>">    
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
                txtTenTinTuc: "required",
                txtHinhAnh: "required"

            },
            messages: {
              txtTenTinTuc: "vui lòng nhập tên tin tức",
                txtHinhAnh: "vui lòng chọn hình ảnh"
            }
        });
    });
</script>
