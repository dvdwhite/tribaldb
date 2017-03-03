


jQuery(document).ready(function() {
	inputWatermark(); 					//initialize input watermarks
});


/* =====================================================================
HEADER INPUT WATERMARKS
======================================================================= */

function inputWatermark() {
	/* on page load, add watermark if no content in input */
	jQuery( "#search" ).each(function( index ) {
		if (jQuery(this).val().length == 0) {
			jQuery(this).addClass("watermark");
		 }else{
			jQuery(this).removeClass("watermark");
		 }
	});

	/* on input focus remove watermark */
	jQuery("#search").on("focus", function(event){	
		jQuery(this).removeClass("watermark");
	});
	
	/* on input blur, add or remove watermark based on content */
	jQuery("#search").on("blur", function(event){
		  if (jQuery(this).val().length == 0) {
			jQuery(this).addClass("watermark");
		  }else{
			jQuery(this).removeClass("watermark");
		 }
	});
}



// Responsive Navigation
jQuery(document).ready(function() {

	var sw = document.body.clientWidth;

	
		if (sw > 767) {
			// adjust menus based on screen size
			// jQuery('.main-headline').css('background','0');

			jQuery('ul.sub-menu').hover(function() {
				//jQuery(this).parent().css('background','#333');
			}, function() {
				//jQuery(this).parent().css('background','#000');
			});

		}


	jQuery('ul.sub-menu ul').parent().css('padding-bottom','0');
		
	// add the bottom-sub-menu class to the bottom sub-menu UL's
	//jQuery('#bottom-nav').find('.top-sub-menu').addClass('bottom-sub-menu').removeClass('top-sub-menu');

	jQuery('#top-nav').find('.sub-menu').addClass('top-sub-menu');
	jQuery('#header-container-desktop #top-nav').find('.sub-menu').addClass('top-sub-menu');

	jQuery('.top-menu').css('overflow', 'visible');
    
	jQuery('#bottom-nav').find('.sub-menu').addClass('bottom-sub-menu');

	jQuery('.sub-menu').find('a').unwrap();

    // handle menu children
    jQuery('.top-menu li.menu-item-has-children').addClass('disable-href'); 
    jQuery('.top-menu > li > ul > li.menu-item-has-children').removeClass('disable-href'); 
    
	// remove the anchor tags from top level navigation for full screen view
	jQuery('.disable-href > h3 > a').contents().unwrap();
	jQuery('.disable-href > a').contents().unwrap();
	

	jQuery('.site-content').css('background','#fff');



	//check for screen resizing
	jQuery(window).resize(function() {
		
		sw = document.body.clientWidth;
		if (sw > 767) {
			// adjust menus based on screen size
			// jQuery('.main-headline').css('background','0');
		}
		if (sw > 950) {
			// adjust menus based on screen size
			jQuery('.top-menu').show();
			jQuery('.bottom-menu').show();
			jQuery('.bottom-sub-menu').show();
			jQuery('ul.top-menu li h3').css('background','transparent');
			jQuery('ul.bottom-menu li h3').css('background','transparent');
		}
		else {
			jQuery('.top-menu').hide();
			jQuery('.bottom-menu').hide();
			jQuery('.bottom-sub-menu').hide();
			jQuery('ul.top-menu li h3').css('background-image','url(images/global/arrow_left.png) right no-repeat');	
			jQuery('ul.bottom-menu li h3').css('background-image','url(images/global/arrow_left.png) right no-repeat');		
		}
		

	});


	// toggle submenu items
	jQuery('ul.menu-trigger li').click(function(){

		var menu = jQuery(this).parent().attr('rel');  
		
		var sw = document.body.clientWidth;
		//console.log(sw);
		//console.log(menu);

		if ((sw > 950)&&(menu=='bottom')) {
			// disable sub-nav click on the footer for desktop view
		}
		
		else {	

			// remove active nav state if already active
			if (jQuery(this).hasClass('selected')) {
				jQuery(this).removeClass('selected');
				jQuery(this).find('ul').fadeToggle('fast');
				if (sw < 950) {
					jQuery(this).find('h3').css('background-image','url(images/global/arrow_left.png) right no-repeat');
				}
			}

			// reset any active nav and activate selected nav	
			else {
				jQuery('.' + menu + '-sub-menu').fadeOut('fast');
				jQuery('ul.' + menu + '-menu li').removeClass('selected');
				jQuery(this).find('ul').fadeToggle('fast');
				jQuery(this).addClass('selected');
				if (sw < 950) {
					jQuery('ul.' + menu + '-menu li h3').css('background-image','url(images/global/arrow_left.png) right no-repeat');
					jQuery(this).find('h3').css('background-image','url(images/global/arrow_down.png) right no-repeat');
				}
			}

		}
	});

	// toggle mobile navigation
	jQuery('.mobile-menu-trigger').click(function() {

		var menu = jQuery(this).attr('rel');

		jQuery('.' + menu + '-sub-menu').fadeOut();
		jQuery('.' + menu + '-menu li').removeClass('selected');
		jQuery('#' + menu + '-nav ul.' + menu + '-menu').fadeToggle('fast');
		if (sw < 950) {
			jQuery('ul.' + menu + '-menu li h3').css('background-image','url(images/global/arrow_left.png) right no-repeat');
			jQuery(this).find('h3').css('background-image','url(images/arrow_down.png) right no-repeat');
		}
	});


	// close drop down menu when clicked outside the menu area
	jQuery('html').click(function() {
	  jQuery('.top-sub-menu').hide();
	  jQuery('.top-menu li').removeClass('selected');
	});

	jQuery('.top-menu').click(function(event){
	    event.stopPropagation();
	});	

	jQuery('#utah-logo').click(function() {
		window.location.href = '/';
	});	

/* =====================================================================
Parallax Backgrounds
======================================================================= */


// Getting the height of the slideshow on home page and setting it for the desktop only
function uuGetFixedHeight(){
	// getting the height of the scroll-slow div
	var ssht = jQuery('.scroll-slow').height();
	// getting the width of the document body
	var sw = document.body.clientWidth;
	if (sw > 950) {
		jQuery('.fixed-wrapper').height(ssht);
		// console.log('Im larger than 950px');
	}else{
		jQuery('.fixed-wrapper').height('auto');
		// console.log('Im less than 950px');
	}
}

// Turning off parallax elements when below 950px
function uuParallaxOnOff(){
	sw = document.body.clientWidth;
	if (sw > 1040) {
		jQuery('.fixed-wrapper .window-fixed').attr('data-stellar-ratio', '0.5');
		jQuery('#parallax-header').attr('data-stellar-background-ratio', '0.5');
	} else{
		jQuery('.fixed-wrapper .window-fixed').removeAttr('data-stellar-ratio', '0.5');
		jQuery('#parallax-header').removeAttr('data-stellar-background-ratio', '0.5');
	}
}


jQuery(document).ready(function(){

	uuGetFixedHeight();
	uuParallaxOnOff();

	jQuery(window).resize(function(){
		uuGetFixedHeight();
		uuParallaxOnOff();
	});

});


jQuery(document).ready(function(){


	jQuery(window).stellar({
        // Set scrolling to be in either one or both directions
        horizontalScrolling: false,
        verticalScrolling: true,

        // Set the global alignment offsets
        horizontalOffset: 0,
        verticalOffset: 0,

        // Refreshes parallax content on window load and resize
        responsive: false,

        // Select which property is used to calculate scroll.
        // Choose 'scroll', 'position', 'margin' or 'transform',
        // or write your own 'scrollProperty' plugin.
        scrollProperty: 'scroll',

        // Select which property is used to position elements.
        // Choose between 'position' or 'transform',
        // or write your own 'positionProperty' plugin.
        positionProperty: 'transform',

        // Enable or disable the two types of parallax
        parallaxBackgrounds: true,
        parallaxElements: true,

        // Hide parallax elements that move outside the viewport
        hideDistantElements: false
	});
});

/* =====================================================================
HEADER NAVIGATION
======================================================================= */

// Desktop Header Animation

function uuHeaderAnimation(){
	var sw = document.body.clientWidth;
	if (sw > 950) {
		// the point where the bottom of the header will hit the bottom of the slider
		var sliderht = jQuery('#header-rs').outerHeight();
		var mainheaderht = jQuery('#header-container.has-slideshow').outerHeight();
		var mainheadertop = sliderht - (mainheaderht + 100);

		var maincontainerpos = ((jQuery('#main-container').offset()).top) - (jQuery('#masthead2').actual('height')) - 10;

		if (jQuery(".element-scroll").length) // makes sure "element-scroll" exists
		{
			var elementpos = ((jQuery('.element-scroll').offset()).top) - (jQuery('#masthead2').actual('height')) - 10;
		}

		jQuery(window).bind('scroll', function() {
			// figure out the trigger to hide the large header at the bottom of the home page slideshow
			if (jQuery(window).scrollTop() > mainheadertop) {
				jQuery('.front-page #header-container.has-slideshow').hide();
			}else{
				jQuery('.front-page #header-container').show();
			}
			// show/hide the small bar header (#header-container-desktop) when crossing the page body
			if (jQuery(window).scrollTop() > maincontainerpos){
				jQuery('#header-container-desktop').show();
				// console.log('Iam showing the fixed header now...');
			}else{
				jQuery('#header-container-desktop').hide();
			}

			// fixed element on scroll (if it exists)
			if (jQuery(".element-scroll").length){

				if (jQuery(window).scrollTop() > elementpos){
					jQuery('.element-scroll').addClass('fixed active');
				}else{
					jQuery('.element-scroll').removeClass('fixed active');
				}

			}

		});

		//  #header-container-desktop Navigation Annimation if the title text or navigation is too long

		var leftwidth = jQuery('#header-container-desktop #masthead2 .left').actual('outerWidth', { includeMargin : true });
		var rightwidth = jQuery('#header-container-desktop #masthead2 .right').actual('outerWidth', { includeMargin : true });

		if ((leftwidth + rightwidth) > jQuery('#masthead2').actual('outerWidth')){
			jQuery('#masthead2 .menu-toggle').show();
			jQuery('#masthead2 #top-nav').hide();
			// add the active class to the toggle
			jQuery('#masthead2 .menu-toggle').addClass('active');

			// show hide of navigation and title
			jQuery('#masthead2 .menu-toggle.active span').click(function(){
				jQuery('#header-container-desktop .left h1.department').toggle("slide");
				jQuery('#header-container-desktop .right #top-nav').toggle("slide");
			});
		}
		// console.log("I'm larger than 950px!");
	} else{
		// console.log("I'm smaller than 950px!");
	}

}

jQuery(document).ready(function() {
		uuHeaderAnimation();
	jQuery(window).resize(function(){
		uuHeaderAnimation();
	});

});

/* =====================================================================
BODY ANIMATIONS
======================================================================= */


	// accordian functionality

	jQuery('dt').click(function() {
		if (jQuery(this).hasClass('accordian-expanded')) {
			jQuery(this).next().slideUp();
			jQuery(this).removeClass('accordian-expanded');
            jQuery(this).css('background-image','url(images/global/icon-plus.png) no-repeat 0 5px');
		}
		else {
			jQuery(this).next().slideDown();
			jQuery(this).addClass('accordian-expanded');
			equalheight('.eq-ht-wrapper .eq-ht');
            jQuery(this).css('background-image','url(images/global/icon-minus.png) no-repeat 0 5px');
		}
	});

	// body callout tabs
    jQuery('#tab2-content').css('position','relative');
    jQuery('#tab2-content').css('margin-left','0px');
    jQuery('#tab2').find('span').css('border-bottom', '2px solid #cc0000');
      
    jQuery(".tab").click(function() {
    	jQuery('.tab-content').css("visibility", "hidden").animate({opacity: 0}, 100);
        jQuery('.tab-content').css('position','absolute');
        jQuery('.tab-content').css('margin-left','-9999px');
        jQuery('.tab').find('span').css('border-bottom','0');
        jQuery(this).find('span').css('border-bottom', '0');
        jQuery(this).find('span').css('border-bottom', '2px solid #cc0000');
        var socialId = jQuery(this).attr("id");
        jQuery('#' + socialId + '-content').css('position','relative');
        jQuery('#' + socialId + '-content').css('margin-left','0px');
        jQuery('#' + socialId + '-content').css("visibility", "visible").animate({opacity: 1.0}, 100);
    });

    // Smooth scroll with anchor links and IDs, accounts for sticky header
   	// To work, the link and the ID must start with the prefix 'ss-'

/*function smoothScrollUMC(){


	jQuery('a[href*=#ss-]').click(function() {

	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
	    && location.hostname == this.hostname) {

	        var target = jQuery(this.hash);

	        jQuerytarget = target.length && target || jQuery('[name=' + this.hash.slice(1) +']');

	        if (target.length) {

	            var targetOffset = (target.offset().top - 25);

	            jQuery('html,body').animate({scrollTop: targetOffset}, 1000);

	            return false;

	        }

	    }

	});

}

smoothScrollUMC();*/
	
}); //end document.ready function

