<?php

include_once '../database.php';

$obj = new database();

$toernooien = $obj->getToernooi();

$spelers = $obj->getSpelers();


if(isset($_POST['submit'])){  
    $fieldnames = ['toernooiID','ronde', 'speler1', 'speler2', 'score1', 'score2', 'winnaarsID'];

    $error = false;

    // loop through fieldnames and check if they are empty
    foreach ($fieldnames as $data) {
        if(empty($_POST[$data])){
            $error = true;
        }    
    }
    // inputfields toevoegen
    if(!$error){
        $obj->createWedstrijd($_POST['toernooiID'], $_POST['ronde'], $_POST['speler1'], $_POST['speler2'], $_POST['score1'], $_POST['score2'], $_POST['winnaarsID']);
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
    <title>Creëer</title>
</head>
<body style="background-color:darkorange;">


<form method="post">

        <div> 
        <label>Toernooi</label>
            <select name="toernooiID">
                <option>---</option>
                <?php foreach ($toernooien as $toernooi): ?>
                    <option value="<?php echo $toernooi['toernooiID'];?>"><?php echo $toernooi['omschrijving']. " ".$toernooi['datum'] ;?></option>
                <?php endforeach; ?>               
            </select>   
        </div>
        <div>        
            <label>Ronde</label>
                <input type="number" name="ronde"><br>
        </div>
        <div>
            <label>Speler1</label>
            <select name="speler1">
                <option>---</option>
                <?php foreach ($spelers as $speler): ?>
                    <option value="<?php echo $speler['spelerID'];?>"><?php echo $speler['voornaam']." ".$speler['tussenvoegsel']." ".$speler['achternaam'] ;?></option>
                <?php endforeach; ?>              
            </select>   
        </div>
        <div>
            <label>Speler2</label>
            <select name="speler2">
                <option>---</option>
                <?php foreach ($spelers as $speler): ?>
                    <option value="<?php echo $speler['spelerID'];?>"><?php echo $speler['voornaam']." ".$speler['tussenvoegsel']." ".$speler['achternaam'] ;?></option>
                <?php endforeach; ?>              
            </select>   
        </div>
        <div>
            <label>Score1</label>
            <input type="number" name="score1"><br>
        </div>
        <div>
            <label>Score2</label>
            <input type="number" name="score2"><br>
        </div>
        <div>
            <label>WinnaarsID</label>
            <select name="winnaarsID">
                <option>---</option>
                <?php foreach ($spelers as $speler): ?>
                    <option value="<?php echo $speler['spelerID'];?>"><?php echo $speler['voornaam']." ".$speler['tussenvoegsel']." ".$speler['achternaam'] ;?></option>
                <?php endforeach; ?>              
            </select>   
        </div>

        <div>
            <input type="submit" value="submit" name="submit">
        </div>
    </form>
    <div>

</body>
</html>