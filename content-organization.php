<?php
/**
 * @package Tribal Database
 */

	//GET USER DATA
	$post = get_post($_GET[org_id]); 
	$org_name = $post->post_name;

	$user_fields = array( 
		'meta_query' => array(
		        array(
		            'key'   => 'organization',
		            'value' => $org_name,
		            'compare' => 'REGEXP'
		        )
		    )
		);
	$user_query = new WP_User_Query( $user_fields );
	/*echo '<pre>';
	var_dump($user_query);
	echo '</pre>';*/
	
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <!-- SEARCH BAR -->
                
                    <aside style="width: 75%; display:inline; float: left;" id="" class="">
                        <form role="search" method="get" class="search-form" action="/">
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
                         
        <div class="profile-links">
            <?php if ( is_user_logged_in() ) {
                $user = wp_get_current_user(); ?>


                <h3><?php echo 'Welcome, ' . $user->first_name; ?>!</h3>
                <?php 
                    if ( in_array( 'member', (array) $user->roles ) ) {
                        echo '(Member)';
                    }
                    elseif ( in_array( 'mega_member', (array) $user->roles ) ) {
                        echo '(Mega Member)';
                    }
                    elseif ( in_array( 'administrator', (array) $user->roles ) ) {
                        echo '(Administrator)';
                    }
                ?> 
                <br /><a href="/database/profile">Profile</a> | <a href="<?php echo wp_logout_url( $redirect ); ?>">Logout</a>


            <?php } 
            else {
                echo '<h3>Welcome, guest!</h3>';
                echo '<a href="/wp-admin">Sign In</a> | <a href="/database/request-access">Request Access</a>';
            } ?>
        </div>    <br clear="all" />    
		<h2 class="page-title"><?php the_title(); ?> <span class="back-to-link"> &nbsp; | <a href="/organizations">Back to Organizations &#187;</a></span></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
        
        <?php the_content(); ?>

        <p>Administrative Contact: 
	        <?php
				foreach ( $user_query->results as $user ) {
					
					if (in_array("member", $user->roles) && in_array("organization_admin", $user->roles)) {
					    echo $user->display_name;
					}
				}
		        
	        ?>
        </p>
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

	</div><!-- .entry-content -->
	<div class="ten-twenty-four"><!-- MEMBER LIST -->
        <h3>Organization Members</h3>
			<table class="organization-list">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
                
            <?php
			
			// User Loop
			if ( ! empty( $user_query->results ) ) {

				foreach ( $user_query->results as $user ) {
					echo '<tr><td>'. $user->display_name .'</td><td>'. $user->user_email .'</td><td>'. $user->phone .'</td></tr>';
				}
			} 
			else {
				echo '<tr><td colspan="3">No Members Found.</td></tr>';
			}
		?>
        
        </table>  
                
                
	</div>
        
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
