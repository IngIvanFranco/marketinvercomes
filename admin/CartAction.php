<?php
session_start();
date_default_timezone_set('America/Bogota');
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;

$fecha_actual = strtotime(date("Y-m-d"));
$fecha_entrada = strtotime("2021-12-03");

$dia=date("Y-m-d");

// include database configuration file
include 'conex.php';

if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){


    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){



        $productID = $_REQUEST['id'];
        // get product details
        $query = $db->query("SELECT * FROM products WHERE id = ".$productID);
        $row = $query->fetch_assoc();


if ($fecha_actual == $fecha_entrada) { //validacion si es dia sin iva
    $precioa = (($row['price'])/((100-$row['descuento'])/100)) ;
    $descuento = ($row['descuento'])+ 19;
    $precio = $row['price']/1.19;

    if (  ($row['id_opc_subcate']== 35 && $row['price']<=1815400 && $row['id'] <> 13 && $row['id'] <> 241 && $row['id'] <> 3632 && $row['id'] <> 3605  && $row['id'] <> 3604 )
    || ($row['id_opc_subcate']== 120 || $row['id_opc_subcate']== 24 || $row['id_opc_subcate']== 25 || $row['id_opc_subcate']== 23 
    || $row['id_opc_subcate']== 28 || $row['id_opc_subcate']== 27) 
    || ($row['id']== 4927  ) 
    || ($row['id_categoriaproducts'] == 1 || $row['id_categoriaproducts'] == 3 || $row['id_categoriaproducts'] == 4 
    || $row['id_categoriaproducts'] == 6 || $row['id_categoriaproducts'] == 7 || $row['id_categoriaproducts'] == 8 
    || $row['id_categoriaproducts'] == 9 || $row['id_categoriaproducts'] == 11 || $row['id_categoriaproducts'] == 10 )
    || ($row['id_subcategoria_products'] == 2 || $row['id_subcategoria_products'] == 15  || $row['id_subcategoria_products'] == 28)
    )  {
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' =>$row['price'],
            'qty' => 1,
            'des'=> $row['descuento'],
            'tipo' => $row['id_opc_subcate'],
            'talla'=> ' ',
            'stock' => $row['stok'],
            'inventario' => $row['inventario']
        ); //productos que seguiran con iva 
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'index.php';
        header("Location: ".$redirectLoc);
    } else {
      
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $precio,
            'qty' => 1,
            'des'=> $descuento,
            'tipo' => $row['id_opc_subcate'],
            'talla'=> ' ',
            'stock' => $row['stok'],
            'inventario' => $row['inventario']
        ); // productos que tendran el descuento del iva
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'index.php';
        header("Location: ".$redirectLoc);
    

    }

   
}

   


   

else {




        if(!empty($_SESSION['sessTat']) && $row['id_proveedor_products'] == 4){// validamos si hay algun tat logueado y si el producto a agregar al carrito es de homelelemnts 
            $precio = ($row['price']) * 0.9;
            $descuento = ($row['descuento'])+ 10;

            $itemData = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'price' => $precio,
                'qty' => 1,
                'des'=> $descuento,
                'tipo' => $row['ropa_tipo'],
                'talla'=> ' ',
                'stock' => $row['stok'],
                'inventario' => $row['inventario']
            );
            
            $insertItem = $cart->insert($itemData);
            $redirectLoc = $insertItem?'viewCart.php':'index.php';
            header("Location: ".$redirectLoc);
            
        }

 else {
                         
           
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'qty' => 1,
            'des'=> $row['descuento'],
            'tipo' => $row['ropa_tipo'],
            'talla'=> ' ',
            'stock' => $row['stok'],
            'inventario' => $row['inventario']
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'viewCart.php':'index.php';
        header("Location: ".$redirectLoc);
    
    


    }

}}elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
            
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        
       echo $updateItem?'ok':'err';die;
    
    }elseif($_REQUEST['action'] == 'updateCartItemtalla' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'talla' => $_REQUEST['talla']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        $status = 4;
        $insertOrder = $db->query("INSERT INTO orders (customer_id, total_price, created, modified, status) VALUES 
        ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."','".$status."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity, precio, descuento, talla) 
                VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."','".$item['price']."','".$item['des']."','".$item['talla']."');";

               
                    $inventariosql = "UPDATE products SET stok = stok - ".$item['qty']." WHERE id = ".$item['id'].";";
              
                    $modificarinventario = $db->multi_query($inventariosql);

                    if ($item['inventario']== 1) {
                       
                        $query = $db->query("SELECT * FROM products WHERE id = '".$item['id']."'");
       
                        while($filas = $query->fetch_assoc()){  
                             if ($filas['stok'] <= 0){
                                $bajaproducsql = "UPDATE products SET status = '0' WHERE id = ".$item['id'].";";
              
                                $modificarstatus = $db->multi_query($bajaproducsql);

                                //correo informativo de que se acabo el producto en el inventario

                                $to = 'gerencia@invercomes.com.co';

                                //remitente del correo
                                $from = 'pedidos@invercomes.com.co';
                                $fromName = 'Invercomes Marketplace';
                                
                                //Asunto del email
                                $subject = 'Producto sin existencias '; 
                                
                                //Ruta del archivo adjunto
                                $file = "img/Logo-Invercomes-Horizontal.png";
                                
                                //Contenido del Email
                                $htmlContent = '<h1>Producto agotado en existencia</h1>
                                    <p>Cordial saludo</p>
                                    <p>se informa que el producto '.$filas['name'].' identificado con el id #: '.$filas['id'].' 
                                    ha agotado sus existencias con la orden de compra #: '.$orderID.'</p>
                                    <p>Cordialmente</p>
                                    <br>
                                    <p>Equipo Marketplace invercomes</p>
                                    <p>Este correo es generado automaticamente por la Marketplace de invercomes</p>
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
                                


                             }
            }
                    }
                    

            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
           
           
            if($insertOrderItems){
                $cart->destroy();
                header("Location: metodopago.php?id=$orderID");
            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}