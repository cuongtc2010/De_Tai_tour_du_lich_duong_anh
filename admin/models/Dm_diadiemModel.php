
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
class Dm_diadiemModel extends BaseModel {

    private $Id;
    private $MaDiaDiem;
    private $TenDiaDiem;
    private $DiaChi;
    private $HinhAnh;
    private $Xoa;

    function getId() {
        return $this->Id;
    }

    function getMaDiaDiem() {
        return $this->MaDiaDiem;
    }

    function getTenDiaDiem() {
        return $this->TenDiaDiem;
    }

    function getDiaChi() {
        return $this->DiaChi;
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

    function setMaDiaDiem($MaDiaDiem) {
        $this->MaDiaDiem = $MaDiaDiem;
    }

    function setTenDiaDiem($TenDiaDiem) {
        $this->TenDiaDiem = $TenDiaDiem;
    }

    function setDiaChi($DiaChi) {
        $this->DiaChi = $DiaChi;
    }


    function setHinhAnh($HinhAnh) {
        $this->HinhAnh = $HinhAnh;
    }

    
    function setXoa($Xoa) {
        $this->Xoa = $Xoa;
    }
    
    public function getList() {
        try {
            $sql = "SELECT * FROM `diadiem` where xoa=0 AND 1=1 ";

            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
  public function getMa() {
        try {
            $sql = "SELECT MaDiaDiem FROM `diadiem` where MaDiaDiem LIKE '%DD%' order by Id DESC limit 1 ";

            $result = $this->_getList($sql);
            
            if(!empty($result)){
                $MaDiaDiem_array = explode("DD", $result[0]["MaDiaDiem"]); 
                $MaDiaDiem = "DD" . ($MaDiaDiem_array[1]+1);
                
            } else {
                 $MaDiaDiem = "DD1";
            }
           
            return $MaDiaDiem;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }


    public function getChitiet($id = 0) {
        try {
             $sql = "SELECT * FROM `diadiem` where xoa=0 ";
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
            $getmaxId = "SELECT MAX(id) as maxId FROM diadiem"; 
            $result = $this->_getList($getmaxId);
            if(!empty($result)){
                $maxId = 'DD' . ($result[0]["maxId"]+1);
            } else {
                $maxId = 0;
            }
            $pdo->beginTransaction();
            $sql = "insert into diadiem(
                    `MaDiaDiem`,
                    `TenDiaDiem`)
                     VALUES (
                    '$maxId',
                    '{$this->getTenDiaDiem()}')";
                    
            $pdo->exec($sql);
            $pdo->commit();
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
    
    public function update(){
        $pdo = $this->getPDO();
        try {
                $pdo->beginTransaction();
                $sql = "update `diadiem` set ";
                if (!is_null($this->getTenDiaDiem())) {
                    $sql .= " `TenDiaDiem`='{$this->getTenDiaDiem()}'";
                }
                if (!is_null($this->getId())) {
                    $sql .= " where  `id`='{$this->getId()}'";
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
                    $sql = "UPDATE `diadiem` SET xoa=1 where Id='{$value}'";
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
