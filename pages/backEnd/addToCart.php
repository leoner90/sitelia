<?php session_start();
 include "../productClass.php";
if(!isset($_SESSION['i'])) {
	$i = 0;
	$_SESSION['i'] = 0;
} else {
	$_SESSION['i']++;
  //just for better understanding
  $i = $_SESSION['i'];
}
$product = new productClass();
$product->id = $_POST['id'];
$product->color = $_POST['color'];
$product->quantity = $_POST['quantity'];
$_SESSION['product'][$i] = serialize($product);
