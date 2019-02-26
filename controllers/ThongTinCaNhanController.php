<?php

class ThongTinCaNhanController {

    const FOLDER_VIEW = 'ThongTinCaNhan';

    public function index() {

        //$Dm__Model = new Dm_tourModel();
        //$List_post_nhom_tin = $Post_nhom_tinModel->getList();

        $_Id = "";
        $_MaNV = "";
        $_TenNV = "";
        $_GioiTinh = "";
        $_NgaySinh = "";
        $_SDT = "";
        $_CMND = "";
        $_DiaChi = "";
        $_MatKhau = "";
        $_Email = "";
        $_TrangThai = "";
        $_ChucVuId = "";
        $_MaKH = "";
        $_TenKH = "";
        $_HinhAnh = "";
        $_NgayDangKi = "";
        if (isset($_SESSION["user_info_admin"])) {
            if ($_SESSION["user_info_admin"]["nhanvienid"] != NULL) {
                $_Id = $_SESSION["user_info_admin"]["nhanvienid"];
                $dm_nhan_vien_model = new Dm_nhanvienModel();
                $dm_nhan_vien_model->setId($_Id);
                $obj = $dm_nhan_vien_model->getChitiet();
                if (!is_null($obj)) {
                    $_Id = $obj->Id;
                    $_MaNV = $obj->MaNV;
                    $_TenNV = $obj->TenNV;
                    $_GioiTinh = $obj->GioiTinh;
                    $_NgaySinh = $obj->NgaySinh;
                    $_SDT = $obj->SDT;
                    $_CMND = $obj->CMND;
                    $_DiaChi = $obj->DiaChi;
                    $_MatKhau = $obj->MatKhau;
                    $_Email = $obj->Email;
                    $_TrangThai = $obj->TrangThai;
                    $_ChucVuId = $obj->ChucVuId;
                    require_once HOME_VIEW_DIRECTORY . DS . ThongTinCaNhanController::FOLDER_VIEW . DS . "nhanvien_index.php";
                }
            } else {
                $_Id = $_SESSION["user_info_admin"]["khid"];
                $dm_khach_hang_model = new Dm_khModel();
                $dm_khach_hang_model->setId($_Id);
                $obj = $dm_khach_hang_model->getChitiet();

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

                    require_once HOME_VIEW_DIRECTORY . DS . ThongTinCaNhanController::FOLDER_VIEW . DS . "khachhang_index.php";
                }
            }
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"])) {
            if ($_SESSION["user_info_admin"]["nhanvienid"] != NULL) {

                $Dm_nhanvien_Model = new Dm_nhanvienModel();

                $_MaNV = isset($_POST["txtMaNV"]) ? $_POST["txtMaNV"] : "";
                $_TenNV = isset($_POST["txtTenNV"]) ? $_POST["txtTenNV"] : "";
                $_GioiTinh = isset($_POST["txtGioiTinh"]) ? $_POST["txtGioiTinh"] : "";
                $_NgaySinh = isset($_POST["txtNgaySinh"]) ? $_POST["txtNgaySinh"] : "";
                $_SDT = isset($_POST["txtSDT"]) ? $_POST["txtSDT"] : "";
                $_CMND = isset($_POST["txtCMND"]) ? $_POST["txtCMND"] : "";
                $_DiaChi = isset($_POST["txtDiaChi"]) ? $_POST["txtDiaChi"] : "";
                $_Email = isset($_POST["txtEmail"]) ? $_POST["txtEmail"] : "";
                $_MatKhau = isset($_POST["txtMatKhau"]) ? $_POST["txtMatKhau"] : "";
                $_TrangThai = isset($_POST["txtTrangThai"]) ? $_POST["txtTrangThai"] : "";
                $_ChucVuId = isset($_POST["txtChucVuId"]) ? $_POST["txtChucVuId"] : "";



                if (!empty($_MaNV)) {
                    $Dm_nhanvien_Model->setMaNV($_MaNV);
                }
                if (!empty($_TenNV)) {
                    $Dm_nhanvien_Model->setTenNV($_TenNV);
                }
                if (!empty($_GioiTinh)) {
                    $Dm_nhanvien_Model->setGioiTinh($_GioiTinh);
                }
                if (!empty($_NgaySinh)) {
                    $Dm_nhanvien_Model->setNgaySinh($_NgaySinh);
                }
                if (!empty($_SDT)) {
                    $Dm_nhanvien_Model->setSDT($_SDT);
                }
                if (!empty($_CMND)) {
                    $Dm_nhanvien_Model->setCMND($_CMND);
                }
                if (!empty($_DiaChi)) {
                    $Dm_nhanvien_Model->setDiaChi($_DiaChi);
                }
                if (!empty($_Email)) {
                    $Dm_nhanvien_Model->setEmail($_Email);
                }
                if (!empty($_MatKhau)) {
                    $Dm_nhanvien_Model->setMatKhau($_MatKhau);
                }
                if (!empty($_TrangThai)) {
                    $Dm_nhanvien_Model->setTrangThai($_TrangThai);
                }
                if (!empty($_ChucVuId)) {
                    $Dm_nhanvien_Model->setChucVuId($_ChucVuId);
                }
                $_Id = "";
                if (isset($_SESSION["user_info_admin"]["nhanvienid"])) {
                    $_Id = $_SESSION["user_info_admin"]["nhanvienid"];
                }
                if (!empty($_Id)) {
                    $Dm_nhanvien_Model->setId($_Id);
                    if ($Dm_nhanvien_Model->update()) {
                        UtilityController::message("Đã cập nhật thành công");
                    } else {
                        UtilityController::messageError();
                    }
                    UtilityController::gotoPage("index.php?ctl=ThongTinCaNhan&id=" . $_Id);
                }
            } else {
                $Dm_kh_Model = new Dm_khModel();

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
                $_MatKhau = isset($_POST["txtMatKhau"]) ? $_POST["txtMatKhau"] : "";
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
                if (!empty($_MatKhau)) {
                    $Dm_kh_Model->setMatKhau($_MatKhau);
                }
                $_Id = "";
                if (isset($_SESSION["user_info_admin"]["khid"])) {
                    $_Id = $_SESSION["user_info_admin"]["khid"];
                }
                if (!empty($_Id)) {
                    $Dm_kh_Model->setId($_Id);
                    if ($Dm_kh_Model->update()) {
                        UtilityController::message("Đã cập nhật thành công");
                    } else {
                        UtilityController::messageError();
                    }
                    UtilityController::gotoPage("index.php?ctl=ThongTinCaNhan");
                }
            }
        }
    }

}
