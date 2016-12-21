<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Tribal Database
 */

get_header(); ?>
<style type="text/css">
	input[type="text"].um_login_field, input[type="password"].um_pass_field{
		width: 100%;
	}
</style>
<div class="container-fluid">

    <div class="ten-twenty-four row clearfix">
    	<?php if(function_exists(simple_breadcrumb)) {simple_breadcrumb();} ?>
    	
        <section id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
<div class="content-padding">
            <?php if ( have_posts() ) : ?>

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
</div>
            </main><!-- #main -->
        </section><!-- #primary -->


	</div> <!-- #content-wrapper -->

</div>


<?php get_footer(); ?>
