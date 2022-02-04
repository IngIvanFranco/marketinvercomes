<?php
$DateAndTime = date('Y-m-d h:i:s a', time()); 


$identificacion=$_POST['documento'];
$nombre=$_POST['nombre'];
$empresa=$_POST['empresa'];
$ciudad=$_POST['ciudad'];
$celular=$_POST['celular'];
$correo=$_POST['email'];
$msg=$_POST['msg'];


 //correo a carol

 $to = 'direccionoperativa@invercomes.com.co';

 //remitente del correo
 $from = 'pedidos@invercomes.com.co';
 $fromName = $empresa;
 
 //Asunto del email
 $subject = 'Cotizacion De Productos '; 
 
 //Ruta del archivo adjunto
 $file = "../img/Logo-Invercomes-Horizontal.png";
 
 //Contenido del Email
 $htmlContent = '<h1>Cotizacion De Productos</h1>
     <h2>Cordial saludo Dra. Luisa Sánchez</h2>
     <p>Un cliente ha escrito el siguiente mensaje </p>
     <p>'.$msg.'</p>
     <p>Datos de contacto:</p>
     <p>Nombre: '.$nombre.'</p>
     <p>Celular: '.$celular.'</p>
     <p>Correo: '.$correo.'</p>
     <p>Empresa: '.$empresa.'</p>
     <p>Identificacion: '.$identificacion.'</p>
     <p>Ciudad: '.$ciudad.'</p>
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
 window.alert("Informacion enviada correctamente");
 location.href ="../index.php";
 </script>


