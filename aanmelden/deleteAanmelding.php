<?php
include_once '../database.php';

$obj = new database();

$users = $obj->deleteAanmelding($_GET['id']);

?>