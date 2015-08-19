<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Tribal Database
 */
?>

<div class="two-column-margin">
	<div class="col-sm-4 col-xs-12 <?php wp_reset_query();  echo is_page_template( 'page-left-sidebar.php' ) ? 'left-channel' : 'right-channel'; ?> ">

		<div id="secondary" class="widget-area" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', 'tribaldb' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', 'tribaldb' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary -->

	</div>
</div>