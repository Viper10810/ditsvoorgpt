<?php

include_once '../database.php';

$obj = new database();

$user = $obj->gettoernooiID($_GET['id']);


if(isset($_POST['submit'])){  
    $fieldnames = ['omschrijving', 'datum'];

    $error = false;

    // loop through fieldnames and check if they are empty
    foreach ($fieldnames as $data) {
        if(empty($_POST[$data])){
            $error = true;
        }    
    }

   if (!$error) {
       $obj->editToernooi($_POST['omschrijving'], $_POST['datum'], $_GET['id']);
   }else{
        echo 'Fieldnames required';
   }
}

?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pas toernooi aan</title>
</head>
<body>
    <h2>Pas Toernooi aan</h2>
    <form  method="post">    
        <label for="omschrijving">Toernooi</label>
        <input type="text" name="omschrijving" value="<?php echo $user['omschrijving']; ?>">
        <input type="date" name="datum" value="<?php echo $user['datum']; ?>">

        <input type="submit" value="submit" name="submit">
    </form>
</body style="background-color:darkorange;">
</html>