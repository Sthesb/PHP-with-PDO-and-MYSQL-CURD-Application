<?php
    
    require_once('./config/database.php');
    require './class/User.php';
    if(isset($_GET['id'])){
        // connection to the database
        $database = new Connection();
        $connection = $database->getConnection();

        // getting results from the class
        $usersClass = new User($connection);
        $usersClass->user_id = $_GET['id'];
        $delete = $usersClass->deleteUsers();
        if($delete == true){
            header("Location: ./index.php");
            
        }
    }
    