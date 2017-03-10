<?php
/**
 * Template Name: 2 Column Template
 *
 * @package Tribal Database
 */

get_header(); ?>
<?php get_post_custom(); ?>

<style>
    .page-title {display:none;}
    .widget-title {color:#000 !important;}
</style>

<div class="container-fluid">

	<div class="ten-twenty-four row clearfix">
		<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>
	</div>
	<?php if ( ! dynamic_sidebar( 'sidebar-above-columns' ) ) : endif; ?>

    <div class="ten-twenty-four row clearfix">
        <div class="loop-padding">
            <?php while ( have_posts() ) : the_post();

                get_template_part( 'content', 'page' );

            endwhile; ?>        
        </div>
		<div class="two-column-margin">
	    	<div class="col-sm-8 col-xs-12 main-channel float-left">

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

				  		<?php if ( ! dynamic_sidebar( 'sidebar-top' ) ) : endif; ?>		

						<div class="content-padding">

                            <h2>RECENT POSTS</h2>
                            
                            <p>&nbsp;</p>
                            
                            <?php $my_query = new WP_Query( 'category_name=tribal-connections' );
                                while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                                    <?php endif; ?>
                                    <h3><a href="<?php echo the_permalink();?>"><?php echo the_title(); ?></a></h3>
                                    <?php 
                                        //echo get_author_name();
                                        //echo ' | ';
                                        echo the_date();

                                    ?>
                                    <p><?php echo the_excerpt(); ?></p>
                            <?php endwhile;?>

						</div>

					<?php if ( ! dynamic_sidebar( 'sidebar-bottom' ) ) : endif; ?>

					</main><!-- #main -->
			
				</div><!-- #primary -->
			</div>
		</div>

		<?php get_sidebar(); ?>

	</div> <!-- #content-wrapper -->

	<?php if ( ! dynamic_sidebar( 'sidebar-below-columns' ) ) : endif; ?>

</div>

<?php get_footer(); ?>