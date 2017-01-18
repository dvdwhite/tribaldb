/*  JavaScript Document    */


var marqueeVars = {
	marqueeWidth: '',
	screenSize : '',
	width : 0,
	mobileSize : 766,
	autoPlay : true,
	currentPanel : 1,
	totalPanels : 0,
	timePassed : 0,
	timeToChange : 50,
	inTansition : false,
	panelContent : Array
}

function isBlank(str) {
    return (!str || /^\s*$/.test(str));
}

function marqueeGatherData(){
	// create and store HTML for panels
	
	jQuery('.marquee_data .marquee_panel').each(function(index){

		marqueeVars.totalPanels = index + 1;

		var isFrontPage = jQuery(this).attr('data-front-page');
		var imageLink  = jQuery(this).attr('data-link');
		var permaLink = jQuery(this).attr('data-permalink');
		var verticalOrientation = jQuery(this).attr('data-vertical-orientation');
		var imageFull = jQuery(this).attr('data-image-full');
		var imageLarge = jQuery(this).attr('data-image-large');
		var panelCaption = jQuery(this).find('.panel_caption').html();
		var panelDescription = jQuery(this).find('.panel_description').html();
		var panelDescriptionSmall = jQuery(this).find('.panel_description_small').html();
		var leftRight = jQuery(this).attr('data-left-right-class');
		var textHeight = jQuery(this).attr('data-text-height');
		var slideDirection;
		//console.log(isFullScreen);		
		if (isFrontPage) {
			marqueeLink = permaLink;
		}else{
			marqueeLink = imageLink;
		};
		if (leftRight === 'caption_left') {slideDirection = 'Left'} else { slideDirection = 'Right'};
		if (isBlank(panelCaption)) { panelCaptionTag = ''} else{ panelCaptionTag = '<div class="marquee-text-wrapper animated slideIn'+slideDirection+'"><div class="panel_caption banner-text">'+panelCaption+'</div></div>'};
		if (isBlank(panelDescription)) { panelDescriptionTag = ''} else{ panelDescriptionTag = '<div class="marquee-text-wrapper sub animated slideIn'+slideDirection+'"><div class="panel_description banner-text">'+panelDescription+'</div></div>'};
		if (isBlank(panelDescriptionSmall)) { panelDescriptionSmallTag = ''} else{ panelDescriptionSmallTag = '<div class="marquee-text-wrapper sub-desc animated slideIn'+slideDirection+'"><div class="panel_description_small banner-text">'+panelDescriptionSmall+'</div></div>'};
		if ( !isFrontPage && isBlank(imageLink)) { 
			linkOpenTag = '';
			linkcloseTag = '';
		} else{ 
			linkOpenTag = '<a href="'+marqueeLink+'" style="display:inline-block; width:100%; height:100%;">'
			linkcloseTag = '</a>'
		}


		var backroundPhoto;
		if(jQuery('.marquee').width() > 766 ) {backroundPhoto = imageFull} else {backroundPhoto = imageLarge};

		marqueeVars.panelContent[index] = linkOpenTag+
											'<div class="marquee_panel '+leftRight+' '+verticalOrientation+'" style="background-image:url('+backroundPhoto+');" >' +
												'<div class="ten-twenty-four">' +
													'<div class="banner-text-position" style="bottom:'+textHeight+'%">' +
														panelCaptionTag+	
														panelDescriptionTag+
														panelDescriptionSmallTag+
													'</div>' +
												'</div>' +
											'</div>' +
										linkcloseTag; 									
		
	});
	if (marqueeVars.totalPanels == 1) {
		marqueeAdvance; //only run once if there is only a single image
	}
	else{
		setInterval(marqueeAdvance, 100);
	}
	
}

function getWindowHeight(){
	windowHeight = window.innerHeight;
	//console.log(windowHeight);
}

