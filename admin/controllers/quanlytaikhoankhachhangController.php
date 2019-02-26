<?php

class quanlytaikhoankhachhangController {

    const FOLDER_VIEW = 'quanlytaikhoankhachhang';

    public function index() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
            $quanlytaikhoankhachhang_Model = new quanlytaikhoankhachhangModel();

            $list = $quanlytaikhoankhachhang_Model->getList();
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
                        if ($quanlytaikhoankhachhang_Model->delete_array($array_delete)) {

                            UtilityController::messageSuccess();
                            UtilityController::gotoPage("index.php?ctl=quanlytaikhoankhachhang");
                        } else {
                            UtilityController::messageError();
                            UtilityController::gotoPage("index.php?ctl=quanlytaikhoankhachhang");
                        }
                    }
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . quanlytaikhoankhachhangController::FOLDER_VIEW . DS . "index.php";
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function update() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {

            $quanlytaikhoankhachhang_Model = new quanlytaikhoankhachhangModel();

            $dm_khachhang_model = new Dm_khModel();


            //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
            $_Id = "";
            $_username = "";
            $_password = "";
            $_ChucVuId = "";
            $_TrangThai = "";
            $_KHId = "";

            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
                $_KHId = $_GET["KHId"];
                $quanlytaikhoankhachhang_Model->setId($_Id);
                $obj = $quanlytaikhoankhachhang_Model->getChiTiet($_KHId);
                if (!is_null($obj)) {
                    $_Id = $obj->Id;
                    $_TrangThai = $obj->Xoa;
                    $_username = $obj->username;
                    $_KHId = $obj->KHId;
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . quanlytaikhoankhachhangController::FOLDER_VIEW . DS . "update.php";
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {

            $quanlytaikhoankhachhang_Model = new quanlytaikhoankhachhangModel();

            $_username = isset($_POST["txtusername"]) ? $_POST["txtusername"] : "";
            $_password = isset($_POST["txtpassword"]) ? $_POST["txtpassword"] : "";
            $_TrangThai = isset($_POST["txtTrangThai"]) ? $_POST["txtTrangThai"] : 0;

            if (!empty($_username)) {
                $quanlytaikhoankhachhang_Model->setusername($_username);
            }
            if (!empty($_password)) {
                $quanlytaikhoankhachhang_Model->setpassword($_password);
            }
            $quanlytaikhoankhachhang_Model->setTrangThai($_TrangThai);


            $_Id = "";
            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
                $_KHId = $_GET["KHId"];
            }
            if (!empty($_Id)) {
                $quanlytaikhoankhachhang_Model->setKHId($_KHId);
                if ($quanlytaikhoankhachhang_Model->update()) {
                    UtilityController::message("Đã cập nhật thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=quanlytaikhoankhachhang&act=update&id=" . $_Id . "&KHId=" . $_KHId);
            }
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

}
