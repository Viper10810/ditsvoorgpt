<?php

include_once '../database.php';

$obj = new database();

$spelers = $obj->getSpelers();
$toernooien = $obj->getToernooi();

if(isset($_POST['submit'])){  
    $fieldnames = ['spelerID', 'toernooiID'];

    $error = false;

    // loop through fieldnames and check if they are empty
    foreach ($fieldnames as $data) {
        if(empty($_POST[$data])){
            $error = true;
        }    
    }
    
    if(!$error){
        $obj->createAanmelding($_POST['spelerID'], $_POST['toernooiID']);
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
    <title>Create aanmelding</title>
</head>
<body style="background-color:darkorange;">


    <form method="post">
        <div>
            <label>Kies een speler</label>
            <select name="spelerID">
                <?php foreach ($spelers as $speler): ?>
                    <option value="<?php echo $speler['spelerID'];?>"><?php echo $speler['voornaam']." ".$speler['tussenvoegsel']." ".$speler['achternaam'] ;?></option>
                <?php endforeach; ?>              
            </select>   
        </div>
        <div>
            <label>Kies een toernooi</label>
            <select name="toernooiID">
                <?php foreach ($toernooien as $toernooi): ?>
                    <option value="<?php echo $toernooi['toernooiID'];?>"><?php echo $toernooi['omschrijving']. " ",$toernooi['datum']." ";?></option>
                <?php endforeach; ?>               
            </select>   
        </div>
        <div>
            <input type="submit" value="submit" name="submit">
        </div>
    </form>

</body>
</html>