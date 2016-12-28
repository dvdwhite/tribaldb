<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Tribal Database
 */

get_header(); ?>

<div class="container-fluid">
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( ! dynamic_sidebar( 'sidebar-top' ) ) : endif; ?>

			<div class="ten-twenty-four row clearfix loop-padding">
				<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>				

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>
			</div><!-- #ten twenty four -->	


		</main><!-- #main -->
	</div><!-- #primary -->
	

</div><!-- #container fluid -->

<?php get_footer(); ?>
