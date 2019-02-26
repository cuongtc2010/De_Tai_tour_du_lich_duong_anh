<?php

class ChucVuController {

    const FOLDER_VIEW = 'ChucVu';

    public function index() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && ($_SESSION["user_info_admin"]["chucvuid"] != 5 && $_SESSION["user_info_admin"]["chucvuid"] != 3 && $_SESSION["user_info_admin"]["chucvuid"] != 2)) {
            $ChucVu_Model = new ChucVuModel();

            $list = $ChucVu_Model->getList();

            if (isset($_POST["btnDelete"])) {
                if (isset($_POST["checklist"])) {
                    $array = $_POST["checklist"];
                    if ($array != null) {
                        $array_delete = array();
                        foreach ($array as $value) {
                            $array_delete[] = $value;
                        }
                        if ($ChucVu_Model->delete_array($array_delete)) {

                            UtilityController::messageSuccess();
                            UtilityController::gotoPage("index.php?ctl=ChucVu");
                        } else {
                            UtilityController::messageError();
                            UtilityController::gotoPage("index.php?ctl=ChucVu");
                        }
                    }
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . ChucVuController::FOLDER_VIEW . DS . "index.php";
        } else {
            UtilityController::message("Bạn không phải quản trị viên");
            UtilityController::gotoPage(ROOT_ADMIN_URL);
        }
    }

    public function update() {

        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && ($_SESSION["user_info_admin"]["chucvuid"] != 5 && $_SESSION["user_info_admin"]["chucvuid"] != 3 && $_SESSION["user_info_admin"]["chucvuid"] != 2)) {
            $ChucVu_Model = new ChucVuModel();

            $Dm_luong_Model = new Dm_luongModel();
            $list_luong = $Dm_luong_Model->getList();


            //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
            $_Id = "";
            $_TenCV = "";
            $_LuongId = "";
            $_PhuCap = "";


            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
                $ChucVu_Model->setId($_Id);
                $obj = $ChucVu_Model->getChitiet();
                if (!is_null($obj)) {
                    $_Id = $obj->Id;
                    $_TenCV = $obj->TenCV;
                    $_LuongId = $obj->LuongId;
                    $_PhuCap = $obj->PhuCap;
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . ChucVuController::FOLDER_VIEW . DS . "update.php";
        } else {
            UtilityController::message("Bạn không phải quản trị viên");
            UtilityController::gotoPage(ROOT_ADMIN_URL);
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && ($_SESSION["user_info_admin"]["chucvuid"] != 5 && $_SESSION["user_info_admin"]["chucvuid"] != 3 && $_SESSION["user_info_admin"]["chucvuid"] != 2)) {

            $ChucVu_Model = new ChucVuModel();

            $_TenCV = isset($_POST["txtTenCV"]) ? $_POST["txtTenCV"] : "";
            $_LuongId = isset($_POST["txtLuongId"]) ? $_POST["txtLuongId"] : "";
            $_PhuCap = isset($_POST["txtPhuCap"]) ? $_POST["txtPhuCap"] : "";


            if (!empty($_TenCV)) {
                $ChucVu_Model->setTenCV($_TenCV);
            }
            if (!empty($_LuongId)) {
                $ChucVu_Model->setLuongId($_LuongId);
            }
            if (!empty($_PhuCap)) {
                $ChucVu_Model->setPhuCap($_PhuCap);
            }

            $_Id = "";
            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
            }
            if (!empty($_Id)) {
                $ChucVu_Model->setId($_Id);
                if ($ChucVu_Model->update()) {
                    UtilityController::message("Đã cập nhật thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=ChucVu&act=update&id=" . $_Id);
            } else {
                if ($ChucVu_Model->insert()) {
                    UtilityController::message("Đã thêm mới thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=ChucVu&act=update");
            }
        } else {
            UtilityController::message("Bạn không phải quản trị viên");
            UtilityController::gotoPage(ROOT_ADMIN_URL);
        }
    }

}
