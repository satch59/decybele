<?php
/**
 * Custom Font shortcode template
 */
?>

<<?php echo esc_attr($custom_font_tag);?> class="qodef-custom-font-holder" <?php mixtape_qodef_inline_style($custom_font_style);?> <?php echo esc_attr($custom_font_data);?>>
	<?php echo wp_kses_post($content_custom_font);?>
	<?php if($type_out_effect == 'yes') { ?>
		<span class="qodef-typed-wrap">
			<span class="qodef-typed">
				<?php if($typed_ending_1 != '') { ?>
					<span class="qodef-typed-1"><?php echo esc_html($typed_ending_1); ?></span>
				<?php } if($typed_ending_2 != '') { ?>
					<span class="qodef-typed-2"><?php echo esc_html($typed_ending_2); ?></span>
				<?php } if($typed_ending_3 != '') { ?>
					<span class="qodef-typed-3"><?php echo esc_html($typed_ending_3); ?></span>
				<?php } ?>
			</span>
		</span>
	<?php } ?>
</<?php echo esc_attr($custom_font_tag);?>>