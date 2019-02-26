<?php

class HomeController {

    const FOLDER_VIEW = 'Home';

    public function index() {
        
            require_once HOME_VIEW_DIRECTORY . DS . HomeController::FOLDER_VIEW . DS . "index.php";
    }

}
