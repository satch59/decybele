<article id="post-<?php the_ID(); ?>" <?php post_class('qodef-post-format-instagram'); ?>>
	<div class="qodef-post-content">
		<?php if ( $instagram_thumbnail_url ) { ?>
			<div class="qodef-post-image">
				<div class="qodef-post-image-inner">
					<a href="<?php echo esc_url(get_post_meta(get_the_ID(), "qodef_post_link_link_meta", true)); ?>" title="<?php the_title_attribute(); ?>">
						<img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo esc_url($instagram_thumbnail_url); ?>" width="<?php echo esc_attr($instagram_thumbnail_width); ?>" height="<?php echo esc_attr($instagram_thumbnail_height); ?>">
						<div class="qodef-inst-mark">
							<i class="fa fa-instagram"></i>
						</div>
					</a>
				</div>
			</div>
		<?php } ?>
	</div>
</article>