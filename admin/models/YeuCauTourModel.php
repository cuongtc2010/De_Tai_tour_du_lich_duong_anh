<?php

class YeuCauTourModel extends BaseModel {

    private $Id;
    private $KHId;
    private $SoLuongKhach;
    private $NgayDi;
    private $NgayVe;
    private $NoiKhoiHanh;
    private $HanhTrinh;
    private $GhiChu;

    function getId() {
        return $this->Id;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function getKHId() {
        return $this->KHId;
    }

    function setKHId($KHId) {
        $this->KHId = $KHId;
    }

    function getSoLuongKhach() {
        return $this->SoLuongKhach;
    }

    function getNgayDi() {
        return $this->NgayDi;
    }

    function getNgayVe() {
        return $this->NgayVe;
    }

    function getNoiKhoiHanh() {
        return $this->NoiKhoiHanh;
    }

    function getHanhTrinh() {
        return $this->HanhTrinh;
    }

    function getGhiChu() {
        return $this->GhiChu;
    }

    function setSoLuongKhach($SoLuongKhach) {
        $this->SoLuongKhach = $SoLuongKhach;
    }

    function setNgayDi($NgayDi) {
        $this->NgayDi = $NgayDi;
    }

    function setNgayVe($NgayVe) {
        $this->NgayVe = $NgayVe;
    }

    function setNoiKhoiHanh($NoiKhoiHanh) {
        $this->NoiKhoiHanh = $NoiKhoiHanh;
    }

    function setHanhTrinh($HanhTrinh) {
        $this->HanhTrinh = $HanhTrinh;
    }

    function setGhiChu($GhiChu) {
        $this->GhiChu = $GhiChu;
    }

    public function getList() {
        try {
            $sql = "SELECT yeucautour.* , TenKH, SDT, Email
                    FROM yeucautour
                    JOIN khachhang ON yeucautour.KHId = khachhang.Id";

            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }   

    public function getChitiet($id = 0) {
        try {
            $sql = "SELECT * FROM `yeucautour` where Xoa=0 ";
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

    public function yeucautour() {
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            $sql = "insert into yeucautour(
                    `KHId`,           
                    `SoLuongKhach`,
                    `NgayDi`,
                    `NgayVe`,
                    `NoiKhoiHanh`,
                    `HanhTrinh`,
                    `GhiChu`)
                 
                     VALUES (
                    '{$this->getKHId()}',
                    '{$this->getSoLuongKhach()}',
                    '{$this->getNgayDi()}',                      
                    '{$this->getNgayVe()}',                      
                    '{$this->getNoiKhoiHanh()}',
                    
                    '{$this->getHanhTrinh()}',
                    '{$this->getGhiChu()}')";

            $pdo->exec($sql);
            $pdo->commit();
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function delete_array(array $array) {
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            if (is_array($array)) {
                foreach ($array as $value) {
                    $sql = "UPDATE `yeucautour` SET xoa=1 where Id='{$value}'";
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

    public function xacnhan_array(array $array) {
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            if (is_array($array)) {
                foreach ($array as $value) {
                    $sql = "UPDATE `yeucautour` SET TrangThai=1 where Id='{$value}'";
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
