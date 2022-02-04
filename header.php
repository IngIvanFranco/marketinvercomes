<?php
session_start();
include 'conex.php';
$fecha_actual = strtotime(date("Y-m-d"));
$fecha_entrada = strtotime("2021-12-20");
if ($fecha_actual == $fecha_entrada) {
    header("location: mantenimiento.php");
}



?>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="icons/styles.css">


<section class="overhead">
    <div class="enlacesoverhead">
        <a href="index.php" class="ecommerce Seleccion"> Inicio</a>
        <a href="eresunaempresa.php" class="ecommerce">Cotiza con nosotros</a>
    </div>

   

    <div class="datosempresa">
        <p class="titudtemp">Datos De Contacto - comercial@invercomes.com.co   (+57) 314 358 06 19</p>
    </div>
</section>


<header>
    <div class="containerweb">
        <div class="contenedorelemheader">
            <div class="conteniconheader">
                
                <span id="btnmenu" class="icon-menu icono iconomenu" title="Menu"></span>
                
            
            </div>

            <div class="inputheader">
                <form action="funcionesphp/busqueda.php" method="post">
                    <input type="text" name="busqueda" placeholder="Cuál es tu Sueño?" class="inputhead" requerid>
                </form>
            </div>

            <div class="icons">
                <?php
                if(!empty($_SESSION['sessCustomerID'])){
                    ?>
       <a href="historico.php">   <span class="icon-receipt-shopping-streamline icono" title="Perfil"></span></a> 
                <?php
                }else {
                    ?>
                  <a href="login.php">   <span class="icon-user icono" title="Iniciar sesion"></span></a> 

                    <?php
                }
                ?>

          <a href="viewCart.php"> <i class="icon-cart icono" title="Tu carrito de compras"></i> </a>


            

            <?php
                if(!empty( $_SESSION['sessTat'])){
                    ?>
            
                <?php
                }else {
                    ?>
                 <a href="logintat.php">   <span class="icon-login icono" title="Asesor Tat"></span></a> 
                    <?php
                }
                ?>

<?php
                if(!empty( $_SESSION['sessCustomerID'])){
                    ?>
            <a href="funcionesphp/cerrarsesion.php">  <span class="icon-salida icono" title="Cerrar sesion"></span> </a>
                <?php
                }else {
                    ?>
                
                    <?php
                }
                ?>



 
           
            </div>

         


    </div>   

</header>

<section class="contmenu">
<div class="header" id="visible">
<h1>Compra en tu categoría favorita</h1>

<div class="acordeones">

<div class="accordion">
     <input type="radio" name="select" class="accordion-select"  />
    <div class="accordion-title"><span>Motocicletas</span></div>
    <div class="accordion-content">

    <ul>
            <li><a href="guiado.php?q=32" class="subcate">Akt</a></li>
            <li><a href="guiado.php?q=35" class="subcate">Bajaj</a></li>
            <li><a href="guiado.php?q=33" class="subcate">Hero</a></li>
    </ul>

    <ul>
            <li><a href="guiado.php?q=36" class="subcate">Honda</a></li>
            <li><a href="guiado.php?q=38" class="subcate">Ktm</a></li>
            <li><a href="guiado.php?q=39" class="subcate">Kymco</a></li>
    </ul>
  
    <ul>
            <li><a href="guiado.php?q=31" class="subcate">Suzuki</a></li>
            <li><a href="guiado.php?q=37" class="subcate">Tvs</a></li>
            <li><a href="guiado.php?q=40" class="subcate">Victory</a></li>
            

    </ul>
    <ul>
    <br>
    <li ><a href="categoria.php?q=11" class="cate"> Ver todo</a></li>
    <br>              
    </ul>
    

    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Movilidad</span></div>
    <div class="accordion-content">

    <ul>
    <li><a href="guiado.php?q=29" class="subcate">Limpieza</a></li>
            <li><a href="guiado.php?q=34" class="subcate">Bicicletas</a></li>
            <li><a href="guiado.php?q=41" class="subcate">Patinetas</a></li>
    </ul>

    <ul>
    <br>
    <li ><a href="categoria.php?q=10" class="cate"> Ver todo</a></li>
    <br>              
    </ul>

    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Tecnología</span></div>
    <div class="accordion-content">
        
<ul>
    
<li><a href="guiado.php?q=15" class="subcate">Accesorios</a></li>
<li><a href="guiado.php?q=13" class="subcate">Cómputo</a></li>
           
            <li><a href="guiado.php?q=14" class="subcate">Dispositivos móviles</a></li>
           

</ul>

