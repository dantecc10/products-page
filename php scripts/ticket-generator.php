<?php
include "barcode-generator.php";
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

$html = ('
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
            width: 100%;
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
            vertical-align: middle;
        }

        .width-1 {
            width: 10%;
        }
        .width-2 {
            width: 50%;
        }
        .width-3 {
            width: 18%;
        }
        .width-4 {
            width: 22%;
        }
        fs-mm {
            font-size: 2.8mm !important;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <img src="../assets/img/branding/logo.jpeg" alt="Logo" width="15mm" style="padding: 0mm;">
            <h1 style="font-size: 5mm">Comercial: Castelán Carpinteyro</h1>
            <h2 style="font-size: 5mm">Ticket de Venta</h2>
            <p>Domicilio de Ejemplo No. 1, en la Calle Algo Así, Barrio Inexistente.</p>
            <p>C.P.: 00000. Ciudad Actual, Estado Impreso.</p>
            <p>Fecha: '. date('r', null) .'</p>
            <p>Vendedor: Dante Castelán Carpinteyro</p>
        </div>
        <div class="container">
            <table>
                <tr>
                    <th style="font-size: 2.8mm;" class="width-1 fs-mm super-center">ID</th>
                    <th style="font-size: 2.8mm;" class="width-2 fs-mm super-center">Descripción / Precio</th>
                    <th style="font-size: 2.8mm;" class="width-3 fs-mm super-center">Cant.</th>
                    <th style="font-size: 2.5mm;" class="width-4 fs-mm super-center">Subtotal</th>
                </tr>
                <tr>
                    <td style="font-size: 3mm; vertical-align: middle" class="width-1 fs-mm super-center">5</td>
                    <td style="font-size: 3mm; vertical-align: middle" class="width-2 fs-mm super-center">Avión de Pasajeros Playmobil / ($671.00 MXN)</td>
                    <td style="font-size: 3mm; vertical-align: middle" class="width-3 fs-mm super-center">1</td>
                    <td style="font-size: 3mm; vertical-align: middle" class="width-4 fs-mm super-center">$671</td>
                </tr>
            </table>

            <p>Total: $30</p>
            <p style="margin-bottom: 0px; padding-bottom: 1mm;">Referencia de operación:</p>
            <img style="width: 40mm;" src="' . barcode_src_generator($generator, "4008789056818") . '">
            <p>Gracias por su compra</p>
        </div>
    </div>
</body>
</html>
');

// Agregar el HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y mostrarlo en el navegador
$pdf->Output('ticket.pdf', 'I');
