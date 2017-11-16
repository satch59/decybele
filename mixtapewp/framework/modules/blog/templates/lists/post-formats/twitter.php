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
						<?php if((has_tag() || mixtape_qodef_get_social_share_html() != '')) : ?>
						<div class="qodef-post-info-bottom">
							<div class="qodef-post-info-bottom-left">
								<?php if($type == 'standard'): ?>
									<div class="qodef-post-info">
										<?php mixtape_qodef_post_info(array('author' => 'no', 'category' => 'yes', 'date' => 'yes')) ?>
									</div>
								<?php endif; ?>
							</div>
							<?php if($share == 'yes') { ?>
								<div class="qodef-post-info-bottom-right">
									<?php mixtape_qodef_post_info(array('share' => 'yes')) ?>
								</div>
							<?php } ?>
						</div>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
</article>