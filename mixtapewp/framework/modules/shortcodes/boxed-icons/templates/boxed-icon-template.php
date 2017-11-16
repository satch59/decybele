<div class="qodef-boxed-icon-holder" <?php mixtape_qodef_inline_style($holder_style); ?>>
	<div class="qodef-boxed-icon">
		<?php if($link): ?>
			<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
		<?php endif; ?>
			<div class="qodef-boxed-icon-inner">
				<?php if(!empty($custom_icon)) : ?>
					<div class="qodef-boxed-icon-custom-icon">
						<?php echo wp_get_attachment_image($custom_icon, 'full'); ?>
					</div>
				<?php else: ?>
					<?php echo mixtape_qodef_execute_shortcode('qodef_icon', $icon_parameters); ?>
				<?php endif; ?>
				<?php if ($icon_title != '') { ?>
					<span class="qodef-boxed-icon-title" <?php mixtape_qodef_inline_style($icon_title_style); ?>><?php echo esc_attr($icon_title) ?></span>
				<?php } ?>
			</div>
		<?php if($link): ?>
			</a>
		<?php endif; ?>
	</div>
</div>