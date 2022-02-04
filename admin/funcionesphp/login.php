<?php

require'../../conex.php';

$usr = $_POST['usr'];
$pas = $_POST['pass'];

//validamos si hay registros en la bd con los datos del usuario
$validarsql= "SELECT * FROM usr_admin WHERE identificacion = $usr
AND pass = '$pas' ";
$resultado = mysqli_query($db, $validarsql);
$filas = mysqli_num_rows($resultado);

if($filas == 0 ){


?>
<script>
window.alert("Datos Erroneos Verifique Usuario y/o Contrasena");
location.href ="../login.php";
</script>
<?php


}

else {

session_start();
$_SESSION['usr'] = $usr;

?>
<script>
   window.alert("bienvenido");
   location.href ="../index.php";
</script>

<?php



}
?>

