<?php
	/*
	Template Name: Blog: Masonry Full Width
	*/
?>
<?php get_header(); ?>

<?php mixtape_qodef_get_title(); ?>
<?php get_template_part('slider'); ?>

	<div class="qodef-full-width">
		<div class="qodef-full-width-inner clearfix">
			<?php do_action('mixtape_qodef_after_container_inner_open'); ?>
			<?php mixtape_qodef_get_blog('masonry-full-width'); ?>
		</div>
	</div>
	<?php do_action('mixtape_qodef_after_full_width_container_close') ?>
<?php get_footer(); ?>