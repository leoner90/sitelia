<?php session_start();
$index = $_POST['index'];
//save iteration , but miss emptied (deleted) orders
$_SESSION['product'][$index] = "";
