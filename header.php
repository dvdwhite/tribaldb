<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Tribal Database
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="Description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="icon" href="/wp-content/themes/tribaldb/images/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/wp-content/themes/tribaldb/images/apple-touch-icon.png">
<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>    
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> <!-- ,300 ,600 -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css' />   

<?php wp_head(); ?>
<!--[if lte IE 8]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<?php

    if ( !isset($themeOptions) )
    	$themeOptions = TribalThemeOptions::getOptions();

?>

<body class="<?php if(is_front_page()):?><?php echo 'front-page'; ?><?php endif; ?>">

    <div id="header-container" class="clearfix" role="banner">

    	<header id="masthead" class="site-header" role="banner">

      		<div id="utah-logo"> </div>

        	<!--<div class="clearfix" id="search-area" role="search"><form action="http://gsa.search.utah.edu/search" method="get"><label class="visuallyhidden" for="search">Search Campus</label> <input id="search" title="Enter Search Terms" type="text" value="" name="q" /> <input type="hidden" value="default_collection" name="site" /> <input type="hidden" value="MainCampus" name="client" /> <input type="hidden" value="xml_no_dtd" name="output" /> <input type="hidden" value="MainCampus" name="proxystylesheet" /> <input type="hidden" value="10" name="numgm" /> <input id="search-btn" title="Submit Search" type="submit" value="Search" name="search-btn" /></form></div>-->     

        	<div class="header-color clearfix"> </div>

        		<nav id="top-nav" role="navigation">
          			<a href="javascript:///" class="top-mobile-nav mobile-menu-trigger" rel="top">MENU <span> </span></a>
				
					<?php wp_nav_menu( array( 
						'theme_location' 	=> 'primary', 
						'menu_class' 		=> 'top-menu menu-trigger',
						'container' 		=> false,
						'before'			=> '<h3>',
						'after'				=> '</h3>',
						'items_wrap'		=> '<ul id="%1$s" class="%2$s" rel="top">%3$s</ul>'
					) ); ?>
				</nav><!-- #site-navigation -->        	

		        <div class="main-headline">
		          	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a><br />
                        
                    <?php
		          		if ( ! isset( $description ) ) {
							bloginfo('description');
						}
					?>
		          	</h1>
                  
		        </div>

			</header>

		</div>
		<div id="header-container-desktop" class="clearfix" style="display:none;">
			<header id="masthead2" class="site-header clearfix">
				<div class="float-left left <?php 

				if (get_bloginfo('description') != null){
						echo 'desc-present';
					} else{
						echo 'desc-null';
					}
					?>">
					<div class="float-left">
						<a id ="block-u-logo" class="" href="/">The Tribal Database</a>
					</div>
					<h1 class="department">
						<span class="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></span>
						<br>
						<span class="description">
							<?php
				          		if ( !isset( $description ) )  {
									bloginfo('description');
								}
							?>
						</span>
					</h1>
					<div id="blocku-logo"> </div>
				</div>
				<div class="float-right right">
					<a href="javascript:///" style="display:none;" class="menu-toggle" rel="top"><span></span></a>
					<nav id="top-nav"  class="secondary-header" role="navigation">
						<?php wp_nav_menu( array( 
							'theme_location' 	=> 'primary', 
							'menu_class' 		=> 'top-menu menu-trigger',
							'container' 		=> false,
							'before'			=> '<h3>',
							'after'				=> '</h3>',
							'items_wrap'		=> '<ul id="%1$s" class="%2$s" rel="top">%3$s</ul>'
						) ); ?>
					</nav><!-- #site-navigation -->
				</div>
			</header>
		</div><!-- End header container desktop -->

    
        <!-- START: Revolution Slider / Header Image conditional -->
        
        <?php

            $custom_fields = get_post_custom();

            if (array_key_exists('parallax_header_text', $custom_fields)){
            	$parallax_header_text = $custom_fields[parallax_header_text][0];
            } 
            
            if ( $themeOptions['revolution_slider'] == 'true' && (is_front_page()) ) { // Test to see if the Revolution Slider option is set in Current Theme Options for the home page ?>
			<script type="text/javascript">
				jQuery('.front-page #header-container').addClass('has-slideshow');
			</script>
            <div class="fixed-wrapper">
                <div id="header-rs" class="window-fixed">
                    <div class="scroll-slow">
                        <?php echo do_shortcode('[rev_slider home_header_slider]'); ?>
                    </div>
                </div>
            </div>

        <?php }
    
            else if ( is_page( array( 'database' ) ) ) { ?>

			<script type="text/javascript">
				jQuery('#header-container').addClass('has-slideshow');
			</script>
            <div class="fixed-wrapper">
                <div id="header-rs" class="window-fixed">
                    <div class="scroll-slow">
                        <?php echo do_shortcode('[rev_slider database_home]'); ?>
                    </div>
                </div>
            </div>

        <?php }   
    
            else if ( ( is_post_type_archive('organization') ) || ( is_singular( 'organization' ) ) ) { ?>

			<script type="text/javascript">
				jQuery('#header-container').addClass('has-slideshow');
			</script>
            <div class="fixed-wrapper">
                <div id="header-rs" class="window-fixed">
                    <div class="scroll-slow">
                        <?php echo do_shortcode('[rev_slider organization-list]'); ?>
                    </div>
                </div>
            </div>

        <?php }     
    

            else if ( (!is_front_page()) && (!empty($parallax_header_text)) ) { // Test to see if the Parallax Header has been set ?>
                <script type="text/javascript">
                    jQuery('#header-container').addClass('has-parallax-header');
                </script>

                <div id="parallax-header" style="background-image:url(<?php echo $parallax_header_text; ?>);"></div>
            <?php }

            else if ( (!empty($themeOptions['header_background_image']))  ) { // Test to see if the header background image is set in Current Theme Options ?>

                <div id="header-bg-image" style="background: url('<?php echo get_template_directory_uri(); ?>/images/headers/<?php echo $themeOptions['header_background_image']; ?>_background.jpg') no-repeat top center"></div>

                <script type="text/javascript">
                    var headerImage = "url('<?php echo get_template_directory_uri(); ?>/images/headers/<?php echo $themeOptions['header_background_image']; ?>_background.jpg')";
                    jQuery('.main-headline').css('background-image',headerImage);
                </script>

        <?php }
            else { // Show the blank gray space if nothing is set in Current Theme Options?>

                <script type="text/javascript">
                    jQuery('#header-bg-image').css('background','');
                    jQuery('#header-bg-image img').hide();
                    jQuery('#header-container').css('background-color','#e1e1e1');
                    jQuery('.main-headline h1 a, .main-headline h1').css('color','#333');
                    jQuery('.main-headline h1 a, .main-headline h1').css('text-shadow', 'none');
                </script> 
    
        <?php } ?>
    
	<!--  // PARALLAX HEADER  -->
    
        <!-- END: Revolution Slider / Header Image conditional -->

	    <div id="main-container" style="position:relative; z-index:1;">

        <?php if ( (get_page_template_slug( $post->ID ) !== '') && ( ! is_single() ) ) { ?>
            <style type="text/css">
                .breadcrumb { margin-left: 1em;}
            </style>
        <?php } ?>
            

            