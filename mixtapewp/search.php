<?php $mixtape_qodef_sidebar = mixtape_qodef_sidebar_layout(); ?>
<?php get_header(); ?>
<?php 

$mixtape_qodef_blog_page_range = mixtape_qodef_get_blog_page_range();
$mixtape_qodef_max_number_of_pages = mixtape_qodef_get_max_number_of_pages();

if ( get_query_var('paged') ) { $mixtape_qodef_paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $mixtape_qodef_paged = get_query_var('page'); }
else { $mixtape_qodef_paged = 1; }
?>
<?php mixtape_qodef_get_title(); ?>
	<div class="qodef-container">
		<?php do_action('mixtape_qodef_after_container_open'); ?>
		<div class="qodef-container-inner clearfix">
			<div class="qodef-container">
				<?php do_action('mixtape_qodef_after_container_open'); ?>
				<div class="qodef-container-inner" >
					<?php do_action('mixtape_qodef_after_container_inner_open'); ?>
					<div class="qodef-blog-holder qodef-blog-type-standard">
				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="qodef-post-content">
							<div class="qodef-post-text">
								<div class="qodef-post-text-inner">
									<h4>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h4>
									<?php
										mixtape_qodef_read_more_button();
									?>
								</div>
							</div>
						</div>
					</article>
					<?php endwhile; ?>
					<?php else: ?>
					<div class="entry">
						<p><?php esc_html_e('No posts were found.', 'mixtapewp'); ?></p>
					</div>
					<?php endif; ?>
				</div>
				<?php do_action('mixtape_qodef_before_container_close'); ?>
			</div>
			</div>
		</div>
		<?php do_action('mixtape_qodef_before_container_close'); ?>
	</div>
	<div class="qodef-container qodef-container-bottom-navigation">
		<div class="qodef-container-inner">
			<?php
			if(mixtape_qodef_options()->getOptionValue('pagination') == 'yes') {
				mixtape_qodef_pagination($mixtape_qodef_max_number_of_pages, $mixtape_qodef_blog_page_range, $mixtape_qodef_paged);
			}
			?>
		</div>
	</div>
	<?php do_action('mixtape_qodef_after_container_close'); ?>
<?php get_footer(); ?>