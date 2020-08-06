//CMS NAVIGATION
$(document).ready(function(){
	nav();
})
$(window).on('hashchange', function() {
	nav();
})
function nav() {
	var id ='';
	var link = location.hash.replace("#", ""); //delete # simvol from string
	if( link.includes("?")) {
		id = link.split('?ID=')[1];
		link = link.substring(0, link.indexOf('?'));
	}
	if (link === ''){ //if hash empty then redirect to main page(first visit for example)
		link = "orders";
	}
	$.get('pages/frontEnd/'+ link + '.php?ID='+id, function(data) {
		$('.cms-content').html(data).promise();
		$(window).scrollTop(0);
	})
	//If page not exist (if error)
	.fail(function() {
		$.get('pages/frontEnd/404.php', function(data)  {
				$('.cms-content').html(data);
				$(window).scrollTop(0);
		})
	})
}
//AUTHORISATION login / logout
$('.cms-login-btn').click(function( event ) {
	event.preventDefault();
	var login = $(".cms-login").val();
	var password = $(".cms-password").val();
	$.post("pages/backEnd/loginphp.php",{login:login, password:password },function(data){
		if (data === "") {
			location.reload();
			$(".cms-login-errors").hide();
		} else {
			$('.cms-login-errors').hide().fadeIn(500);
		}
	})
})

function logOut() {
	$.post("pages/backEnd/logOut.php",function(){
		location.reload();
	})
}
//CHANGE ORDER STATUS FROM PENDING TO SUCCCESS
function OrderCompleted(orderId) {
		$.post("pages/backEnd/changeOrderStatus.php",{orderId:orderId },function(){
				nav(); // reload content
		})
}
//HIDE ORDER WHICH ARE COMPLETED
function hideCompleted() {
  $('.Completed').parent().toggle();
}

//ADD NEW COLOR FOR PRODUCTS IMG + COLOR NAME
function addColorRow() {
	var colorContainer =
		'<div class="row add-color"> ' +
			'<div class="col-xs-1 "> ' +
				'<img class="color-image-preview" src="" />' +
			'</div>' +
			'<div class="col-xs-5 ">' +
				'<input class="new-color-image-input image-for-color" type="file" name="userImage" onchange="SetPicturePreview(this)">' +
			'</div> ' +
			'<div class="col-xs-2 default-text"></div>'+
			'<div class="col-xs-2 colors new-color-name"  contentEditable=true></div>' +
			'<div class="col-xs-2 text-right"><button class="btn btn-danger delete-color-btn" onclick="deleteColor(this)">Delete</button></div>'+
		'</div>';
	$(".colors-container").append(colorContainer);
	$(".new-color-name").last().focus();

}
//DELETE COLOR FROM PRODUCT
function deleteColor(index) {
	$(index).closest('.add-color').remove();
}
// PRODUCT CHANGE PAGE- CHANGE IMG ON INPUT SELECT  ADD "NEW COLOR" CLASS IF IMG WAS CHANGED
function SetPicturePreview(input ) {
	var reader2 = new FileReader();
	reader2.onload = function(result) {
		var index = $('.image-for-color').index(input);
		var id = $('.color-image-preview').eq(index);
		$(id).attr('src', result.target.result);
		//if it was old color , delete oldcolor class and add newColor Class
		if($('.colors').eq(index).hasClass("old-color")) {
			$('.old-color').eq(index).addClass( "new-color-name" ).removeClass( "old-color" );
		}
		$(input).removeClass("old-color")
		if (!$(input).hasClass("new-color-image-input")){
			$	(input).addClass("new-color-image-input")
		}
	}
	reader2.readAsDataURL(input.files[0]);
}
//SAVE PRODUCT CHANGES OR ADD NEW PRODUCT
function changeOrAddProduct(id,url) {
	var Preloadersrc = "../img/other/changeProduct.gif?" + new Date().getTime();//to restart gif loop
	$('.save-product-preloader').show().css('background-image', 'url('+Preloadersrc+')');
	//Old colors and images path
	var oldColors, oldImg , oldColor = [];
	var newColors =[];
	var oldColorLenght = $('.old-color').length;
	for (let i =0; i < oldColorLenght ; i++){
		oldColors = $(".old-color").eq(i).text().trim();
		oldImg = $(".oldImg").eq(i).attr('value');
		oldColor[i] = { color:oldColors, imgUrl:oldImg };
	}
	var oldColorObject = JSON.stringify(oldColor);
	//New colors and images object
	var colorLenght = $('.new-color-name').length;
	var form_data = new FormData();
	for (let i =0; i < colorLenght ; i++ ){
		var color = $(".new-color-name").eq(i).text().trim();
		newColors[i] = { color:color, imgUrl:'' };
		var file_data = $('.new-color-image-input').eq(i).prop('files')[0];
		form_data.append('file[]', file_data);
	}
	newColors = JSON.stringify(newColors);
	//Append all data to form data and send it to server
	form_data.append('newColors', newColors);
	form_data.append('name', $(".change-product-name").text().trim());
	form_data.append('description', $(".change-product-description").text().trim());
	form_data.append('price', Number($(".change-product-price").text().trim()));
	form_data.append('oldColors', oldColorObject);
	form_data.append('productID', id);
	$.ajax({
		url: "pages/backEnd/" + url,
		type: "POST",
		data: form_data,
		contentType: false,
		cache: false,
		processData:false,
		success: function(result){
			if (result === "") {
				$(".change-product-errors").hide();
				$('.save-product-preloader').delay(3500).fadeOut(500);
				//IF new products redirect to product list
				if(id === 0) {
					setTimeout(function(){ location.hash = '#productList'; }, 3000);
				}
			} else {
				result = JSON.parse(result) ;
				$(".change-product-errors").hide().show(250).html(result);
				$('.save-product-preloader').delay(3500).fadeOut(500);
			}
		}
	})
}
