<?php if(($sidebar == 'default')||($sidebar == '')) : ?>
	<?php mixtape_qodef_get_blog_type($blog_type); ?>
	<?php do_action('mixtape_qodef_before_blog_list_column_close'); ?>
<?php elseif($sidebar == 'sidebar-33-right' || $sidebar == 'sidebar-25-right'): ?>
	<div <?php echo mixtape_qodef_sidebar_columns_class(); ?>>
		<div class="qodef-column1 qodef-content-left-from-sidebar">
			<div class="qodef-column-inner">
				<?php mixtape_qodef_get_blog_type($blog_type); ?>
                <?php do_action('mixtape_qodef_before_blog_list_column_close'); ?>
			</div>
		</div>
		<div class="qodef-column2">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php elseif($sidebar == 'sidebar-33-left' || $sidebar == 'sidebar-25-left'): ?>
	<div <?php echo mixtape_qodef_sidebar_columns_class(); ?>>
		<div class="qodef-column1">
			<?php get_sidebar(); ?>
		</div>
		<div class="qodef-column2 qodef-content-right-from-sidebar">
			<div class="qodef-column-inner">
				<?php mixtape_qodef_get_blog_type($blog_type); ?>
				<?php do_action('mixtape_qodef_before_blog_list_column_close'); ?>
			</div>
		</div>
	</div>
<?php endif; ?>

