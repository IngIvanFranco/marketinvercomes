<?php
require'../conex.php';
$estado= $_POST['status'];
$id=$_POST['prodId'];

echo $id;
echo $estado;


$sql="UPDATE orders
SET status = $estado
WHERE orders.id = $id";
 


$result = mysqli_query($db, $sql);
$idc = $db -> insert_id;

header("location: ../verorden.php?ido=$id");

?>