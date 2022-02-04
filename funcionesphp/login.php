<?php
require'../conex.php';

$usr=$_POST['usr'];
$pass=$_POST['pass'];

echo "$usr usuario ";
echo "$pass pass ";


$consulta ="SELECT * FROM customers WHERE email= '$usr' AND pass = '$pass'";

$resultado = mysqli_query($db,$consulta);

$filas= mysqli_num_rows($resultado);



$consulta2 = $db -> query ("SELECT * FROM customers WHERE email= '$usr' AND pass = '$pass'");
while($resultado2 = mysqli_fetch_array($consulta2)){
 $idc= $resultado2['id'];

}

if ($filas > 0){

    header("location: ../checkout.php");
    session_start();
    $_SESSION['sessCustomerID'] = $idc ;

}
else

header("location: ../login.php");



?>