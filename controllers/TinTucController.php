<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TinTucController
 *
 * @author pc
 */
class TinTucController {

    const FOLDER_VIEW = 'TinTuc';

    public function index() {
        $TinTuc_Controller = new TinTucModel();
        $listTinMoi = $TinTuc_Controller->getTinMoi();
        //$rowrount = $Post_bai_viet_model->getCount();
        //$phantrang = UtilityController::phantrang($rowrount, $num_rows_per_page, $page);
        $_TenTinTuc = isset($_POST["txtSearch"]) ? $_POST["txtSearch"] : "";

        if (!empty($_TenTinTuc)) {
            $TinTuc_Controller->setTenTinTuc($_TenTinTuc);
        }
        $list = $TinTuc_Controller->getList();
        require_once HOME_VIEW_DIRECTORY . DS . TinTucController::FOLDER_VIEW . DS . "index.php";
    }

    public function Chitiet() {
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
            $obj = $TinTuc_Model->getChitiet();
            if (!is_null($obj)) {
                $_Id = $obj->Id;

                $_TenTinTuc = $obj->TenTinTuc;
                $_NoiDung = $obj->NoiDung;
                $_HinhAnh = $obj->HinhAnh;
            }
        }
        require_once HOME_VIEW_DIRECTORY . DS . TinTucController::FOLDER_VIEW . DS . "chitiet.php";
    }

}
