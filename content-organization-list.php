<?php
/**
 * @package Tribal Database
 */
?>

<!--<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>-->
<?php
$url = get_the_permalink();
$url_with_get_values = add_query_arg( array(
    'org_id' => get_the_ID()
), $url );
?>
<tr>
    <td class="org-name"><a href="<?php echo $url_with_get_values; ?>"><?php the_title(); ?></a></td>
    <td class="org-region"><?php echo rwmb_meta('tribal_region') ?></td>
    <td class="org-state"><?php echo rwmb_meta('tribal_state') ?></td>
</tr>

    <!--<div class="organization-list-row">
        <div class="organization-name"><?php the_title(); ?></div>
        <div class="organization-region"><?php echo rwmb_meta('tribal_region') ?></div>
        <div class="organization-state"><?php echo rwmb_meta('tribal_state') ?></div>
    </div>-->
    
	<!--<header class="entry-header">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a> | <?php echo rwmb_meta('tribal_full_name') ?></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php the_date(); ?>
		</div>
		<?php endif; ?>
	</header>-->

	
<!--</article>--><!-- #post-## -->
