<?php

/**
 * Description of _CoreLoginModel
 *
 * @author PhamCuong
 */
class _CoreLoginModel extends BaseModel{

    private $Id;
    private $Username;
    private $Password;

    function getId() {
        return $this->Id;
    }

    function getUsername() {
        return $this->Username;
    }

    function getPassword() {
        return $this->Password;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setUsername($Username) {
        $this->Username = $Username;
    }

    function setPassword($Password) {
        $this->Password = $Password;
    }
    public function getListLogin(){
        $sql = "SELECT * FROM users where Xoa = 0 ";
        if (!is_null($this->getUsername())) {
            $sql .= " and username='{$this->getUsername()}'";
        }
        if (!is_null($this->getPassword())) {
            $sql .= " and password='{$this->getPassword()}'";
        }
        $result = $this->_getList($sql);

        return $result;
    }
    public function getListLoginHome(){
        $sql = "SELECT * FROM users where `ChucVuId` <> 1 ";
        if (!is_null($this->getUsername())) {
            $sql .= " and username='{$this->getUsername()}'";
        }
        if (!is_null($this->getPassword())) {
            $sql .= " and password='{$this->getPassword()}'";
        }
        $result = $this->_getList($sql);

        return $result;
    }
    
    public function getTaiKhoan($_KHId, $_NVId){
        $sql = "SELECT username FROM users where 1=1 ";
        if(!is_null($_KHId)){
            $sql .= " and KHId = {$_KHId}";
        }
        if(!is_null($_NVId)){
            $sql .= " and NhanVienId = {$_NVId}";
        }
        $result = $this->_getList($sql);

        return $result;
    }
}
