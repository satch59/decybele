<?php 
    $id = get_the_ID();
    $args = array(
			'type'		=> 'compact',
			'album'		=> $id,
			'bg_color'	=> '',
			'skin'		=> '',
	);

    echo mixtape_qodef_execute_shortcode('qodef_album_player', $args);
?>