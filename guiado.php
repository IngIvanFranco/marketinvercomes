<?php
// include database configuration file
include 'conex.php';

 $q= $_GET["q"]; 

 if( $q == ''){

 header( 'Location:index.php');

}else 

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/busqueda.css">
    <link rel="stylesheet" href="icons/styles.css">
    <title>invercomes</title>
    <meta charset="utf-8">
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
<body>
    <?php
include 'header.php';
    ?>
<br><br><br><br><br>


<div style="position:fixed; z-index:9999;    display:block; bottom: 10px; right: 5px; ">
      
     <a href="https://api.whatsapp.com/send?phone=573143580619&text=Hola%20Necesito%20Informacion"> <img src="img/iconws.png" class="iconws"> </a>
      </div>
<section class="bannerpublic">
            <div class=" banner1">
            <div class="contitu">

           
  <h1 class="txtanim">Cumplimos tus sueños</h1>
  


                </div>
            </div>
        </section>




        <section class="sectionProductos">
<div class="containerweb">

    

<article id="products" class="contenedorproductos">
    
        <?php
   $por_pagina = 52;
   if ( isset($_GET['pagina'])){
      $pagina = $_GET['pagina'];

   }else{
      $pagina = 1;
   }

   $empieza = ($pagina-1) * $por_pagina;


        //get rows query
        $query = $db->query("SELECT * FROM products 
        WHERE  id_subcategoria_products = $q  AND status = '1'
        LIMIT $empieza, $por_pagina  ");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
           
                  $variable =  1 - ($row["descuento"] / 100) ;
                  $valoranterior =$row["price"] / $variable;
               ?>
               <div class="cart">
                        <div class="contimgproduct">
                        <a href="mostrarproducto.php?q=<?php echo $row["id"]; ?>">       <img src="img/product/<?php echo $row['id'] ?>.jpg"  class="imgproduc"></a>
                          
                        <?php 
if ($row['descuento']>0) {
   ?>
    <h5 class="descuento">  -<?php echo $row["descuento"]?>% </h5>
<?php

}
                        ?>
                       
                        </div>
                        <div class="contendescrip">
                           <h6 class="titupro"> <?php echo utf8_encode( $row['name']) ?></h6>
                           <?php
                                                if ($row['inventario'] == 1) {
                                                    ?>

                                                <p class="stock "><?php echo number_format($row["stok"]).' Unidades disponibles  '; ?> </p> 
                                            <?php
                                                }else {
                                                    ?>
                                                <p class="stock "> Disponibilidad segun proveedor </p> 

                                                <?php
                                                }
                                                if ($row['descuento']>0) {
                                              
?>
 <p class="valor subrayado">  <?php echo '$ '.number_format($valoranterior).' COP '; ?> </p> 
<?php

                                                }   if ( ($row['id_opc_subcate'] ==154) || ($row['id_categoriaproducts'] == 7  )) {
                                                                         
                                                    ?>
                                                                         <a class="btn_car" href="mailto:direccionoperativa@invercomes.com.co?subject=cotizacion%20producto%20<?php echo $row["name"]; ?>&message=<?php echo $row["name"]; ?>">Cotizalo Ahora</a>
                                                    
                                                    <?php
                                                                                }else {
                                                                                ?>
                                                                                
                                                                            <p class="valor "><?php echo '$ '.number_format($row["price"]).' COP '; ?> </p>          
                                                                          
                                                                        <a href="CartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>"> <div class="contcar">   <span class="icon-cart eds"></span>  </div></a>
                                                                                <?php
                                                                                }
                                                                                ?>
                                             
                        </div>
                    </div>
        <?php 
            }}
      
      else {  ?>
        <p>Producto(s) no encontrado.....</p>
        <?php } ?>


        </article>
        <div class="paginador">
<?php
$query = "SELECT * FROM products 
WHERE  id_subcategoria_products = $q AND status ='1' ";

$resultado = mysqli_query($db, $query);

$total_registros = mysqli_num_rows($resultado);

$total_paginas = ceil($total_registros / $por_pagina);

echo "<a href='guiado.php?q=$q&pagina=1' class='pagesq'>"."<i class='icon-left'></i>"."</a>";

for($i=1; $i<=$total_paginas; $i++){
   echo "<a href='guiado.php?q=$q&pagina=".$i."' class='numpage'>".$i."</a>";
}

echo "<a href='guiado.php?q=$q&pagina=$total_paginas' class='pagesq'>"."<i class='icon-right'></i>"."</a>";

?>
</div>
</div>
</section>


<?php
include'footer.php';
?>



</body>

<script type="text/javascript" src="js/animacionbanner.js"></script>
</html>