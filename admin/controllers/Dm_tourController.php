<?php

class Dm_tourController {

    const FOLDER_VIEW = 'Dm_tour';

    public function index() {
 if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $Dm_tour_Model = new Dm_tourModel();

        $list = $Dm_tour_Model->getList();

        //$rowrount = $Post_bai_viet_model->getCount();
        //$phantrang = UtilityController::phantrang($rowrount, $num_rows_per_page, $page);
        //
        //Delete
        if (isset($_POST["btnDelete"])) {
            if (isset($_POST["checklist"])) {
                $array = $_POST["checklist"];
                if ($array != null) {
                    $array_delete = array();
                    foreach ($array as $value) {
                        $array_delete[] = $value;
                    }
                    if ($Dm_tour_Model->delete_array($array_delete)) {

                        UtilityController::messageSuccess();
                        UtilityController::gotoPage("index.php?ctl=Dm_tour");
                    } else {
                        UtilityController::messageError();
                        UtilityController::gotoPage("index.php?ctl=Dm_tour");
                    }
                }
            }
        }

        require_once ADMIN_VIEW_DIRECTORY . DS . Dm_tourController::FOLDER_VIEW . DS . "index.php";
         }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function update() {
 if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $Dm_tour_Model = new Dm_tourModel();
        $Dm_diadiem_Model = new Dm_diadiemModel();
        $list_diadiem = $Dm_diadiem_Model->getList();
        
        $Quanlyloaitour_Model = new quanlyloaitourModel();
        $list_loai_tour = $Quanlyloaitour_Model->getList();

        //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
        $_Id = "";
        $_MaTour = $Dm_tour_Model->getTours();
        $_TenTour = "";
        $_NgayBatDau = "";
        $_NgayKetThuc = "";
        $_GiaTien = "";
        $_TinhTrang = "";
        $_SoLuongKhach = "";
        $_LoaiTour = "";
        $_DiaDiem = "";
        $_MoTa = "";
        $_GiaTourBaoGom = "";
        $_GiaTourKhongBaoGom = "";
        $_PhuThu = "";
        $_HinhAnh = "";

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
                $_GiaTourBaoGom = $obj->GiaTourBaoGom;
                $_GiaTourKhongBaoGom = $obj->GiaTourKhongBaoGom;
                $_PhuThu = $obj->PhuThu;
                $_HinhAnh = $obj->HinhAnh;
            }
        }
        require_once ADMIN_VIEW_DIRECTORY . DS . Dm_tourController::FOLDER_VIEW . DS . "update.php";
         }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $Dm_tour_Model = new Dm_tourModel();

        $_MaTour = isset($_POST["txtMaTour"]) ? $_POST["txtMaTour"] : "";
        $_TenTour = isset($_POST["txtTenTour"]) ? $_POST["txtTenTour"] : "";
        $_NgayBatDau = isset($_POST["txtNgayBatDau"]) ? $_POST["txtNgayBatDau"] : "";
        $_NgayKetThuc = isset($_POST["txtNgayKetThuc"]) ? $_POST["txtNgayKetThuc"] : "";
        $_GiaTien = isset($_POST["txtGiaTien"]) ? $_POST["txtGiaTien"] : "";
        $_TinhTrang = isset($_POST["txtTinhTrang"]) ? $_POST["txtTinhTrang"] : "";
        $_SoLuongKhach = isset($_POST["txtSoLuongKhach"]) ? $_POST["txtSoLuongKhach"] : "";
        $_LoaiTour = isset($_POST["txtLoaiTour"]) ? $_POST["txtLoaiTour"] : "";
        $_DiaDiem = isset($_POST["txtDiaDiem"]) ? $_POST["txtDiaDiem"] : "";     
        $_MoTa = isset($_POST["txtMoTa"]) ? $_POST["txtMoTa"] : "";
        $_GiaTourBaoGom = isset($_POST["txtGiaTourBaoGom"]) ? $_POST["txtGiaTourBaoGom"] : "";
        $_GiaTourKhongBaoGom = isset($_POST["txtGiaTourKhongBaoGom"]) ? $_POST["txtGiaTourKhongBaoGom"] : "";
        $_PhuThu = isset($_POST["txtPhuThu"]) ? $_POST["txtPhuThu"] : "";
        $_HinhAnh = isset($_POST["HinhAnh"]) ? $_POST["HinhAnh"] : "";

        if (!empty($_MaTour)) {
            $Dm_tour_Model->setMaTour($_MaTour);
        }
        if (!empty($_TenTour)) {
            $Dm_tour_Model->setTenTour($_TenTour);
        }
        if (!empty($_NgayBatDau)) {
            $Dm_tour_Model->setNgayBatDau($_NgayBatDau);
        }
        if (!empty($_NgayKetThuc)) {
            $Dm_tour_Model->setNgayKetThuc($_NgayKetThuc);
        }
        if (!empty($_GiaTien)) {
            $Dm_tour_Model->setGiaTien($_GiaTien);
        }
        if (!empty($_TinhTrang)) {
            $Dm_tour_Model->setTinhTrang($_TinhTrang);
        }
        if (!empty($_SoLuongKhach)) {
            $Dm_tour_Model->setSoLuongKhach($_SoLuongKhach);
        }
        if (!empty($_LoaiTour)) {
            $Dm_tour_Model->setLoaiTour($_LoaiTour);
        }
        if (!empty($_DiaDiem)) {
            $Dm_tour_Model->setDiaDiem($_DiaDiem);
        }
        if (!empty($_MoTa)) {
            $Dm_tour_Model->setMoTa($_MoTa);
        }
        if (!empty($_GiaTourBaoGom)) {
            $Dm_tour_Model->setGiaTourBaoGom($_GiaTourBaoGom);
        }
        if (!empty($_GiaTourKhongBaoGom)) {
            $Dm_tour_Model->setGiaTourKhongBaoGom($_GiaTourKhongBaoGom);
        }
        if (!empty($_PhuThu)) {
            $Dm_tour_Model->setPhuThu($_PhuThu);
        }
        if (!empty($_HinhAnh)) {
            $Dm_tour_Model->setHinhAnh($_HinhAnh);
        }
        $_Id = "";
        if (isset($_GET["id"])) {
            $_Id = $_GET["id"];
        }
        if (!empty($_Id)) {
            $Dm_tour_Model->setId($_Id);
            if ($Dm_tour_Model->update()) {
                UtilityController::message("Đã cập nhật thành công");
            } else {
                UtilityController::messageError();
            }
            UtilityController::gotoPage("index.php?ctl=Dm_tour&act=update&id=" . $_Id);
        } else {
            if ($Dm_tour_Model->insert()) {
                UtilityController::message("Đã thêm mới thành công");
            } else {
                UtilityController::messageError();
            }
            UtilityController::gotoPage("index.php?ctl=Dm_tour&act=update");
        }
         }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

}
