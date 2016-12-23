<?php
/**
 * The template for displaying the main database landing page.
 *
 * @package Tribal Database
 */

get_header(); ?>

<div class="container-fluid database-section">
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
            <!--<div style="width:100%;">
                <div style="display:inline; float: left; width: 45%; background-color:#ccc; height:300px;">test</div>
                <div style="display:inline; float: left; width: 300px; background-color:#cc0000; height:300px;">test</div>
                <div style="display:inline; float: right; width: 45%; background-color:#ccc; height:300px;">test</div>
            </div>-->
            
	<div class="entry-content">
		<?php the_content(); ?>
		<aside id="tribal_column-8" class="widget widget_tribal_column">
			<div class="eq-ht-wrapper clearfix db-full-width">
				<div class="eq-ht col-3 lt-grey orange-bg">
					<a href=" #"> <h3>Member Login</h3></a>
					<?php echo do_shortcode('[user-meta-login]');?>
				</div>	


				<div class="eq-ht col-3 lt-grey purple-bg">
					<a href="/organizations"> <h3>Organizations</h3></a>
                    Lorem ipsum dolor sit amet, debitis impedit maiorum eum ex. Et erant laudem patrioque vim. Eos tale solet at. Nec no wisi omnium.
                    <div class="learn-more blue"><a href="/organizations">View Organizations</a></div>
                    <!--<a href="#"> <h3>Member Directory</h3></a>
                    <a href="#"> <h3>Resources</h3></a>-->
						
				</div>	



				<div class="eq-ht col-3 lt-grey blue-bg">
					<a href=" #"> <h3>Request Access</h3></a>
					Lorem ipsum dolor sit amet, debitis impedit maiorum eum ex. Et erant laudem patrioque vim. Eos tale solet at. Nec no wisi omnium.
                    <div class="learn-more blue"><a href="/database/request-access">New User</a></div>	
				</div>		
			</div> <!-- end eq height wrapper -->   
		</aside>
        
        
		<!-- SEARCH BAR -->
		<div class="ten-twenty-four row clearfix loop-padding" style="margin: 30px auto;">
            <aside style="width: 100%;" id="" class="">
                <form role="search" method="get" class="search-form" action="http://www.tribaldatabase.org/">
                    <label>
                        <!--<span class="screen-reader-text">
                            <p><strong>Search The Tribal Directory</strong></p>
                        </span>-->
                        <input type="search" class="search-field" placeholder="Search the Tribal Database" value="" name="s" title="Search the Tribal Database" />
                    </label>
                    <input type="submit" class="search-submit" value="Search" />
                    <input type="hidden" name="post_type" value="organization" />
                </form>

                <p>&nbsp;</p>

            </aside>
        </div>
        
        <div class="body-callout-box row clearfix" style="background:url(http://tribaldatabase.dev/wp-content/uploads/2016/12/database_sunset_banner-e1481584371541.jpg); background-size: cover; background-position: center bottom; border: 0; color:#fff; min-height: 500px;">
            <div class="ten-twenty-four">
                <h2>ABOUT THE DATABASE</h2>
                Lorem ipsum dolor sit amet, ea sit autem facilis graecis. Utinam luptatum urbanitas te cum, fabellas nominati neglegentur eu nam. Mel ne modus tation, et vidisse corpora has. An bonorum dolorum cum. In nostro officiis sed. Sea at augue erant recusabo, pri ex quaeque imperdiet intellegam, ad cum amet omnes equidem.    
            </div>
        </div>
        
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

	</div><!-- .entry-content -->            

			<!--<div class="ten-twenty-four row clearfix loop-padding">
				<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>				

				<?php while ( have_posts() ) : the_post(); ?>

					<?php //get_template_part( 'content', 'database' ); ?>



				<?php endwhile; // end of the loop. ?>
			</div>--><!-- #ten twenty four -->	

			<?php if ( ! dynamic_sidebar( 'sidebar-bottom' ) ) : endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	

</div><!-- #container fluid -->

<?php get_footer(); ?>
