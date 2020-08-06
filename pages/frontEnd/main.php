<?php
include '../bdConnect.php';
$dbname =  $hostingName."sitelia";
$conn = new mysqli($servername, $username, $serverpassword, $dbname);
$conn -> set_charset("utf8");
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
$i = 0;
?>
<div class="row main-page-rows">
	<?php
	while($row = $result->fetch_assoc()) {
    $imgPath = "img/products/ID". $row['id']."/".$row['defaultImg'];
		// Adding row closing tag and open new row if 3 elements added
		if ($i % 3 == 0 && $i != 0 ) { ?>
			</div>
			<div class="row main-page-rows">
			<?php
		}?>
		<div class="item col-xs-12 col-sm-4 product-wrapper">
			<div class="product">
				<img class="product-img" src="<?php echo $imgPath ?>" onclick="imgPreview(this ,'<?php echo $row['name'] ?>')"/>
				<span class="glyphicon glyphicon-star-empty text-center"></span>
				<p class="product-name">
					<?php echo $row['name'] ?>
				</p>
				<p class="main-page-product-price">
					<span class="glyphicon glyphicon-tag"></span>
					<?php echo $row['price'] ?>
					$
				</p>
				<a class="product-more-info-link" href="#description?ID=<?php echo $row['id']?>">
					<button class="btn btn-info product-more-info-btn">
						More info
					</button>
				</a>
			</div>
		</div>
		<?php
		$i++;
	}
//CLOSING TAGS FOR ROWS
if ($i % 3 == 0 ) {
	echo "</div> ";
} else {
	$remain = 3 - $i % 3;
	$i=0;
	while ($i <  $remain) {
		echo "<div class='col-xs-0 col-sm-4'></div>";
		$i++;
	}
	echo "</div>";
}
?>
<!-- POP UP  For IMG PREVIEW-->
<div class="pop-up" >
	<div class="pop-up-left-container" onclick="PopUpHide()"></div>
	<div class="pop-up-header">
		<div class="pop-up-header-text"></div>
		<div class="text-right x-button" onclick="PopUpHide()"></div>
	</div>
	<!-- pop content -->
	<div class="pop-up-wrapper">
		<div class="PopUp-content">
			<img class="img-responsive pop-up-img" src="">
		</div>
	</div>
	<div class="pop-up-right-container" onclick="PopUpHide()"></div>
</div>
