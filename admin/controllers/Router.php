<?php

$controller = '';
if (isset($_GET["ctl"])) {
    $controller = $_GET["ctl"];
    $action = 'index';
    if (isset($_GET['act'])) {
        $action = $_GET['act'];
    }
    call_user_func(array($controller . "Controller", $action));
}else {
    $controller = "TongQuan";
    $action = 'index';
    if (isset($_GET['act'])) {
        $action = $_GET['act'];
    }
    call_user_func(array($controller . "Controller", $action));
}
