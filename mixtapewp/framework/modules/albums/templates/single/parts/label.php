<?php
	$labels   = wp_get_post_terms(get_the_ID(), 'album-label');
	$label_names = array();

if(is_array($labels) && count($labels)) :
	foreach($labels as $label) {
		$label_names[] = $label->name;
	}

	?>
	<div class="qodef-album-details qodef-album-labels">
		<span><?php 
            if (count($labels) > 1) { 
                esc_html_e('Labels:', 'mixtapewp');
            } else {
                esc_html_e('Label:', 'mixtapewp');
            } ?>
        </span>
		<span>
			<?php echo esc_html(implode(', ', $label_names)); ?>
		</span>
	</div>
<?php endif; ?>