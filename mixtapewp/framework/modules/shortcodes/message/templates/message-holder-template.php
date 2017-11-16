<div class="qodef-message  <?php echo esc_attr($message_classes)?>" <?php echo mixtape_qodef_get_inline_style($message_styles); ?>>
	<div class="qodef-message-inner">
		<?php		
		if($type == 'with_icon'){
			$icon_html = mixtape_qodef_get_shortcode_module_template_part('templates/' . $type, 'message', '', $params);
			print $icon_html;
		}
		?>
		<a href="javascript:void(0)" class="qodef-close" <?php mixtape_qodef_inline_style($close_icon_holder_style); ?>><i class="qodef-font-elegant-icon icon_close" <?php mixtape_qodef_inline_style($close_icon_style); ?>></i></a>
		<div class="qodef-message-text-holder">
			<div class="qodef-message-text">
				<div class="qodef-message-text-inner"><?php echo do_shortcode($content); ?></div>
			</div>
		</div>
	</div>
</div>