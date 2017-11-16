<li class="qodef-blog-list-item qodef-blog-list-masonry-item qodef-blog-list-<?php echo mixtape_qodef_get_post_format('');?> ">
	<div class="qodef-blog-list-item-inner">
		<?php 
			$post_format = mixtape_qodef_get_post_format('');
			if( $post_format === 'standard' || $post_format === 'video' || $post_format === 'gallery' ) {
				$post_format = $post_format.'-masonry';
			}
			echo mixtape_qodef_get_shortcode_module_template_part('templates/post-formats/' . $post_format, 'blog-list','',$params);
		?>
 </div>	
</li>