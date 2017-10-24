<?php

require("pdo.php");

$delete = $pdo->prepare("DELETE FROM TODO WHERE id = :id");


for ($i = 0; $i < count($TODO); $i++) {
    $TODO[$i]['id'];
}

var_dump($_POST);


/* $delete->execute(array(
    ":id" => $_GET["$TODO[$i]['id']"]
));*/
?>