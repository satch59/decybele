<?php
	$stores = get_post_meta(get_the_ID(), 'qodef_store_name', true);
	$stores_links = get_post_meta(get_the_ID(), 'qodef_store_link', true);
	$i = 0;
?>
<?php if(is_array($stores) && count($stores) > 0 && implode($stores) != ''): ?>
	<div class="qodef-single-album-stores-holder">
		<h3 class="qodef-single-album-stores-title"><?php esc_html_e('Available On', 'mixtapewp'); ?></h3>
		<div class="qodef-single-album-stores clearfix">
			<?php
			foreach($stores as $store) : ?>
				<span class="qodef-single-album-store">
					<?php if(isset($stores_links[$i]) && $stores_links[$i]) : ?>
						<a class="qodef-single-album-store-link" href="<?php echo esc_url($stores_links[$i]); ?>" target = "_blank">
							<?php echo qodef_fn_single_stores_names_and_images($store, $store_type); ?>
						</a>
					<?php else: ?>
						<?php echo qodef_fn_single_stores_names_and_images($store, $store_type); ?>
					<?php endif; ?>
				</span>
				<?php
				$i++;
			endforeach;
			?>
		</div>
	</div>
<?php endif; ?>