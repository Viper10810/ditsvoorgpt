<?php

include_once '../database.php';

$obj = new database();

$user = $obj->getAanmeldingsID($_GET['id']);

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
        $obj->editAanmelding($_GET['id'], $_POST['spelerID'], $_POST['toernooiID']);
    } else {
        echo 'Fieldnames required';
    }
}
?>

    <form method="post">
        <div>
            <label>speler</label>
            <select name="spelerID">
                <option value="<?php echo $user[0]['spelerID']; ?>"><?php echo $user[0]['voornaam']." ".$user[0]['tussenvoegsel']." ".$user[0]['achternaam'] ;?></option>
                <option>----</option>
                <?php foreach ($spelers as $speler): ?>
                    <option value="<?php echo $speler['spelerID'];?>"><?php echo $speler['voornaam']." ".$speler['tussenvoegsel']." ".$speler['achternaam'] ;?></option>
                <?php endforeach; ?>              
            </select>   
        </div>
        <div>
            <label>toernooi</label>
            <select name="toernooiID">
                <option value="<?php echo $user[0]['toernooiID']; ?>"><?php echo $user[0]['omschrijving']." ".$user[0]['datum'] ;?></option>
                <option>----</option>
                <?php foreach ($toernooien as $toernooi): ?>
                    <option value="<?php echo $toernooi['toernooiID'];?>"><?php echo $toernooi['omschrijving']. " ".$toernooi['datum'] ;?></option>
                <?php endforeach; ?>               
            </select>   
        </div>
        <div>
            <input type="submit" value="submit" name="submit">
        </div>
    </form>