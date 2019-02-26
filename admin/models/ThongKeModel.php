<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ThongKeModel
 *
 * @author phamc
 */
class ThongKeModel extends BaseModel {

    public function getListTourHot() {
        try {
            $sql = "SELECT tour.`TenTour`, COUNT(`TourId`) AS so_luong_dat FROM `dattour`
                    JOIN tour ON `tour`.`Id` = `dattour`.`TourId`
                    where TrangThai = 1
                    GROUP BY `TourId`";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getSoLuongDatTour() {
        try {
            $sql = "SELECT tour.`TenTour`, COUNT(`TourId`) AS so_luong_dat FROM `dattour`
                    JOIN tour ON `tour`.`Id` = `dattour`.`TourId`
                    where TrangThai = 1
                    GROUP BY `TourId` limit 10";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getTourMoiNhat() {
        try {
            $sql = "Select * from tour where Xoa = 0 order by NgayTao desc limit 6";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getTongDoanhThu() {
        try {
            $sql = "SELECT SUM((SoLuongKhachDi * `tour`.`GiaTien`)) AS DoanhThu
                    FROM `dattour`
                    JOIN tour ON `tour`.`Id` = `dattour`.`TourId`
                    where TrangThai = 1";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
    
    public function getTongTourDaDat() {
        try {
            $sql = "SELECT SUM(`SoLuongKhachDi`) AS SoLuongTourDat
                    FROM `dattour`
                    WHERE `dattour`.`TrangThai` = 1 AND `dattour`.`Xoa` = 0";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
    public function getSoLuongTour() {
        try {
            $sql = "SELECT COUNT(`Id`) AS SoLuongTour
                    FROM `tour`
                    WHERE `Xoa` = 0";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
    
    public function getSoLuongKhachHang() {
        try {
            $sql = "SELECT COUNT(`Id`) AS SoLuongKhach
                    FROM `khachhang`
                    WHERE `Xoa` = 0";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
    
    public function getDoanhThuNgay() {
        try {
            $sql = "SELECT SUM((SoLuongKhachDi * `tour`.`GiaTien`)) AS DoanhThu, dattour.NgayTao
                    FROM `dattour`
                    JOIN tour ON `tour`.`Id` = `dattour`.`TourId`
                    where TrangThai = 1 AND YEAR(`dattour`.`NgayTao`) = YEAR(NOW())
                    GROUP BY dattour.NgayTao
                    order by `dattour`.`NgayTao`  limit 7";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getDoanhThuThang() {
        try {
            $sql = "SELECT SUM((SoLuongKhachDi * `tour`.`GiaTien`)) AS DoanhThu, dattour.NgayTao
                    FROM `dattour`
                    JOIN tour ON `tour`.`Id` = `dattour`.`TourId`
                    WHERE TrangThai = 1 AND YEAR(`dattour`.`NgayTao`) = YEAR(NOW())
                    GROUP BY MONTH(`dattour`.`NgayTao`)
                    ORDER BY `dattour`.`NgayTao`  LIMIT 12";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getDoanhThuNam() {
        try {
            $sql = "SELECT YEAR(`dattour`.`NgayTao`) AS Nam,SUM((SoLuongKhachDi * `tour`.`GiaTien`)) AS DoanhThu
                    FROM `dattour`
                    JOIN tour ON `tour`.`Id` = `dattour`.`TourId`
                    WHERE TrangThai = 1
                    GROUP BY Nam  LIMIT 5";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

    public function getTourTheoDiaDiem() {
        try {
            $sql = "select `TenDiaDiem`, count(TenTour) as SoLuong
                    from tour
                    join diadiem on `diadiem`.`Id` = `tour`.`DiaDiem`
                    group by `TenDiaDiem`";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }

}
