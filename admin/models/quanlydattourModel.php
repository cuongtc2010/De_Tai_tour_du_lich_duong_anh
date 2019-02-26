<?php

class quanlydattourModel extends BaseModel {

    private $Id;
    private $MaDatTour;
    private $TourId;
    private $KHId;
    private $SoLuongKhachDi;
    private $NgayDi;
    private $NgayVe;
    private $NoiKhoiHanh;
    private $HanhTrinh;
    private $TenTour;
    private $Xoa;

    function getId() {
        return $this->Id;
    }

    function getMaDatTour() {
        return $this->MaDatTour;
    }

    function getTourId() {
        return $this->TourId;
    }

    function getKHId() {
        return $this->KHId;
    }

    function getSoLuongKhachDi() {
        return $this->SoLuongKhachDi;
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

    function getXoa() {
        return $this->Xoa;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setMaDatTour($MaDatTour) {
        $this->MaDatTour = $MaDatTour;
    }

    function setTourId($TourId) {
        $this->TourId = $TourId;
    }

    function setKHId($KHId) {
        $this->KHId = $KHId;
    }

    function setTenTour($TenTour) {
        $this->TenTour = $TenTour;
    }

    function setSoLuongKhachDi($SoLuongKhachDi) {
        $this->SoLuongKhachDi = $SoLuongKhachDi;
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

    function setXoa($Xoa) {
        $this->Xoa = $Xoa;
    }

    function getTenTour() {
        return $this->TenTour;
    }

    public function getList() {
        try {
            $sql = "SELECT dattour.*, tour.TenTour, khachhang.TenKH FROM `dattour` "
                    . "JOIN tour on dattour.tourId = tour.Id "
                    . "JOIN khachhang on dattour.KHId = khachhang.Id "
                    . "where dattour.xoa= 0";

            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getDatTours() {
        try {
            $sql = "SELECT MaDatTour FROM `dattour` where MaDatTour LIKE '%DT%' order by Id DESC limit 1 ";

            $result = $this->_getList($sql);

            if (!empty($result)) {
                $MaDatTours_array = explode("DT", $result[0]["MaDatTour"]);
                $MaDatTours = "DT" . ($MaDatTours_array[1] + 1);
            } else {
                $MaDatTours = "DT1";
            }

            return $MaDatTours;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getChitiet($id = 0) {
        try {
            $sql = "SELECT * FROM `dattour` where xoa=0 ";
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
            $NgayTao = date('Y-m-d');
            $sql = "insert into dattour(
                    `MaDatTour`,
                    `KHId`,
                    `TourId`,                    
                    `SoLuongKhachDi`,
                    `NgayDi`,
                    `NgayVe`,
                    `NoiKhoiHanh`,
                    `NgayTao`,
                    `HanhTrinh`)
                     VALUES (
                     '{$this->getDatTours()}',
                    '{$this->getKHId()}',
                    '{$this->getTourId()}',                    
                    '{$this->getSoLuongKhachDi()}',
                    '{$this->getNgayDi()}',
                    '{$this->getNgayVe()}',
                    '{$this->getNoiKhoiHanh()}',
                    '{$NgayTao}',
                    '{$this->getHanhTrinh()}')";
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
            $sql = "update `dattour` set ";
            if (!is_null($this->getMaDatTour())) {
                $sql .= "`MaDatTour`='{$this->getMaDatTour()}'";
            }
            if (!is_null($this->getKHId())) {
                $sql .= ",`KHId`='{$this->getKHId()}'";
            }
            if (!is_null($this->getTourId())) {
                $sql .= ",`TourId`='{$this->getTourId()}'";
            }

            if (!is_null($this->getSoLuongKhachDi())) {
                $sql .= ",`SoLuongKhachDi`='{$this->getSoLuongKhachDi()}'";
            }
            if (!is_null($this->getNgayDi())) {
                $sql .= ",`NgayDi`='{$this->getNgayDi()}'";
            }
            if (!is_null($this->getNgayVe())) {
                $sql .= ",`NgayVe`='{$this->getNgayVe()}'";
            }
            if (!is_null($this->getNoiKhoiHanh())) {
                $sql .= ",`NoiKhoiHanh`='{$this->getNoiKhoiHanh()}'";
            }
            if (!is_null($this->getHanhTrinh())) {
                $sql .= ",`HanhTrinh`='{$this->getHanhTrinh()}'";
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
                    $sql = "UPDATE `dattour` SET xoa=1 where Id='{$value}'";
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

    public function kichhoat_array(array $array) {
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            if (is_array($array)) {
                foreach ($array as $value) {
                    $sql = "UPDATE `dattour` SET TrangThai=1 where Id='{$value}'";
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

    public function yeucautour() {
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            $sql = "insert into dattour(
                    `MaDatTour`,
                    `KHId`,
                    `TenTour`,                    
                    `SoLuongKhachDi`,
                    `NgayDi`,
                    `NgayVe`,
                    `NoiKhoiHanh`,
                    `HanhTrinh`)
                    
                     VALUES (
                    '{$this->getMaDatTour()}',
                    '{$this->getKHId()}',                      
                    '{$this->getTenTour()}',                      
                    '{$this->getSoLuongKhachDi()}',
                    '{$this->getNgayDi()}',
                    '{$this->getNgayVe()}',
                    '{$this->getNoiKhoiHanh()}',
                    '{$this->getHanhTrinh()}')";
            $pdo->exec($sql);
            $pdo->commit();
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getDiaChiKhachHang($_KHId) {
        try {
            $sql = "SELECT `khachhang`.`DiaChi`, `khachhang`.`HinhDaiDien` FROM users 
                    JOIN  khachhang ON users.`KHId` = khachhang.`Id`
                    WHERE users.`Xoa` = 0 AND khachhang.`Id` = {$_KHId}";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getLichSu($_KHId) {
        try {
            $sql = "SELECT khachhang.TenKH,khachhang.SDT, khachhang.Email,`tour`.`TenTour`, tour.HinhAnh , NgayBatDau, NgayKetThuc, GiaTien, dattour.SoLuongKhachDi, dattour.MaDatTour , dattour.TrangThai
                    FROM `dattour`
                    JOIN tour on dattour.tourId = tour.Id
                    JOIN khachhang on dattour.KHId = khachhang.Id
                    where dattour.xoa= 0 AND dattour.KHId = {$_KHId} ORDER BY dattour.NgayTao DESC";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

}
