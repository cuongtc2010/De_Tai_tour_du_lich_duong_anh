<?php

class Dm_diadiemController {

    const FOLDER_VIEW = 'Dm_diadiem';

    public function index() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {

            $Dm_diadiem_Model = new Dm_diadiemModel();

            $list = $Dm_diadiem_Model->getList();

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
                        if ($Dm_diadiem_Model->delete_array($array_delete)) {

                            UtilityController::messageSuccess();
                            UtilityController::gotoPage("index.php?ctl=Dm_diadiem");
                        } else {
                            UtilityController::messageError();
                            UtilityController::gotoPage("index.php?ctl=Dm_diadiem");
                        }
                    }
                }
            }

            require_once ADMIN_VIEW_DIRECTORY . DS . Dm_diadiemController::FOLDER_VIEW . DS . "index.php";
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function update() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {

            $Dm_diadiem_Model = new Dm_diadiemModel();

            //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
            $_Id = "";
            $_MaDiaDiem = $Dm_diadiem_Model->getMa();
            $_TenDiaDiem = "";
            $_DiaChi = "";
            $_HinhAnh = "";


            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
                $Dm_diadiem_Model = new Dm_diadiemModel();
                $Dm_diadiem_Model->setId($_Id);
                $obj = $Dm_diadiem_Model->getChitiet();
                if (!is_null($obj)) {
                    $_Id = $obj->Id;
                    $_MaDiaDiem = $obj->MaDiaDiem;
                    $_TenDiaDiem = $obj->TenDiaDiem;
                    $_DiaChi = $obj->DiaChi;
                    $_HinhAnh = $obj->HinhAnh;
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . Dm_diadiemController::FOLDER_VIEW . DS . "update.php";
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage("ROOT_URL");
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $Dm_diadiem_Model = new Dm_diadiemModel();

        $_MaDiaDiem = isset($_POST["txtMaDiaDiem"]) ? $_POST["txtMaDiaDiem"] : "";
        $_TenDiaDiem = isset($_POST["txtTenDiaDiem"]) ? $_POST["txtTenDiaDiem"] : "";
        $_DiaChi = isset($_POST["txtDiaChi"]) ? $_POST["txtDiaChi"] : "";
        $_HinhAnh = isset($_POST["txtHinhAnh"]) ? $_POST["txtHinhAnh"] : "";

//        if (!empty($_MaDiaDiem)) {
//            $Dm_diadiem_Model->setMaDiaDiem($_MaDiaDiem);
//        }
        if (!empty($_TenDiaDiem)) {
            $Dm_diadiem_Model->setTenDiaDiem($_TenDiaDiem);
        }
        if (!empty($_DiaChi)) {
            $Dm_diadiem_Model->setDiaChi($_DiaChi);
        }
        if (!empty($_HinhAnh)) {
            $Dm_diadiem_Model->setHinhAnh($_HinhAnh);
        }
        $_Id = "";
        if (isset($_GET["id"])) {
            $_Id = $_GET["id"];
        }
        if (!empty($_Id)) {
            $Dm_diadiem_Model->setId($_Id);
            if ($Dm_diadiem_Model->update()) {
                UtilityController::message("Đã cập nhật thành công");
            } else {
                UtilityController::messageError();
            }
            UtilityController::gotoPage("index.php?ctl=Dm_diadiem&act=update&id=" . $_Id);
        } else {
            if ($Dm_diadiem_Model->insert()) {
                UtilityController::message("Đã thêm mới thành công");
            } else {
                UtilityController::messageError();
            }
            UtilityController::gotoPage("index.php?ctl=Dm_diadiem&act=update");
        }
    }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
}
}
