<?php session_start();
include "../isUserLoggedIn.php";
include '../../../pages/bdConnect.php';
if (isUserLoggedIn() == 1) {
	$dbname = $hostingName."sitelia";
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);
	$sql = "SELECT * FROM orders ";
	$result = $conn->query($sql);
	$i = 0;
	while ($row = $result->fetch_assoc()) {
		if ($i==0){ ?>
			<p class="text-right">
				<label class="cms-hide-completed-label"> HIDE COMPLETED
				<input class="cms-hide-completed-checkbox" type="checkbox" onchange="hideCompleted();">
				</label>
			</p>
			<h1 class="text-center order-header" >
				<span class="glyphicon glyphicon-file"></span>
				ORDERS
			</h1>
			<div class="row cms-orders-titles">
				<div class="col-xs-1">ID</div>
				<div class="col-xs-3">Address</div>
				<div class="col-xs-3">Purchased On</div>
				<div class="col-xs-2">Subtotal</div>
				<div class="col-xs-2">Status</div>
				<div class="col-xs-1">Action</div>
			</div>
			<?php
		} ?>
		<div class="row cms-orders-row">
			<div class="col-xs-1"> #<?php echo $row['id']; ?></div>
			<div class="col-xs-3"> <?php echo $row['address']?></div>
			<div class="col-xs-3"><?php echo $row['date'] ?></div>
			<div class="col-xs-2"><?php echo $row['sum'] ?> $</div>
			<div class="col-xs-2 <?php echo $row['status'] ?>"><?php echo $row['status'] ?></div>
			<div class="col-xs-1">
				<a href="#orderView?ID=<?php echo $row['id']; ?>">
					<button class="btn btn-info cms-order-view-btn"> View </button>
				</a>
			</div>
		</div>
		<?php
		$i++;
	} ?>
	<?php
} else {
	echo "<script> window.location.href = 'http://localhost/sicilia/cms'</script>";
}
