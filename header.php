<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
		<title>XdevL</title>
		<?php wp_head(); ?>
	</head>
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
							<li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li>
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
