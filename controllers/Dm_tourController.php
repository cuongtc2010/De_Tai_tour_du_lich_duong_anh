<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dm_tourController
 *
 * @author pc
 */
class Dm_tourController {

    const FOLDER_VIEW = 'Dm_tour';

    public function index() {
        $Dm_tour_Controller = new Dm_tourModel();
        $list = $Dm_tour_Controller->getList();
        $list_tour_nuoc_ngoai = $Dm_tour_Controller->getListTourNuocNgoai();
        $list_tour_trong_nuoc = $Dm_tour_Controller->getListTourTrongNuoc();
        $list_tour_mien_tay = $Dm_tour_Controller->getListTourMienTay();
        $Dm_tourmoi_model = new ThongKeModel();
        $list_tour_pho_bien = $Dm_tourmoi_model->getTourMoiNhat();
        //$rowrount = $Post_bai_viet_model->getCount();
        //$phantrang = UtilityController::phantrang($rowrount, $num_rows_per_page, $page);

        require_once HOME_VIEW_DIRECTORY . DS . Dm_tourController::FOLDER_VIEW . DS . "index.php";
    }

    public function TimKiemTour() {
        $Dm_tour_Controller = new Dm_tourModel();
        $_TenTour = isset($_POST["txtSearch"]) ? $_POST["txtSearch"] : "";
        if (!empty($_TenTour)) {
            $Dm_tour_Controller->setTenTour($_TenTour);
        }
        $list_search = $Dm_tour_Controller->Timtour();
        require_once HOME_VIEW_DIRECTORY . DS . Dm_tourController::FOLDER_VIEW . DS . "timkiemtour.php";
    }

    public function Chitiettour() {
        $Dm_tour_Model = new Dm_tourModel();
        $phanhoikhachhang = new PhanhoitukhachhangModel();
        $List_binh_luan = $phanhoikhachhang->getListActive();
        //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
        $_Id = "";
        $_MaTour = "";
        $_TenTour = "";
        $_NgayBatDau = "";
        $_NgayKetThuc = "";
        $_MaDM = "";
        $_GiaTien = "";
        $_TinhTrang = "";
        $_SoLuongKhach = "";
        $_LoaiTour = "";
        $_DiaDiem = "";
        $_MoTa = "";
        $_HinhAnh = "";
        $_LichTrinh = "";
        $_GiaTourBaoGom = "";
        $_GiaTourKhongBaoGom = "";
        $_PhuThu = "";
        $_Avatar = "";
        if (isset($_SESSION["user_info_admin"])) {
            $_KHId = isset($_SESSION["user_info_admin"]["khid"]) ? $_SESSION["user_info_admin"]["khid"] : "";

            if (!empty($_KHId)) {
                $_quan_ly_dat_tour_Model = new quanlydattourModel();
                //$_NoiKhoiHanh = isset($_POST["txtNoiKhoiHanh"]) ? $_POST["txtNoiKhoiHanh"] : "";
                $_Info_khach_hang = $_quan_ly_dat_tour_Model->getDiaChiKhachHang($_KHId);
                $_Avatar = $_Info_khach_hang[0]["HinhDaiDien"];
            }
        }


        if (isset($_GET["id"])) {
            $_Id = $_GET["id"];
            $Dm_tour_Model = new Dm_tourModel();
            $Dm_tour_Model->setId($_Id);
            $obj = $Dm_tour_Model->getChitiet();
            if (!is_null($obj)) {
                $_Id = $obj->Id;
                $_MaTour = $obj->MaTour;
                $_TenTour = $obj->TenTour;
                $_NgayBatDau = $obj->NgayBatDau;
                $_NgayKetThuc = $obj->NgayKetThuc;
                $_GiaTien = $obj->GiaTien;
                $_TinhTrang = $obj->TinhTrang;
                $_SoLuongKhach = $obj->SoLuongKhach;
                $_LoaiTour = $obj->LoaiTour;
                $_DiaDiem = $obj->DiaDiem;
                $_MoTa = $obj->MoTa;
                $_HinhAnh = $obj->HinhAnh;
                $_GiaTourBaoGom = $obj->GiaTourBaoGom;
                $_GiaTourKhongBaoGom = $obj->GiaTourKhongBaoGom;
                $_PhuThu = $obj->PhuThu;
            }
        }
        require_once HOME_VIEW_DIRECTORY . DS . Dm_tourController::FOLDER_VIEW . DS . "chitiet.php";
    }

}
