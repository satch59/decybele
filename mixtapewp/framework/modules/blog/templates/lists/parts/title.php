<?php
	$title_tag = isset($title_tag) ? $title_tag : 'h3';
	$post_url = isset($post_url) ? $post_url : get_the_permalink();
?>
<<?php echo esc_attr($title_tag);?> class="qodef-post-title">
	<a href="<?php echo esc_url($post_url); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
</<?php echo esc_attr($title_tag);?>>