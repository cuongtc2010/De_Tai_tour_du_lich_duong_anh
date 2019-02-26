<?php

class LoginController {

    public function index() {
        require_once HOME_VIEW_DIRECTORY . DS . "Login" . DS . "index.php";
    }

    public function doLogin() {
        if (isset($_POST)) {
            $username = "";
            $password = "";
            if (isset($_POST["username"])) {
                $username = $_POST["username"];
            }
            if (isset($_POST["password"])) {
                $password = $_POST["password"];
            }
            $nguoidung = new LoginModel();
            $nguoidung->setUsername($username);
            $nguoidung->setPassword(md5($password));
            $accounts = $nguoidung->getListLogin();
            if (count($accounts) == 1) {
                $_SESSION["user_info_admin"] = array(
                    "userid" => $accounts[0]["Id"],
                    "username" => $accounts[0]["username"],
                    "nhanvienid" => $accounts[0]["NhanVienId"],
                    "khid" => $accounts[0]["KHId"],
                    "chucvuid" => $accounts[0]["ChucVuId"]
                );
                
                if ($_SESSION["user_info_admin"]["chucvuid"] == 1) {
                    echo UtilityController::message("Admin làm gì ở đây đây!");
                    UtilityController::gotoPage("admin/index.php");
                } else {
                    UtilityController::gotoPage("index.php");
                }
            } else {
                echo UtilityController::message("Tài khoản không tồn tại");
                UtilityController::gotoPage("index.php");
            }
        } else {
            UtilityController::gotoPage("index.php");
        }
    }

    public function doLogout() {
        session_destroy();
        UtilityController::gotoPage("index.php");
    }

}
