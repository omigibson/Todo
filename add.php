<?php

$message = urlencode("En ny uppgift har lagts till!");

if(!empty($_POST["task"] && $_POST["name"])){    
    header("Location: http://localhost:8888/todo.php?message=".$message);
}

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