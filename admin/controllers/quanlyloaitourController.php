<?php

class quanlyloaitourController {

    const FOLDER_VIEW = 'quanlyloaitour';

    public function index() {
if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $quanlyloaitourModel = new quanlyloaitourModel();

        $list = $quanlyloaitourModel->getList();

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
                    if ($quanlyloaitourModel->delete_array($array_delete)) {

                        UtilityController::messageSuccess();
                        UtilityController::gotoPage("index.php?ctl=quanlyloaitour");
                    } else {
                        UtilityController::messageError();
                        UtilityController::gotoPage("index.php?ctl=quanlyloaitour");
                    }
                }
            }
        }
        require_once ADMIN_VIEW_DIRECTORY . DS . quanlyloaitourController::FOLDER_VIEW . DS . "index.php";
         }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function update() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $_quan_ly_loai_tour_Model = new quanlyloaitourModel();

        //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
        $_Id = "";
        $_MaLoai = $_quan_ly_loai_tour_Model->getLoai();
        $_TenLoai = "";


        if (isset($_GET["id"])) {
            $_Id = $_GET["id"];
            $_quan_ly_loai_tour_Model->setId($_Id);
            $obj = $_quan_ly_loai_tour_Model->getChitiet();
            if (!is_null($obj)) {
                $_Id = $obj->Id;
                $_MaLoai = $obj->MaLoai;
                $_TenLoai = $obj->TenLoai;
                
            }
        }

        require_once ADMIN_VIEW_DIRECTORY . DS . quanlyloaitourController::FOLDER_VIEW . DS . "update.php";
         }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $_quan_ly_loai_tour_Model = new quanlyloaitourModel();

        $_MaLoai = isset($_POST["txtMaLoai"]) ? $_POST["txtMaLoai"] : "";
        $_TenLoai = isset($_POST["txtTenLoai"]) ? $_POST["txtTenLoai"] : "";


        if (!empty($_MaLoai)) {
            $_quan_ly_loai_tour_Model->setMaLoai($_MaLoai);
        }
        if (!empty($_TenLoai)) {
            $_quan_ly_loai_tour_Model->setTenLoai($_TenLoai);
        }

        $_Id = "";
        if (isset($_GET["id"])) {
            $_Id = $_GET["id"];
        }
        if (!empty($_Id)) {
            $_quan_ly_loai_tour_Model->setId($_Id);
            if ($_quan_ly_loai_tour_Model->update()) {
                UtilityController::message("Đã cập nhật thành công");
            } else {
                UtilityController::messageError();
            }
            UtilityController::gotoPage("index.php?ctl=quanlyloaitour&act=update&id=" . $_Id);
        } else {
            if ($_quan_ly_loai_tour_Model->insert()) {
                UtilityController::message("Đã thêm mới thành công");
            } else {
                UtilityController::messageError();
            }
            UtilityController::gotoPage("index.php?ctl=quanlyloaitour&act=update");
        }
     }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }

}
}