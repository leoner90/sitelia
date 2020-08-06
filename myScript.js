//POP UP IMG preview
function imgPreview(img, name) {
	let src = $(img).attr("src");
	$(".pop-up-header-text").text(name);
	$(".pop-up").show(250);
	$(".pop-up-img").attr('src',src);
}
function PopUpHide(){
	$(".pop-up").hide(250);
}
$(document).keyup(function(e) {
	let esc_btn = 27 ;
	if (e.keyCode === esc_btn) PopUpHide();
})
//NAVIGATION
$(document).ready(function(){
	nav();
})
$(window).on('hashchange', function() {
	nav();
})
function nav() {
	let link = location.hash.replace("#", ""); //delete # simvol from string
	if( link.includes("?")) {
		var id = link.split('?ID=')[1];
		link = link.substring(0, link.indexOf('?'));
	}
	//if hash empty then redirect to main page(first visit etc.)
	if (link === ''){
		link = "main";
	}
	//Load Page
	$.get('pages/frontEnd/'+ link + '.php?ID='+id, function(data) {
		$('#content').html(data).promise();
		$(window).scrollTop(0);
	})
	//If page not exist (load 404 page)
	.fail(function() {
		$.get('pages/frontEnd/404.php', function(data)  {
			$('#content').html(data);
			$(window).scrollTop(0);
		})
	})
}
//Description Page input max_quantity
function max_quantity(thisInput) {
	let quantity = $(thisInput).val();
	if (quantity > 24) {
		$(thisInput).val('24');
	} else if (quantity < 1) {
		$(thisInput).val('1');
	}
}
//CHANGE IMG ON COLOR CHANGE DESCRIPTION PAGE
function colorChange(select,id){
	var img = $(select).val();
	$(".description-img").attr('src','img/products/ID'+id+'/'+img);
}
//ADD PRODUCT TO CART THROUGH SESSION
function addToCart(id) {
	let preloader = $('.add-to-basket-preloader');
	preloader.show();
	let quantity = $('#quantity').val();
	let color = $( ".description-page-color-select option:selected" ).text();
	$.post("pages/backEnd/addToCart.php", {id: id, quantity: quantity, color: color}, function (data) {
		$('#quantity').val(1);
		preloader.delay(500).fadeOut(500);
	})
}
//DELETE ORDER FROM CART
function deleteOrder(index) {
	$.ajaxSetup({async: false});
	$.post("pages/backEnd/deleteOrder.php",{index:index },function(){
		nav(); // reload content
	})
}
//SAVE ORDER TO DB
function saveNewOrder(newOrderObject , sum) {
	let address = $("#omniva_select1 option:selected").text();
	newOrderObject = JSON.stringify(newOrderObject);
	$.post("pages/backEnd/saveOrder.php",{newOrderObject:newOrderObject, address:address , sum:sum },function(){
		nav(); // reload content
	})
}
//OMNIVIA WIDGET FOR SHIPING ADDRESS.
function omniwia() {
	var wd1 = new OmnivaWidget({
		compact_mode: false,	// Compact widget is not shown
		// If enabled only a dropdown with locations will be shown
		show_offices: true,		// Post offices will be shown
		// If disabled post offices will not be shown in the dropdown
		show_machines: true,	// Parcel terminals will be shown
		// If disabled parcel terminals will not be shown in the dropdown
		custom_html: false,		// Predefined HTML is activated
		// It is allowed to create a custom HTML                                // It will be included in the container
		id: 1,			// Will be added to the unique element ids if
		// there is a need to have more than one widget
		selection_value: 'tallinna postkontor',	// Preselected value. (case insensitive, will be trimmed) Can be empty or entirely omitted. Optional
		country_id: "LV",		// Country code
		show_logo: true,	        // Omniva logo will be shown
		show_explanation: true	// Explanation text will be shown
	});
}
