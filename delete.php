<?php

$message = urlencode("En uppgift har tagits bort");

header("Location: http://localhost:8888/todo.php/?message=".$message);

require("pdo.php");

$delete = $pdo->prepare("DELETE FROM TODO WHERE id = :id");
$delete->execute(array(
    ":id" => $_POST['id']
));
?>