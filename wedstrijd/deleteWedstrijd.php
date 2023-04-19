<?php
include_once '../database.php';

$obj = new database();

$users = $obj->deleteWedstrijd($_GET['id']);

?>