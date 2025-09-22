<?php
// Include the main TCPDF library (search for installation path).
require_once('../app/TCPDF-main/tcpdf.php');
include '../app/config.php';
include '../app/controllers/ventas/literal.php';


session_start();
if(isset($_SESSION['sesion_email'])){
 //echo "existe la sesion". $_SESSION['sesion_email']  ;
 $email_sesion =$_SESSION['sesion_email'];
 $sql = "SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol 
 FROM tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol WHERE email='$email_sesion'";
 $query= $pdo->prepare($sql);
 $query->execute();
 $usuarios=$query->fetchAll(PDO::FETCH_ASSOC);
 foreach($usuarios as $usuario){
    $id_usuario_sesion =$usuario['id_usuario']; 
     $nombres_sesion =$usuario['nombres'];
     $rol_sesion =$usuario['rol'];
 }
}else{
 echo "no existe la sesion";
 header('location: '.$URL.'/login');
}

$id_venta_get = $_GET['id_venta'];
$nro_venta_get = $_GET['nro_venta'];

$sql_ventas = "SELECT *, cli.nombre_cliente as nombre_cliente, cli.nit_ci_cliente as nit_ci_cliente
            FROM tb_ventas as ve inner join tb_clientes as cli on cli.id_cliente= ve.id_cliente where ve.id_venta='$id_venta_get'";
$query_ventas= $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos=$query_ventas->fetchAll(PDO::FETCH_ASSOC);

foreach($ventas_datos as $ventas_dato){
   $fyh_creacion = $ventas_dato['fyh_creacion'];
   $nit_ci_cliente = $ventas_dato['nit_ci_cliente'];
   $nombre_cliente = $ventas_dato['nombre_cliente'];
   $total_pagado = $ventas_dato['total_pagado'];
}
//convierte precio total a literal
$monto_literal = numtoletras($total_pagado);

$fecha = date("d/m/y",strtotime($fyh_creacion));


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215,279), true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Adrian Sysventas');
$pdf->SetTitle('factura de venta');
$pdf->SetSubject('factura de venta');
$pdf->SetKeywords('factura de venta');

// set default header data
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(15, 15, 15);


// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

$pdf->SetFont('Helvetica', '', 12);

$imagePath = realpath(__DIR__ . '/../public/images/logo.jpg');