jQuery(document).ready(function(){

	getWindowHeight();
	marqueeGatherData();
	marqueeMeasureScreen();
	setDebuger();
	uuGetFixedHeight();
	uuParallaxOnOff();

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

	/****swipe*****/
	jQuery(".marquee").swipeleft(function() {
   	// alert("I was just swiped left!");
      marqueeNext();
   });

   jQuery(".marquee").swiperight(function() {
   	// alert("I was just swiped right!");
      marqueePrev();
    });
	
});

jQuery(window).resize(function(){
		getWindowHeight();
		uuGetFixedHeight();
		uuParallaxOnOff();
});

function marqueeAdvance(){

	// check browser width
	var browserWidth = jQuery('.marquee').width();
	var currentSize = marqueeVars.screenSize;
	if(browserWidth > marqueeVars.mobileSize){
		var newWidth = 'large';
		marqueeVars.screenSize = 'large';
	}else{
		var newWidth = 'small'
		marqueeVars.screenSize = 'small';
	}
	
	// advance the timer and large marquee
	if (marqueeVars.timePassed == marqueeVars.timeToChange){
		marqueeVars.timePassed = 0;
		if (marqueeVars.autoPlay == true){
			marqueeNext();
		}
	}else{
		marqueeVars.timePassed += 1;
	}
	// detect change in screen size variable
	if(currentSize != newWidth){
		if(marqueeVars.screenSize == 'large'){
			marqueeMultiPanel('large');
		}else{
			marqueeMultiPanel('small');
		}
	}
	setDebuger();
}

function marqueeNext(){
	if(marqueeVars.currentPanel == marqueeVars.totalPanels){
		jQuery('.marquee_nav div:nth-of-type(1)').trigger('click');
	}else{
		jQuery('.marquee_nav div:nth-of-type('+(marqueeVars.currentPanel+1)+')').trigger('click');
	}
}

function marqueePrev(){
	if(marqueeVars.currentPanel == 1){
		jQuery('.marquee_nav div:last-child').trigger('click');
	}else{
		jQuery('.marquee_nav div:nth-of-type('+(marqueeVars.currentPanel-1)+')').trigger('click');
	}
}

function marqueeMultiPanel(size){

	marqueeVars.timePassed = 0;
	marqueeVars.autoPlay = true;/*SHOULD BE SET TO TRUE FOR PRODUCTION*/

	// clear HTML from marquee and add stage elements
	jQuery('.marquee').html('').append('<div class="marquee_stage_'+size+'"></div>');
	jQuery('.marquee_stage_'+size).append('<div class="marquee_container_1"></div><div class="marquee_nav"></div>');
	

	// Generate navigation and links
	for(i=0; i<marqueeVars.totalPanels; i++){
		jQuery('.marquee_nav').append('<div></div>');
	}
	
	// Detect hover over marquee
	jQuery('.marquee').hover(
		function(){
			marqueeVars.autoPlay = false;
			jQuery(this).removeClass('autoplay');
		},
		function(){
			marqueeVars.autoPlay = true; /*SHOULD BE SET TO TRUE FOR PRODUCTION*/
			marqueeVars.timePassed = 0;
			jQuery(this).addClass('autoplay');
		}
	);

	// add click events and panel transitions
	jQuery('.marquee_nav div').on('click', function(){

		var navClicked = jQuery(this).index();	

		if(marqueeVars.inTansition){
			//do nothing
		}else{

			marqueeVars.currentPanel = navClicked + 1;
			marqueeVars.inTansition = true;
			
			// set the navigation state
			jQuery('.marquee_nav div').removeClass('selected');
			jQuery(this).addClass('selected');
	
			// inject panel container
			jQuery('.marquee_stage_'+size).append('<div class="marquee_container_2" style="opacity:0;"></div>');
			
			jQuery('.marquee_container_2').html(marqueeVars.panelContent[navClicked]).animate({opacity:1},1000,function(){
				jQuery('.marquee_container_1').remove();
				jQuery(this).addClass('marquee_container_1').removeClass('marquee_container_2');

				//GET DESCRIPTION WIDTH
				//var panelWidth = jQuery(this).find('.panel_description').width();
				//console.log(panelWidth);
				//jQuery(this).find('.panel_description_small').width(panelWidth);


				marqueeVars.inTansition = false;

			});

		}
		setDebuger();
	});
	// hide the nav element if there is only one slide
	if (marqueeVars.totalPanels == 1) {
		jQuery('.marquee_nav div:first').css( 'display', 'none');
	};
	// auto click first nav element
	jQuery('.marquee_nav div:first').trigger('click');

}



