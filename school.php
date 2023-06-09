<?php

include_once 'database.php';

$obj = new database();

$users = $obj->getSchool();
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
                        <a class="btn btn-success mr-2 btn-lg rounded-pill" href="./school/createSchool.php?id=">School Aanmelden</a>
                    </td>
<main> 
       <table class="table table-striped" id="overzicht">
           <thead class="thead-dark">
               <tr>
                   <th scope="col">SchoolID</th>
                   <th scope="col">School naam</th>
                   <th scope="col">Aanpassen</th>
                   <th scope="col">Verwijderen</th>
               </tr>
           </thead>
           <tbody></tbody>
               <?php foreach ($users as $user): ?>
               <tr>
                   <td><?php echo $user['schoolID'];?></td>
                   <td><?php echo $user['naam'];?></td>

                   <td class="Edit">
                       <a class="btn btn-primary mr-2 btn-sm" href="./school/editSchool.php?id=<?php echo $user['schoolID']; ?>">Aanpassen</a>
                   </td>      
                   <td class="Delete">
                       <a class="btn btn-danger mr-2 btn-sm" href="./school/deleteSchool.php?id=<?php echo $user['schoolID']; ?>">Verwijderen</a>
                   </td> 
               </tr>
               <?php


// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toernooi";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$xml = simplexml_load_file("scholen.xml");
foreach ($xml->children() as $school) {
  $id = $school->ID;
  $voornaam = $school->Voornaam;
  $achternaam = $school->Achternaam;
  $schoolID = $school->SchoolID;
  echo "ID: $id<br>";
  echo "Voornaam: $voornaam<br>";
  echo "Achternaam: $achternaam<br>";
  echo "SchoolID: $schoolID<br><br>";
}

// Retrieve data from the scholen table
$sql = "SELECT * FROM scholen";
$result = mysqli_query($conn, $sql);

// Display the data on the index page
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       echo "ID: " . (isset($speler["ID"]) ? $speler["ID"] : "") . "<br>";
       echo "Scholen: " . (isset($speler["Scholen"]) ? $speler["Scholen"] : "") . "<br>";
        echo "<br>";
    }
} else {
    echo "Geen scholen gevonden.";
}

// Close the database connection
mysqli_close($conn);
?>

               <?php endforeach; ?>               
                    <td class="index">
                       <a class="btn btn-danger mr-2 btn-sm rounded-pill" href="./index.php">Terug</a>
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