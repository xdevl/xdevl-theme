<?php get_header(); ?>
<div id="main">
	<?php get_sidebar(); ?>
	<div id="content">
		<?php if(!have_posts()):
			get_template_part('post','none') ;
		elseif(is_single() || is_page()): ?>
			<?php the_post() ;
			get_template_part('post') ; ?>
		<?php else: ?>
			<?php if(is_home() && !is_paged()): ?>
				<div class="orbit-wrapper">
					<ul data-orbit data-options="pause_on_hover: false; slide_number: false;">
						<?php for($count=0;$count<3 && have_posts();++$count): ?>
							<?php the_post() ;
							get_template_part('post') ;?>
						<?php endfor; ?>
					</ul>
				</div>
			<?php  elseif(is_home() && is_paged()): ?>
				<h1>Archives</h1>
			<?php elseif(is_search()): ?>
				<h1>Search results</h1>
			<?php elseif(is_category()): ?>
				<h1><?php echo get_category(get_query_var('cat'))->name ?> posts</h1>
			<?php endif; ?>
			<div class="post-list">
				<?php if(!isset($count) || $count>=3): while(have_posts()): the_post(); ?>
					<div class="post-row">
						<div class="post-preview panel">
							<?php get_template_part('post','preview'); ?>
						</div>
						<?php if(xdevl\theme\more_posts()): the_post(); ?>
							<div class="post-preview panel">
								<?php get_template_part('post','preview'); ?>
							</div>
						<?php else: ?>
							<div class="post-preview"></div>
						<?php endif; ?>
					</div>
				<?php endwhile; endif; ?>
			</div>
			
			<div id="pagination">
				<?php previous_posts_link('&laquo; newer posts') ;
				next_posts_link('older posts &raquo;'); ?>
			</div>
		<?php endif; ?>
	</div> <!-- End content -->
</div> <!-- End main -->
<div id="delimiter" class="clearfix"></div>
<?php get_footer(); ?>