if ($imagePath && file_exists($imagePath)) {
    if (is_readable($imagePath)) {
        $pdf->Image($imagePath, 10, 10, 50, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    } else {
        $pdf->Cell(0, 10, 'El archivo no es legible.', 0, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, 'No se encontró la imagen', 0, 1, 'C');
}
// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();


$html = '
<table border="0" style="font-size: 10px">
    <tr>
        <td style="text-align: center;width: 230px">
            <img src="' . $imagePath . '" width="80px" alt=""> <br><br>
            <B>SISTEMA DE VENTAS SYSVENTAS</B><br>
            zona alto lima 1ra seccion Av. Litoral #231 <br>
            9558715- 9885478<br>
            Arequipa - Peru
        </td>
        <td style="width: 150px"></td>
            <td style="font-size: 16px; width: 290px "><br><br><br><br>
                <B>NIT: </B> 100001254 <br>
                <B>Nro de factura: </B> '.$id_venta_get.' <br>
                <B>Nro de autorizacion: </B>100001254
                <p><b style="text-align: center">ORIGINAL</b></p>
            </td>
    </tr>

</table>

<p style="text-align: center; font-size: 25px"><b>FACTURA</b></p>

<div style="border: 1px solid #000000">
<table border="0" cellspacing="6">
<tr>
    <td><b>Fecha:</b>'.$fecha.'</td>
    <td></td>
    <td><b>Nit/CI:</b> '.$nit_ci_cliente.'</td>
</tr>
<tr>
    <td colspan="3"><b>Señor(es):</b>'.$nombre_cliente.'</td>
</tr>
</table>
</div>

<br><br>
<table border="1" cellpadding="5" style="font-size: 12px">
    <tr style="text-align: center;background-color: #d6d6d6">
        <th style="width: 40px"><b>Nro</b></th>
        <th style="width: 150px"><b>Producto</b></th>
        <th style="width: 235px"><b>Descripcion</b></th>
        <th style="width: 65px"><b>Cantidad</b></th>
        <th style="width: 98px"><b>Precio Unitario</b></th>
        <th style="width: 69px"><b>Sub total</b></th>
    </tr>

';
$contador_de_carrito = 0;
$cantidad_total = 0;
$precio_unitario_total = 0;
$precio_total = 0;


$sql_carrito = "SELECT *, pro.nombre as nombre_producto, pro.descripcion as descripcion, pro.precio_venta as precio_venta, 
pro.stock as stock, pro.id_producto as id_producto 
from tb_carrito  as car  INNER JOIN tb_almacen as pro ON car.id_producto = pro.id_producto
where nro_venta= '$nro_venta_get;' order by id_carrito ";
$query_carrito= $pdo->prepare($sql_carrito);
$query_carrito->execute();
$carrito_datos=$query_carrito->fetchAll(PDO::FETCH_ASSOC);
foreach($carrito_datos as $carrito_dato) {
    $id_carrito = $carrito_dato['id_carrito'];
    $contador_de_carrito = $contador_de_carrito + 1; 
    $cantidad_total = $cantidad_total + $carrito_dato['cantidad'];
    $precio_unitario_total =$precio_unitario_total + floatval($carrito_dato['precio_venta']);
    $subtotal = $carrito_dato['cantidad'] * $carrito_dato['precio_venta'];
    $precio_total = $precio_total + $subtotal;

$html .='
<tr>
    <td style="text-align: center">'.$contador_de_carrito.'</td>
    <td>'.$carrito_dato['nombre_producto'].'</td>
    <td>'.$carrito_dato['descripcion'].'</td>
    <td style="text-align: center">'.$carrito_dato['cantidad'].'</td>
    <td style="text-align: center">S/.'.$carrito_dato['precio_venta'].'</td>
    <td style="text-align: center">'.$subtotal.'</td>
</tr>
';

}
$html .='
    
    <tr style="text-align: center;background-color: #d6d6d6">
        <td colspan="3" style="text-align: right"><b>Total</b></td>
        <td style="text-align: center;background-color: #d6d6d6">'.$cantidad_total.'</td>
        <td style="text-align: center;background-color: #d6d6d6">S/.'.$precio_unitario_total.'</td>
        <td style="text-align: center;background-color: #d6d6d6">S/.'.$precio_total.'</td>
    </tr>
</table>

<P style="text-align: right">
    <b>Monto total: </b>S/. '.$precio_total.'
</P>
<P>
    <b>Son: </b>'.$monto_literal.'
</P>
<br>
---------------------------------------------------- <br>
<b>USUARIO: </b>'.$nombres_sesion.' <br>

<p style="text-align: center">"ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS, EL USO ILICITO DE ESTA SERA SANCIONADO DEACUERDO A LA LEY</p>
<P style="text-align: center"><b>GRACIAS POR SU PREFERENCIA</b></P>
';




$pdf->writeHTML($html, true,false,true,false,'');


$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1,
    'module_heigth' => 1
);

$QR = 'Factura realizada por el sistema de ventas de Adrian, al cliente '.$nombre_cliente.' con Nit/CI : '.$nit_ci_cliente.'
 en Fecha:  '.$fecha.' con el monto total de '.$precio_total.'';

$pdf ->write2DBarcode($QR,'QRCODE,L',170,240,40,40,$style);




// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');
echo "Ruta de la imagen: $imagePath<br>";
if (is_readable($imagePath)) {
    echo "El archivo es legible.<br>";
} else {
    echo "El archivo no es legible.<br>";
}

//============================================================+
// END OF FILE
//============================================================+