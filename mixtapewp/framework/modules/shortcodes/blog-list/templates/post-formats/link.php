<?php
	$id = get_the_ID();
	$post_format = get_post_format($id);
	$holder_styles = mixtape_qodef_post_format_image($id, $post_format);
?>
<div class="qodef-blog-list-item-text-holder" <?php mixtape_qodef_inline_style($holder_styles); ?>>
	<div class="qodef-blog-list-item-title " <?php mixtape_qodef_inline_style($title_color); ?>>
		<a href="<?php echo esc_url(get_permalink()) ?>" >
			<?php echo wp_kses_post(get_the_title()) ?>
		</a>
	</div>
	<div class="qodef-blog-list-item-info-section" <?php mixtape_qodef_inline_style($post_info_color); ?>>
		<?php mixtape_qodef_post_info(array(
			'date' => 'no',
			'category' => 'no',
			'author' => 'no',
			'comments' => 'no',
			'like' => 'no'
		)) ?>
	</div>
</div>