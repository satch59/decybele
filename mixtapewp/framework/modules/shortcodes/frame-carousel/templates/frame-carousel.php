<div class="qodef-frame-carousel">
	<div class="qodef-frame-carousel-carousel" <?php echo mixtape_qodef_get_inline_attrs($carousel_data); ?>>
		<?php foreach ($images as $image) { ?>
		<div class="qodef-frame-carousel-images-holder">
			<div class="qodef-frame-carousel-image-holder">
				<?php echo mixtape_qodef_generate_thumbnail($image['carousel_image']['id'], null, 485, 275); ?>
			</div>
			<div class="qodef-frame-carousel-active-image-holder">
				<?php echo mixtape_qodef_generate_thumbnail($image['active_image']['id'], null, 640, 400); ?>
			</div>
		</div>
		<?php } ?>

	</div>
	<div class="qodef-frame-carousel-monitor-holder">
		<?php if ($skin == 'light') { ?> 
			<img alt="" src="<?php echo QODE_ASSETS_ROOT; ?>/img/monitor-light.png" class="qodef-frame-carousel-monitor">
		<?php } else {?>
			<img alt="" src="<?php echo QODE_ASSETS_ROOT; ?>/img/monitor.png" class="qodef-frame-carousel-monitor">
		<?php } ?>
		<div class="qodef-frame-carousel-monitor-image-holder">
			<img alt="" src="<?php echo QODE_ASSETS_ROOT; ?>/img/frame-monitor-image.png" class="qodef-frame-carousel-active-image">
		</div>
	</div>
</div>