<?php
/**
 * The template for displaying Organizations CPT Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
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
	
get_header(); ?>

<div class="container-fluid">

    <div class="ten-twenty-four row clearfix loop-padding">
    	<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>
    	<?php if ( ! dynamic_sidebar( 'sidebar-above-columns' ) ) : endif; ?>
        
        <section id="primary" class="content-area">
            <main id="main" class="site-main" role="main">


            <?php if ( have_posts() ) : ?>

                <header class="page-header">
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
                    </div>
                    <h2 class="page-title">Organizations <span class="back-to-link"> &nbsp; | <a href="/database">Back to Database Home &#187;</a></span></h2>
                </header><!-- .page-header -->

                <?php 
                    $user = wp_get_current_user();
                    $organization_slug = $user->organization; 
        
                    //echo $organization_slug;
                    
                
                    if ( !empty($organization_slug) ) {
                    
                        $my_organization = new WP_Query(  array( 'name' => $organization_slug, 'post_type' => 'organization' )  );

                        // The Loop
                        if ( $my_organization->have_posts() ) { 

                            while ( $my_organization->have_posts() ) {

                                $my_organization->the_post();
                                //echo '<h3>' . get_the_title() . '</h3>';
                        ?>
                                <br clear="all" />
                                <div class="details-header">
                                    <h3>My Organizations &nbsp; &#187;</h3>
                                </div>
                                <table id="my-organization-table" class="organization-list">
                                    <tr>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><a href="<?php the_permalink();?>"><?php echo the_title();?></a></td>
                                        <td><?php echo rwmb_meta('tribal_region') ?></td>
                                        <td><?php echo rwmb_meta('tribal_city') ?>, <?php echo rwmb_meta('tribal_state') ?></td>
                                    </tr>
                                </table>
                                        <?php foreach ( $user_query->results as $user ) {
                                            if (in_array("member", $user->roles) && in_array("organization_admin", $user->roles)) {
                                                //echo $user->display_name . '<br /><a href="mailto:' . $user->user_email . '">' . $user->user_email . '</a></p>';
                                            }
                                        } ?>


                            <?php }

                            /* Restore original Post Data */
                            wp_reset_postdata();
                        } else {
                            // no posts found
                        }
                        
                    }
                
                ?>

                <?php 
                    $user = wp_get_current_user();
                    if ( ( in_array( 'member', (array) $user->roles ) ) || ( in_array( 'mega_member', (array) $user->roles ) ) || ( in_array( 'administrator', (array) $user->roles ) ) )  {
                        //echo '<h3>My Organizations</h3><hr />';
                    }
                ?>  


                <div class="details-header">
                    <h3>All Organizations &nbsp; &#187;</h3>
                </div>
                <table id="organization-table" class="organization-list">
                    <tr>
                        <th><input type="text" id="organization-name-search" onkeyup="orgSearch('name')" placeholder="Search for Organization Name" title="Type in a name"></th>
                        <th>
                            <select id="organization-region-search" onchange="orgSearch('region')">
                                <option value="">Select a Region</option>
                                <option value="alaska">Alaska</option>
                                <option value="eastern oklahoma">Eastern Oklahoma</option>
                                <option value="eastern">Eastern</option>
                                <option value="midwest">Midwest</option>
                                <option value="northwest">Northwest</option>
                                <option value="pacific">Pacific</option>
                                <option value="rocky mountain">Rocky Mountain</option>
                                <option value="southern plains">Southern Plains</option>
                                <option value="western">Western</option>
                            </select>
                        </th>
                        <th>
                            <select id="organization-state-search" onchange="orgSearch('state')">
                                <option value="">Select a State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>	                                          
                        </th>
                    </tr>


                  <?php

                    // set up our archive arguments
                    $archive_args = array(
                        post_type => 'organization',    // get only posts
                        'posts_per_page'=> -1,   // this will display all posts on one page
                        'orderby' => 'title',
                        'order'   => 'ASC',
                    );

                    // new instance of WP_Quert
                    $archive_query = new WP_Query( $archive_args );

                  ?>

                <?php /* Start the Loop */ ?>
                <?php while ( $archive_query->have_posts() ) : $archive_query->the_post(); // run the custom loop ?>

                    <?php
                        /* Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'content', 'organization-list' );
                    ?>

                <?php endwhile; ?>
                </table>

                <?php //tribaldb_paging_nav(); ?>

            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>

            </main><!-- #main -->
        </section><!-- #primary -->

	</div><!-- #ten twenty four -->	

        <div class="body-callout-box light-gray-callout row clearfix" style="background:#866787; color:#fff; font-size: 1.2em; border: 0;">
            <div class="ten-twenty-four">
                <div class="callout-description center-align">
                    <h2>QUESTIONS?</h2>
                    For questions about using the site or your existing membership, please use the <a href="/database/request-access" style="color:#fff;">'Contact Us'</a> button. If you wish to request an account, please use the <a href="/database/request-access" style="color:#fff;">‘Request Access’</a> button.
                    <br /><br />
                    <div class="callout-button clearfix">
                        <div class="learn-more blue" style="display:inline;text-align:center;"><a href="/database/contact">Contact Us</a></div> &nbsp; &nbsp; <div class="learn-more blue" style="display:inline;text-align:center;"><a href="/database/request-access">Request Access</a></div>
                    </div>
                </div>
            </div>
        </div> <!-- #questions -->    
    
</div><!-- #container fluid -->	

<?php get_footer(); ?>

   