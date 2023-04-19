<?php
include_once '../database.php';

$obj = new database();

$users = $obj->getUitslag($_GET['id']);
$usersTwee = $obj->getUitslagTwee($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uitslag Toernooi</title>
    <style>
* {
  box-sizing: border-box;
}

.row {
  margin-left:-5px;
  margin-right:-5px;
}
  
.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other on screens that are smaller than 600 px */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}

</style>
</head>
<body style="background-color:darkorange;">
<main> 
<div class="row">
  <div class="column">
    <h2>ronde 1</h2>
    <table id="overzicht-ronde1">
           <thead class="thead">
               <tr>
                   <th scope="col">spelers</th>
                   <th scope="col">score</th>
                   <th scope="col">ronde</th>
               </tr>
           </thead>
      </div> <?php foreach ($users as $user): ?>
      <div class="column">
           <tbody></tbody> 

               <tr>
                   <td><?php if( $user['score1'] > $user['score2'] ) { echo 'WINNAAR '; } echo $user['speler1']; echo'<br>'; if( $user['score2'] > $user['score1'] ) { echo 'WINNAAR '; }  echo  $user['speler2'];?></td>
                   <td><?php echo $user['score1']." <br> ".$user['score2'];?></td>
                   <td><?php echo $user['ronde'];?></td>
               </tr>
               <?php endforeach; ?> 

           </tbody>
        </table>
        </div>
        <div class="column">
   
        </table>

        <div class="column">
    <h2>ronde 2</h2>
    <table id="overzicht-ronde1">
           <thead class="thead">
               <tr>
                   <th scope="col">spelers</th>
                   <th scope="col">score</th>
                   <th scope="col">ronde</th>
               </tr>
           </thead>
      </div> <?php foreach ($usersTwee as $user): ?>
      <div class="column">
           <tbody></tbody> 

               <tr>
                   <td><?php if( $user['score1'] > $user['score2'] ) { echo 'WINNAAR '; } echo $user['speler1']; echo'<br>'; if( $user['score2'] > $user['score1'] ) { echo 'WINNAAR '; }  echo  $user['speler2'];?></td>
                   <td><?php echo $user['score1']." <br> ".$user['score2'];?></td>
                   <td><?php echo $user['ronde'];?></td>
               </tr>
               <?php endforeach; ?> 

           </tbody>
        </table>
        </div>
        <div class="column">
   
        </table>
        </div>

   </main>
    
</body>
</html>