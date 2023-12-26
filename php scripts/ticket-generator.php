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
$pdf->SetMargins(10, 10, 10);
$pdf->SetFont('Helvetica', '', 6);

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
    <html lang="es-MX">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <title>Document</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href="../assets/css/Bootstrap-Callout-Info.css">
        <link rel="stylesheet" href="../assets/css/extra.css">
    </head>
    <body>
        <style>
            th.w-5, td.w-5 {
                width: 5%; 
            }
            th.w-10, td.w-10 {
                width: 10%;          
            }
            th.w-20, td.w-20 {
                width: 20%;          
            }
            th.w-55, td.w-55 {
                width: 55%;          
            }
        </style>

        <div class="container">
            <div class="row">
                <div class="col col-6 d-flex justify-content-center" style="width: 50%;">
                    <img src="../assets/img/branding/logo.jpeg">
                </div>
                <div class="col col-6 d-flex justify-content-center" style="width: 50%;">
                    Divisor
                </div>
            </div>
            <!--<div class="row">
                <div class="col col-4">
                </div>
                <div class="col col-6">
                </div>
                <div class="col col-4">
                </div>
            </div>-->
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="w-5">ID</th>
                    <th class="w-55">DESC</th>
                    <th class="w-10">PRECIO</th>
                    <th class="w-10">UDS.</th>
                    <th class="w-20">SUBTOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-5">13</td>
                    <td class="w-55">AVIÓN PASAJEROS PLAYMOBIL</td>
                    <td class="w-10">$671</td>
                    <td class="w-10">1</td>
                    <td class="w-20">$671</td>
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
