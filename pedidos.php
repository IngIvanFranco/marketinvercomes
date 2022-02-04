<?php
// include database configuration file
include 'conex.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>invercomes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 
        <link rel="stylesheet" href="css/pedidos.css">
    <link rel="stylesheet" href="icons/styles.css">
    <link rel="shortcut icon" href="img/icon/favicon-32x32.png">

 
  
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-175432953-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-175432953-1');
</script>
</head>
<?php
require'header.php';
?>
<br><br><br><br><br><br>
<body>
    <?php

if(!empty($_SESSION['sessCustomerID'])){
$id = $_SESSION['sessCustomerID'] ;

?>
   

<main>

<div class="containerweb">



<div class="contenedor">

<h2> <a href="historico.php" class="lin" >Tu cuenta/</a>Pedidos: </h2>

  <?php
 $por_pagina = 3;
 if ( isset($_GET['pagina'])){
    $pagina = $_GET['pagina'];

 }else{
    $pagina = 1;
 }

 $empieza = ($pagina-1) * $por_pagina;
$consulta = $db -> query ("SELECT orders.id, orders.total_price, orders.created, customers.name, status_orden.nombre_status, metodopago.nombre_metodo 
FROM orders, status_orden, metodopago, customers 
WHERE orders.customer_id= $id 
AND orders.status = status_orden.id_status 
AND metodopago.id_metodo = orders.metodo_pago 
AND orders.customer_id = customers.id
 ORDER BY orders.id DESC  LIMIT $empieza, $por_pagina"  );
while ($resultado = mysqli_fetch_array($consulta)){


?>
<div class="orden">
  <div class="ordenitem">
  <img src="img/undraw_shopping_app_flsj.svg" alt="">
 </div>
 <div class="ordenitem">
   <h2 ># orden</h2>
   <p><?php echo $resultado['id']?></p>
   <h2 >fecha de orden</h2>
  <p>  <?php echo $resultado['created']  ?></p>
  <a href="detalleorden.php?ido=<?php echo $resultado['id']?>">ver detalles</a>
    </div>
    <div class="ordenitem">
    <h2 >valor de la orden</h2>
    <p> $<?php echo number_format($resultado['total_price'])  ?></p>
    <h2 >estado de la orden</h2>
    <p>  <?php echo utf8_encode($resultado['nombre_status'])  ?></p>
    <h2 >metodo de pago</h2>
    <p>  <?php echo utf8_encode($resultado['nombre_metodo'])  ?></p>
    </div>
    </div>
<?php


}

?>
  
  </div>

<div class="paginador">

<?php
$query = "SELECT orders.id, orders.total_price, orders.created, customers.name, status_orden.nombre_status, metodopago.nombre_metodo 
FROM orders, status_orden, metodopago, customers 
WHERE orders.customer_id= $id 
AND orders.status = status_orden.id_status 
AND metodopago.id_metodo = orders.metodo_pago 
AND orders.customer_id = customers.id
ORDER BY orders.id DESC ";

$resultado = mysqli_query($db, $query);

$total_registros = mysqli_num_rows($resultado);

$total_paginas = ceil($total_registros / $por_pagina);

echo "<a href='pedidos.php?pagina=1' class='pagesq'>"."<i class='icon-left'></i>"."Primera"."</a>";

for($i=1; $i<=$total_paginas; $i++){
   echo "<a href='pedidos.php?pagina=".$i."' class='numpage'>".$i."</a>";
}

echo "<a href='pedidos.php?pagina=$total_paginas' class='pagesq'>"."Ultima"."<i class='icon-right'></i>"."</a>";

?>



</div>


</div>
</main>


<?php
include'footer.php';
?>


</body>




</html>


<?php
}else {
    header("location: index.php");
}
?>