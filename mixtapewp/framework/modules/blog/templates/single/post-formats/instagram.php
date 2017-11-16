<?php $params = mixtape_qodef_generate_instagram_twitter_params('instagram');
	$instagram_thumbnail_url = $params['instagram_thumbnail_url'];
	$instagram_thumbnail_height = $params['instagram_thumbnail_height'];
	$instagram_thumbnail_width = $params['instagram_thumbnail_width'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('qodef-post-format-instagram'); ?>>
	<div class="qodef-post-content">
		<?php if ( $instagram_thumbnail_url ) { ?>
			<div class="qodef-post-image">
				<div class="qodef-post-image-inner">
					<a href="<?php echo esc_url(get_post_meta(get_the_ID(), "qodef_post_link_link_meta", true)); ?>" title="<?php the_title_attribute(); ?>">
						<img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo esc_url($instagram_thumbnail_url); ?>" width="<?php echo esc_attr($instagram_thumbnail_width); ?>" height="<?php echo esc_attr($instagram_thumbnail_height); ?>">
						<div class="qodef-inst-mark">
							<span class="fa fa-instagram"></span>
						</div>
					</a>
				</div>
			</div>
		<?php } ?>
		<div class="qodef-post-info">
			<?php mixtape_qodef_post_info(array('category' => 'yes', 'date' => 'yes')) ?>
		</div>
		<?php mixtape_qodef_get_module_template_part('templates/single/parts/title', 'blog'); ?>
		<?php the_content(); ?>
		<?php mixtape_qodef_get_module_template_part('templates/lists/parts/pages-navigation', 'blog');  ?>
		<?php if(has_tag() || mixtape_qodef_get_social_share_html() != '') : ?>
			<div class="qodef-post-info-bottom">
				<div class="qodef-post-info-bottom-left">
					<div class="qodef-post-info-top">
					<?php has_tag() ? the_tags('', ', ', '') : ''; ?>
						</div>
				</div>
				<div class="qodef-post-info-bottom-right">
					<?php mixtape_qodef_post_info(array('share' => 'yes')) ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</article>