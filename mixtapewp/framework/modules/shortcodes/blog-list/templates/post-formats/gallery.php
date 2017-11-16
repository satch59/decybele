<?php mixtape_qodef_get_module_template_part('templates/lists/parts/gallery', 'blog'); ?>
<div class="qodef-blog-list-item-text-holder" <?php mixtape_qodef_inline_style($bg_color); ?>>
	<div class="qodef-blog-list-item-info-section" <?php mixtape_qodef_inline_style($post_info_color); ?>>
		<?php mixtape_qodef_post_info(array(
			'date' => 'yes',
			'category' => 'no',
			'author' => 'no',
			'comments' => 'no',
			'like' => 'no'
		)) ?>
	</div>
	<h4 class="qodef-blog-list-item-title "  <?php mixtape_qodef_inline_style($title_color); ?>>
		<a href="<?php echo esc_url(get_permalink()) ?>" >
			<?php echo esc_attr(get_the_title()) ?>
		</a>
	</h4>
	<?php if ($text_length != '0') {
		$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
		<p class="qodef-blog-list-item-excerpt" <?php mixtape_qodef_inline_style($text_color); ?>><?php echo esc_html($excerpt)?>...</p>
	<?php } ?>	
</div>