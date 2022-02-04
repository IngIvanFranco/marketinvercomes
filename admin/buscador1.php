<?php
require'seguridad.php';
require'conex.php';
require'menu.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/busquedad.css">


    
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
<script src="js/datatable.js"></script>

    <title>Productos</title>
</head>
<body>
    




<table id="example" style="width: 90% ;" class="blueTable"  >
        <thead>
            <tr>
                <th>#id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descuento</th>
                <th>Status</th>
                <th>Referencia</th>
               
                <th>   </th>
                
            </tr>
        </thead>
        <tbody>

        <?php
$sql = $db->query("SELECT * FROM products ");
while ($row = $sql->fetch_assoc()) {
    echo '<tr>
    <td>  '.$row['id'].'</td>
    <td>'. utf8_encode( $row['name']).'</td>
    <td> $ '. number_format( $row['price']).'</td>
    <td>'.$row['descuento'].'</td>';

    if ($row['status']==1) {
      echo  '<td>Activo</td>';
    }else {
        echo  '<td>Inactivo</td>';
    }

   


  echo  '<td>'.$row['referencia_proveedor'].'</td>
   
    <td class="special"> <a href="editar.php?idp='.$row['id'].'"> ver </a></td>
    </tr>';
}
?>


</tbody>

<tfoot>
            <tr>
            <th>#id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descuento</th>
                <th>Status</th>
                <th>Referencia</th>
               
                <th>   </th>
            </tr>
        </tfoot>
    </table>






</body>

</html>