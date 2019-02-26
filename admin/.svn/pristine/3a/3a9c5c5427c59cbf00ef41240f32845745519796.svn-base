<?php

require_once ROOT_DIRECTORY . DS . 'config.php';

class BaseModel {

    private $db;
    private $CompanyId;
    private $host = HOST;
    private $database = DATABASE;
    private $db_username = USERNAME;
    private $db_password = PASSWORD;

    function getDb() {
        return $this->db;
    }

    function setDb($db) {
        $this->db = $db;
    }

    function getCompanyId() {
        return "d1fa9230-0fba-11e7-99d7-00ffd6ea7b14"; //$_SESSION["CompanyId"];
    }

    function setCompanyId($CompanyId) {
        $this->CompanyId = $CompanyId;
    }

    function getHost() {
        return $this->host;
    }

    function getDatabase() {
        return $this->database;
    }

    function getDb_username() {
        return $this->db_username;
    }

    function getDb_password() {
        return $this->db_password;
    }

    function setHost($host) {
        $this->host = $host;
    }

    public function getPDO() {
        $dsn = 'mysql:host=' . $this->getHost() . ';dbname=' . $this->getDatabase();
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $pdo = new PDO($dsn, $this->getDb_username(), $this->getDb_password(), $options);
        return $pdo;
    }

    public function _getList($sql = '') {
        $dsn = 'mysql:host=' . $this->getHost() . ';dbname=' . $this->getDatabase();
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $pdo = new PDO($dsn, $this->getDb_username(), $this->getDb_password(), $options);
            if (IS_SHOW_SQL) {
                $this->showSQL($sql);
            }
            $stmt = $pdo->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet = $stmt->fetchAll();
            return $resultSet;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //exit();
        }
        return null;
    }

    protected function _getObject($sql = '') {
        $dsn = 'mysql:host=' . $this->getHost() . ';dbname=' . $this->getDatabase();
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $pdo = new PDO($dsn, $this->getDb_username(), $this->getDb_password(), $options);
            if (IS_SHOW_SQL) {
                $this->showSQL($sql);
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    protected function _getCount($sql = '') {
        $dsn = 'mysql:host=' . $this->getHost() . ';dbname=' . $this->getDatabase();
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $pdo = new PDO($dsn, $this->getDb_username(), $this->getDb_password(), $options);
            if (IS_SHOW_SQL) {
                $this->showSQL($sql);
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result->RowCount;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return 0;
    }

    protected function _getMaxOrder($sql = '') {
        $dsn = 'mysql:host=' . $this->getHost() . ';dbname=' . $this->getDatabase();
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $pdo = new PDO($dsn, $this->getDb_username(), $this->getDb_password(), $options);
            if (IS_SHOW_SQL) {
                $this->showSQL($sql);
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result->MaxOrder;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return 1;
    }

    protected function _insert($sql = null) {
        $dsn = 'mysql:host=' . $this->getHost() . ';dbname=' . $this->getDatabase();
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $pdo = new PDO($dsn, $this->getDb_username(), $this->getDb_password(), $options);
            $pdo->beginTransaction();
            if (IS_SHOW_SQL) {
                $this->showSQL($sql);
            }
            if (is_array($sql)) {
                foreach ($sql as $value) {
                    $pdo->exec($value);
                }
            } else {
                $pdo->exec($sql);
            }
            $last_id = $pdo->lastInsertId();
            $pdo->commit();
            return $last_id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return -1;
    }

    protected function _TuDongTangMa($prefix = '', $col = '', $table = '', $length = 4) {
        $dsn = 'mysql:host=' . $this->getHost() . ';dbname=' . $this->getDatabase();
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $pdo = new PDO($dsn, $this->getDb_password(), $this->getDb_password(), $options);
            $pdo->beginTransaction();
            $count_prefix = strlen($prefix);


            $year = date("Y");
            $result_ma = $prefix . $year;
            $cut_length = strlen($result_ma) + 1;

            $sql = "SELECT MAX(SUBSTR({$col},{$cut_length}))+1 AS Ma FROM {$table}";
            if (IS_SHOW_SQL) {
                echo "========> " . $sql;
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            $ma = (!is_null($result->Ma)) ? $result->Ma : 1;

            $count_ma = strlen($ma);
            $length_append = $length - $count_ma;
            for ($i = 0; $i < $length_append; $i++) {
                $result_ma .= "0";
            }
            $result_ma .= $ma;
            return $result_ma;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return -1;
    }

    protected function showSQL($sql) {
        echo "<div class='col-md-12'><div class='well' style='font-size:14px'><code>" . $sql . "</code></div></div>";
    }

}
