<?php
require_once '../vendor/autoload.php'; // Ruta al archivo autoload.php de Composer
use TCPDF;

// Crear una instancia de TCPDF
//$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf = new TCPDF('P', 'mm', array(58, 100));

// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Author');
$pdf->SetTitle('Ticket');
$pdf->SetMargins(5, 2, 5);
$pdf->SetFont('Helvetica', '', 3);

// Agregar una página
$pdf->AddPage();

// HTML para el ticket con diseño de Bootstrap
//$html = '
//    <!DOCTYPE html>
//    <html lang="es-MX">
//    <head>
//        <meta charset="UTF-8">
//        <meta name="viewport" content="width=device-width, initial-scale=1.0">
//        <title>Document</title>
//    </head>
//    <body>
//        <div class="container">
//            <div class="row>
//                <div class="col-md-6">
//                    <h2>Ticket de Compra</h2>
//                    <p>Detalles de la compra:</p>
//                    <ul>
//                        <li>Producto 1: $10</li>
//                        <li>Producto 2: $20</li>
//                        <!-- ... Otros productos -->
//                    </ul>
//                    <p>Total: $30</p>
//                </div>
//            </div>
//        </div>
//    </body>
//    </html>
//    
//';

$html = '<!DOCTYPE html>
<html lang="es">
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
            padding: 10px;
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
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <h2>Ticket de Venta</h2>
            <p>Fecha: 24 de diciembre de 2023</p>
        </div>
        <ul class="items">
            <li class="item">Producto 1: $10</li>
            <li class="item">Producto 2: $20</li>
            <!-- Agrega más productos según sea necesario -->
        </ul>
        <hr>
        <p>Total: $30</p>
        <p>Gracias por su compra</p>
    </div>
</body>
</html>
';

// Agregar el HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y mostrarlo en el navegador
$pdf->Output('ticket.pdf', 'I');
