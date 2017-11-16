<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content" <?php echo mixtape_qodef_get_inline_style($image); ?>>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
				<<?php echo esc_attr($quote_title_tag); ?> class="qodef-post-title">
						<a  href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo wp_kses_post(get_post_meta(get_the_ID(), "qodef_post_quote_text_meta", true)); ?></a>
				</<?php echo esc_attr($quote_title_tag); ?>>
				<span class="qodef-quote-author"><?php the_title(); ?></span>
			</div>
		</div>
	</div>
</article>