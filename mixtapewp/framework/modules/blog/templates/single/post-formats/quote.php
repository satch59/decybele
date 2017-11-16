<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<div class="qodef-post-text" <?php echo mixtape_qodef_get_inline_style($image); ?>>
			<div class="qodef-post-text-inner clearfix">
				<h3 class="qodef-post-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_kses_post(get_post_meta(get_the_ID(), "qodef_post_quote_text_meta", true)); ?></a>
				</h3>
				<span class="qodef-quote-author"> <?php the_title(); ?></span>
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
