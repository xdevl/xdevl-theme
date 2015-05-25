<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>
	
	<?php if(!is_browser_compatible()): ?>
		<body style="text-align: center; margin: 6em 2em;">
			<h1>Sorry, the version of your browser is not compatible with this website...</h1>
			<h3>Upgrade your browser first, we require at least internet explorer 9</h3>
			XdevL &#64; 2015 All rights Reserved.
		</body>
	</html>
	<?php exit();endif; ?>
	
	<body>
		<div id="wrapper">
			<div id="header" class="sticky">
				<nav class="top-bar" data-topbar role="navigation" data-options="scrolltop: false; sticky_on: large; mobile_show_parent_link: false">
					<ul class="title-area">
						<li class="name">
							<a href="<?php echo esc_url(home_url('/')); ?>">XdevL</a>
							<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
						</li>
					</ul>
					<section class="top-bar-section">
						<ul class="right">
							<?php 	echo_top_bar_nav_item('Home',home_url('/')) ;
									echo_top_bar_nav_item('About',get_option('about_url')) ;
									echo_top_bar_nav_item('Contact',get_option('contact_url')) ; ?>
							<li class="has-dropdown hide-for-large-up">
								<a href="#">Categories</a>
								<ul class="dropdown">
									<?php wp_list_categories(array('orderby'=>'name','style'=>'list','show_count'=>0,'hierarchical'=>false,'style'=>'list','title_li'=>'')); ?>
								</ul>
							</li>
							<li class="has-form hide-for-large-up">
								<?php get_search_form(); ?>
							</li>
						</ul>
					</section>
				</nav>
			</div>
