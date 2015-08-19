<?php
/**
 * The template for saving html templates that will enventually turn into widgets.
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

        <!-- STYLE GUIDE TEMPLATE == START -->
        <div class="ten-twenty-four clearfix">
            <div class="row clearfix entry-content">
                <h2 class="page-title">UMC Style Guide</h2>
                <div class="col-md-9">
                    <a id="ss-headings" href=""></a> <h2 class="uppercase">Headings</h2>

                    <hr />

                    The following are the six different heading tags and what they look like by themselves and with text.
                    <h1>Heading 1 <small>A subheading goes here</small></h1>
                    <h2>Heading 2<small>A subheading goes here</small></h2>
                    <h3>Heading 3<small>A subheading goes here</small></h3>
                    <h4>Heading 4<small>A subheading goes here</small></h4>
                    <h5>Heading 5<small>A subheading goes here</small></h5>
                    <h6>Heading 6<small>A subheading goes here</small></h6>
                    <h1>Heading 1</h1>
                    Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.
                    <h2>Heading 2</h2>
                    Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.
                    <h3>Heading 3</h3>
                    Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.
                    <h4>Heading 4</h4>
                    Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.
                    <h5>Heading 5</h5>
                    Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.
                    <h6>Heading 6</h6>
                    Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.
                    <a id="ss-images" href=""></a> <h2 class="uppercase">Images</h2>

                    <hr />

                    <p><img class="alignnone" src="http://placehold.it/300x125" alt="" height="125" width="300"> <strong>Align None</strong>
                     adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec
                     faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero 
                    nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.</p>
                    <p><img class=" alignleft" src="http://placehold.it/300x125" alt="" height="125" width="300">&nbsp; <strong>Align Left</strong>
                     Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis
                     est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam 
                    sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida 
                    vehicula, nisl.<br>
                    <img class="aligncenter size-medium" src="http://placehold.it/300x125" alt="" height="128" width="300"> <strong>Align Center</strong>
                     Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis
                     est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam 
                    sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida 
                    vehicula, nisl.</p>
                    <p>&nbsp;</p>
                    <p><img class=" alignright" src="http://placehold.it/300x125" alt="5" height="125" width="300"> <strong>Align Right</strong>
                     Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis
                     est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam 
                    sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida 
                    vehicula, nisl.</p>
                    <p>&nbsp;</p>
                    <hr>
                    <h4>Light Gray Border</h4>
                    <p>To have an image with this style, add the class “light-gray-border” under the advanced tab when you insert the image.<br>
                    <img class="light-gray-border alignnone" src="http://placehold.it/300x125" alt="" height="125" width="300"></p>
                    <hr>
                    <h4>Image Captions</h4>
                    <p>This is the default image caption style</p>
                    <div id="attachment_46" style="width: 310px" class="wp-caption alignnone"><a href=""><img class="wp-image-46 size-medium" src="http://placehold.it/300x125" alt="newslide2014_2.jpg" height="128" width="300"></a><p class="wp-caption-text">Default Image Caption Style</p></div>

                    <a id="ss-buttons" href=""></a>
                     &nbsp;
                    <h2 class="uppercase">Buttons</h2>
                    
                    <hr />
                    
                    <div class="eq-ht-wrapper clearfix">
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn">Button</a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-primary">Primary Button</a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-secondary">Secondary Button</a></div>

                        <div class="eq-ht col-3 no-border"><a href="#" class="btn small">Button Small</a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-primary small">Primary Button Small</a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-secondary small">Secondary Button Small</a></div>

                        <div class="eq-ht col-3 no-border"><a href="#" class="btn large">Button Large</a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-primary large">Primary Button Large</a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-secondary large">Secondary Button Large</a></div>

                        <div class="eq-ht col-3 no-border"><a href="#" class="btn arrow">Arrow Button</a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-primary arrow">Arrow Primary Button </a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-secondary arrow">Arrow Secondary Button</a></div>

                        <div class="eq-ht col-3 no-border"><a href="#" class="btn uppercase">uppercase Button</a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-primary uppercase">uppercase Primary Button </a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-secondary uppercase">uppercase Secondary Button</a></div>

                        <div class="eq-ht col-3 no-border"><a href="#" class="btn btn-full-width">Full-Width Button</a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-primary btn-full-width">Full-Width Primary Button </a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-secondary btn-full-width">Full-Width Secondary Button</a></div>

                        <div class="eq-ht col-3 no-border" style="background-color:#333;"><a href="#" class="btn outline-dark">Outline Dark Button</a></div>
                        <div class="eq-ht col-3 no-border" style="background-color:#ececec;"><a href="#" class="btn outline-light">Outline Light Button </a></div>
                        <div class="eq-ht col-3 no-border"><a href="#" class="btn-primary outline-primary">Outline Primary Button</a></div>
                        
                    </div><!-- End eq-th-wrapper -->


                    <a id="ss-blockquotes" href=""></a> <h2 class="uppercase">Block Quotes</h2>

                    <hr />

                    <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis ab, eaque. Animi at tempore sed molestiae corporis placeat eius cumque unde, eos libero laudantium! Magnam consectetur officiis dignissimos molestiae voluptates.</blockquote>

                    <a id="ss-dropcaps" href=""></a>
                    &nbsp;
                    <h2 class="uppercase">Drop Caps</h2>

                    <hr />
                    <p class="drop-cap">While we are on a role, let's test a drop cap.... Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl. Lorem ipsum dolor sit amet, adipiscing elit. Nullam dignissim convallis est. Quisque aliquam. Donec faucibus. Nunc iaculis suscipit dui. Nam sit amet sem. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.</p>
                    &nbsp;
                    <a id="ss-deflist" href=""></a> <h2 class="uppercase">Definition List</h2>

                    <hr />
                    <dl>
                        <dt>Definition Term 1</dt>
                        <dd>defintion 1</dd>
                        <dt>Definition Term 2</dt>
                        <dd>defintion 2</dd>
                    </dl>

                    
                </div>
                <div class="col-md-3">
                    <nav class="uu-docs-sidebar white-sidebar element-scroll">
                        <ul class="uu-docs-sidenav underline-list">
                            <li><a href="#ss-headings">Headings</a></li>
                            <li><a href="#ss-images">Images</a></li>
                            <li><a href="#ss-buttons">Buttons</a></li>
                            <li><a href="#ss-blockquotes">Block Quotes</a></li>
                            <li><a href="#ss-dropcaps">Drop Caps</a></li>
                            <li><a href="#ss-deflist">Definition List</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            
        </div>
        <!-- STYLE GUIDE TEMPLATE == END -->


			<?php if ( ! dynamic_sidebar( 'sidebar-bottom' ) ) : endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	

</div><!-- #container fluid -->


<?php get_footer(); ?>