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
            $query = "INSERT into ".$this->table_name."(userid,name,username,email,password) values(?,?,?,?,?)";
            //prepare this query
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1,$this->id);
            $stmt->bindParam(2,$this->name);
            $stmt->bindParam(3,$this->username);
            $stmt->bindParam(4,$this->email);
            $stmt->bindParam(5,$this->password);
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
    }
?>