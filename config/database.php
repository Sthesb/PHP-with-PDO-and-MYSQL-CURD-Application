<?php

    class Connection{
        private $host = "localhost";
        private $dbname = "php_api";
        private $dbuser = "root";
        private $dbpassword = "";

        public $connection;
        public function getConnection(){
            $this->connection = null;
            try{
                $this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->dbuser, $this->dbpassword);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "No connection".$e->getMessage();
            }
            return $this->connection;
        }
    }