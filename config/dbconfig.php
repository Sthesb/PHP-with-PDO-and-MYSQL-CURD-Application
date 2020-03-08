<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "todo_application";
    $messgae = "";
    try{
        $connection = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $error){
            $messgae = $error->getMessage();
    }
    
   

?>