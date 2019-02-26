<?php

class PhanhoitukhachhangController {

    const FOLDER_VIEW = 'Phanhoitukhachhang';

    public function index() {
if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $Phanhoitukhachhang_Model = new PhanhoitukhachhangModel();

        $list = $Phanhoitukhachhang_Model->getList();

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
                    if ($Phanhoitukhachhang_Model->delete_array($array_delete)) {

                        UtilityController::messageSuccess();
                        UtilityController::gotoPage("index.php?ctl=Phanhoitukhachhang");
                    } else {
                        UtilityController::messageError();
                        UtilityController::gotoPage("index.php?ctl=Phanhoitukhachhang");
                    }
                     
                }
            }
        }

        require_once ADMIN_VIEW_DIRECTORY . DS . PhanhoitukhachhangController::FOLDER_VIEW . DS . "index.php";
        }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }
    public function update() {
if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $Phanhoitukhachhang_Model = new PhanhoitukhachhangModel();
        
        $Dm_kh_Model = new Dm_khModel();
        $list_khachhang = $Dm_kh_Model->getList();
        //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
        $_Id = "";
        $_KHId = "";
        $_NoiDung = "";
       

        if (isset($_GET["id"])) {
            $_Id = $_GET["id"];
            $Phanhoitukhachhang_Model = new PhanhoitukhachhangModel();
            $Phanhoitukhachhang_Model->setId($_Id);
            $obj = $Phanhoitukhachhang_Model->getChitiet();
            if (!is_null($obj)) {
                $_Id = $obj->Id;
                $_KHId = $obj->KHId;
                $_NoiDung = $obj->NoiDung;
            }
        }
        require_once ADMIN_VIEW_DIRECTORY . DS . PhanhoitukhachhangController::FOLDER_VIEW . DS . "update.php";
         }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }
//    public function doUpdate() {
//        $Phanhoitukhachhang_Model = new PhanhoitukhachhangModel();
//
//        $_KHId = isset($_POST["txtKhachHang"]) ? $_POST["txtKhachHang"] : "";
//        $_NoiDung = isset($_POST["txtNoiDung"]) ? $_POST["txtNoiDung"] : "";
//        
//
//        if (!empty($_KHId)) {
//            $Phanhoitukhachhang_Model->setKHId($_KHId);
//        }
//        if (!empty($_NoiDung)) {
//            $Phanhoitukhachhang_Model->setNoiDung($_NoiDung);
//        }
//       
//        $_Id = "";
//        if (isset($_GET["id"])) {
//            $_Id = $_GET["id"];
//        }
//        if (!empty($_Id)) {
//            $Phanhoitukhachhang_Model->setId($_Id);
//            if ($Phanhoitukhachhang_Model->update()) {
//                UtilityController::message("Đã cập nhật thành công");
//            } else {
//                UtilityController::messageError();
//            }
//            UtilityController::gotoPage("index.php?ctl=Phanhoitukhachhang&act=update&id=" . $_Id);
//        } else {
//            if ($Phanhoitukhachhang_Model->insert()) {
//                UtilityController::message("Đã thêm mới thành công");
//            } else {
//                UtilityController::messageError();
//            }
//            UtilityController::gotoPage("index.php?ctl=Phanhoitukhachhang&act=update");
//        }
//    }

}
