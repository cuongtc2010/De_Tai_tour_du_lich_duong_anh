<?php

class SignupController {

    const FOLDER_VIEW = 'Signup';

    public function index() {
        require_once HOME_VIEW_DIRECTORY . DS . SignupController::FOLDER_VIEW . DS . "index.php";
    }
    public function doSignup() {
        $Dm_kh_Model = new Dm_khModel();
        $User_Model = new UserModel();

        $_Email = isset($_POST["txtEmail"]) ? $_POST["txtEmail"] : "";
        $_TenDangNhap = isset($_POST["txtTenDangNhap"]) ? $_POST["txtTenDangNhap"] : "";
        $_MatKhau = isset($_POST["txtMatKhau"]) ? $_POST["txtMatKhau"] : "";
        $_TenKH = isset($_POST["txtTenKH"]) ? $_POST["txtTenKH"] : "";
        $_DiaChi = isset($_POST["txtDiaChi"]) ? $_POST["txtDiaChi"] : "";
        $_GioiTinh = isset($_POST["txtGioiTinh"]) ? $_POST["txtGioiTinh"] : "";
        $_SDT = isset($_POST["txtSDT"]) ? $_POST["txtSDT"] : "";
        $_NgaySinh = isset($_POST["txtNgaySinh"]) ? $_POST["txtNgaySinh"] : "";
        $_CMND = isset($_POST["txtCMND"]) ? $_POST["txtCMND"] : "";
       

        if (!empty($_MaKH)) {
            $Dm_kh_Model->setMaKH($_MaKH);
        }
        if (!empty($_TenKH)) {
            $Dm_kh_Model->setTenKH($_TenKH);
        }
        if (!empty($_TenDangNhap)) {
            $Dm_kh_Model->setTenDangNhap($_TenDangNhap);
        }
        if (!empty($_MatKhau)) {
            $Dm_kh_Model->setMatKhau($_MatKhau);
        }
        if (!empty($_DiaChi)) {
            $Dm_kh_Model->setDiaChi($_DiaChi);
        }
        if (!empty($_GioiTinh)) {
            $Dm_kh_Model->setGioiTinh($_GioiTinh);
        }
        if (!empty($_SDT)) {
            $Dm_kh_Model->setSDT($_SDT);
        }
        if (!empty($_NgaySinh)) {
            $Dm_kh_Model->setNgaySinh($_NgaySinh);
        }
        if (!empty($_Email)) {
            $Dm_kh_Model->setEmail($_Email);
        }
        if (!empty($_CMND)) {
            $Dm_kh_Model->setCMND($_CMND);
        }
        if (!empty($_NgayDangKi)) {
            $Dm_kh_Model->setNgayDangKi($_NgayDangKi);
        }
        if (!empty($_TrangThai)) {
            $Dm_kh_Model->setTrangThai($_TrangThai);
        } else {
            if ($Dm_kh_Model->insert()) {
                UtilityController::message("Đăng ký thành công");
                UtilityController::gotoPage("index.php");
            } else {
                UtilityController::messageError();
            }
            UtilityController::gotoPage("index.php?ctl=Signup");
        }
    }

}
