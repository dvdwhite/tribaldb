<?php
/**
 * The main template file for the category index.
 *
 *
 * @package Tribal Database
 */

get_header(); ?>

<div class="container-fluid">

    <div class="ten-twenty-four row clearfix">
    	<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>
    	<?php if ( ! dynamic_sidebar( 'sidebar-above-columns' ) ) : endif; ?>
    	<div class="two-column-margin">
	    	<div class="col-sm-8 main-channel">

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

					<?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>

						<div class="content-padding">

						<h2 class="page-title"><?php echo single_cat_title( '', false ); ?></h2>

                        <?php while ( have_posts() ) : the_post(); ?>
                            
                            <div class="post-image">

								<?php if ( has_post_thumbnail() ) { ?>
                                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
								<?php } ?>
                            </div>
		    				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		    		        <div class="entry-content">
                            <p><?php the_date(); ?></p>
		    				<p><?php the_excerpt(); ?></p>
		    				</div>
                            <hr />                            
                                

		  					<?php endwhile;?>

						</div>

					<?php else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

					</main><!-- #main -->
				</div><!-- #primary -->

			</div>

		</div>

		<?php get_sidebar(); ?>	

	</div><!-- #ten twenty four -->

</div><!-- #container fluid -->


<?php get_footer(); ?>
