<?php

include_once '../database.php';

$obj = new database();


$user = $obj->getwedstrijdID($_GET['id']);

$spelers = $obj->getSpelers();
$toernooien = $obj->getToernooi();




if(isset($_POST['submit'])){  
    print_r($spelers);
   $obj->editWedstrijd($_GET['id'], $_POST['toernooiID'], $_POST['ronde'], $_POST['speler1ID'], $_POST['speler2ID'], $_POST['score1'], $_POST['score2'], $_POST['winnaarsID']);

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht wedstrijden</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https:stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

</head>
<body style="background-color:darkorange;">
 
    <h2>Wedstrijd aanpassen</h2>
    <form action="#" method="post">
        <div>
            <label>Speler 1</label>
            <select name="speler1ID">
                <option value="<?php echo $user[0]['speler1ID']; ?>"><?php echo $user[0]['speler1'];?></option>
                <option>----</option>
                <?php foreach ($spelers as $speler): echo print_r($speler); ?>
                    <option value="<?php echo $speler['speler1ID'];?>"><?php echo $speler['voornaam']." ".$speler['tussenvoegsel']." ".$speler['achternaam'] ;?></option>
                <?php endforeach; ?>              
            </select>   
        </div>
        <div>
            <label>Speler 2</label>
            <select name="speler2ID">
                <option value="<?php echo $user[0]['speler2ID']; ?>"><?php echo $user[0]['speler2'];?></option>
                <option>----</option>
                <?php foreach ($spelers as $speler): ?>
                    <option value="<?php echo $speler['speler2ID'];?>"><?php echo $speler['voornaam']." ".$speler['tussenvoegsel']." ".$speler['achternaam'] ;?></option>
                <?php endforeach; ?>              
            </select>   
        </div>
        <div>
            <label>Winnaar</label>
            <select name="winnaarsID">
                <option value="<?php echo $user[0]['winnaarsID']; ?>"><?php echo $user[0]['winnaar'];?></option>
                <option>----</option>
                <?php foreach ($spelers as $speler): ?>
                    <option value="<?php echo $speler['spelerID'];?>"><?php echo $speler['voornaam']." ".$speler['tussenvoegsel']." ".$speler['achternaam'] ;?></option>
                <?php endforeach; ?>              
            </select>   
        </div>
        <div>
            <label>Toernooi</label>
            <select name="toernooiID">
                <option value="<?php echo $user[0]['toernooiID']; ?>"><?php echo $user[0]['omschrijving']." ".$user[0]['datum'] ;?></option>
                <option>----</option>
                <?php foreach ($toernooien as $toernooi): ?>
                    <option value="<?php echo $toernooi['toernooiID'];?>"><?php echo $toernooi['omschrijving']. " ".$toernooi['datum'] ;?></option>
                <?php endforeach; ?>               
            </select>   
        </div>
        <label for="ronde">Ronde</label>
        <input type="number" name="ronde" value="<?php echo $user[0]['ronde']; ?>"> <br>
        <label for="score1">Score 1</label>
        <input type="number" name="score1" value="<?php echo $user[0]['score1']; ?>"><br>
        <label for="score2">Score 2</label>
        <input type="number" name="score2" value="<?php echo $user[0]['score2']; ?>"><br>
        <div>
            <input type="submit" value="submit" name="submit">
        </div>
    </form>
</body>
</html>