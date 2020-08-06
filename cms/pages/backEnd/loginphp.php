<?php session_start();
//HASH GENERATOR
function generateCode($length=6) {
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
  $code = "";
  $clen = strlen($chars) - 1;  
  while (strlen($code) < 6) {
    $code .= $chars[mt_rand(0,$clen)];  
  }
  return $code;
}
//GET INPUT FIELD VALUE
$login = trim($_POST['login']," ");
$login = htmlspecialchars($login);
$login = stripslashes($login);
$passwords = $_POST['password'];
$passwords = htmlspecialchars($passwords);
$passwords = stripslashes($passwords);
//CHECK USER EXISTENCE
include '../../../pages/bdConnect.php';
$dbname = $hostingName."sitelia";
$passwords = md5($passwords);
$conn = new mysqli($servername, $username, $serverpassword , $dbname);
$sql = "SELECT  login , password , id  FROM users WHERE login='$login'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($row['login'] == $login and  $row['password'] == $passwords )  {
	$hash = md5(generateCode(10));
	$id = $row["id"];
	$sql2 = "UPDATE users SET hash ='$hash' WHERE id='$id'";
	$conn->query($sql2);
	$conn->close();
	$_SESSION['hash'] = $hash;
	$_SESSION['id'] = $row['id'] ;
} else {
	$errors = json_encode("ERROR");
	echo $errors;
}
