<?php
session_start();

require'../conex.php';
$DateAndTime = date('Y-m-d h:i:s a', time()); 


 $id = $_SESSION['sessCustomerID'];
 $valid=$_POST['valid'];
 $newpass=$_POST['newpass'];


if($valid === $newpass){


$sql=" UPDATE customers
SET customers.pass = '$newpass'
WHERE customers.id = $id";
 
$result = mysqli_query($db, $sql);

if($result === TRUE){
    ?>
    <script>
    window.alert("Actualizacion exitosa");
    location.href ="../historico.php";
    </script>
    <?php
}else {
    ?>
    <script>
    window.alert("Algo salio mal, intenta mas tarde");
    location.href ="../seguro.php";
    </script>
    <?php
}
}else {
    ?>
    <script>
    window.alert("Los Campos no coinciden");
    location.href ="../seguro.php";
    </script>
    <?php
}


?>
