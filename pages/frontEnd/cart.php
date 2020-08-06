<?php session_start();
//OBJECT FOR UNSERIALIZING
include "../productClass.php";
if (isset($_SESSION['product'])){
	include '../bdConnect.php';
	$dbname =  $hostingName."sitelia";
	$conn = new mysqli($servername, $username, $serverpassword, $dbname);
	$totalSum =0;
	for ($i = 0; $i<sizeof($_SESSION['product']);$i++) {
		if($_SESSION['product'][$i] != "") {
			//INITIAL ROW TITLES
			if($totalSum == 0) { ?>
				<div class="row cart-titles">
					<div class="col-xs-1 "></div>
					<div class="col-xs-3 " >NAME</div>
					<div class="col-xs-2 text-center">PRICE</div>
					<div class="col-xs-2 text-center">QUANTITY</div>
					<div class="col-xs-1 text-center">COLOR</div>
					<div class="col-xs-1 text-center">SUM</div>
					<div class="col-xs-2 text-center">ACTION</div>
				</div>
				<?php
			}
			$OrdersSession = unserialize($_SESSION['product'][$i]);
			$totalOrder[] = $OrdersSession;
			$sql = "SELECT * FROM products WHERE id = $OrdersSession->id";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
      $imgPath = "img/products/ID". $OrdersSession->id."/".$row['defaultImg'];
			?>
			<div class="row cart-order-row">
				<div class="col-xs-1">
					<img class="cart-order-img" src="<?php echo $imgPath ?>" >
				</div>
				<div class="col-xs-3 "> <?php echo $row['name'] ?> </div>
				<div class="col-xs-2 text-center"> <?php echo $row['price'] ?> $</div>
				<div class="col-xs-2 text-center"> <?php echo $OrdersSession->quantity ?></div>
				<div class="col-xs-1 text-center"> <?php echo $OrdersSession->color ?></div>
				<div class="col-xs-1 text-center"> <?php echo $OrdersSession->quantity * $row['price'] ?>  $</div>
				<div class="col-xs-2 text-center" >
					<button class="btn btn-danger btn-sm delete-btn" onclick="deleteOrder(<?php echo $i ?>)" >
						DELETE
					</button>
				</div>
			</div>
			<?php
			$totalSum = $totalSum + $OrdersSession->quantity * $row['price'] ;
		}
	}
	if(isset($totalOrder)) {
    $totalOrder = json_encode($totalOrder);
    ?>
		<div class="cart-order-total-sum-wrapper">
			TOTAL SUM:
			<span class="card-order-totalSum text-right"> <?php echo $totalSum ?> $</span>
		</div>
		<!--	OMNIVIA CONTAINER / ORDER COMPLETE	-->
		<script> omniwia(); </script> <!-- omniwiawidget call-->
		<div class="checkout" >
			<div id="omniva_container1"></div>
			<button class="btn btn-danger checkout-btn" onclick='saveNewOrder(<?php echo $totalOrder .",". $totalSum?>)'>
				Complete order
			</button>
		</div>
		<?php
	}else {
	    echo "NO PRODUCTS";
	}
}else {
	echo "NO PRODUCTS";
}
