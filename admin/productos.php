<?php

require'seguridad.php';
require'../conex.php';
include ('menu.php');
$produc = $_GET['idp'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/productos.css">
    
    <title>Document</title>
</head>
<body>
 <header>
     
<h1> Numero de identificacion del producto: # <?php echo $produc?> </h1>
 </header> 
<div class="contenedor">

  
  <?php

$consulta = $db -> query (" SELECT products.id, products.name, products.description, products.price, 
products.status, products.descuento, categoria.nombre_categoria, proveedores.nombre_proveedor, 
sub_categoria_productos.nombre_subcategoria, products.referencia_proveedor 
FROM products, opcion_sub_categoria, sub_categoria_productos, categoria,proveedores
WHERE products.id = $produc
AND products.id_categoriaproducts = categoria.id_categoria
AND products.id_subcategoria_products = sub_categoria_productos.id_subcategoria
AND products.id_opc_subcate = opcion_sub_categoria.id 
AND products.id_proveedor_products = proveedores.id_proveedor 
AND products.id_categoriaproducts = categoria.id_categoria");

while ($resultado = mysqli_fetch_array($consulta)){


?>
<div class="imgproduc">
<img src="../img/product/<?php echo $resultado['id']?>.jpg" alt="Invercomes.SA" class="img_produ">
</div>
  <div class="texto">

<div class="uno">
    <p> Numero de producto <b> <?php echo utf8_encode($resultado['id'])?> </b></p>
    <p>Nombre: <b><?php echo  utf8_encode($resultado['name'] ) ?></b></p>
    <p> Descripcion: <b><?php echo  utf8_encode($resultado['description'])  ?></b></p>
    <p> Precio: <b><?php echo  $resultado['price']  ?></b></p>
    <p>
      <?php 
if ($resultado['status'] == 1) {
 ?>
 Status: <b>activo</b>
<?php
} else {
  ?>
 Status: <b>inactivo</b>
<?php
}

?>
  </div> 
  <div class="dos"> 
      
  </p>
    <p> <?php 
if ($resultado['descuento'] > 0) {
 ?>
 descuento: <b><?php echo  $resultado['descuento']  ?> %</b>
<?php
} else {
  ?>
 desceunto: <b>sin descuento</b>
<?php
}

?>
   </p>
    <p>Categoria Producto: <b><?php echo  $resultado['nombre_categoria']  ?></b></p>
    <p>Proveedor: <b><?php echo  $resultado['nombre_proveedor']  ?></b></p>
    <p>Nombre subcategoria: <b><?php echo  utf8_encode($resultado['nombre_subcategoria'] ) ?></b></p>
    <p>Referencia del Proveedor: <b><?php echo  $resultado['referencia_proveedor']  ?></b></p>
    </div>

<?php

}

?> 
<a href="editar.php?idp=<?php echo $produc ?>" class="a">Editar</a>
</div>
<div>
 
</div>






