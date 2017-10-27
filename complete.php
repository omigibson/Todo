<?php
header("Location: http://localhost:8888/todo.php");
require("pdo.php");

$complete = $pdo->prepare("UPDATE TODO SET completed = 1 WHERE id = :id");

//print_r($_POST);

$complete->execute(array(
   ":id" => $_POST['id']
));;

?>