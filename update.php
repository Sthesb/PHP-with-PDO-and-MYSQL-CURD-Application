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
        <h2 class="mt-5">Update User</h2>
        <hr>
        <?php
            require_once('./config/database.php');
            require './class/User.php';
            // 
            $fullname;
            $username;
            $password;
            $_SESSION['updated'] = false;
            // database connection
            $database = new Connection();
            $connection = $database->getConnection();

            // fetch don record from the database
            $usersClass =new User($connection);
            $usersClass->user_id = $_GET['id'];

            $results = $usersClass->getSingleUser();
            foreach($results as $user){
                $fullname = $user['fullname'];
                $username = $user['user_name'];
                $password = $user['user_pasword'];
            }
            
            if(isset($_POST['submit'])){
                if(empty($_POST['fullname']) || empty($_POST['user_name']) || empty($_POST['password'])){
                    echo '
                    <div class = "alert alert-danger">
                        <strong>Error : </strong>Ensure all fields are not empty
                    </div>
                    ';
                }else{
                    $usersClass->fullname = $_POST['fullname'];
                    $usersClass->username = $_POST['user_name'];
                    $usersClass->password = $_POST['password'];
                    $usersClass->user_id  = $_GET['id'];
                    $user = $usersClass->updateUser();

                    if($user == true){
                        $updated = "updated";
                        header("Location:./index.php?result=".$updated);
                        
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
                <input type="text" name="fullname" value="<?= $fullname ?>" id="fullname" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="user_name" value="<?= $username ?>" autocomplete="off" id="user_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" value="<?= $password ?>" id="password" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
            <a href="./index.php">Back</a>
        </form>
    </div>
   
</body>
</html>