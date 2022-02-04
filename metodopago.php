<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
    <link rel="stylesheet" href="css/metodopago.css">
    <link rel="stylesheet" href="icons/styles.css">
    <title>invercomes</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/icon/favicon-32x32.png">



</head>
<?php
include 'header.php';
    ?>
    <br><br><br><br><br><br><br>
<body>

<?php 
// include database configuration file


$oid = $_GET['id'];


$sql = $db -> query ("SELECT * FROM orders WHERE id = $oid ");
while ($resultado = mysqli_fetch_array($sql)){
  
 $valororden= $resultado['total_price'];
    
}



?>

    

<main>
<div class="containerweb">

<h2 class="titu" > felicitaciones estas a un Click de <br>  disfrutar de tu sueño</h2>



<div class="metododepago">
   
<form action="funcionesphp/metodopago.php" method="post" class="formulario">
<input  name="prodId" type="hidden" value="<?php echo $oid ?>">


<h4 class="parrafo">selecciona tu metodo de pago </h4>

<?php

if($valororden >= 350000 ){
$consulta = $db -> query ("SELECT * FROM metodopago ");
while ($resultado = mysqli_fetch_array($consulta)){
    echo ' <input type="radio" name="metodopago" id="metodopago'.$resultado['id_metodo'].'" class="check" value="'.$resultado['id_metodo'].'">
    <label for="metodopago'.$resultado['id_metodo'].'">
    <img src="img/'.$resultado['id_metodo'].'.png" class="imgmetod">
    </label>' ;
 
    
}

}elseif ($valororden >= 110000 ) {
    



    $consulta = $db -> query ("SELECT * FROM metodopago WHERE id_metodo <> 2  ");
    while ($resultado = mysqli_fetch_array($consulta)){
        echo ' <input type="radio" name="metodopago" id="metodopago'.$resultado['id_metodo'].'" class="check" value="'.$resultado['id_metodo'].'">
        <label for="metodopago'.$resultado['id_metodo'].'">
        <img src="img/'.$resultado['id_metodo'].'.png" class="imgmetod">
        </label>' ;
     
        
    }


}

elseif ($valororden <= 109999 ) {
    



    $consulta = $db -> query ("SELECT * FROM metodopago WHERE id_metodo <> 2 AND id_metodo <> 3");
    while ($resultado = mysqli_fetch_array($consulta)){
        echo ' <input type="radio" name="metodopago" id="metodopago'.$resultado['id_metodo'].'" class="check" value="'.$resultado['id_metodo'].'">
        <label for="metodopago'.$resultado['id_metodo'].'">
        <img src="img/'.$resultado['id_metodo'].'.png" class="imgmetod">
        </label>' ;
     
        
    }


} else {
    echo 'codigo pailas';
}


?>
<input type="text" name="bono" class="bono" placeholder="# Bono">  
      


<input type="submit" value="Comprar" class="btn">

       </form>

      

       <h6 class="nota" >* recuerda que para hacer uso del bono, tu compra debe ser superior al mismo</h6>


<?php


?>

</div>

</main>

</body>
<?php
include'footer.php';
?>
</html>