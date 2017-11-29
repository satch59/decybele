<h3 class="qodef-tracks-holder-title"><?php esc_html_e('Tracklist', 'mixtapewp'); ?></h3>
<?php 
    $id = get_the_ID();
    $args = array(
			'album'		=> $id,
	);

    echo mixtape_qodef_execute_shortcode('qodef_album', $args);
?>