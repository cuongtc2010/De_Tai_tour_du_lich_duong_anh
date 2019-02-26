<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatTourController
 *
 * @author phamc
 */
class DatTourController {

    const FOLDER_VIEW = 'DatTour';

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"])) {
            $_Id = "";
            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
            }

            $_quan_ly_dat_tour_Model = new quanlydattourModel();

            $_KHId = isset($_SESSION["user_info_admin"]["khid"]) ? $_SESSION["user_info_admin"]["khid"] : "";
            $_TourId = isset($_GET["id"]) ? $_GET["id"] : "";

            $_SoLuongKhachDi = isset($_POST["txtSoLuongKhach"]) ? $_POST["txtSoLuongKhach"] : "";
            $_NgayBatDau = isset($_POST["txtNgayBatDau"]) ? $_POST["txtNgayBatDau"] : "";

            $_NgayKetThuc = isset($_POST["txtNgayKetThuc"]) ? $_POST["txtNgayKetThuc"] : "";

            $_NoiKhoiHanh = isset($_POST["txtNoiKhoiHanh"]) ? $_POST["txtNoiKhoiHanh"] : "";
            if (empty($_NoiKhoiHanh)) {
                //$_NoiKhoiHanh = isset($_POST["txtNoiKhoiHanh"]) ? $_POST["txtNoiKhoiHanh"] : "";
                $DiaChiKH = $_quan_ly_dat_tour_Model->getDiaChiKhachHang($_KHId);
                $_NoiKhoiHanh = $DiaChiKH[0]["DiaChi"];
            }


            $_HanhTrinh = isset($_POST["txtHanhTrinh"]) ? $_POST["txtHanhTrinh"] : "";

            if (!empty($_KHId)) {
                $_quan_ly_dat_tour_Model->setKHId($_KHId);
            }
            if (!empty($_TourId)) {
                $_quan_ly_dat_tour_Model->setTourId($_TourId);
            }
            if (!empty($_SoLuongKhachDi)) {
                $_quan_ly_dat_tour_Model->setSoLuongKhachDi($_SoLuongKhachDi);
            }
            if (!empty($_NgayBatDau)) {
                $_NgayBatDau = UtilityController::formatToMySQL($_NgayBatDau);
                $_quan_ly_dat_tour_Model->setNgayDi($_NgayBatDau);
            }
            if (!empty($_NgayKetThuc)) {
                $_NgayKetThuc = UtilityController::formatToMySQL($_NgayKetThuc);
                $_quan_ly_dat_tour_Model->setNgayVe($_NgayKetThuc);
            }
            if (!empty($_NoiKhoiHanh)) {
                $_quan_ly_dat_tour_Model->setNoiKhoiHanh($_NoiKhoiHanh);
            }
            if (!empty($_HanhTrinh)) {
                $_quan_ly_dat_tour_Model->setHanhTrinh($_HanhTrinh);
            }
            if (!empty($_Id)) {
                if ($_quan_ly_dat_tour_Model->insert()) {
                    echo "ok";
                    exit();
                } else {
                    echo "no";
                    exit();
                }
            }
        } else {
            UtilityController::message("asdjkashdjk");
        }
    }

}
