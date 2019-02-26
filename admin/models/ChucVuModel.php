<?php
 
class ChucVuModel extends BaseModel{
    private $Id;
    private $MaCV;
    private $TenCV;
    private $LuongId;
    private $PhuCap;
    private $Xoa;
    
    function getId() {
        return $this->Id;
    }

    function getMaCV() {
        return $this->MaCV;
    }

    function getTenCV() {
        return $this->TenCV;
    }

    function getLuongId() {
        return $this->LuongId;
    }

    function getPhuCap() {
        return $this->PhuCap;
    }

    function getXoa() {
        return $this->Xoa;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setMaCV($MaCV) {
        $this->MaCV = $MaCV;
    }

    function setTenCV($TenCV) {
        $this->TenCV = $TenCV;
    }

    function setLuongId($LuongId) {
        $this->LuongId = $LuongId;
    }

    function setPhuCap($PhuCap) {
        $this->PhuCap = $PhuCap;
    }

    function setXoa($Xoa) {
        $this->Xoa = $Xoa;
    }

    
    public function getList() {
        try {
            $sql = "SELECT chucvu.*, luong.MucLuong FROM `chucvu` "
                    . "join luong on chucvu.LuongId = luong.Id where chucvu.Xoa=0";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
    public function getListCVNV() {
        try {
            $sql = "SELECT chucvu.*, luong.MucLuong FROM `chucvu` "
                    . "join luong on chucvu.LuongId = luong.Id where chucvu.Xoa=0 and chucvu.Id<>5";
            $result = $this->_getList($sql);
            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
    public function getChitiet($id = 0) {
        try {
             $sql = "SELECT * FROM `ChucVu` where xoa=0 ";
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
            $sql = "insert into ChucVu(
                    `MaCV`,
                    `TenCV`,
                    `LuongId`,                   
                    `PhuCap`)
                     VALUES (
                    '{$this->getMaCV()}',
                    '{$this->getTenCV()}',
                    '{$this->getLuongId()}',
                    '{$this->getPhuCap()}')";
            $pdo->exec($sql);
            $pdo->commit();
            return true;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return null;
    }
    public function update() {

        $ChucVu_Model = new ChucVuModel();

        //$List_post_nhom_tin = $Post_nhom_tinModel->getList();
        $_Id = "";
        $_MaCV = "";
        $_TenCV = "";
        $_LuongId = "";
        $_Phucap = "";



        if (isset($_GET["id"])) {
            $_Id = $_GET["id"];
            $ChucVu_Model->setId($_Id);
            $obj = $ChucVu_Model->getChitiet();
            if (!is_null($obj)) {
                $_Id = $obj->Id;
                $_MaCV = $obj->MaCV;
                $_TenCV = $obj->TenCV;
                $_LuongId = $obj->LuongId;
                $_PhuCap = $obj->PhuCap;
            }
        }
        require_once ADMIN_VIEW_DIRECTORY . DS . ChucVuController::FOLDER_VIEW . DS . "update.php";
    }

    public function doUpdate() {
        $ChucVu_Model = new ChucVuModel();

        $_MaCV = isset($_POST["txtMaCV"]) ? $_POST["txtMaCV"] : "";
        $_TenCV = isset($_POST["txtTenCV"]) ? $_POST["txtTenCV"] : "";
        $_LuongId = isset($_POST["txtLuongId"]) ? $_POST["txtLuongId"] : "";
        $_Phucap = isset($_POST["txtPhuCap"]) ? $_POST["txtPhuCap"] : "";
        


        if (!empty($_MaCV)) {
           $ChucVu_Model->setMaCV($_MaCV);
        }
        if (!empty($_TenCV)) {
            $ChucVu_Model->setTenCV($_TenCV);
        }
        if (!empty($_LuongId)) {
            $ChucVu_Model->setLuongId($_LuongId);
        }
        if (!empty($_PhuCap)) {
            $ChucVu_Model->setPhuCap($_PhuCap);
        }
        

            $_Id = "";
            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
            }
            if (!empty($_Id)) {
                $ChucVu_Model->setId($_Id);
                if ($ChucVu_Model->update()) {
                    UtilityController::message("Đã cập nhật thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=ChucVu&act=update&id=" . $_Id);
            } else {
                if ($ChucVu_Model->insert()) {
                    UtilityController::message("Đã thêm mới thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=ChucVu&act=update");
            }
        }
        
        public function delete_array(array $array) {
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            if (is_array($array)) {
                foreach ($array as $value) {
                    $sql = "UPDATE `ChucVu` SET xoa=1 where Id='{$value}'";
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



