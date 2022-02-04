<?php
// initializ shopping cart class
require 'Cart.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>invercomes</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/icon/favicon-32x32.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/viewcart.css">
    <link rel="stylesheet" href="icons/styles.css">
   
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"  type="text/javascript"></script>
    <script src="js/jquery.min.js" type="text/javascript"></script>

    <script>
    function limitestock(obj,id){


        $.get("CartAction.php", {action:"updateCartItem", id:id, qty:obj}, function(data){
            if(data == 'ok'){
                alert('Lo sentimos no contamos con esa cantidad de unidades');
                location.reload();
            }else{
                alert('Lo sentimos no contamos con esa cantidad de unidades');
               location.reload();
            }
        });
    }
    </script>
    

    <script>
    function updateCartItem(obj,id){


        $.get("CartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('algo sucedio intenta mas tarde.');
               location.reload();
            }
        });
    }
    </script>
  
  <script>
    function updateCartItemtalla(obj,id){
        $.get("CartAction.php", {action:"updateCartItemtalla", id:id, talla:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('algo sucedio intenta mas tarde.');
                location.reload();
            }
        });
    }
    </script>
    
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
include'header.php';
?>
<br><br><br><br><br>
<body><div class="containerweb">
    <h1 class="titulocar" >Carrito de compra</h1>
    <p class="txtanun">Recuerda que para hacer uso de los bonos, tu compra debe ser superior al valor del mismo.</p>
    <div class="contenbtn">
        <div class="column">
    <a href="index.php" class="btn "><i class="glyphicon glyphicon-menu-left"></i> Continuar Comprando</a>
    </div>
    <div class="column ">
    <p class="vlrtotal">Total <?php echo '$'.number_format($cart->total()).' COP'; ?></p>
</div>
    <div class="column">
    <a href="login.php" class="btn com ">Comprar <i class="glyphicon glyphicon-menu-right"></i></a>
</div>
    </div>
        <?php
        if($cart->total_items() > 0){
             //get cart items from session
   $cartItems = $cart->contents();
         
            foreach($cartItems as $item){

       
                if ($item['inventario']==1 && ($item['qty'] > $item['stock'])) {
                  
?>

<script>
window.limitestock(<?php echo $item['stock']; ?>,'<?php echo $item['rowid']; ?>');

</script>


<?php
                } else {
                  
            

        ?>
       
     <div class="contcaritem">
        <div class="cart">
            <div class="item">

            <?php
            if ($item["inventario"] == 1) {
?>
                   <h6 class="titustock"> <?php echo $item["stock"] ?> unidades disponibles</h6>
  <?php   }else {
                    ?>
                    <h6 class="titustock"> diponibilidad segun proveedor</h6>
                    <?php
                }
        ?>
            <img src="img/product/<?php echo $item["id"]; ?>.jpg" alt="" class="imgproduc">
            <?php  
               if ($item["tipo"]==1){
?>
<div class="contenradios">
    <h6>Tallas</h6>
<input type="radio" name="talla" value="S" id="tallas" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
<label for="tallas" >S</label>  

<input type="radio" name="talla" value="M" id="tallam" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
<label for="tallam" >M</label> 

<input type="radio" name="talla" value="L" id="tallal" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
<label for="tallal" >L</label> 

<input type="radio" name="talla" value="XL" id="tallaxl" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
<label for="tallaxl" >XL</label> 
</div>
<?php
               }elseif ($item["tipo"]==2) {
                ?>
                <div class="contenradios">
                    <h6>Tallas</h6>
                <input type="radio" name="talla" value="8" id="talla8" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
                <label for="talla8" >8</label>  
                
                <input type="radio" name="talla" value="10" id="talla10" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
                <label for="talla10" >10</label> 
                
                <input type="radio" name="talla" value="12" id="talla12" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
                <label for="talla12" >12</label> 
                
                <input type="radio" name="talla" value="14" id="talla14" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
                <label for="talla14" >14</label> 
                </div>
                <?php  
               } elseif ($item["tipo"]==3) {
                ?>
                <div class="contenradios">
                    <h6>Tallas</h6>
                <input type="radio" name="talla" value="28" id="talla28" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
                <label for="talla28" >28</label>  
                
                <input type="radio" name="talla" value="30" id="talla30" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
                <label for="talla30" >30</label> 
                
                <input type="radio" name="talla" value="32" id="talla32" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
                <label for="talla32" >32</label> 
                
                <input type="radio" name="talla" value="34" id="talla34" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
                <label for="talla34" >34</label> 
                <input type="radio" name="talla" value="36" id="talla36" onchange="updateCartItemtalla(this, '<?php echo $item['rowid']; ?>')"> 
                <label for="talla36" >36</label> 
                </div>
                <?php  
               } 
            ?>
            </div>
         </div>
            
         <div class="cart" >
         <div class="item">
         <?php  if ($item["tipo"]==2 || $item["tipo"]==1 || $item["tipo"]==3){?>
          <h3>Talla: <?php echo $item["talla"] ?> </h3>
        <?php    
        }?>
             <h3>Producto: </h3>
         <p class="titucar"> <?php echo utf8_encode($item["name"]); ?></p>
          
            <h3>Valor Unidad: </h3>
            <h4> <?php echo '$'.number_format($item["price"]).' COP'; ?></h4>
           
            <?php  
               if ($item["des"]>0){
?>
            <h5>Descuento: <?php echo $item["des"]; ?> %</h5>
      <p>valor anterior: <?php echo number_format($item["price"]/((100-$item["des"])/100)); ?> </p>
<?php
               }
            ?>
          
            </div>
        </div>
            
            
        <div class="cart">
        <div class="item">
            <h3>Cantidad: </h3>

            <input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" 
            onchange="updateCartItem(this, '<?php echo $item['rowid']; ?>')">

                <h3>SubTotal: </h3>   
            <h4><?php echo '$'.number_format($item["subtotal"]).' COP'; ?></h4>
        
               <a href="CartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="eli" 
                onclick="return confirm('Estas Seguro De Eliminar El Producto?')">Eliminar <i class="fa fa-trash"></i>
            </a>
            </div>
            </div>
           
        </div>
            
 
        <?php }}} else{ ?>
        <p>Tu Carrito Esta Sin Productos</p>
        <?php } ?>
    
        <div class="contenbtn">
        <div class="column">
    <a href="index.php" class="btn "><i class="glyphicon glyphicon-menu-left"></i> Continuar Comprando</a>
    </div>
    <div class="column ">
    <p class="vlrtotal">Total <?php echo '$'.number_format($cart->total()).' COP'; ?></p>
</div>
    <div class="column">
    <a href="login.php" class="btn com ">Comprar <i class="glyphicon glyphicon-menu-right"></i></a>
</div>
    </div>
            <?php if($cart->total_items() > 0){ ?>
           
            

            <?php } ?>
            </div>
</div>


<?php
        
include'footer.php';
?>


</body>

</html>