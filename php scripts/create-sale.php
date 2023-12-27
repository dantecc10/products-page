<?php

use FontLib\Table\Type\head;

session_start();
if ($_POST['payment-method'] !== '3') {
    // El método de pago seleccionado no es PayPal
    $_SESSION['sale']['payment'] = $_POST['payment-method'];
    $_SESSION['sale']['payment']['digital-ticket'] = (isset($_POST['digital-ticket-checkbox'])) ? true : false;
    $_SESSION['sale']['payment']['printed-ticket'] = (isset($_POST['printed-ticket-checkbox'])) ? true : false;
    if ($_SESSION['sale']['payment']['digital-ticket']) {
        $_SESSION['sale']['payment']['customer-email'] = $_POST['customer-email-input'];
    }
} else {
    //El método de pago seleccionado fue PayPal, iniciar configuración
    // This is not God's
}

header("Location: ../php scripts/sell-cart.php"); // Debug dir

