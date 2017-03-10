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
            <?php if ( is_category('tribal-connections') || ( is_page('tribal-connections') ) ) { ?>
                
                <aside id="search-3" class="widget widget_search"><form role="search" method="get" class="search-form-blog" action="/">
                    <label>
                        <span class="screen-reader-text">Search for:</span>
                        <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                        <input type="hidden" name="category" value="tribal-connections" />
                    </label>
                    <input type="submit" class="search-submit" value="Search" />
                </form></aside> 
            
                <aside id="archives" class="widget">
					<h4 class="widget-title"><?php _e( 'ARCHIVES', 'tribaldb' ); ?></h4>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly', 'category' => 'tribal-connections' ) ); ?>
					</ul>
				</aside>

				            
            
            <?php } ?>
				
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<?php endif; // end sidebar widget area    ?>
    
            

		</div><!-- #secondary -->

	</div>
</div>