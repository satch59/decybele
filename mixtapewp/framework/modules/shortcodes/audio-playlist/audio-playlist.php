<?php
namespace MixtapeQode\Modules\Shortcodes\AudioPlaylist;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class AudioPlaylist that represents audio playlist shortcode
 * @package MixtapeQode\Modules\Shortcodes\AudioPlaylist
 */
class AudioPlaylist implements ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    /**
     * Sets base attribute and registers shortcode with Visual Composer
     */
    public function __construct() {
        $this->base = 'qodef_audio_playlist';

        add_action('vc_before_init', array($this, 'vcMap'));
    }

    /**
     * Returns base attribute
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        vc_map(array(
            'name'                      => esc_html__('Audio Playlist', 'mixtapewp'),
            'base'                      => $this->base,
            'category'                  => esc_html__('by SELECT', 'mixtapewp'),
            'icon'                      => 'icon-wpb-audio-playlist extended-custom-icon',
            'allowed_container_element' => 'vc_row',
            'params'                    =>  array(
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Playlist Type', 'mixtapewp'),
                        'param_name'  => 'playlist_type',
                        'value'       => array(
                            esc_html__('SoundCloud', 'mixtapewp') => 'sound-cloud',
                            esc_html__('Spotify', 'mixtapewp')    => 'spotify',
                            esc_html__('Bandcamp', 'mixtapewp')   => 'bandcamp'
                        ),
                        'admin_label' => true
                    ),
                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Playlist URL', 'mixtapewp'),
                        'param_name'  => 'playlist_url',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'playlist_type','value'=>'spotify')
                    ),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__('Playlist Skin', 'mixtapewp'),
                        'param_name'  => 'playlist_skin',
                        'value'       => array(
                            esc_html__('Dark', 'mixtapewp')  => 'dark',
                            esc_html__('Light', 'mixtapewp') => 'light'
                        ),
                        'admin_label' => true,
                        'dependency'  => array('element' => 'playlist_type','value'=>array('spotify','bandcamp'))
                    ),

                    array(
                        'type'        => 'textfield',
                        'heading'     => esc_html__('Playlist ID', 'mixtapewp'),
                        'param_name'  => 'playlist_id',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'playlist_type','value'=>array('sound-cloud','bandcamp'))
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Playlist Color', 'mixtapewp'),
                        'param_name'  => 'playlist_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'playlist_type','value'=>array('sound-cloud','bandcamp'))
                    )
                ), 
        ));
    }

    /**
     * Renders HTML for audio playlist shortcode
     *
     * @param array $atts
     * @param null $content
     *
     * @return string
     */
    public function render($atts, $content = null) {
        $default_atts = array(
            'playlist_type'  => 'sound-cloud',
            'playlist_url'  => '',
            'playlist_skin'  => '',
            'playlist_id' => '',
            'playlist_color' => ''
        );

        $params       = shortcode_atts($default_atts, $atts);
        $playlist_type = $params['playlist_type'];
        $playlist_id = $params['playlist_id'];
        $playlist_color = $params['playlist_color'];
        $playlist_skin = $params['playlist_skin'];
        $playlist_url = $params['playlist_url'];

        if ($playlist_type == "sound-cloud") {
            $playlist_id_url = "https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/";
            if ($playlist_id !== '') {
                $playlist_id_url .= $playlist_id;
            }
            if ($playlist_color !== '') {
                $playlist_color = substr($playlist_color, 1);
                $playlist_id_url .= "&amp;color=".$playlist_color;
            }

            $params['playlist_id_url'] = $playlist_id_url;
        }


        if ($playlist_type == "spotify") {
            if ($playlist_skin == "light"){
                $playlist_url .= "&theme=white";
                $params['playlist_url'] = $playlist_url;
            }
        }

        if ($playlist_type == "bandcamp") {
            $playlist_id_url = "https://bandcamp.com/EmbeddedPlayer/album=";
            if ($playlist_id !== '') {
                $playlist_id_url .= $playlist_id;
            }
            if ($playlist_skin == "light"){
                $playlist_id_url .= "/bgcol=ffffff";
            }
            else {
                $playlist_id_url .= "/bgcol=333333";
            }

            $playlist_id_url .= "/size=large";

            if ($playlist_color !== '') {
                $playlist_color = substr($playlist_color, 1);
                $playlist_id_url .= "/linkcol=".$playlist_color;
            }

            $params['playlist_id_url'] = $playlist_id_url."/artwork=small/transparent=true/";
        }

        return mixtape_qodef_get_shortcode_module_template_part('templates/'.$playlist_type.'-playlist-template', 'audio-playlist', '', $params);
    }
}