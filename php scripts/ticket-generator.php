<?php
require_once '../vendor/autoload.php'; // Ruta al archivo autoload.php de Composer
use TCPDF;

// Crear una instancia de TCPDF
//$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf = new TCPDF('P', 'mm', [58, 180]);

//$pdf->setpage(58, 0);
// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Dante Castelán Carpinteyro');
$pdf->SetTitle('Ticket de Venta (XXXXXXXXXX)');
$pdf->SetMargins(3, 2, 3);
$pdf->SetFont('Helvetica', '', 5);

// Agregar una página
$pdf->AddPage();

// HTML para el ticket con diseño de Bootstrap

/*$html = ('
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <title>Ticket de Venta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .ticket {
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
        }
        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .items {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .item {
            margin-bottom: 5px;
        }
        p {
            font-size: 7px;
            line-height: 1.1;
        }
    </style>
</head>
<body>
    <div class="ticket" style="text-align: center;">
        <div class="header" style="padding: 25%;">
            <h1>Comercial: Castelán Carpinteyro</h1>
            <h2>Ticket de Venta</h2>
            <p>Domicilio de Ejemplo No. 1, en la Calle Algo Así, Barrio Inexistente.</p>
            <p>C.P.: 00000. Ciudad Actual, Estado Impreso.</p>
            <p>Fecha: 24 de diciembre de 2023</p>
            <p>Vendedor: Dante Castelán Carpinteyro</p>
        </div>
        <table style="width: 100%;">
            <tr>
                <th style="width: 10%;">ID</th>
                <th style="width: 53%;">Descripción / Precio</th>
    
                <th style="width: 15%;">Cant.</th>
                <th style="width: 20%;">Subtotal</th>
            </tr>
            <tr>
                <td style="width: 10%;">5</td>
                <td style="width: 53%;">Avión de Pasajeros Playmobil / ($671.00 MXN)</td>
                <td style="width: 15%;">1</td>
                <td style="width: 20%;">$671</td>
            </tr>
        </table>

        <p>Total: $30</p>
        <p>Gracias por su compra</p>
        <hr>
    </div>
</body>
</html>
');
*/

$html = '
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <title>Ticket de Venta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .ticket {
            border: 1px solid #ccc;
            padding: 5mm;
            width: 90%;
            margin-left: 5%;
            margin-right: 5%;
        }
        .header, .container {
            text-align: center;
            margin-bottom: 5mm;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 3mm;
        }
        p {
            font-size: 3mm;
            line-height: 1.1;
            margin: 1mm 0;
        }
        .super-center {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .width-1 {
            width: 10%;
        }
        .width-2 {
            width: 50%;
        }
        .width-3 {
            width: 20%;
        }
        .width-4 {
            width: 20%;
        }
        th {
            font-size: 2mm !important;
        }
        td {
            font-size: 2.8mm !important;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <h1>Comercial: Castelán Carpinteyro</h1>
            <h2>Ticket de Venta</h2>
            <p>Domicilio de Ejemplo No. 1, en la Calle Algo Así, Barrio Inexistente.</p>
            <p>C.P.: 00000. Ciudad Actual, Estado Impreso.</p>
            <p>Fecha: 24 de diciembre de 2023</p>
            <p>Vendedor: Dante Castelán Carpinteyro</p>
        </div>
        <div class="container">
            <table>
                <tr>
                    <th class="width-1 super-center">ID</th>
                    <th class="width-2 super-center">Descripción / Precio</th>
                    <th class="width-3 super-center">Cant.</th>
                    <th class="width-4 super-center">Subtotal</th>
                </tr>
                <tr>
                    <td class="width-1 super-center">5</td>
                    <td class="width-2 super-center">Avión de Pasajeros Playmobil / ($671.00 MXN)</td>
                    <td class="width-3 super-center">1</td>
                    <td class="width-4 super-center">$671</td>
                </tr>
            </table>

            <p>Total: $30</p>
            <p>Gracias por su compra</p>
        </div>
    </div>
</body>
</html>
';

// Agregar el HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y mostrarlo en el navegador
$pdf->Output('ticket.pdf', 'I');
