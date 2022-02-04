<?php
require'seguridad.php';
require'../conex.php';
require'menu.php';



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invercomes</title>
    <link rel="stylesheet" href="css/resproducto.css">
</head>
<body>
<h2 class="titu">registro de productos nuevos</h2>
<form action="funcionesphp/regisproducto.php" method="post">
<input type="text" name="nombre" placeholder="nombre del producto" class="input100" required>
<textarea  name="descripcion" placeholder="Descripcion del producto"  required rows="10" cols="50" ></textarea>
<input type="number" name="precio" placeholder="precio" class="input50" required >
<input type="number" name="descuento" placeholder="descuento" class="input50" required >

<select name="tipoid" class="select" required>
<?php

$consulta = $db -> query ("SELECT * FROM categoria ");
while ($resultado = mysqli_fetch_array($consulta)){
  echo ' <option value="'.$resultado[id_categoria].'"> '.$resultado[nombre_categoria].'</option>';
}
?>
  
       </select> 

     
<select name="tipoid" class="select" required>
<?php

$consulta = $db -> query ("SELECT * FROM sub_categoria_productos ");
while ($resultado = mysqli_fetch_array($consulta)){
  echo ' <option value="'.$resultado[id_subcategoria].'"> '.$resultado[nombre_subcategoria].'</option>';
}
?>
  
       </select> 
    
        
<select name="tipoid" class="select" required>
<?php

$consulta = $db -> query ("SELECT * FROM sub_categoria_productos ");
while ($resultado = mysqli_fetch_array($consulta)){
  echo ' <option value="'.$resultado[id_subcategoria].'"> '.$resultado[nombre_subcategoria].'</option>';
}
?>
  
       </select> 

       <input type="text" name="refeprovedor" placeholder="referencia del proveedor" class="input100" required>

   <input type="submit" value="Registrar" class="btn">




</form>
</body>
</html>