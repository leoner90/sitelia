<?php session_start();
	$id = $_GET['ID'];
	include '../bdConnect.php';
	$dbname =  $hostingName."sitelia";
	$conn = new mysqli($servername, $username, $serverpassword, $dbname);
	$conn -> set_charset("utf8");
	$sql = "SELECT * FROM products WHERE id = $id";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$colors = json_decode($row['color']);
	$imgPath = "img/products/ID". $id."/".$row['defaultImg'];
?>
<div class="row description-content">
	<div class="col-xs-12 col-sm-4">
		<img class="description-img" src="<?php echo $imgPath ?>" />
	</div>
	<div class="col-xs-12 col-sm-8 description-page-info-section">
		<div  class="add-to-basket-preloader">
			<div class="spinner-for-basket-preloader"></div>
		</div>
		<h3 class="description-header">
			<span class="glyphicon glyphicon-fire"></span>
			<?php echo strtoupper($row['name']) ?>
		</h3>
		<p class="text-left description-text" ><?php echo $row['description'] ?></p>
		<div class="description-user-select-value">
			<p class=" mb-0"> Colors: </p>
			<select class="description-page-color-select" onchange="colorChange(this,<?php echo $id ?>);">
				<?php
				for ($i=0; $i < count($colors); $i++) {
					echo "<option value='".$colors[$i]->imgUrl."'>".$colors[$i]->color."</option>";
				}?>
			</select>
			<div>
				<p class="mb-0" >Quantity:</p>
				<input class="description-quantity-select" type="number" id="quantity" name="quantity" min="1" max="24" value="1" oninput="max_quantity(this)">
			</div>
		</div>
		<p class="text-center description-price">
			<span class="glyphicon glyphicon-tag"></span>
			<?php echo $row['price'] ?> $
		</p>
		<button class="btn btn-info btn-add-to-cart" onclick="addToCart(<?php echo $row['id'] ?>)">
			ADD TO CART
		</button>
	</div>
</div>
