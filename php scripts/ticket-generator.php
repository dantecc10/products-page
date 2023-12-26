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
$html = '
    <div class="container">
        <div class="row d-flex justify-content-end">
            <div class="col-md-6">
                <h2>Ticket de Compra</h2>
                <p>Detalles de la compra:</p>
                <ul>
                    <li>Producto 1: $10</li>
                    <li>Producto 2: $20</li>
                    <!-- ... Otros productos -->
                </ul>
                <p>Total: $30</p>
            </div>
        </div>
    </div>
';

// Agregar el HTML al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Generar el PDF y mostrarlo en el navegador
$pdf->Output('ticket.pdf', 'I');
