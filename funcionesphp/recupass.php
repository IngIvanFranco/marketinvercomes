<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</head>
<body>
<?php
require'../conex.php';

if (!empty($_POST['documento'])) {

    $documento = $_POST['documento'];
    
$consulta ="SELECT * FROM customers WHERE identificacion_cliente = $documento ";

$resultado = mysqli_query($db,$consulta);

$filas= mysqli_num_rows($resultado);

if($filas==1){

    $consulta2 = $db -> query ("SELECT * FROM customers WHERE identificacion_cliente = $documento ");
    while($resultado2 = mysqli_fetch_array($consulta2)){
$correo = $resultado2['email'];
$name = $resultado2['name'];
$pass = $resultado2['pass'];
    }
    $to = ''.$correo.'';

    //remitente del correo
    $from = 'pedidos@invercomes.com.co';
    $fromName = 'Invercomes Marketplace';
    
    //Asunto del email
    $subject = 'Recuperacion Password Invercomes'; 
    
    //Ruta del archivo adjunto
    $file = "../img/Logo-Invercomes-Horizontal.png";
    
    //Contenido del Email
    $htmlContent = '<h1>Recuperacion de contraseña</h1>
        <p>Hola '.$name.'</p>
        <p>esta informacion es privada y unica para ti <br> por favor no compartas con nadie tu informacion. <br>
        este es tu pass: '.$pass.'</p>
        
        <p>Cordialmente</p>
        <br><br>
        <p>Equipo Marketplace invercomes</p>
        ';
    
    //Encabezado para información del remitente
    $headers = "De: $fromName"." <".$from.">";
    
    //Limite Email
    $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    
    //Encabezados para archivo adjunto 
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
    
    //límite multiparte
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n"; 
    
    //preparación de archivo
    if(!empty($file) > 0){
        if(is_file($file)){
            $message .= "--{$mime_boundary}\n";
            $fp =    @fopen($file,"rb");
            $data =  @fread($fp,filesize($file));
    
            @fclose($fp);
            $data = chunk_split(base64_encode($data));
            $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" . 
            "Content-Description: ".basename($files[$i])."\n" .
            "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" . 
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        }
    }
    $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;
    
    //Enviar EMail
    $mail = @mail($to, $subject, $message, $headers, $returnpath); 
    
    



    ?>
    <script>
    window.alert("Hola  <?php echo $name ?> te enviaremos un correo a <?php echo $correo ?>, sigue los pasos alli contenidos");
  window.location="../login.php"; 
  
  
    </script>
    <?php
}else{
?>
    <script>
  window.alert("algo salio mal, envianos un correo a direcciontics@invercomes.com.co y te ayudaremos lo antes posible");
  window.location="../login.php"; 
  
   
    </script>
    <?php

}

} 





?>




</body>
</html>