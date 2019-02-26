<?php

class quanlytaikhoannhanvienModel extends BaseModel {

    private $Id;
    private $username;
    private $password;
    private $ChucVu;
    private $NhanVienId;
    private $KHId;
    private $TrangThai;
    private $Xoa;

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
            $sql = "SELECT users.*, nhanvien.SDT, nhanvien.TenNV FROM `users` 
            JOIN chucvu on chucvu.Id = users.ChucVuId 
            JOIN nhanvien on nhanvien.Id = users.NhanVienId
            WHERE chucvu.MaCV LIKE '%NV%'";
            $result = $this->_getList($sql);
            return $result;
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
            if (!is_null($this->getChucVu())) {
                $sql .= " `ChucVuId`='{$this->getChucVu()}'";
            }
            if (!is_null($this->getNhanVienId())) {
                $sql .= " where  `Id`='{$this->getNhanVienId()}'";
            }
            $pdo->exec($sql);
            if (!is_null($this->getNhanVienId())) {
                
                if (!is_null($this->getChucVu())) {
                    $CV = $this->getChucVu();
                }
                $sql_user = "update `users` set Xoa = {$this->getTrangThai()}, ChucVuId = {$CV} where `NhanVienId`= {$this->getNhanVienId()}";
                
                $pdo->exec($sql_user);
            }

            $pdo->commit();
            return true;
        } catch (Exception $exc) {
            $pdo->rollBack();
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function getMatKhauCu($nhanvienid) {
        try {
            $sql = "SELECT password from users where NhanVienId = $nhanvienid";
            $result = $this->_getList($sql);
            return $result[0]["password"];
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getChitiet($id = 0) {
        try {
            $sql = "SELECT * FROM `users`";
            if (!is_null($this->getId())) {
                $sql .= " where NhanVienId = '{$id}'";
            }

            $value = $this->_getObject($sql);
            return $value;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

}
