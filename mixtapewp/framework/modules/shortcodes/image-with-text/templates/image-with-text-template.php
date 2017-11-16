<?php
/**
 * Image With Text shortcode template
 */
?>

<div <?php mixtape_qodef_class_attribute($holder_classes); ?> <?php echo mixtape_qodef_get_inline_attrs($holder_data); ?>>
	<?php if ($link !== '') { ?>
		<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target) ?>" class="qodef-iwt-link"></a>
	<?php } ?>
	<div class="qodef-iwt-content">
		<div class="qodef-iwt-image">
			<?php echo wp_get_attachment_image($image,'full');?>
		</div>
		<div class="qodef-iwt-text-holder">
			<div class="qodef-iwt-text-holder-table">
				<div class="qodef-iwt-text-holder-cell">
					<h5 class="qodef-iwt-title" <?php mixtape_qodef_inline_style($title_styles); ?>><?php echo wp_kses_post($title) ?></h5>
				</div>
			</div>
		</div>
	</div>
</div>