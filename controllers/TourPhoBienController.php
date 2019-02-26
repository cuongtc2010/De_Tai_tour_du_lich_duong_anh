<?php

class TourPhoBienController {

    const FOLDER_VIEW = 'TourPhoBien';

    public function index() {

        $ThongKe_Model = new ThongKeModel();
        $list = $ThongKe_Model->getTourMoiNhat();
        
        require_once HOME_VIEW_DIRECTORY . DS . TourPhoBienController::FOLDER_VIEW . DS . "index.php";
    }

}
