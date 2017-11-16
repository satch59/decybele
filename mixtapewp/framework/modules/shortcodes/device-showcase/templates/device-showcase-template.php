<div class="qodef-device-showcase <?php echo esc_attr($holder_classes); ?>">
	<div class="qodef-ds-images-holder">
		<div class="qodef-ds-desktop-device qodef-device">
			<?php if ($desktop_image_link != '') { ?>
				<a href="<?php echo esc_url($desktop_image_link) ?>" target="<?php echo esc_attr($desktop_image_link_target) ?>"></a>
			<?php } ?>
			<img src="<?php echo QODE_ASSETS_ROOT ?>/css/img/browser.png" alt="<?php echo esc_html__('desktop browser window','mixtapewp')?>" />
			<div class="qodef-ds-desktop-image-holder">
				<div class="qodef-ds-deskop-image qodef-device-image" style="background-image: url(<?php echo wp_get_attachment_url( $desktop_image ); ?>)">
					
				</div>
			</div>
		</div>
		<div class="qodef-ds-tablet-device qodef-device">
			<?php if ($tablet_image_link != '') { ?>
				<a href="<?php echo esc_url($tablet_image_link) ?>" target="<?php echo esc_attr($tablet_image_link_target) ?>"></a>
			<?php } ?>
			<img src="<?php echo QODE_ASSETS_ROOT ?>/css/img/tablet.png" alt="<?php echo esc_html__('tablet device frame','mixtapewp')?>" />
			<div class="qodef-ds-tablet-image-holder">
				<div class="qodef-ds-tablet-image qodef-device-image" style="background-image: url(<?php echo wp_get_attachment_url( $tablet_image ); ?>)">
					
				</div>
			</div>
		</div>
		<div class="qodef-ds-phone-device qodef-device">
			<?php if ($phone_image_link != '') { ?>
				<a href="<?php echo esc_url($phone_image_link) ?>" target="<?php echo esc_attr($phone_image_link_target) ?>"></a>
			<?php } ?>
			<img src="<?php echo QODE_ASSETS_ROOT ?>/css/img/phone.png" alt="<?php echo esc_html__('phone device frame','mixtapewp')?>" />
			<div class="qodef-ds-phone-image-holder">
				<div class="qodef-ds-phone-image qodef-device-image" style="background-image: url(<?php echo wp_get_attachment_url( $phone_image ); ?>)">
					
				</div>
			</div>
		</div>
	</div>
	<div class="qodef-ds-text-holder">
		<h5 class="qodef-ds-title"><?php echo esc_attr($title); ?></h5>
		<span class="qodef-ds-description"><?php echo esc_attr($description); ?></span>
	</div>
</div>