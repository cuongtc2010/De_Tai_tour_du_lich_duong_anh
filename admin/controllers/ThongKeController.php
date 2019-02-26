<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ThongKeController
 *
 * @author phamc
 */
class ThongKeController {

    const FOLDER_VIEW = 'ThongKe';

    public function index() {

        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && ($_SESSION["user_info_admin"]["chucvuid"] != 5 && $_SESSION["user_info_admin"]["chucvuid"] != 3 && $_SESSION["user_info_admin"]["chucvuid"] != 2)) {
            $Thong_ke_Model = new ThongKeModel();

            $list = $Thong_ke_Model->getListTourHot();

            //$rowrount = $Post_bai_viet_model->getCount();
            //$phantrang = UtilityController::phantrang($rowrount, $num_rows_per_page, $page);

            require_once ADMIN_VIEW_DIRECTORY . DS . ThongKeController::FOLDER_VIEW . DS . "SoLuongDatTour.php";
        } else {
            UtilityController::message("Bạn không phải quản trị viên");
            UtilityController::gotoPage(ROOT_ADMIN_URL);
        }
    }

    public function DoanhThu() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && ($_SESSION["user_info_admin"]["chucvuid"] != 5 && $_SESSION["user_info_admin"]["chucvuid"] != 3 && $_SESSION["user_info_admin"]["chucvuid"] != 2)) {
            require_once ADMIN_VIEW_DIRECTORY . DS . ThongKeController::FOLDER_VIEW . DS . "DoanhThu.php";
        } else {
            UtilityController::message("Bạn không phải quản trị viên");
            UtilityController::gotoPage(ROOT_ADMIN_URL);
        }
    }

    public function getTongDoanhThu() {

        $ThongKeModel = new ThongKeModel();
        $DoanhThu = $ThongKeModel->getTongDoanhThu();
        if ($DoanhThu != null) {
            echo json_encode($DoanhThu);
            exit;
        } else {
            echo "";
            exit;
        }
    }
    public function getDoanhThuNgay() {

        $ThongKeModel = new ThongKeModel();
        $DoanhThu = $ThongKeModel->getDoanhThuNgay();
        if ($DoanhThu != null) {
            echo json_encode($DoanhThu);
            exit;
        } else {
            echo "";
            exit;
        }
    }
    public function getDoanhThuThang() {

        $ThongKeModel = new ThongKeModel();
        $DoanhThu = $ThongKeModel->getDoanhThuThang();
        if ($DoanhThu != null) {
            echo json_encode($DoanhThu);
            exit;
        } else {
            echo "";
            exit;
        }
    }
    public function getDoanhThuNam() {

        $ThongKeModel = new ThongKeModel();
        $DoanhThu = $ThongKeModel->getDoanhThuNam();
        if ($DoanhThu != null) {
            echo json_encode($DoanhThu);
            exit;
        } else {
            echo "";
            exit;
        }
    }
    public function getSoLuongDatTour() {

        $ThongKeModel = new ThongKeModel();
        $SoLuongDatTour = $ThongKeModel->getSoLuongDatTour();
        if ($SoLuongDatTour != null) {
            echo json_encode($SoLuongDatTour);
            exit;
        } else {
            echo "";
            exit;
        }
    }
    
    public function getTourTheoDiaDiem() {

        $ThongKeModel = new ThongKeModel();
        $SoLuongDatTour = $ThongKeModel->getTourTheoDiaDiem();
        if ($SoLuongDatTour != null) {
            echo json_encode($SoLuongDatTour);
            exit;
        } else {
            echo "";
            exit;
        }
    }

}
