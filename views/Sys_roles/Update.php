<?php
$root_ctl = "Sys_roles";
?>
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?= ROOT_ADMIN_URL ?>">Trang chủ</a>
                </li>
                <li>
                    <a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>">Sys_roles</a>
                </li>
                <li class="active">
                    <a href="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=update&id=<?= $id ?>">Cập nhật Sys_roles</a>
                </li>

            </ul><!-- /.breadcrumb -->
        </div>
        <form class="form-horizontal" method="post" action="<?= ROOT_ADMIN_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doUpdate&tabid=<?= $tabid ?><?= !empty($_Id) ? "&id=" . $_Id : "" ?>">
            <div class="page-content">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label  class="col-md-3 control-label no-padding-right lb-required ">Tên </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control input-sm  " placeholder="Nhập tên" name="Name" value="<?= isset($_Name) ? $_Name : "" ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-3 control-label no-padding-right"></label>
                                <div class="col-md-9">                                    
                                    <?php if ($_IsUpdate) { ?>
                                    <button type="submit" class="btn btn-sm btn-primary" name="btnSave" value="save" ><i class="ace-icon fa fa-floppy-o"></i> Lưu </button>
                                    <?php } ?>
                                    <a href="index.php?ctl=<?= $root_ctl ?>&tabid=<?= $tabid ?>" class="btn btn-sm btn-danger"><i class="ace-icon fa fa-arrow-left"></i> Quay lại </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.page-header -->
            </div><!-- /.page-content -->
        </form>
    </div>

</div>