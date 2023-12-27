<?php
session_start();
if ($_POST['payment-method'] !== '3') {
    // El método de pago seleccionado no es PayPal
    $_SESSION['sale']['payment'] = $_POST['payment-method'];
    //$_SESSION['sale']['payment']['digital-ticket'] = (isset($_POST['digital-ticket-checkbox'])) ? true : false;
    if (isset($_POST['digital-ticket-checkbox'])) {
        $_SESSION['sale']['payment']['digital-ticket'] = true;
    }else{
        $_SESSION['sale']['payment']['digital-ticket'] = false;
    }
    if (isset($_POST['printed-ticket-checkbox'])) {
        $_SESSION['sale']['payment']['printed-ticket'] = true;
    }else{
        $_SESSION['sale']['payment']['printed-ticket'] = false;
    }
    if ($_SESSION['sale']['payment']['digital-ticket']) {
        $_SESSION['sale']['payment']['customer-email'] = $_POST['customer-email-input'];
    }
} else {
    //El método de pago seleccionado fue PayPal, iniciar configuración
    // This is not God's
}

header("Location: ../php scripts/sell-cart.php"); // Debug dir

