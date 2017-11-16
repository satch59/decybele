<div class="qodef-blog-holder qodef-blog-type-standard <?php echo esc_attr($blog_classes)?>"   data-blog-type="<?php echo esc_attr($blog_type)?>" <?php echo esc_attr(mixtape_qodef_set_blog_holder_data_params()); ?> >
	<?php
		if($blog_query->have_posts()) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
			mixtape_qodef_get_post_format_html($blog_type);
		endwhile;
		else:
			mixtape_qodef_get_module_template_part('templates/parts/no-posts', 'blog');
		endif;
	?>
	<?php
		if(mixtape_qodef_options()->getOptionValue('pagination') == 'yes') {
			mixtape_qodef_pagination($blog_query->max_num_pages, $blog_page_range, $paged);
		}
	?>
</div>
