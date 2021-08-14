<?php

    class Database
    {
        private $pdo = null;
        public $error = "";
        public $stmt = null;
        private $host = "localhost";
        private $dbname = "matrimony1";
        private $dbcharset = "utf8";
        private $dbusername = "root";
        private $dbpassword = "swapnil123";
        function getConnection()
        {
            try 
            {
                $this->pdo = new PDO(
                  "mysql:host=".$this->host.";dbname=".$this->dbname.";charset=".$this->dbcharset, 
                  $this->dbusername,$this->dbpassword
                );
                return $this->pdo;
            } 
            catch (Exception $ex) 
            { 
                die($ex->getMessage()); 
            }
        }
    }
?>