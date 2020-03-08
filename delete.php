<?php
require './config/dbconfig.php';
$todo_id = $_GET['id'];
$sql = "DELETE FROM todos WHERE todo_id = :todo_id;" ;
$statement = $connection->prepare($sql);
$statement->execute([
  ':todo_id' => $todo_id
  ]);
if ($statement) {
  header("Location: ./index.php");
}

?>