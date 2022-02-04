<?php
session_start();
require('fpdf.php');
$fecha = date(' d / m / y');
$ido = $_GET['ido'];
/********************************************************************************************
 
MODULO: Remision de Pedidos  
PROGRAMA: RemisionPDF.php
Se creo un documento PDF utilizando la libreria FPDF http://www.fpdf.org/
para generar las remisiones de los pedidos de compra segun los pedidos remitidos.
la informacion del documento se envia mediante el metodo GET y se realiza una
consulta SQL y ciclos wile para mostrar la informacion de los pedidos.
DIRIGIDO: El documento y el programa se relizo bajo la supervision del 
Ingeniero y director en Tics:  Ivan Dario Franco
DESARROLLADOR POR : Jhon Fredy Herrera F.
cARGO: Tecnologo  en (ADSI)

**********************************************************************************************/


class PDF extends FPDF

{
//**********************************  cabecera de página *****************************************/
function Header()
{
    //***********************************  Logo *************/
    
    $this->Image('invercomesimg.png',10,-11,50);
    //************************** Arial bold 15  ************//
    $this->SetFont('Arial','B',10);
    //***************************************  Movernos a la derecha **************//
    $this->cell(50);
    //***********************************  Título  *******************************//
   
    $this->cell(180,1,'INVERSIONES Y COMERCIALIZACIONES S.A.S ',0,1,'C');
    $this->SetXY(130,16);
    $this->cell(180,1,'NIT: 900.897.355-3 ',0,2,'c');
    $this->SetXY(57,22);
    $this->cell(180,1, utf8_decode('CALLE 10 N° 3-56 BARRIO CENTRO-IBAGUE'),0,3,'C');
    require'../funcionesphp/conex.php';

   

    
    //********************************  Salto de línea *********************************//
    $this->Ln(30);
}

//***************************************  Pie de página *************************************************/
function Footer()
{
//******************  Posición: a 1,5 cm del final ***********************************************//
    $this->SetY(-15);
//********************************************** Arial italic 8 **********************************//
    $this->SetFont('Arial','I',8);
//***************************************** Número de página  ************************************//
    $this->Cell(0,10,utf8_decode('Page ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require'../funcionesphp/conex.php';
$consul = "SELECT tipo_identificacion.nombre, customers.identificacion_cliente, customers.name, 
customers.phone, customers.address, municipios.municipio,
departamentos.departamento, customers.email,metodopago.nombre_metodo,orders.id
FROM orders, customers, tipo_identificacion, municipios, departamentos,metodopago 
WHERE orders.customer_id = customers.id
AND customers.departamento_id = departamentos.id_departamento
AND customers.ciudad_id = municipios.id_municipio
AND customers.Tipo_identificacion_id = tipo_identificacion.id_tipo_identificacion 
AND metodopago.id_metodo = metodo_pago
AND orders.id = $ido ";
$resultdo = mysqli_query($db,$consul);


$pdf = new PDF();
/*********************************** PARA MOSTRAR EL NUMERO DE PAGINAS *************************************************/
$pdf -> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
/************************* tablas de pedido y datos del cliente con las fechas ***************************************************/
while($row = $resultdo->fetch_assoc()){
    $pdf->SetXY(120,38);
    $pdf->cell(40,10,utf8_decode('N° Pedido: '), 1,7,'C',0,0);
    $pdf->SetXY(160,38);
    $pdf->cell(38,10,utf8_decode( $row['id']), 1,8,'C',0,0);
    $pdf->SetXY(120,48);
    $pdf->cell(40,10,utf8_decode('Fecha de Remision: '), 1,10,'C',0,0);
    $pdf->SetXY(160,48);
    $pdf->cell(38,10, $fecha, 1,11,'C',0,0 );
    $pdf->SetXY(120,58);
    $pdf->cell(30,10, 'Fragil:  ', 1,12,'C',0,0 );
    $pdf->SetXY(150,58);
    $pdf->cell(48,10,'         SI                     NO          ', 1,12,'C',0,0 );
    $pdf->SetXY(163,61);
    $pdf->cell(3,3, '', 1,11,'C',0,0 );
    $pdf->SetXY(190,61);
    $pdf->cell(3,3, '', 1,11,'C',0,0 );
    $pdf->SetXY(10,35);
    $pdf->cell(50,10,'Cliente:  '.utf8_decode($row['name']), 0,3,'',0,0 );
    $pdf->SetXY(10,40);
    $pdf->cell(60,12,'Direcion:  '.utf8_decode($row['address']), 0,2,'',0,0 );
    $pdf->SetXY(10,45);
    $pdf->cell(60,12,'Numero Telefono:  '. $row['phone'], 0,3,'',0,0 );
    $pdf->SetXY(10,50);
    $pdf->cell(60,12, 'Medio de Pago:  '.$row['nombre_metodo'], 0,4,'',0,0 );
    $pdf->SetXY(10,55);
    $pdf->cell(60,12,'E - mail:  ' .$row['email'], 0,5,'',0,0 );
    $pdf->SetXY(10,60);
    $pdf->cell(60,12,utf8_decode('ciudad:  '. $row['municipio']), 0,6,'',0,0 );

    /************** TABLA INFERIOR DE LA DEScRIPcION Y LA cANTIDAD *************************************/

    $pdf->SetXY(25,85);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(30,5,utf8_decode('SKU'), 1,7,'C',0,0);
    $pdf->SetXY(25,90);
    $consulta = $db -> query (" SELECT * FROM order_items, products 
    WHERE order_items.order_id = $ido
    AND order_items.product_id = products.id "  );
    while ($resultado = mysqli_fetch_array($consulta)){
    
        $pdf->cell(30,5,utf8_decode($resultado['referencia_proveedor']), 0,7,'C',0,0);
        $pdf->cell(30,5,'           ', 0,7,'c',0,0);
    }
    

/****************************************** DEScRIPcION ******************************************************/

$pdf->SetXY(55,85);
    $pdf->cell(90,5,utf8_decode('DESCRIPCION '), 1,0,'C',0,0);
    $pdf->SetXY(50,90);
    $consulta = $db -> query (" SELECT * FROM order_items, products 
WHERE order_items.order_id = $ido
AND order_items.product_id = products.id "  );
while ($resultado = mysqli_fetch_array($consulta))
{
    $pdf->SetFont('Arial','',9);
    /* $pdf->SetY(90);*/
     $pdf->setX(55); /* Set 20 Eje Y */
    
    $pdf->Multicell(90,4,utf8_decode($resultado['name']),0,'',0);
    $pdf->Multicell(90,4,'       ',0,'',0);
   
    
  
}
   

    /******************************* cANTIDAD *************************************************/
    $pdf->SetXY(145,85);
    $pdf->cell(20,5,utf8_decode('CANTIDAD'), 1,0,'C',0,0);
    $pdf->SetXY(145,90);
    $consulta = $db -> query (" SELECT * FROM order_items, products 
WHERE order_items.order_id = $ido
AND order_items.product_id = products.id "  );
while ($resultado = mysqli_fetch_array($consulta))
{

    $pdf->cell(20,5,utf8_decode($resultado['quantity']), 0,7,'C',0,0);
    $pdf->cell(20,5,'          ', 0,7,'c',0,0);
}
   
    $pdf->SetXY(20,150);
    $pdf->cell(155,5,utf8_decode('En constancia firmo que recibo los productos comprados segun el numero de pedido '), 0,7,'',0,0);
    $pdf->SetXY(30,165);
    $pdf->cell(155,5,utf8_decode('FIRMA:  '), 0,7,'',0,0);
}
$sq = $db -> query ("SELECT * FROM usr_admin WHERE  identificacion = $_SESSION[usr]");
while($firmar = mysqli_fetch_array($sq))
{
    


$pdf->SetXY(30,100);
$pdf->Line(30,195, 100,195);
$pdf->SetXY(30,198);
    $pdf->cell(155,5,'ENTREGADO POR', 0,7,'',0,0);
    $pdf->SetXY(30,205);
    $pdf->cell(155,5,utf8_decode('NOMBRE: '.$firmar['nombre']), 0,7,'',0,0);
    $pdf->SetXY(30,210);
    $pdf->cell(155,5,utf8_decode('CEDULA: '.$firmar['identificacion']), 0,7,'',0,0);
    $pdf->SetXY(30,215);
    $pdf->cell(155,5,utf8_decode('TELEFONO: ' .$firmar['telefono']), 0,7,'',0,0);
}

    $pdf->SetXY(150,182);
    $pdf->Line(200,195,120,195);
    $pdf->SetXY(120,198);
    $pdf->cell(155,5,utf8_decode('RECIBIDO POR '), 0,7,'',0,0);
    $pdf->SetXY(120,205);
    $pdf->cell(155,5,utf8_decode('NOMBRE: '), 0,7,'',0,0);
    $pdf->SetXY(120,210);
    $pdf->cell(155,5,utf8_decode('CEDULA: '), 0,7,'',0,0);
    $pdf->SetXY(120,215);
    $pdf->cell(155,5,utf8_decode('TELEFONO: '), 0,7,'',0,0);
$pdf->Output();


?>