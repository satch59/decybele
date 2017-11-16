<?php

if(!function_exists('mixtape_qodef_get_accordion_html')) {
    /**
     * Calls accordion shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function mixtape_qodef_get_accordion_html($params) {
        $accordion_html = mixtape_qodef_execute_shortcode('qodef_accordion', $params);
        $accordion_html = str_replace("\n", '', $accordion_html);
        return $accordion_html;
    }
}