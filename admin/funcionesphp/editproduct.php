<?php

require'../conex.php';
  $id=$_REQUEST['id'];
  $name=$_REQUEST['name'];
  $precio=$_REQUEST['precio'];
  $descuento =$_REQUEST['descuento'];
 $estado=$_REQUEST['estado'];





$sql = $db->query("UPDATE products
SET name = '$name', price = '$precio', descuento = '$descuento', status='$estado'
WHERE id = $id");

if ($sql) {
    echo '<script>
    window.alert("registro actualizado con exito");
    window.location.href = "../buscador1.php";
    </script>';
}else {
    echo '<script>
    window.alert("algo salio mal");
    window.location.href = "../buscador1.php";
    </script>';
}
?>
