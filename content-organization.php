<?php
/**
 * @package Tribal Database
 */
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="page-title"><?php the_title(); ?> <span class="back-to-link"> &nbsp; | <a href="/organizations">Back to Organizations &#187;</a></span></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
        
        <?php the_content(); ?>
        
        
        
        <h3><?php echo rwmb_meta('tribal_full_name') ?></h3>
        <p>Other name: <?php echo rwmb_meta('tribal_other_name') ?></p>
        <p>Administrative Contact: <?php echo rwmb_meta('tribal_admin_contact') ?></p>
        <p>Primary phone: <?php echo rwmb_meta('tribal_primary_phone') ?></p>
        <p>Secondary phone: <?php echo rwmb_meta('tribal_secondary_phone') ?></p>
        <p>Fax: <?php echo rwmb_meta('tribal_fax') ?></p>
        <p>Region: <?php echo rwmb_meta('tribal_region') ?></p>
        <p>Address 1: <?php echo rwmb_meta('tribal_address_1') ?></p>
        <p>Address 2: <?php echo rwmb_meta('tribal_address_2') ?></p>
        <p>City: <?php echo rwmb_meta('tribal_city') ?></p>
        <p>State: <?php echo rwmb_meta('tribal_state') ?></p>
        <p>Zip: <?php echo rwmb_meta('tribal_zip') ?></p>
        <p>Website: <?php echo rwmb_meta('tribal_website') ?></p>
        <p>Attached Files:
        <?php
        
            $tribal_files = rwmb_meta('tribal_file_advanced');

            if ( !empty( $tribal_files ) ) {
                foreach ( $tribal_files as $tribal_file ) {
                    echo "<a href='{$tribal_file['url']}' title='{$tribal_file['title']}'>{$tribal_file['name']}</a><br />";
                }
            }
        
        ?>
        </p>
        
		<?php
			$post_tags = wp_get_post_tags($post->ID);
			$tag_count = count($post_tags);
			if ( $tag_count >= 1 ) {
			?>
				
			<div class="relatedposts">  
                <h3>Related posts</h3>
                <hr>
                <div class="eq-ht-wrapper clearfix">
                <?php  
                    $orig_post = $post;  
                    global $post;
                    $tags = wp_get_post_tags($post->ID);  

                    if ($tags) {  
                    $tag_ids = array();  
                    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
                    $args=array(  
                    'tag__in' => $tag_ids,  
                    'post__not_in' => array($post->ID),  
                    'posts_per_page'=>4, // Number of related posts to display.  
                    'caller_get_posts'=>1  
                    );  

                    $my_query = new wp_query( $args );  

                    while( $my_query->have_posts() ) {  
                    $my_query->the_post();  
                    ?>  

                    <div class="relatedthumb eq-ht col-4">  
                        <a rel="external" href="<? the_permalink()?>">
                        <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail('medium');
                        }else{
                            //echo '<img src="http://placehold.it/229x100&text=View+Article"/>';
                        }
                        ?>
                        </a>
                         <a class="title" rel="external" href="<? the_permalink()?>"><?php the_title(); ?></a><br />
                        <span class="related-date"><?php echo get_the_date(); ?></span>
                    </div>  

                    <?php }  
                    }  
                    $post = $orig_post;  
                    wp_reset_query();  
                    ?>
                </div>    <!-- End Four Columns Wrapper-->
            </div> <!-- End related posts by tag -->
		
            <hr />

			  <?php
			}
			else {}
		?><!-- End has tag ? -->        
        
        
        
		<?php /*
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'tribaldb' ),
				'after'  => '</div>',
			) ); */
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma 
			$category_list = get_the_category_list( __( ', ', 'tribaldb' ) );

			/* translators: used between list items, there is a space after the comma 
			$tag_list = get_the_tag_list( '', __( ', ', 'tribaldb' ) );

			if ( ! tribaldb_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'tribaldb' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'tribaldb' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'tribaldb' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'tribaldb' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			); */
		?>

		<?php edit_post_link( __( 'Edit', 'tribaldb' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
