<?php
	
	/* Marquee - register custom JavaScript files */
	function load_marquee_scripts(){
	
		wp_register_script('marquee_js', get_template_directory_uri().'/tribal-marquee/js/marquee.js', array('jquery'));
		wp_enqueue_script('marquee_js');
		wp_register_script('jquery_mobile_swipe', get_template_directory_uri().'/tribal-marquee/js/jquery.mobile.custom.swipe.min.js', array('jquery'));
		wp_enqueue_script('jquery_mobile_swipe');
	}
	add_action('wp_enqueue_scripts', 'load_marquee_scripts');


?>