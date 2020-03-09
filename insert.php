<?php require ('include\header.php'); ?> 
<?php 
    require 'config\dbconfig.php';
    $message = "";
    if(isset($_POST['submit'])){
        if(empty($_POST['todo']) || empty($_POST['description'])){
            $message = "All fields are required"; 
        }else{
            $todo = $_POST['todo'];
            $description = $_POST['description'];

            $query = "INSERT INTO todos(todo_id, todo, todo_description)
                    VALUES(:id, :todo, :todo_description)";
            $statement = $connection->prepare($query);
            $statement->execute([
                ':id' => null, 
                ':todo' => $todo, 
                ':todo_description' => $description
            ]);

            if($statement){
                header("Location: ./index.php");
            }
        }
    }
?>
<div class="container">
    <h1 class="py-3" style= "font-weight: 300">CRUD APPLICATION IN PHP PDO and MYSQL</h1>
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
            <h3 class = "py-2">Add New ToDo</h3>
            
            <form action="insert.php" method="post">
                <div class="container">
                    <div class="form-group">
                        <label for="">Todo Title</label>
                        <input type="text" name = "todo" id="todo" class = "form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Todo Description</label>
                         <input type = "text" name="description" id="decription"  class = "form-control">
                    </div>
                    <div class="form-group">
                        <button class = "btn btn-primary" name= "submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
       
    </div>
    <!-- <hr class = "mt-5 pt-5"> -->
    
</div>

<?php require ('include\footer.php'); ?> 
