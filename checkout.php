<?php include 'Cart.php';


// include database configuration file
include 'conex.php';



// initializ shopping cart class

$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: index.php");
}

// set customer ID in session
 $_SESSION['sessCustomerID'];

// get customer details by session customer ID
$query = $db->query("SELECT * FROM customers WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout - Invercomes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="icons/styles.css">
    
    <link rel="stylesheet" href="css/checkout.css">
   
  

    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-175432953-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-175432953-1');
</script>
</head>
<body>
<?php
include'header.php';
?>
<br><br><br><br><br>
<div class="containerweb">
<div class="footBtn">
        <a href="index.php" class="btn "> Continuar comprando</a> 
        <a href="CartAction.php?action=placeOrder" class="btn com">Generar Compra </a>
    </div>
    <h1 class="tituclas">Orden de pedido</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
         <th class="ocul">valor </th>
            <th>Descuento</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr><?php  
               if ($item["tipo"]==121){
?>
 <td><?php echo $item["name"].' '.$item["talla"]; ?></td>
<?php
               }else{
?>
 <td><?php echo $item["name"]; ?></td>
<?php

               }
?>
           
   <td class="ocul"> $ <?php  echo number_format($item["price"]/((100-$item["des"])/100)); ?> </td>
            <td><?php echo $item["des"].' %'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.number_format($item["subtotal"]).' COP'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No hay items en su carrito......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.number_format($cart->total()).' COP'; ?></strong></td>
            <?php 
            
              
         
         
         }

            
          ?>
        </tr>
    </tfoot>


    </table>

  

    <div class="shipAddr">
        <h1 class="tituclas">Datos De Facturación</h1>
        <p><?php echo $custRow['name']; ?></p>
        <p><?php echo $custRow['email']; ?></p>
        <p><?php echo $custRow['phone']; ?></p>
        <p><?php echo $custRow['address']; ?></p>
    </div>
    <div class="footBtn">
        <a href="index.php" class="btn "> Continuar comprando</a> 
        <a href="CartAction.php?action=placeOrder" class="btn com ">Generar Compra </a>
    </div>
</div>




<?php
include'footer.php';
?>


</body>
</html>