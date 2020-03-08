<?php require ('include\header.php'); ?> 
<?php 
    session_start();
    require 'config\dbconfig.php';
    $id = $_GET['id'];
    $message = "";
    if(isset($_POST['submit'])){
        if(empty($_POST['todo']) || empty($_POST['description'])){
            $message = "All fields are required"; 
        }else{

            $todo = $_POST['todo'];
            $description = $_POST['description'];
            // echo $todo, $description;

            $query = "UPDATE todos SET 
            todo=:todo, 
            todo_description=:todo_description
            WHERE todo_id=:id";
            $statement = $connection->prepare($query);
            $statement->execute([
                ':id' => $id, 
                ':todo' => $todo, 
                ':todo_description' => $description
            ]);
           
            
            if($statement){
                header("Location: index.php");
            }
        }
    }
?>
<div class="container">
    <h1 class="py-3" style= "font-weight: 300">CRUD APPLICATION IN PHP AND POD</h1>
    <hr>
    <div class="container bg-info">
        <h5>
            <?php if($message){
                    echo $message;
                } 
            ?>
        </h5>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h3 class = "py-2">Update ToDo</h3>
            
            <?php
                $query = "SELECT * FROM todos WHERE todo_id = :id";
                $statement = $connection->prepare($query);
                $statement->execute([
                    'id' => $id
                ]);
                $dbtobos = $statement->fetchAll(PDO::FETCH_OBJ);
                foreach($dbtobos as $todo){}
            ?>
            <form action="update.php" method="post">
                <div class="container">
                    <div class="form-group">
                        <label for="">Todo Title</label>
                        <input type="text" name = "todo" value="<?= $todo->todo; ?>" id="todo" class = "form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Todo Description</label>
                        <input type = "text" name="description" id="decription" value="<?= $todo->todo_description; ?>" class = "form-control">
                    </div>
                    <div class="form-group">
                        <button class = "btn btn-primary" name= "submit">Update Todo</button>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
    <!-- <hr class = "mt-5 pt-5"> -->
    
</div>

<?php require ('include\footer.php'); ?> 