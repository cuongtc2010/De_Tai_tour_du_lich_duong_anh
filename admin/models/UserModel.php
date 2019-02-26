<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModel
 *
 * @author PhamCuong
 */
class UserModel extends BaseModel {
    
    private $Id;
    private $username;
    private $password;
    private $ChucVuId;
    private $NhanVienId;
    private $KHId;
    private $Xoa;
    function getId() {
        return $this->Id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getChucVuId() {
        return $this->ChucVuId;
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

    function setChucVuId($ChucVuId) {
        $this->ChucVuId = $ChucVuId;
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

    public function insert() {
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            $sql = "insert into tour(
                    `username`,
                    `password`,
                    `ChucVuId`,
                    `NhanVienId`,
                    `KHId`,
                    `Xoa`)
                     VALUES (
                    '{$this->getUsername()}',
                    '{$this->getPassword()}',
                    '{$this->getChucVuId()}',
                    '{$this->getNhanVienId()}',
                    '{$this->KHId()}',
                    '{$this->getGiaTien()}')";
            $pdo->exec($sql);
            $pdo->commit();
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
}
