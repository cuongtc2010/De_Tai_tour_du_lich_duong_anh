<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TinTucModel extends BaseModel {

    private $Id;
    private $TenTinTuc;
    private $NoiDung;
    private $HinhAnh;
    private $Xoa;

    function getId() {
        return $this->Id;
    }

    function getTenTinTuc() {
        return $this->TenTinTuc;
    }

    function getNoiDung() {
        return $this->NoiDung;
    }

    function getHinhAnh() {
        return $this->HinhAnh;
    }

    function getXoa() {
        return $this->Xoa;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setTenTinTuc($TenTinTuc) {
        $this->TenTinTuc = $TenTinTuc;
    }

    function setNoiDung($NoiDung) {
        $this->NoiDung = $NoiDung;
    }

    function setHinhAnh($HinhAnh) {
        $this->HinhAnh = $HinhAnh;
    }

    function setXoa($Xoa) {
        $this->Xoa = $Xoa;
    }

    public function getList() {
        try {
            $sql = "SELECT * FROM `TinTuc` where 1=1";
            if (!is_null($this->getTenTinTuc())) {
                $sql .= " and `TenTinTuc` LIKE '%{$this->getTenTinTuc()}%'";
            }
            $sql .= " and xoa=0";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getChitiet($id = 0) {
        try {
            $sql = "SELECT * FROM `TinTuc` where xoa=0 ";
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
            $NgayTao = date('Y-m-d');
            $pdo->beginTransaction();
            $sql = "insert into TinTuc(
                   
                    `TenTinTuc`,                   
                    `NoiDung`,
                    `HinhAnh`,
                    `NgayTao`)
                     VALUES (
                  
                    '{$this->getTenTinTuc()}',
                    '{$this->getNoiDung()}',                    
                    '{$this->getHinhAnh()}',
                    '{$NgayTao}')";
            $pdo->exec($sql);
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
            $sql = "update `TinTuc` set ";

            if (!is_null($this->getTenTinTuc())) {
                $sql .= "`TenTinTuc`='{$this->getTenTinTuc()}',";
            }
            if (!is_null($this->getNoiDung())) {
                $sql .= "`NoiDung`='{$this->getNoiDung()}',";
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
                    $sql = "UPDATE `TinTuc` SET xoa=1 where Id='{$value}'";
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
    public function getTinMoi() {
        try {
            $sql = "SELECT * FROM `TinTuc` where xoa=0 ORDER BY NgayTao LIMIT 10";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

}
