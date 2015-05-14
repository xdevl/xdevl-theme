<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>XdevL</title>
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="wrapper">
			<div id="header" class="sticky">
				<nav class="top-bar" data-topbar>
					<ul class="title-area">
						<li class="name">
							<a href="<?php echo esc_url(home_url('/')); ?>">XdevL</a>
							<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
						</li>
					</ul>
					<section class="top-bar-section">
						<ul class="right">
							<li class="active"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</section>
				</nav>
			</div>
