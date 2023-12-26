<?php
require_once '../vendor/autoload.php'; // Ruta al archivo autoload.php de Composer
use TCPDF;

// Crear una instancia de TCPDF
//$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf = new TCPDF('P', 'mm', [58, 100]);

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

$html = '
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
        <table style="width: 95%;">
            <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 53%;">Descripción / Precio</th>
    
                <th style="width: 15%;">Cant.</th>
                <th style="width: 20%;">Subtotal</th>
            </tr>
            <tr>
                <td style="width: 5%;">5</td>
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
';

// Agregar el HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y mostrarlo en el navegador
$pdf->Output('ticket.pdf', 'I');
