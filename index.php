<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>S&S</title>
  <link rel="shortcut icon" type="image/png" href="img/logo/favicon.ico">
  <!-- OMNIVIA FOR CHECKOUT ADDRESS   -->
  <script type="text/javascript" src="lib/omnivia.js"> </script>
  <!--JQUERY / BOOTSTRAP JS    -->
  <script src="lib/jquery-3.2.1.min.js"></script>
  <script src="lib/bootstrap.min.js"></script>
  <!--CSS -->
	<link rel="stylesheet" type="text/css" href="lib/bootstrap.3.3.7.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!--HEADER-->
<div class=" headbar">
  <a href="#main">
    <img src="img/logo/logo.png" class="logo"/>
  </a>
  <ul class="menu">
    <li><a href="#main"> HOME</a></li>
    <li><a href="#cart">Checkout</a></li>
  </ul>
</div>
<!--SLOGAN-->
<div class="slogan-headbar">
  <a href="#">
    <img class="sloganlogo" src="img/logo/sloganlogo.png" />
    <span class="brand-name" >STOP & SHOP</span>
  </a>
  <p class="slogan">The best shopping experience.....</p>
  <hr>
</div>
<!--MAIN CONTENT-->
<div class="content-wrapper" >
  <div id="content">
		<!--MAIN CONTENT GOES HERE USING AJAX -->
	</div>
  <footer> <p class="timestamp">&copy; 2020</p> </footer>
</div>
<!--MY SCRIPTS-->
<script src="myScript.js"></script>
</body>
</html>
