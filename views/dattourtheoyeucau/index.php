<?php
$root_ctl = "dattourtheoyeucau";
?>
<form class="form-horizontal row p-10" role="form" method="post" action="<?= ROOT_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=yeucautour">
    <div class="panel panel-login">
        <div class="panel-heading">
            <h2 class="m-b-10 text-center">ĐĂNG KÝ TOUR THEO YÊU CẦU KHÁCH HÀNG</h2>
            <div class="row">
                <div class="col-md-12 m-b-5">
                    <legend><strong>Thông Tin tour theo yêu cầu khách hàng</strong></legend>

                </div>
                <div class="col-md-12 m-b-5">
                    
                    <label class="col-md-2 control-label lb-required">Ngày đi</label>
                    <div class="col-md-4 p-r-15">   
                        <div class="form-group m-b-5">
                            <input type="date" class="form-control input-sm" placeholder="" name="txtNgayDi" required>   
                        </div>
                    </div>
                    <label class="col-md-2 control-label lb-required">Ngày về</label>
                    <div class="col-md-4 p-r-15">   
                        <div class="form-group m-b-5">
                            <input type="date" class="form-control input-sm" style="height: 30px; margin-bottom: 0" placeholder="" name="txtNgayVe" required>   
                        </div>
                    </div>
                    <label class="col-md-2 control-label lb-required">Số lượng khách đi</label>
                    <div class="col-md-4 p-r-15">   
                        <div class="form-group m-b-5">
                            <input type="text" class="form-control input-sm" placeholder="" name="txtSoLuongKhach" required>       
                        </div>
                    </div>
                    <label class="col-md-2 control-label lb-required">Nơi khởi hành</label>
                    <div class="col-md-4 p-r-15">   
                        <div class="form-group m-b-5">
                            <input type="text" class="form-control input-sm" placeholder="" name="txtNoiKhoiHanh" required>       
                        </div>
                    </div>
                    <label class="col-md-2 control-label lb-required">Hành Trình</label>
                    <div class="col-md-4 p-r-15">   
                        <div class="form-group m-b-5">
                            <input type="text" class="form-control input-sm" placeholder="" name="txtHanhTrinh" required>       
                        </div>
                    </div>
                    <label class="col-md-2 control-label lb-required">Ghi Chú</label>
                    <div class="col-md-4 p-r-15">   
                        <div class="form-group m-b-5">
                              
                            <textarea class="form-control input-sm" placeholder="" name="txtGhiChu" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 m-b-5">
                        <div class="form-group">
                            <center> <button type="submit" class="btn btn-sm btn-primary" name="btnSave" value="save" onclick="return kiem_tra_email()"><i class="ace-icon fa fa-floppy-o"></i> Yêu Cầu </button></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</form>