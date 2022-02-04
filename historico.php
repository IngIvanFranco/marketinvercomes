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
    <link rel="stylesheet" href="css/historico.css">
    <link rel="stylesheet" href="css/index.css">

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
require'header.php';
if(!empty($_SESSION['sessCustomerID'])){
    ?>
    <br><br><br><br><br><br><br><br>
<main>

<div class="containerweb">
    <h2>Tu cuenta</h2>
    <div class="contenedoricon">
        <a href="perfil.php"><div class="icon"><img src="img/undraw_Swipe_profiles_re_tvqm.svg" alt=""><h3>perfil</h3></a><p>aqui encontraras toda tu informacion personal</p> </div>
        <a href="seguro.php"><div class="icon"><img src="img/undraw_Security_on_re_e491.svg" alt=""><h3>seguridad </h3></a><p>cambia tu contraseña las veces que quieras</p></div>
        <a href="pedidos.php"><div class="icon"><img src="img/undraw_Web_search_re_efla.svg" alt=""><h3>tus pedidos</h3></a><p>revisa el estado de tus pedidos</p></div>
    </div>
</div>

</main>


<?php
include'footer.php';

?>


</body>




</html>

<?php
} else{

    header("location: index.php");
}
?>