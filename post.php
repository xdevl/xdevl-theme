<div class="post-featured panel">
<?php $thumbnail=wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID())); ?>
<a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo $thumbnail['0']; ?>" class="wp-post-image" /></a>
<h2 class="post-title">
	<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
</h2>

<?php if(!is_page()): ?>
	<dl>
		<dt class="category">Category:</dt>
		<dd><?php the_category(' / ');?></dd>
		<dt class="calendar">Published:</dt>
		<dd><?php the_time('j F, Y');?></dd>
	</dl>
<?php endif; ?>

<?php
	the_content(__('Read more...')) ;
?>
	<div id="post-navigation">
		<?php next_post_link('%link','&laquo; next post') ;
			previous_post_link('%link','previous post &raquo;'); ?>
	</div>
</div>

<?php if(is_single()): ?>
	<?php comments_template() ; ?>
<?php endif; ?>
