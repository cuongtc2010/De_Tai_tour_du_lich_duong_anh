<?php


class quanlyloaitourModel extends BaseModel {
    private $Id;
    private $MaLoai;
    private $TenLoai;
    private $Xoa;
    
    function getId() {
        return $this->Id;
    }

    function getMaLoai() {
        return $this->MaLoai;
    }

    function getTenLoai() {
        return $this->TenLoai;
    }

    function getXoa() {
        return $this->Xoa;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setMaLoai($MaLoai) {
        $this->MaLoai = $MaLoai;
    }

    function setTenLoai($TenLoai) {
        $this->TenLoai = $TenLoai;
    }

    function setXoa($Xoa) {
        $this->Xoa = $Xoa;
    }

    
public function getList() {
        try {
            $sql = "SELECT * FROM `loaitour` where xoa= 0 ";
            
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
     public function getLoai() {
        try {
            $sql = "SELECT MaLoai FROM `loaitour` where MaLoai LIKE '%LT%' order by Id DESC limit 1 ";

            $result = $this->_getList($sql);
            
            if(!empty($result)){
                $MaLoai_array = explode("LT", $result[0]["MaLoai"]); 
                $MaLoai = "LT" . ($MaLoai_array[1]+1);
                
            } else {
                 $MaLoai = "LT1";
            }
           
            return $MaLoai;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
    public function getChitiet($id = 0) {
        try {
             $sql = "SELECT * FROM `loaitour` where xoa=0 ";
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
            $sql = "insert into loaitour(
                    `MaLoai`,
                    `TenLoai`)
                    
                     VALUES (
                    '{$this->getMaLoai()}',
                    '{$this->getTenLoai()}')";
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
                $sql = "update `loaitour` set ";
                if (!is_null($this->getMaLoai())) {
                    $sql .= "`MaLoai`='{$this->getMaLoai()}',";
                }
                if (!is_null($this->getTenLoai())) {
                    $sql .= "`TenLoai`='{$this->getTenLoai()}'";
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
                    $sql = "UPDATE `loaitour` SET xoa=1 where Id='{$value}'";
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
