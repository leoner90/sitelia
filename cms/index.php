<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>S&S CMS</title>
	<link rel="shortcut icon" type="image/png" href="../img/logo/favicon.ico">
	<script src="../lib/jquery-3.2.1.min.js"></script>
	<script src="../lib/bootstrap.min.js"></script>
	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap.3.3.7.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body style="background-color: transparent;">
<?php
include "pages/isUserLoggedIn.php";
if (isUserLoggedIn() == 1) { ?>
	<div class="container-fluid">
		<div class="row cms-main-row">
			<div class="col-xs-2 noprint cms-left-sidebar">
				<img src="../img/logo/logo.png" class="cms-logo"/>
				<hr class="cms-hr-divider">
				<div class="cms-nav-wrap">
					<ul class="cms-nav">
						<li>
							<span class="glyphicon glyphicon-list-alt cms-nav-glyphicons"></span>
							<a href="#orders"> ORDERS</a>
						</li>
						<li>
							<span class="glyphicon glyphicon-cog  cms-nav-glyphicons">  </span>
							<a href="#productList"> PRODUCT LIST </a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xs-10 cms-main-bar">
				<div class="noprint cms-page-header">
					<button class="btn btn-danger btn-sm log-out-btn"  onclick="logOut()">
						<span class="glyphicon glyphicon-user" ></span>
						LOGOUT
					</button>
				</div>
				<div class="cms-content">
					<!--CMS MAIN CONTENT GOES HERE USING AJAX -->
				</div>
			</div>
		</div>
	</div>
	<?php
} else { ?>
	<div class="cms-login-page">
		<div class="cms-login-form-wrapper">
			<div class="cms-login-form-body">
				<img class="cms-login-left-wing" src="../img/logo/leftwing.png"/>
				<img class="cms-login-right-wing" src="../img/logo/rightwing.png"/>
				<img class="cms-login-top-decor" src="../img/logo/top.png"/>
				<h1 class="cms-login-title"> S & S</h1>
				<form>
					<p class="cms-login-errors">* Incorect login or Password</p>
					<input class="form-control cms-login" type="text" placeholder="login"/>
					<input class="form-control cms-password" type="password" placeholder="password"/>
					<input type="submit" class="btn btn-success cms-login-btn"  value="Log In" />
				</form>
			</div>
		</div>
	</div>
	<?php
} ?>
<script src="../lib/jquery-3.2.1.min.js"></script>
<script src="../cms.js"></script>
</body>
</html>
