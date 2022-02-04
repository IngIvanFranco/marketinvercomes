<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" href="css/login.css" type="text/css">
    <title>Invercomes Admon</title>
</head>
<body>
    <section class="formulario_login">
        <div class="contenedor">
        <img src="img/invercomes_icon.png" alt="" class="img_login">
        <h1>INVERCOMES S.A.S</h1>
  
            <form action="funcionesphp/login.php" method="post" class="formulario" >
             
                   
                    <input type="text" placeholder="Usuario" required name="usr" >
                    <input type="password" placeholder="Contraseña" required name="pass">
                    <input type="submit" value="Ingresar">
              
            </form>
        </div>
    </section>
    <footer>
        
    </footer>
</body>
</html>