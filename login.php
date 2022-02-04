<?php session_start();


if(empty($_SESSION['sessCustomerID'])){


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
    <link rel="stylesheet" href="css/login.css">
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

<main>

<div class="containerweb">
    <div class="contenform">
        <form action="funcionesphp/login.php" method="post" >
            <img src="img/Invercomes_icon.png" class="iconlogin">
            <h2 class="tituform">login:</h2>
            <input type="email" name="usr" placeholder="Email" class="inputlogin" required>
            <input type="password" name="pass" placeholder="Password"  class="inputlogin" required>
            <input type="submit" value="Ingresar"  class="inputsubmit">
            <div class="contlink">
            <a href="rescliente.php" class="linkfomr">No tienes una cuenta?</a>
            <a href="recuperarcontrasena.php" class="linkfomr">Olvidaste tu contraseña?</a>
            </div>
        </form>
    </div>
</div>

</main>



<?php
} else {
  
    header("location: checkout.php");
}
include'footer.php';
?>



</body>




</html>