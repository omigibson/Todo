<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do</title>
</head>
<body>

<h1>Att göra</h1>

<?php
$pdo = new PDO (
    "mysql:host=localhost;dbname=TODO;charset=utf8",
    "root",
    "root"
);

$statement = $pdo->prepare("SELECT * FROM TODO");
$statement->execute();
$TODO = $statement ->fetchALL(PDO::FETCH_ASSOC);

for ($i = 0; $i < count($TODO); $i++) {
    echo 
    "<div><p>" . $TODO[$i]['id'] . "<br/>
    Uppgift: " . $TODO[$i]['title'] . "<br/>
    Klar: "; 
    if ($TODO[$i]['completed'] == 0) {
        echo "Nej <br/>";
    }
    else {
        echo "Ja <br/>";
    } 
    "<br/>"; 
    echo "Tillagt av: " . $TODO[$i]['createdBy'] . "<br/>
   </p></div>";
}

var_dump($TODO);
?>

<h2>Lägg till på listan</h2>

<form action="todo.php" method="POST">
<label>Uppgift</label><br/>
<input type="text" name="task" placeholder="Skriv här" /><br/>
<label>Tillagt av</label><br/>
<input type="text" name="name" placeholder="Ditt namn" /><br/>
<input type ="submit" value="Lägg till" />
</form>

<?php
$add = $pdo->prepare(
    "Insert INTO TODO (title, completed, createdBy)
    VALUES (:task, :completed :name)"
);

$add->execute(array(
    ":task" => $_POST["task"],
    ":completed" => 0,
    ":name" => $_POST["name"]
));
?>
    
</body>
</html>