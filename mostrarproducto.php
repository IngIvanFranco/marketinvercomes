<?php



 $q= $_GET["q"]; 

 if( $q == ''){

 header( 'Location:index.php');

}else 

?>



<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mostrarproducto.css">
    <link rel="stylesheet" href="icons/styles.css">
    <title>invercomes</title>
  
    <link rel="shortcut icon" href="img/icon/favicon-32x32.png">



  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-175432953-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-175432953-1');
</script>

<body>

<?php
include'header.php';
?>
<br><br><br><br>


<section class="bannerpublic">
            <div class=" banner1">
            <div class="contitu">
          
           
  <h1 class="txtanim">Cumplimos tus sueños</h1>
 


                </div>
            </div>

           
        </section>
      
        <section class="producview">
      
        <div class="contencarta">
       
     
                <?php
        //get rows query
        $query = $db->query("SELECT * FROM products WHERE id=$q");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
                $opsub= $row["id_opc_subcate"];
            
                    $variable =  1 - ($row["descuento"] / 100) ;
                    $valoranterior =$row["price"] / $variable;
                    $opsub= $row["id_opc_subcate"];
        ?>
          
                
        <div class="descartimg">
              <img src="img/product/<?php echo $q ?>.jpg" class="imgproducto">
        </div>
        <div class="descartdatos">
                    <h2><?php echo $row['name'] ?></h2>
                    <?php 
                if (   ($row['id_opc_subcate'] ==154) || ($row['id_categoriaproducts'] == 7  )) {
                   
                    echo '<i class="stok"> Valor segun cotización</i>';
                
                     } else {
                   if ($row['descuento'] > 0) {
                    echo '<p class="subrayado">$ '.number_format( $valoranterior).'</p>';
                }
                ?>
                <p>$ <?php echo number_format( $row['price']) ?></p>
            <?php
            }
            
            ?>
                    <h5> <span class="icon-credit-card"> </span>  Pagos: </h5>
                    <img src="img/4.png" class="icopse"><img src="img/3.png" class="icopse"><img src="img/1.png" class="icopse"><img src="img/2.png" class="icopse">
                    <h5> <span class="icon-truck"> </span>  Duracion de la entrega de 1 a 3 dias </h5>
                    <h5>Stock disponible:</h5>
                    <?php if ($row['inventario'] == 1) {
                        echo '<i class="stok"> '.number_format( $row['stok']).' Unidades diponibles</i>';
                    }else {
                        echo '<i class="stok"> Disponibilidad segun proveedor</i>';
                    }
                    
                    
                    if ($row['id_categoriaproducts'] == 7 || $row['id_opc_subcate'] == 154) {
                  
                    ?>
                     <a href="">
                        <div class="btncoti">
                         <a href="mailto:direccionoperativa@invercomes.com.co?subject=cotizacion%20producto%20<?php echo $row["name"]; ?>&message=<?php echo $row["name"]; ?>"> <i> Cotizar </i></a>
                        </div>
                    </a>
                  
                  <?php
                    } else {
                       ?> 
                        <a href="CartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">
                        <div class="btnadd">
                            <span class="icon-cart ico"></span>
                        </div>
                    </a>
<?php
                    }
                  ?>

        </div>

           
                
          
 <div class="contdescripprodu">
     <h3>Descripción:</h3>
<?php echo '<i>'. utf8_encode( $row['description']).'</i>'?>
</div>


            <?php
              
            } }else{ ?>
        <p>Producto(s) no encontrado.....</p>
        <?php } ?>




        </div>
        

        </section>






<section class="masproduc">
<h2> Productos relacionados</h2>
<article id="products" class="contenedorproductos">
<?php
 $query1 = $db->query("SELECT * FROM products WHERE id_opc_subcate=$opsub AND status = '1' ORDER BY RAND() LIMIT 6"  );
 
     while($row = $query1->fetch_assoc()){
        $variable =  1 - ($row["descuento"] / 100) ;
        $valoranterior =$row["price"] / $variable;
?>
 
<div class="cartap">
<a  href="mostrarproducto.php?q=<?php echo $row["id"]; ?>">
<div class="contenimg">
    <img src="img/product/<?php echo $row["id"] ?>.jpg" alt="">
    <?php
if ($row["descuento"] > 0) {
    ?>
<h5 class="descuento"> - <?php echo $row["descuento"] ?> %</h5>
    <?php
}
    ?>
</div> </a>
<div class="contdescrip">
<h3 class="titupro"><?php echo utf8_encode($row["name"]) ?></h3>
<?php 
                if (   ($row['id_opc_subcate'] ==154) || ($row['id_categoriaproducts'] == 7  )) {
                   
                    echo '<i class="stok"> Valor segun cotización</i>';
                
                     } else {
                   if ($row['descuento'] > 0) {
                    echo '<p class="subrayado">$ '.number_format( $valoranterior).'</p>';
                }
                ?>
                <p>$ <?php echo number_format( $row['price']) ?></p>
            <?php
            }
            
            ?>
<?php
                                                if ($row['inventario'] == 1) {
                                                    ?>

                                                <p class="stock "><?php echo number_format($row["stok"]).' unidades disponibles  '; ?> </p> 
                                            <?php
                                                }else {
                                                    ?>
                                                <p class="stock "> disponibilidad segun proveedor </p> 

                                                    <?php
                                                }
                                               
                                               ?>

<div class="Contenedor_btncar">
    <?php
 if ($row['id_opc_subcate'] == 154 || $row['id_categoriaproducts'] == 7 ) {
                                      ?>  
                           <a  href="mailto:direccionoperativa@invercomes.com.co?subject=cotizacion%20producto%20<?php echo $row["name"]; ?>&message=<?php echo $row["name"]; ?>">Cotizalo Ahora</a>

                                        <?php
                                    } else {
                                       
                                    ?>
                   <a  href="CartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" >agregar al carrito</a>
                   <?php
                                    }
                                    ?>
                    
                                            </div>

</div>





</div>





<?php
     }
   ?>

    </article>

</section>

 
        <?php
include'footer.php';
?>


</body>


</html>