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
                echo '<h3>Welcome, Guest!</h3>';
                echo '<a href="/wp-admin">Sign In</a> | <a href="/database/request-access">Request Access</a>';
            } ?>
        </div>    <br clear="all" />    
		<h2 class="page-title"><?php the_title(); ?><!-- <span class="back-to-link"> &nbsp; | <a href="/organizations">Back to Organizations &#187;</a></span>--></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
        
        <?php the_content(); ?>

	</div><!-- .entry-content -->    
    
    <div class="org-details-container row loop-padding">
        <div class="col-sm-8 orange-bg detail-height">
            <div class="col-sm-6">
                <h3>Organization Details</h3>
                <?php echo rwmb_meta('tribal_address_1') ?><br />
                <?php if ( !empty( rwmb_meta('tribal_address_2') ) ) { echo '<a href="' . rwmb_meta('tribal_address_2') . '</a><br />'; } ?>
                <?php echo rwmb_meta('tribal_city') ?>, <?php echo rwmb_meta('tribal_state') ?>, <?php echo rwmb_meta('tribal_zip') ?><br />
                <p>Primary phone: <?php echo rwmb_meta('tribal_primary_phone') ?><br />
                <?php if ( !empty( rwmb_meta('tribal_secondary_phone') ) ) { echo 'Secondary Phone: ' . rwmb_meta('tribal_secondary_phone') . '<br />'; } ?>
                <?php if ( !empty( rwmb_meta('tribal_fax') ) ) { echo 'Fax: ' . rwmb_meta('tribal_fax'); } ?></p>
                <?php if ( !empty( rwmb_meta('tribal_website') ) ) { echo '<a href="' . rwmb_meta('tribal_website') . '">Website</a>'; } ?>
            </div>
            <div class="col-sm-6">
                <h3>Region: <?php echo rwmb_meta('tribal_region') ?></h3>
                <h3>Primary Contact:</h3>
                <?php foreach ( $user_query->results as $user ) {
                    if (in_array("member", $user->roles) && in_array("organization_admin", $user->roles)) {
                        echo $user->display_name . '<br /><a href="mailto:' . $user->user_email . '">' . $user->user_email . '</a></p>';
                    }
                } ?>
            </div>
        </div>
        <div class="col-sm-4 blue-bg detail-height">
            <h3>Database Links</h3>
            <div class="menu-temporary-database-menu-container"><ul id="menu-temporary-database-menu" class="menu"><li id="menu-item-1073" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-page-parent menu-item-1073"><a href="https://www.tribaldatabase.org/database/">Database Portal</a></li>
                <li id="menu-item-481" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-481"><a href="/organizations">Organizations</a></li>
                <li id="menu-item-411" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-409 current_page_item menu-item-411"><a href="https://www.tribaldatabase.org/database/contact/">Contact Us</a></li>
                <li id="menu-item-480" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-480"><a href="https://www.tribaldatabase.org/database/request-access/">Request Access</a></li>
                <li id="menu-item-1074" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1074"><a href="https://www.tribaldatabase.org/database/submit-a-document/">Submit a Document</a></li>
                </ul>
            </div>
        </div><br clear="all" />
        
        <?php 
            if ( is_user_logged_in() ) { 
                $user = wp_get_current_user();
                //echo '$org_name: ' . $org_name;
                //echo '<br />$user->organization: ' . $user->organization;
        
                if ( ( in_array( 'mega_member', (array) $user->roles ) ) || ( $user->organization == $org_name ) || ( in_array( 'administrator', (array) $user->roles ) ) ) { ?>
        
                <div class="details-header">
                    <h3>Member Directory<!-- &nbsp; &#187;--></h3>
                </div>

                <div class="loop-padding">
        
                    <table class="organization-list">
                        <tr>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>

                        <?php

                        // User Loop
                        if ( ! empty( $user_query->results ) ) {

                            foreach ( $user_query->results as $user ) {
                                echo '<tr><td><a href="/member-profile?usr_id=' . $user->ID . '">'. $user->display_name .'</a></td><td>'. $user->job_title .'</td><td>'. $user->user_email .'</td><td>'. $user->phone .'</td></tr>';
                            }
                        } 
                        else {
                            echo '<tr><td colspan="3">No members found.</td></tr>';
                        }
                    ?>

                    </table> 
                    
                </div>
        
                <div class="details-header">
                    <h3>Documents<!-- &nbsp; &#187;--></h3>
                </div>
        
                <div class="loop-padding">

                    <table class="organization-list">
                        <tr>
                            <th>File name</th>
                        </tr>
                        <?php
                            $tribal_files = rwmb_meta('tribal_file_advanced');
                            if ( !empty( $tribal_files ) ) {
                                foreach ( $tribal_files as $tribal_file ) {
                                    echo "<tr><td><a href='{$tribal_file['url']}' title='{$tribal_file['title']}'>{$tribal_file['name']}</a></td></tr>";
                                }
                            } else {
                                echo '<tr><td>No documents found.</td></tr>';
                            }
                        ?>
                    </table>
                </div> 
        
                <div class="details-header">
                   <h3><a href="/database/submit-a-document">Submit a Document</a> &nbsp; &#187;</h3>
                </div>
                
        
        <?php } else { ?>
                    
            <div class="details-header loop-padding">
                <h3>Member Directory and Documents &nbsp; &#187;</h3>
            </div>
            <div class="ten-twenty-four row loop-padding clearfix">
                <p>You must be assigned to an organization to view the member directory and document repository of that organization.</p>
            </div>
                    
                <?php }
            
            } else { ?>
        
            <div class="details-header loop-padding">
                <h3>Members Only &nbsp; &#187;</h3>
            </div>
            <div class="ten-twenty-four row loop-padding clearfix">
                <p>You must be logged in to view the complete member directory and document repository. Please <a href="/database" style="color:#866787!important">login here</a>.</p>
            </div>
        
        <?php } ?>
               
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
