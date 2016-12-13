<?php
/**
 * The template for displaying Organizations CPT Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tribal Database
 */

get_header(); ?>

<div class="container-fluid">


    <div class="ten-twenty-four row clearfix">
    	<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>
    	<?php if ( ! dynamic_sidebar( 'sidebar-above-columns' ) ) : endif; ?>
    	

	    	<div class="col-sm-12 float-left">

				<section id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

					<div class="content-padding">
   
					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h2 class="page-title">Organizations <span class="back-to-link"> &nbsp; | <a href="/database">Back to Database Home &#187;</a></span></h2>
						</header><!-- .page-header -->
                        
                        <?php 
                            $user = wp_get_current_user();
                        
                            if ( $user->first_name ) {
                                echo 'Welcome, ' . $user->first_name . '.';
                            }
                            else {
                                echo 'Welcome, ' . $user->nickname . '.';
                            }
                        
                            if ( in_array( 'member', (array) $user->roles ) ) {
                                echo '<p>You are a Member.</p>';
                            }
                            elseif ( in_array( 'mega_member', (array) $user->roles ) ) {
                                echo '<p>You are a Mega Member.</p>';
                            }
                            elseif ( in_array( 'administrator', (array) $user->roles ) ) {
                                echo '<p>You are an Administrator.</p>';
                            }
                            else {
                                echo '<p>You are a guest.</p>';
                            }
                        ?>  
                        
                        <?php 
                            $user = wp_get_current_user();
                            if ( ( in_array( 'member', (array) $user->roles ) ) || ( in_array( 'mega_member', (array) $user->roles ) ) || ( in_array( 'administrator', (array) $user->roles ) ) )  {
                                echo '<h3>My Organizations</h3><hr />';
                            }
                        ?>  
                        
                        <h3>All Organizations</h3>
                        <hr />
                        <table class="organization-list">
                            <tr>
                                <th>Organization Name</th>
                                <th>Region</th>
                                <th>State</th>
                            </tr>
                            
                            
                          <?php

                            // set up our archive arguments
                            $archive_args = array(
                                post_type => 'organization',    // get only posts
                                'posts_per_page'=> -1,   // this will display all posts on one page
                                'orderby' => 'title',
                                'order'   => 'ASC',
                            );

                            // new instance of WP_Quert
                            $archive_query = new WP_Query( $archive_args );

                          ?>
                            
						<?php /* Start the Loop */ ?>
						<?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); // run the custom loop ?>

							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', 'organization-list' );
							?>

						<?php endwhile; ?>
                        </table>
                        
						<?php tribaldb_paging_nav(); ?>

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

					</div>

					</main><!-- #main -->
				</section><!-- #primary -->

			</div><!-- #12-column -->


	</div><!-- #ten twenty four -->	

        <div class="body-callout-box light-gray-callout row clearfix" style="background:#866787; color:#fff; font-size: 1.2em; border: 0;">
            <div class="ten-twenty-four">
                <div class="callout-description center-align">
                    <h2>QUESTIONS?</h2>
                    Lorem ipsum dolor sit amet, ea sit autem facilis graecis. Utinam luptatum urbanitas te cum, fabellas nominati neglegentur eu nam. Mel ne modus tation, et vidisse corpora has. An bonorum dolorum cum. In nostro officiis sed. Sea at augue erant recusabo, pri ex quaeque imperdiet intellegam, ad cum amet omnes equidem.
                    <br /><br />
                    <div class="callout-button clearfix">
                        <div class="learn-more blue"><a href="/database/contact">Contact Us</a></div>
                    </div>
                </div>
            </div>
        </div> <!-- #questions -->    
    
</div><!-- #container fluid -->	


<?php get_footer(); ?>
