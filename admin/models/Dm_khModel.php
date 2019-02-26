<?php

class Dm_khModel extends BaseModel {

    private $Id;
    private $MaKH;
    private $TenKH;
    private $DiaChi;
    private $GioiTinh;
    private $SDT;
    private $NgaySinh;
    private $Email;
    private $CMND;
    private $NgayDangKi;
    private $TrangThai;
    private $HinhDaiDien;
    private $MatKhau;
    private $TenDangNhap;
    private $Xoa;

    function getMatKhau() {
        return $this->MatKhau;
    }

    function getTenDangNhap() {
        return $this->TenDangNhap;
    }

    function setMatKhau($MatKhau) {
        $this->MatKhau = $MatKhau;
    }

    function setTenDangNhap($TenDangNhap) {
        $this->TenDangNhap = $TenDangNhap;
    }

    function getId() {
        return $this->Id;
    }

    function getMaKH() {
        return $this->MaKH;
    }

    function getTenKH() {
        return $this->TenKH;
    }

    function getDiaChi() {
        return $this->DiaChi;
    }

    function getGioiTinh() {
        return $this->GioiTinh;
    }

    function getSDT() {
        return $this->SDT;
    }

    function getNgaySinh() {
        return $this->NgaySinh;
    }

    function getEmail() {
        return $this->Email;
    }

    function getCMND() {
        return $this->CMND;
    }

    function getNgayDangKi() {
        return $this->NgayDangKi;
    }

    function getTrangThai() {
        return $this->TrangThai;
    }

    function getHinhDaiDien() {
        return $this->HinhDaiDien;
    }

    function getXoa() {
        return $this->Xoa;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setMaKH($MaKH) {
        $this->MaKH = $MaKH;
    }

    function setTenKH($TenKH) {
        $this->TenKH = $TenKH;
    }

    function setDiaChi($DiaChi) {
        $this->DiaChi = $DiaChi;
    }

    function setGioiTinh($GioiTinh) {
        $this->GioiTinh = $GioiTinh;
    }

    function setSDT($SDT) {
        $this->SDT = $SDT;
    }

    function setNgaySinh($NgaySinh) {
        $this->NgaySinh = $NgaySinh;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setCMND($CMND) {
        $this->CMND = $CMND;
    }

    function setNgayDangKi($NgayDangKi) {
        $this->NgayDangKi = $NgayDangKi;
    }

    function setTrangThai($TrangThai) {
        $this->TrangThai = $TrangThai;
    }

    function setHinhDaiDien($HinhDaiDien) {
        $this->HinhDaiDien = $HinhDaiDien;
    }

    function setXoa($Xoa) {
        $this->Xoa = $Xoa;
    }

    public function getList() {
        try {
            $sql = "SELECT * FROM `khachhang` where xoa=0 ";

            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getChitiet($id = 0) {
        try {
            $sql = "SELECT * FROM `khachhang` where xoa=0 ";
            if (!is_null($this->getId())) {
                $sql .= " and Id = '{$this->getId()}'";
            }
            $value = $this->_getObject($sql);
            return $value;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function insert() {
        $pdo = $this->getPDO();
        try {
            $getmaxId = "SELECT MAX(id) as maxId FROM khachhang";
            $result = $this->_getList($getmaxId);
            if (!empty($result)) {
                $maxId = 'KH' . ($result[0]["maxId"] + 1);
            } else {
                $maxId = 0;
            }

            $NgayDangKy = date('Y-m-d');
            $pdo->beginTransaction();
            $sql = "insert into khachhang(
                    `MaKH`,
                    `TenKH`,
                    `DiaChi`,
                    `GioiTinh`,
                    `SDT`,
                    `NgaySinh`,
                    `CMND`,
                    `Email`,
                    `NgayDangKi`,
                    `TrangThai`,
                    `HinhDaiDien`)
                     VALUES (
                    '$maxId',
                    '{$this->getTenKH()}',
                    '{$this->getDiaChi()}',
                    '{$this->getGioiTinh()}',
                    '{$this->getSDT()}',
                    '{$this->getNgaySinh()}',
                    '{$this->getCMND()}',
                    '{$this->getEmail()}',
                    '{$NgayDangKy}',
                    '1',
                    '{$this->getHinhDaiDien()}')";
            $pdo->exec($sql);
            $LastKHId = $pdo->lastInsertId();
            $MKhau =  md5("12345");
            $Add_user = "insert into users(
                    `username`,
                    `password`,
                    `ChucVuId`,
                    `KHId`)
                     VALUES (
                    '{$this->getTenDangNhap()}',
                    '$MKhau',
                    '5',
                    '$LastKHId')";
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
            $sql = "update `khachhang` set ";
            if (!is_null($this->getTenKH())) {
                $sql .= "`TenKH`='{$this->getTenKH()}'";
            }
            if (!is_null($this->getDiaChi())) {
                $sql .= ",`DiaChi`='{$this->getDiaChi()}'";
            }
            if (!is_null($this->getGioiTinh())) {
                $sql .= ",`GioiTinh`='{$this->getGioiTinh()}'";
            }
            if (!is_null($this->getSDT())) {
                $sql .= ",`SDT`='{$this->getSDT()}'";
            }
            if (!is_null($this->getNgaySinh())) {
                $sql .= ",`NgaySinh`='{$this->getNgaySinh()}'";
            }
            if (!is_null($this->getEmail())) {
                $sql .= ",`Email`='{$this->getEmail()}'";
            }
            if (!is_null($this->getCMND())) {
                $sql .= ",`CMND`='{$this->getCMND()}'";
            }
            if (!is_null($this->getNgayDangKi())) {
                $sql .= ", `NgayDangKi`='{$this->getNgayDangKi()}'";
            }
            if (!is_null($this->getTrangThai())) {
                $sql .= ", `TrangThai`='{$this->getTrangThai()}'";
            }
            if (!is_null($this->getHinhDaiDien())) {
                $sql .= ", `HinhDaiDien`='{$this->getHinhDaiDien()}'";
            }
            if (!is_null($this->getId())) {
                $sql .= " where Id='{$this->getId()}';";
            }
            
            if (!is_null($this->getMatKhau())) {
                $MatKhau = md5($this->getMatKhau());
                $sql .= " update `users` set `password`='{$MatKhau}' where `KHId` = '{$this->getId()}' ";
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
                    $sql = "UPDATE `khachhang` SET xoa=1 where Id='{$value}'";
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

}
