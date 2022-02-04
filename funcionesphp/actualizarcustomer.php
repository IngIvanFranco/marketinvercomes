<?php
session_start();

require'../conex.php';
$DateAndTime = date('Y-m-d h:i:s a', time()); 


 $id = $_SESSION['sessCustomerID'];
 $nombre=$_POST['nombre'];
 $direccionenvio=$_POST['dir'];
 $celular=$_POST['tel'];
 $correo=$_POST['email'];




$sql=" UPDATE customers
SET customers.name = '$nombre', customers.email = '$correo', customers.phone = '$celular', customers.address = '$direccionenvio',   customers.modified = '$DateAndTime'
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
    location.href ="../perfil.php";
    </script>
    <?php
}

?>
