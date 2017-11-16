<?php 
	$people = get_post_meta(get_the_ID(), 'qodef_album_people', true);
	if ($people !== '') {
		?>
		<div class="qodef-album-details qodef-album-people">
			<span><?php esc_html_e('People:', 'mixtapewp'); ?></span>
			<span><?php echo esc_attr($people); ?></span>
		</div>

		<?php
	}
	    ?>