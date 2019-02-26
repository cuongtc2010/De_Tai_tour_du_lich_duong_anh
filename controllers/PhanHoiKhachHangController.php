<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhanHoiKhachHangController
 *
 * @author phamc
 */
class PhanHoiKhachHangController {

    public function doUpdate() {
        $phanhoikhachhang_Model = new PhanhoitukhachhangModel();

        $_KHId = isset($_SESSION["user_info_admin"]["khid"]) ? $_SESSION["user_info_admin"]["khid"] : "";
        $_TourId = isset($_GET["id"]) ? $_GET["id"] : "";
        $_NoiDung = isset($_POST["txtBinhLuan"]) ? $_POST["txtBinhLuan"] : "";

        if (!empty($_KHId)) {
            $phanhoikhachhang_Model->setKHId($_KHId);
        }
        if (!empty($_TourId)) {
            $phanhoikhachhang_Model->setTourId($_TourId);
        }
        if (!empty($_NoiDung)) {
            $phanhoikhachhang_Model->setNoiDung($_NoiDung);
        }
        
        if ($phanhoikhachhang_Model->insert()) {
            UtilityController::message("Phản hồi của bạn đã được gửi. Vui lòng chờ xét duyệt");
            UtilityController::gotoPage("index.php?ctl=Dm_tour&act=Chitiettour&id=".$_TourId);
        } else {
            UtilityController::messageError();
        }
        UtilityController::gotoPage("index.php?ctl=Dm_tour&act=Chitiettour&id=".$_TourId);
    }
}
