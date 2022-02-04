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
    <link rel="stylesheet" href="css/recupass.css">
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
<body>
    <?php
require'header.php'
    ?>
  
<main>
<br><br><br><br><br>
    <div class="containerweb">
        <h2 class="titurecpass">Recuperar password</h2>
<form action="funcionesphp/recupass.php" method="post" class="formpass">
<input type="number" placeholder="# Identificacion" class="inpass" name="documento" required>
<input type="submit" value="Recuperar" class="btn">

</form>
</div>

</main>


<?php
include'footer.php';
?>


</body>




</html>