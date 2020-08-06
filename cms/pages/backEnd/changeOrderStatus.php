<?php session_start();
$orderID = $_POST['orderId'];
include '../../../pages/bdConnect.php';
$dbname = $hostingName."sitelia";
$conn = new mysqli($servername, $username, $serverpassword , $dbname);
$sql = "UPDATE orders SET status ='Completed' WHERE id='$orderID'";
$conn->query($sql);
