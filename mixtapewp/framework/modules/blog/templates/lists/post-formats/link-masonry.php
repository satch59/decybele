<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content" <?php echo mixtape_qodef_get_inline_style($image); ?>>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
				<?php mixtape_qodef_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => $title_tag)); ?>
			</div>
		</div>
	</div>
</article>