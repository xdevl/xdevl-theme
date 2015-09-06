<?php

namespace xdevl\theme
{

defined('ABSPATH') or die('No script kiddies please!') ;

define(__NAMESPACE__.'\PLUGIN_NAMESPACE','xdevl_theme') ;

// Url params
define(__NAMESPACE__.'\URL_PARAM_LOGIN',PLUGIN_NAMESPACE.'_login') ;

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
	
	// Standard Wordpress javascript file to include in order to move the comment form without having to reload the page
	//if(is_singular() && comments_open() && get_option('thread_comments'))
		//wp_enqueue_script('comment-reply') ;
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

function login_form_top()
{
	global $login_error ;
	if(!empty($login_error))
		echo '<div class="alert-box alert">'.$login_error.'</div>' ;
}

function login_form()
{
	global $hook_site_url ;
	$hook_site_url=true ;
	echo wp_login_form() ;
	$hook_site_url=false ;
}

function site_url($url, $path, $orig_scheme, $blog_id)
{
	global $hook_site_url ;
	if($hook_site_url && $path=='wp-login.php')
		// TODO: add support for https
		return add_query_arg(URL_PARAM_LOGIN,true,get_permalink()) ;
	else return $url ;
}

function query_vars($vars)
{
	$vars[]=URL_PARAM_LOGIN ;
	return $vars ;
}

function display_login_modal()
{
	return !is_user_logged_in() && get_query_var(URL_PARAM_LOGIN,false) ;
}

function wp_loaded()
{
	global $login_error ;
	if(!is_user_logged_in())
	{
		$user=wp_signon() ;
		if(!is_wp_error($user))
			wp_set_current_user($user->ID) ;
		else $login_error=$user->get_error_message() ;
	}
}

function comment_reply_link($link, $args, $comment, $post)
{
	global $comment_reply ;
	if(isset($_GET['replytocom']) && $_GET['replytocom']==$comment->comment_ID)
	{
		$comment_reply=true ;
		comment_form() ;
		return "" ;
	}
	else
	{
		$onclick=sprintf('return addComment.moveForm( "%1$s-%2$s", "%2$s", "%3$s", "%4$s" )',
				$args['add_below'],$comment->comment_ID,$args['respond_id'],$post->ID) ;
		
		return sprintf( "<a class='comment-reply-link' href='%s' onclick='%s' aria-label='%s'>%s</a>",
				esc_url(add_query_arg('replytocom',$comment->comment_ID))."#comment-".$comment->comment_ID,
				$onclick,
				esc_attr(sprintf( $args['reply_to_text'],$comment->comment_author)),
				$args['reply_text']) ;
	}
}

function is_comment_reply()
{
	global $comment_reply ;
	return $comment_reply ;
}

add_action('wp_enqueue_scripts',__NAMESPACE__.'\wp_enqueue_scripts') ;
add_action('admin_init',__NAMESPACE__.'\admin_init') ;
add_action('admin_menu',__NAMESPACE__.'\admin_menu') ;
add_theme_support( 'post-thumbnails' ) ;
add_filter('next_posts_link_attributes',__NAMESPACE__.'\posts_link_attributes') ;
add_filter('previous_posts_link_attributes',__NAMESPACE__.'\posts_link_attributes') ;
add_filter('wp_title',__NAMESPACE__.'\wp_title') ;
add_filter('login_form_top',__NAMESPACE__.'\login_form_top') ;
add_filter('query_vars',__NAMESPACE__.'\query_vars') ;
add_filter('site_url',__NAMESPACE__.'\site_url',10,4) ;
add_filter('wp_loaded',__NAMESPACE__.'\wp_loaded') ;
add_filter('comment_reply_link',__NAMESPACE__.'\comment_reply_link',10,4) ;

} //end xdevl\theme

?>
