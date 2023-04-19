<?php
include_once '../database.php';

$obj = new database();

$users = $obj->deleteSpeler($_GET['id']);

?>