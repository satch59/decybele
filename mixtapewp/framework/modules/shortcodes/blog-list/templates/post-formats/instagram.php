<?php $params_social = mixtape_qodef_generate_instagram_twitter_params('instagram'); ?>
<?php if ( $params_social['instagram_thumbnail_url'] ) { ?>
	<div class="qodef-blog-list-item-image clearfix">
		<a href="<?php echo esc_url(get_post_meta(get_the_ID(), "qodef_post_link_link_meta", true)); ?>" title="<?php the_title_attribute(); ?>">
			<img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo esc_url($params_social['instagram_thumbnail_url']); ?>" width="<?php echo esc_attr($params_social['instagram_thumbnail_width']); ?>" height="<?php echo esc_attr($params_social['instagram_thumbnail_height']); ?>">
			<div class="qodef-inst-mark">
				<i class="fa fa-instagram"></i>
			</div>
		</a>
	</div>
<?php } ?>