jQuery(window).load(function () {

	function smoothScrollExternalPage(){
		// scrollTo if #ss- found in url
		if(/ss-/.test(window.location.hash)){
			// console.log('You have a anchor tag with ss-');

			var anchorId = window.location.hash;

			jQuery('html, body').animate({
			    scrollTop: jQuery(anchorId).offset().top -25
			}, 1000);

		}
	}

	smoothScrollExternalPage();

}); //end window.load function

/* =====================================================================
SLIDERS
======================================================================= */

var j = jQuery.noConflict();
j(document).ready(function() {

		// Next Gen Gallery with slick 2 Slides Carousel
	j('.slick-ngg-carousel').slick({
		dots: true,
		arrows:true,
	});

	// Slick Slider 2 Slides Carousel
	j('.slick-2carousel').slick({
		dots: true,
		arrows:false,
		infinite: false,
		slidesToShow: 2,
		slidesToScroll: 2,
		responsive: [
			{
			  breakpoint: 1200,
			  settings: {
			    slidesToShow: 4,
			    slidesToScroll: 2,
			    infinite: false,
			    arrows:true,
			    dots: true
			  }
			},
			{
			  breakpoint: 960,
			  settings: {
			    slidesToShow: 3,
			    slidesToScroll: 2,
			    infinite: false,
			    arrows:true,
			    dots: true
			  }
			},
			{
			  breakpoint: 750,
			  settings: {
			    slidesToShow: 2,
			    slidesToScroll: 2,
			    infinite: false,
			    arrows:true,
			    dots: true
			  }
			},
			{
			  breakpoint: 525,
			  settings: {
			    slidesToShow: 1,
			    slidesToScroll: 1,
			    infinite: false,
			    arrows:true,
			    dots: true
			  }
			}
		]
	});

	// Slick Slider 4 Slides Carousel
	j('.slick-4carousel').slick({
		dots: true,
		arrows:true,
		infinite: false,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 960,
			  settings: {
			    slidesToShow: 3,
			    slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 750,
			  settings: {
			    slidesToShow: 2,
			    slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 525,
			  settings: {
			    slidesToShow: 1,
			    slidesToScroll: 1
			  }
			}
		]
	});

	//Slick Slider 6 Slides Carousel
	j('.slick-6carousel').slick({
			dots: true,
			arrows:true,
			infinite: false,
			slidesToShow: 6,
			slidesToScroll: 6,
			responsive: [
				{
				  breakpoint: 960,
				  settings: {
				    slidesToShow: 3,
				    slidesToScroll: 3
				  }
				},
				{
				  breakpoint: 750,
				  settings: {
				    slidesToShow: 2,
				    slidesToScroll: 2
				  }
				},
				{
				  breakpoint: 525,
				  settings: {
				  	dots: false,
				    slidesToShow: 1,
				    slidesToScroll: 1
				  }
				}
			]

	});

});

