<?php

if(!function_exists('mixtape_qodef_get_audio_playlist_html')) {
    /**
     * Calls audio playlist shortcode with given parameters and returns it's output
     * @param $params
     *
     * @return mixed|string
     */
    function mixtape_qodef_get_audio_playlist_html($params) {
        $audio_playlist_html = mixtape_qodef_execute_shortcode('qodef_audio_playlist', $params);
        $audio_playlist_html = str_replace("\n", '', $audio_playlist_html);
        return $audio_playlist_html;
    }
}