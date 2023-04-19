<?php
include_once '../database.php';

$obj = new database();

$users = $obj->deleteSchool($_GET['id']);

?>