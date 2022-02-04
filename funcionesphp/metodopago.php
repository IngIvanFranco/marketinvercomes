<?php
session_start();


require'../conex.php';

$ido= $_POST['prodId'];// id de la orden
$mtp= $_POST['metodopago'] ;//id del metodo de pago
$bono= $_POST['bono'];//codigo del bono
  
$consulta3 = $db -> query ("SELECT * FROM orders WHERE id= '$ido'");
while($resultado3 = mysqli_fetch_array($consulta3)){
  $vlrorden= $resultado3['total_price'];

}

//verificacion si hay un asesor tat logeado
if(empty($_SESSION['sessTat'])){
// si no esta logeado su variable toma el valor de 0
    $idtat=0;
}else{
    // si esta logueado su variable toma el valor del id de la bd
    $idtat = $_SESSION['sessTat'];
}

if (empty($_POST['metodopago']) ) { // validamos que el usuario siempre seleccione el metodo de pago 
  
?>
<script>
window.alert("Seleccione el metodo de pago");
location.href ="../metodopago.php?id=<?php echo $_POST['prodId'] ?>";
</script>
<?php
} 
   


if (empty($_POST['bono']) && $mtp == 5){

?>
    <script>
 window.alert("Digita el numero de bono por favor");
 location.href ="../metodopago.php?id=<?php echo $ido ?>";
 </script>
<?php

} 


else {
   
if(  $mtp<> 5 ){
    
    $sql="UPDATE orders
    SET orders.metodo_pago = $mtp, orders.bono_id = '0', orders.tat_id = $idtat,  orders.status=1
    WHERE orders.id = $ido ";
     
    
    
    $result = mysqli_query($db, $sql);
   
    if ($result) {
        header("location: ../orderSuccess.php?id=$ido");
    } else {
      echo "algo fallo";
    }
   

}

else{

   
$consulta ="SELECT * FROM bonos WHERE codigo= '$bono' AND estado = 1 ";

$resultado = mysqli_query($db,$consulta);

$filas= mysqli_num_rows($resultado);

echo $filas;



if ($filas == 1){

    
$consulta2 = $db -> query ("SELECT * FROM bonos WHERE codigo= '$bono'");
while($resultado2 = mysqli_fetch_array($consulta2)){
 $idb= $resultado2['id_bono'];
 $vlrbono = $resultado2['valor'];


}

$validacion = $vlrorden - $vlrbono;
echo 'vlor bono '.$vlrbono;
echo ' valor orden: '.$vlrorden;
echo ' total: '.$validacion;

if($validacion >= 1000){


$sql2="UPDATE bonos
SET bonos.estado = 2
WHERE bonos.id_bono = $idb ";
$result2 = mysqli_query($db, $sql2);



    $sql="UPDATE orders
    SET orders.metodo_pago = $mtp, orders.bono_id = $idb, orders.tat_id = $idtat,  orders.status = 1
    WHERE orders.id = $ido ";
     
    
    
    $result = mysqli_query($db, $sql);
   


   ?>
    <script>
 window.alert("Bono Validado Correctamente");
 location.href ="../orderSuccess.php?id=<?php echo $ido ?>";
 </script>
<?php
}

else{
    ?>
    <script>
 window.alert("El valor del  bono es superior al pedido");
 location.href ="../metodopago.php?id=<?php echo $ido ?>";
 </script>
<?php
}


}

else{
    ?>
    <script>
 window.alert("El codigo del bono es invalido y/o ya fue redimido");
 location.href ="../metodopago.php?id=<?php echo $ido ?>";
 </script>
<?php


}







}


}

?>