<?php $title_tag = isset($title_tag) ? $title_tag : 'h3' ?>
<<?php echo esc_attr($title_tag);?> class="qodef-post-title">
	<?php the_title(); ?>
</<?php echo esc_attr($title_tag);?>>