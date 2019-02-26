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
class Dm_tourModel extends BaseModel {

    private $Id;
    private $MaTour;
    private $TenTour;
    private $NgayBatDau;
    private $NgayKetThuc;
    private $MaDM;
    private $GiaTien;
    private $TinhTrang;
    private $SoLuongKhach;
    private $Xoa;
    private $LoaiTour;
    private $DiaDiem;
    private $DieuKhoan;
    private $MoTa;
    private $GiaTourBaoGom;
    private $GiaTourKhongBaoGom;
    private $PhuThu;
    private $HinhAnh;
    private $NgayTao;

    function getId() {
        return $this->Id;
    }

    function getMaTour() {
        return $this->MaTour;
    }

    function getTenTour() {
        return $this->TenTour;
    }

    function getNgayBatDau() {
        return $this->NgayBatDau;
    }

    function getNgayKetThuc() {
        return $this->NgayKetThuc;
    }

    function getMaDM() {
        return $this->MaDM;
    }

    function getGiaTien() {
        return $this->GiaTien;
    }

    function getTinhTrang() {
        return $this->TinhTrang;
    }

    function getSoLuongKhach() {
        return $this->SoLuongKhach;
    }

    function getXoa() {
        return $this->Xoa;
    }

    function getLoaiTour() {
        return $this->LoaiTour;
    }

    function getDiaDiem() {
        return $this->DiaDiem;
    }

    function getDieuKhoan() {
        return $this->DieuKhoan;
    }

    function getMoTa() {
        return $this->MoTa;
    }

