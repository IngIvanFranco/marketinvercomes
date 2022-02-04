<?php
require'../conex.php';
$departamento= $_POST['departamento'];




$sql= "SELECT municipios.id_municipio, municipios.departamento_id, municipios.municipio  FROM  municipios
WHERE municipios.departamento_id = $departamento";

$resultado = mysqli_query($db,$sql);

$cadena="<select id='selectmunicipios' name='municipio' class='select100'>";

while ($ver=mysqli_fetch_row($resultado)){

    $cadena=$cadena.'<option value='.$ver[0].'>'. utf8_encode($ver[2]).'</option>';
}

echo $cadena."</select>";

?>