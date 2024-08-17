/**
 * Functionality specific to minemo.
 *
 * Provides helper functions to enhance the theme experience.
 */
"use strict";

/*------------------------------------------------------------------------------*/
/* Back to top
/*------------------------------------------------------------------------------*/

// ===== Scroll to Top ==== 
jQuery('#totop').hide();
jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 100) {        // If page is scrolled more than 50px
        jQuery('#totop').fadeIn(200);    // Fade in the arrow
        jQuery('#totop').addClass('top-visible');
    } else {
        jQuery('#totop').fadeOut(200);   // Else fade out the arrow
        jQuery('#totop').removeClass('top-visible');
    }
});
jQuery('#totop').on('click', function() {    // When arrow is clicked
    jQuery('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
    return false;
});

/*------------------------------------------------------------------------------*/
/* Search Form
/*------------------------------------------------------------------------------*/
	
	jQuery( ".prt-header-search-link a" ).on('click', function(){	
		jQuery(".prt-search-overlay").addClass('st-show');
		jQuery(".prt-overlay-serachform").addClass('st-show');
		jQuery("body").addClass('st-prevent-scroll');			
		jQuery(".field.searchform-s").focus();					    
		return false;
	});	
	jQuery( ".prt-icon-close" ).on('click', function(){			
	  		jQuery(".prt-search-overlay").removeClass('st-show');
	  		jQuery(".prt-overlay-serachform").removeClass('st-show');
			jQuery("body").removeClass('st-prevent-scroll');					  
	 		return false;
	});	
	jQuery('.prt-site-searchform').on('click', function(event){
		event.stopPropagation();
	});
	
/*------------------------------------------------------------------------------*/
/* Enables menu toggle for small screens.
/*------------------------------------------------------------------------------*/ 
	 ( function() {
		var nav = jQuery( '#site-navigation' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		jQuery( '.menu-toggle' ).on( 'click.minemo', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();
	
/*------------------------------------------------------------------------------*/
/* Add plus icon in menu
/*------------------------------------------------------------------------------*/ 

	jQuery('#site-header-menu #site-navigation div.nav-menu > ul > li:has(ul), .prt-mmmenu-override-yes #site-header-menu #site-navigation .mega-menu-wrap > ul > li:has(ul)').append("<span class='righticon'><i class='prt-minemo-icon-angle-down'></i></span>");	
		
/*------------------------------------------------------------------------------*/
/* Responsive Menu
/*------------------------------------------------------------------------------*/
	jQuery('.righticon').on('click', function() {
		if(jQuery(this).siblings('.sub-menu, .children, .mega-sub-menu').hasClass('open')){
			jQuery(this).siblings('.sub-menu, .children, .mega-sub-menu').removeClass('open');
			jQuery( 'i', jQuery(this) ).removeClass('prt-minemo-icon-angle-up').addClass('prt-minemo-icon-angle-down');
		} else {
			jQuery(this).siblings('.sub-menu, .children, .mega-sub-menu').addClass('open');			
			jQuery( 'i', jQuery(this) ).removeClass('prt-minemo-icon-angle-down').addClass('prt-minemo-icon-angle-up');
		}
		return false;
 	});
	
	
/* ====================================== */
/* Circle Progress bar
/* ====================================== */
	jQuery('.prt-circle-box').each(function(){

		var this_circle = jQuery(this);

		// Circle settings
		var emptyFill_val = "rgba(0, 0, 0, 0)";
		var thickness_val = 10;
		var fill_val      = this_circle.data('fill');

		if( typeof this_circle.data('emptyfill') !== 'undefined' && this_circle.data('emptyfill')!='' ){
			emptyFill_val = this_circle.data('emptyfill');
		}
		if( typeof this_circle.data('thickness') !== 'undefined' && this_circle.data('thickness')!='' ){
			thickness_val = this_circle.data('thickness');
		}
		if( typeof this_circle.data('filltype') !== 'undefined' && this_circle.data('filltype')=='gradient' ){
			fill_val = {gradient: [ this_circle.data('gradient1') , this_circle.data('gradient2') ], gradientAngle: Math.PI / 4 };
		}

		if( typeof jQuery.fn.circleProgress == "function" ){
			var digit   = this_circle.data('digit');
			var before  = this_circle.data('before');
			var after   = this_circle.data('after');
			var c_width  = this_circle.data('id');
			var digit       = Number( digit );
			var short_digit = ( digit/100 ); 

			jQuery('.prt-circle', this_circle ).circleProgress({
				value		: 0,
				size		: c_width,
				startAngle	: -Math.PI / 4 * 2,
				thickness	: thickness_val,
				emptyFill	: emptyFill_val,
				fill		: fill_val
			}).on('circle-animation-progress', function(event, progress, stepValue) { // Rotate number when animating
				this_circle.find('.prt-fid-number').html( before + Math.round( stepValue*100 ) + after );
			});
		}

		this_circle.waypoint(function(direction) {
			if( !this_circle.hasClass('completed') ){
				// Re draw when view
				if( typeof jQuery.fn.circleProgress == "function" ){
					jQuery('.prt-circle', this_circle ).circleProgress( { value: short_digit } );
				};
				this_circle.addClass('completed');
			}
		}, { offset:'90%' });

	});
	

	/* ***************** */
	/*  Carousel effect  */
	/* ***************** */

var preyantechnosys_carousel = function() {
	jQuery('.preyantechnosys-boxes-view-carousel').each(function(){
		
		var thisElement = jQuery(this);

		// Column
		var tm_column         = 3;
		var tm_slidestoscroll = 3;
		
		var tm_slidestoscroll_1200 = 3;
		var tm_slidestoscroll_992  = 3;
		var tm_slidestoscroll_768  = 2;
		var tm_slidestoscroll_479  = 1;
		var tm_slidestoscroll_0    = 1;
		if( jQuery(this).data('prt-slidestoscroll')=='1' ){  // slides to scroll
			var tm_slidestoscroll      = 1;
			var tm_slidestoscroll_1200 = 1;
			var tm_slidestoscroll_992  = 1;
			var tm_slidestoscroll_768  = 1;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
		}		
		
		// responsive
		var tm_responsive = [
			{ breakpoint: 1200, settings: {
				slidesToShow  : 3,
				slidesToScroll: tm_slidestoscroll_1200
			} },
			{ breakpoint: 768, settings: {
				slidesToShow  : 2,
				slidesToScroll: tm_slidestoscroll_768
			} },
			{ breakpoint: 574, settings: {
				slidesToShow  : 1,
				slidesToScroll: tm_slidestoscroll_479
			} },
			{ breakpoint: 0, settings: {
				slidesToShow  : 1,
				slidesToScroll: tm_slidestoscroll_0
			} }
		];
								
		if( jQuery(this).hasClass('preyantechnosys-boxes-col-three') ){
			tm_column         = 3;
			tm_slidestoscroll = 3;
			
			var tm_slidestoscroll_1200 = 3;
			var tm_slidestoscroll_992  = 2;
			var tm_slidestoscroll_768  = 2;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('prt-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_992  = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200,
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];
		
		} else if( jQuery(this).hasClass('preyantechnosys-boxes-col-one') ){
		
			tm_column         = 1;
			tm_slidestoscroll = 1;
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1,
					centerMode: false,
					centerPadding: '0px',
					arrows: false
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1,
					centerMode: false,
					centerPadding: '0px',
					arrows: false
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: 1
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: 1
				} }
			];
			
		} else if( jQuery(this).hasClass('preyantechnosys-boxes-col-two') ){
			tm_column         = 2;
			tm_slidestoscroll = 2;
			
			var tm_slidestoscroll_1200 = 2;
			var tm_slidestoscroll_768  = 2;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('prt-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];
		
		} else if( jQuery(this).hasClass('preyantechnosys-boxes-col-four') ){
			tm_column         = 4;
			tm_slidestoscroll = 4;
			
			var tm_slidestoscroll_1200 = 4;
			var tm_slidestoscroll_992  = 2;
			var tm_slidestoscroll_768  = 2;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('prt-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_992  = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 4,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];			
			
		} else if( jQuery(this).hasClass('preyantechnosys-boxes-col-five') ){
			tm_column         = 5;
			tm_slidestoscroll = 5;
			
			var tm_slidestoscroll_1200 = 5;
			var tm_slidestoscroll_992  = 3;
			var tm_slidestoscroll_768  = 3;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('prt-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_992  = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 5,
					slidesToScroll: tm_slidestoscroll_1200,
					centerMode: false,
					centerPadding: '0px'
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];
			
		} else if( jQuery(this).hasClass('preyantechnosys-boxes-col-six') ){
			tm_column         = 6;
			tm_slidestoscroll = 6;
			
			var tm_slidestoscroll_1200 = 6;
			var tm_slidestoscroll_992  = 3;
			var tm_slidestoscroll_768  = 3;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('prt-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_992  = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 6,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];

		} else if( jQuery(this).hasClass('preyantechnosys-boxes-col-seven') ){
			tm_column         = 7;
			tm_slidestoscroll = 7;
			
			var tm_slidestoscroll_1200 = 7;
			var tm_slidestoscroll_992  = 3;
			var tm_slidestoscroll_768  = 3;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('prt-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_992  = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 7,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];
			
		} else if( jQuery(this).hasClass('preyantechnosys-boxes-col-eight') ){
			tm_column         = 8;
			tm_slidestoscroll = 8;
			
			var tm_slidestoscroll_1200 = 8;
			var tm_slidestoscroll_992  = 3;
			var tm_slidestoscroll_768  = 3;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('prt-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_992  = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			
			tm_responsive     = [
				{ breakpoint: 1200, settings: {
					slidesToShow  : 8,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 3,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];
			
		} else if( jQuery(this).hasClass('tm_1200slidestoshow_2') ){
			tm_column         = 3;
			tm_slidestoscroll = 3;
			
			var tm_slidestoscroll_1200 = 3;
			var tm_slidestoscroll_768  = 2;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('prt-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			tm_responsive     = [
				{ breakpoint: 1400, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200,
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];	
		
		}
         if( jQuery(this).hasClass('preyantechnosys-element-servicebox-stylethree') ){
			tm_column         = 2;
			tm_slidestoscroll = 2;
			
			var tm_slidestoscroll_1200 = 2;
			var tm_slidestoscroll_992  =1;
			var tm_slidestoscroll_768  =1;
			var tm_slidestoscroll_479  = 1;
			var tm_slidestoscroll_0    = 1;
			if( jQuery(this).data('prt-slidestoscroll')=='1' ){  // slides to scroll
				var tm_slidestoscroll      = 1;
				var tm_slidestoscroll_1200 = 1;
				var tm_slidestoscroll_992  = 1;
				var tm_slidestoscroll_768  = 1;
				var tm_slidestoscroll_479  = 1;
				var tm_slidestoscroll_0    = 1;
			}
			tm_responsive     = [
				{ breakpoint: 1400, settings: {
					slidesToShow  : 2,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_1200,
				} },
				{ breakpoint: 992, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_992
				} },
				{ breakpoint: 768, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_768
				} },
				{ breakpoint: 574, settings: {
					slidesToShow  : 1,
					centerMode: false,
					centerPadding: '0px',
					slidesToScroll: tm_slidestoscroll_479
				} },
				{ breakpoint: 0, settings: {
					slidesToShow  : 1,
					slidesToScroll: tm_slidestoscroll_0
				} }
			];	
		
		}		
		// Fade effect
		var tm_fade = false;
		if( jQuery(this).data('prt-effecttype')=='fade' ){
			tm_fade = true;
		}
		

		// Transaction Speed
		var tm_speed = 4500;
		if( jQuery.trim( jQuery(this).data('prt-speed') ) != '' ){
			tm_speed = jQuery.trim( jQuery(this).data('prt-speed') );
		}
		
		// Autoplay
		var tm_autoplay = false;
		if( jQuery(this).data('prt-autoplay')=='1' ){
			tm_autoplay = true;
		}
		
		// Autoplay Speed
		var tm_autoplayspeed = 4500;
		if( jQuery.trim( jQuery(this).data('prt-autoplayspeed') ) != '' ){
			tm_autoplayspeed = jQuery.trim( jQuery(this).data('prt-autoplayspeed') );
		}
		
		// Loop
		var tm_loop = false;
		if( jQuery.trim( jQuery(this).data('prt-loop') ) == '1' ){
			tm_loop = true;
		}

		// Loop
		var tm_cssease = 'linear';
		if( jQuery.trim( jQuery(this).data('prt-cssease') ) != '' ){
			tm_cssease = jQuery.trim( jQuery(this).data('prt-cssease') );
		}

		
		// Dots
		var tm_dots = false;
		if( jQuery.trim( jQuery(this).data('prt-dots') ) == '1' ){
			tm_dots = true;
		}
		
		// Next / Prev navigation
		var tm_nav = false;
		if( jQuery.trim( jQuery(this).data('prt-nav') ) == '1' || jQuery.trim( jQuery(this).data('prt-nav') ) == 'above' || jQuery.trim( jQuery(this).data('prt-nav') ) == 'below' ){
			tm_nav = true;
		}
		
		// Center mode
		var tm_centermode = false;
		if( jQuery.trim( jQuery(this).data('prt-centermode') ) == '1' ){
			tm_centermode = true;
		}
		
		// Center padding
		var tm_centerpadding = 800;
		if( jQuery.trim( jQuery(this).data('prt-centerpadding') ) != '' ){
			var tm_centerpadding = jQuery.trim( jQuery(this).data('prt-centerpadding') );
		}
		
		// Pause on Focus
		var tm_pauseonfocus = false;
		if( jQuery.trim( jQuery(this).data('prt-pauseonfocus') ) == '1' ){
			tm_pauseonfocus = true;
		}
		
		// Pause on Hover
		var tm_pauseonhover = false;
		if( jQuery.trim( jQuery(this).data('prt-pauseonhover') ) == '1' ){
			tm_pauseonhover = true;
		}

		// rtl
		var tm_rtl = false;
		if( jQuery.trim( jQuery(this).data('prt-rtl') ) == 'true' ){
			tm_rtl = true;
		}

		
		jQuery('.preyantechnosys-boxes-row-wrapper > div', this).removeClass (function (index, css) {
			return (css.match (/(^|\s)col-\S+/g) || []).join(' ');
		});
	
		jQuery('.preyantechnosys-boxes-row-wrapper', this).not('.slick-initialized').slick({
			fade             : tm_fade,
			speed            : tm_speed,
			centerMode       : tm_centermode,
			centerPadding    : tm_centerpadding+'px',
			pauseOnFocus     : tm_pauseonfocus,
			pauseOnHover     : true,
			slidesToShow     : tm_column,
			slidesToScroll   : tm_slidestoscroll,
			autoplay         : tm_autoplay,
			autoplaySpeed    : tm_autoplayspeed,
			rtl              : tm_rtl,
			dots             : tm_dots,
			pauseOnDotsHover : false,
			arrows           : tm_nav,
			adaptiveHeight   : false,
			infinite         : tm_loop,
			cssEase          : tm_cssease,
			initialSlide: 1,
			responsive       : tm_responsive
  
		});
	});
		
	// On resize.. it will re-arrange the Flexslider
	jQuery('.preyantechnosys-boxes-row-wrapper', this).on('setPosition', function(event, slick){
		jQuery( this ).find( ".prt-flexslider" ).each(function(){
			jQuery(this).resize();
		});
	});
	
	// Next button in heading area
	jQuery(".prt-slick-arrow.prt-slick-next", this ).on('click', function(){
		jQuery('.preyantechnosys-boxes-row-wrapper', jQuery(this).closest('.preyantechnosys-boxes-view-carousel') ).slick('slickNext');
	});
	
	// Pre button in heading area
	jQuery(".prt-slick-arrow.prt-slick-prev", this).on('click', function(){
		jQuery('.preyantechnosys-boxes-row-wrapper', jQuery(this).closest('.preyantechnosys-boxes-view-carousel') ).slick('slickPrev');
	});	
	
	
	
	// Testimonials Slick view
	jQuery('.preyantechnosys-boxes-view-slickview').each(function(){

		// Fade effect
		var tm_fade = false;
		if( jQuery(this).data('prt-effecttype')=='fade' ){
			tm_fade = true;
		}
		
		// Transaction Speed
		var tm_speed = 800;
		if( jQuery.trim( jQuery(this).data('prt-speed') ) != '' ){
			tm_speed = jQuery.trim( jQuery(this).data('prt-speed') );
		}
		
		// Autoplay
		var tm_autoplay = false;
		if( jQuery(this).data('prt-autoplay')=='1' ){
			tm_autoplay = true;
		}
		
		// Autoplay Speed
		var tm_autoplayspeed = 2000;
		if( jQuery.trim( jQuery(this).data('prt-autoplayspeed') ) != '' ){
			tm_autoplayspeed = jQuery.trim( jQuery(this).data('prt-autoplayspeed') );
		}
		
		// Loop
		var tm_loop = false;
		if( jQuery.trim( jQuery(this).data('prt-loop') ) == '1' ){
			tm_loop = true;
		}
		
		// Dots
		var tm_dots = false;
		if( jQuery.trim( jQuery(this).data('prt-dots') ) == '1' ){
			tm_dots = true;
		}
		
		// Next / Prev navigation
		var tm_nav = false;
		if( jQuery.trim( jQuery(this).data('prt-nav') ) == '1' ){
			tm_nav = true;
		}
		
	
		var testinav 	= jQuery('.testimonials-nav', this);
		var testiinfo 	= jQuery('.testimonials-info', this);
		
		/* Options for "Owl Carousel 2"
		 * http://owlcarousel.owlgraphic.com/index.html
		 */
		var rtloption = false;
		if( jQuery('body').hasClass('rtl') ){
			rtloption = true;
		}
		
		// Info
		jQuery('.testimonials-info', this).not('.slick-initialized').slick({
			fade			: tm_fade,
			//arrows			: tm_nav,
			arrows			: true,
			asNavFor		: testinav,
			adaptiveHeight	: true,
			speed			: tm_speed,
			autoplay		: tm_autoplay,
			autoplaySpeed	: tm_autoplayspeed,
			infinite		: tm_loop,
			rtl             : rtloption
		});
		// Navigation
	   jQuery('.testimonials-nav', this).not('.slick-initialized').slick({
		    slidesToShow: 3,
			vertical: false,
			verticalScrolling: true,
			asNavFor		: testiinfo,
			centerMode		: true,
			centerPadding	: 0,
			focusOnSelect	: true,
			autoplay		: tm_autoplay,
			autoplaySpeed	: tm_autoplayspeed,
			speed			: tm_speed,
			arrows			: false,
			dots			: tm_dots,
			infinite		: tm_loop,
			rtl             : rtloption
		});
	});
};	
	
var preyantechnosys_coverimgbox = function() {

	jQuery('.prt_coverimgbox_wrapper').each(function(){
		var parentDiv = jQuery(this);

				jQuery('.prt_coverimgbox_wrapper .prt_coverbox_contents:not(.prt-last)').hover(function () {
					jQuery('.prt_coverimgbox_wrapper .prt_coverbox_img').removeClass('active');
				    jQuery(this).next('.prt_coverbox_img').addClass('active');
				});
	});
};	

var preyantechnosys_sliderimgbox = function() {

	jQuery('.tm_sliderimgbox_wrapper').each(function(){
		var parentDiv = jQuery(this);

				jQuery('.tm_sliderimgbox_wrapper .tm_sliderbox_contents').hover(function () {
					jQuery('.tm_sliderimgbox_wrapper .tm_sliderbox_img').removeClass('active');
				    jQuery(this).next('.tm_sliderbox_img').addClass('active');
				});
	});
};	

function preyantechnosys_sticky(){
	
	if( typeof jQuery.fn.stick_in_parent == "function" ){
		
		// Admin bar
		var offset_px = 0;
		if( jQuery('body').hasClass('admin-bar') ){
			offset_px = jQuery('#wpadminbar').height();
		}		

		// Returns width of browser viewport
		var pageWidth = jQuery( window ).width();	
		// setting height for spacer
		
		if( parseInt(pageWidth) > parseInt(tm_breakpoint) ){
			jQuery('.prt-stickable-header').stick_in_parent({'parent':'body', 'spacer':false, 'offset_top':offset_px });	
		} else {
			jQuery('.prt-stickable-header').trigger("sticky_kit:detach");
		}

	
	}
}

function preyantechnosys_setCookie(c_name,value,exdays){
	var now  = new Date();
	var time = now.getTime();
	time    += (3600 * 1000) * 24;
	now.setTime(time);

	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+now.toGMTString() );
	document.cookie=c_name + "=" + c_value;
} // END function preyantechnosys_setCookie

/*------------------------------------------------------------------------------*/
/* Function to set dynamic height of Testimonial columns
/*------------------------------------------------------------------------------*/
function setHeight(column) {
    var maxHeight = 0;
    //Get all the element with class = col
    column = jQuery(column);
    column.css('height', 'auto');
	
	// Responsive condition: Work only in tablet, desktop and other bigger devices.
	if( jQuery( window ).width() > 479 ){
		
		//Loop all the column
		column.each(function() {       
			//Store the highest value
			if(jQuery(this).height() > maxHeight) {
				maxHeight = jQuery(this).height();
			}
		});
		//Set the height
		column.height(maxHeight);
		
	} // if( jQuery( window ).width() > 479 )
} // END function setHeight
/**************************************************************************/

/*------------------------------------------------------------------------------*/
/* Search form on search results page
/*------------------------------------------------------------------------------*/
if( jQuery('.prt-sresult-form-wrapper').length>0 ){

	jQuery('.prt-sresult-form-wrapper .prt-sresults-settings-btn').on('click', function(){
		jQuery('.prt-sresult-form-wrapper .prt-sresult-form-bottom').slideToggle('400',function(){
			if( jQuery('.prt-sresult-form-wrapper .prt-sresult-form-bottom').is(":hidden") ){
				jQuery('.prt-sresult-form-wrapper .prt-sresults-settings-btn').removeClass('prt-sresult-btn-active');
			} else {
				jQuery('.prt-sresult-form-wrapper .prt-sresults-settings-btn').addClass('prt-sresult-btn-active');
			}
		});
		return false;
	});

	// Check if post_type input is available or not
	if(jQuery('.prt-sresult-form-wrapper form.search-form').length > 0 ){
		if( jQuery(".prt-sresult-form-wrapper form.search-form input[name='post_type']").length==0 ){
		
			jQuery('<input>').attr({
				type : 'hidden',
				name : 'post_type'
			}).appendTo('.prt-sresult-form-wrapper form.search-form');
		}
	}

	// On change of the CPT dropdown
	jQuery(".prt-sresult-form-wrapper .prt-sresult-cpt-select").change(function(){
		jQuery(".prt-sresult-form-wrapper form.search-form input[name='post_type']").val( jQuery(this).val() );
	});

	// Submit the form
	jQuery(".prt-sresult-form-wrapper .prt-sresult-form-sbtbtn").on('click', function(){
		jQuery(".prt-sresult-form-wrapper form.search-form").submit();
	});

}

/*------------------------------------------------------------------------------*/
/* Function to Set Blog Masonry view
/*------------------------------------------------------------------------------*/
function preyantechnosys_blogmasonry(){
	if( jQuery().isotope ){
			if( jQuery('.preyantechnosys-boxes.preyantechnosys-boxes-view-default .preyantechnosys-boxes-row-wrapper').length > 0 ){
			
			jQuery('.preyantechnosys-boxes.preyantechnosys-boxes-view-default .preyantechnosys-boxes-row-wrapper.prt-box-masnory').each(function(){
				var thisBoxes   = jQuery(this).closest('.preyantechnosys-boxes');
				var thisWrapper = jQuery(this);
				if( !thisBoxes.hasClass('preyantechnosys-boxes-col-metro') ){
					thisWrapper.isotope({
						itemSelector: '.prt-box-col-wrapper',
						masonry: {
								
						},
						sortBy : 'original-order'
					});
				}
			});
			
		}
	}
}

/*------------------------------------------------------------------------------*/
/* Function to set margin bottom for sticky footer
/*------------------------------------------------------------------------------*/
function preyantechnosys_stickyFooter(){
	if( jQuery('body').hasClass('preyantechnosys-sticky-footer')){
		jQuery('div#content-wrapper').css( 'marginBottom', jQuery('footer#colophon').height() );
	}
}

/*------------------------------------------------------------------------------*/
/* Function to add class to select box if default option selected
/*------------------------------------------------------------------------------*/
function setEmptySelectBox(element){
	if(jQuery(element).val() == ""){
		jQuery(element).addClass("empty");
	} else {
		jQuery(element).removeClass("empty");
	}
}

function preyantechnosys_hide_togle_link(){
	if( jQuery('#navbar div.mega-menu-wrap ul.mega-menu').length > 0 ){
		jQuery('h3.menu-toggle').css('display','none');
	}
}

/*------------------------------------------------------------------------------*/
/* Google Map in Header area
/*------------------------------------------------------------------------------*/
function preyantechnosys_reset_gmap(){
	jQuery('.preyantechnosys-fbar-box-w > div > aside').each(function(){
		var mainthis = jQuery(this);
		jQuery( 'iframe[src^="https://www.google.com/maps/"], iframe[src^="http://www.google.com/maps/"]',mainthis ).each(function(){
			if( !jQuery(this).hasClass('preyantechnosys-set-gmap') ){
				jQuery(this).attr('src',jQuery(this).attr('src')+'');
				jQuery(this).load(function(){
					jQuery(this).addClass('preyantechnosys-set-gmap').animate({opacity: 1 }, 1000 );
				});	

			}
		})
	});
}

function preyantechnosys_hide_gmap(){
	jQuery('.preyantechnosys-fbar-box-w > div > aside').each(function(){
		var mainthis = jQuery(this);
		jQuery( 'iframe[src^="https://www.google.com/maps/"], iframe[src^="http://www.google.com/maps/"]',mainthis ).each(function(){
			if( !jQuery(this).hasClass('preyantechnosys-set-gmap') ){
				jQuery(this).css({opacity: 0});				
				jQuery(this).css('display', 'block');
			}
		})
	});
}	
	
function preyantechnosys_isotope() {
	jQuery('.preyantechnosys-sortable-yes').each(function(){	
		var gallery_item = jQuery('.preyantechnosys-boxes-row-wrapper', this );
		var filterLinks  = jQuery('.prt-sortable-wrapper a', this );			
		gallery_item.isotope({
			animationEngine : 'best-available'
		})
		filterLinks.on('click', function(e){
			var selector = jQuery(this).attr('data-filter');
			gallery_item.isotope({
				filter : selector,
				itemSelector : '.isotope-item'
			});

			filterLinks.removeClass('selected');
			jQuery('#filter-by li').removeClass('current-cat');
			jQuery(this).addClass('selected');
			e.preventDefault();
		});
		
	});
};	


/* ====================================== */
/* Animate on scroll : Number rotator
/* ====================================== */
var tm_number_rotate = function() {
	jQuery(".prt-number-rotate").each(function() {
		var self      = jQuery(this);
		var delay     = (self.data("appear-animation-delay") ? self.data("appear-animation-delay") : 0);
		var animation = self.data("appear-animation");

		if( jQuery(window).width() > 959 ) {
			self.html('0');
			self.waypoint(function(direction) {
				if( !self.hasClass('completed') ){
					var from     = self.data('from');
					var to       = self.data('to');
					var interval = self.data('interval');
					self.numinate({
						format: '%counter%',
						from: from,
						to: to,
						runningInterval: 2000,
						stepUnit: interval,
						onComplete: function(elem) {
							self.addClass('completed');
						}
					});
				}
			}, { offset:'85%' });
		} else {
			if( animation == 'animateWidth' ) {
				self.css('width', self.data("width"));
			}
		}
	});
};


/* ============================================== */
/* BG Image yes class in each Section and Column
/* ============================================== */
 var tm_bgimage_class = function() {
	jQuery('.elementor-section').each(function() {
		if( jQuery(this).css('background-image')!='' && jQuery(this).css('background-image')!='none' ){
			jQuery(this).addClass('prt-bgimage-yes' ).removeClass('prt-bgimage-no' );
		} else {
			jQuery(this).addClass('prt-bgimage-no' ).removeClass('prt-bgimage-yes' );
		}
	});
	jQuery('.elementor-column').each(function() {
		if( jQuery(this).children('.elementor-widget-wrap').children('.prt-stretched-div').length ){
			if( jQuery(this).children('.elementor-widget-wrap').children('.prt-stretched-div').css('background-image')!='' && jQuery(this).children('.elementor-widget-wrap').children('.prt-stretched-div').css('background-image')!='none' ){
				jQuery(this).addClass('prt-bgimage-yes' ).removeClass('prt-bgimage-no' );
			} else {
				jQuery(this).addClass('prt-bgimage-no' ).removeClass('prt-bgimage-yes' );
			}
		} else {
			if( jQuery(this).children('.elementor-widget-wrap').css('background-image')!='' && jQuery(this).children('.elementor-widget-wrap').css('background-image')!='none' ){
				jQuery(this).addClass('prt-bgimage-yes' ).removeClass('prt-bgimage-no' );
			} else {
				jQuery(this).addClass('prt-bgimage-no' ).removeClass('prt-bgimage-yes' );
			}
		}
	});
}; 

/* ============================================== */
/* BG Color yes class in each Section and Column
/* ============================================== */
var tm_bgcolor_class = function() {
	var section_idd ='';	
	jQuery('.elementor-section').each(function() {
		if( jQuery(this).css('background-color')!='' && jQuery(this).css('background-color')!='transparent' ){
			jQuery(this).addClass('prt-bgcolor-yes');
		}

		if( jQuery(this).hasClass('prt-highlight-bg-yes')){
			section_idd = jQuery(this).attr("data-id");
			jQuery(this).append( '<div class="prt-section-hili-dot prt-hilidot-left prt-highlight-bg-'+section_idd+'" ></div>' );
			jQuery(this).append( '<div class="prt-section-hili-dot prt-hilidot-right prt-highlight-bg-'+section_idd+'" ></div>' );
		}


	});
	jQuery('.elementor-column').each(function() {
		if( jQuery(this).children('.prt-stretched-div').length ){
			if( jQuery(this).children('.prt-stretched-div').css('background-color')!='' && jQuery(this).children('.prt-stretched-div').css('background-color')!='transparent' ){
				jQuery(this).addClass('prt-bgcolor-yes' ).removeClass('prt-bgcolor-no' );
			} else {
				jQuery(this).addClass('prt-bgcolor-no' ).removeClass('prt-bgcolor-yes' );
			}
		} else {
			if( jQuery(this).children('.elementor-widget-wrap').css('background-color')!='' && jQuery(this).children('.elementor-widget-wrap').css('background-color')!='transparent' ){
				jQuery(this).addClass('prt-bgcolor-yes' ).removeClass('prt-bgcolor-no' );
			} else {
				jQuery(this).addClass('prt-bgcolor-no' ).removeClass('prt-bgcolor-yes' );
			}
		}
	});
};


var tm_tabbox_class = function() {
	var tabs = '';
	var tab_number = '';
	jQuery('.prt-elementor-tabs').each(function(){
		tabs = jQuery(this);
		jQuery('.prt-elementor-tab-title', tabs).on('click', function(){
			if( !jQuery( this ).hasClass('prt-tab-active') ){
				jQuery('.prt-elementor-tab-title', tabs).removeClass('prt-tab-active');
				jQuery( this ).addClass('prt-tab-active');

				tab_number = jQuery( this ).data('prt-tab');
				jQuery('.prt-tab-content', tabs).removeClass('prt-tab-active');
				jQuery('.prt-tab-content-'+tab_number, tabs).addClass('prt-tab-active');
			}
		});

		jQuery('.prt-tab-content-title', tabs).on('click', function(){
			tab_number = jQuery( this ).data('prt-tab');
			jQuery('li.prt-elementor-tab-title[data-prt-tab="'+tab_number+'"]').trigger('click');
		});
	});
};

/* ====================================== */
/* Reset and rearrange Stretched Column
/* ====================================== */
var tm_rearrange_stretched_col = function( model_id ) {
	if( jQuery('body').hasClass('elementor-editor-active') ){
		jQuery( '*[data-id="'+model_id+'"]' ).each(function(){
			jQuery('.prt-stretched-div', this).remove();
			jQuery('.elementor-widget-wrap', this).removeAttr('style');
			setTimeout(function(){ tm_stretched_col(); }, 50);
		});	
	}
}

/* ====================================== */
/* Stretched Column
/* ====================================== */
var tm_stretched_col = function() {

	jQuery('.elementor-section.elementor-top-section').each(function(){
		if( jQuery(this).hasClass('prt-col-stretched-left') || jQuery(this).hasClass('prt-col-stretched-right') || jQuery(this).hasClass('prt-col-stretched-both') ){
			jQuery(this).addClass('prt-col-stretched-yes').removeClass('prt-col-stretched-no');
		} else {
			jQuery(this).addClass('prt-col-stretched-no').removeClass('prt-col-stretched-yes');
		}
	});

	// remove all stretched related changes in each column
	jQuery('.elementor-section.elementor-top-section').each(function(){
		var ThisSection = jQuery(this);
		var ThisColumn	= '';
		jQuery( '.elementor-column:not(.elementor-inner-column)', ThisSection ).each(function(){
			ThisColumn	= jQuery(this);
			jQuery( '.prt-stretched-div', ThisColumn ).remove();
			ThisColumn.removeClass('prt-col-stretched-yes prt-col-stretched-left prt-col-stretched-right prt-col-stretched-content-yes');
		});
	});

	jQuery('.elementor-section.prt-col-stretched-yes.elementor-top-section').each(function(){

		var ThisSection		= jQuery(this);
		var ThisColumn		= '';
		var ColWrapper		= '';
		var StretchedEle	= '';

		if( ThisSection.hasClass('prt-col-stretched-left') || ThisSection.hasClass('prt-col-stretched-both') ){
			ThisColumn = jQuery( '.elementor-column:not(.elementor-inner-column):first-child', ThisSection );
			
			if( jQuery('.prt-stretched-div', ThisColumn).length==0 ){
				ColWrapper = ThisColumn.children('.elementor-widget-wrap');
				ColWrapper.prepend( '<div class="prt-stretched-div"></div>' );

				// Stretched Element
				StretchedEle = ColWrapper.children('.prt-stretched-div');

				StretchedEle.addClass( 'prt-stretched-left' );
				ThisColumn.addClass('prt-col-stretched-yes prt-col-stretched-left');

				if( ThisSection.hasClass('prt-left-col-stretched-content-yes') ){
					ThisColumn.addClass('prt-col-stretched-content-yes');
				} else {
					ThisColumn.removeClass('prt-col-stretched-content-yes');
				}

				// background move to stretched div
				ColWrapper.css('background-image', '');
				var bgImage =  ColWrapper.css('background-image');
				if( bgImage!='none' && bgImage!='' ){
					StretchedEle.css('background-image', bgImage );
					ColWrapper.css('background-image', 'none');
				}

				// border radious
				ColWrapper.css('border-top-left-radius', '');
				ColWrapper.css('border-top-right-radius', '');
				ColWrapper.css('border-bottom-left-radius', '');
				ColWrapper.css('border-bottom-right-radius', '');
				var radius_t_left  =  ColWrapper.css('border-top-left-radius');
				var radius_t_right =  ColWrapper.css('border-top-right-radius');
				var radius_b_left  =  ColWrapper.css('border-bottom-left-radius');
				var radius_b_right =  ColWrapper.css('border-bottom-right-radius');
				if( radius_t_left!='0' && radius_t_left!='' ){
					StretchedEle.css('border-top-left-radius', radius_t_left );
					ColWrapper.css('border-top-left-radius', '0');
				}
				if( radius_t_right!='0' && radius_t_right!='' ){
					StretchedEle.css('border-top-right-radius', radius_t_right );
					ColWrapper.css('border-top-right-radius', '0');
				}
				if( radius_b_left!='0' && radius_b_left!='' ){
					StretchedEle.css('border-bottom-left-radius', radius_b_left );
					ColWrapper.css('border-bottom-left-radius', '0');
				}
				if( radius_b_right!='0' && radius_b_right!='' ){
					StretchedEle.css('border-bottom-right-radius', radius_b_right );
					ColWrapper.css('border-bottom-right-radius', '0');
				}



				// Background Color
				var bgColor = ColWrapper.css('background-color');
				if( bgColor!='' ){
					StretchedEle.css('background-color', bgColor );
					ColWrapper.css('background-color', 'transparent');
				}

				// Background Position
				var bgPosition = ColWrapper.css('background-position');
				if( bgPosition!='' ){
					StretchedEle.css('background-position', bgPosition );
				}

				// Background Repeat
				var bgRepeat = ColWrapper.css('background-repeat');
				if( bgRepeat!='' ){
					StretchedEle.css('background-repeat', bgRepeat );
				}

				// Background Size
				var bgSize = ColWrapper.css('background-size');
				if( bgSize!='' ){
					StretchedEle.css('background-size', bgSize );
				}

				tm_stretched_col_calc();

			}

		}

		if( ThisSection.hasClass('prt-col-stretched-right') || ThisSection.hasClass('prt-col-stretched-both') ){
			ThisColumn = jQuery( '.elementor-column:not(.elementor-inner-column):last-child', ThisSection );
	
			if( jQuery('.prt-stretched-div', ThisColumn).length==0 ){
				ColWrapper = ThisColumn.children('.elementor-widget-wrap');
				ColWrapper.prepend( '<div class="prt-stretched-div"></div>' );
	
				// Stretched Element
				StretchedEle = ColWrapper.children('.prt-stretched-div');

				StretchedEle.addClass( 'prt-stretched-right' );
				ThisColumn.addClass('prt-col-stretched-yes prt-col-stretched-right');

				if( ThisSection.hasClass('prt-right-col-stretched-content-yes') ){
					ThisColumn.addClass('prt-col-stretched-content-yes');
				} else {
					ThisColumn.removeClass('prt-col-stretched-content-yes');
				}

				// background move to stretched div
				ColWrapper.css('background-image', '');
				var bgImage = ColWrapper.css('background-image');
				if( bgImage!='none' && bgImage!='' ){
					StretchedEle.css('background-image', bgImage );
					ColWrapper.css('background-image', 'none');
				}

				// border radious
				ColWrapper.css('border-top-left-radius', '');
				ColWrapper.css('border-top-right-radius', '');
				ColWrapper.css('border-bottom-left-radius', '');
				ColWrapper.css('border-bottom-right-radius', '');
				var radius_t_left  =  ColWrapper.css('border-top-left-radius');
				var radius_t_right =  ColWrapper.css('border-top-right-radius');
				var radius_b_left  =  ColWrapper.css('border-bottom-left-radius');
				var radius_b_right =  ColWrapper.css('border-bottom-right-radius');
				if( radius_t_left!='0' && radius_t_left!='' ){
					StretchedEle.css('border-top-left-radius', radius_t_left );
					ColWrapper.css('border-top-left-radius', '0');
				}
				if( radius_t_right!='0' && radius_t_right!='' ){
					StretchedEle.css('border-top-right-radius', radius_t_right );
					ColWrapper.css('border-top-right-radius', '0');
				}
				if( radius_b_left!='0' && radius_b_left!='' ){
					StretchedEle.css('border-bottom-left-radius', radius_b_left );
					ColWrapper.css('border-bottom-left-radius', '0');
				}
				if( radius_b_right!='0' && radius_b_right!='' ){
					StretchedEle.css('border-bottom-right-radius', radius_b_right );
					ColWrapper.css('border-bottom-right-radius', '0');
				}

				// Background Color
				var bgColor = ColWrapper.css('background-color');
				if( bgColor!='' ){
					StretchedEle.css('background-color', bgColor );
					ColWrapper.css('background-color', 'transparent');
				}

				// Background Position
				var bgPosition = ColWrapper.css('background-position');
				if( bgPosition!='' ){
					StretchedEle.css('background-position', bgPosition );
				}

				// Background Repeat
				var bgRepeat = ColWrapper.css('background-repeat');
				if( bgRepeat!='' ){
					StretchedEle.css('background-repeat', bgRepeat );
				}

				// Background Size
				var bgSize = ColWrapper.css('background-size');
				if( bgSize!='' ){
					StretchedEle.css('background-size', bgSize );
				}

				tm_stretched_col_calc();

			}
		}

	});

};

var tm_stretched_col_calc = function() {

	// padding left or right
	if( jQuery('.elementor-section.elementor-top-section > .elementor-container > .elementor-column.prt-col-stretched-yes').length>0 ){

		// Returns width of browser viewport
		var window_width = jQuery( window ).width();

		// Returns width of HTML document
		var document_width = jQuery( document ).width();

		jQuery('.elementor-section.elementor-top-section > .elementor-container > .elementor-column.prt-col-stretched-yes').each(function(){
	
			var this_ele    = jQuery(this);
			var curr_width  = jQuery(this).closest('.elementor-container').width();
			var extra_width = ((window_width - curr_width)/2);
			var parent_width = '';

			var position = 'left';
			if( jQuery(this).hasClass('prt-col-stretched-right') ){
				position = 'right';
			}

			// set width to 100% if parent is 100%
			parent_width = jQuery('.elementor-widget-wrap', jQuery(this)).parent().width();
			if( parent_width == '100%' ){
				jQuery('.elementor-widget-wrap', jQuery(this)).css('width','100%');
			} else {
				jQuery('.elementor-widget-wrap', jQuery(this)).css('width','');
			}

			jQuery('.prt-stretched-div', jQuery(this)).css( 'margin-'+position,'-'+extra_width+'px' );

			// stretched column content too
			if( jQuery(this).hasClass('prt-col-stretched-content-yes') ){
				var stretched_width = jQuery('.prt-stretched-div', jQuery(this) ).width();
				jQuery(this).children('.elementor-widget-wrap').css( 'margin-'+position,'-'+extra_width+'px' );
				jQuery(this).children('.elementor-widget-wrap').css( 'width', stretched_width+'px' );
			} else {
				jQuery(this).children('.elementor-widget-wrap').css( 'margin-'+position,'' );
				jQuery(this).children('.elementor-widget-wrap').css( 'width', '' );
			}
		});
	}

}

jQuery(window).resize(function() {
		
	/*------------------------------------------------------------------------------*/
	/*  Timeline view
	/*------------------------------------------------------------------------------*/	
	
	setTimeout(function() {
		tm_stretched_col_calc();
	}, 100);
	
	
	/*------------------------------------------------------------------------------*/
	/* onResize: Set height of boxes inside row-column view of Blog and Portfolio
	/*------------------------------------------------------------------------------*/
	if( jQuery('.preyantechnosys-testimonial-box' ).length > 0 ){
		setHeight('.preyantechnosys-testimonial-box.col-lg-4.col-sm-6.col-md-4');
		setHeight('.preyantechnosys-testimonial-box.col-lg-6.col-sm-6.col-md-6');
		setHeight('.preyantechnosys-testimonial-box.col-lg-3.col-sm-6.col-md-3');
	}
	
	/*------------------------------------------------------------------------------*/
	/* Call header sticky function
	/*------------------------------------------------------------------------------*/
	preyantechnosys_sticky();
	
		
	
});  // END of window.resize


jQuery( document ).ready(function($) {
	
	"use strict";
	tm_stretched_col();
	tm_stretched_col_calc();
	tm_bgimage_class();
	tm_bgcolor_class();
	tm_number_rotate();
	tm_tabbox_class();
	/*------------------------------------------------------------------------------*/
	/* Floating Bar code
	/*------------------------------------------------------------------------------*/

	preyantechnosys_hide_gmap();
	
		
// Top btn click event
	jQuery(".preyantechnosys-fbar-btn > a.preyantechnosys-fbar-btn-link").on('click', function(){		
		if( jQuery(this).closest('.preyantechnosys-fbar-main-w').hasClass('preyantechnosys-fbar-position-default') ){
			// Fbar top position
			if( jQuery('.preyantechnosys-fbar-box-w').css('display')=='none' ){
				jQuery('.prt-fbar-open-icon', this).fadeOut();
				jQuery('.prt-fbar-close-icon', this).fadeIn();
				
				jQuery('.preyantechnosys-fbar-box-w').slideDown();
			} else {
				jQuery('.prt-fbar-open-icon', this).fadeIn();
				jQuery('.prt-fbar-close-icon', this).fadeOut();
				
				jQuery('.preyantechnosys-fbar-box-w').slideUp();
			}
		} else {
			// Fbar right position
		}		
		
		return false;
	});	
		
	// Right btn click event
	jQuery('.prt-fbar-close, .preyantechnosys-fbar-btn > a.preyantechnosys-fbar-btn-link, .prt-float-overlay').on('click', function(){
		jQuery('.preyantechnosys-fbar-box-w').toggleClass('animated');
		jQuery('.prt-float-overlay').toggleClass('animated');
		jQuery('.preyantechnosys-fbar-btn').toggleClass('animated');		
	});
	
	/*------------------------------------------------------------------------------*/
	/* Masonry View settings
	/*------------------------------------------------------------------------------*/
	preyantechnosys_blogmasonry();
		
	
	jQuery('.prt-mmmenu-override-yes #site-navigation .mega-menu-wrap > ul > li.menu-item-language ul').addClass("mega-sub-menu");		
	jQuery('.prt-mmmenu-override-yes #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal > li.menu-item-language > a').show();
	jQuery('.prt-mmmenu-override-yes #site-navigation .mega-menu-wrap > ul > li.menu-item-language').hover(
         function () {			 		 
		   jQuery('.prt-mmmenu-override-yes #navbar #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-menu-flyout .mega-sub-menu').css("display", "none");	
           jQuery(this).find('ul').show();		   
         }, 
         function () {
           jQuery(this).find('ul').hide();
         }
     );
	
	
	jQuery('.menu li.current-menu-item').parents('li.mega-menu-megamenu').addClass('mega-current-menu-ancestor');	
	if (!jQuery('body').hasClass("prt-header-invert")) {	
		
		jQuery( ".prt-headerstyle-classic-highlight div.nav-menu ul:not(.children,.sub-menu)>li:eq(-4)" ).addClass( "lastfourth" );
		jQuery( ".prt-headerstyle-classic-highlight div.nav-menu ul:not(.children,.sub-menu)>li:eq(-3)" ).addClass( "lastthird" );
		
		jQuery( ".nav-menu ul:not(.children,.sub-menu) > li:eq(-2), #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li:eq(-2)" ).addClass( "lastsecond" );
		jQuery( ".nav-menu ul:not(.children,.sub-menu) > li:eq(-1), #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li:eq(-1)" ).addClass( "last" );	
	}	
		
	jQuery( ".widget_nav_menu li a" ).each(function() {
			if(!jQuery(this).attr('href')) {
				jQuery(this).closest("li").addClass("empty_link");
			}
		});
	
	/*------------------------------------------------------------------------------*/
	/* adding prettyPhoto in Gallery
	/*------------------------------------------------------------------------------*/
	jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({hook: 'data-gal'});
		
	/*------------------------------------------------------------------------------*/
	/* Revolution Slider - Removing extra margin for no slider message
	/*------------------------------------------------------------------------------*/
	jQuery( ".preyantechnosys-slider-wrapper > div > div > div:contains('Revolution Slider Error')" ).css( "margin-top", "0" );
		
	
	/*------------------------------------------------------------------------------*/
	/* Select2 library for all SELECT element
	/*------------------------------------------------------------------------------*/
	jQuery('select').select2();
		
			 	
	 /*------------------------------------------------------------------------------*/
	 /* Applying prettyPhoto to all images
	 /*------------------------------------------------------------------------------*/
	if( typeof jQuery.fn.prettyPhoto == "function" ){
				
		// Gallery
		jQuery('div.gallery a[href*=".jpg"], div.gallery a[href*=".jpeg"], div.gallery a[href*=".png"], div.gallery a[href*=".gif"]').each(function(){
			if( jQuery(this).attr('target')!='_blank' ){
				jQuery(this).attr('rel','prettyPhoto[wp-gallery]');
			}
		});
		
		// WordPress Gallery
		jQuery('.gallery-item a[href*=".jpg"], .gallery-item a[href*=".jpeg"], .gallery-item a[href*=".png"], .gallery-item a[href*=".gif"]').each(function(){
			if( jQuery(this).attr('target')!='_blank' ){
				jQuery(this).attr('rel','prettyPhoto[coregallery]');
			}
		});
		
		// Normal link
		jQuery('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function(){
			if( jQuery(this).attr('target')!='_blank' && !jQuery(this).hasClass('prettyphoto') ){
				var attr = $(this).attr('rel');
				if (typeof attr !== typeof undefined && attr !== false && attr!='prettyPhoto' ) {
					jQuery(this).attr('data-rel','prettyPhoto');
				}
			}
		});		

		jQuery('a[data-rel^="prettyPhoto"]').prettyPhoto();
		jQuery('a.prt_prettyphoto, div.prt_prettyphoto a').prettyPhoto();
		jQuery('a[rel^="prettyPhoto"]').prettyPhoto();

		
		/*------------------------------------------------------------------------------*/
		/* Settting for lightbox content in Portfolio slider
		/*------------------------------------------------------------------------------*/
		jQuery("a.preyantechnosys-open-gallery").on('click', function(){
			var id   = jQuery(this).data('id');
			var currid = window[ 'api_images_' + id ];
			jQuery.prettyPhoto.open( window[ 'api_images_' + id ] , window[ 'api_titles_' + id ] , window[ 'api_desc_' + id ] );
		});
		
	}

	/*------------------------------------------------------------------------------*/
	/* Set height of boxes inside row-column view of Blog and Portfolio
	/*------------------------------------------------------------------------------*/
	if( jQuery('.preyantechnosys-testimonial-box' ).length > 0 ){
		setHeight('.preyantechnosys-testimonial-box.col-lg-6.col-sm-6.col-md-6');
		setHeight('.preyantechnosys-testimonial-box.col-lg-4.col-sm-6.col-md-4');
		setHeight('.preyantechnosys-testimonial-box.col-lg-3.col-sm-6.col-md-3');
	}
	
	/*------------------------------------------------------------------------------*/
	/* Sticky
	/*------------------------------------------------------------------------------*/
	if( jQuery('.prt-stickable-header').length > 0 ){		

		preyantechnosys_sticky();
	}	

	/*------------------------------------------------------------------------------*/
	/* Return Fasle when # Url
	/*------------------------------------------------------------------------------*/
	$('#site-navigation a[href="#"]').on('click', function(){return false;});
	
	
	/*------------------------------------------------------------------------------*/
	/* Welcome bar close button
	/*------------------------------------------------------------------------------*/
	$(".preyantechnosys-close-icon").on('click', function(){
		$("#page").css('padding-top', (parseInt($("#page").css('padding-top')) - parseInt($(".preyantechnosys-wbar").height()) ) + 'px' );
		$(".preyantechnosys-wbar").slideUp();
		preyantechnosys_setCookie('kw_hidewbar','1',1);
	});

	/*------------------------------------------------------------------------------*/
	/* Removing BR tag added by shortcode generator
	/*------------------------------------------------------------------------------*/
	var galleryHTML = jQuery(".gallery-size-full br").each(function(){
		jQuery(this).remove();
	});	

	/*------------------------------------------------------------------------------*/
	/* Settting for lightbox content in Blog
	/*------------------------------------------------------------------------------*/
	jQuery("a.preyantechnosys-open-gallery").on('click', function(){
		var href   = jQuery(this).attr('href');
		var id     = href.replace("#preyantechnosys-embed-code-", "");
		var currid = window[ 'api_images_' + id ];
		jQuery.prettyPhoto.open( window[ 'api_images_' + id ] , window[ 'api_titles_' + id ] , window[ 'api_desc_' + id ] );
	});
			
	/*-----------------------------------------------------------------------------------*/
	/*	Isotope
	/*-----------------------------------------------------------------------------------*/
	if( jQuery().isotope ){
		jQuery(window).load(function () {
			"use strict";
			preyantechnosys_isotope();	
BurgerMenu();			
		});
		jQuery(window).resize(function(){
			BurgerMenu();
			preyantechnosys_isotope();
		});
	}
	
	
	
	/*------------------------------------------------------------------------------*/
	/* Sticky Footer
	/*------------------------------------------------------------------------------*/
	jQuery('footer#colophon').resize(function(){
		preyantechnosys_stickyFooter();
	});
	preyantechnosys_stickyFooter();	
	preyantechnosys_hide_togle_link();
	
	jQuery( "#prt-header-slider > div > div:contains('Revolution Slider Error')" ).css( "margin", "auto" );
	
	
	
	/*------------------------------------------------------------------------------*/
	/* One Page setting
	/*------------------------------------------------------------------------------*/	
	if( jQuery('body').hasClass('preyantechnosys-one-page-site') ){
		var sections = jQuery('.elementor-section, #prt-header-slider'),
		nav          = jQuery('.mega-menu-wrap, div.nav-menu'),
		nav_height   = jQuery('#site-navigation').data('sticky-height')-1;
		
		jQuery(window).on('scroll', function () {
			
			// active first menu
			if( jQuery('body').scrollTop() < 5 ){
				nav.find('a').parent().removeClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');						
				nav.find('a[href="#prt-home"]').parent().addClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');
			}			
				
				var cur_pos = jQuery(this).scrollTop(); 
				sections.each(function() {
					
					var top = jQuery(this).offset().top - (nav_height+2),
					bottom = top + jQuery(this).outerHeight(); 
		
					if (cur_pos >= top && cur_pos <= bottom) {

						if( typeof jQuery(this) != 'undefined' && typeof jQuery(this).attr('id')!='undefined' && jQuery(this).attr('id')!='' ){
							
							var mainThis = jQuery(this);							
							nav.find('a').removeClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');						
							jQuery(this).addClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');
							var arr = mainThis.attr('id');							
							
							// Applying active class
							nav.find('a').parent().removeClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');
							nav.find('a').each(function(){
								var menuAttr = jQuery(this).attr('href').split('#')[1];						
								if( menuAttr == arr ){
									jQuery(this).parent().addClass('mega-current-menu-item mega-current_page_item current-menu-ancestor current-menu-item current_page_item');
								}
							})
						
						}
					}
				});
			//}
		});
		
		nav.find('a').on('click', function () {
			var $el = jQuery(this), 
			id = $el.attr('href');
			var arr=id.split('#')[1];	  
			jQuery('html, body').animate({
				scrollTop: jQuery('#'+ arr).offset().top - nav_height
			}, 500);  
			return false;
		});
		
	}
	
} ); // END of  document.ready



jQuery(window).load(function(){

	"use strict";
	
	/*------------------------------------------------------------------------------*/
	/* Masonry View settings
	/*------------------------------------------------------------------------------*/
	preyantechnosys_blogmasonry();
	
	/*------------------------------------------------------------------------------*/
	/* Hide pre-loader
	/*------------------------------------------------------------------------------*/
	function preyantechnosys_preloader_fade_out(){ jQuery( '.prt-page-loader-wrapper' ).fadeOut( 1000 ); }
	if ( jQuery( '.prt-page-loader-wrapper' ).length > 0 ) {
		setTimeout(preyantechnosys_preloader_fade_out, 100);
	}
				
	/*------------------------------------------------------------------------------*/
	/* Hide page-loader on load.
	/*------------------------------------------------------------------------------*/
	jQuery('#pageoverlay').fadeOut(500);
	
	/*------------------------------------------------------------------------------*/
	/* IsoTope
	/*------------------------------------------------------------------------------*/
	var $container = jQuery('.portfolio-wrapper');
	$container.isotope({
		filter: '*',
		animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false,
		}
	});
	jQuery('nav.portfolio-sortable-list ul li a').on('click', function(){
		var selector = jQuery(this).attr('data-filter');
		$container.isotope({
			filter: selector,
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false,
			}
		});
		// Selected class
		jQuery('nav.portfolio-sortable-list').find('a.selected').removeClass('selected');
		jQuery(this).addClass('selected'); 
		return false;
	});
	
	/*------------------------------------------------------------------------------*/
	/* Nivo Slider
	/*------------------------------------------------------------------------------*/
	if( jQuery('.preyantechnosys-slider-wrapper .nivoSlider').length>0 ){
		jQuery('.preyantechnosys-slider-wrapper .nivoSlider').nivoSlider();
	}
	
	
	
	/*------------------------------------------------------------------------------*/
	/* Responsive Menu : Open by clicking on the menu text too
	/*------------------------------------------------------------------------------*/
	jQuery('.righticon').each(function() {
		var mainele = this;
		if( jQuery( mainele ).prev().prev().length > 0 ){
			if( jQuery( mainele ).prev().prev().attr('href')=='#' ){
				jQuery( mainele ).prev().prev().on('click', function(){
					jQuery( mainele ).trigger( "click" );
				});
			}
		}
	});
	
	
	/*------------------------------------------------------------------------------*/
	/* Blog masonry view for 2, 3 and 4 columns
	/*------------------------------------------------------------------------------*/
	preyantechnosys_blogmasonry();	

		jQuery(".preyantechnosys-fbar-content-wrapper").perfectScrollbar({
			suppressScrollX:true,
			includePadding:true
		});
		
		jQuery(".prt-header-style-classic-vertical .prt-header-block").perfectScrollbar({
			suppressScrollX:true,
			includePadding:true
		});
	

}); // END of window.load


 jQuery(document).ready(function() {

		setTimeout(function(){
			preyantechnosys_carousel();
			preyantechnosys_coverimgbox();
		}, 100);


		 
		jQuery( ".prt_listimgbox_wrapper .prt_listimgbox_wrap" ).each(function() {
			jQuery( ".prt-box-title",jQuery(this)).hover(function() {
				jQuery('.prt_listimgbox_wrapper .prt_listimgbox_wrap').removeClass("active");
				jQuery(this).parent().addClass("active");
			});
		});
	
 });


 jQuery(document).ready(function() {
   
		setTimeout(function(){
			preyantechnosys_carousel();
			preyantechnosys_sliderimgbox();
		}, 100);
	
		jQuery('.preyantechnosys-element-blogbox-style1 .preyantechnosys-boxes-row-wrapper .prt-box-col-wrapper:first').addClass("active");
		 jQuery('.preyantechnosys-element-blogbox-style1 .preyantechnosys-boxes-row-wrapper .prt-box-col-wrapper').hover(function(){
		 	jQuery('.preyantechnosys-element-blogbox-style1 .preyantechnosys-boxes-row-wrapper .prt-box-col-wrapper').removeClass("active");
			jQuery(this).addClass("active");
		 });
		 
});

jQuery(document).ready(function() {
   
		setTimeout(function(){
			preyantechnosys_carousel();
			preyantechnosys_sliderimgbox();
		}, 100);
	
});


jQuery(document).ready(function() {
  var $window = jQuery(window);  
  var $sidebar = jQuery(".prt-pf-view-left-image .preyantechnosys-pf-single-detail-box"); 
  var $sidebarHeight = $sidebar.innerHeight();   
  var $footerOffsetTop = jQuery(".prt-pf-view-left-image .prt-pf-single-content-area"); 
  var $sidebarOffset = $sidebar.offset();
  
  $window.scroll(function() {
    if($window.scrollTop() > $sidebarOffset) {
      $sidebar.addClass("fixed");   
    } else {
      $sidebar.removeClass("fixed");   
    }    
    if($window.scrollTop() + $sidebarHeight > $footerOffsetTop) {
      $sidebar.css({"top" : ($window.scrollTop() + $sidebarHeight - $footerOffsetTop +30)});        
    } else  {
      $sidebar.css({"top": "0",});  
    } 
	if( jQuery('.site-header').hasClass('is_stuck') ){
     	var logowidthsticky = jQuery('.prt-header-style-classic.prt-header-overlay .is_stuck .headerlogo').width();	
		jQuery('.prt-header-style-classic.prt-header-overlay .is_stuck .nav-menu').css( 'margin-left',''+logowidthsticky+'px' );
	}	
	else {
		var logowidthsticky = jQuery('.prt-header-style-classic.prt-header-overlay .headerlogo').width();	
		jQuery('.prt-header-style-classic.prt-header-overlay .nav-menu').css( 'margin-left',''+logowidthsticky+'px' );
	}	
  });   

  });  


if(jQuery('.curved-circle').length) {
    jQuery('.curved-circle').circleType({position: 'absolute', dir: 1, radius: 62, forceHeight: true, forceWidth: true});
}

jQuery(window).load(function(){

	var $li = jQuery('.footer_customheading span');
    $li.hide().first().show().addClass('active');

    function footerloop() {
        jQuery('.footer_customheading .active').each(function(index){
            var $this = jQuery(this);
            var $next = $this.next().length > 0 ? $this.next() : $li.first();

            $this.hide().removeClass('active');
            $next.show().addClass('active');

            if( $next.index() == 0) {
                //clearInterval(myTimer);
                setTimeout(function(){
                    //myTimer=setInterval(function(){loop()},1000);
                }, 3000);
            }
        });
    }

    setInterval(function(){footerloop()},2000);//timer running every 2 seconds

});

function typetext() {
var type_list = document.querySelector( '#typed_lists' );

  if( type_list ) {
    var typed = new Typed('#typed', {
      stringsElement: '#typed_lists',
      typeSpeed: 50,
      backSpeed: 50,
      cursorChar: '_',
      loop: true
    });
  }
 }

 jQuery(window).load(function(){
 	typetext();
 });



 /**/

 preyantechnosys_activity_slider();
function preyantechnosys_activity_slider(){  
    
    jQuery(".prt-recent-activities").not('.slick-initialized').slick({
    	autoplay: true,
		autoplaySpeed: 0,
		cssEase: 'linear',
		slidesToShow: 5,
		slidesToScroll: 1,
		variableWidth: true,
        speed: 4700,
        infinite: true,
        arrows: false,
        dots: false,                   
        centerMode : false,
        adaptiveHeight: true,
        rtl  : false,
		draggable: false,
		swipe: false,
		pauseOnHover:false
    });
}


/*------------------------------------------------------------------------------*/


gsap.registerPlugin(ScrollTrigger, SplitText);
gsap.config({
    nullTargetWarn: false,
    trialWarn: false
});
/*----  Functions  ----*/
function ts_hover_img() {
    const tsHoverImg = gsap.utils.toArray(".preyantechnosys-obitrius-style1");
    tsHoverImg.forEach((target) => {
        const tsImg = target.querySelector('.prt-animation-hover-img');
        const t1 = gsap.timeline();
        t1.to(tsImg, {
            opacity: 1,
            duration: 0.4,
            scale: 1,
            ease: "Power2.easeOut"
        })
        target.tsHoverAnim = t1.play().reversed(true);
        target.addEventListener("mouseenter", tshoverimg);
        target.addEventListener("mouseleave", tshoverimg);
        target.addEventListener("mousemove", (e) => {
            let xpos = e.offsetX;
            let ypos = e.offsetY;
            const t1 = gsap.timeline();
            t1.to(tsImg, { x: xpos, y: ypos });
        });
    });

    function tshoverimg() {
        this.tsHoverAnim.reversed(!this.tsHoverAnim.reversed());
    }
}

jQuery(window).load(function() {
    ts_hover_img(); 
    gsap.delayedCall(1, () =>
        ScrollTrigger.getAll().forEach((t) => {
            t.refresh();
        })
    );
});



function ts_hover_img() {
    const tsHoverImg = gsap.utils.toArray(".preyantechnosys-obitrius-style1");
    tsHoverImg.forEach((target) => {
        const tsImg = target.querySelector('.prt-animation-hover-img');
        const t1 = gsap.timeline();
        t1.to(tsImg, {
            opacity: 1,
            duration: 0.4,
            scale: 1,
            ease: "Power2.easeOut"
        })
        target.tsHoverAnim = t1.play().reversed(true);
        target.addEventListener("mouseenter", tshoverimg);
        target.addEventListener("mouseleave", tshoverimg);
        target.addEventListener("mousemove", (e) => {
            let xpos = e.offsetX;
            let ypos = e.offsetY;
            const t1 = gsap.timeline();
            t1.to(tsImg, { x: xpos, y: ypos });
        });
    });

    function tshoverimg() {
        this.tsHoverAnim.reversed(!this.tsHoverAnim.reversed());
    }
}



jQuery(document).ready(function() {
    jQuery('.site-content, .sidebar').theiaStickySidebar({
      // Settings
      additionalMarginTop: 100
	  
    });
  });


/*************************
Skrollr
*************************/
/*! skrollr 0.6.30 (2015-08-12) | Alexander Prinzhorn - https://github.com/Prinzhorn/skrollr | Free to use under terms of MIT license */
! function(a, b, c) {
	"use strict";

	function d(c) {
		if (e = b.documentElement, f = b.body, T(), ha = this, c = c || {}, ma = c.constants || {}, c.easing)
			for (var d in c.easing) W[d] = c.easing[d];
		ta = c.edgeStrategy || "set", ka = {
			beforerender: c.beforerender,
			render: c.render,
			keyframe: c.keyframe
		}, la = c.forceHeight !== !1, la && (Ka = c.scale || 1), na = c.mobileDeceleration || y, pa = c.smoothScrolling !== !1, qa = c.smoothScrollingDuration || A, ra = {
			targetTop: ha.getScrollTop()
		}, Sa = (c.mobileCheck || function() {
			return /Android|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent || navigator.vendor || a.opera)
		})(), Sa ? (ja = b.getElementById(c.skrollrBody || z), ja && ga(), X(), Ea(e, [s, v], [t])) : Ea(e, [s, u], [t]), ha.refresh(), wa(a, "resize orientationchange load", function() {
			var a = e.clientWidth,
				b = e.clientHeight;
			(b !== Pa || a !== Oa) && (Pa = b, Oa = a, Qa = !0)
		});
		var g = U();
		return function h() {
			$(), va = g(h)
		}(), ha
	}
	var e, f, g = {
			get: function() {
				return ha
			},
			init: function(a) {
				return ha || new d(a)
			},
			VERSION: "0.6.30"
		},
		h = Object.prototype.hasOwnProperty,
		i = a.Math,
		j = a.getComputedStyle,
		k = "touchstart",
		l = "touchmove",
		m = "touchcancel",
		n = "touchend",
		o = "skrollable",
		p = o + "-before",
		q = o + "-between",
		r = o + "-after",
		s = "skrollr",
		t = "no-" + s,
		u = s + "-desktop",
		v = s + "-mobile",
		w = "linear",
		x = 1e3,
		y = .004,
		z = "skrollr-body",
		A = 200,
		B = "start",
		C = "end",
		D = "center",
		E = "bottom",
		F = "___skrollable_id",
		G = /^(?:input|textarea|button|select)$/i,
		H = /^\s+|\s+$/g,
		I = /^data(?:-(_\w+))?(?:-?(-?\d*\.?\d+p?))?(?:-?(start|end|top|center|bottom))?(?:-?(top|center|bottom))?$/,
		J = /\s*(@?[\w\-\[\]]+)\s*:\s*(.+?)\s*(?:;|$)/gi,
		K = /^(@?[a-z\-]+)\[(\w+)\]$/,
		L = /-([a-z0-9_])/g,
		M = function(a, b) {
			return b.toUpperCase()
		},
		N = /[\-+]?[\d]*\.?[\d]+/g,
		O = /\{\?\}/g,
		P = /rgba?\(\s*-?\d+\s*,\s*-?\d+\s*,\s*-?\d+/g,
		Q = /[a-z\-]+-gradient/g,
		R = "",
		S = "",
		T = function() {
			var a = /^(?:O|Moz|webkit|ms)|(?:-(?:o|moz|webkit|ms)-)/;
			if (j) {
				var b = j(f, null);
				for (var c in b)
					if (R = c.match(a) || +c == c && b[c].match(a)) break;
				if (!R) return void(R = S = "");
				R = R[0], "-" === R.slice(0, 1) ? (S = R, R = {
					"-webkit-": "webkit",
					"-moz-": "Moz",
					"-ms-": "ms",
					"-o-": "O"
				}[R]) : S = "-" + R.toLowerCase() + "-"
			}
		},
		U = function() {
			var b = a.requestAnimationFrame || a[R.toLowerCase() + "RequestAnimationFrame"],
				c = Ha();
			return (Sa || !b) && (b = function(b) {
				var d = Ha() - c,
					e = i.max(0, 1e3 / 60 - d);
				return a.setTimeout(function() {
					c = Ha(), b()
				}, e)
			}), b
		},
		V = function() {
			var b = a.cancelAnimationFrame || a[R.toLowerCase() + "CancelAnimationFrame"];
			return (Sa || !b) && (b = function(b) {
				return a.clearTimeout(b)
			}), b
		},
		W = {
			begin: function() {
				return 0
			},
			end: function() {
				return 1
			},
			linear: function(a) {
				return a
			},
			quadratic: function(a) {
				return a * a
			},
			cubic: function(a) {
				return a * a * a
			},
			swing: function(a) {
				return -i.cos(a * i.PI) / 2 + .5
			},
			sqrt: function(a) {
				return i.sqrt(a)
			},
			outCubic: function(a) {
				return i.pow(a - 1, 3) + 1
			},
			bounce: function(a) {
				var b;
				if (.5083 >= a) b = 3;
				else if (.8489 >= a) b = 9;
				else if (.96208 >= a) b = 27;
				else {
					if (!(.99981 >= a)) return 1;
					b = 91
				}
				return 1 - i.abs(3 * i.cos(a * b * 1.028) / b)
			}
		};
	d.prototype.refresh = function(a) {
		var d, e, f = !1;
		for (a === c ? (f = !0, ia = [], Ra = 0, a = b.getElementsByTagName("*")) : a.length === c && (a = [a]), d = 0, e = a.length; e > d; d++) {
			var g = a[d],
				h = g,
				i = [],
				j = pa,
				k = ta,
				l = !1;
			if (f && F in g && delete g[F], g.attributes) {
				for (var m = 0, n = g.attributes.length; n > m; m++) {
					var p = g.attributes[m];
					if ("data-anchor-target" !== p.name)
						if ("data-smooth-scrolling" !== p.name)
							if ("data-edge-strategy" !== p.name)
								if ("data-emit-events" !== p.name) {
									var q = p.name.match(I);
									if (null !== q) {
										var r = {
											props: p.value,
											element: g,
											eventType: p.name.replace(L, M)
										};
										i.push(r);
										var s = q[1];
										s && (r.constant = s.substr(1));
										var t = q[2];
										/p$/.test(t) ? (r.isPercentage = !0, r.offset = (0 | t.slice(0, -1)) / 100) : r.offset = 0 | t;
										var u = q[3],
											v = q[4] || u;
										u && u !== B && u !== C ? (r.mode = "relative", r.anchors = [u, v]) : (r.mode = "absolute", u === C ? r.isEnd = !0 : r.isPercentage || (r.offset = r.offset * Ka))
									}
								} else l = !0;
					else k = p.value;
					else j = "off" !== p.value;
					else if (h = b.querySelector(p.value), null === h) throw 'Unable to find anchor target "' + p.value + '"'
				}
				if (i.length) {
					var w, x, y;
					!f && F in g ? (y = g[F], w = ia[y].styleAttr, x = ia[y].classAttr) : (y = g[F] = Ra++, w = g.style.cssText, x = Da(g)), ia[y] = {
						element: g,
						styleAttr: w,
						classAttr: x,
						anchorTarget: h,
						keyFrames: i,
						smoothScrolling: j,
						edgeStrategy: k,
						emitEvents: l,
						lastFrameIndex: -1
					}, Ea(g, [o], [])
				}
			}
		}
		for (Aa(), d = 0, e = a.length; e > d; d++) {
			var z = ia[a[d][F]];
			z !== c && (_(z), ba(z))
		}
		return ha
	}, d.prototype.relativeToAbsolute = function(a, b, c) {
		var d = e.clientHeight,
			f = a.getBoundingClientRect(),
			g = f.top,
			h = f.bottom - f.top;
		return b === E ? g -= d : b === D && (g -= d / 2), c === E ? g += h : c === D && (g += h / 2), g += ha.getScrollTop(), g + .5 | 0
	}, d.prototype.animateTo = function(a, b) {
		b = b || {};
		var d = Ha(),
			e = ha.getScrollTop(),
			f = b.duration === c ? x : b.duration;
		return oa = {
			startTop: e,
			topDiff: a - e,
			targetTop: a,
			duration: f,
			startTime: d,
			endTime: d + f,
			easing: W[b.easing || w],
			done: b.done
		}, oa.topDiff || (oa.done && oa.done.call(ha, !1), oa = c), ha
	}, d.prototype.stopAnimateTo = function() {
		oa && oa.done && oa.done.call(ha, !0), oa = c
	}, d.prototype.isAnimatingTo = function() {
		return !!oa
	}, d.prototype.isMobile = function() {
		return Sa
	}, d.prototype.setScrollTop = function(b, c) {
		return sa = c === !0, Sa ? Ta = i.min(i.max(b, 0), Ja) : a.scrollTo(0, b), ha
	}, d.prototype.getScrollTop = function() {
		return Sa ? Ta : a.pageYOffset || e.scrollTop || f.scrollTop || 0
	}, d.prototype.getMaxScrollTop = function() {
		return Ja
	}, d.prototype.on = function(a, b) {
		return ka[a] = b, ha
	}, d.prototype.off = function(a) {
		return delete ka[a], ha
	}, d.prototype.destroy = function() {
		var a = V();
		a(va), ya(), Ea(e, [t], [s, u, v]);
		for (var b = 0, d = ia.length; d > b; b++) fa(ia[b].element);
		e.style.overflow = f.style.overflow = "", e.style.height = f.style.height = "", ja && g.setStyle(ja, "transform", "none"), ha = c, ja = c, ka = c, la = c, Ja = 0, Ka = 1, ma = c, na = c, La = "down", Ma = -1, Oa = 0, Pa = 0, Qa = !1, oa = c, pa = c, qa = c, ra = c, sa = c, Ra = 0, ta = c, Sa = !1, Ta = 0, ua = c
	};
	var X = function() {
			var d, g, h, j, o, p, q, r, s, t, u, v;
			wa(e, [k, l, m, n].join(" "), function(a) {
				var e = a.changedTouches[0];
				for (j = a.target; 3 === j.nodeType;) j = j.parentNode;
				switch (o = e.clientY, p = e.clientX, t = a.timeStamp, G.test(j.tagName) || a.preventDefault(), a.type) {
					case k:
						d && d.blur(), ha.stopAnimateTo(), d = j, g = q = o, h = p, s = t;
						break;
					case l:
						G.test(j.tagName) && b.activeElement !== j && a.preventDefault(), r = o - q, v = t - u, ha.setScrollTop(Ta - r, !0), q = o, u = t;
						break;
					default:
					case m:
					case n:
						var f = g - o,
							w = h - p,
							x = w * w + f * f;
						if (49 > x) {
							if (!G.test(d.tagName)) {
								d.focus();
								var y = b.createEvent("MouseEvents");
								y.initMouseEvent("click", !0, !0, a.view, 1, e.screenX, e.screenY, e.clientX, e.clientY, a.ctrlKey, a.altKey, a.shiftKey, a.metaKey, 0, null), d.dispatchEvent(y)
							}
							return
						}
						d = c;
						var z = r / v;
						z = i.max(i.min(z, 3), -3);
						var A = i.abs(z / na),
							B = z * A + .5 * na * A * A,
							C = ha.getScrollTop() - B,
							D = 0;
						C > Ja ? (D = (Ja - C) / B, C = Ja) : 0 > C && (D = -C / B, C = 0), A *= 1 - D, ha.animateTo(C + .5 | 0, {
							easing: "outCubic",
							duration: A
						})
				}
			}), a.scrollTo(0, 0), e.style.overflow = f.style.overflow = "hidden"
		},
		Y = function() {
			var a, b, c, d, f, g, h, j, k, l, m, n = e.clientHeight,
				o = Ba();
			for (j = 0, k = ia.length; k > j; j++)
				for (a = ia[j], b = a.element, c = a.anchorTarget, d = a.keyFrames, f = 0, g = d.length; g > f; f++) h = d[f], l = h.offset, m = o[h.constant] || 0, h.frame = l, h.isPercentage && (l *= n, h.frame = l), "relative" === h.mode && (fa(b), h.frame = ha.relativeToAbsolute(c, h.anchors[0], h.anchors[1]) - l, fa(b, !0)), h.frame += m, la && !h.isEnd && h.frame > Ja && (Ja = h.frame);
			for (Ja = i.max(Ja, Ca()), j = 0, k = ia.length; k > j; j++) {
				for (a = ia[j], d = a.keyFrames, f = 0, g = d.length; g > f; f++) h = d[f], m = o[h.constant] || 0, h.isEnd && (h.frame = Ja - h.offset + m);
				a.keyFrames.sort(Ia)
			}
		},
		Z = function(a, b) {
			for (var c = 0, d = ia.length; d > c; c++) {
				var e, f, i = ia[c],
					j = i.element,
					k = i.smoothScrolling ? a : b,
					l = i.keyFrames,
					m = l.length,
					n = l[0],
					s = l[l.length - 1],
					t = k < n.frame,
					u = k > s.frame,
					v = t ? n : s,
					w = i.emitEvents,
					x = i.lastFrameIndex;
				if (t || u) {
					if (t && -1 === i.edge || u && 1 === i.edge) continue;
					switch (t ? (Ea(j, [p], [r, q]), w && x > -1 && (za(j, n.eventType, La), i.lastFrameIndex = -1)) : (Ea(j, [r], [p, q]), w && m > x && (za(j, s.eventType, La), i.lastFrameIndex = m)), i.edge = t ? -1 : 1, i.edgeStrategy) {
						case "reset":
							fa(j);
							continue;
						case "ease":
							k = v.frame;
							break;
						default:
						case "set":
							var y = v.props;
							for (e in y) h.call(y, e) && (f = ea(y[e].value), 0 === e.indexOf("@") ? j.setAttribute(e.substr(1), f) : g.setStyle(j, e, f));
							continue
					}
				} else 0 !== i.edge && (Ea(j, [o, q], [p, r]), i.edge = 0);
				for (var z = 0; m - 1 > z; z++)
					if (k >= l[z].frame && k <= l[z + 1].frame) {
						var A = l[z],
							B = l[z + 1];
						for (e in A.props)
							if (h.call(A.props, e)) {
								var C = (k - A.frame) / (B.frame - A.frame);
								C = A.props[e].easing(C), f = da(A.props[e].value, B.props[e].value, C), f = ea(f), 0 === e.indexOf("@") ? j.setAttribute(e.substr(1), f) : g.setStyle(j, e, f)
							}
						w && x !== z && ("down" === La ? za(j, A.eventType, La) : za(j, B.eventType, La), i.lastFrameIndex = z);
						break
					}
			}
		},
		$ = function() {
			Qa && (Qa = !1, Aa());
			var a, b, d = ha.getScrollTop(),
				e = Ha();
			if (oa) e >= oa.endTime ? (d = oa.targetTop, a = oa.done, oa = c) : (b = oa.easing((e - oa.startTime) / oa.duration), d = oa.startTop + b * oa.topDiff | 0), ha.setScrollTop(d, !0);
			else if (!sa) {
				var f = ra.targetTop - d;
				f && (ra = {
					startTop: Ma,
					topDiff: d - Ma,
					targetTop: d,
					startTime: Na,
					endTime: Na + qa
				}), e <= ra.endTime && (b = W.sqrt((e - ra.startTime) / qa), d = ra.startTop + b * ra.topDiff | 0)
			}
			if (sa || Ma !== d) {
				La = d > Ma ? "down" : Ma > d ? "up" : La, sa = !1;
				var h = {
						curTop: d,
						lastTop: Ma,
						maxTop: Ja,
						direction: La
					},
					i = ka.beforerender && ka.beforerender.call(ha, h);
				i !== !1 && (Z(d, ha.getScrollTop()), Sa && ja && g.setStyle(ja, "transform", "translate(0, " + -Ta + "px) " + ua), Ma = d, ka.render && ka.render.call(ha, h)), a && a.call(ha, !1)
			}
			Na = e
		},
		_ = function(a) {
			for (var b = 0, c = a.keyFrames.length; c > b; b++) {
				for (var d, e, f, g, h = a.keyFrames[b], i = {}; null !== (g = J.exec(h.props));) f = g[1], e = g[2], d = f.match(K), null !== d ? (f = d[1], d = d[2]) : d = w, e = e.indexOf("!") ? aa(e) : [e.slice(1)], i[f] = {
					value: e,
					easing: W[d]
				};
				h.props = i
			}
		},
		aa = function(a) {
			var b = [];
			return P.lastIndex = 0, a = a.replace(P, function(a) {
				return a.replace(N, function(a) {
					return a / 255 * 100 + "%"
				})
			}), S && (Q.lastIndex = 0, a = a.replace(Q, function(a) {
				return S + a
			})), a = a.replace(N, function(a) {
				return b.push(+a), "{?}"
			}), b.unshift(a), b
		},
		ba = function(a) {
			var b, c, d = {};
			for (b = 0, c = a.keyFrames.length; c > b; b++) ca(a.keyFrames[b], d);
			for (d = {}, b = a.keyFrames.length - 1; b >= 0; b--) ca(a.keyFrames[b], d)
		},
		ca = function(a, b) {
			var c;
			for (c in b) h.call(a.props, c) || (a.props[c] = b[c]);
			for (c in a.props) b[c] = a.props[c]
		},
		da = function(a, b, c) {
			var d, e = a.length;
			if (e !== b.length) throw "Can't interpolate between \"" + a[0] + '" and "' + b[0] + '"';
			var f = [a[0]];
			for (d = 1; e > d; d++) f[d] = a[d] + (b[d] - a[d]) * c;
			return f
		},
		ea = function(a) {
			var b = 1;
			return O.lastIndex = 0, a[0].replace(O, function() {
				return a[b++]
			})
		},
		fa = function(a, b) {
			a = [].concat(a);
			for (var c, d, e = 0, f = a.length; f > e; e++) d = a[e], c = ia[d[F]], c && (b ? (d.style.cssText = c.dirtyStyleAttr, Ea(d, c.dirtyClassAttr)) : (c.dirtyStyleAttr = d.style.cssText, c.dirtyClassAttr = Da(d), d.style.cssText = c.styleAttr, Ea(d, c.classAttr)))
		},
		ga = function() {
			ua = "translateZ(0)", g.setStyle(ja, "transform", ua);
			var a = j(ja),
				b = a.getPropertyValue("transform"),
				c = a.getPropertyValue(S + "transform"),
				d = b && "none" !== b || c && "none" !== c;
			d || (ua = "")
		};
	g.setStyle = function(a, b, c) {
		var d = a.style;
		if (b = b.replace(L, M).replace("-", ""), "zIndex" === b) isNaN(c) ? d[b] = c : d[b] = "" + (0 | c);
		else if ("float" === b) d.styleFloat = d.cssFloat = c;
		else try {
			R && (d[R + b.slice(0, 1).toUpperCase() + b.slice(1)] = c), d[b] = c
		} catch (e) {}
	};
	var ha, ia, ja, ka, la, ma, na, oa, pa, qa, ra, sa, ta, ua, va, wa = g.addEvent = function(b, c, d) {
			var e = function(b) {
				return b = b || a.event, b.target || (b.target = b.srcElement), b.preventDefault || (b.preventDefault = function() {
					b.returnValue = !1, b.defaultPrevented = !0
				}), d.call(this, b)
			};
			c = c.split(" ");
			for (var f, g = 0, h = c.length; h > g; g++) f = c[g], b.addEventListener ? b.addEventListener(f, d, !1) : b.attachEvent("on" + f, e), Ua.push({
				element: b,
				name: f,
				listener: d
			})
		},
		xa = g.removeEvent = function(a, b, c) {
			b = b.split(" ");
			for (var d = 0, e = b.length; e > d; d++) a.removeEventListener ? a.removeEventListener(b[d], c, !1) : a.detachEvent("on" + b[d], c)
		},
		ya = function() {
			for (var a, b = 0, c = Ua.length; c > b; b++) a = Ua[b], xa(a.element, a.name, a.listener);
			Ua = []
		},
		za = function(a, b, c) {
			ka.keyframe && ka.keyframe.call(ha, a, b, c)
		},
		Aa = function() {
			var a = ha.getScrollTop();
			Ja = 0, la && !Sa && (f.style.height = ""), Y(), la && !Sa && (f.style.height = Ja + e.clientHeight + "px"), Sa ? ha.setScrollTop(i.min(ha.getScrollTop(), Ja)) : ha.setScrollTop(a, !0), sa = !0
		},
		Ba = function() {
			var a, b, c = e.clientHeight,
				d = {};
			for (a in ma) b = ma[a], "function" == typeof b ? b = b.call(ha) : /p$/.test(b) && (b = b.slice(0, -1) / 100 * c), d[a] = b;
			return d
		},
		Ca = function() {
			var a, b = 0;
			return ja && (b = i.max(ja.offsetHeight, ja.scrollHeight)), a = i.max(b, f.scrollHeight, f.offsetHeight, e.scrollHeight, e.offsetHeight, e.clientHeight), a - e.clientHeight
		},
		Da = function(b) {
			var c = "className";
			return a.SVGElement && b instanceof a.SVGElement && (b = b[c], c = "baseVal"), b[c]
		},
		Ea = function(b, d, e) {
			var f = "className";
			if (a.SVGElement && b instanceof a.SVGElement && (b = b[f], f = "baseVal"), e === c) return void(b[f] = d);
			for (var g = b[f], h = 0, i = e.length; i > h; h++) g = Ga(g).replace(Ga(e[h]), " ");
			g = Fa(g);
			for (var j = 0, k = d.length; k > j; j++) - 1 === Ga(g).indexOf(Ga(d[j])) && (g += " " + d[j]);
			b[f] = Fa(g)
		},
		Fa = function(a) {
			return a.replace(H, "")
		},
		Ga = function(a) {
			return " " + a + " "
		},
		Ha = Date.now || function() {
			return +new Date
		},
		Ia = function(a, b) {
			return a.frame - b.frame
		},
		Ja = 0,
		Ka = 1,
		La = "down",
		Ma = -1,
		Na = Ha(),
		Oa = 0,
		Pa = 0,
		Qa = !1,
		Ra = 0,
		Sa = !1,
		Ta = 0,
		Ua = [];
	"function" == typeof define && define.amd ? define([], function() {
		return g
	}) : "undefined" != typeof module && module.exports ? module.exports = g : a.skrollr = g
}(window, document);
/*------------------------
    skrollr
--------------------------*/
(function (jQuery) {
    "use strict";
    jQuery(document).ready(function () {
        callScrollingText();
    });


jQuery('#bmi-result').hide();
   
   var submitButton = document.querySelector(".submitButton");
   
   if (submitButton){
   
   function themetechmount_bmicount() {
   
   var heightInFeet = Number(document.querySelector("#height1").value);
   var weight = Number(document.querySelector("#weight1").value);
   var age = Number(document.querySelector("#age1").value);
   var mgender = false,fgender = false , bmr;
   var gender = document.querySelector("#gender1");
   var result = document.querySelector("#bmi-result");
   var status = '';
   if(heightInFeet == '' )
   {
   jQuery('#bmi-result').html('<div class="col-lg-12"><p class="tm-bmi-result">Please Enter Height</p></div>');
   jQuery('#bmi-result').fadeIn('slow');
   return;
   }
   if(age == '' )
   {
   jQuery('#bmi-result').html('<div class="col-lg-12"><p class="tm-bmi-result">Please Enter Age</p></div>');
   jQuery('#bmi-result').fadeIn('slow');
   return;
   }
   
   if(gender.value == "male")
   {
   mgender = true;	
   }
   if(gender.value == "female")
   {
   fgender = true;	
   }
   
   if(!mgender && !fgender)
   {
   jQuery('#bmi-result').html('<div class="col-lg-12"><p class="tm-bmi-result">Please Select Gender</p></div>');
   jQuery('#bmi-result').fadeIn('slow');
   return;
   }
   
   var height = ((heightInFeet * 12));
   var heightInMetre = (height / 39.37);
   var heightInCm = (heightInMetre * 100);
   var bmi = weight / (heightInMetre * heightInMetre);
   var hnweight = Number.parseFloat(24.9 * (heightInMetre * heightInMetre)).toFixed(2);
   var lnweight = Number.parseFloat(18.5 * (heightInMetre * heightInMetre)).toFixed(2);
   
   if (bmi < 18.5) {
   status = "Under Weight";
   } else if (bmi <= 24.9) {
   status = "Healthy";
   } else if (bmi <= 29.9) {
   status = "Over Weight";
   } else if (bmi <= 34.9) {
   status = "Class I obesity";
   } else if (bmi <= 39.9) {
   status = "Class II obesity";
   } else if (bmi >= 40) {
   status = "Class III obesity";
   }
   
   bmi = bmi.toFixed(2);
   
   if (fgender && age != "") {
   var bmrf = (665 + (9.6 * weight) + (1.8 * heightInCm) - (4.7 * age));
   
   bmr = bmrf.toFixed(2);
   
   } else if (mgender&& age != "") {
   var bmrm = (66 + (13.7 * weight) + (5 * heightInCm) - (6.8 * age));
   bmr = bmrm.toFixed(2);
   } 
   
   jQuery('#bmi-result').html('<div class="col-lg-12"><p class="tm-bmi-result">BMI: '+bmi+' / BMR: '+bmr+' / Status: '+status+'</p></div>');
   jQuery('#bmi-result').fadeIn('slow');
   
   
   }
   submitButton.addEventListener("click", themetechmount_bmicount);
   
   };
   
})(jQuery);

function typetext() {
var type_list = document.querySelector( '#typed_lists' );

  if( type_list ) {
    var typed = new Typed('#typed', {
      stringsElement: '#typed_lists',
      typeSpeed: 50,
      backSpeed: 50,
      cursorChar: '_',
      loop: true
    });
  }
 }

 jQuery(window).load(function(){
 	typetext();
 });
 
/*----  Functions  ----*/
function tm_reveal_img_animation() {
    const boxes = gsap.utils.toArray('.tm-reveal-effects-yes');
    boxes.forEach(img => {
        gsap.to(img, {
            scrollTrigger: {
                trigger: img,
                start: "top 70%",
                end: "bottom bottom",
                toggleClass: "active",
                once: true,
            }
        });
    });
}	
jQuery(window).load(function() {
	BurgerMenu()
    tm_reveal_img_animation(); 
    gsap.delayedCall(1, () =>
        ScrollTrigger.getAll().forEach((t) => {
            t.refresh();
        })
    );
});

 

/*------------------------------------------------------------------------------*/
/* Sidebar Sticky
/*------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
	
	if( jQuery('body').hasClass('themetechmount-stickysidebar') ){
     jQuery('.site-content, .sidebar').theiaStickySidebar({
      // Settings
      additionalMarginTop: 10
    });
	
	    jQuery('.stick-heading').theiaStickySidebar({
      // Settings
      additionalMarginTop: 10
    });
	
	}
  });





function callScrollingText(){
    if (jQuery(window).width() > 992) {
        var s = skrollr.init({ forceHeight: false });
        var attr = jQuery('html').attr('style');
        if (typeof attr !== 'undefined') {
            jQuery('html').attr('style', 'overflow: auto;');
        }
        setTimeout(function () {
            skrollr.get().refresh();
        }, 500);
    }
}



// JS for adding treeview in navigationMenu for burgermenu
function BurgerMenu(){

	jQuery(document).ready(function(){
		var logowidth = jQuery('.prt-header-style-classic.prt-header-overlay .headerlogo').width();
		jQuery('.prt-header-style-classic.prt-header-overlay .nav-menu').css( 'margin-left',''+logowidth+'px' );	

	});

}
function HeaderBurgerMenu(){

	jQuery(document).ready(function(){
		jQuery('.preyantechnosys-burgermenu-yes .prt-header-style-classic2.prt-header-overlay #site-header-menu #site-navigation div.nav-menu > ul').addClass('treeview-list');
		jQuery(".preyantechnosys-burgermenu-yes #site-header-menu #site-navigation .treeview-list").treeview({
			collapsed: true,
			unique: true		
		});      
		jQuery('.preyantechnosys-burgermenu-yes #site-header-menu #site-navigation .treeview-list a.active').parent().removeClass('expandable');
		jQuery('.preyantechnosys-burgermenu-yes #site-header-menu #site-navigation .treeview-list a.active').parent().addClass('collapsable');
		jQuery('.preyantechnosys-burgermenu-yes #site-header-menu #site-navigation .treeview-list .collapsable ul').css('display','block');
	});

}

jQuery(document).ready(function() { 
	"use strict"; 
	 BurgerMenu()
	 HeaderBurgerMenu()
});



function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}

