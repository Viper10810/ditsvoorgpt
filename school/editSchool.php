<?php

include_once '../database.php';

$obj = new database();

$user = $obj->getschoolID($_GET['id']);


if(isset($_POST['submit'])){  
    $fieldnames = ['naam'];

    $error = false;

    // loop through fieldnames and check if they are empty
    foreach ($fieldnames as $data) {
        if(empty($_POST[$data])){
            $error = true;
        }    
    }

   if (!$error) {
       $obj->editSchool($_POST['naam'], $_GET['id']);
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
    <title>School Aanpassen</title>
</head>
<body style="background-color:darkorange;">
    <h2>School aanpassen</h2>
       <form  method="post">    
        <label for="naam">School</label>
        <input type="text" name="naam" value="<?php echo $user['naam']; ?>">

        <input type="submit" value="submit" name="submit">
       </form>
</body>
</html>