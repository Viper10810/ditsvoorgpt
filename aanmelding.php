<?php

include_once 'database.php';

$obj = new database();

$toernooien = $obj->getAanmelding($_GET['id']);
$wijzig = $obj->getToernooiID($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanmelding</title>
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
<main> 
       <table class="table table-striped" id="overzicht">
           <thead class="thead-dark">
               <tr>
                   <th scope="col">AanmeldingsID</th>
                   <th scope="col">Speler</th>
                   <th scope="col">School</th>
                   <th scope="col">Toernooi</th>
                   <th scope="col">Aanpassen</th>
                   <th scope="col">Verwijderen</th>
               </tr>
           </thead>
           <tbody></tbody>
               <?php foreach ($toernooien as $toernooi): ?>
               <tr>
                   <td><?php echo $toernooi['aanmeldingsID'];?></td>
                   <td><?php echo $toernooi['voornaam']." ".$toernooi['tussenvoegsel']." ".$toernooi['achternaam'];?></td>
                   <td><?php echo $toernooi['naam']?></td>
                   <td><?php echo $toernooi['omschrijving']." ".$toernooi['datum'];?></td>
                   <td class="Edit">
                       <a class="btn btn-primary mr-2 btn-sm" href="./aanmelden/editAanmelding.php?id=<?php echo $toernooi['aanmeldingsID']; ?>">Aanpassen</a>
                   </td>      
                   <td class="Delete">
                       <a class="btn btn-danger mr-2 btn-sm" href="./aanmelden/deleteAanmelding.php?id=<?php echo $toernooi['aanmeldingsID']; ?>">Verwijderen</a>
                   </td> 
               </tr>

               <?php endforeach; ?>               
                    <td class="Create">
                        <a class="btn btn-success mr-2 btn-sm rounded-pill" href="./aanmelden/createAanmelding.php?id=<?php echo $wijzig['toernooiID']; ?>">Creëer</a>
                    </td>
                    <td class="index">
                       <a class="btn btn-danger mr-2 btn-sm rounded-pill" href="index.php">Terug</a>
                   </td>      

           </tbody>
       </table>

   </main>


   <script>
       $(document).ready( function () {
           $('#overzicht').DataTable();
       } );
   </script>
</body>
</html>