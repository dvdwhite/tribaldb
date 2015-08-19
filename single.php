<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Tribal Database
 */

get_header(); ?>

<div class="container-fluid">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">    
    
			<div class="ten-twenty-four row clearfix loop-padding">
				<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>
				
				<?php if ( ! dynamic_sidebar( 'sidebar-above-columns' ) ) : endif; ?>
                
                <?php if ( ! dynamic_sidebar( 'sidebar-top' ) ) : endif; ?>

				<?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'single' ); ?>

                    <?php /* tribaldb_post_nav(); */ ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>
			</div><!-- #ten twenty four -->	

			<?php if ( ! dynamic_sidebar( 'sidebar-bottom' ) ) : endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	

</div><!-- #container fluid -->


<?php get_footer(); ?>