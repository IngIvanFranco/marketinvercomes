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
    
    <link rel="stylesheet" href="css/login.css">
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
require'header.php'
    ?>
<body>
  <br>
<main>


<div class="containerweb">
    <div class="contenform">
        <form action="funcionesphp/logintat.php" method="post" >
            <img src="img/Invercomes_icon.png" class="iconlogin">
            <h2 class="tituform">Agente de ventas:</h2>
            <input type="number" name="usr" placeholder="# Documento" class="inputlogin" required>
           <input type="submit" value="Ingresar"  class="inputsubmit">
            <div class="contlink">
       
            </div>
        </form>
    </div>
</div>

</main>


<?php
include'footer.php';
?>


</body>




</html>