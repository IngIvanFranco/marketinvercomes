<?php

$db = new mysqli("localhost:3306", "ingfranco", "Salome903", "invercomesadmin");
if ($db->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}



?>