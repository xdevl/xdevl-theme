<?php

function more_posts()
{
  global $wp_query;
  return $wp_query->current_post+1<$wp_query->post_count ;
}

function posts_link_attributes()
{
	return 'class="button small"' ;
}

function xdevl_styles()
{	
	wp_register_style('xdevl-style',get_template_directory_uri().'/css/style.css',array(),false,'all') ;
	wp_enqueue_style('xdevl-style') ;
	
	wp_register_script('foundation-main',get_template_directory_uri().'/js/script.js',true) ;
	wp_enqueue_script('jquery') ;
	wp_enqueue_script('foundation-main') ;
}

function xdevl_admin_init()
{
	add_editor_style('css/editor.css') ;
}

add_action('wp_enqueue_scripts','xdevl_styles') ;
add_action('admin_init','xdevl_admin_init') ;
add_theme_support( 'post-thumbnails' ) ;
add_filter('next_posts_link_attributes','posts_link_attributes') ;
add_filter('previous_posts_link_attributes','posts_link_attributes') ;

?>
