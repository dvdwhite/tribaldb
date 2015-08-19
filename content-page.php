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
		<?php the_content(); ?>
		<?php /*
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'tribaldb' ),
				'after'  => '</div>',
			) ); */
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'tribaldb' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->