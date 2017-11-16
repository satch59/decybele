<?php

if(!function_exists('mixtape_qodef_get_accordion_tab_html')) {
    /**
     * Calls accordion tab shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function mixtape_qodef_get_accordion_tab_html($params) {
        $accordion_tab_html = mixtape_qodef_execute_shortcode('qodef_accordion_tab', $params);
        $accordion_tab_html = str_replace("\n", '', $accordion_tab_html);
        return $accordion_tab_html;
    }
}