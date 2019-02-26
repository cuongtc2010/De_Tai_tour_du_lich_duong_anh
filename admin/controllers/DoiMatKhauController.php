<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DoiMatKhauController
 *
 * @author H.Tran
 */
class DoiMatKhauController {

    const FOLDER_VIEW = 'DoiMatKhau';

    public function index() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {

        require_once ADMIN_VIEW_DIRECTORY . DS . DoiMatKhauController::FOLDER_VIEW . DS . "index.php";
        }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $nhan_vien_model = new quanlytaikhoannhanvienModel();
        $_MatKhauCu = isset($_POST["txtMatKhauCu"]) ? $_POST["txtMatKhauCu"] : "";
        $_MatKhauMoi = isset($_POST["txtMatKhauMoi"]) ? $_POST["txtMatKhauMoi"] : "";
        $NhanVienId = $_SESSION["user_info_admin"]["userid"];
        if (!empty($_MatKhauCu)) {
            $_MatKhauCu = md5($_MatKhauCu);
            $checkmatkhau = $nhan_vien_model->getMatKhauCu($NhanVienId);
        }
        if ($_MatKhauCu == $checkmatkhau) {
            if (!empty($_MatKhauMoi)) {
                $_MatKhauMoi = md5($_MatKhauMoi);
                $nhan_vien_model->setPassword($_MatKhauMoi);
            }
            if (isset($NhanVienId)) {
                $nhan_vien_model->setId($NhanVienId);
            }
            if ($nhan_vien_model->update()) {
            UtilityController::message("Đã cập nhật thành công");
        } else {
            UtilityController::messageError();
            
        }
        } else {
            UtilityController::message("Mật khẩu cũ không đúng");
        }
        UtilityController::gotoPage("index.php?ctl=DoiMatKhau");
         }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

}
