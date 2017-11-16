<article id="post-<?php the_ID(); ?>" <?php post_class('qodef-post-format-twitter'); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-mark qodef-link-mark">
				<span class="social_twitter"></span>
			</div>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
				<div class="qodef-ql-content">
					<h6 class="qodef-post-twitter-user">&commat;<?php print $twitter_author; ?></h6>
					<h5><a href='<?php echo esc_url(get_post_meta(get_the_ID(), "qodef_post_link_link_meta", true)); ?>'><?php print $twitter_text; ?></a></h5>
					<div class="qodef-post-info">
						<div class="qodef-post-info-top">
							<?php print $twitter_time; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>