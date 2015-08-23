<div class="post-featured panel">
<h2>
	<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
</h2>
<hr />
<?php if(!is_page()): ?>
	<dl>
		<dt class="category">Category:</dt>
		<dd><?php the_category(' / ');?></dd>
		<dt class="calendar">Published:</dt>
		<dd><?php the_time('j F, Y');?></dd>
	</dl>
<?php endif; ?>
<?php $thumbnail=wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID())); ?>
<a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo $thumbnail['0']; ?>" class="wp-post-image" /></a>
<?php
	the_content(__('Read more...')) ;
?>
</div>

<?php if(is_single()): ?>
	<div class="panel post-comments">
		<?php comments_template() ; ?>
	</div>
<?php endif; ?>
