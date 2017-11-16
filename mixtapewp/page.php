<?php $mixtape_qodef_sidebar = mixtape_qodef_sidebar_layout(); ?>
<?php get_header(); ?>
	<?php mixtape_qodef_get_title(); ?>
	<?php get_template_part('slider'); ?>
	<div class="qodef-container">
		<?php do_action('mixtape_qodef_after_container_open'); ?>
		<div class="qodef-container-inner clearfix">
			<?php do_action('mixtape_qodef_after_container_inner_open'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if(($mixtape_qodef_sidebar == 'default')||($mixtape_qodef_sidebar == '')) : ?>
					<?php the_content(); ?>
					<?php do_action('mixtape_qodef_page_after_content'); ?>
				<?php elseif($mixtape_qodef_sidebar == 'sidebar-33-right' || $mixtape_qodef_sidebar == 'sidebar-25-right'): ?>
					<div <?php echo mixtape_qodef_sidebar_columns_class(); ?>>
						<div class="qodef-column1 qodef-content-left-from-sidebar">
							<div class="qodef-column-inner">
								<?php the_content(); ?>
								<?php do_action('mixtape_qodef_page_after_content'); ?>
							</div>
						</div>
						<div class="qodef-column2">
							<?php get_sidebar(); ?>
						</div>
					</div>
				<?php elseif($mixtape_qodef_sidebar == 'sidebar-33-left' || $mixtape_qodef_sidebar == 'sidebar-25-left'): ?>
					<div <?php echo mixtape_qodef_sidebar_columns_class(); ?>>
						<div class="qodef-column1">
							<?php get_sidebar(); ?>
						</div>
						<div class="qodef-column2 qodef-content-right-from-sidebar">
							<div class="qodef-column-inner">
								<?php the_content(); ?>
								<?php do_action('mixtape_qodef_page_after_content'); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php do_action('mixtape_qodef_before_container_close'); ?>
	</div>
	<?php do_action('mixtape_qodef_after_container_close'); ?>
<?php get_footer(); ?>