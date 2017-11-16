<<?php echo esc_attr($title_tag)?> class="clearfix qodef-title-holder">
	<span class="qodef-accordion-mark qodef-left-mark">
		<span class="qodef-accordion-mark-icon">
			<span class="fa fa-caret-up"></span>
			<span class="fa fa-caret-down"></span>
		</span>
	</span>
	<span class="qodef-tab-title">
		<span class="qodef-tab-title-inner">
			<?php echo esc_attr($title)?>
		</span>
	</span>
</<?php echo esc_attr($title_tag)?>>
<div class="qodef-accordion-content">
	<div class="qodef-accordion-content-inner">
		<?php echo do_shortcode($content); ?>
	</div>
</div>