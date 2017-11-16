<?php
/**
 * Section Title shortcode template
 */
?>

<div class="qodef-section-title">
	<<?php echo esc_attr($before_tag); ?> class="qodef-section-before-text" <?php mixtape_qodef_inline_style($before_style); ?>>
		<?php echo esc_html($before_text);?>
	</<?php echo esc_attr($before_tag); ?>>

	<<?php echo esc_attr($title_tag); ?> class="qodef-section-title-text" <?php mixtape_qodef_inline_style($title_style); ?>>
		<?php echo esc_html($title_text);?>
	</<?php echo esc_attr($title_tag); ?>>

	<?php if( $separator === 'yes' ): ?>
		<?php echo mixtape_qodef_execute_shortcode('qodef_separator',
			array(
				'position'      => esc_attr($text_align),
				'border_style'  => 'solid',
				'width'         => '22px',
				'thickness'     => '4',
				'top_margin'    => $separator_margin !== '' ? $separator_margin : '27px',
				'color'         => !empty( $title_color ) ? esc_attr($title_color) : '#000'
			)
		); ?>
	<?php endif; ?>
</div>
