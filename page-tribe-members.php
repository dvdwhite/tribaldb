<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package summerhays_2016
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="fourteen-twenty-five">
				<a href="/teachers"><h2>Back to full teacher list</h2></a>
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.

				
				
					  //$user_id = 2;
					  //$key = 'organization';
					  //$single = true;
					  //$user_org = get_user_meta( $user_id, $key, $single ); 
					  //echo '<p>The '. $key . ' value for user id ' . $user_id . ' is: ' . $user_org . '</p>'; 

					$org_id = 'havasupai';
					//$org_id = $_GET[org_id];

					//I wish... $org_users = get_org_meta( $org_id, 'users', true);

					
					$user_fields = array( 
						'meta_query' => array(
						        array(
						            'key'   => 'organization',
						            'value' => $org_id,
						            'compare' => 'REGEXP'
						        )
						    )
						);
					$user_query = new WP_User_Query( $user_fields );
					echo '<pre>';
					var_dump($user_query);
					echo '</pre>';
					// User Loop
					if ( ! empty( $user_query->results ) ) {
						foreach ( $user_query->results as $user ) {
							
							echo $user->display_name;
						}
					} 
					else {
						echo '<br/>No Members Found.';
					}
				
				?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();