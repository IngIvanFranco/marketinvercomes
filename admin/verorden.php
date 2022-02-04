<?php 
require'seguridad.php';
require'../conex.php';
require'menu.php';
$ido =$_GET['ido'];





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Datos De Facturacion Orden de Compra: # <?php echo $ido ?> </h1>
<div class="contenedor">
<table BORDER >
  <tr>
    <th>tipo identificacion</th>
    <th>identificacion</th>
    <th>nombre</th>
    <th>telefono</th>
    <th>direccion</th>
    <th>ciudad</th>
    <th>departamente</th>
    <th>email</th>
  </tr>
  <?php

$consulta = $db -> query (" SELECT tipo_identificacion.nombre, customers.identificacion_cliente, customers.name, 
customers.phone, customers.address, municipios.municipio,
departamentos.departamento, customers.email
FROM orders, customers, tipo_identificacion, municipios, departamentos 
WHERE orders.customer_id = customers.id
AND customers.departamento_id = departamentos.id_departamento
AND customers.ciudad_id = municipios.id_municipio
AND customers.Tipo_identificacion_id = tipo_identificacion.id_tipo_identificacion
AND orders.id = $ido "  );
while ($resultado = mysqli_fetch_array($consulta)){


?>

    <tr>
    <td><?php echo utf8_encode($resultado['nombre'])?></td>
    <td><?php echo $resultado['identificacion_cliente']  ?></td>
    <td><?php echo utf8_encode($resultado['name'])  ?></td>
    <td><?php echo $resultado['phone']  ?></td>
    <td><?php echo utf8_encode($resultado['address'])  ?></td>
    <td><?php echo utf8_encode($resultado['municipio'])  ?></td>
    <td><?php echo utf8_encode($resultado['departamento'] ) ?></td>
    <td><?php echo $resultado['email']  ?></td>
  </tr>

<?php

}
?>

  
 
</table>

<br>
<br>



<table BORDER >
  <tr>
  <th>cantidad</th> 
  <th>producto</th>
  <th>Descripcion</th>
    <th>valor unitario sin iva</th>
    <th>valor total sin iva</th>
    <th>valor total iva</th>
    <th>valor total</th>
   
  </tr>
  <?php

$consulta = $db -> query (" SELECT * FROM order_items, products 
WHERE order_items.order_id = $ido
AND order_items.product_id = products.id "  );
while ($resultado = mysqli_fetch_array($consulta)){

    $valorunitarioantesiva=  $resultado['precio'] / 1.19 ;
    $valortotalantesiva = $valorunitarioantesiva * $resultado['quantity'];
    $valortotal = $resultado['precio'] * $resultado['quantity'] ;
    $iva= $valortotal - $valortotalantesiva ;

?>



    <tr>
    <td><?php echo $resultado['quantity']?></td>
    <td><?php echo utf8_encode($resultado['name'])?></td>
    <td><?php echo utf8_encode($resultado['description'])?></td>
    <td><?php echo number_format($valorunitarioantesiva)?></td>
    <td><?php echo number_format($valortotalantesiva)  ?></td>
    <td><?php echo number_format($iva, 2) ?></td>
    <td><?php echo number_format($valortotal)  ?></td>
   
  </tr>

<?php

}
?>

  
 
</table>


<br>
<br>



<table BORDER >
  <tr>
  <th>total antes de iva</th>
  <th>total iva</th>
    <th>total a pagar</th>
    
   
  </tr>
  <?php

$consulta = $db -> query (" SELECT * FROM orders WHERE orders.id = $ido "  );
while ($resultado = mysqli_fetch_array($consulta)){

    $totalantesiva    = $resultado['total_price'] / 1.19;
    $ivatotal = $resultado['total_price'] - $totalantesiva;

?>



    <tr>
    <td><?php echo number_format($totalantesiva)?></td>
    <td><?php echo number_format($ivatotal)?></td>
    <td><?php echo number_format($resultado['total_price'])?></td>
   
   
  </tr>

<?php

}
?>

  
 
</table>



<br>
<br>



<table BORDER >
  <tr>
  <th>estado</th>
 
    
   
  </tr>
  <?php

$consulta = $db -> query (" SELECT * FROM orders, status_orden WHERE orders.id = $ido AND orders.status = status_orden.id_status  "  );
while ($resultado = mysqli_fetch_array($consulta)){

   
?>



    <tr>
   
    <td><?php echo $resultado['nombre_status'];?></td>
   
   
  </tr>

<?php

}
?>

  
 
</table>
<br>
<br>
<form action="funcionesphp/modificarorden.php" method="post">
<input  name="prodId" type="hidden" value="<?php echo $ido ?>">
<select name="status" class="select" >


<?php

$consulta = $db -> query ("SELECT * FROM status_orden ");
while ($resultado = mysqli_fetch_array($consulta)){
  echo ' <option value="'.$resultado[id_status].'"> '.$resultado[nombre_status].'</option>';
}
?>
  
       </select> 

       <input type="submit" value="actualizar">

</form>
<br><br>
<a href="pdf/RemisionPDF.php?ido=<?php  echo $ido ?>">Generar Remision</a>
</div>


</body>
</html>