<li class="qodef-blog-list-item clearfix">
	<div class="qodef-blog-list-item-inner">
		<div class="qodef-item-image">
			<a href="<?php echo esc_url(get_permalink()) ?>">
				<?php
					 echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
				?>				
			</a>
		</div>
		<div class="qodef-item-text-holder" <?php mixtape_qodef_inline_style($bg_color); ?>>
			<div class="qodef-item-info-section" <?php mixtape_qodef_inline_style($post_info_color); ?>>
				<?php mixtape_qodef_post_info(array(
					'date' => 'yes',
					'category' => 'no',
					'author' => 'no'
				)) ?>
			</div>

			<<?php echo esc_html( $title_tag)?> class="qodef-item-title" <?php mixtape_qodef_inline_style($title_color); ?>>
				<a href="<?php echo esc_url(get_permalink()) ?>" >
					<?php echo esc_attr(get_the_title()) ?>
				</a>
			</<?php echo esc_html($title_tag) ?>>

			<?php if ($text_length != '0') {
				$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
				<p class="qodef-excerpt" <?php mixtape_qodef_inline_style($text_color); ?>><?php echo esc_html($excerpt)?>.</p>
			<?php } ?>
		</div>
	</div>	
</li>