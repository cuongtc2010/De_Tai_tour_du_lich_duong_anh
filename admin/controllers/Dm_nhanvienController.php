<?php

class Dm_nhanvienController {

    const FOLDER_VIEW = 'Dm_nhanvien';

    public function index() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
            $Dm_nhanvien_Model = new Dm_nhanvienModel();

            $list = $Dm_nhanvien_Model->getList();
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
                            UtilityController::gotoPage("index.php?ctl=Dm_nhanvien");
                        } else {
                            UtilityController::messageError();
                            UtilityController::gotoPage("index.php?ctl=Dm_nhanvien");
                        }
                    }
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . Dm_nhanvienController::FOLDER_VIEW . DS . "index.php";
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_ADMIN_URL);
        }
    }

    public function update() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
            $Dm_kh_Model = new DM_nhanvienModel();
            $dm_login_model = new LoginModel();
            $ChucVu_Model = new ChucVuModel();
            $List_Chuc_Vu = $ChucVu_Model->getList();

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
            $_HinhAnh = "";
            $_TenDangNhap = "";
            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
                $Dm_nhanvien_Model = new Dm_nhanvienModel();
                $Dm_nhanvien_Model->setId($_Id);
                $obj = $Dm_nhanvien_Model->getChitiet();
                $get_ten_dang_nhap = $dm_login_model->getTaiKhoan(null,$_Id);
                $_TenDangNhap = $get_ten_dang_nhap[0]["username"];
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
                    $_ChucVuId = $obj->TenCV;
                    $_HinhAnh = $obj->HinhAnh;
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . Dm_nhanvienController::FOLDER_VIEW . DS . "update.php";
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_ADMIN_URL);
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"]["nhanvienid"]) && $_SESSION["user_info_admin"]["chucvuid"] != 5) {
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
            $_HinhAnh = isset($_POST["HinhAnh"]) ? $_POST["HinhAnh"] : "";
            $_TenDangNhap = isset($_POST["txtTenDangNhap"]) ? $_POST["txtTenDangNhap"] : "";



//        if (!empty($_MaNV)) {
//            $Dm_nhanvien_Model->setMaNV($_MaNV);
//        }
            if (!empty($_DiaChi)) {
                $Dm_nhanvien_Model->setDiaChi($_DiaChi);
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
            if (!empty($_HinhAnh)) {
                $Dm_nhanvien_Model->setHinhAnh($_HinhAnh);
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
            if (!empty($_TenDangNhap)) {
                $Dm_nhanvien_Model->setTenDangNhap($_TenDangNhap);
            }
            $_Id = "";
            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
            }
            if (!empty($_Id)) {
                $Dm_nhanvien_Model->setId($_Id);
                if ($Dm_nhanvien_Model->update()) {
                    UtilityController::message("Đã cập nhật thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=Dm_nhanvien&act=update&id=" . $_Id);
            } else {
                if ($Dm_nhanvien_Model->insert()) {
                    UtilityController::message("Đã thêm mới thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=Dm_nhanvien&act=update");
            }
        } else {
            UtilityController::message("Bạn không phải nhân viên");
            UtilityController::gotoPage(ROOT_ADMIN_URL);
        }
    }

}
