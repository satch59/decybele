<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<div class="qodef-masonry-gallery-quote-holder" <?php echo mixtape_qodef_get_inline_style($image); ?>>
		<div class="qodef-masonry-gallery-quote-author">
			<div class="qodef-masonry-gallery-quote-author-inner">
				<h4 class="qodef-masonry-gallery-quote">
					<span>"</span>
					<?php echo esc_html(get_post_meta(get_the_ID(), "qodef_post_quote_text_meta", true)); ?>
					<span>"</span>
				</h4>
				<div class="qodef-masonry-gallery-author">&mdash; <?php the_title(); ?></div>
			</div>
		</div>
		<div class="qodef-post-mark">
			<?php echo mixtape_qodef_icon_collections()->renderIcon('fa-quote-right', 'font_awesome'); ?>
		</div>
	</div>
</article>