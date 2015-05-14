<div id="sidebar">
	<div class="categories panel" />
		<h2 ><?php _e('Categories'); ?></h2>
		<ul class="side-nav">
			<?php wp_list_categories(array('orderby'=>'name','style'=>'list','show_count'=>0,'hierarchical'=>false,'style'=>'list','title_li'=>'')); ?>
		</ul>
		<?php get_search_form(); ?>
	</div>
</div>
