<?php

header("Location: http://localhost:8888/todo.php");

require("pdo.php");

$delete = $pdo->prepare("DELETE FROM TODO WHERE id = :id");
$delete->execute(array(
    ":id" => $_POST['id']
));
?>