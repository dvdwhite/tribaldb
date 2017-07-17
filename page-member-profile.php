<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Tribal Database
 */

get_header(); ?>

<div class="container-fluid">
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php if ( ! dynamic_sidebar( 'sidebar-top' ) ) : endif; ?>

			<div class="ten-twenty-four row clearfix loop-padding">

							<?php
				/**
				 * @package Tribal Database
				 */

					//GET USER DATA
					
					$user_meta = array_map( function( $a ){ return $a[0]; }, get_user_meta( $_GET[usr_id] ) );
  					//print_r( $user_meta );

					$first_name = $user_meta['first_name'];
					$last_name = $user_meta['last_name'];
					$organization = $user_meta['organization'];
					$agencydepartment = $user_meta['agencydepartment'];
					$job_title = $user_meta['job_title'];
					$address_1 = $user_meta['address_1'];
					$address_2 = $user_meta['address_2'];
					$city = $user_meta['city'];
					$state = $user_meta['state'];
					$zip = $user_meta['zip'];
					$phone = $user_meta['phone'];
					$description = $user_meta['description'];
					
					
				?>


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
				
		

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

				    <div class="org-details-container row loop-padding">
				        <div class="col-sm-8 orange-bg profile-height">
				            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <h3>Profile Details</h3>
                                    <p>
                                        <?php
                                            echo 'Name: ' . $first_name . ' ' . $last_name . '<br/>';
                                            echo 'Organization: ' . $organization . '<br/>';
                                            echo 'Agency/Department: ' . $agencydepartment . '<br/>';
                                            echo 'Title: ' . $job_title . '<br/>';
                                        ?>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <h3>Contact Info:</h3>
                                        <?php
                                            echo 'Phone: ' . $phone . '<br/>';
                                            echo 'Address: ' . $address_1 . '<br/>';
                                            if ($address_2) {
                                                echo $address_2 . '<br/>';
                                            }
                                            echo 'State: ' . $state . '<br/>';
                                            echo 'Zip Code:' . $zip . '<br/>';
                                        ?>
                                </div>                                
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-11">
                                <?php if($description): ?>
                                    <h3>Bio:</h3>
                                    <?php echo $description;
                                          endif;
                                    ?>
                                </div>
                            </div>
				        </div>
				        <div class="col-sm-4 blue-bg profile-height">
				            <h3>Database Links</h3>
				            <div class="menu-temporary-database-menu-container">
                                <ul id="menu-temporary-database-menu" class="menu">
                                    <li class="menu-item"><a href="/database/">Database Portal</a></li>
                                    <li class="menu-item"><a href="/organizations">Organizations</a></li>
                                    <li class="menu-item"><a href="/database/contact/">Contact Us</a></li>
                                    <li class="menu-item"><a href="/database/request-access/">Request Access</a></li>
                                    <li class="menu-item"><a href="/database/submit-a-document/">Submit a Document</a></li>
                                    <li class="menu-item"><a href="/wp-admin/profile">Update Profile</a></li>
                                </ul>
                            </div>
				        </div><br clear="all" />
         
				    </div><!-- end org-details-container -->
			</div><!-- #ten twenty four -->	


		</main><!-- #main -->
	</div><!-- #primary -->
	

</div><!-- #container fluid -->

<?php get_footer(); ?>
