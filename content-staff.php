<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Tribal Database
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="page-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
        
            <div class="eq-ht-wrapper clearfix">
                <div class="eq-ht col-3 lt-grey lter-grey full-image col-3-spaced rectangle clearfix">
                    <div class="image">
                        <a href="#" class="staff-click" rel="karin-ashby"><img src="/wp-content/uploads/2015/06/karin-ashby.jpg" /></a>
                    </div>
                    <div class="bottom">
                        <h3>&nbsp;</h3>
                        <a href="#" class="staff-click title department" rel="karin-ashby"><h4 class="name subtitle">Karin Ashby</h4></a>
                    </div>
                </div>
                <div class="eq-ht col-3 lt-grey lter-grey full-image col-3-spaced rectangle clearfix">
                    <div class="image">
                        <a href="#" class="staff-click" rel="ron-gurley"><img src="/wp-content/uploads/2015/06/ron-gurley.jpg" /></a>
                    </div>
                    <div class="bottom">
                        <h3>&nbsp;</h3>
                        <a href="#" class="staff-click title department" rel="ron-gurley"><h4 class="name subtitle">Ron Gurley</h4></a>
                    </div>
                </div>
                <div class="eq-ht col-3 lt-grey lter-grey full-image col-3-spaced rectangle clearfix">
                    <div class="image">
                        <a href="#" class="staff-click" rel="hedi-bogda"><img src="/wp-content/uploads/2015/06/hedi-bogda.jpg" /></a>
                    </div>
                    <div class="bottom">
                        <h3>&nbsp;</h3>
                        <a href="#" class="staff-click itle department" rel="hedi-bogda"><h4 class="name subtitle">Hedi Bogda</h4></a>
                    </div>
                </div>
            </div>
        
		<?php the_content(); ?>
        
        <style>
            .staff-content {
                display:none;
            }
        </style>
        
        <script>
            jQuery(function() {
                jQuery('.staff-click').click(function() {
                    jQuery('.staff-content').fadeOut();
                    var staffLink = jQuery(this).attr('rel');
                    //console.log(staffLink);
                    jQuery('#' + staffLink).fadeIn();
                });
            });
        </script>
        
		<?php /*
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'tribaldb' ),
				'after'  => '</div>',
			) ); */
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'tribaldb' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->