<?php
session_start();
if (!isset($_SESSION['ticket']['address'])) {
    $city = "Zacatlán, Puebla, México.";
    $cp = "C.P.: 73310. ";
    $address = "Privada de Josefa Ortiz de Domínguez, Cuautilulco.";
}

$transaction = $_SESSION['ticket']['transaction_id']; // Sustituir por dato de $_SESSION cuando dinamismo avance
include "barcode-generator.php";
include "functions.php";
require_once '../vendor/autoload.php'; // Ruta al archivo autoload.php de Composer
use TCPDF;

// Crear una instancia de TCPDF
//$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf = new TCPDF('P', 'mm', [58, 230]);

//$pdf->setpage(58, 0);
// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Dante Castelán Carpinteyro');
$pdf->SetTitle('Ticket de Venta (' . $transaction . ')');
$pdf->SetMargins(2.5, 1.5, 2.5);
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
            width: 15%;
        }
        .width-2 {
            width: 45%;
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
            <p>' . $address . '</p>
            <p>' . $cp . ' ' . $city . '</p>
            <p>Fecha: ' . fecha() . '</p>
            <p>Vendedor: Dante Castelán Carpinteyro</p>
        </div>
        <div class="container">
            ' .
    $_SESSION['ticket']['html']
    . '<p>Artículos: (' . $_SESSION['ticket']['totals'][1] . ')</p><p>Total: $' . $_SESSION['ticket']['totals'][0] . '</p>
            <p style="margin-bottom: 0px; padding-bottom: 1mm;">Referencia de operación:</p>
            <img style="width: 40mm;" src="' . barcode_src_generator($generator, $transaction) . '">
            <p>Gracias por su compra</p>
        </div>
    </div>
</body>
</html>
');

// Agregar el HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y guardar en una ruta específica
//$pdf->Output('tickets/digital-ticket-' . $transaction . '.pdf', 'F');

// Generar el PDF y mostrarlo en el navegador
$pdf->Output('ticket.pdf', 'FI');
//file()
