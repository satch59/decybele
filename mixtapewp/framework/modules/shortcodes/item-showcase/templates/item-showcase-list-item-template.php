<?php
$icon_html = mixtape_qodef_icon_collections()->renderIcon($icon, $icon_pack, $params);
?>
<div class="qodef-item <?php echo esc_attr($item_showcase_list_item_class); ?>">
	<div class="qodef-item-table-holder">
		<?php if ( $item_position == 'right' && !empty($icon)) { ?>
			<div class="qodef-item-icon">
				<?php
				print $icon_html;
				?>
			</div>
		<?php } ?>
		<div class="qodef-item-content">
			<?php if ($item_title != '') { ?>
			<div class="qodef-showcase-title-holder">
				<h5 class="qodef-showcase-title">
					<?php if ($item_link != '' ) { ?>
						<a href="<?php echo esc_url($item_link) ?>" target="_blank">
					<?php } ?>
						<?php echo esc_attr($item_title) ?>
					<?php if ($item_link != '' ) { ?>
						</a>
					<?php } ?>
				</h5>
			</div>
			<?php } if ($item_text != '') { ?>
			<div class="qodef-showcase-text-holder">
				<p class="qodef-showcase-text"><?php echo esc_attr($item_text) ?></p>
			</div>
			<?php } ?>
		</div>
		<?php if ( $item_position == 'left' && !empty($icon)) { ?>
			<div class="qodef-item-icon">
				<?php
				print $icon_html;
				?>
			</div>
		<?php } ?>
	</div>
</div>