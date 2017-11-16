<div class="qodef-progress-bar">
	<<?php echo esc_attr($title_tag);?> class="qodef-progress-title-holder clearfix">
		<span class="qodef-progress-title"><?php echo esc_attr($title)?></span>
		<span class="qodef-progress-number-wrapper <?php echo esc_attr($percentage_classes)?> " >
			<span class="qodef-progress-number">
				<span class="qodef-percent">0</span>
			</span>
		</span>
	</<?php echo esc_attr($title_tag)?>>
	<div class="qodef-progress-content-outer ">
		<div data-percentage=<?php echo esc_attr($percent)?>  <?php mixtape_qodef_inline_style($progress_bar_styles); ?> class="qodef-progress-content" ></div>
	</div>
</div>	