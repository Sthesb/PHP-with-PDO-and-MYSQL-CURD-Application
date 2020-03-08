<?php require ('include\header.php'); ?> 
<div class="container">
    <h1 class="py-3" style= "font-weight: 300">CRUD APPLICATION IN PHP AND POD</h1>
    <hr>
    <h3 class = "py-2">List of Todos</h3>
    <a href="insert.php" class="btn btn-primary mb-2">Add New Todo</a>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Todo</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                session_start();
                require 'config\dbconfig.php';
                $query = "SELECT * FROM todos";
                $statement = $connection->prepare($query);
                $statement->execute();
                $dbtobos = $statement->fetchAll(PDO::FETCH_OBJ);
                foreach($dbtobos as $todo){
                   
                    echo '
                        <tr>
                        <td>'.$todo->todo.'</td>
                        <td>'.$todo->todo_description.'</td>
                        <td>
                            <a href="update.php?id='.$todo->todo_id.'" class="btn btn-warning">Update</a>
                            <a href="delete.php?id='.$todo->todo_id.'" class="btn btn-danger">Delete</a>
                        </td>
                        </tr>
                    ';
                }
            ?>
            
        </tbody>
    </table>
     
    <!-- <hr class = "mt-5 pt-5"> -->
    
</div>

<?php require ('include\footer.php'); ?> 