<?php
$prefix = 'tribal_user_';
add_action( 'rwmb_meta_boxes', 'tribal_user_register_user_meta_boxes' );
function tribal_user_register_user_meta_boxes( $meta_boxes ) {

	$args = array(
		'posts_per_page'   => 5,
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => 'date',
		'order'            => 'DESC',
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'organization',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'author'	   => '',
		'author_name'	   => '',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$posts_array = get_posts( $args );

    $output = null;
    $output_ids;
    foreach( $posts_array as $post ):
    	$output_ids[] = $post->post_name;
    	$output_names[] = $post->post_name;
        
    endforeach;
    $output_key_value = array_combine($output_ids, $output_names);
	$meta_boxes[] = array(
		'title' => 'Organization',
		'type'  => 'user', // Specifically for user
		'fields' => array(
			// SELECT ADVANCED BOX
			array(
				'name'        => __( 'Select the members Organization here, if there are multiple, select add more', 'tribal-user' ),
				'id'          => "{$prefix}select_advanced",
				'type'        => 'select_advanced',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $output_key_value,
				/*'options'     => array(
					'value1' => __( 'Label1', 'your-prefix' ),
					'value2' => __( 'Label2', 'your-prefix' ),
				),*/
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				// 'std'         => 'value2', // Default value, optional
				'placeholder' => __( 'Select an Item', 'tribal-user' ),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => true,
			),
		),
	);
	return $meta_boxes;
}
?>