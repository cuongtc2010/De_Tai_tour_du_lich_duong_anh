<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dm_tourController
 *
 * @author pc
 */
class TimKiemTourController {

    const FOLDER_VIEW = 'TimKiemTour';

    public function index() {
        $Dm_tour_Controller = new Dm_tourModel();
        $_TenTour = isset($_POST["txtSearch"]) ? $_POST["txtSearch"] : "";
        if (!empty($_TenTour)) {
            $Dm_tour_Controller->setTenTour($_TenTour);
        }
        $Dm_diadiem_Controller = new Dm_diadiemModel();
        $list_DiaDiem = $Dm_diadiem_Controller->getList();
        
        $list_search = $Dm_tour_Controller->Timtour();
        require_once HOME_VIEW_DIRECTORY . DS . TimKiemTourController::FOLDER_VIEW . DS . "index.php";
    }
    public function search() {
        
        $Dm_diadiem_Controller = new Dm_diadiemModel();
        $list_DiaDiem = $Dm_diadiem_Controller->getList();
        
        $_DiaDiemId = "";
        if (isset($_GET["DiaDiemId"])){
            $_DiaDiemId = $_GET["DiaDiemId"];
        }
        $_Gia = "";
        if (isset($_GET["SortGia"])){
            $_Gia = $_GET["SortGia"];
        }
         $_Time = "";
        if (isset($_GET["Time"])){
            $_Time = $_GET["Time"];
        }
        $Dm_tour_Controller = new Dm_tourModel();
        $_TenTour = isset($_POST["txtSearch"]) ? $_POST["txtSearch"] : "";
        
        if (!empty($_TenTour)) {
            $Dm_tour_Controller->setTenTour($_TenTour);
        }
         if (!empty($_DiaDiemId)) {
            $Dm_tour_Controller->setDiaDiem($_DiaDiemId);
        }
         if (!empty($_Gia)) {
            $Dm_tour_Controller->setGiaTien($_Gia);
        } 
         if (!empty($_Time)) {
            $Dm_tour_Controller->setLoaiTour($_Time);
        }
        $list_search = $Dm_tour_Controller->Timtour();
        require_once HOME_VIEW_DIRECTORY . DS . TimKiemTourController::FOLDER_VIEW . DS . "index.php";
    }
}
