<?php

namespace xdevl\theme
{

defined('ABSPATH') or die('No script kiddies please!') ;

define(__NAMESPACE__.'\PLUGIN_NAMESPACE','xdevl_theme') ;

function is_browser_compatible()
{
	return !preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']) ;
}

function more_posts()
{
  global $wp_query;
  return $wp_query->current_post+1<$wp_query->post_count ;
}

function posts_link_attributes()
{
	return 'class="button small"' ;
}

function wp_enqueue_scripts()
{	
	wp_register_style('xdevl-style',get_template_directory_uri().'/css/style.css',array(),false,'all') ;
	wp_enqueue_style('xdevl-style') ;
	
	wp_register_script('foundation-main',get_template_directory_uri().'/js/script.js',true) ;
	wp_enqueue_script('jquery') ;
	wp_enqueue_script('foundation-main') ;
}

function admin_init()
{
	add_editor_style('css/editor.css') ;
	register_setting('xdevl-theme-options','about_url') ;
	register_setting('xdevl-theme-options','contact_url') ;
}

function admin_menu()
{
	add_theme_page('Theme setup', 'XdevL theme', 'edit_theme_options', 'xdevl-theme', 'xdevl_theme_page') ;
}

function echo_top_bar_nav_item($title, $url)
{
	if(strpos($url,'http://')===false)
		$url=get_site_url(0,$url) ;

	$class=strcmp('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],$url)===0?'class="active"':'' ;
	
	$url=esc_url($url) ;
	$title=esc_html($title) ;
	echo "<li $class><a href=\"$url\">$title</a></li>" ;
}

function xdevl_theme_page()
{
	?>
	<div class="wrap">
		<h2>XdevL theme setup</h2>
		<form method="post" action="options.php">
			<?php settings_fields('xdevl-theme-options');
				do_settings_sections('xdevl-theme-options'); ?>
				
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><label for="about_url">About url:</label></th>
							<td><?php echo esc_url(get_site_url(0,'/')) ?><input type="text" name="about_url" class="regular-text" value="<?php echo esc_attr(get_option('about_url')) ?>" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="contact_url">Contact url:</label></th>
							<td><?php echo esc_url(get_site_url(0,'/')) ?><input type="text" name="contact_url" class="regular-text" value="<?php echo esc_attr(get_option('contact_url')) ?>" /></td>
						</tr>
					</tbody>
				</table>
			
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

function wp_title($title)
{
	if(empty($title) && (is_home() || is_front_Page()))
		return bloginfo('name') ;
	else return $title ;
}

add_action('wp_enqueue_scripts',__NAMESPACE__.'\wp_enqueue_scripts') ;
add_action('admin_init',__NAMESPACE__.'\admin_init') ;
add_action('admin_menu',__NAMESPACE__.'\admin_menu') ;
add_theme_support( 'post-thumbnails' ) ;
add_filter('next_posts_link_attributes',__NAMESPACE__.'\posts_link_attributes') ;
add_filter('previous_posts_link_attributes',__NAMESPACE__.'\posts_link_attributes') ;
add_filter('wp_title',__NAMESPACE__.'\wp_title') ;

} //end xdevl\theme

?>