jQuery(document).ready(function() {
    
    jQuery('form.um_login_form').next().click(function(){
        jQuery('.um_login_form').toggle();
        console.log('toggle that shit');
        jQuery(this).html('Go to Login');
    })
});

jQuery(document).ready(function() {
    
    jQuery('table.organization-list tr').removeClass('odd').filter(':odd').addClass('odd');
    
    jQuery('input').focus(function() {
        jQuery(this).attr('placeholder','');
    });
    jQuery('input#organization-name-search').focusout(function() {
        jQuery(this).attr('placeholder','Search for Organization Name');
    });
});
    
function orgSearch(searchParam) {
    var input, filter, table, tr, td, i;
    if (searchParam == 'name') { jQuery('select#organization-region-search').val(""); jQuery('select#organization-state-search').val(""); }
    if (searchParam == 'region') { jQuery('input#organization-name-search').attr('placeholder', "Search for Organization Name"); jQuery('select#organization-state-search').val(""); }
    if (searchParam == 'state') { jQuery('input#organization-name-search').attr('placeholder', "Search for Organization Name"); jQuery('select#organization-region-search').val(""); }
    input = document.getElementById("organization-" + searchParam + "-search");
    filter = input.value.toUpperCase();
    table = document.getElementById("organization-table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByClassName('org-' + searchParam )[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
    jQuery('table.organization-list tr:visible').removeClass('odd').filter(':odd').addClass('odd');
}



jQuery(window).load(function() {
  jQuery('.flexslider').flexslider({
    animation: "fade"
  });
});