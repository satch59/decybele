<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<?php if(get_post_meta(get_the_ID(), "qodef_audio_post_type_meta", true) == 'self' && get_post_meta(get_the_ID(), "qodef_post_audio_link_meta", true) !== ""){
			mixtape_qodef_get_module_template_part('templates/single/parts/image', 'blog');
		}
		mixtape_qodef_get_module_template_part('templates/parts/audio', 'blog'); ?>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner clearfix">
				<div class="qodef-post-info">
					<?php mixtape_qodef_post_info(array('category' => 'yes', 'date' => 'yes')) ?>
				</div>
				<?php mixtape_qodef_get_module_template_part('templates/single/parts/title', 'blog'); ?>
				<?php the_content(); ?>
				<?php mixtape_qodef_get_module_template_part('templates/lists/parts/pages-navigation', 'blog');  ?>
				<?php if(has_tag() || mixtape_qodef_get_social_share_html() != '') : ?>
					<div class="qodef-post-info-bottom">
						<div class="qodef-post-info-bottom-left">
							<?php has_tag() ? the_tags('', ', ', '') : ''; ?>
						</div>
						<div class="qodef-post-info-bottom-right">
							<?php mixtape_qodef_post_info(array('share' => 'yes')) ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php do_action('mixtape_qodef_before_blog_article_closed_tag'); ?>
</article>