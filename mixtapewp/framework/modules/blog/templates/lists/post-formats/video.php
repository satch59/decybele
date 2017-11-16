<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-image">
			<?php mixtape_qodef_get_module_template_part('templates/parts/video', 'blog', '', $params); ?>
		</div>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
				<?php mixtape_qodef_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => $title_tag)); ?>
				<div class="qodef-post-info-part clearfix">
					<?php mixtape_qodef_post_info(array('date' => 'yes')) ?>
				</div>
				<?php  if ($type == 'standard-whole-post') {
					the_content();
				}
				else{
					mixtape_qodef_excerpt($excerpt_length);
				}
				?>
				<?php mixtape_qodef_get_module_template_part('templates/lists/parts/pages-navigation', 'blog');  ?>
				<?php if((has_tag() || mixtape_qodef_get_social_share_html() != '')) : ?>
					<div class="qodef-post-info-bottom">
						<div class="qodef-post-info-bottom-left">
							<div class="qodef-post-info-tags">
								<?php mixtape_qodef_post_info(array('category' => 'yes')) ?>
							</div>
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