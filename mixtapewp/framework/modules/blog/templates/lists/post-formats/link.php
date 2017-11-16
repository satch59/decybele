<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content" <?php echo mixtape_qodef_get_inline_style($image); ?>>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
				<?php mixtape_qodef_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => 'h3')); ?>
				<?php if((has_tag() || mixtape_qodef_get_social_share_html() != '')) : ?>
					<div class="qodef-post-info-bottom">
						<div class="qodef-post-info-bottom-left">
							<?php if($type == 'standard'): ?>
								<div class="qodef-post-info">
									<?php mixtape_qodef_post_info(array('author' => $author, 'category' => 'yes', 'date' => 'yes')) ?>
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
</article>