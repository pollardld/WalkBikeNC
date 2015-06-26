jQuery(document).ready( function() {

//= Back to Top button
	var tiptop = document.querySelectorAll('.tiptop');
	
	for (var i = 0; i < tiptop.length; i++) {
		tiptop[i].addEventListener( 'click', function() {
			window.scrollTo(0, 0);
		});
	}

//= Slick Slider
	var slickSlider = jQuery('.slick-container');

	slickSlider.slick({
		cssEase : 'ease-in-out',
		speed : 200,
		arrows : false
	});

	window.setTimeout(slickTimeout, 7000)

	function slickTimeout() {
		slickSlider.slickGoTo(1);
	}

//= Show Menu
	var showMenu = document.getElementById( 'showMenu' ),
		leftnavMenu = jQuery( '.leftnav .span10' ),
		parentNav = jQuery( 'header .menu-item-has-children > a' );

	if ( showMenu ) {
		showMenu.addEventListener( 'click', function( ev ) {
			ev.stopPropagation();
			ev.preventDefault();
			leftnavMenu.toggleClass( 'animate' );
		});
	}

	if ( window.innerWidth < 768 ) {

		parentNav.on( 'click', function(e) {
			e.preventDefault();
			jQuery(this).toggleClass( 'show' );
		});

	}

});