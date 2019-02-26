<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of nhanvienhotrôCntroller
 *
 * @author H.Tran
 */
class nhanvienhotrocontroller {
    //put your code here
     const FOLDER_VIEW = 'nhanvienhotro';
     public function index() {
          $Dm_nhanvien_Model = new Dm_nhanvienModel();
        $list = $Dm_nhanvien_Model->getListNhanVienCV();

        //$rowrount = $Post_bai_viet_model->getCount();
        //$phantrang = UtilityController::phantrang($rowrount, $num_rows_per_page, $page);

        require_once HOME_VIEW_DIRECTORY . DS . nhanvienhotrocontroller::FOLDER_VIEW . DS . "index.php";
     }

}