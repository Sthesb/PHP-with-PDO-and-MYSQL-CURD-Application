<?php

    class User{
        private $connection;
        private $table = "Users";
        public $fullname;
        public $username;
        public $password;
        public $user_id;
        // DB Connection
        public function __construct($db)
        {
            $this->connection = $db;
        }

        //Get all values from users table
        public function getAllUsers(){
            $query = "Select * from ".$this->table."";
            $statement = $this->connection->prepare($query);
            if($statement->execute()){
                $user = $statement->fetchAll(PDO::FETCH_OBJ);
                return $user;
            }
        }
        
        // get a single user
        public function getSingleUser(){
            $query = "SELECT * FROM ".$this->table." WHERE user_id = :id";
            $statement = $this->connection->prepare($query);
            $statement->execute([
                ':id' => $this->user_id
            ]);
            $user = $statement->fetchAll(PDO::FETCH_ASSOC);
            if($statement){
                return $user;
            }
        }

        // create user
        public function createUsers(){
            
            $query = "INSERT INTO ".$this->table."(fullname, user_name, user_pasword)
            Values(:name, :username, :password)";
            $statement = $this->connection->prepare($query);
            $statement->execute([
                ':name' => $this->fullname,
                ':username' => $this->username,
                ':password' => $this->password
            ]);

            if($statement){
                return true;
            }
            return false;
        }

        public function updateUser(){
            $query = "UPDATE ".$this->table." 
            SET `fullname` = :name, `user_name` = :username, `user_pasword` = :password
            WHERE user_id = ".$this->user_id."";
            $statement = $this->connection->prepare($query);
            $statement->execute([
                ':name' => $this->fullname,
                ':username' => $this->username,
                ':password' => $this->password
            ]);

            if($statement){
                return true;
            }
            return false;
        }

        public function deleteUsers(){
            $query = "DELETE FROM ".$this->table." 
            WHERE user_id = ".$this->user_id."";
            $statement = $this->connection->prepare($query);
            $statement->execute();

            if($statement){
                return true;
            }
            return false;
        }
        
    }