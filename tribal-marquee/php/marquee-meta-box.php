<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'umc_meta_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */

/*
* Pages that we will display the marquee on
*/



if ( ! function_exists ( 'umc_meta_register_meta_boxes' ) ){
	function umc_meta_register_meta_boxes( $meta_boxes )
	{
		/**
		 * prefix of meta keys (optional)
		 * Use underscore (_) at the beginning to make keys hidden
		 * Alt.: You also can make prefix empty to disable it
		 */
		// Better has an underscore as last sign
		$prefix = 'umc_meta_';
		
		$settings = get_option( 'marquee_settings' );
		 
		$field_id = 'marquee_settings_checkbox_list';

		if ( isset( $settings[$field_id] ) )
		{
		    $post_type_display = $settings[$field_id];
		}
		else{
			$post_type_display = 'page';
		}
		/*echo "<pre style=margin:200px;>";
		var_dump($post_type_display);
		echo "</pre>";*/
		// meta box
		$meta_boxes[] = array(
			// Meta box id, UNIQUE per meta box. Optional since 4.1.5
			'id'         => 'advanced',
			// Meta box title - Will appear at the drag and drop handle bar. Required.
			'title'  => __( 'Marquee Image Slider', 'umc_meta' ),
			// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
			'post_types' => $post_type_display,
			// Where the meta box appear: normal (default), advanced, side. Optional.
			'context'    => 'normal',
			// Order of meta box: high (default), low. Optional.
			'fields' => array(
				// SLIDER
				array(
					'name'       => __( 'Marquee Minimum Height Adjustment', 'umc_meta' ),
					'id'         => "{$prefix}image_min_height_slider",
					'type'       => 'slider',
					'std' =>  __( 700, 'umc_meta' ),
					// Text labels displayed before and after value
					//'prefix'     => __( 'px', 'umc_meta' ),
					'suffix'     => __( ' pixels', 'umc_meta' ),
					// jQuery UI slider options. See here http://api.jqueryui.com/slider/
					'js_options' => array(
						'min'  => 200,
						'max'  => 900,
						'step' => 5,
					),
				),
				// RADIO BUTTONS
				array(
					'name'    => __( 'Full screen height - Overrides Marquee Minimum Height Adjustment', 'umc_meta' ),
					'id'      => "{$prefix}full_screen",
					'type'    => 'radio',
					// Array of 'value' => 'Label' pairs for radio options.
					// Note: the 'value' is stored in meta field, not the 'Label'
					'options' => array(
						'true' => __( 'On', 'umc_meta' ),
						'false' => __( 'Off', 'umc_meta' ),
					),
				),
				// IMAGE ADVANCED (WP 3.5+)
				array(
					'name'             => __( 'Marquee Images - Please load these images in the "media assets" section before you select them here.', 'umc_meta' ),
					'id'               => "{$prefix}imgadv",
					'type'             => 'image_advanced',
					'max_file_uploads' => 6,
				),
			)
		);
		return $meta_boxes;
	}
}
add_filter( 'rwmb_meta_boxes', 'umc_register_image_meta_boxes' );

	function umc_register_image_meta_boxes( $meta_boxes )
	{
		
		$prefix = 'umc_image_meta_';

		// meta box
		$meta_boxes[] = array(
			// Meta box id, UNIQUE per meta box. Optional since 4.1.5
			'id'         => 'image_advanced',
			// Meta box title - Will appear at the drag and drop handle bar. Required.
			'title'  => __( 'Marquee Image Slider Meta - Used for full-width image marquee to display optional title, subhead, etc.', 'umc_image_meta' ),
			// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
			'post_types' => array( 'attachment' ),
			// Where the meta box appear: normal (default), advanced, side. Optional.
			'context'    => 'normal',
			// Order of meta box: high (default), low. Optional.
			
			'fields' => array(
				// HEADLINE TEXT
				array(
					'name' => __( 'Header Text', 'umc_image_meta' ),
					'id'   => "{$prefix}textarea_1",
					'type' => 'textarea',
					'cols' => 10,
					'rows' => 1,
				),
				// SUBHEAD TEXT
				array(
					'name' => __( 'Subhead Text', 'umc_image_meta' ),
					'id'   => "{$prefix}textarea_2",
					'type' => 'textarea',
					'cols' => 10,
					'rows' => 1,
				),
				// DESCRIPTION TEXT
				array(
					'name' => __( 'Description Text', 'umc_image_meta' ),
					'id'   => "{$prefix}textarea_3",
					'type' => 'textarea',
					'cols' => 10,
					'rows' => 1,
				),
				// URL
				array(
					'name' => __( 'Link URL', 'umc_image_meta' ),
					'id'   => "{$prefix}url",
					'desc' => __( 'Be sure to use "http://"', 'umc_image_meta' ),
					'type' => 'url',
				),
				// RADIO BUTTONS
				array(
					'name'    => __( 'Slider Text Left or Right Justified', 'umc_image_meta' ),
					'id'      => "{$prefix}lr_radio",
					'type'    => 'radio',
					'std' =>  __( 'caption_left', 'umc_image_meta' ),
					// Array of 'value' => 'Label' pairs for radio options.
					// Note: the 'value' is stored in meta field, not the 'Label'
					'options' => array(
						'caption_left' => __( 'Left', 'umc_image_meta' ),
						'caption_right' => __( 'Right', 'umc_image_meta' ),
					),
				),
				//TEXT HEIGHT SLIDER
				array(
					'name'       => __( 'Slider Text Height Adjustment', 'umc_image_meta' ),
					'id'         => "{$prefix}text_height_slider",
					'type'       => 'slider',
                    'std' =>  __( 15, 'umc_image_meta' ),
					// Text labels displayed before and after value
					//'prefix'     => __( '$', 'umc_image_meta' ),
					'suffix'     => __( ' %', 'umc_image_meta' ),
					// jQuery UI slider options. See here http://api.jqueryui.com/slider/
					'js_options' => array(
						'min'  => 10,
						'max'  => 70,
						'step' => 5,
					),
				),
				// RADIO BUTTONS
				array(
					'name'    => __( 'Vertical Orientation', 'umc_image_meta' ),
					'id'      => "{$prefix}vertical_position",
					'type'    => 'radio',
					// Array of 'value' => 'Label' pairs for radio options.
					// Note: the 'value' is stored in meta field, not the 'Label'
					'options' => array(
						'marquee_top' => __( 'Top', 'umc_image_meta' ),
						'marquee_center' => __( 'Center', 'umc_image_meta' ),
						'marquee_bottom' => __( 'Bottom', 'umc_image_meta' ),
					),
				),
			)
		);
		return $meta_boxes;
	}



