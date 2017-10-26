<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do</title>

    <style>
    html {
        background-image: url(images/pink.jpeg);
        background-size: cover;
    }

    h1, h2 {
        text-align:center;
    }

    main {
        display: flex;
        flex-direction: column;
        align-items:center;
    }

    div {
        width: 200px;
        text-align: center;
        border: 1px dashed white;
    }
    </style>
</head>
<body>

<main>

<h1>Att göra</h1>

<?php

if(isset($_GET['message'])){
    echo "<p>" . $_GET['message'] . "</p>";
    }

require("pdo.php");

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
   </p>";
   echo "<form action='delete.php' method='POST'>
   <input type='hidden' name='id' value='" . $TODO[$i]['id'] . "' />
   <input type='submit' name='delete' value='Ta bort'/>
   </form></div><br/>";
}

/*foreach($TODO as $task){
    echo 
    "<div><p>" . $task['id'] . "<br/>
    Uppgift: " . $task['title'] . "<br/>
    Klar: "; 
    if ($task['completed'] == 0) {
        echo "Nej <br/>";
    }
    else {
        echo "Ja <br/>";
    } 
    "<br/>"; 
    echo "Tillagt av: " . $task['createdBy'] . "<br/>
   </p></div>";?>
   <form action="delete.php" method="POST">
   <input type="submit" name="$task['id']" value="Ta bort"/>
   </form>
   <?php
}*/


//var_dump($TODO);
?>

<h2>Lägg till på listan</h2>

<div>
<form action="add.php" method="POST">
<label>Uppgift</label><br/>
<input type="text" name="task" placeholder="Skriv här" /><br/>
<label>Tillagt av</label><br/>
<input type="text" name="name" placeholder="Ditt namn" /><br/>
<input type ="submit" value="Lägg till" />
</form>
</div>

<?php

//$newtask = $_POST["task"];
//$newname = $_POST["name"];



?>
</main>  
</body>
</html>