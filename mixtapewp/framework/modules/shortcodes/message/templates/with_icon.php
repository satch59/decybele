<?php
$icon_html = mixtape_qodef_icon_collections()->renderIcon($icon, $icon_pack);
?>

<div class="qodef-message-icon-holder">
	<div class="qodef-message-icon" <?php mixtape_qodef_inline_style($icon_attributes); ?>>
		<div class="qodef-message-icon-inner">
			<?php
				print $icon_html;
			?>			
		</div> 
	</div>	 
</div>

