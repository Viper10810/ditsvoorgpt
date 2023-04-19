<?php
include_once '../database.php';

$obj = new database();
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
    
    if(!$error){
        $obj->createSpelers($_POST['voornaam'], $_POST['tussenvoegsel'], $_POST['achternaam'], $_POST['scholen']);
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
    <title>Creëer speler</title>
</head>
<body style="background-color:darkorange;">

    <h2>Voeg een Speler toe</h2>

    <form method="post">
        <div>
            <label>Voornaam</label>
            <input type="text" name="voornaam" required>
        </div>
        <div>
            <label>Tussenvoegsel</label>
            <input type="text" name="tussenvoegsel">
        </div>
        <div>
            <label>Achternaam</label>
            <input type="text" name="achternaam" required>
        </div>
        <div>
            <label>School</label>
            <select name="scholen">
            <?php foreach ($scholen as $school): ?>
                <option value="<?php echo $school['schoolID'];?>"><?php echo $school['naam'];?></option>
            <?php endforeach; ?>               
            </select>   
        </div>
        <div>
            <input type="submit" value="submit" name="submit">
        </div>
    </form>

</body>
</html>