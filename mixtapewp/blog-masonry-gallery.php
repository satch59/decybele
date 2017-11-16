<?php
/*
Template Name: Blog: Metro
*/
?>
<?php get_header(); ?>
<?php mixtape_qodef_get_title(); ?>
<?php get_template_part('slider'); ?>
<div class="qodef-full-width">
	<?php do_action('mixtape_qodef_after_container_open'); ?>
    <div class="qodef-full-width-inner clearfix">
		<?php do_action('mixtape_qodef_after_container_inner_open'); ?>
		<?php mixtape_qodef_get_blog('masonry-gallery'); ?>
    </div>
	<?php do_action('mixtape_qodef_before_container_close'); ?>
</div>
<?php do_action('mixtape_qodef_after_container_close'); ?>
<?php get_footer(); ?>
