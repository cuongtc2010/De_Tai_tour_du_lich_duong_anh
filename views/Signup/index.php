<?php
$root_ctl = "Signup";
?>
<form class="form-horizontal row p-10 form-validation" role="form" method="post" action="<?= ROOT_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doSignup">
    <div class="panel panel-login">
        <div class="panel-heading">
            <h2 class="m-b-10 text-center">ĐĂNG KÝ KHÁCH HÀNG</h2>
            <div class="row">
                <div class="col-md-12 m-b-5">
                    <legend><strong>Thông Tin khách hàng</strong></legend>

                </div>

                <div class="col-md-12 m-b-5">
                    <div class="col-md-6 m-b-5">
                        <label class="col-md-4 control-label lb-required">Họ tên <span class="text-danger">*</span></label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="text" class="form-control input-sm" placeholder="" name="txtTenKH" required>       
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 m-b-5">
                        <label class="col-lg-4 control-label lb-required">Email <span class="text-danger">*</span></label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="email" class="form-control input-sm" placeholder="Nhập email...." name="txtEmail" required>   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 m-b-5">
                    <div class="col-md-6 m-b-5">
                        <label class="col-md-4 control-label lb-required">Tên đăng nhập <span class="text-danger">*</span></label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="text" class="form-control input-sm" placeholder="" name="txtTenDangNhap" required>   
                            </div>
                        </div>
                        <label class="col-md-4 control-label lb-required">Mật khẩu <span class="text-danger">*</span></label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="password" class="form-control input-sm" style="height: 30px; margin-bottom: 0" placeholder="Nhập mật khẩu" name="txtMatKhau" required>   
                            </div>
                        </div>
                        <label class="col-md-4 control-label lb-required">CMND</label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="text" class="form-control input-sm" placeholder="" name="txtCMND" required>       
                            </div>
                        </div>
                        <label class="col-md-4 control-label lb-required">Giới tính <span class="text-danger">*</span></label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <select class="form-control input-sm" name="txtGioiTinh" required>
                                    <option value="">-- Chọn --</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 m-b-5">
                        <label class="col-md-4 control-label lb-required">Địa chỉ</label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="text" class="form-control input-sm" placeholder="" name="txtDiaChi" required>       
                            </div>
                        </div>
                        <label class="col-md-4 control-label lb-required">Ngày sinh</label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="date" class="form-control input-sm" placeholder="" name="txtNgaySinh" required>       
                            </div>
                        </div>
                        <label class="col-md-4 control-label lb-required">Số điện thoại</label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="text" class="form-control input-sm" placeholder="" name="txtSDT" required>       
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 m-b-5">
                    <div class="form-group">
                        <label  class="col-md-3"></label>
                        <div class="col-md-9">
                            <input type="hidden" value="<?= $_UserId ?>" name="UserId"/>

                            <button type="submit" class="btn btn-sm btn-primary" name="btnSave" value="save" onclick="return kiem_tra_email()"><i class="ace-icon fa fa-floppy-o"></i> Đăng ký </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>