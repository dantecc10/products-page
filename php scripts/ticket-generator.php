<?php
require_once '../vendor/autoload.php'; // Ruta al archivo autoload.php de Composer
use TCPDF;

// Crear una instancia de TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Establecer información del documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Author');
$pdf->SetTitle('Ticket');
$pdf->SetMargins(10, 10, 10);
$pdf->SetFont('Helvetica', '', 12);

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

$html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DESC</th>
                    <th>PRECIO</th>
                    <th>UDS.</th>
                    <th>SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>13</td>
                    <td>AVIÓN PASAJEROS PLAYMOBIL</td>
                    <td>$671</td>
                    <td>1</td>
                    <td>$671</td>
                </tr>
            </tbody
            <tfooter>
                <td>ID</td>
                <td>DESC</td>
                <td>PRECIO</td>
                <td>UDS.</td>
                <td>SUBTOTAL</td>
            </tfooter>
        </table>
    </body>
    </html>
';

// Agregar el HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y mostrarlo en el navegador
$pdf->Output('ticket.pdf', 'I');
