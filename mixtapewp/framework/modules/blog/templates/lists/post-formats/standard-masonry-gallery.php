<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<?php mixtape_qodef_get_module_template_part('templates/lists/parts/image', 'blog', '', array('image_size' => $image_size)); ?>
	<div class="qodef-date-title">
		<?php mixtape_qodef_post_info(array('date' => 'yes')) ?>
		<?php mixtape_qodef_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => $title_tag)); ?>
	</div>
</article>