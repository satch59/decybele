<?php
/**
 * Video Button shortcode template
 */
?>

<div class="qodef-video-button">
	<a class="qodef-video-button-play" href="<?php echo esc_url($video_link); ?>" data-rel="prettyPhoto">
		<?php if($preview_image != '') { ?>
			<span class="qodef-video-button-image">
				<img src="<?php echo wp_get_attachment_url( $preview_image ); ?>" alt="" />
			</span>
		<?php } ?>
		<span class="qodef-video-button-wrapper">
			<span class="qodef-video-button-wrapper-inner" <?php echo mixtape_qodef_inline_style($button_style); ?>>
				<i class="arrow_triangle-right_alt2" aria-hidden="true" ></i> 
			</span>
		</span>
	</a>
	<?php if ($title !== ''){?>
		<<?php echo esc_attr($title_tag);?> class="qodef-video-button-title">
			<?php echo esc_html($title); ?>
		</<?php echo esc_attr($title_tag);?>>
	<?php } ?>
</div>