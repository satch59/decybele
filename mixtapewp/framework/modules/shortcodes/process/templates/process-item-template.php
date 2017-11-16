<div <?php mixtape_qodef_class_attribute($item_classes); ?>>
	<div class="qodef-pi-holder-inner">
		<?php if(!empty($number)) : ?>
			<div class="qodef-pi-number-holder">
				<span class="qodef-pi-arrow"><span class="arrow_right"></span></span>
				<span class="qodef-pi-number"><?php echo esc_html($number); ?></span>
			</div>
		<?php endif; ?>
		<?php if(!empty($title) || !empty($text)) : ?>
			<div class="qodef-pi-content-holder">
				<?php if(!empty($title)) : ?>
					<div class="qodef-pi-title-holder">
						<h4 class="qodef-pi-title"><?php echo esc_html($title); ?></h4>
					</div>
				<?php endif; ?>

				<?php if(!empty($text)) : ?>
					<div class="qodef-pi-text-holder">
						<p><?php echo esc_html($text); ?></p>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</div>