<ul>
<li><a href="guiado.php?q=28" class="subcate">Suministros</a></li>
<li><a href="guiado.php?q=42" class="subcate">Gaming</a></li>
<li><a href="guiado.php?q=43" class="subcate">Juguetes</a></li>
</ul>

<ul>
    
    <br>
    <li ><a href="categoria.php?q=2" class="cate"> Ver todo</a></li>
</ul>
    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Hogar</span></div>
    <div class="accordion-content">
        
<ul>
<li><a href="guiado.php?q=3" class="subcate">Electrodomésticos</a></li>
            <li><a href="guiado.php?q=1" class="subcate">Electromenores</a></li>
            <li><a href="guiado.php?q=2" class="subcate">Muebles</a></li>
</ul>

<ul>
<br>
    <li ><a href="categoria.php?q=5" class="cate"> Ver todo</a></li>
</ul>

    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Cacharrería</span></div>
    <div class="accordion-content">
        
    <ul>
            <li><a href="guiado.php?q=16" class="subcate">Fiestas</a></li>
            <li><a href="guiado.php?q=17" class="subcate">Industrial</a></li>
            <li><a href="guiado.php?q=18" class="subcate">Personal</a></li>
    </ul>

    <ul>

    <br>
    <li ><a href="categoria.php?q=8" class="cate"> Ver todo</a></li>
    </ul>
    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Aseo</span></div>
    <div class="accordion-content">
        
<ul>
            <li><a href="guiado.php?q=4" class="subcate">Elementos</a></li>
            <li><a href="guiado.php?q=7" class="subcate">Jabones</a></li>
            <li><a href="guiado.php?q=5" class="subcate">Limpiadores</a></li>
</ul>

<ul>

<li><a href="guiado.php?q=30" class="subcate">Kits</a></li>
            <li><a href="guiado.php?q=6" class="subcate">Suavizantes</a></li>
</ul>

<ul>
<br>
<li ><a href="categoria.php?q=1" class="cate"> Ver todo</a></li>

</ul>

    </div> 
</div> 







<div class="accordion">
     <input type="radio" name="select" class="accordion-select"  />
    <div class="accordion-title"><span>Cuidado personal</span></div>
    <div class="accordion-content">

    <ul>
            <li><a href="guiado.php?q=11" class="subcate">Aseo</a></li>        
            <li><a href="guiado.php?q=8" class="subcate">Cabello</a></li>
            <li><a href="guiado.php?q=10" class="subcate">Maquillaje</a></li>
    </ul>

    <ul>
    <li><a href="guiado.php?q=9" class="subcate">Piel</a></li>
            <li><a href="guiado.php?q=12" class="subcate">Salud</a></li>

    </ul>
    
    <ul>
    
    <li ><a href="categoria.php?q=3" class="cate"> Ver todo</a></li>

    </ul>

    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Mobiliario de oficina</span></div>
    <div class="accordion-content">
    <ul>

    <li><a href="guiado.php?q=24" class="subcate">Muebles</a></li>
        <li><a href="guiado.php?q=25" class="subcate">Archivadores</a></li>

    </ul>    
<ul>

<li ><a href="categoria.php?q=7" class="cate"> Ver todo</a></li>
</ul>

    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Dotaciones</span></div>
    <div class="accordion-content">
        
<ul>

<li><a href="guiado.php?q=21" class="subcate">Prendas de vestir</a></li>
</ul>


<ul>

<li ><a href="categoria.php?q=6" class="cate"> Ver todo</a></li>

</ul>
    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Publicidad</span></div>
    <div class="accordion-content">
<ul>

<li><a href="guiado.php?q=27" class="subcate">Extensiones publicitarias</a></li>

</ul>


<ul>

<li ><a href="categoria.php?q=9" class="cate"> Ver todo</a></li>

</ul>


    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Papelería</span></div>
    <div class="accordion-content">
        
<ul>

<li><a href="guiado.php?q=19" class="subcate">Oficina</a></li>
        <li><a href="guiado.php?q=20" class="subcate">Escolar</a></li>

</ul>

<ul>

<li ><a href="categoria.php?q=4" class="cate"> Ver todo</a></li>

</ul>


    </div> 
    <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span></span></div>
    <div class="accordion-content"><img src="img/Logo-Invercomes-Horizontal.png" alt=""></div>
</div> 


</div>

</div>
</section>
<br><br>

<script>
    const btnmenu =document.querySelector("#btnmenu");
    const visible =document.querySelector("#visible");


    btnmenu.addEventListener("click", function(){
        visible.classList.toggle("header2");
		
    });
</script>
