<div class="qodef-album-disc <?php echo esc_attr($holder_classes); ?>">
	<?php if ($link !== '')  { ?>
		<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target) ?>"></a>
	<?php } ?>
	<div class="qodef-album-disc-inner">
		<div class="qodef-album-disc-case-holder">
			<img class="qodef-album-disc-case" src="<?php echo wp_get_attachment_url($cd_case_image) ?>" alt="<?php echo get_the_title($cd_case_image);?>" />
		</div>
		<div class="qodef-album-disc-element">
			<div class="qodef-album-disc-image-holder">
				<div class="qodef-album-disc-image" style="background-image:url(<?php echo wp_get_attachment_url($cd_image); ?>)">
					<span class="qodef-album-disc-border" <?php mixtape_qodef_inline_style($cd_image_styles); ?>></span>
				</div> 
			</div>			
		</div>
	</div>
</div>