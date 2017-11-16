<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php mixtape_qodef_get_title(); ?>
<?php get_template_part('slider'); ?>
	<div class="qodef-container">
		<?php do_action('mixtape_qodef_after_container_open'); ?>
		<div class="qodef-container-inner">
			<?php mixtape_qodef_get_blog_single(); ?>
		</div>
		<?php do_action('mixtape_qodef_before_container_close'); ?>
	</div>
	<?php do_action('mixtape_qodef_after_container_close'); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>