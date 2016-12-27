<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Tribal Database
 */
?>
<style type="text/css">
	input[type="text"].um_login_field, input[type="password"].um_pass_field{
		width: 100%;
	}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="page-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<aside id="tribal_column-8" class="widget widget_tribal_column">
			<div class="eq-ht-wrapper clearfix">
				<div class="eq-ht col-3 lt-grey orange-bg" style="height: 250px;">
					<a href=" #"> <h3>Member Login</h3></a>
					<?php echo do_shortcode('[user-meta-login]');?>
				</div>	


				<div class="eq-ht col-3 lt-grey purple-bg" style="height: 250px;">
					<a href=" #"> <h3>Member Request</h3></a>
					This is description #2 where some stuff gets talked about at length<div class="learn-more blue"><a href="#">Request Access </a></div>	
				</div>	



				<div class="eq-ht col-3 lt-grey blue-bg" style="height: 250px;">
					<a href=" #"> <h3>Resources</h3></a>
					This is description #3 where some stuff gets talked about at length<div class="learn-more blue"><a href="#">Search Docs </a></div>	
				</div>		
			</div> <!-- end eq height wrapper -->   
		</aside>
		<!-- SEARCH BAR -->
		<aside style="height: 150px; width: 100%;" id="" class="">
            <form role="search" method="get" class="search-form" action="/">
                <label>
                    <span class="screen-reader-text">
                        <p><strong>Search The Tribal Directory</strong></p>
                    </span>
                    <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" title="Search for:" />
                </label>
                <input type="submit" class="search-submit" value="Search" />
                <input type="hidden" name="post_type" value="organization" />
            </form>
            
            <p>&nbsp;</p>
            
		</aside>

	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'tribaldb' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->