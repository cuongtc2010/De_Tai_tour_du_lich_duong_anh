<?php

class dattourtheoyeucauController {

    const FOLDER_VIEW = 'dattourtheoyeucau';

    public function index() {
        if (isset($_SESSION["user_info_admin"]["khid"])) {
            require_once HOME_VIEW_DIRECTORY . DS . dattourtheoyeucauController::FOLDER_VIEW . DS . "index.php";
        } else {
            echo UtilityController::message("Bạn cần đăng nhập để đặt tour");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function yeucautour() {
        if (isset($_SESSION["user_info_admin"]["khid"])) {
            $_quan_ly_dat_tour_Model = new YeuCauTourModel();

            $_NgayDi = isset($_POST["txtNgayDi"]) ? $_POST["txtNgayDi"] : "";
            $_SoLuongKhach = isset($_POST["txtSoLuongKhach"]) ? $_POST["txtSoLuongKhach"] : "";
            $_NgayVe = isset($_POST["txtNgayVe"]) ? $_POST["txtNgayVe"] : "";
            $_NoiKhoiHanh = isset($_POST["txtNoiKhoiHanh"]) ? $_POST["txtNoiKhoiHanh"] : "";
            $_HanhTrinh = isset($_POST["txtHanhTrinh"]) ? $_POST["txtHanhTrinh"] : "";
            $_GhiChu = isset($_POST["txtGhiChu"]) ? $_POST["txtGhiChu"] : "";

            if (isset($_SESSION["user_info_admin"]["khid"])) {
                $_KHId = $_SESSION["user_info_admin"]["khid"];
            }



            if (!empty($_KHId)) {
                $_quan_ly_dat_tour_Model->setKHId($_KHId);
            }
            if (!empty($_SoLuongKhach)) {
                $_quan_ly_dat_tour_Model->setSoLuongKhach($_SoLuongKhach);
            }
            if (!empty($_NgayDi)) {
                $_quan_ly_dat_tour_Model->setNgayDi($_NgayDi);
            }
            if (!empty($_NgayVe)) {
                $_quan_ly_dat_tour_Model->setNgayVe($_NgayVe);
            }
            if (!empty($_NoiKhoiHanh)) {
                $_quan_ly_dat_tour_Model->setNoiKhoiHanh($_NoiKhoiHanh);
            }
            if (!empty($_HanhTrinh)) {
                $_quan_ly_dat_tour_Model->setHanhTrinh($_HanhTrinh);
            }

            if (!empty($_GhiChu)) {
                $_quan_ly_dat_tour_Model->setGhiChu($_GhiChu);
            }

            $_Id = "";
            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
            }
            if (!empty($_Id)) {
//            echo $_Id;
//            $_quan_ly_dat_tour_Model->setId($_Id);
//            if ($_quan_ly_dat_tour_Model->update()) {
//                UtilityController::message("Đã cập nhật thành công");
//            } else {
//                UtilityController::messageError();
//            }
//            UtilityController::gotoPage("index.php?ctl=quanlydattour&act=update&id=" . $_Id);
            } else {
                if ($_quan_ly_dat_tour_Model->yeucautour()) {
                    UtilityController::message("Đặt tour thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php");
            }
        } else {
            echo UtilityController::message("Bạn cần đăng nhập để đặt tour");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

}
