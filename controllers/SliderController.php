<?php

class SliderController {
    const FOLDER_VIEW = 'Slider';

    public function index() {
        require_once HOME_VIEW_DIRECTORY . DS . SliderController::FOLDER_VIEW . DS . "index.php";
    }

}


