<?php
session_start();
if(isset($_SESSION["loged_in"])){
    header("Location: articles.php");
}else{
    header("Location: login.php");
}
?>