    function getHinhAnh() {
        return $this->HinhAnh;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setMaTour($MaTour) {
        $this->MaTour = $MaTour;
    }

    function setTenTour($TenTour) {
        $this->TenTour = $TenTour;
    }

    function setNgayBatDau($NgayBatDau) {
        $this->NgayBatDau = $NgayBatDau;
    }

    function setNgayKetThuc($NgayKetThuc) {
        $this->NgayKetThuc = $NgayKetThuc;
    }

    function setMaDM($MaDM) {
        $this->MaDM = $MaDM;
    }

    function setGiaTien($GiaTien) {
        $this->GiaTien = $GiaTien;
    }

    function setTinhTrang($TinhTrang) {
        $this->TinhTrang = $TinhTrang;
    }

    function setSoLuongKhach($SoLuongKhach) {
        $this->SoLuongKhach = $SoLuongKhach;
    }

    function setXoa($Xoa) {
        $this->Xoa = $Xoa;
    }

    function setLoaiTour($LoaiTour) {
        $this->LoaiTour = $LoaiTour;
    }

    function setDiaDiem($DiaDiem) {
        $this->DiaDiem = $DiaDiem;
    }

    function setDieuKhoan($DieuKhoan) {
        $this->DieuKhoan = $DieuKhoan;
    }

    function setMoTa($MoTa) {
        $this->MoTa = $MoTa;
    }

    function setHinhAnh($HinhAnh) {
        $this->HinhAnh = $HinhAnh;
    }

    function getNgayTao() {
        return $this->NgayTao;
    }

    function setNgayTao($NgayTao) {
        $this->NgayTao = $NgayTao;
    }

    function getGiaTourBaoGom() {
        return $this->GiaTourBaoGom;
    }

    function getGiaTourKhongBaoGom() {
        return $this->GiaTourKhongBaoGom;
    }

    function getPhuThu() {
        return $this->PhuThu;
    }

    function setGiaTourBaoGom($GiaTourBaoGom) {
        $this->GiaTourBaoGom = $GiaTourBaoGom;
    }

    function setGiaTourKhongBaoGom($GiaTourKhongBaoGom) {
        $this->GiaTourKhongBaoGom = $GiaTourKhongBaoGom;
    }

    function setPhuThu($PhuThu) {
        $this->PhuThu = $PhuThu;
    }

    public function getList() {
        try {
            $sql = "SELECT * FROM `tour` where xoa=0 AND 1=1 ";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
    
    public function getListTourNuocNgoai() {
        try {
            $sql = "SELECT * FROM `tour` where xoa=0 AND `LoaiTour` = 7 limit 6";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    } 
    public function getListTourTrongNuoc() {
        try {
            $sql = "SELECT * FROM `tour` where xoa=0 AND `LoaiTour` = 11 limit 6";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    } 
public function getListTourMienTay() {
        try {
            $sql = "SELECT * FROM `tour` where xoa=0 AND `LoaiTour` = 10 limit 6";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    } 
    public function getTours() {
        try {
            $sql = "SELECT MaTour FROM `tour` where MaTour LIKE '%MT%' order by Id DESC limit 1 ";

            $result = $this->_getList($sql);

            if (!empty($result)) {
                $MaTours_array = explode("MT", $result[0]["MaTour"]);
                $MaTours = "MT" . ($MaTours_array[1] + 1);
            } else {
                $MaTours = "MT1";
            }

            return $MaTours;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getChitiet($id = 0) {
        try {
            $sql = "SELECT * FROM `tour` where xoa=0 ";
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
            $sql = "insert into tour(
                    `MaTour`,
                    `TenTour`,
                    `NgayBatDau`,
                    `NgayKetThuc`,
                    `MaDM`,
                    `GiaTien`,
                    `TinhTrang`,
                    `SoLuongKhach`,
                    `LoaiTour`,
                    `DiaDiem`,
                    `DieuKhoan`,
                    `MoTa`,
                    `GiaTourBaoGom`,
                    `GiaTourKhongBaoGom`,
                    `PhuThu`,
                    `HinhAnh`)
                     VALUES (
                    '{$this->getMaTour()}',
                    '{$this->getTenTour()}',
                    '{$this->getNgayBatDau()}',
                    '{$this->getNgayKetThuc()}',
                    '{$this->getMaDM()}',
                    '{$this->getGiaTien()}',
                    '{$this->getTinhTrang()}',
                    '{$this->getSoLuongKhach()}',
                    '{$this->getLoaiTour()}',
                    '{$this->getDiaDiem()}',
                    '{$this->getDieuKhoan()}',
                    '{$this->getMoTa()}',
                    '{$this->getGiaTourBaoGom()}',
                    '{$this->getGiaTourKhongBaoGom()}',
                    '{$this->getPhuThu()}',    
                    '{$this->getHinhAnh()}')";

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
            $sql = "update `tour` set ";
            if (!is_null($this->getMaTour())) {
                $sql .= "`MaTour`='{$this->getMaTour()}',";
            }
            if (!is_null($this->getTenTour())) {
                $sql .= "`TenTour`='{$this->getTenTour()}',";
            }
            if (!is_null($this->getNgayBatDau())) {
                $sql .= "`NgayBatDau`='{$this->getNgayBatDau()}',";
            }
            if (!is_null($this->getNgayKetThuc())) {
                $sql .= "`NgayKetThuc`='{$this->getNgayKetThuc()}',";
            }
            if (!is_null($this->getMaDM())) {
                $sql .= "`MaDM`='{$this->getMaDM()}',";
            }
            if (!is_null($this->getGiaTien())) {
                $sql .= "`GiaTien`='{$this->getGiaTien()}',";
            }
            if (!is_null($this->getTinhTrang())) {
                $sql .= "`TinhTrang`='{$this->getTinhTrang()}',";
            }
            if (!is_null($this->getSoLuongKhach())) {
                $sql .= "`SoLuongKhach`='{$this->getSoLuongKhach()}',";
            }
            if (!is_null($this->getLoaiTour())) {
                $sql .= "`LoaiTour`='{$this->getLoaiTour()}',";
            }
            if (!is_null($this->getDiaDiem())) {
                $sql .= "`DiaDiem`='{$this->getDiaDiem()}',";
            }
            if (!is_null($this->getDieuKhoan())) {
                $sql .= "`DieuKhoan`='{$this->getDieuKhoan()}',";
            }
            if (!is_null($this->getMoTa())) {
                $sql .= "`MoTa`='{$this->getMoTa()}',";
            }
            if (!is_null($this->getGiaTourBaoGom())) {
                $sql .= "`GiaTourBaoGom`='{$this->getGiaTourBaoGom()}',";
            }
            if (!is_null($this->getGiaTourKhongBaoGom())) {
                $sql .= "`GiaTourKhongBaoGom`='{$this->getGiaTourKhongBaoGom()}',";
            }
            if (!is_null($this->getPhuThu())) {
                $sql .= "`PhuThu`='{$this->getPhuThu()}',";
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
                    $sql = "UPDATE `tour` SET xoa=1 where Id='{$value}'";
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

    public function Timtour() {
        try {
            $sql = "SELECT * FROM `tour` where xoa=0";
            if (!is_null($this->getTenTour())) {
                $sql .= " and `TenTour` LIKE '%{$this->getTenTour()}%'";
            }
            if (!is_null($this->getDiaDiem())) {
                $sql .= " and `DiaDiem` = '{$this->getDiaDiem()}'";
            }
            if (!is_null($this->getLoaiTour())) {
                $sql .= " and `LoaiTour` = '{$this->getLoaiTour()}'";
            }
            if (!is_null($this->getGiaTien())) {
                $sql .= " ORDER BY GiaTien DESC";
            } else {
                $sql .= " ORDER BY NgayTao DESC";
            }
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

}
