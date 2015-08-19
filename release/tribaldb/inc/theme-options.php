<?php
if ( !class_exists('TribalThemeOptions') )
{
	/** unews options */
	class TribalThemeOptions
	{

/* Rachel's comment will win! */

		/**
		 * Outputs IE (old/weak browser) styles to admin header
		 */
		public static function theme_ie_styles()
		{
			// nothing here
		}
		/**
		 * Return theme options
		 */
		public static function getOptions()
		{
			$options = get_option('utah_theme_options');

			if (!is_array($options))
			{
				// general options
				//$options['template_width'] = '';
                $options['revolution_slider'] = '';

				// social / feeds
				$options['facebook_url'] = '';
				$options['twitter_url'] = '';
				$options['youtube_url'] = '';
				$options['instagram_url'] = '';
				$options['linkedin_url'] = '';
				
				// header options
				$options['header_background_image'] = '';
				
				// footer options
				$options['department_logo'] = '/wp-content/themes/tribaldb/images/global/imagine_u.png';
				$options['department_name'] = '';
				$options['department_address'] = '201 Presidents Circle Room 201';
				$options['department_address2'] = 'SLC UT 84112';
				$options['department_phone'] = '801.581.7200';
				$options['google_analytics'] = '';

				update_option('utah_theme_options', $options);
			}
			else
			{
				$defaults = array (
					//'template_width' => '',
                    'revolution_slider' => '',

					'facebook_url' => '',
					'twitter_url' => '',
					'youtube_url' => '',
					'instagram_url' => '',
					'linkedin_url' => '',
					
					// header options
					'header_background_image' => '',
					
					// footer options
					'department_logo' => '/wp-content/themes/tribaldb/images/global/imagine_u.png',
					'department_name' => '',
					'department_address' => '201 Presidents Circle Room 201',
					'department_address2' => 'SLC UT 84112',
					'department_phone' => '801.581.7200',
					'google_analytics' => '',

				);
				$options = array_merge($defaults, $options);
			}

			return $options;
		}

		/**
		 * Add theme options to the DB, and the menu to admin screen
		 */
		public static function add()
		{
			if(isset($_POST['utah_theme_save']))
			{
				$options = TribalThemeOptions::getOptions();

				// general options
				//$options['template_width'] = filter_var(stripslashes($_POST['template_width']), FILTER_SANITIZE_URL);
                $options['revolution_slider'] = filter_var(stripslashes($_POST['revolution_slider']), FILTER_SANITIZE_URL);

				// social / feeds
				$options['facebook_url'] = filter_var(stripslashes($_POST['facebook_url']), FILTER_SANITIZE_URL);
				$options['twitter_url'] = filter_var(stripslashes($_POST['twitter_url']), FILTER_SANITIZE_URL);
				$options['youtube_url'] = filter_var(stripslashes($_POST['youtube_url']), FILTER_SANITIZE_URL);
				$options['instagram_url'] = filter_var(stripslashes($_POST['instagram_url']), FILTER_SANITIZE_URL);
				$options['linkedin_url'] = filter_var(stripslashes($_POST['linkedin_url']), FILTER_SANITIZE_URL);
				
				// header options
				$options['header_background_image'] = filter_var(stripslashes($_POST['header_background_image']), FILTER_SANITIZE_STRING);
				
				// footer options
				$options['department_logo'] = filter_var(stripslashes($_POST['department_logo']), FILTER_SANITIZE_STRING);
				$options['department_name'] = filter_var(stripslashes($_POST['department_name']), FILTER_SANITIZE_STRING);
				$options['department_address'] = filter_var(stripslashes($_POST['department_address']), FILTER_SANITIZE_STRING);
				$options['department_address2'] = filter_var(stripslashes($_POST['department_address2']), FILTER_SANITIZE_STRING);
				$options['department_phone'] = filter_var(stripslashes($_POST['department_phone']), FILTER_SANITIZE_STRING);
				$options['google_analytics'] = filter_var(stripslashes($_POST['google_analytics']), FILTER_SANITIZE_STRING);

				// save
				update_option('utah_theme_options', $options);

			}
			else
			{
				TribalThemeOptions::getOptions();
			}

			add_theme_page(__('Current Theme Options'),
										 __('Current Theme Options'),
										 'edit_themes',
										 basename(__FILE__),
										 array('TribalThemeOptions', 'display'));
		}

		/**
		 * Show the theme options form
		 */
		public static function display()
		{
			$options = TribalThemeOptions::getOptions();
			//echo '<pre>'.print_r($options,true).'</pre>';
			//$cpt = get_post_types(array('_builtin'=>false), 'objects');
			//echo '<pre>types: '.print_r($cpt,true).'</pre>';
?>
	<form action="#" method="post" enctype="multipart/form-data" name="utah_theme_form" id="utah_theme_form">
		<?php wp_nonce_field(basename(__FILE__), 'utah_theme_options_noncename'); ?>
		<div class="wrap">
			<h2><?php _e('Theme Options'); ?></h2>
			<div id="theme_option_tabs">
				<ul>
					<li><a href="#utah_general_options"><?php _e('General Options'); ?></a></li>
					<li><a href="#utah_university_header"><?php _e('Header'); ?></a></li>
					<li><a href="#utah_university_footer"><?php _e('Footer'); ?></a></li>
					<li><a href="#utah_social"><?php _e('Social and Feeds'); ?></a></li>
				</ul>

				<div id="utah_general_options">
					<h3><?php _e('General Options'); ?></h3>
					<table class="form-table">
						<tbody>
							<!-- <tr>
								<td width="20%" valign="top">
									<?php _e('Template Width:'); ?>
								</td>
								<td valign="top">

									<input type="radio" name="template_width" value="full-width" <?php if ($options['template_width'] == 'full-width') { echo 'checked'; } ?> /> Full browser width (recommended)<br />
									<input type="radio" name="template_width" value="ten-twenty-four" <?php if ($options['template_width'] == 'ten-twenty-four') { echo 'checked'; } ?> /> 1024 pixel width <br />
								</td>
							</tr> -->
							<tr>
								<td width="20%" valign="top">
									<?php _e('Include the Revolution Slider:'); ?>
								</td>
								<td valign="top">

									<input type="checkbox" name="revolution_slider" value="true" <?php if ($options['revolution_slider'] == 'true') { echo 'checked'; } ?> /> Home Page<br />
								</td>
							</tr>                            
						</tbody>
					</table>
				</div><!-- end #utah_general_options -->

				<div id="utah_university_header">
					<h3><?php _e('Header'); ?></h3>
					<table class="form-table">
						<tbody>
							<tr>
								<td valign="top">
									<?php _e('Select Background:'); ?>
								</td>
								<td valign="top">

<?php
									// loop over headers directory
									$uri = get_template_directory_uri() .'/images/headers/';
									$dir = get_theme_root().'/'.get_template().'/images/headers/';
									//echo 'URI = ' . $uri;
									//echo '<br />DIR = ' . $dir;
									if ( $dh = opendir($dir) )
									{
										while ( ($file = readdir($dh)) !== false )
										{
											if ( preg_match('/^(\w+)_background.jpg$/', $file, $matches) )
											{
												$sel = '';
												$color = $matches[1];
												if ( (empty($options['header_background_image']) && $color=='red')
														|| ($color==$options['header_background_image']) )
												{
													$sel = ' checked="checked"';
												}
												echo '<div class="headerBackgroundSelector">'
													.'<input type="radio" id="hbcr'.$color.'" name="header_background_image" '
														.'value="'.$color.'" '.$sel.'/>'
													.'<label for="hbcr'.$color.'">'
														.'<img src="'.$uri.$color.'_background.jpg" alt="'.ucwords($color).' Background" width="800" />'
													.'</label>'
												."</div>\n";
											}
										}
									}
?>
								</td>
							</tr>
							<tr><td colspan="2">&nbsp;</td></tr>


						</tbody>
					</table>
				</div><!-- end #utah_university_footer -->

				<div id="utah_university_footer">
					<h3><?php _e('Footer'); ?></h3>
					<table class="form-table">
						<tbody>
							<tr>
								<td valign="top" width="20%">
									<?php _e('Logo:'); ?>
								</td>
								<td valign="top">
									<input type="text" name="department_logo" id="department_logo" class="code" style="width:98%;" value="<?php echo($options['department_logo']); ?>" />
								</td>
							</tr>

							<tr>
								<td valign="top" width="20%">
									<?php _e('Name (Optional):'); ?>
								</td>
								<td valign="top">
									<input type="text" name="department_name" id="department_name" class="code" style="width:98%;" value="<?php echo($options['department_name']); ?>" />
								</td>
							</tr>

							<tr>
								<td valign="top" width="20%">
									<?php _e('Address Line 1:'); ?>
								</td>
								<td valign="top">
									<input type="text" name="department_address" id="department_address" class="code" style="width:98%;" value="<?php echo($options['department_address']); ?>" />
								</td>
							</tr>

							<tr>
								<td valign="top">
									<?php _e('Address Line 2:'); ?>
								</td>
								<td valign="top">
									<input type="text" name="department_address2" id="department_address2" class="code" style="width:98%;" value="<?php echo($options['department_address2']); ?>" />
								</td>
							</tr>

							<tr>
								<td valign="top">
									<?php _e('Phone:'); ?>
								</td>
								<td valign="top">
									<input type="text" name="department_phone" id="department_phone" class="code" size="30" maxlength="30" value="<?php echo($options['department_phone']); ?>" />
								</td>
							</tr>

							<tr>
								<td valign="top">
									<?php _e('Google Analytics UA Code:'); ?>
								</td>
								<td valign="top">
									<input type="text" name="google_analytics" id="google_analytics" class="code" size="30" maxlength="30" value="<?php echo($options['google_analytics']); ?>" />
								</td>
							</tr>
						</tbody>
					</table>
				</div><!-- end #utah_university_footer -->

				<div id="utah_social">
					<h3><?php _e('Social and Feeds'); ?></h3>
					<table class="form-table">
						<tbody>
							<tr>
								<td width="20%" valign="top">
									<?php _e('Your Facebook Page URL:'); ?>
								</td>
								<td valign="top">
									<input type="text" name="facebook_url" id="facebook_url"
												 class="code" style="width:98%;" value="<?php echo($options['facebook_url']); ?>" />
								</td>
							</tr>

							<tr>
								<td width="20%" valign="top">
									<?php _e('Your Twitter URL:'); ?>
								</td>
								<td valign="top">
									<input type="text" name="twitter_url" id="twitter_url"
												 class="code" style="width:98%;" value="<?php echo($options['twitter_url']); ?>" />
								</td>
							</tr>

							<tr>
								<td width="20%" valign="top">
									<?php _e('Youtube Channel URL:'); ?>
								</td>
								<td valign="top">
									<input type="text" name="youtube_url" id="youtube_url"
												 class="code" style="width:98%;" value="<?php echo($options['youtube_url']); ?>" />
								</td>
							</tr>

							<tr>
								<td width="20%" valign="top">
									<?php _e('Your Instagram URL:'); ?>
								</td>
								<td valign="top">
									<input type="text" name="instagram_url" id="instagram_url"
												 class="code" style="width:98%;" value="<?php echo($options['instagram_url']); ?>" />
								</td>
							</tr>

							<tr>
								<td width="20%" valign="top">
									<?php _e('LinkedIn URL:'); ?>
								</td>
								<td valign="top">
									<input type="text" name="linkedin_url" id="linkedin_url"
												 class="code" style="width:98%;" value="<?php echo($options['linkedin_url']); ?>" />
								</td>
							</tr>

							
						</tbody>
					</table>
				</div><!-- end #utah_social -->

			</div><!-- end tabs -->

			<p class="submit">
				<input class="button-primary" type="submit" name="utah_theme_save" value="<?php _e('Save Changes'); ?>" />
			</p>
		</div>
	</form>
	<?php
		}

        
        //
		/**
		 * Respond to ajax call to clear SimplePie cache
		 */
		public static function utah_ajax_clear_simplepie_cache()
		{
			$themeOptions = TribalThemeOptions::getOptions();
			$cachedir = $themeOptions['simplepie_cache_dir'];
			$errMsgs = array();
			$dh = opendir($cachedir);
			while ( ($file = readdir($dh)) !== false )
			{
				if ( substr($file, -4) == '.spc' )
				{
					$retVal = @unlink($cachedir.'/'.$file);
					if ( !$retVal )
						$errMsgs[] = sprintf(__('Could not delete file: %s'), $file);
				}
				//else
				//	echo $file.' - '.substr($file, -4).'<br/>';
			}

			// done
			$resp = array
			(
				'code' => (count($errMsgs)?__LINE__:0),
				'msg' => (count($errMsgs)?$errMsgs:__('Success!')),
			);

			die(json_encode($resp));

		}// end function function utah_ajax_add_custom_type

	}// end class TribalThemeOptions
}// end if !exists
add_action('admin_menu', array('TribalThemeOptions', 'add'));
add_action('admin_head', array('TribalThemeOptions', 'theme_ie_styles'));
add_action('wp_ajax_utah_ajax_clear_simplepie_cache', array('TribalThemeOptions', 'utah_ajax_clear_simplepie_cache'));

?>