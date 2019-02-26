<?php

class YeuCauTourController {

    const FOLDER_VIEW = 'YeuCauTour';

    public function index() {
if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $quanlyyeucautourModel = new YeuCauTourModel();

        $list = $quanlyyeucautourModel->getList();

        //$rowrount = $Post_bai_viet_model->getCount();
        //$phantrang = UtilityController::phantrang($rowrount, $num_rows_per_page, $page);
        //Delete
        if (isset($_POST["btnDelete"])) {
            if (isset($_POST["checklist"])) {
                $array = $_POST["checklist"];
                if ($array != null) {
                    $array_delete = array();
                    foreach ($array as $value) {
                        $array_delete[] = $value;
                    }
                    if ($quanlyyeucautourModel->delete_array($array_delete)) {

                        UtilityController::messageSuccess();
                        UtilityController::gotoPage("index.php?ctl=YeuCauTour");
                    } else {
                        UtilityController::messageError();
                        UtilityController::gotoPage("index.php?ctl=YeuCauTour");
                    }
                }
            }
        }
        //Xác nhận
        if (isset($_POST["btnXacNhan"])) {
            if (isset($_POST["checklist"])) {
                $array = $_POST["checklist"];
                if ($array != null) {
                    $array_delete = array();
                    foreach ($array as $value) {
                        $array_delete[] = $value;
                    }
                    if ($quanlyyeucautourModel->xacnhan_array($array_delete)) {

                        UtilityController::messageSuccess();
                        UtilityController::gotoPage("index.php?ctl=YeuCauTour");
                    } else {
                        UtilityController::messageError();
                        UtilityController::gotoPage("index.php?ctl=YeuCauTour");
                    }
                }
            }
        }
        require_once ADMIN_VIEW_DIRECTORY . DS . YeuCauTourController::FOLDER_VIEW . DS . "index.php";
         }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function update() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $quanlyYeuCautourModel = new YeuCauTourModel();



        //$quanlyYeuCautourModel = new quanlyyeucautourModel;
        $list_KH = $quanlyYeuCautourModel->getList();



        //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
        $_Id = "";
        $_KHId = "";
        $_SoLuongKhach = "";
        $_NgayDi = "";
        $_NgayVe = "";
        $_NoiKhoiHanh = "";
        $_HanhTrinh = "";
        $_Xoa = "";


        if (isset($_GET["id"])) {
            $_Id = $_GET["id"];

            $quanlyYeuCautourModel->setId($_Id);
            $obj =  $quanlyYeuCautourModel->getChitiet();
            if (!is_null($obj)) {
                $_Id = $obj->Id;
                
                $_KHId = $obj->KHId;
               
                $_SoLuongKhach = $obj->SoLuongKhach;
                $_NgayDi = $obj->NgayDi;
                $_NgayVe = $obj->NgayVe;
                $_NoiKhoiHanh = $obj->NoiKhoiHanh;
                $_HanhTrinh = $obj->HanhTrinh;
                $_Xoa = $obj->Xoa;
            }
        }

        require_once ADMIN_VIEW_DIRECTORY . DS . YeuCauTourController::FOLDER_VIEW . DS . "update.php";
         }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $_quan_ly_dat_tour_Model = new quanlydattourModel();

        $_MaDatTour = isset($_POST["txtMaDatTour"]) ? $_POST["txtMaDatTour"] : "";
        $_KHId = isset($_POST["txtKhachHang"]) ? $_POST["txtKhachHang"] : "";
        $_TourId = isset($_POST["txtTourId"]) ? $_POST["txtTourId"] : "";
        $_SoLuongKhachDi = isset($_POST["txtSoLuongKhachDi"]) ? $_POST["txtSoLuongKhachDi"] : "";
        $_NgayDi = isset($_POST["txtNgayDi"]) ? $_POST["txtNgayDi"] : "";
        $_NgayVe = isset($_POST["txtNgayVe"]) ? $_POST["txtNgayVe"] : "";
        $_NoiKhoiHanh = isset($_POST["txtNoiKhoiHanh"]) ? $_POST["txtNoiKhoiHanh"] : "";
        $_HanhTrinh = isset($_POST["txtHanhTrinh"]) ? $_POST["txtHanhTrinh"] : "";



        if (!empty($_MaDatTour)) {
            $_quan_ly_dat_tour_Model->setMaDatTour($_MaDatTour);
        }
        if (!empty($_KHId)) {
            $_quan_ly_dat_tour_Model->setKHId($_KHId);
        }
        if (!empty($_TourId)) {
            $_quan_ly_dat_tour_Model->setTourId($_TourId);
        }

        if (!empty($_SoLuongKhachDi)) {
            $_quan_ly_dat_tour_Model->setSoLuongKhachDi($_SoLuongKhachDi);
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

        $_Id = "";
        if (isset($_GET["id"])) {
            $_Id = $_GET["id"];
        }
        if (!empty($_Id)) {
            echo $_Id;
            $_quan_ly_dat_tour_Model->setId($_Id);
            if ($_quan_ly_dat_tour_Model->update()) {
                UtilityController::message("Đã cập nhật thành công");
            } else {
                UtilityController::messageError();
            }
            UtilityController::gotoPage("index.php?ctl=quanlydattour&act=update&id=" . $_Id);
        } else {
            if ($_quan_ly_dat_tour_Model->insert()) {
                UtilityController::message("Đã thêm mới thành công");
            } else {
                UtilityController::messageError();
            }
            UtilityController::gotoPage("index.php?ctl=quanlydattour&act=update");
        }
         }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

}
