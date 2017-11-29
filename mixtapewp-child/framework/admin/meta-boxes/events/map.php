<?php

//Events

if(!function_exists('mixtape_qodef_map_events_meta_fields')) {

    function mixtape_qodef_map_events_meta_fields() {

        $event_meta_box = mixtape_qodef_add_meta_box(
            array(
                'scope' => array('event'),
                'title' => esc_html__('Event', 'mixtapewp'),
                'name' => 'event_meta'
            )
        );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_event_item_tickets_status',
                    'type'        => 'select',
                    'label'       => esc_html__('Tickets Status','mixtapewp'),
                    'description' => '',
                    'options' => array(
                        'available' => esc_html__('Available','mixtapewp'),
                        'free' => esc_html__('Free','mixtapewp'),
                        'sold' => esc_html__('Sold Out','mixtapewp')
                    ),
                    'parent'      => $event_meta_box
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_event_item_date',
                    'type'        => 'date',
                    'label'       => esc_html__('Date','mixtapewp'),
                    'description' => '',
                    'parent'      => $event_meta_box
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_event_item_time',
                    'type'        => 'text',
                    'label'       => esc_html__('Time','mixtapewp'),
                    'description' => esc_html__('Please input the time in a HH:MM format. If you are using a 12 hour time format, please also input AM or PM markers.','mixtapewp'),
                    'parent'      => $event_meta_box
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_event_item_location',
                    'type'        => 'text',
                    'label'       => esc_html__('Location','mixtapewp'),
                    'description' => '',
                    'parent'      => $event_meta_box
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_event_item_pin',
                    'type'        => 'image',
                    'label'       => esc_html__('Pin','mixtapewp'),
                    'description' => esc_html__('Upload Google Map Pin Image','mixtapewp'),
                    'parent'      => $event_meta_box
                )
            );
            
            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_event_item_website',
                    'type'        => 'text',
                    'label'       => esc_html__('Website','mixtapewp'),
                    'description' => '',
                    'parent'      => $event_meta_box
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_event_item_organized_by',
                    'type'        => 'text',
                    'label'       => esc_html__('Organized By','mixtapewp'),
                    'description' => '',
                    'parent'      => $event_meta_box
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_event_item_link',
                    'type'        => 'text',
                    'label'       => esc_html__('Buy Tickets Link','mixtapewp'),
                    'description' => esc_html__('Enter the external link where users can buy the tickets','mixtapewp'),
                    'parent'      => $event_meta_box
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_event_item_target',
                    'type'        => 'selectblank',
                    'label'       => esc_html__('Target','mixtapewp'),
                    'description' => '',
                    'parent'      => $event_meta_box,
                    'options' => array(
                    	'_self' => esc_html__('Self','mixtapewp'),
                    	'_blank' => esc_html__('Blank','mixtapewp')
                	)
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_event_back_to_link',
                    'type'        => 'text',
                    'label'       => esc_html__('"Back To" Link','mixtapewp'),
                    'description' => esc_html__('Choose "Back To" page to link from event single page','mixtapewp'),
                    'parent'      => $event_meta_box,
                )
            );
        }

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_events_meta_fields');
}