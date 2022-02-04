
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    
    <link rel="shortcut icon" href="img/icon/favicon-32x32.png">
    <title>Invercomes</title>

    
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

<body>
<br><br><br><br><br>
<!--
<input type="checkbox" name="cerrar" id="cerrar">
<label for="cerrar" id="btn_cerrar">X</label>
<div class="modal">
    <div class="contenido">
          <img src="img/catalogo.jpg" >
          <label for="cerrar" onclick="popUp('https://invercomes.com.co/contenido/catalogo.pdf')"  class="myButton"> Ver catalogo</label>
    </div>
</div>

<script type="text/javascript">
    function popUp(URL) {
        window.open(URL, 'Nombre de la ventana', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=1000,height=650,left = 390,top = 50');
    }
    </script>
-->
   <main>
       
<div style="position:fixed; z-index:9999;    display:block; bottom: 10px; right: 5px; ">
      
     <a href="https://api.whatsapp.com/send?phone=573143580619&text=Hola%20Necesito%20Informacion"> <img src="img/iconws.png" class="iconws"> </a>
      </div>



    <section class="titulo">
        <article>
            <div class="containerweb">
                <div class="contetitu">
                    <img src="img/esquina.png" class="esquina">
                    <p class="titu"> ¡Conoce todo lo que tenemos para  
                        <strong>
                            ti!
                        </strong> 
                    </p>
                </div>
              
            </div>

        </article>
    </section>

    <section class="grid">
        <article>
            <div class="containerweb">
            <div class="container">
  <div class="uno"> <div class="slider">
                            <ul>
                            <li><img src="img/bn17.jpg" alt=""></li>
                            <li><img src="img/bn1.jpg" alt=""></li>
                            <li><img src="img/bn18.jpg" alt=""></li>
                            <li><img src="img/bn19.jpg" alt=""></li>
                            </ul>
                        </div> </div>
  <div class="dos">  <div class="slider2">
                            <ul>
                            <li><img src="img/bn20.jpg" alt=""></li>
                            
                            <li><img src="img/bn21.jpg" alt=""></li>
                            <li><img src="img/bn22.jpg" alt=""></li>
                            <li><img src="img/bn2.jpg" alt=""></li>
                            </ul>
                        </div> </div>
  <div class="tres"><img src="img/bn23.jpg" alt=""></div>
  <div class="cuatro"><div class="slider2">
                            <ul>
                            <li><img src="img/sl60.jpg" alt=""></li>
                            <li><img src="img/sl61.jpg" alt=""></li>
                            <li><img src="img/sl22.jpg" alt=""></li>
                            <li><img src="img/sl1.jpg" alt=""></li>
                            
                            </ul>
                        </div></div>
</div>
            </div>
        </article>
    </section>

  

    <section>
        <div class="secategoria">
            <div class="contitu">
            <h2>tus categorías favoritas</h2>
            </div>
            <div class="contcate">
             <a href="categoria.php?q=11">   <img src="img/ico1.png" alt="MOTOCICLETAS" title="MOTOCICLETAS"></a>
             <a href="categoria.php?q=10">     <img src="img/ico2.png" alt="MOVILIDAD" title="MOVILIDAD"></a>
             <a href="categoria.php?q=2">  <img src="img/ico3.png" alt="TECNOLOGÍA" title="TECNOLOGÍA"></a>
             <a href="categoria.php?q=7">   <img src="img/ico4.png" alt="MOBILIARIO DE OFICINA" title="MOBILIARIO DE OFICINA"></a>
             <a href="categoria.php?q=6">   <img src="img/ico5.png" alt="DOTACIONES" title="DOTACIONES"></a>
             <a href="categoria.php?q=5">  <img src="img/ico6.png" alt="HOGAR" title="HOGAR"></a>
             <a href="categoria.php?q=9">  <img src="img/ico7.png" alt="PUBLICIDAD" title="PUBLICIDAD"></a>
             <a href="categoria.php?q=4">  <img src="img/ico8.png" alt="PAPELERIA" title="PAPELERIA"></a>
             <a href="categoria.php?q=8">   <img src="img/ico9.png" alt="CACHARRERIA" title="CACHARRERIA"></a>
             <a href="categoria.php?q=3">   <img src="img/ico10.png" alt="CUIDADO PERSONAL" title="CUIDADO PERSONAL"></a>
             <a href="categoria.php?q=1">   <img src="img/ico11.png" alt="ASEO" title="ASEO"></a>
            </div>
           
            <div class="linefin"></div>
        </div>
    </section>

    <section>
        <div class="productos">
            <div class="containerweb">
            
    <article  class="contenedorproductos">
        <?php
        //get rows query
        $query = $db->query("SELECT * FROM products
        WHERE descuento > 0
        AND status = '1'
        ORDER BY RAND() LIMIT 30");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){ 
                $variable =  1 - ($row["descuento"] / 100) ;
                   $valoranterior =$row["price"] / $variable;
                ?>
                  <div class="cart">
                        <div class="contimgproduct">
                        <a href="mostrarproducto.php?q=<?php echo $row["id"]; ?>">       <img src="img/product/<?php echo $row['id'] ?>.jpg"  class="imgproduc"></a>
                            <h5 class="descuento">  -<?php echo $row["descuento"]?>% </h5>
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

                                                }
                                                ?>
                       
                        <p class="valor "><?php echo '$ '.number_format($row["price"]).' COP '; ?> </p>          
                    <a href="CartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>"> <div class="contcar">   <span class="icon-cart eds"></span>  </div></a>
                                               
                                             
                        </div>
                    </div>




                <?php
            }}
             
                ?>

    </article>            
            </div>
        </div>
    </section>


   </main> 




<?php
include'footer.php';
?>
</body>
</html>