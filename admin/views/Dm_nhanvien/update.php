<?php
$root_ctl = "Dm_nhanvien";
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
                <!--                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Mã nhân viên <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="txtMaNV" placeholder="Nhập mã nhân viên.." value="<?= isset($_MaNV) ? $_MaNV : "" ?>" required>
                                    </div>
                                </div>-->
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Tên nhân viên <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtTenNV" placeholder="Nhập tên nhân viên.." value="<?= isset($_TenNV) ? $_TenNV : "" ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Tên đăng nhập <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtTenDangNhap" placeholder="Nhập tên tài khoản.." value="<?= isset($_TenDangNhap) ? $_TenDangNhap : "" ?>"  <?= isset($_GET["id"]) ? "readonly" : "" ?> required >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Giới Tính <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <select class="form-control" name="txtGioiTinh">
                            <option value="">-- Chọn --</option>
                            <option value="1" <?= isset($_GioiTinh) && $_GioiTinh == "1" ? "selected" : "" ?>>Nam</option>
                            <option value="2" <?= isset($_GioiTinh) && $_GioiTinh == "2" ? "selected" : "" ?>>Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Ngày sinh <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" name="txtNgaySinh" value="<?= isset($_NgaySinh) ? $_NgaySinh : "" ?>"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Số điện thoại <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtSDT" placeholder="Nhập số điện thoại.." value="<?= isset($_SDT) ? $_SDT : "" ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">CMND <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtCMND" placeholder="Nhập chứng minh nhân dân.." value="<?= isset($_CMND) ? $_CMND : "" ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Địa chỉ <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtDiaChi" placeholder="Nhập địa chỉ.." value="<?= isset($_DiaChi) ? $_DiaChi : "" ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Email <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtEmail" placeholder="Nhập email.." value="<?= isset($_Email) ? $_Email : "" ?>" required>
                    </div>
                </div>
                
                <div class="form-group row" id="chucvuid">
                    <label class="col-lg-4 col-form-label">Chức vụ <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" readonly class="form-control" value="<?= isset($_ChucVuId) ? $_ChucVuId : "" ?>">
                    </div>
                </div>

                
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Hình ảnh <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <div class="cform-group row">						
                    <img src="<?= (!empty($_HinhAnh)) ? $_HinhAnh : UPLOAD_IMAGE_URL . "/" ."no-image.jpg" ?>" class="img-responsive" id="img-slider" style="border:1px solid #ccc;cursor: pointer;width:200px;height: 100%" onclick="BrowseServer()"/>
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
            var update = <?= (isset($_GET["act"]) && !isset($_GET["id"])) ? true : false ?>;
            if(update){
                $("#chucvuid").hide();
            }
            
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
                    txtTenNV: "required",
                    txtTenDangNhap: "required",
                    txtSDT: {required: true, number:true},
                    txtEmail: {required: true, email:true},
                    txtCMND: "required",
                    txtGioiTinh: "required"

            },
            messages: {
                    txtTenKH: "Vui lòng nhập tên khách hàng",
                    txtTenDangNhap: "Vui lòng nhập tên đăng nhập",
                    txtSDT: {required: "Vui lòng nhập số điện thoại", number:"Không dùng ký tự"},
                    txtEmail: {required: "Vui lòng nhập email", email:"Địa chỉ email không đúng"},
                    txtCMND: "Vui lòng nhập số CMND",
                    txtGioiTinh: "Vui lòng chọn giới tính"
            }
    });
    });
</script>



