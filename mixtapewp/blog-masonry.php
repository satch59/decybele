<?php
/*
Template Name: Blog: Masonry
*/
?>
<?php get_header(); ?>
<?php mixtape_qodef_get_title(); ?>
<?php get_template_part('slider'); ?>
	<div class="qodef-container">
		<?php do_action('mixtape_qodef_after_container_open'); ?>
		<div class="qodef-container-inner">
			<?php do_action('mixtape_qodef_after_container_inner_open'); ?>
			<?php mixtape_qodef_get_blog('masonry'); ?>
		</div>
		<?php do_action('mixtape_qodef_before_container_close'); ?>
	</div>
<?php do_action('mixtape_qodef_after_container_close'); ?>
<?php get_footer(); ?>