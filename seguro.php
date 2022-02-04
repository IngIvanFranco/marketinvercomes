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
  
        <link rel="stylesheet" href="css/perfil.css">
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
require'header.php';
?>
<br><br><br><br><br><br><br>
<body>
    <?php

if(!empty($_SESSION['sessCustomerID'])){
$id = $_SESSION['sessCustomerID'] ;

$consulta = $db -> query ("SELECT * FROM customers WHERE customers.id = $id"  );
while ($resultado = mysqli_fetch_array($consulta)){
    
    ?>
    <div class="containerweb">
    <div class="divcon">
    <h2> <a href="historico.php" class="lin" >Tu cuenta/</a>Contraseña de ingreso </h2>
    <form action="funcionesphp/actualizarpass.php" method="post">
    
<h5>Pass Anterior:</h5><input type="text" value="<?php echo $resultado['pass'] ?>  " name="pass" class="input100" placeholder="Pass Anterior" required>
<input type="password"   name="newpass" class="input100" placeholder="Nuevo Pass" required>
<input type="password"  name="valid" class="input100" placeholder="Confirmar Pass" required>

<input type="submit" value="Actualizar" class="btn">

</form>
</div>
</div>
    <?php
}

    ?>
<main>

</main>


<?php
include'footer.php';
?>


</body>




</html>


<?php
}else {
    header("location: index.php");
}
?>