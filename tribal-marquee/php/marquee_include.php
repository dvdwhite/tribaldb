		<?php
			$image_height = rwmb_meta( 'tribal_meta_image_min_height_slider', $args = array(), $post_id = null );
			$full_screen = rwmb_meta( 'tribal_meta_full_screen', $args = array(), $post_id = null );
			echo '<div class="img-height" data-image-height="' . $image_height . '" data-full-screen="' . $full_screen .  '"></div>';
			
			echo '<div class="marquee">';
				echo '<div class="marquee_data">';
						$images = rwmb_meta( 'tribal_meta_imgadv', 'type=image&size=full' );
						$site_url = get_site_url();
						foreach ( $images as $image )
						{	
							$image_id = $image['ID'];
							$image_url_full = wp_get_attachment_image_src( $image_id, 'full' );
							$image_url_full_trimmed = $image_url_full[0];
							$image_heading = rwmb_meta( 'tribal_image_meta_textarea_1', $args = array(), $image_id );
							$image_subhead = rwmb_meta( 'tribal_image_meta_textarea_2', $args = array(), $image_id );
							$image_description_small = rwmb_meta( 'tribal_image_meta_textarea_3', $args = array(), $image_id );
							$left_or_right = rwmb_meta( 'tribal_image_meta_lr_radio', $args = array(), $image_id );
							$text_height = rwmb_meta( 'tribal_image_meta_text_height_slider', $args = array(), $image_id );
							$link = rwmb_meta( 'tribal_image_meta_url', $args = array(), $image_id );
							$large_image = wp_get_attachment_image_src( $image_id, 'large' );
							$image_url_large = $large_image[0];
							$vertical_position_class = rwmb_meta( 'tribal_image_meta_vertical_position', $args = array(), $image_id );

							echo '<div class="marquee_panel" data-image-full="'. $image_url_full_trimmed .'" data-image-large="'.$image_url_large.'" data-vertical-orientation="'.$vertical_position_class.'"';
							 if ($left_or_right != null) {echo ' data-left-right-class="' . $left_or_right . '"';}
							 if ($text_height != null) {echo ' data-text-height="' . $text_height . '"';}
							 if ($link != null) {echo ' data-link="' . $link . '"';}

							echo'>'; 
								echo '<div class="panel_caption">';
									if ($image_heading != null) { echo '<h1>' . $image_heading  . '</h1>';}
								echo '</div>';
								echo '<div class="panel_description">';
										if ($image_subhead != null) { echo '<h1>' .  $image_subhead . '</h1>';}
								echo '</div>';
								echo '<div class="panel_description_small">';
										if ($image_description_small != null) { echo '<span>' .  $image_description_small . '</span>';}
								echo '</div>';
							echo '</div>';

						    echo "<img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";

						}

				echo '</div>';
			echo '</div>';
		?>
