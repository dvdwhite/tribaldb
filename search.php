<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Tribal Database
 */

get_header(); ?>
<div class="container-fluid">

    <div class="ten-twenty-four row clearfix">
    	<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>
    	
        <section id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
<div class="content-padding">
            <?php if ( have_posts() ) : ?>

                <!-- SEARCH BAR -->
                <div style="margin: 20px auto;">
                    <aside style="width: 100%;" id="" class="">
                        <form role="search" method="get" class="search-form" action="/">
                            <label>
                                <!--<span class="screen-reader-text">
                                    <p><strong>Search The Tribal Directory</strong></p>
                                </span>-->
                                <input type="search" class="search-field" placeholder="Search the Tribal Database" value="" name="s" title="Search the Tribal Database" />
                            </label>
                            <input type="submit" class="search-submit" value="Search" />
                            <?php 
                                $referrer = $_SERVER["HTTP_REFERER"]; 
                                $organization   = 'organization';
                                $database   = 'database';
                                $pos1 = strpos($referrer, $organization);
                                $pos2 = strpos($referrer, $database);

                                // Note our use of ===.  Simply == would not work as expected
                                // because the position of 'a' was the 0th (first) character.
                                if ( ($pos1 === false) && ($pos2 === false) ) {
                                    //echo "The string '$findme' was not found in the string '$referrer'";
                                } else {
                                    //echo "The string '$findme' was found in the string '$referrer'";
                                    //echo " and exists at position $pos";
                                    echo '<input type="hidden" name="post_type" value="organization" />';
                                }
                                //if ( $referrer == '')
                            ?>
                            
                        </form>

                        <p>&nbsp;</p>

                    </aside>
                </div>
    
                <header class="page-header">
                    <h2 class="entry-title"><?php printf( __( 'Search Results for: %s', 'tribaldb' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                </header><!-- .page-header -->
                
                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'search' ); ?>

                <?php endwhile; ?>

                <?php tribaldb_paging_nav(); ?>

            <?php else : ?>

                <?php get_template_part( 'content', 'none' ); ?>

            <?php endif; ?>  
    
    <p>&nbsp; &nbsp;</p>
</div>
            </main><!-- #main -->
        </section><!-- #primary -->


	</div> <!-- #content-wrapper -->
    

    
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

</div>


<?php get_footer(); ?>
