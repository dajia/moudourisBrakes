jQuery(document).ready(function () {

    jQuery('#quote-carousel').carousel({
        interval: 5000,
		pause: 'hover'
    });
	
	jQuery('.navbar-toggler').on('click', function(event) {
		event.preventDefault();
		jQuery(this).closest('.navbar-minimal').toggleClass('open');
	});

	// ADD SLIDEDOWN ANIMATION TO DROPDOWN //
	jQuery('.dropdown').on('show.bs.dropdown', function(e){
	jQuery(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	});

	// ADD SLIDEUP ANIMATION TO DROPDOWN //
	jQuery('.dropdown').on('hide.bs.dropdown', function(e){
	jQuery(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	});	

});