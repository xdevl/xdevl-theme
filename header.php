<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
		<link rel="shortcut icon" href="<?php echo xdevl\theme\get_url_option(xdevl\theme\THEME_SETTINGS_FAVICON_URL); ?>">
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
		
		<!-- <div id="loginModal" class="reveal titled-panel login-modal" data-reveal>
			<a class="close-reveal-modal" data-close aria-label="Close">&#215;</a>
			<h2 class="title">Login</h2>
			<div class="panel-content">
				<?php xdevl\theme\login_form(); ?>
			</div>
		</div> -->
		
		<div id="wrapper">
			<div id="header">
				<div class="top-bar">
					<div class="top-bar-left">
						<span class="hide-for-xlarge" data-responsive-toggle="main-menu" data-hide-for="xlarge">
							<button class="menu-icon" type="button" data-toggle></button>
						</span>
						<a href="<?php echo esc_url(home_url('/')); ?>"><img id="logo" src="<?php echo xdevl\theme\get_url_option(xdevl\theme\THEME_SETTINGS_LOGO_URL); ?>" /></a>
					</div>
					<div class="top-bar-right" id="main-menu" style="display:none;">
						<ul class="vertical xlarge-horizontal menu">
							<?php 	xdevl\theme\echo_top_bar_nav_item('Home',home_url('/')) ;
									xdevl\theme\echo_top_bar_nav_item('About',xdevl\theme\get_url_option(xdevl\theme\THEME_SETTINGS_ABOUT_URL)) ;
									xdevl\theme\echo_top_bar_nav_item('Contact',xdevl\theme\get_url_option(xdevl\theme\THEME_SETTINGS_CONTACT_URL)) ; ?>
							<li class="hide-for-xlarge">
								<ul class="vertical menu" data-accordion-menu>
									<li>
										<a href="#">Categories</a>
										<ul class="menu vertical nested">
											<?php wp_list_categories(array('orderby'=>'name','style'=>'list','show_count'=>0,'hierarchical'=>false,'style'=>'list','title_li'=>'')); ?>
										</ul>
									</li>
								</ul>
							</li>
							<li class="hide-for-xlarge">
								<?php get_search_form(); ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
