<?php
// include database configuration file
include 'conex.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <link rel="stylesheet" href="css/eresunaempresa.css">
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


</head>
<body>
<?php
include'header.php';

?>

<main>
<section class="formulario_registro">
<div class="containerweb">
   <div class="conteform">
   <h2 class="tituloform">cotiza con nosotros</h2>
    <form class="form" method="post" action="funcionesphp/cotizacion.php">

       <input type="number" name="documento" placeholder="# identificacion" class="input50" required >
       <input type="text" name="empresa" placeholder="Empresa" class="input50" required>
       <input type="text" name="nombre" placeholder="nombre de contacto" class="input100" required>
       <input type="text" name="ciudad" placeholder="Ciudad" class="input50" required >
       <input type="number" name="celular" placeholder="Celular" class="input50" required>
       <input type="email" name="email" placeholder="email" class="input100" required>
       <textarea name="msg" placeholder="como podemos ayudarte" class="text100" required></textarea>
       <input type="checkbox" id="check" class="check"><label for="check">  Aceptó consentimiento y <a href="javascript:ventanaSecundaria('politica.php')">politicas</a> en ley de protección de datos personales.  </label>

       <input type="submit" value="Enviar" class="btn">


        
    </form>
    
</div>
</div>

</section>

</div>


</main>

<?php
include'footer.php';
?>



</body>
<script src="js/emergentepolitica.js"></script>



</html>