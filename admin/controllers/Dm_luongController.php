<?php

class Dm_luongController {

    const FOLDER_VIEW = 'Dm_luong';

    public function index() {
if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && ($_SESSION["user_info_admin"]["chucvuid"] != 5 && $_SESSION["user_info_admin"]["chucvuid"] != 3 && $_SESSION["user_info_admin"]["chucvuid"] != 2)) {
        $Dm_luong_Model = new Dm_luongModel();

        $list = $Dm_luong_Model->getList();

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
                    if ($Dm_luong_Model->delete_array($array_delete)) {

                        UtilityController::messageSuccess();
                        UtilityController::gotoPage("index.php?ctl=Dm_luong");
                    } else {
                        UtilityController::messageError();
                        UtilityController::gotoPage("index.php?ctl=Dm_luong");
                    }
                }
            }
        }

        require_once ADMIN_VIEW_DIRECTORY . DS . Dm_luongController::FOLDER_VIEW . DS . "index.php";
         } else {
            UtilityController::message("Bạn không phải quản trị viên");
            UtilityController::gotoPage(ROOT_ADMIN_URL);
    }
    }
    public function update() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && ($_SESSION["user_info_admin"]["chucvuid"] != 5 && $_SESSION["user_info_admin"]["chucvuid"] != 3 && $_SESSION["user_info_admin"]["chucvuid"] != 2)) {
            $Dm_luong_Model = new Dm_luongModel();

            //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
            $_Id = "";
            $_MaLuong = "";
            $_MucLuong = "";
            $_HeSoLuong = "";
            $_NgayApDung = "";



            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
                $Dm_luong_Model->setId($_Id);
                $obj = $Dm_luong_Model->getChitiet();
                if (!is_null($obj)) {
                    $_Id = $obj->Id;
                    $_MaLuong = $obj->MaLuong;
                    $_MucLuong = $obj->MucLuong;
                    $_HeSoLuong = $obj->HeSoLuong;
                    $_NgayApDung = $obj->NgayApDung;
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . Dm_luongController::FOLDER_VIEW . DS . "update.php";
        } else {
            UtilityController::message("Bạn không phải quản trị viên");
            UtilityController::gotoPage(ROOT_HOME_URL);
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && ($_SESSION["user_info_admin"]["chucvuid"] != 5 && $_SESSION["user_info_admin"]["chucvuid"] != 3 && $_SESSION["user_info_admin"]["chucvuid"] != 2)) {
            $Dm_luong_Model = new Dm_luongModel();

            $_MaLuong = isset($_POST["txtMaLuong"]) ? $_POST["txtMaLuong"] : "";
            $_MucLuong = isset($_POST["txtMucLuong"]) ? $_POST["txtMucLuong"] : "";
            $_HeSoLuong = isset($_POST["txtHeSoLuong"]) ? $_POST["txtHeSoLuong"] : "";
            $_NgayApDung = isset($_POST["txtNgayApDung"]) ? $_POST["txtNgayApDung"] : "";



            if (!empty($_MaLuong)) {
                $Dm_luong_Model->setMaLuong($_MaLuong);
            }
            if (!empty($_MucLuong)) {
                $Dm_luong_Model->setMucLuong($_MucLuong);
            }
            if (!empty($_HeSoLuong)) {
                $Dm_luong_Model->setHeSoLuong($_HeSoLuong);
            }
            if (!empty($_NgayApDung)) {
                $Dm_luong_Model->setNgayApDung($_NgayApDung);
            }


            $_Id = "";
            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
            }
            if (!empty($_Id)) {
                $Dm_luong_Model->setId($_Id);
                if ($Dm_luong_Model->update()) {
                    UtilityController::message("Đã cập nhật thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=Dm_luong&act=update&id=" . $_Id);
            } else {
                if ($Dm_luong_Model->insert()) {
                    UtilityController::message("Đã thêm mới thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=Dm_luong&act=update");
            }
            } else {
                UtilityController::message("Bạn không phải quản trị viên");
                UtilityController::gotoPage(ROOT_ADMIN_URL);
            }
        }
    }
    