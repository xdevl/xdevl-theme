<h3>
	<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
</h3>
<hr />
<?php $thumbnail=wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));?>
<div class="wrapper">
	<a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo $thumbnail['0']; ?>" class="post-image" /></a>
</div><!-- Do no add space or break line here... --><div class="wrapper">
	<dl>
		<dt class="category">Category:</dt>
		<dd><?php the_category(' / ');?></dd>
		<dt class="calendar">Published:</dt>
		<dd><?php the_time('j F, Y');?></dd>
		<dt class="author">Posted by:</dt>
		<dd><?php the_author();?></dd>
		<dt class="rating">Rating:</dt>
		<dd>Not rated yet</dd>
		<dt class="comment">Comments:</dt>
		<dd><?php comments_number();?></dd>
	</dl>
</div>
