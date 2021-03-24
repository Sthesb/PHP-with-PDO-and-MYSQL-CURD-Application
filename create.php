<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>PHP Rest API</title>
    
</head>
<body>
    <div class="container">
        <h2 class="mt-5">Create User</h2>
        <hr>
        <?php
            if(isset($_POST['submit'])){
                if(empty($_POST['fullname']) || empty($_POST['user_name']) || empty($_POST['password'])){
                    echo '
                    <div class = "alert alert-danger">
                        <strong>Error : </strong>Ensure all fields are not empty
                    </div>
                    ';
                }else{
                    
                    require_once('./config/database.php');
                    require './class/User.php';
                    // connection to the database
                    $database = new Connection();
                    $connection = $database->getConnection();

                    // getting results from the class
                    $usersClass = new User($connection);
                    $usersClass->fullname = $_POST['fullname'];
                    $usersClass->username = $_POST['user_name'];
                    $usersClass->password = $_POST['password'];
                    $users = $usersClass->createUsers();
                    if($users == true){
                        echo '
                        <div class = "alert alert-success">
                            <strong>Success : </strong>User successfully created
                        </div>
                        ';
                    }else{
                        echo '
                        <div class = "alert alert-danger">
                            <strong>Error : </strong>User was unsuccessfull
                        </div>
                        ';
                    }
                }
            }
        ?>
        <form action="" method="post" class="col-md-6" autocomplete="off">
            <div class="form-group">
                <label for="">Full Name</label>
                <input type="text" name="fullname" id="fullname" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="user_name" autocomplete="off" id="user_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
            <a href="./index.php">Back</a>
        </form>
    </div>
   
</body>
</html>