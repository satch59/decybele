<?php

//Albums

if(!function_exists('mixtape_qodef_map_album_meta_fields')) {

    function mixtape_qodef_map_album_meta_fields() {

		$album_meta_box = mixtape_qodef_add_meta_box(
		    array(
		        'scope' => array('album'),
		        'title' => esc_html__('Album', 'mixtapewp'),
		        'name' => 'album_meta_box'
		    )
		);

		mixtape_qodef_add_meta_box_field(
				array(
					'name'        => 'qodef_album_type_meta',
					'type'        => 'select',
					'label'       => esc_html__('Album Type', 'mixtapewp'),
					'description' => '',
					'options' => array(
		                '' => esc_html__('Default','mixtapewp'),
		                'comprehensive' => esc_html__('Album Comprehensive','mixtapewp'),
		                'minimal'		=> esc_html__('Album Minimal','mixtapewp'),
		                'compact'		=> esc_html__('Album Compact','mixtapewp')
		            ),
					'parent'      => $album_meta_box
				)
		);

		mixtape_qodef_add_meta_box_field(
				array(
					'name'        => 'qodef_album_release_date',
					'type'        => 'date',
					'label'       => esc_html__('Release Date', 'mixtapewp'),
					'description' => '',
					'parent'      => $album_meta_box
				)
		);
		mixtape_qodef_add_meta_box_field(
				array(
					'name'        => 'qodef_album_people',
					'type'        => 'text',
					'label'       => esc_html__('People', 'mixtapewp'),
					'description' => '',
					'parent'      => $album_meta_box
				)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_album_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Latest Video Link', 'mixtapewp'),
				'description' => esc_html__('Enter Video Link', 'mixtapewp'),
				'parent'      => $album_meta_box,

			)
		);

		mixtape_qodef_add_meta_box_field(
			array(
				'name'        => 'qodef_album_back_to_link',
				'type'        => 'text',
				'label'       => esc_html__('"Back To" Link','mixtapewp'),
				'description' => esc_html__('Choose "Back To" page to link from album single page', 'mixtapewp'),
				'parent'      => $album_meta_box,

			)
		);


		$tracks_meta_box = mixtape_qodef_add_meta_box(
			array(
				'scope' => array('album'),
				'title' => esc_html__('Tracks', 'mixtapewp'),
				'name' => 'tracks_meta_box'
			)
		);
		mixtape_qodef_add_repeater_field(
			array(
				'name'        => 'qodef_tracks_repeater',
				'label'       => esc_html__('Tracks', 'mixtapewp'),
				'fields' => array(
					array(
						'name'        => 'qodef_track_file',
						'type'        => 'file',
						'label'       => esc_html__('Audio File', 'mixtapewp'),
					),
					array(
						'name'        => 'qodef_track_title',
						'type'        => 'text',
						'label'       => esc_html__('Title', 'mixtapewp'),
					),
					array(
						'name'        => 'qodef_track_buy_link',
						'type'        => 'text',
						'label'       => esc_html__('Buy Link', 'mixtapewp'),
					),
					array(
						'name'        	=> 'qodef_track_free_download',
						'type'        	=> 'yesno',
						'default_value'  => 'no',
						'label'      	=> esc_html__('Free Download', 'mixtapewp'),
					),
					array(
						'name'        => 'qodef_track_video_link',
						'type'        => 'text',
						'label'       => esc_html__('Video Link', 'mixtapewp'),
					),
					array(
						'name'        => 'qodef_track_lyrics',
						'type'        => 'textarea',
						'label'       => esc_html__('Lyrics', 'mixtapewp')
					)

				),
				'parent'      => $tracks_meta_box,
				'description' => ''
			)
		);

		$reviews_meta_box = mixtape_qodef_add_meta_box(
			array(
				'scope' => array('album'),
				'title' => esc_html__('Reviews', 'mixtapewp'),
				'name' => 'reviews_meta_box'
			)
		);
		mixtape_qodef_add_repeater_field(
			array(
				'name'        => 'qodef_reviews_repeater',
				'label'       => esc_html__('Reviews', 'mixtapewp'),
				'fields' => array(
					array(
						'name'        => 'qodef_review_author',
						'type'        => 'text',
						'label'       => esc_html__('Review Author', 'mixtapewp'),
					),
					array(
						'name'        => 'qodef_review_text',
						'type'        => 'textarea',
						'label'       => esc_html__('Review Title', 'mixtapewp')
					)

				),
				'parent'      => $reviews_meta_box
			)
		);
		$stores_meta_box = mixtape_qodef_add_meta_box(
			array(
				'scope' => array('album'),
				'title' => esc_html__('Stores', 'mixtapewp'),
				'name' => 'stores_meta_box'
			)
		);
		mixtape_qodef_add_repeater_field(
			array(
				'name'        => 'qodef_stores_repeater',
				'label'       => esc_html__('Stores', 'mixtapewp'),
				'fields' => array(
					array(
						'name'        => 'qodef_store_name',
						'type'        => 'select',
						'options'	  => array(
							'itunes'		=> esc_html__('iTunes', 'mixtapewp'),
							'google-play'	=> esc_html__('Google Play', 'mixtapewp'),
							'bandcamp'		=> esc_html__('Bandcamp', 'mixtapewp'),
							'spotify'		=> esc_html__('Spotify', 'mixtapewp'),
							'amazonmp3'		=> esc_html__('AmazonMP3', 'mixtapewp'),
							'deezer'		=> esc_html__('Deezer', 'mixtapewp')
						),
						'label'       => esc_html__('Store', 'mixtapewp'),
					),
					array(
						'name'        => 'qodef_store_link',
						'type'        => 'text',
						'label'       => esc_html__('Store Link', 'mixtapewp')
					)

				),
				'parent'      => $stores_meta_box
			)
		);
    }

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_album_meta_fields');
}
