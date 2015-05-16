<?php get_header(); ?>
<div id="main">
	<?php get_sidebar(); ?>
	<div id="content">
		<?php if(!have_posts()):
			get_template_part('post','none') ;
		elseif(is_single()): ?>
			<div class="post-featured panel">
				<?php the_post() ;
				get_template_part('post') ; ?>
			</div>
			<div id="post-navigation">
				<?php previous_post_link('%link','&laquo; previous post') ;
				next_post_link('%link','next post &raquo;'); ?>
			</div>
		<?php else: ?>
			<?php if(is_home() && !is_paged()): ?>
				<div class="orbit-wrapper">
					<ul data-orbit data-options="pause_on_hover: false; slide_number: false;">
						<?php for($count=0;$count<2 && have_posts();$count++): ?>
							<li class="post-featured panel">
								<?php the_post() ;
								get_template_part('post') ;?>
							</li>
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
				<?php while(have_posts()): the_post(); ?>
					<div class="post-row">
						<div class="post-preview panel">
							<?php get_template_part('post','preview'); ?>
						</div>
						<?php if(more_posts()): the_post(); ?>
							<div class="post-preview panel">
								<?php get_template_part('post','preview'); ?>
							</div>
						<?php else: ?>
							<div class="post-preview"></div>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
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
