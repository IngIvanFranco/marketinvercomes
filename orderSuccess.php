<?php
session_start();
$_SESSION['sessCustomerID'];

if(!isset($_REQUEST['id'])){
    header("Location: index.php");

  }


  



$ido= $_GET['id'];


    require'conex.php';



    //genera archivo plano 
    $fecha= date('Ymd');


    $consulta = $db -> query ("SELECT orders.id, customers.identificacion_cliente, customers.name, orders.total_price, customers.email FROM orders, customers 
    WHERE orders.id=$ido
    AND orders.customer_id = customers.id ");
    while ($resultado = mysqli_fetch_array($consulta)){
     $contenido= $resultado['id'].";".$resultado['identificacion_cliente'].";".$resultado['name'].";".$resultado['total_price'].";".$fecha.";".$resultado['email'];
     $vlr= $resultado['total_price'];
     $nombre = $resultado['name'];
    $email1= $resultado['email'];
    
    $archivo= fopen("archivosplanos/$ido.txt","w");
    fwrite($archivo,$contenido);
    
    }

//correo informativo para logistico

    $to = 'logistica@invercomes.com.co';

    //remitente del correo
    $from = 'pedidos@invercomes.com.co';
    $fromName = 'Invercomes Marketplace';
    
    //Asunto del email
    $subject = 'Orden De Compra #: '.$ido; 
    
    //Ruta del archivo adjunto
    $file = "img/Logo-Invercomes-Horizontal.png";
    
    //Contenido del Email
    $htmlContent = '<h1>Orden de compra #: '.$ido.'</h1>
        <p>Cordial saludo</p>
                <p>Se ha generado la orden de compra #: '.$ido.'  </p>
        <p>a nombre de: '.$nombre.'</p>
        <p>el valor de la compra es: $ '.number_format($vlr).'</p>
        <p>muchas gracias</p>
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
    

    //correo a carol

    $to = 'contabilidad@invercomes.com.co';

    //remitente del correo
    $from = 'pedidos@invercomes.com.co';
    $fromName = 'Invercomes Marketplace';
    
    //Asunto del email
    $subject = 'Orden De Compra #: '.$ido; 
    
    //Ruta del archivo adjunto
    $file = "img/Logo-Invercomes-Horizontal.png";
    
    //Contenido del Email
    $htmlContent = '<h1>Orden de compra #: '.$ido.'</h1>
        <p>Cordial saludo Carol</p>
                <p>Se ha generado la orden de compra #: '.$ido.'  </p>
        <p>a nombre de: '.$nombre.'</p>
        <p>el valor de la compra es: $ '.number_format($vlr).'</p>
        <p>muchas gracias</p>
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

    //correo a comercial

    $to = 'comercial@invercomes.com.co';

    //remitente del correo
    $from = 'pedidos@invercomes.com.co';
    $fromName = 'Invercomes Marketplace';
    
    //Asunto del email
    $subject = 'Orden De Compra #: '.$ido; 
    
    //Ruta del archivo adjunto
    $file = "img/Logo-Invercomes-Horizontal.png";
    
    //Contenido del Email
    $htmlContent = '<h1>Orden de compra #: '.$ido.'</h1>
        <p>Cordial saludo Carol</p>
                <p>Se ha generado la orden de compra #: '.$ido.'  </p>
        <p>a nombre de: '.$nombre.'</p>
        <p>el valor de la compra es: $ '.number_format($vlr).'</p>
        <p>muchas gracias</p>
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



//correo cliente


$to = ''.$email1.'';

//remitente del correo
$from = 'pedidos@invercomes.com.co';
$fromName = 'Invercomes Marketplace';

//Asunto del email
$subject = 'Orden De Compra #: '.$ido; 

//Ruta del archivo adjunto
$file = "img/Logo-Invercomes-Horizontal.png";

//Contenido del Email
$htmlContent = '<h1>Orden de compra #: '.$ido.'</h1>
    <p>Cordial saludo</p>
    <p>Se ha generado la orden de compra #: '.$ido.' </p>
    <p>a nombre de: '.$nombre.'</p>
    <p>el valor de la compra es: $ '.number_format($vlr).'</p>
    <p>muchas gracias</p>
    <p>Cordialmente</p>
    <br>
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


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 
    <link rel="stylesheet" href="css/ordensuces.css">
    <link rel="stylesheet" href="icons/styles.css">
    <title>invercomes</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/icon/favicon-32x32.png">

  
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-175432953-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-175432953-1');
</script>

</head>
<body>
    <?php
include'header.php';
    ?>
<br><br><br><br><br><br>
<main>



<?php
//consulta para traer datos de la orden y saber como va a pagar el cliente

$consulta = $db -> query (" SELECT * FROM orders WHERE orders.id = $ido "  );
while ($resultado = mysqli_fetch_array($consulta)){
    // variables que guardan el valor total y el metodo de pago
    $vlr= $resultado['total_price'];
    $mtp= $resultado['metodo_pago'];

  if ( $mtp == 1) {

// adjunta el archivo plano y lo envia para su posterior cargue solo para pagos en efectivo a traves de gana gana

//Recipiente
$to = 'contabilidad@invercomes.com.co';

//remitente del correo
$from = 'pedidos@invercomes.com.co';
$fromName = 'Invercomes Marketplace';

//Asunto del email
$subject = 'Orden De Compra #: '.$ido; 

//Ruta del archivo adjunto
$file = "archivosplanos/".$ido.".txt";

//Contenido del Email
$htmlContent = '<h1>Orden de compra #: '.$ido.'</h1>
    <p>Cordial saludo</p>
    <p>adjuntamos orden de compra para su respectivo cargue en matriz</p>
    <p>Se ha generado la orden de compra #: '.$ido.'  </p>
    <p>a nombre de: '.$nombre.'</p>
    <p>el valor de la compra es: $ '.number_format($vlr).'</p>
    <p>muchas gracias</p>
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

<section class="confir">
    <div class="containerweb">
    <h1 class="titu">Felicitaciones!!!</h1>
    <h2 class="orderid">tu numero de orden es: #<?php echo $ido; ?></h2>    
    
    
    <p class="parrafo">Acercate a tu punto Gana-Gana mas cercano  y Entregale al asesor Tu numero de orden 
        junto al valor a cancelar $<?php  echo number_format( $vlr) ?> . y espera tu pedido que se encuentra en camino.</p>

 
    <p class="parrafo"> <img src="img/logo-ganagana-amarillo-2.png" alt="" style="width:150px;height:auto;">  </p>
    <h2 class="subtitu">estas cada vez mas cerca de tus sueños</h2>
<div class="contpie">
    <a href="index.php" class="btn">inicio</a>


</div>
    </div>
</section>

<?php
  } 
  else if ( $mtp == 2){
 
 //envia correo a su solucion como metodo de pago
 $fecha= date('Ymd');


 $consulta = $db -> query ("SELECT orders.id, customers.identificacion_cliente, customers.name, orders.total_price, customers.email, customers.phone FROM orders, customers 
 WHERE orders.id=$ido
 AND orders.customer_id = customers.id ");
 while ($resultado = mysqli_fetch_array($consulta)){
  

  $vlr= $resultado['total_price'];
  $nombre = $resultado['name'];
  $telefono = $resultado['phone'];
  $correo = $resultado['email'];
 
 
 }

//informa a su solucion q hiciewron un pedido y los eligieron a ellos como metodo de pago

//Recipiente
$to = 'comercial@susolucionsa.com.co';

//remitente del correo
$from = 'pedidos@invercomes.com.co';
$fromName = 'Invercomes Marketplace';

//Asunto del email
$subject = 'Orden De Compra #: '.$ido; 

//Ruta del archivo adjunto
$file = "archivosplanos/".$ido."txt";

//Contenido del Email
$htmlContent = '<h1>Orden de compra #: '.$ido.'</h1>
 <p>Cordial saludo</p>
 <p>adjuntamos orden de compra para su respectiva validacion</p>
 <p>Se ha generado la orden de compra #: '.$ido.'  </p>
 <p>a nombre de: '.$nombre.'</p>
 <p>valor de la compra es: $ '.number_format($vlr).'</p>
 <p>Numero De Contacto: '.$telefono.'</p>
 <p>correo: '.$correo.'</p>
 <p>muchas gracias</p>
 <p>Cordialmente</p>
 <br>
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


<section class="confir">
    <div class="containerweb">
    <h1 class="titu">Felicitaciones!!!</h1>
    <h2 class="orderid">tu numero de orden es: #<?php echo $ido; ?></h2>    
    
    
    <p class="parrafo">Tu Orden esta en Proceso por un valor de: $<?php  echo number_format( $vlr) ?>. 
    <br> Pronto Un Asesor De Su Solucion Te Contactara.</p>

 
    <p class="parrafo"><img src="img/logo-susolucion.png" alt="" style="width:150px;height:auto;"></p>
  
    <h2 class="subtitu">estas cada vez mas cerca de tus sueños</h2>
<div class="contpie">
    <a href="index.php" class="btn">inicio</a>

</div>
    </div>

</section>
  <?php
  } else if ( $mtp == 3)
  
  {


    
      // enviar correo femseapto como metodo de pago

      $fecha= date('Ymd');


 $consulta = $db -> query ("SELECT orders.id, customers.identificacion_cliente,  customers.name, orders.total_price, customers.email, customers.phone, orders.bono_id 
 FROM orders, customers
 WHERE orders.id=$ido
 AND orders.customer_id = customers.id
  ");
 while ($resultado = mysqli_fetch_array($consulta)){
  

  $vlr= $resultado['total_price'];
  $nombre = $resultado['name'];
  $telefono = $resultado['phone'];
  $correo = $resultado['email'];
  $vlrbono = $resultado['valor'];
  
  $idbono = $resultado['bono_id'];
 
 
 }

// adjunta el archivo plano y lo envia para su posterior cargue

//Recipiente
$to = 'femseapto@ganagana.com.co';

//remitente del correo
$from = 'pedidos@invercomes.com.co';
$fromName = 'Invercomes Marketplace';

//Asunto del email
$subject = 'Orden De Compra #: '.$ido; 

//Ruta del archivo adjunto
$file = "archivosplanos/".$ido."txt";

//Contenido del Email
$htmlContent = '<h1>Orden de compra #: '.$ido.'</h1>
 <p>Cordial saludo</p>
 <p>adjuntamos orden de compra para su respectiva validacion</p>
 <p>Se ha generado la orden de compra #: '.$ido.'  </p>
 <p>a nombre de: '.$nombre.'</p>
 <p>valor de la compra es: $ '.number_format($vlr).'</p>
 <p>Numero De Contacto: '.$telefono.'</p>
 <p>correo: '.$correo.'</p>
 <p>muchas gracias</p>
 <p>Cordialmente</p>
 <br>
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

<section class="confir">
    <div class="containerweb">
    <h1 class="titu">Felicitaciones!!!</h1>
    <h2 class="orderid">tu numero de orden es: #<?php echo $ido; ?></h2>    
    
    
    <p class="parrafo">Tu Orden esta en Proceso por un valor de: $<?php  echo number_format( $vlr) ?>.
     <br> Pronto Un Asesor Del Fondo De Empleados De Seapto Te Contactara.</p>

 
    <p class="parrafo"><img src="img/logo-fondo.png" alt="" style="width:150px;height:auto;"></p>
  
    <h2 class="subtitu">estas cada vez mas cerca de tus sueños</h2>
<div class="contpie">
    <a href="index.php" class="btn">inicio</a>

</div>
    </div>

</section>

<?php
  }
else {

    if($mtp == 4){

    ?>

    <section class="confir">
    <div class="containerweb">
    <h1 class="titu">ten en cuenta estos datos:</h1>
   
    <h2 class="orderid">tu numero de orden es: #<?php echo $ido; ?></h2>    
    <h2 class="orderid">el valor a pagar  es: $<?php echo number_format( $vlr); ?></h2>
    <h2 class="subtitu"></h2>
    <p class="parrafo">ten a la mano los datos atenriores para realizar tu pago<br>una vez terminado el proceso te redireccionaremos

    a la pagina incial</p>
    <p class="parrafo">a tu correo llegara toda la informacion de tus pagos y compra</p>
     
    <p class="parrafo">
    <a href="https://www.avalpaycenter.com/wps/portal/portal-de-pagos/web/ventanilla-pagos/realizar-pago?idConv=00015298">
    <img src="img/btn.png" alt="" style="width:350px;height:auto;">
    </a>
    </p>
  
    <h2 class="subtitu">estas cada vez mas cerca de tus sueños</h2>
<div class="contpie">
    

</div>
    </div>

</section>
<?php
}



else{
    $fecha= date('Ymd');


    $consulta = $db -> query ("SELECT orders.id, customers.identificacion_cliente, bonos.valor, bonos.codigo, customers.name, orders.total_price, customers.email, customers.phone, orders.bono_id 
    FROM orders, customers, bonos 
    WHERE orders.id=$ido
    AND orders.customer_id = customers.id
    AND orders.bono_id = bonos.id_bono  ");
    while ($resultado = mysqli_fetch_array($consulta)){
     
   
     $vlr= $resultado['total_price'];
     $nombre = $resultado['name'];
     $telefono = $resultado['phone'];
     $correo = $resultado['email'];
     $vlrbono = $resultado['valor'];
     $codigobono = $resultado['codigo'];
     $idbono = $resultado['bono_id'];
    
    
    }

    $valorapagar= $vlr - $vlrbono;



    $to = 'contabilidad@invercomes.com.co';

    //remitente del correo
    $from = 'pedidos@invercomes.com.co';
    $fromName = 'Invercomes Marketplace';
    
    //Asunto del email
    $subject = 'Orden De Compra #: '.$ido; 
    
    //Ruta del archivo adjunto
    $file = "img/Logo-Invercomes-Horizontal.png";
    
    //Contenido del Email
    $htmlContent = '<h1>Orden de compra #: '.$ido.'</h1>
        <h2>Se ha redimido el bono '.$idbono.' por un valor de: '.number_format($vlrbono).'</h2>
                <p>Se ha generado la orden de compra #: '.$ido.'  </p>
        <p>a nombre de: '.$nombre.'</p>
        <p>el valor de la compra es: $ '.number_format($vlr).'</p>
        <p>el excedente a pagar es: $ '.number_format($valorapagar).'</p>
        <p>el telefono del cliente es: '.$telefono.'</p>
        <p>el correo del cliente es: '.$correo.'</p>

        <p>Cordialmente</p>
        <br>
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


//correo informativo al cliente


$to = ''.$correo.'';

//remitente del correo
$from = 'pedidos@invercomes.com.co';
$fromName = 'Invercomes Marketplace';

//Asunto del email
$subject = 'Orden De Compra #: '.$ido; 

//Ruta del archivo adjunto
$file = "img/Logo-Invercomes-Horizontal.png";

//Contenido del Email
$htmlContent = '<h1>Orden de compra #: '.$ido.'</h1>
    <h2>Se ha redimido el bono '.$idbono.' por un valor de: '.number_format($vlrbono).'</h2>
           
    <p>acercate al punto gana gana mas cercano y entrega al asesor estos datos:  </p>
    <p> orden de compra #: '.$ido.'  </p>
    <p>el valor a pagar es: $ '.number_format($valorapagar).'</p>
    <p>valida el total a pagar concuerde con el descrito en este correo</p>

    <p>Cordialmente</p>
    <br>
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


<section class="confir">
    <div class="containerweb">
    <h1 class="titu">Felicitaciones!!!</h1>
    <h2 class="orderid">tu numero de orden es: #<?php echo $ido; ?></h2>    
    
    
    <p class="parrafo">Acercate a tu punto Gana-Gana mas cercano  y Entregale al asesor Tu numero de orden 
        junto al valor a cancelar $<?php  echo number_format( $valorapagar) ?> . y espera tu pedido que se encuentra en camino.</p>
        <p class="parrafo">has redimido tu bono con el codigo: <?php echo $codigobono ?> por un valor de: 
        $<?php  echo number_format( $vlrbono) ?>
      </p>

 
    <p class="parrafo"> <img src="img/logo-ganagana-amarillo-2.png" alt="" style="width:150px;height:auto;">  </p>
    <h2 class="subtitu">estas cada vez mas cerca de tus sueños</h2>
<div class="contpie">
    <a href="index.php" class="btn">inicio</a>


</div>
    </div>
</section>


<?php
}
}
}






  
?>


</main>



<?php
include'footer.php';
?>


</body>




</html>

