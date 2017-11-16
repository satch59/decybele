<?php if(get_post_meta(get_the_ID(), "qodef_audio_post_type_meta", true) == 'self' && get_post_meta(get_the_ID(), "qodef_post_audio_link_meta", true) !== ""){ ?>
<div class="qodef-blog-list-item-image clearfix">
	<a href="<?php echo esc_url(get_permalink()) ?>">
		<?php
			echo get_the_post_thumbnail(get_the_ID());
		?>				
	</a>
</div>	
<?php mixtape_qodef_get_module_template_part('templates/parts/audio', 'blog'); ?>
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
<?php
} elseif(get_post_meta(get_the_ID(), "qodef_audio_post_type_meta", true) == 'soundcloud' && get_post_meta(get_the_ID(), "qodef_post_audio_soundcloud_link_meta", true) !== ""){
	mixtape_qodef_get_module_template_part('templates/parts/audio', 'blog');
} ?>