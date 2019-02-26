<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LichSuController
 *
 * @author pc
 */
class LichSuController {
    const FOLDER_VIEW = 'LichSu';

    public function index() {
        if (isset($_SESSION["user_info_admin"])) {
            $Dattour_Model = new quanlydattourModel();
            
            if(isset($_SESSION["user_info_admin"]["khid"])){
                $_KHId = $_SESSION["user_info_admin"]["khid"];
                
            }
            $list = $Dattour_Model->getLichSu($_KHId);
            require_once HOME_VIEW_DIRECTORY . DS . LichSuController::FOLDER_VIEW . DS . "index.php";
        } else {
            UtilityController::message("Bạn chua dang nhap");
            UtilityController::gotoPage(ROOT_URL);
        }
    }
}
