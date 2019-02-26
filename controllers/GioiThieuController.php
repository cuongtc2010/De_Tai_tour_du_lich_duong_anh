<?php

class GioiThieuController {

    const FOLDER_VIEW = 'GioiThieu';

    public function index() {
       
        require_once HOME_VIEW_DIRECTORY . DS . GioiThieuController::FOLDER_VIEW . DS . "index.php";
    }
    public function dieukhoan() {
       
        require_once HOME_VIEW_DIRECTORY . DS . GioiThieuController::FOLDER_VIEW . DS . "dieukhoan.php";
    }
     public function quyche() {
       
        require_once HOME_VIEW_DIRECTORY . DS . GioiThieuController::FOLDER_VIEW . DS . "quyche.php";
    }
   
    public function tuyendung() {
       
        require_once HOME_VIEW_DIRECTORY . DS . GioiThieuController::FOLDER_VIEW . DS . "tuyendung.php";
    }
}
    
