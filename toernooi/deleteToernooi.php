<?php
include_once '../database.php';

$obj = new database();

$users = $obj->deleteToernooi($_GET['id']);

?>