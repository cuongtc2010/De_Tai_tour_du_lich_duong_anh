<?php

class quanlytaikhoankhachhangModel extends BaseModel {

    private $Id;
    private $username;
    private $password;
    private $ChucVu;
    private $NhanVienId;
    private $KHId;
    private $Xoa;
    private $TrangThai;

    function getTrangThai() {
        return $this->TrangThai;
    }

    function setTrangThai($TrangThai) {
        $this->TrangThai = $TrangThai;
    }

    function getId() {
        return $this->Id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getChucVu() {
        return $this->ChucVu;
    }

    function getNhanVienId() {
        return $this->NhanVienId;
    }

    function getKHId() {
        return $this->KHId;
    }

    function getXoa() {
        return $this->Xoa;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setChucVu($ChucVu) {
        $this->ChucVu = $ChucVu;
    }

    function setNhanVienId($NhanVienId) {
        $this->NhanVienId = $NhanVienId;
    }

    function setKHId($KHId) {
        $this->KHId = $KHId;
    }

    function setXoa($Xoa) {
        $this->Xoa = $Xoa;
    }

    public function getList() {
        try {
            $sql = "SELECT users.*, khachhang.SDT, khachhang.TenKH FROM `users` JOIN chucvu on chucvu.Id = users.ChucVuId JOIN khachhang on khachhang.Id = users.KHId WHERE ChucVuId = 5";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getChitiet($id = 0) {
        try {
            $sql = "SELECT * FROM `users`";
            if (!is_null($this->getId())) {
                $sql .= " where KHId = '{$id}'";
            }

            $value = $this->_getObject($sql);
            return $value;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function update() {
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            $sql = "update `users` set ";
            if (!is_null($this->getTrangThai())) {
                $sql .= " `Xoa`={$this->getTrangThai()}";
            }
            if (!is_null($this->getKHId())) {
                $sql .= " where  `KHId`='{$this->getKHId()}'";
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

}
