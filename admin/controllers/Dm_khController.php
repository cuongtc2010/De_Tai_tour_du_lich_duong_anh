<?php

class Dm_khController {

    const FOLDER_VIEW = 'Dm_kh';

    public function index() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
            $Dm_kh_Model = new Dm_khModel();

            $list = $Dm_kh_Model->getList();
            if (isset($_POST["btnDelete"])) {
                if (isset($_POST["checklist"])) {
                    $array = $_POST["checklist"];
                    if ($array != null) {
                        $array_delete = array();
                        foreach ($array as $value) {
                            $array_delete[] = $value;
                        }
                        if ($Dm_kh_Model->delete_array($array_delete)) {

                            UtilityController::messageSuccess();
                            UtilityController::gotoPage("index.php?ctl=Dm_kh");
                        } else {
                            UtilityController::messageError();
                            UtilityController::gotoPage("index.php?ctl=Dm_kh");
                        }
                    }
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . Dm_khController::FOLDER_VIEW . DS . "index.php";
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function update() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
            $Dm_kh_Model = new Dm_khModel();
            $dm_login_model = new LoginModel();
            //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
            $_Id = "";
            $_MaKH = "";
            $_TenKH = "";
            $_DiaChi = "";
            $_GioiTinh = "";
            $_SDT = "";
            $_NgaySinh = "";
            $_Email = "";
            $_CMND = "";
            $_NgayDangKi = "";
            $_TrangThai = "";
            $_HinhAnh = "";
            $_TenDangNhap = "";

            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
                $Dm_kh_Model->setId($_Id);
                $obj = $Dm_kh_Model->getChitiet();
                 $get_ten_dang_nhap = $dm_login_model->getTaiKhoan($_Id,null);
                $_TenDangNhap = $get_ten_dang_nhap[0]["username"];
                if (!is_null($obj)) {
                    $_Id = $obj->Id;
                    $_MaKH = $obj->MaKH;
                    $_TenKH = $obj->TenKH;
                    $_DiaChi = $obj->DiaChi;
                    $_GioiTinh = $obj->GioiTinh;
                    $_SDT = $obj->SDT;
                    $_NgaySinh = $obj->NgaySinh;
                    $_Email = $obj->Email;
                    $_CMND = $obj->CMND;
                    $_NgayDangKi = $obj->NgayDangKi;
                    $_TrangThai = $obj->TrangThai;
                    $_HinhAnh = $obj->HinhDaiDien;
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . Dm_khController::FOLDER_VIEW . DS . "update.php";
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
            $Dm_kh_Model = new Dm_khModel();

            $_MaKH = isset($_POST["txtMaKH"]) ? $_POST["txtMaKH"] : "";
            $_TenKH = isset($_POST["txtTenKH"]) ? $_POST["txtTenKH"] : "";
            $_DiaChi = isset($_POST["txtDiaChi"]) ? $_POST["txtDiaChi"] : "";
            $_GioiTinh = isset($_POST["txtGioiTinh"]) ? $_POST["txtGioiTinh"] : "";
            $_SDT = isset($_POST["txtSDT"]) ? $_POST["txtSDT"] : "";
            $_NgaySinh = isset($_POST["txtNgaySinh"]) ? $_POST["txtNgaySinh"] : "";
            $_Email = isset($_POST["txtEmail"]) ? $_POST["txtEmail"] : "";
            $_CMND = isset($_POST["txtCMND"]) ? $_POST["txtCMND"] : "";
            $_NgayDangKi = isset($_POST["txtNgayDangKi"]) ? $_POST["txtNgayDangKi"] : "";
            $_TrangThai = isset($_POST["txtTrangThai"]) ? $_POST["txtTrangThai"] : "";
            $_HinhDaiDien = isset($_POST["HinhAnh"]) ? $_POST["HinhAnh"] : "";
            $_TenDangNhap = isset($_POST["txtTenDangNhap"]) ? $_POST["txtTenDangNhap"] : "";

            if (!empty($_MaKH)) {
                $Dm_kh_Model->setMaKH($_MaKH);
            }
            if (!empty($_TenKH)) {
                $Dm_kh_Model->setTenKH($_TenKH);
            }
            if (!empty($_DiaChi)) {
                $Dm_kh_Model->setDiaChi($_DiaChi);
            }
            if (!empty($_GioiTinh)) {
                $Dm_kh_Model->setGioiTinh($_GioiTinh);
            }
            if (!empty($_SDT)) {
                $Dm_kh_Model->setSDT($_SDT);
            }
            if (!empty($_NgaySinh)) {
                $Dm_kh_Model->setNgaySinh($_NgaySinh);
            }
            if (!empty($_Email)) {
                $Dm_kh_Model->setEmail($_Email);
            }
            if (!empty($_CMND)) {
                $Dm_kh_Model->setCMND($_CMND);
            }
            if (!empty($_NgayDangKi)) {
                $Dm_kh_Model->setNgayDangKi($_NgayDangKi);
            }
            if (!empty($_TrangThai)) {
                $Dm_kh_Model->setTrangThai($_TrangThai);
            }
            if (!empty($_HinhDaiDien)) {
                $Dm_kh_Model->setHinhDaiDien($_HinhDaiDien);
            }
            if (!empty($_TenDangNhap)) {
                $Dm_kh_Model->setTenDangNhap($_TenDangNhap);
            }

            $_Id = "";
            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
            }
            if (!empty($_Id)) {
                $Dm_kh_Model->setId($_Id);
                if ($Dm_kh_Model->update()) {
                    UtilityController::message("Đã cập nhật thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=Dm_kh&act=update&id=" . $_Id);
            } else {
                if ($Dm_kh_Model->insert()) {
                    UtilityController::message("Đã thêm mới thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=Dm_kh&act=update");
            }
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_URL);
        }
    }

}
