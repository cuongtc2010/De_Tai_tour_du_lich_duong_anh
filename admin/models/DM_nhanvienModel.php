<?php

class Dm_nhanvienModel extends BaseModel {

    private $Id;
    private $MaNV;
    private $TenNV;
    private $NgaySinh;
    private $GioiTinh;
    private $SDT;
    private $CMND;
    private $DiaChi;
    private $MatKhau;
    private $Email;
    private $TrangThai;
    private $ChucVuId;
    private $HinhAnh;
    private $TenDangNhap;
    private $Xoa;

    function getHinhAnh() {
        return $this->HinhAnh;
    }

    function setHinhAnh($HinhAnh) {
        $this->HinhAnh = $HinhAnh;
    }

    function getId() {
        return $this->Id;
    }

    function getMaNV() {
        return $this->MaNV;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setMaNV($MaNV) {
        $this->MaNV = $MaNV;
    }

    function setTenNV($TenNV) {
        $this->TenNV = $TenNV;
    }

    function setNgaySinh($NgaySinh) {
        $this->NgaySinh = $NgaySinh;
    }

    function setGioiTinh($GioiTinh) {
        $this->GioiTinh = $GioiTinh;
    }

    function setSDT($SDT) {
        $this->SDT = $SDT;
    }

    function setCMND($CMND) {
        $this->CMND = $CMND;
    }

    function setDiaChi($DiaChi) {
        $this->DiaChi = $DiaChi;
    }

    function setMatKhau($MatKhau) {
        $this->MatKhau = $MatKhau;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setTrangThai($TrangThai) {
        $this->TrangThai = $TrangThai;
    }

    function setChucVuId($ChucVuId) {
        $this->ChucVuId = $ChucVuId;
    }

    function setXoa($Xoa) {
        $this->Xoa = $Xoa;
    }

    function getTenNV() {
        return $this->TenNV;
    }

    function getNgaySinh() {
        return $this->NgaySinh;
    }

    function getGioiTinh() {
        return $this->GioiTinh;
    }

    function getSDT() {
        return $this->SDT;
    }

    function getCMND() {
        return $this->CMND;
    }

    function getDiaChi() {
        return $this->DiaChi;
    }

    function getMatKhau() {
        return $this->MatKhau;
    }

    function getEmail() {
        return $this->Email;
    }

    function getTrangThai() {
        return $this->TrangThai;
    }

    function getChucVuId() {
        return $this->ChucVuId;
    }

    function getXoa() {
        return $this->Xoa;
    }
    function getTenDangNhap() {
        return $this->TenDangNhap;
    }

    function setTenDangNhap($TenDangNhap) {
        $this->TenDangNhap = $TenDangNhap;
    }

    
    public function getList() {
        try {
            $sql = "SELECT nhanvien.*, chucvu.TenCV FROM `nhanvien` join chucvu on chucvu.Id = nhanvien.ChucVuId where nhanvien.Xoa = 0 order by nhanvien.Id desc  ";

            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getChitiet($id = 0) {
        try {
            $sql = "SELECT nhanvien.*, chucvu.TenCV FROM `nhanvien` join chucvu on chucvu.Id = nhanvien.ChucVuId where nhanvien.xoa=0  ";
            if (!is_null($this->getId())) {
                $sql .= " and nhanvien.Id = '{$this->getId()}'";
            }
            $value = $this->_getObject($sql);
            return $value;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getListNhanVienCV() {
        try {
            $sql = "SELECT nhanvien.*, chucvu.TenCV FROM `nhanvien` JOIN chucvu on nhanvien.ChucVuId = chucvu.Id where nhanvien.xoa=0 And MaCV = 'NVHT' ";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function insert() {
        $pdo = $this->getPDO();
        try {
            $getmaxId = "SELECT MAX(id) as maxId FROM nhanvien";
            $result = $this->_getList($getmaxId);
            if (!empty($result)) {
                $maxId = 'NV' . ($result[0]["maxId"] + 1);
            } else {
                $maxId = 0;
            }

            $pdo->beginTransaction();
            $sql = "insert into nhanvien(
                    `MaNV`,
                    `TenNV`,
                    `NgaySinh`,
                    `GioiTinh`,
                    `SDT`,
                    `CMND`,
                    `DiaChi`,
                    `Email`,
                    `TrangThai`,
                    `HinhAnh`,
                    `ChucVuId`)
                     VALUES (
                    '$maxId',
                    '{$this->getTenNV()}',
                    '{$this->getNgaySinh()}',
                    '{$this->getGioiTinh()}',
                    '{$this->getSDT()}',
                    '{$this->getCMND()}',
                    '{$this->getDiaChi()}',
                    '{$this->getEmail()}',
                    '1',
                    '{$this->getHinhAnh()}',
                    '2')";  
                    
            $pdo->exec($sql);
            
            $LastNVId = $pdo->lastInsertId();
            $MKhau = md5("12345");
            $Add_user = "insert into users(
                    `username`,
                    `password`,
                    `ChucVuId`,
                    `NhanVienId`)
                     VALUES (
                    '{$this->getTenDangNhap()}',
                    '$MKhau',
                    '2',
                    '$LastNVId')";
            $pdo->exec($Add_user);
            $pdo->commit();
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function update() {
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            $sql = "update `nhanvien` set ";

            if (!is_null($this->getTenNV())) {
                $sql .= "`TenNV`='{$this->getTenNV()}',";
            }
            if (!is_null($this->getNgaySinh())) {
                $sql .= "`NgaySinh`='{$this->getNgaySinh()}',";
            }
            if (!is_null($this->getGioiTinh())) {
                $sql .= "`GioiTinh`='{$this->getGioiTinh()}',";
            }
            if (!is_null($this->getSDT())) {
                $sql .= "`SDT`='{$this->getSDT()}',";
            }
            if (!is_null($this->getCMND())) {
                $sql .= "`CMND`='{$this->getCMND()}',";
            }
            if (!is_null($this->getDiaChi())) {
                $sql .= "`DiaChi`='{$this->getDiaChi()}',";
            }
            if (!is_null($this->getEmail())) {
                $sql .= "`Email`='{$this->getEmail()}',";
            }
            if (!is_null($this->getMatKhau())) {
                $sql .= "`MatKhau`='{$this->getMatKhau()}',";
            }
            if (!is_null($this->getTrangThai())) {
                $sql .= "`TrangThai`='{$this->getTrangThai()}',";
            }
            if (!is_null($this->getChucVuId())) {
                $sql .= "`ChucVuId`='{$this->getChucVuId()}',";
            }
            if (!is_null($this->getHinhAnh())) {
                $sql .= "`HinhAnh`='{$this->getHinhAnh()}'";
            }
            if (!is_null($this->getId())) {
                $sql .= " where `Id`='{$this->getId()}'";
            }
            $pdo->exec($sql);
            $pdo->commit();
            return true;
        } catch (Exception $exc) {
            $pdo->rollBack();
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function delete_array(array $array) {
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            if (is_array($array)) {
                foreach ($array as $value) {
                    $sql = "UPDATE `nhanvien` SET xoa=1 where Id='{$value}'";
                    $pdo->exec($sql);
                }
                $pdo->commit();
            }
            return true;
        } catch (Exception $exc) {
            $pdo->rollBack();
            echo $exc->getTraceAsString();
        }
        return false;
    }
    public function getAvatar($id = 0) {
        try {
            $sql = "SELECT HinhAnh FROM `nhanvien` where nhanvien.xoa=0 ";
            if ($id > 0) {
                $sql .= " and Id = '{$id}'";
            }
            $value = $this->_getObject($sql);
            return $value;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
}
