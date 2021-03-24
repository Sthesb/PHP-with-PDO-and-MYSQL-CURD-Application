<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 class="mt-5">CRUD APPLICATION Users</h2>
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                
                <th scope="col">Full Name</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col"><a href = "./create.php" class="btn btn-primary">Create New</a></th>
                </tr>
            </thead>
            <tbody>

                <?php
                    
                    require_once('./config/database.php');
                    require './class/User.php';
                

                    // connection to the database
                    $database = new Connection();
                    $connection = $database->getConnection();

                    // getting results from the class
                    $usersClass = new User($connection);
                    $users = $usersClass->getAllUsers();
                    foreach($users as $user){
                        echo '
                        <tr>
                            <td>'.$user->fullname.'</td>
                            <td>'.$user->user_name.'</td>
                            <td>'.$user->user_pasword.'</td>
                            <td>
                                <a href = "./update.php?id='.$user->user_id.'" class="btn btn-warning">Update</a>
                                <a href = "./delete.php?id='.$user->user_id.'" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        ';
                    }

                    if(isset($_GET['result'])){
                        echo '
                        <div class = "alert alert-success">
                            <strong>Success : </strong>User successfully updated
                        </div>
                        ';
                      
                    }
                    
                    
                ?>
                
            </tbody>
        </table>
       
    </div>
</body>
</html>

