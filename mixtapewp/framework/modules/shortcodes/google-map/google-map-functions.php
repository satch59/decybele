<?php

if(!function_exists('mixtape_qodef_get_google_map_html')) {
    /**
     * Calls google map shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function mixtape_qodef_get_google_map_html($params) {
        $google_map_html = mixtape_qodef_execute_shortcode('qodef_google_map', $params);
        $google_map_html = str_replace("\n", '', $google_map_html);
        
        return $google_map_html;
    }
}