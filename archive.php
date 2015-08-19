<?php
/**
 * The template for displaying Archive pages.
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
    	<div class="two-column-margin">

	    	<div class="col-sm-8 main-channel float-left">

				<section id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

					<div class="content-padding">

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h2 class="page-title">
								<?php
									if ( is_category() ) :
										single_cat_title();

									elseif ( is_tag() ) :
										single_tag_title();

									elseif ( is_author() ) :
										printf( __( 'Author: %s', 'tribaldb' ), '<span class="vcard">' . get_the_author() . '</span>' );

									elseif ( is_day() ) :
										printf( __( 'Day: %s', 'tribaldb' ), '<span>' . get_the_date() . '</span>' );

									elseif ( is_month() ) :
										printf( __( 'Month: %s', 'tribaldb' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'tribaldb' ) ) . '</span>' );

									elseif ( is_year() ) :
										printf( __( 'Year: %s', 'tribaldb' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'tribaldb' ) ) . '</span>' );

									elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
										_e( 'Asides', 'tribaldb' );

									elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
										_e( 'Galleries', 'tribaldb');

									elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
										_e( 'Images', 'tribaldb');

									elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
										_e( 'Videos', 'tribaldb' );

									elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
										_e( 'Quotes', 'tribaldb' );

									elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
										_e( 'Links', 'tribaldb' );

									elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
										_e( 'Statuses', 'tribaldb' );

									elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
										_e( 'Audios', 'tribaldb' );

									elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
										_e( 'Chats', 'tribaldb' );

									else :
										_e( 'Archives', 'tribaldb' );

									endif;
								?>
							</h2>
							<?php
								// Show an optional term description.
								$term_description = term_description();
								if ( ! empty( $term_description ) ) :
									printf( '<div class="taxonomy-description">%s</div>', $term_description );
								endif;
							?>
						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
								/* Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'content', get_post_format() );
							?>

						<?php endwhile; ?>

						<?php tribaldb_paging_nav(); ?>

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

					</div>

					</main><!-- #main -->
				</section><!-- #primary -->

			</div><!-- #8-column -->

		</div>

		<?php get_sidebar(); ?>

	</div><!-- #ten twenty four -->	

</div><!-- #container fluid -->	


<?php get_footer(); ?>
