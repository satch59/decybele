<?php
$icon_html = mixtape_qodef_icon_collections()->renderIcon($icon, $icon_pack, $params);
?>
<div class="qodef-icon-list-item">
	<div class="qodef-icon-list-icon-holder" <?php mixtape_qodef_inline_style($icon_holder_style);?>>
        <div class="qodef-icon-list-icon-holder-inner clearfix">
			<?php 
			print $icon_html;
			?>
		</div>
	</div>
	<p class="qodef-icon-list-text" <?php echo mixtape_qodef_get_inline_style($title_style)?> > <?php echo esc_attr($title)?></p>
</div>