<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TongQuanController
 *
 * @author phamc
 */
class TongQuanController {
   const FOLDER_VIEW = 'TongQuan';

    public function index() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
            $ThongKeModel = new ThongKeModel();
            $TongDoanhThu = $ThongKeModel->getTongDoanhThu();
            $TongTourDaDat = $ThongKeModel->getTongTourDaDat();
            $SoLuongTour = $ThongKeModel->getSoLuongTour();
            $SoLuongKhach = $ThongKeModel->getSoLuongKhachHang();
            require_once ADMIN_VIEW_DIRECTORY . DS . TongQuanController::FOLDER_VIEW . DS . "index.php";
        } else {
            UtilityController::message("Bạn không phải quản trị viên");
            UtilityController::gotoPage(ROOT_ADMIN_URL);
        }
    }
}
