<?php
session_start();
if ($_POST['payment-method'] !== '3') {
    // El método de pago seleccionado no es PayPal
    $_SESSION['sale']['method'] = $_POST['payment-method'];
    //$_SESSION['sale']['digital-ticket'] = (isset($_POST['digital-ticket-checkbox'])) ? true : false;
    if (isset($_POST['digital-ticket-checkbox'])) {
        $_SESSION['sale']['digital-ticket'] = true;
        
    }else{
        $_SESSION['sale']['digital-ticket'] = false;
    }
    if (isset($_POST['printed-ticket-checkbox'])) {
        $_SESSION['sale']['printed-ticket'] = true;
    }else{
        $_SESSION['sale']['printed-ticket'] = false;
    }
    if ($_SESSION['sale']['digital-ticket']) {
        $_SESSION['sale']['customer-email'] = $_POST['customer-email-input'];
    }
} else {
    //El método de pago seleccionado fue PayPal, iniciar configuración
    // This is not God's
}

header("Location: ../php-scripts/sell-cart.php"); // Debug dir

