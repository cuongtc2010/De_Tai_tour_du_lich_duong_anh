<?php

session_start();
require_once '../config.php';
require_once 'autoload.php';

if (isset($_POST["postType"])) {
    if ($_POST["postType"] == "ajax") {
        if (isset($_GET["ctl"])) {
            $controller = $_GET["ctl"];
        }
        if (isset($_GET['act'])) {
            $action = $_GET['act'];
        }
    }
    call_user_func(array($controller . "Controller", $action));
    exit();
}

$act = isset($_GET["act"]) ? $_GET["act"] : "";

if (isset($_SESSION["user_info_admin"])) {
    require_once TEMPLATE_DIRECTORY . DS . "index.php";
} else {
    if ($act !== "doLogin") {
        UtilityController::gotoPage("Login.php");
    } else {
        $controller = "";
        $action = "";
        if (isset($_GET["ctl"])) {
            $controller = $_GET["ctl"];
        }
        if (isset($_GET['act'])) {
            $action = $_GET['act'];
        }
        call_user_func(array($controller . "Controller", $action));
    }
}

