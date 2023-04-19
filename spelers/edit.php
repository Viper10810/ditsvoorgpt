<?php

include_once '../database.php';

$obj = new database();

$user = $obj->getSpelerID($_GET['id']);
$scholen = $obj->getSchool();


if(isset($_POST['submit'])){  
    $fieldnames = ['voornaam', 'achternaam', 'scholen'];

    $error = false;

    // loop through fieldnames and check if they are empty
    foreach ($fieldnames as $data) {
        if(empty($_POST[$data])){
            $error = true;
        }    
    }

   if (!$error) {
       $obj->editSpeler($_POST['voornaam'], $_POST['tussenvoegsel'], $_POST['achternaam'], $_POST['scholen'], $_GET['id']);
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
    <title>Speler Aanpassen</title>
</head>
<body style="background-color:darkorange;">

    <h2>Speler aanpassen</h2>
    <form  method="post">
        <label for="voornaam">Voornaam</label>
        <input type="text" name="voornaam" value="<?php echo $user['voornaam']; ?>">
        
        <label for="tussenvoegsel">Tussenvoegsel</label>
        <input type="text" name="tussenvoegsel" value="<?php echo $user['tussenvoegsel']; ?>">
        
        <label for="achternaam">Achternaam</label>
        <input type="text" name="achternaam" value="<?php echo $user['achternaam']; ?>">

        <label for="naam">School</label>
        <select name="scholen">
            <?php foreach ($scholen as $school): ?>
                <option value="<?php echo $school['schoolID'];?>"><?php echo $school['naam'];?></option>
            <?php endforeach; ?>               
        </select>   
        
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>   