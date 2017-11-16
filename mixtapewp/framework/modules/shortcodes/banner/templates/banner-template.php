<?php
/**
 * Banner shortcode template
 */
?>

<div class="qodef-banner <?php echo esc_attr($banner_classes);?>">
	<?php if($link != '') { ?>
		<a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>">
	<?php } ?>
		<div class="qodef-banner-image-inner">
			<?php if ($item_image !== '') { ?>
				<div class="qodef-banner-image">
					<?php echo wp_get_attachment_image($item_image,'full');?>
				</div>
			<?php } ?>	
			<div class="qodef-banner-info">
				<div class="qodef-banner-info-table">
					<div class="qodef-banner-info-table-cell">
						<?php if ( $banner_title !== '') { ?>
							<div class="qodef-banner-title-holder">
								<span class="qodef-banner-title">
									<?php echo wp_kses_post($banner_title) ?>
								</span>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php if($link != '') { ?>
		</a>
	<?php } ?>
</div>