<?php
    class user
    {
        private $conn;
        private $table_name = "users";

        public $id;
	    public $name;
        public $username;
	    public $email;
	    public $password;
        public $isset;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function chkMail()
        {
            $query = "select * from ".$this->table_name." where email = ?";
            $stmt = $this->conn->prepare($query);
            $stmt ->bindParam(1,$this->email);
            $stmt->execute();
            return $stmt->rowCount();
        }

        public function createUser()
        {
            $query = "INSERT into ".$this->table_name."(userid,name,username,email,password,isset) values(?,?,?,?,?,?)";
            //prepare this query
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1,$this->id);
            $stmt->bindParam(2,$this->name);
            $stmt->bindParam(3,$this->username);
            $stmt->bindParam(4,$this->email);
            $stmt->bindParam(5,$this->password);
            $stmt->bindParam(6,$this->isset);
            // execute query
            if($stmt->execute())
            {   
                return true;
            }
            else
            {
                return false;
            }
        }

        public function loginUsers()
        {
            $query = "SELECT * from ".$this->table_name." where email = ? and password = ?";
            $stmt = $this->conn->prepare($query);
            $stmt ->bindParam(1,$this->email);
            $stmt ->bindParam(2,$this->password);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;          
        }
    }
?>