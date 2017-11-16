<?php

if(!function_exists('mixtape_qodef_single_event')) {
    function mixtape_qodef_single_event() {
        $current_id = get_the_ID(); 
        $location = get_post_meta($current_id, 'qodef_event_item_location', true);
        $pin = get_post_meta($current_id, 'qodef_event_item_pin', true);
        $link = get_post_meta($current_id, 'qodef_event_item_link', true);
        $target = get_post_meta($current_id, 'qodef_event_item_target', true);
        $tickes_status = get_post_meta($current_id, 'qodef_event_item_tickets_status', true);
        $date = get_post_meta($current_id, 'qodef_event_item_date', true);
        $time = get_post_meta($current_id, 'qodef_event_item_time', true);
        $website = get_post_meta($current_id, 'qodef_event_item_website', true);
        $organized_by = get_post_meta($current_id, 'qodef_event_item_organized_by', true);
        $back_to_link = get_post_meta( get_the_ID(), 'qodef_event_back_to_link', true );
        $params = array(
            'holder_class'  => 'qodef-event-single-holder',
            'location'  => $location,
            'pin' => $pin,
            'link' => $link,
            'target' => $target,
            'tickets_status' => $tickes_status,
            'date' => $date,
            'time' => $time,
            'website' => $website,
            'organized_by' => $organized_by,
            'back_to_link' => $back_to_link
        );

        mixtape_qodef_get_module_template_part('templates/single/holder', 'events', '', $params);
    }
}