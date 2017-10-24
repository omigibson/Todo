<?php
header("Location: todo.php");

require("pdo.php");

$add = $pdo->prepare(
    "INSERT INTO TODO (title, completed, createdBy)
    VALUES (:task, :completed, :name)"
);

$add->execute(array(
    ":task" => $_POST["task"],
    ":completed" => 0,
    ":name" => $_POST["name"]
));

?>