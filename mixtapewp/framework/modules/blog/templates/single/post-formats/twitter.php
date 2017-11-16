<?php $params = mixtape_qodef_generate_instagram_twitter_params('twitter');
	$twitter_text = $params['twitter_text'];
	$twitter_author = $params['twitter_author'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('qodef-post-format-twitter'); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-text">
			<div class="qodef-post-mark qodef-link-mark">
				<span class="social_twitter"></span>
			</div>
			<div class="qodef-post-text-inner">
				<div class="qodef-ql-content">
					<a href="<?php echo get_post_meta( get_the_ID(), 'qodef_post_link_link_meta', true ); ?>">
						<div class="qodef-tweet"><?php print $twitter_text; ?></div>
					</a>
					<span class="qodef-tweet-author"><?php print $twitter_author; ?></span>
				</div>
			</div>
		</div>
		<div class="qodef-post-info">
			<?php mixtape_qodef_post_info(array('category' => 'yes', 'date' => 'yes')) ?>
		</div>
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