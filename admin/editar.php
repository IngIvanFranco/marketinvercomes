<?php

require'seguridad.php';
require'../conex.php';
require'menu.php';
 $id = $_REQUEST['idp'];


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/editar.css">
  <title>Document</title>
</head>
<body>
  
<form action="funcionesphp/editproduct.php" method="post">
<div class="contimgfor">  <img src="../img/product/<?php echo $id ?>.jpg" class="iconform">
 </div>

<?php
$sql = $db->query("SELECT * FROM products WHERE id=$id ");
while ($row = $sql->fetch_assoc()) {
echo '<input type="hidden" value="'.$id.'" name="id">
<input type="text" value="'. utf8_encode( $row['name']).'" name="name">
<input type="number" value="'.  $row['price'].'" name="precio">
<input type="number" value="'.$row['descuento'].'" name="descuento">
<select name="estado">
        <option value="1">activo</option>
        <option value="0">inactivo</option>
        
        </select>'
         ;

}

?>
<div class="conten_btn">
<input type="submit" value="Editar" class="btn_crear">
</div>
</form>


</body>
</html>