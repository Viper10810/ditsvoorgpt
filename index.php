<?php

include_once 'database.php';

$obj = new database();

$users = $obj->getSpelers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MBO open</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spelers overzicht</title>
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
                        <a class="btn btn-success mr-2 btn-lg rounded-pill" href="./spelers/create.php?id=">Nieuwe Speler Aanmelden</a>
                    </td>
                    <a class="btn btn-primary mr-2 btn-lg rounded-pill" href="./aanmelding.php">aanmelding</a>
                   </td>  
                   <td class="school">
                    
<main> 
       <table class="table table-striped" id="overzicht">
           <thead class="thead-dark">
               <tr>
                   <th scope="col">SpelerID</th>
                   <th scope="col">Voornaam</th>
                   <th scope="col">Tussenvoegsel</th>
                   <th scope="col">Achternaam</th>
                   <th scope="col">School</th>
                   <th scope="col">Aanpassen</th>
                   <th scope="col">Verwijderen</th>
               </tr>
           </thead>
           <tbody></tbody>
               <?php foreach ($users as $user): ?>
               <tr>
                   <td><?php echo $user['spelerID'];?></td>
                   <td><?php echo $user['voornaam'];?></td>
                   <td><?php echo $user['tussenvoegsel'];?></td>
                   <td><?php echo $user['achternaam'];?></td>
                   <td><?php echo $user['schoolnaam'];?></td>
                   <td class="Edit">
                       <a class="btn btn-primary mr-2 btn-sm" href="./spelers/edit.php?id=<?php echo $user['spelerID']; ?>">Aanpassen</a>
                   </td>      
                   <td class="Delete">
                       <a class="btn btn-danger mr-2 btn-sm" href="./spelers/delete.php?id=<?php echo $user['spelerID']; ?>">Verwijderen</a>
                   </td> 
               </tr>

               <?php endforeach; ?>               
                   
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