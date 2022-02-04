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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/detalleorden.css">
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

$ido = $_GET['ido'];
?>
<div class="containerweb">
    <div class="contenedor">
    
    <h2> <a href="historico.php" class="lin" >Tu cuenta/</a> <a href="pedidos.php" class="lin"> Pedidos/</a>Orden de compra # <?php echo $ido ?></h2>
<?php

if(!empty($_SESSION['sessCustomerID'])){

$customer =$_SESSION['sessCustomerID'];

$consulta ="SELECT * FROM orders WHERE customer_id= $customer  AND id = $ido ";

$resultado = mysqli_query($db,$consulta);

$filas= mysqli_num_rows($resultado);

if ($filas == 1) {

    $consulta = $db -> query ("SELECT  products.id, products.name, order_items.precio, order_items.descuento, 
    order_items.talla,  order_items.quantity, products.id_opc_subcate 
    FROM order_items, products 
    WHERE order_items.order_id = $ido
    AND order_items.product_id = products.id"  );
while ($resultado = mysqli_fetch_array($consulta)){
   ?>
<main>

<div class="contproduct">
<div class="itmproduct"><img src="img/product/<?php echo $resultado['id'] ?>.jpg" alt=""></div>
<div class="itmproduct">
<h2>Producto:</h2>
<p><?php echo utf8_encode( $resultado['name']) ?></p>
<h2>cantidad:</h2>
<p><?php echo $resultado['quantity'] ?></p>

</div>

<div class="itmproduct">
<h2>valor:</h2>
<p><?php echo '$ '.number_format( $resultado['precio']) ?></p>
<h2>descuento:</h2>
<p><?php 
if ($resultado['descuento']>0) {
    echo $resultado['descuento'].' % <br> antes: $'. number_format($resultado['precio']/((100-$resultado['descuento'])/100));
}else{
    echo "Producto sin descuento" ;
}
 ?>  </p>
<?php
if ($resultado['id_opc_subcate'] == 121) {
    

?>

<h2>talla:</h2>
<p><?php echo $resultado['talla'] ?></p>

<?php
}
?>

</div>





</main>

<?php
}
$consulta2 = $db -> query ("SELECT  * FROM orders WHERE id = $ido"  );
while ($resultado2 = mysqli_fetch_array($consulta2)){
$vlrt = $resultado2['total_price'];
}
}else {
    header("location: pedidos.php");
}



?>
<div class="contotal">
<h2>valor total de la compra: $<?php echo number_format( $vlrt)?></h2>
</div>
</div>
</div>

<?php
include'footer.php';
?>
</body>

</html>

<?php
}
else {
    header("location: index.php");
}
?>