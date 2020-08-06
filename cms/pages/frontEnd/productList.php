<?php session_start();
include "../isUserLoggedIn.php";
include '../../../pages/bdConnect.php';
if (isUserLoggedIn() == 1) {
	$dbname = $hostingName."sitelia";
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);
	$conn -> set_charset("utf8");
	$sql = "SELECT * FROM products";
	$result = $conn->query($sql);
	$i = 0;
  ?>
	<a href="#addNewProduct"><button class="btn btn-success add-new-product-btn">ADD NEW PRODUCT</button></a>
  <?php
	while($row = $result->fetch_assoc()) {
		$colors = json_decode($row['color']);
    $imgPath = "../img/products/ID". $row['id']."/".$row['defaultImg'];
		if ($i==0){ ?>
			<h1 class="text-center order-header" > <span class="glyphicon glyphicon-file"></span> PRODUCTS</h1>
			<div class="row cms-orders-titles" >
				<div class="col-xs-1"> IMG </div>
				<div class="col-xs-2"> name </div>
				<div class="col-xs-1"> Id </div>
				<div class="col-xs-4"> Description</div>
				<div class="col-xs-1"> price </div>
				<div class="col-xs-2"> Color </div>
				<div class="col-xs-1"> Action </div>
			</div>
			<?php
		} ?>
		<div class="row cms-products-list-row">
			<div class="col-xs-1">
				<img class="cms-product-list-row-img" src="<?php echo $imgPath ?>"/>
			</div>
			<div class="name col-xs-2"> <?php echo $row['name'] ?></div>
			<div class="price col-xs-1" ><?php echo $row['id'] ?></div>
			<div class="col-xs-4 show-max-two-lines " > <?php echo $row['description'] ?></div>
			<div class="price col-xs-1" ><?php echo $row['price'] ?> $</div>
			<div class="col-xs-2 show-max-two-lines" ><?php
				for($i=0; $i < sizeof($colors); $i++){
				echo $colors[$i]->color .', ';
				}
				?>
			</div>
			<div class="col-xs-1">
				<a href="#changeProducts?ID=<?php echo $row['id']; ?>">
					<button class="btn btn-danger change-product-btn"> CHANGE </button>
				</a>
			</div>
		</div>
		<?php
		$i++;
	}
} else {
	echo "<script> window.location.href = 'http://localhost/sicilia/cms'</script>";
}
