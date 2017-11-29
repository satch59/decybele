<?php

if(!function_exists('mixtape_qodef_single_album')) {
    function mixtape_qodef_single_album() {
    	$back_to_link = get_post_meta( get_the_ID(), 'qodef_album_back_to_link', true );
    	$album_type = mixtape_qodef_get_meta_field_intersect('album_type');
		$store_type = ($album_type == 'comprehensive') ? 'image' : 'text';
        $params = array(
        	'back_to_link' => $back_to_link,
        	'store_type' => $store_type,
        );

        mixtape_qodef_get_module_template_part('templates/single/'.$album_type, 'albums', '', $params);
    }
}

if(!function_exists('qodef_fn_single_stores_names_and_images')) {
	function qodef_fn_single_stores_names_and_images($store, $type = '') {

		switch ($store):
			case 'google-play':
				$name = esc_html__('Google Play', 'mixtapewp');
				break;
			case 'bandcamp':
				$name = esc_html__('Bandcamp', 'mixtapewp');
				break;
			case 'spotify':
				$name = esc_html__('Spotify', 'mixtapewp');
				break;
			case 'amazonmp3':
				$name = esc_html__('AmazonMP3', 'mixtapewp');
				break;
			case 'deezer':
				$name = esc_html__('Deezer', 'mixtapewp');
				break;
			default:
				$name = esc_html__('iTunes', 'mixtapewp');
				break;
			endswitch;

		$image = '<img src="'.QODE_ASSETS_ROOT.'/img/stores/'.$store.'.png" alt="'.$name.'" />';

		if($type == 'image') {
			return $image;
		}

		return $name;

	}
}