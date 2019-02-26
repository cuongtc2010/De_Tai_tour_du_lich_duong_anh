<?php
$root_ctl = "Phanhoitukhachhang";
?>
<div class="card">
    <div class="card-body">
        <div class="form-validation">
            <form class="form-valide" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?>" method="post" novalidate="novalidate">

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Khách hàng <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <select class="form-control" name="txtKhachHang">
                            <option value="">-- Chọn --</option>
                            <?php
                            if (!is_null($list_khachhang)) {
                                foreach ($list_khachhang as $value) {
                                    if ($value["Id"] == $_KHId) {
                                        ?>
                                        <option value="<?= $value["Id"] ?>" selected><?= $value["TenKH"] ?></option>    
                                    <?php } else { ?>
                                        <option value="<?= $value["Id"] ?>"><?= $value["TenKH"] ?></option>    
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Nội Dung phản hồi <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <textarea class="ckeditor" name="txtNoiDung" ><?= isset($_NoiDung) ? $_NoiDung : "" ?></textarea>                        
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