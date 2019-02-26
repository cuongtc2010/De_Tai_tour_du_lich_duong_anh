<?php
$root_ctl = "ThongTinCaNhan";
?>
<form class="form-horizontal row p-10" role="form" method="post" action="<?= ROOT_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>">
    <div class="panel panel-login">
        <div class="panel-heading">
            <h2 class="m-b-10 text-center"></h2>
            <div class="row">
                <div class="col-md-12 m-b-5">
                    <legend><strong>Thông Tin khách hàng</strong></legend>

                </div>
                <div class="col-md-12 m-b-5">
                    <div class="col-md-6 m-b-5">
                        <label class="col-md-4 control-label lb-required">Họ tên </label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="text" class="form-control input-sm" placeholder="" name="txtHoTen" value="<?= $_TenNV ?>">       
                            </div>
                        </div>
                        <label class="col-md-4 control-label lb-required">Giới tính <span class="text-danger">*</span></label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <select class="form-control input-sm" name="txtGioiTinh" required>
                                    <option value="">-- Chọn --</option>
                                    <option value="1"  <?= $_GioiTinh == 1 ? "selected" : "" ?>>Nam</option>
                                    <option value="2" <?= $_GioiTinh == 0 ? "selected" : "" ?>>Nữ</option>
                                </select>
                            </div>
                        </div>
                        <label class="col-md-4 control-label lb-required">Số điện thoại</label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="text" class="form-control input-sm" placeholder="" name="txtSDT" value="<?= $_SDT ?>">       
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 m-b-5">
                        <label class="col-md-4 control-label lb-required">Địa chỉ</label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="text" class="form-control input-sm" placeholder="" name="txtDiaChi" value="<?= $_DiaChi ?>">       
                            </div>
                        </div>
                        <label class="col-md-4 control-label lb-required">Ngày sinh</label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="date" class="form-control input-sm" placeholder="" name="txtNgaySinh" value="<?= $_NgaySinh ?>">       
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="col-md-12 m-b-5">

                    <legend><strong>Mật khẩu</strong></legend>
                    <div class="col-md-6 m-b-5">
                        <label class="col-md-4 control-label lb-required">Mật khẩu <span class="text-danger">*</span></label>
                        <div class="col-md-8 p-r-15">   
                            <div class="form-group m-b-5">
                                <input type="password" class="form-control input-sm" style="height: 30px; margin-bottom: 0" placeholder="Nhập mật khẩu" name="txtMatKhau" value="<?= $_MatKhau ?>">   
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 m-b-5">
                    <div class="form-group">
                        <label  class="col-md-3"></label>
                        <div class="col-md-9">
                            <input type="hidden" value="<?= $_UserId ?>" name="UserId"/>

                            <button type="submit" class="btn btn-sm btn-primary" name="btnSave" value="save" onclick="return kiem_tra_email()"><i class="ace-icon fa fa-floppy-o"></i> Lưu thông tin  </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>