add_filter( 'mb_settings_pages', 'marquee_settings_pages' );
function marquee_settings_pages( $settings_pages )
{
	$settings_pages[] = array(
		'id'            => 'marquee-settings',
		'option_name'   => 'marquee_settings',
		'menu_title'    => __( 'Marquee', 'textdomain' ),
		'icon_url'      => 'dashicons-images-alt',
		'submenu_title' => __( 'Settings', 'textdomain' ), // Note this
	);
	return $settings_pages;
}

/*
CREATE MARQUEE SETTINGS PAGE
*/

add_filter( 'rwmb_meta_boxes', 'marquee_options_meta_boxes' );
function marquee_options_meta_boxes( $meta_boxes )
{	
	$prefix = 'marquee_settings_';
	// get all of the registered post types
	$post_types = get_post_types();
	// remove a few of the default post types from array
	if (($key = array_search('attachment', $post_types)) !== false) {unset($post_types[$key]);}
	if (($key = array_search('revision', $post_types)) !== false) {unset($post_types[$key]);}
	if (($key = array_search('nav_menu_item', $post_types)) !== false) {unset($post_types[$key]);}

	$meta_boxes[] = array(
		'id'             => 'post-types-to-display-on',
		'title'          => __( 'Which pages do you want to dispay the Marquee on?', 'textdomain' ),
		'settings_pages' => 'marquee-settings',
		'fields'         => array(
			// CHECKBOX LIST
			array(
				'name'    => __( 'Post Types', 'marquee-settings' ),
				'id'      => "{$prefix}checkbox_list",
				'type'    => 'checkbox_list',
				// Options of checkboxes, in format 'value' => 'Label'
				'options' => $post_types,
				
			)
		)
	);
	
	return $meta_boxes;
}




