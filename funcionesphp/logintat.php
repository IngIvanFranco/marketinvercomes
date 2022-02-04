<?php
require'../conex.php';

if(!isset($_POST['usr'])){

    header("location: ../index.php");
} else{


$usr=$_POST['usr'];



$consulta ="SELECT * FROM asesores_tat WHERE identificacion_tat= '$usr' ";

$resultado = mysqli_query($db,$consulta);

$filas= mysqli_num_rows($resultado);

if($filas==1){

    $consulta2 = $db -> query ("SELECT * FROM asesores_tat WHERE identificacion_tat= '$usr' ");
    while($resultado2 = mysqli_fetch_array($consulta2)){
     $idtat= $resultado2['id_tat'];
     $nombretat= $resultado2['nombre_tat'];
     }

     session_start();
     $_SESSION['sessTat'] = $idtat ;
?>
<script>
window.alert("Bienvenido <?php echo $nombretat ?> ");
window.location="../index.php";
</script>
<?php

} else{
    ?>
    <script>
    window.alert("No se encuentran registros con este documento ");
    window.location="../logintat.php";
    </script>
    <?php

}


}


?>