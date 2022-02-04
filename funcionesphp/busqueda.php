<?php
$q = $_POST['busqueda'];

echo $q;

$urlb = '../busqueda';

header("Location: $urlb.php?q=$q" );


?>