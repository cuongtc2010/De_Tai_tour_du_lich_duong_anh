<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dm_tourModel
 *
 * @author pc
 */
class PhanhoitukhachhangModel extends BaseModel {

    private $Id;
    private $KHId;
    private $NoiDung;
    private $TourId;
    private $Xoa;

    function getTourId() {
        return $this->TourId;
    }

    function setTourId($TourId) {
        $this->TourId = $TourId;
    }

        function getId() {
        return $this->Id;
    }

    function getKHId() {
        return $this->KHId;
    }

    function getNoiDung() {
        return $this->NoiDung;
    }

    function getXoa() {
        return $this->Xoa;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setKHId($KHId) {
        $this->KHId = $KHId;
    }

    function setNoiDung($NoiDung) {
        $this->NoiDung = $NoiDung;
    }

    function setXoa($Xoa) {
        $this->Xoa = $Xoa;
    }

    public function getList() {
        try {
            $sql = "SELECT Phanhoitukhachhang.*, khachhang.TenKH, khachhang.HinhDaiDien FROM `Phanhoitukhachhang`
                    JOIN khachhang ON phanhoitukhachhang.KHId = khachhang.Id ";

            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getChitiet($id = 0) {
        try {
            $sql = "SELECT * FROM `phanhoitukhachhang` ";
            if (!is_null($this->getId())) {
                $sql .= " where Id = '{$this->getId()}'";
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
            $sql = "insert into Phanhoitukhachhang(
                    `KHId`,
                    `TourId`,
                    `NoiDung`,
                    `Xoa`)
                     VALUES (
                    '{$this->getKHId()}',
                    '{$this->getTourId()}',
                    '{$this->getNoiDung()}',
                    0)";
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
                    $sql = "UPDATE `Phanhoitukhachhang` SET xoa=1 where Id='{$value}'";
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

    public function getListActive() {
        try {
            $sql = "SELECT phanhoitukhachhang.*, khachhang.TenKH, khachhang.HinhDaiDien FROM `phanhoitukhachhang`
                    JOIN khachhang ON phanhoitukhachhang.KHId = khachhang.Id where phanhoitukhachhang.Xoa = 1 ";

            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
}
