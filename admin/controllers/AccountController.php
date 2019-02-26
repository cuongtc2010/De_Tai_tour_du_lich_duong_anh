<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountController
 *
 * @author phuocnguyen
 */
class AccountController {

    public function login() {
        echo "X";
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
                    "chucvuid" => $accounts[0]["ChucVuId"]
                );
                if ($_SESSION["user_info_admin"]["chucvuid"] != 5) {
                     UtilityController::gotoPage("index.php");
                } else {
                    UtilityController::message("Bạn không phải quản trị viên");
                    UtilityController::gotoPage(ROOT_URL);
                }
            } else {
                echo UtilityController::message("Tài khoản không tồn tại");
                UtilityController::gotoPage("Login.php");
            }
        } else {
            UtilityController::gotoPage("Login.php");
        }
    }

    public function doLogout() {
        session_destroy();
        UtilityController::gotoPage("Login.php");
    }

}
