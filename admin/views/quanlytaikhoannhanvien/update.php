<?php
$root_ctl = "quanlytaikhoannhanvien";
?>
<div class="card">
    <div class="card-body">
        <div class="form-validation">
            <form class="form-valide" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate<?= !empty($_Id) ? "&id=" . $_Id : "" ?><?= !empty($_NVId) ? "&NVId={$_NVId}" : "" ?>" method="post" novalidate="novalidate">
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Tên đăng nhập <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="txtusername" placeholder="Nhập tên đăng nhập.." value="<?= isset($_username) ? $_username : "" ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Chức vụ <span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <select class="form-control" name="txtChucVuId">
                            <option value="">-- Chọn --</option>
                            <?php
                            if (!is_null($List_Chuc_Vu)) {
                                foreach ($List_Chuc_Vu as $value) {
                                    if ($value["Id"] == $_ChucVuId) {
                                        ?>
                                        <option value="<?= $value["Id"] ?>" selected><?= $value["TenCV"] ?></option>    
                                    <?php } else { ?>
                                        <option value="<?= $value["Id"] ?>"><?= $value["TenCV"] ?></option>    
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Trạng Thái </label>
                    <div class="col-lg-6">
                        <select class="form-control" name="txtTrangThai" value="<?= isset($_TrangThai) ? $_TrangThai : "" ?>">
                            <option value="">-- Chọn --</option>
                            <option value="0" <?= $_TrangThai == 0 ? "selected" : ""  ?>>Hoạt động</option>
                            <option value="1" <?= $_TrangThai == 1 ? "selected" : ""  ?>>Không hoạt động</option>
                        </select>
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