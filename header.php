<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
		<title><?php wp_title(''); ?></title>
		<?php wp_head(); ?>
	</head>
	
	<?php if(!xdevl\theme\is_browser_compatible()): ?>
		<body style="text-align: center; margin: 6em 2em;">
			<h1>Sorry, the version of your browser is not compatible with this website...</h1>
			<h3>Upgrade your browser first, we require at least internet explorer 9</h3>
			XdevL &#64; 2015 All rights Reserved.
		</body>
	</html>
	<?php exit();endif; ?>
	
	<body>
		
		<div id="loginModal" class="titled-panel reveal-modal login-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
			<h2 class="title">Login</h2>
			<div class="panel-content">
				<?php xdevl\theme\login_form(); ?>
			</div>
		</div>
		
		<div id="wrapper">
			<div id="header" class="sticky">
				<nav class="top-bar" data-topbar role="navigation" data-options="scrolltop: false; sticky_on: large; mobile_show_parent_link: false">
					<ul class="title-area">
						<li class="name">
							<a href="<?php echo esc_url(home_url('/')); ?>"><img id="logo" src="<?php echo xdevl\theme\get_url_option(xdevl\theme\THEME_SETTINGS_LOGO_URL); ?>" /></a>
							<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
						</li>
					</ul>
					<section class="top-bar-section">
						<ul class="right">
							<?php 	xdevl\theme\echo_top_bar_nav_item('Home',home_url('/')) ;
									xdevl\theme\echo_top_bar_nav_item('About',xdevl\theme\get_url_option(xdevl\theme\THEME_SETTINGS_ABOUT_URL)) ;
									xdevl\theme\echo_top_bar_nav_item('Contact',xdevl\theme\get_url_option(xdevl\theme\THEME_SETTINGS_CONTACT_URL)) ; ?>
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
