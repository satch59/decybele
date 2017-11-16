<?php
$mixtape_qodef_blog_archive_pages_classes = mixtape_qodef_blog_archive_pages_classes(mixtape_qodef_get_default_blog_list());
?>
<?php get_header(); ?>
<?php mixtape_qodef_get_title(); ?>
<div class="<?php echo esc_attr($mixtape_qodef_blog_archive_pages_classes['holder']); ?>">
	<?php do_action('mixtape_qodef_after_container_open'); ?>
	<div class="<?php echo esc_attr($mixtape_qodef_blog_archive_pages_classes['inner']); ?>">
		<?php do_action('mixtape_qodef_after_container_inner_open'); ?>
		<?php mixtape_qodef_get_blog(mixtape_qodef_get_default_blog_list()); ?>
	</div>
	<?php do_action('mixtape_qodef_before_container_close'); ?>
</div>
<?php do_action('mixtape_qodef_after_container_close'); ?>
<?php get_footer(); ?>
