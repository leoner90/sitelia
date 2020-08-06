<?php session_start();
include "../isUserLoggedIn.php";
include '../../../pages/bdConnect.php';
if (isUserLoggedIn() == 1) {
	$Orderid = $_GET['ID'];
	$dbname = $hostingName."sitelia";
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);
	$sql = "SELECT * FROM orders WHERE id = $Orderid";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc() ;
	$obj = json_decode($row['orderDetails']);
	$totalSum = $row['sum'];
	$address = $row['address'];
	?>
	<p class="noprint <?php echo $row['status']?>"><?php echo $row['status']?></p>
	<?php
  if( $row['status'] == "Pending"){ ?>
		<button class="btn btn-danger noprint order-completed-btn" onclick="OrderCompleted(<?php echo $Orderid; ?>);">
			<span class="glyphicon glyphicon-ok cms-order-view-glyphicon"></span>
			MARK AS COMPLETED
		</button>
		<?php
	} ?>
	<div class="noprint text-right">
			<button onclick="print();"> <span class="glyphicon glyphicon-print"></span> PRINT PAGE</button>
	</div>
	<?php
	for ($i = 0 ; $i <sizeof($obj); $i++){
		$id = $obj[$i]->id;
		$sql2 = "SELECT * FROM products  WHERE id = $id";
		$result2 = $conn->query($sql2);
		$row2 = $result2->fetch_assoc();
		if($i == 0) { ?>
			<img class="cms-order-view-print-logo-img" src="../img/logo/printLogo.png"/>
			<h1 class="text-center order-header">
				<span class="glyphicon glyphicon-file"></span> #<?php echo $Orderid ?>
			</h1>
			<div  class="row order-header orderlist"  >
				<div class="col-xs-1">Nr.</div>
				<div class="col-xs-3">Name</div>
				<div class="col-xs-2">Price</div>
				<div class="col-xs-2">Quantity</div>
				<div class="col-xs-2">Color</div>
				<div class="col-xs-2">Subtotal</div>
			</div>
			<?php
		} ?>
		<div  class="row orderlist" >
			<div class="col-xs-1"> <?php echo $i ?></div>
			<div class="col-xs-3"><?php echo $row2['name']?></div>
			<div class="col-xs-2"><?php echo $row2['price'] ?> $ </div>
			<div class="col-xs-2"><?php echo $obj[$i]->quantity ?></div>
			<div class="col-xs-2"><?php echo $obj[$i]->color ?></div>
			<div class="col-xs-2"><?php echo $obj[$i]->quantity * $row2['price']  ?> $</div>
		</div>
		<?php
	} ?>
	<div class="clearfix"></div>
	<div  class="order-sign">
		<p class="cms-orderview-customer-info ">
			<span>	TOTAL SUM:</span>
			<span class="cms-orderview-customer-data">  <?php echo $totalSum; ?> $</span>
		</p>
		<p class="cms-orderview-customer-info ">
			<span>SHIPING ADDRESS:</span>
			<span class="cms-orderview-customer-data">  <?php echo $address ?></span>
		</p>
		<p class="cms-orderview-customer-info ">
			<span>DATE:</span>
			<span class="cms-orderview-customer-data">
				<?php $sTime = date("d / m / Y"); echo $sTime;?>
			</span>
		</p>
		<p class="cms-orderview-customer-info ">
			<span>SIGN:</span>
			<span class="cms-orderview-customer-data"> ______________________</span>
		</p>
	</div>
	<?php
} else {
	echo "<script> window.location.href = 'http://localhost/sicilia/cms'</script>";
}
