<?php

class quanlytaikhoannhanvienController {

    const FOLDER_VIEW = 'quanlytaikhoannhanvien';

    public function index() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
            $quanlytaikhoannhanvien_Model = new quanlytaikhoannhanvienModel();

            $list = $quanlytaikhoannhanvien_Model->getList();
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
                        if ($quanlytaikhoannhanvien_Model->delete_array($array_delete)) {

                            UtilityController::messageSuccess();
                            UtilityController::gotoPage("index.php?ctl=quanlytaikhoannhanvien");
                        } else {
                            UtilityController::messageError();
                            UtilityController::gotoPage("index.php?ctl=quanlytaikhoannhanvien");
                        }
                    }
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . quanlytaikhoannhanvienController::FOLDER_VIEW . DS . "index.php";
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function update() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {

            $quanlytaikhoannhanvien_Model = new quanlytaikhoannhanvienModel();

            $ChucVu_Model = new ChucVuModel();
            $List_Chuc_Vu = $ChucVu_Model->getListCVNV();


            //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
            $_Id = "";
            $_username = "";
            $_password = "";
            $_ChucVuId = "";
            $_TrangThai = "";
            $_NVId = "";

            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
                $_NVId = $_GET["NVId"];
                $quanlytaikhoannhanvien_Model->setId($_Id);
                $obj = $quanlytaikhoannhanvien_Model->getChitiet($_NVId);
                if (!is_null($obj)) {
                    $_Id = $obj->Id;
                    $_TrangThai = $obj->Xoa;
                    $_username = $obj->username;
                    $_NVId = $obj->NhanVienId;
                    $_ChucVuId = $obj->ChucVuId;
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . quanlytaikhoannhanvienController::FOLDER_VIEW . DS . "update.php";
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {

            $quanlytaikhoannhanvien_Model = new quanlytaikhoannhanvienModel();

            $_username = isset($_POST["txtusername"]) ? $_POST["txtusername"] : "";
            $_password = isset($_POST["txtpassword"]) ? $_POST["txtpassword"] : "";
            $_ChucVuId = isset($_POST["txtChucVuId"]) ? $_POST["txtChucVuId"] : "";
            $_TrangThai = isset($_POST["txtTrangThai"]) ? $_POST["txtTrangThai"] : 0;


            if (!empty($_username)) {
                $quanlytaikhoannhanvien_Model->setusername($_username);
            }
            if (!empty($_password)) {
                $quanlytaikhoannhanvien_Model->setpassword($_password);
            }
            if (!empty($_ChucVuId)) {
                $quanlytaikhoannhanvien_Model->setChucVu($_ChucVuId);
            }
            $quanlytaikhoannhanvien_Model->setTrangThai($_TrangThai);


            $_Id = "";
            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
                $_NVId = $_GET["NVId"];
            }
            if (!empty($_Id)) {
                $quanlytaikhoannhanvien_Model->setNhanVienId($_NVId);
                if ($quanlytaikhoannhanvien_Model->update()) {
                    UtilityController::message("Đã cập nhật thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=quanlytaikhoannhanvien&act=update&id=" . $_Id . "&NVId=" . $_NVId);
            }
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

}
