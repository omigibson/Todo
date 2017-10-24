<?php
$pdo = new PDO (
    "mysql:host=localhost;dbname=TODO;charset=utf8",
    "root",
    "root"
);

$statement = $pdo->prepare("SELECT * FROM TODO ORDER BY id DESC");
$statement->execute();
$TODO = $statement ->fetchALL(PDO::FETCH_ASSOC);
?>