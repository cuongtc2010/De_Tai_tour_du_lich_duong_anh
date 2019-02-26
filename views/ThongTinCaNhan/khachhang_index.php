<?php
$root_ctl = "ThongTinCaNhan";
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
<form class="form-horizontal row p-10" role="form" method="post" action="<?= ROOT_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>">
    <div class="panel panel-login">
        <div class="panel-heading">
            <h2 class="m-b-10 text-center"></h2>
            <div class="row">
                <div class="col-md-12 m-b-5">
                    <legend><strong>Thông Tin khách hàng</strong></legend>

                </div>
                <div class="col-md-12 m-b-5">
                    <div class="col-md-2 m-b-5">						
                        <center><img src="<?= (!empty($_HinhAnh)) ? $_HinhAnh : UPLOAD_IMAGE_URL . "/" . "no-image.jpg" ?>" class="img-responsive" id="img-slider" style="border:1px solid #ccc;cursor: pointer;width:150px;height: 150px; margin-bottom: 10px" onclick="BrowseServer()"/></center>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary btn-sm btn-block" onclick="BrowseServer()"><i class="fa fa-image"></i> Chọn ảnh</button>
                            </div>
                        </div>
                        <input type="hidden" class="form-control input-sm" placeholder="" name="HinhAnh" value="<?= $_HinhAnh ?>">    

                    </div>
                    <div class="col-md-10 m-b-5">
                        <label class="col-md-2 control-label lb-required">Họ tên <span class="text-danger">*</span></label>
                        <div class="col-md-10 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="text" class="form-control input-sm" placeholder="" name="txtTenKH" value="<?= $_TenKH ?>">       
                            </div>
                        </div>
                        <label class="col-md-2 control-label lb-required">Giới tính <span class="text-danger">*</span></label>
                        <div class="col-md-10 p-r-15">   
                            <div class="form-group m-b-5">
                                <select class="form-control input-sm" name="txtGioiTinh" required>
                                    <option value="">-- Chọn --</option>
                                    <option value="1"  <?= $_GioiTinh == 1 ? "selected" : "" ?>>Nam</option>
                                    <option value="2" <?= $_GioiTinh == 2 ? "selected" : "" ?>>Nữ</option>
                                </select>
                            </div>
                        </div>
                        <label class="col-md-2 control-label lb-required">Số điện thoại</label>
                        <div class="col-md-10 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="text" class="form-control input-sm" placeholder="" name="txtSDT" value="<?= $_SDT ?>">       
                            </div>
                        </div>
                        <label class="col-md-2 control-label lb-required">Địa chỉ</label>
                        <div class="col-md-10 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="text" class="form-control input-sm" placeholder="" name="txtDiaChi" value="<?= $_DiaChi ?>">       
                            </div>
                        </div>
                        <label class="col-md-2 control-label lb-required">Ngày sinh</label>
                        <div class="col-md-10 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="date" class="form-control input-sm" placeholder="" name="txtNgaySinh" value="<?= $_NgaySinh ?>">       
                            </div>
                        </div>
                    </div>

                </div>
                

                <div class="col-md-12 m-b-5">

                    <legend><strong>Đổi mật khẩu</strong></legend>
                    <div class="col-md-10 col-md-offset-2 m-b-5">
                        <label class="col-md-2 control-label lb-required">Mật khẩu <span class="text-danger">*</span></label>
                        <div class="col-md-10 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="password" class="form-control input-sm" style="height: 30px; margin-bottom: 0" placeholder="Nhập mật khẩu" name="txtMatKhau" value="<?= $_MatKhau ?>">   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 m-b-5">
                    <div class="col-md-10 col-md-offset-2 m-b-5">
                        
                        <div class="col-md-10 col-md-offset-2  p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="hidden" value="<?= $_UserId ?>" name="UserId"/>

                            <button type="submit" class="btn btn-sm btn-primary" style="float: right" name="btnSave" value="save" onclick="return kiem_tra_email()"><i class="ace-icon fa fa-floppy-o"></i> Lưu thông tin  </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>