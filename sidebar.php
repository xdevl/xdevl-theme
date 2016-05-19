<div id="sidebar">
	<div class="categories titled-panel" />
		<h2 class="title"><?php _e('Categories'); ?></h2>
		<ul class="vertical menu">
			<?php wp_list_categories(array('orderby'=>'name','style'=>'list','show_count'=>0,'hierarchical'=>false,'style'=>'list','title_li'=>'')); ?>
		</ul>
		<?php get_search_form(); ?>
	</div>
</div>
