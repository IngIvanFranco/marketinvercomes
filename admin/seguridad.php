<?php
session_start();
$varsesion = $_SESSION['usr'];

if($varsesion == null || $varsesion = ''){
header("location: cerrarsesion.php");

}

?>