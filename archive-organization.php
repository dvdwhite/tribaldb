<?php
/**
 * The template for displaying Organizations CPT Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Tribal Database
 */

get_header(); ?>

<div class="container-fluid">

    <div class="ten-twenty-four row clearfix">
    	<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>
    	<?php if ( ! dynamic_sidebar( 'sidebar-above-columns' ) ) : endif; ?>
        
	    	<div class="col-sm-12 float-left">

				<section id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

					<div class="content-padding">
   
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
                            if ( ( in_array( 'member', (array) $user->roles ) ) || ( in_array( 'mega_member', (array) $user->roles ) ) || ( in_array( 'administrator', (array) $user->roles ) ) )  {
                                //echo '<h3>My Organizations</h3><hr />';
                            }
                        ?>  
                        
                        

<script>
    
jQuery(function(){
    jQuery('input').focus(function() {
        jQuery(this).attr('placeholder','');
    });
    jQuery('input').focusout(function() {
        jQuery(this).attr('placeholder','Search for Organization Name');
    });
});
    
function orgSearch(searchParam) {
    var input, filter, table, tr, td, i;
    if (searchParam == 'name') { jQuery('select#organization-region-search').val(""); jQuery('select#organization-state-search').val(""); }
    if (searchParam == 'region') { jQuery('input#organization-name-search').attr('placeholder', "Search for Organization Name"); jQuery('select#organization-state-search').val(""); }
    if (searchParam == 'state') { jQuery('input#organization-name-search').attr('placeholder', "Search for Organization Name"); jQuery('select#organization-region-search').val(""); }
    input = document.getElementById("organization-" + searchParam + "-search");
    filter = input.value.toUpperCase();
    table = document.getElementById("organization-table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByClassName('org-' + searchParam )[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
}
</script> 
                                   
                        <!--<h3>All Organizations</h3>
                        <hr />-->
                        <table id="organization-table" class="organization-list">
                            <tr>
                                <th><input type="text" id="organization-name-search" onkeyup="orgSearch('name')" placeholder="Search for Organization Name" title="Type in a name"></th>
                                <th>
                                    <select id="organization-region-search" onchange="orgSearch('region')">
                                        <option value="">Select a Region</option>
                                        <option value="alaska">Alaska</option>
                                        <option value="eastern-oklahoma">Eastern Oklahoma</option>
                                        <option value="eastern">Eastern</option>
                                        <option value="midwest">Midwest</option>
                                        <option value="northwest">Northwest</option>
                                        <option value="pacific">Pacific</option>
                                        <option value="rocky-mountain">Rocky Mountain</option>
                                        <option value="southern-plains">Southern Plains</option>
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
                        
						<?php tribaldb_paging_nav(); ?>

					<?php else : ?>

						<?php get_template_part( 'content', 'none' ); ?>

					<?php endif; ?>

					</div>

					</main><!-- #main -->
				</section><!-- #primary -->

			</div><!-- #12-column -->


	</div><!-- #ten twenty four -->	

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
    
</div><!-- #container fluid -->	


<?php get_footer(); ?>
