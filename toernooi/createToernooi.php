<?php

include_once '../database.php';

$obj = new database();

if(isset($_POST['submit'])){  
    $fieldnames = ['omschrijving', 'datum'];

    $error = false;

    // loop through fieldnames and check if they are empty
    foreach ($fieldnames as $data) {
        if(empty($_POST[$data])){
            $error = true;
        }    
    }
    
    if(!$error){
        $obj->createToernooi($_POST['omschrijving'], $_POST['datum']);
    } else {
        echo 'Fieldnames required';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creëer toernooi</title>
</head>
<body style="background-color:darkorange;">

 <h2>Creëer een toernooi</h2>
    <form method="post">
        <div>
            <label>omschrijving</label>
            <input type="text" name="omschrijving">
        </div>
        <div>
            <label>Datum</label>
            <input type="date" name="datum"> 
        </div>
        <div>
            <input type="submit" value="submit" name="submit">
        </div>
    </form>

</body>
</html>