<?php
    $root_ctl = "Login";
?>
<div class="clearfix"></div>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Đăng nhập</h1><br>
            <form role="form" method="post" action="<?= ROOT_URL ?>/index.php?ctl=<?= $root_ctl ?>&act=doLogin<?= !empty($_Id) ? "&id=" . $_Id : "" ?>">
                <input type="text" name="username" placeholder="Tài khoản">
                <input type="password" name="password" placeholder="Mật khẩu">
                <center><button type="submit" class="btn btn-sm btn-primary" name="btnSave" value="save"><i class="ace-icon fa fa-floppy-o"></i> Đăng nhập </button></center>
            </form>
            <div class="login-help text-center">
                <a href="#">Quên mật khẩu</a>
            </div>
        </div>
    </div>
</div>