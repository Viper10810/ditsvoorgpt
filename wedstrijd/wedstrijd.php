<?php

include_once '../database.php';

$obj = new database();

$users = $obj->getWedstrijd($_GET['id']);
$wijzig = $obj->getToernooiID($_GET['id']);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Spelers</title>
    <link rel="stylesheet" href="https:stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

</head>
<body style="background-color:darkorange;">
                    <td class="index">
                       <a class="btn btn-primary mr-2 btn-lg rounded-pill" href="./index.php">Home</a>
                   </td>  
                   <td class="school">
                       <a class="btn btn-secondary mr-2 btn-lg rounded-pill" href="school.php">School Gegevens</a>
                   </td>
                   <td class="toernooi">
                       <a class="btn btn-secondary mr-2 btn-lg rounded-pill" href="toernooi.php">Toernooi Gegevens</a>
                   </td>
                   <td class="Create">
                        <a class="btn btn-success mr-2 btn-lg rounded-pill" href="createWedstrijd.php?id=<?php echo $wijzig['toernooiID']; ?>">Wedstrijd aanmelden</a>
                    </td>
<main> 
       <table class="table table-striped" id="overzicht">
           <thead class="thead-dark">
               <tr>
                   <th scope="col">WedstrijdID</th>
                   <th scope="col">ToernooiID</th>
                   <th scope="col">Toernooi</th>
                   <th scope="col">Wedstrijdronde</th>
                   <th scope="col">Sp1 voornaam</th>
                   <th scope="col">Sp2 voornaam</th>
                   <th scope="col">Wedstrijd score 1</th>
                   <th scope="col">Wedstrijd score 2</th>
                   <th scope="col">Sp win voornaam</th>
               </tr>
           </thead>
           <tbody>
               <?php foreach ($users as $user): ?>
               <tr>
                   <td><?php echo $user['wedstrijdsID'];?></td>
                   <td><?php echo $user['toernooiID'];?></td>
                   <td><?php echo $user['omschrijving'];?></td>
                   <td><?php echo $user['ronde'];?></td>
                   <td><?php echo $user['speler1'];?></td>
                   <td><?php echo $user['speler2'];?></td>
                   <td><?php echo $user['score1'];?></td>
                   <td><?php echo $user['score2'];?></td>
                   <td><?php echo $user['winnaar'];?></td>
                   <td class="Edit">
                       <a class="btn btn-primary mr-2 btn-sm" href="editWedstrijd.php?id=<?php echo $user['wedstrijdsID']; ?>">Aanpassen</a>
                   </td>      
                   <td class="Delete">
                       <a class="btn btn-danger mr-2 btn-sm" href="deleteWedstrijd.php?id=<?php echo $user['wedstrijdsID']; ?>">Verwijderen</a>
                   </td> 
               </tr>
               <?php endforeach; ?>        
            
                    <td class="index">
                       <a class="btn btn-danger mr-2 btn-sm rounded-pill" href="../index.php">Terug</a>
                   </td>
           </tbody>
       </table>

</main>
</body>
</html>