function marqueeMeasureScreen(){
	// measure screen size
	marqueeVars.marqueeWidth = jQuery('.marquee').width();
	if(jQuery('.marquee').width() > 766 ){
		marqueeVars.screenSize = 'large';
		marqueeMultiPanel('large');
	}else{
		marqueeVars.screenSize = 'small';
		marqueeMultiPanel('small')
	}
}

function setDebuger(){
	jQuery('.marqueeWidth').html('marqueeVars.marqueeWidth = '+marqueeVars.marqueeWidth);
	jQuery('.screenSize').html('marqueeVars.screenSize = '+marqueeVars.screenSize);
	jQuery('.autoPlay').html('marqueeVars.autoPlay = '+marqueeVars.autoPlay);
	jQuery('.totalPanels').html('marqueeVars.totalPanels = '+marqueeVars.totalPanels);
	jQuery('.currentPanel').html('marqueeVars.currentPanel = '+marqueeVars.currentPanel);
	jQuery('.timePassed').html('marqueeVars.timePassed = '+marqueeVars.timePassed);
	jQuery('.timeToChange').html('marqueeVars.timeToChange = '+marqueeVars.timeToChange);
	jQuery('.inTansition').html('marqueeVars.inTansition = '+marqueeVars.inTansition);	
}


/* =====================================================================
Parallax Backgrounds
======================================================================= */

// Getting the height of the slideshow on home page and setting it for the desktop only
function uuGetFixedHeight(){
	// getting the height of the scroll-slow div
	var isFullScreen  = jQuery('.img-height').attr('data-full-screen');
	var marqueeHeight = jQuery('.img-height').attr('data-image-height');
	var ssht = jQuery('.scroll-slow').height();
	var height;
	var hasRevSlider = jQuery('#header-rs').hasClass('rs');
	
	if ( hasRevSlider ) {
		height = ssht;
	}else if(isFullScreen == "true"){
		height = windowHeight;
		jQuery('.marquee_nav').addClass( 'full-screen-marquee-nav' );
	}else{
		height = marqueeHeight;
	}

	// getting the width of the document body
	var sw = document.body.clientWidth;
	if (sw > 950) {
		jQuery('.fixed-wrapper').height(height);
		jQuery('.marquee').height(height);
		jQuery('.marquee_panel').css('background-size', 'cover');

		// console.log('Im larger than 950px');
	}else if(sw < 949 && sw > 750){ // THIS IS EQUIVELENT TO 766 MARQUEE WIDTH
		jQuery('.fixed-wrapper').height('auto');
		jQuery('.marquee').height('700');
		// console.log('Im less than 950px');
	}
	else{
		jQuery('.fixed-wrapper').height('auto');
		jQuery('.marquee').height('300');
		// console.log('Im less than 950px');
	}
}

// Turning off parallax elements when below 950px
function uuParallaxOnOff(){
	sw = document.body.clientWidth;
	if (sw > 1040) {
		jQuery('.fixed-wrapper .window-fixed').attr('data-stellar-ratio', '0.5');
		// jQuery('#parallax-header').attr('data-stellar-background-ratio', '0.5');
	} else{
		jQuery('.fixed-wrapper .window-fixed').removeAttr('data-stellar-ratio', '0.5');
		// jQuery('#parallax-header').removeAttr('data-stellar-background-ratio', '0.5');
	}
}
