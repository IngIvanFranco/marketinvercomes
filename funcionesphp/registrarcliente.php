<?php
require'../conex.php';
$DateAndTime = date('Y-m-d h:i:s a', time()); 

$tipoid = $_POST['tipoid'];
$identificacion=$_POST['documento'];
$nombre=$_POST['nombre'];
$direccionenvio=$_POST['direccion'];
$departamento= $_POST['departamento'];
$ciudad=$_POST['municipio'];
$codigo_postal=$_POST['codigopostal'];
$celular=$_POST['celular'];
$correo=$_POST['email'];
$pass=$_POST['pass'];
$status= 1;


$validarsql= "SELECT * FROM customers WHERE customers.identificacion_cliente = $identificacion
OR customers.email = '$correo' ";
$resultado = mysqli_query($db, $validarsql);
$filas = mysqli_num_rows($resultado);

if($filas == 0 ){

  


$sql="INSERT INTO customers VALUES('', '$tipoid', '$identificacion', '$nombre', '$correo', '$celular', '$direccionenvio', '$departamento', 
'$ciudad', '$codigo_postal', '$DateAndTime', '$DateAndTime','$pass','$status')  ";
 


$result = mysqli_query($db, $sql);
$idc = $db -> insert_id;

//header("location: ../checkout.php?idc=$idc");

?>
<script>
window.alert("Registro creado con exito");
location.href ="../login.php";
</script>
<?php


}

else {

?>
<script>
   window.alert("ya existe una cuenta con estos datos");
   location.href ="../rescliente.php";
</script>

<?php
}
?>