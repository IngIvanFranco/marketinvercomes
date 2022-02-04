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
<br><br><br><br><br>
<body>
    <?php

if(!empty($_SESSION['sessCustomerID'])){
$id = $_SESSION['sessCustomerID'] ;

$consulta = $db -> query ("SELECT * FROM customers WHERE customers.id = $id"  );
while ($resultado = mysqli_fetch_array($consulta)){
    
    ?>
    <div class="containerweb">
        <div class="divcon">
    <h2><a href="historico.php" class="lin">Tu cuenta/</a>Datos personales</h2>
    <form action="funcionesphp/actualizarcustomer.php" method="post">
    
<input type="text" value="<?php echo $resultado['name'] ?>  " name="nombre" class="input50" placeholder="Nombre" required>
<input type="email" value="<?php echo $resultado['email'] ?>  " name="email" class="input50" placeholder="Email" required>
<input type="text" value="<?php echo $resultado['phone'] ?>  " name="tel" class="input50" placeholder="# Celular" required>
<input type="text" value="<?php echo $resultado['address'] ?>  " name="dir" class="input50" placeholder="Direccion" required>
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