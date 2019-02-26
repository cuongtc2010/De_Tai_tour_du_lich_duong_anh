<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dm_luongModel
 *
 * @author PhamCuong
 */
class Dm_luongModel extends BaseModel {

    private $Id;
    private $MaLuong;
    private $MucLuong;
    private $HeSoLuong;
    private $NgayApDung;
    private $Xoa;

    function getId() {
        return $this->Id;
    }

    function getMaLuong() {
        return $this->MaLuong;
    }

    function getMucLuong() {
        return $this->MucLuong;
    }

    function getHeSoLuong() {
        return $this->HeSoLuong;
    }

    function getNgayApDung() {
        return $this->NgayApDung;
    }

    function getXoa() {
        return $this->Xoa;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setMaLuong($MaLuong) {
        $this->MaLuong = $MaLuong;
    }

    function setMucLuong($MucLuong) {
        $this->MucLuong = $MucLuong;
    }

    function setHeSoLuong($HeSoLuong) {
        $this->HeSoLuong = $HeSoLuong;
    }

    function setNgayApDung($NgayApDung) {
        $this->NgayApDung = $NgayApDung;
    }

    function setXoa($Xoa) {
        $this->Xoa = $Xoa;
    }

    
    public function getList() {
        try {
            $sql = "SELECT * FROM `luong` where xoa=0 ";

            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getChitiet($id = 0) {
        try {
            $sql = "SELECT * FROM `Luong` where xoa=0 ";
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
            $pdo->beginTransaction();
            $sql = "insert into Luong(
                    `MaLuong`,
                    `MucLuong`,
                    `HeSoLuong`,
                    `NgayApDung`)
                    
                     VALUES (
                    '{$this->getMaLuong()}',
                    '{$this->getMucLuong()}',
                    '{$this->getHeSoLuong()}',
                    '{$this->getNgayApDung()}')";
                    

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
            $sql = "update `Luong` set ";
            if (!is_null($this->getMaLuong())) {
                $sql .= "`MaLuong`='{$this->getMaLuong()}'";
            }
            if (!is_null($this->getMucLuong())) {
                $sql .= ",`MucLuong`='{$this->getMucLuong()}'";
            }
            if (!is_null($this->getHeSoLuong())) {
                $sql .= ",`HeSoLuong`='{$this->getHeSoLuong()}'";
            }
            if (!is_null($this->getNgayApDung())) {
                $sql .= ",`NgayApDung`='{$this->getNgayApDung()}'";
            }
            $sql .= " where Id = '{$this->getId()}'";
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
