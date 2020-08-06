<?php session_start();
include "../isUserLoggedIn.php";
include '../../../pages/bdConnect.php';
if (isUserLoggedIn() == 1) {
	$dbname = $hostingName."sitelia";
	$conn = new mysqli($servername, $username, $serverpassword , $dbname);
	$productID = $_GET['ID'];
	$conn -> set_charset("utf8");
	$sql = "SELECT * FROM products WHERE id = $productID";
	$result = $conn->query($sql);
	$i = 0;
	$row = $result->fetch_assoc();
	$obj = json_decode($row['color']);
  $imgPath = "../img/products/ID".$productID."/".$row['defaultImg'];
	?>
	<h1 class="text-center order-header" >
		<span class="glyphicon glyphicon-file"></span>
		PRODUCT # <?php echo $productID ?>
	</h1>
	<div class="change-product-page-wrapper">
		<p class="change-product-errors"></p>
		<div  class="save-product-preloader" >
			<div class="spinner-for-save-product-preloader"></div>
		</div>

		<h3 class="change-product-titles">
			<span> Product Name </span>
			<span class="glyphicon glyphicon-edit change-product-glyphicon-edit" onclick="$('.change-product-name').focus()"></span>
		</h3>
		<div  class="change-product-name"  contenteditable="true">
			<?php echo $row['name'] ?>
		</div>
		<h3 class="change-product-titles">
			Product Description
			<span class="glyphicon glyphicon-edit change-product-glyphicon-edit" onclick="$('.change-product-description').focus()"></span>
		</h3>
		<div   class="change-product-description" contenteditable="true">
			<?php echo $row['description'] ?>
		</div>
	<!--	CHANGE AND ADD NEW COLORS AND IMAGES-->
	<div  class="colors-container">
		<h3 class="change-product-titles">
			Colors & Images
		</h3>
		<?php
		for ($i = 0 ; $i <sizeof($obj); $i++){ ?>
			<div class="row add-color">
				<div class="col-xs-1">
					<img class="color-image-preview oldImg" src="../img/products/ID<?php echo $productID.'/'. $obj[$i]->imgUrl; ?>" value="<?php echo $obj[$i]->imgUrl; ?>"/>
				</div>
				<div class="col-xs-5">
					<input class="image-for-color" type="file" name="userImage" onchange="SetPicturePreview(this )">
				</div>
				<div class="col-xs-2 default-text"></div>
				<div class="col-xs-2 colors old-color" contenteditable="true">
					<?php echo $obj[$i]->color; ?>
				</div>
				<div class="col-xs-2 text-right">
						<button class="btn btn-danger delete-color-btn" onclick="deleteColor(this)">Delete</button>
				</div>
			</div>
			<?php
		} ?>
		</div>
		<button class="btn btn-info add-color-btn" onclick="addColorRow(<?php echo $i ?>)">
			ADD COLOR
		</button>
		<h3 class="change-product-titles">
			Product Price
			<span class="glyphicon glyphicon-edit change-product-glyphicon-edit" onclick="$('.change-product-price').focus()"></span>
		</h3>
		<div class="product-price">
			<p class="change-product-price" contenteditable="true">
				<?php echo $row['price'] ?>
			</p>
		</div>
		<button type="submit" class="btn btn-danger save-btn" onclick="changeOrAddProduct(<?php echo $row['id'] ?> , 'changeProduct.php')">
			SAVE
		</button>
	</div>
	<?php
	$i++;
} else {
	echo "<script> window.location.href = 'http://localhost/sicilia/cms'</script>";
}
