<?php
/**
 * Blockquote shortcode template
 */
?>

<blockquote class="qodef-blockquote-shortcode" <?php mixtape_qodef_inline_style($blockquote_style); ?> >
	<p class="qodef-blockquote-text">
		<span><?php echo esc_attr($text); ?></span>
	</p>
</blockquote>