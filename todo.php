<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To do</title>
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Lora:400,700,700i" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<main>

<h1>Att göra-lista</h1>

<div class="all_tasks">

<?php

if(isset($_GET['message'])){
    echo "<p>" . $_GET['message'] . "</p>";
    }

require("pdo.php");

for ($i = 0; $i < count($TODO); $i++) {
    if ($TODO[$i]['completed'] == 0) {
    echo 
    "<div class='task'><p>
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
   </form>
   <form action='complete.php' method='POST'>
   <input type='hidden' name='id' value='" . $TODO[$i]['id'] . "' />
   <input type='submit' name='complete' value='Klarmarkera'/>
   </form></div><br/>";
}
}

?>
</div>

<h2>Avklarade uppgifter</h2>
<div class="completed_tasks">
<?php


for ($i = 0; $i < count($TODO); $i++) {
    if ($TODO[$i]['completed'] == 1) {
        echo "<div class='task'><p>
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
}

?>
</div>

<div class="add_task">
<h2>Lägg till på att göra-listan</h2>

<div>
<form action="add.php" method="POST">
<label>Uppgift</label><br/>
<input type="text" name="task" placeholder="Skriv här" /><br/>
<label>Tillagt av</label><br/>
<input type="text" name="name" placeholder="Ditt namn" /><br/>
<input type ="submit" value="Lägg till" />
</form>
</div>

</div>

</main>  
<footer>
    <p>Följ mig på Github: <a href="https://github.com/omigibson">@omigibson</a>. Där kan du bland annat lära dig mer 
    om <a href="https://github.com/omigibson/Todo">hur jag byggde denna applikation</a>.</p>
</footer>
</body>
</html>