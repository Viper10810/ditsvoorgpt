<?php

require_once 'database.php';

$database = new database("localhost", "root", "", "toernooi");
if(isset($_GET['id'])) 
{
    $id = $_GET['id'];
    $aanmelding = $database->getAanmelding($id);
} 
else 
{
    echo "";
}

$conn = new mysqli("localhost", "root", "", "toernooi");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get aanmelding data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM aanmeldingen WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $aanmelding = $result->fetch_assoc();
    } else {
        echo "No results found.";
    }
} else {
    echo "";
}

$conn->close();
$users = array();
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
          
           <?php
                    if(isset($_FILES['file'])) {
                        // code to process the uploaded file
                    } else {
                        echo "Sorry, je moet eerst een bestand kiezen";
                    }
                    ?>
                    <html>
                        <h5>click hier om een </h5>
                    </html>
                   
            <?php
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['xml_file'])) {
                $xml = simplexml_load_file($_FILES['xml_file']['tmp_name']);
                // Extract necessary information from XML file and insert into MySQL database
                move_uploaded_file($_FILES["xml_file"]["tmp_name"], "uploads/" . $_FILES["xml_file"]["name"]);
              }
            ?>

<form method="post" enctype="multipart/form-data">
  <label for="file">Select XML file:</label>
  <input type="file" name="file" id="file">
  <br><br>
  <label for="table">Select table:</label>
  <select name="table" id="table">
    <option value="scholen">Scholen</option>
    <option value="spelers">Spelers</option>
    <option value="toernooien">Toernooien</option>
    <option value="wedstrijden">Wedstrijden</option>
  </select>
  <br><br>
  <input type="submit" name="submit" value="Upload">


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