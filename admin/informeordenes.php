<?php
require'seguridad.php';
require'../conex.php';
require'menu.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/informeorden.css">
    <link rel="stylesheet" href="../icons/styles.css">

    
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">

<script src="js/datatable.js"></script>
    <title>Document</title>
</head>
<body>

<div class="contenedor">

<h1 >ORDENES DE COMPRA </h1>
<table class="blueTable" id="example">
<thead>
<tr>
    <th>Orden #</th>
    <th>Valor</th>
    <th>Fecha</th>
    <th>Cliente</th>
    <th>Estado</th>
    <th>Metodo Pago</th>
  </tr>
  </thead>  
  <?php

$consulta = $db -> query ("SELECT orders.id, orders.total_price, orders.created, customers.name, status_orden.nombre_status, metodopago.nombre_metodo
 FROM orders, status_orden, metodopago, customers WHERE orders.status <> 4 
AND orders.status = status_orden.id_status 
AND metodopago.id_metodo = orders.metodo_pago
AND orders.customer_id = customers.id
 ORDER BY orders.id asc "  );
while ($resultado = mysqli_fetch_array($consulta)){


?>

    <tr>
    <td><a href="verorden.php?ido=<?php echo $resultado['id'] ?>"><?php echo $resultado['id']?></a></td>
    <td>$<?php echo number_format($resultado['total_price'])  ?></td>
    <td><?php echo $resultado['created']  ?></td>
    <td><?php echo utf8_encode($resultado['name'])  ?></td>
    <td><?php echo utf8_encode($resultado['nombre_status'])  ?></td>
    <td><?php echo utf8_encode($resultado['nombre_metodo'])  ?></td>
  </tr>

<?php


}

?>
  
 
</table>



</div>



  
     


</body>
</html>