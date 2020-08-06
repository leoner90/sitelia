<?php session_start();
include "../isUserLoggedIn.php";
include '../../../pages/bdConnect.php';
if (isUserLoggedIn() == 1) { ?>
	<h1 class="text-center order-header" >
		<span class="glyphicon glyphicon-file"></span>
		CREATE NEW PRODUCT
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
		<div  class="change-product-name"  contenteditable="true"></div>
		<h3 class="change-product-titles">
			Product Description
			<span class="glyphicon glyphicon-edit change-product-glyphicon-edit" onclick="$('.change-product-description').focus()"></span>
		</h3>
		<div   class="change-product-description" contenteditable="true"></div>
		<!--	CHANGE AND ADD NEW COLORS AND IMAGES-->
		<div  class="colors-container">
			<h3 class="change-product-titles">
				Colors & Images
			</h3>
			<div class="row add-color">
				<div class="col-xs-1">
					<img class="color-image-preview " src=""/>
				</div>
				<div class="col-xs-5">
					<input class="new-color-image-input image-for-color" type="file" name="userImage" onchange="SetPicturePreview(this)">
				</div>
				<div class="col-xs-2 default-text"></div>
				<div class="col-xs-2 colors new-color-name"  contentEditable=true></div>
				<div class="col-xs-2 text-right">
					<button class="btn btn-danger delete-color-btn" onclick="deleteColor(this)">Delete</button>
				</div>
			</div>
		</div>
		<button class="btn btn-info add-color-btn" onclick="addColorRow()">
			ADD COLOR
		</button>
		<h3 class="change-product-titles">
			Product Price
			<span class="glyphicon glyphicon-edit change-product-glyphicon-edit" onclick="$('.change-product-price').focus()"></span>
		</h3>
		<div class="product-price">
			<p class="change-product-price" contenteditable="true"></p>
		</div>
		<button type="submit" class="btn btn-danger save-btn" onclick="changeOrAddProduct(0, 'createNewProduct.php')">
			SAVE
		</button>
	</div>
	<?php
} else {
  echo "<script> window.location.href = 'http://localhost/sicilia/cms'</script>";
}
