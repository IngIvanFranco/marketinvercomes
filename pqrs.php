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
    <link rel="stylesheet" href="css/busqueda.css">
    <link rel="stylesheet" href="css/eresunaempresa.css">
    <link rel="stylesheet" href="icons/styles.css">
    <title>invercomes</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/icon/favicon-32x32.png">

    <script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

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
   <h2 class="tituloform">peticiones quejas <br> reclamos y sugerencias</h2>
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