<?php

class TinTucController {

    const FOLDER_VIEW = 'TinTuc';

    public function index() {
if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
        $TinTuc_Model = new TinTucModel();

        $list =  $TinTuc_Model->getList();

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
                    if ( $TinTuc_Model->delete_array($array_delete)) {

                        UtilityController::messageSuccess();
                        UtilityController::gotoPage("index.php?ctl=TinTuc");
                    } else {
                        UtilityController::messageError();
                        UtilityController::gotoPage("index.php?ctl=TinTuc");
                    }
                     
                }
            }
        }

        require_once ADMIN_VIEW_DIRECTORY . DS . TinTucController::FOLDER_VIEW . DS . "index.php";
        }else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function update() {

         $TinTuc_Model = new TinTucModel();
      
       

        //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
        $_Id = "";        
        $_TenTinTuc = "";      
        $_NoiDung = "";        
        $_HinhAnh = "";

        if (isset($_GET["id"])) {
            $_Id = $_GET["id"];
             $TinTuc_Model = new TinTucModel();
           $TinTuc_Model->setId($_Id);
            $obj =  $TinTuc_Model->getChitiet();
            if (!is_null($obj)) {
                $_Id = $obj->Id;               
                $_TenTinTuc = $obj->TenTinTuc;             
                $_NoiDung = $obj->NoiDung;              
                $_HinhAnh = $obj->HinhAnh;
            }
        }
        require_once ADMIN_VIEW_DIRECTORY . DS . TinTucController::FOLDER_VIEW . DS . "update.php";
    }

    public function doUpdate() {
        $TinTuc_Model = new TinTucModel();

       
        $_TenTinTuc = isset($_POST["txtTenTinTuc"]) ? $_POST["txtTenTinTuc"] : "";          
        $_NoiDung = isset($_POST["txtNoiDung"]) ? $_POST["txtNoiDung"] : "";      
        $_HinhAnh = isset($_POST["HinhAnh"]) ? $_POST["HinhAnh"] : "";

      
        if (!empty($_TenTinTuc)) {
         $TinTuc_Model->setTenTinTuc($_TenTinTuc);
        }       
        if (!empty($_NoiDung)) {
            $TinTuc_Model->setNoiDung($_NoiDung);
        }      
        if (!empty($_HinhAnh)) {
            $TinTuc_Model->setHinhAnh($_HinhAnh);
        }
        $_Id = "";
        if (isset($_GET["id"])) {
            $_Id = $_GET["id"];
        }
        if (!empty($_Id)) {
             $TinTuc_Model->setId($_Id);
            if ( $TinTuc_Model->update()) {
                UtilityController::message("Đã cập nhật thành công");
            } else {
                UtilityController::messageError();
            }
            UtilityController::gotoPage("index.php?ctl=TinTuc&act=update&id=" . $_Id);
        } else {
            if ( $TinTuc_Model->insert()) {
                UtilityController::message("Đã thêm mới thành công");
            } else {
                UtilityController::messageError();
            }
            UtilityController::gotoPage("index.php?ctl=TinTuc&act=update");
        }
    }

}
