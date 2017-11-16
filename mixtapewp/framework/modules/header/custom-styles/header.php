<?php

if(!function_exists('mixtape_qodef_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function mixtape_qodef_header_top_bar_styles() {
        global $mixtape_qodef_options;

        if($mixtape_qodef_options['top_bar_height'] !== '') {
            echo mixtape_qodef_dynamic_css('.qodef-top-bar', array('height' => $mixtape_qodef_options['top_bar_height'].'px'));
            echo mixtape_qodef_dynamic_css('.qodef-top-bar .qodef-logo-wrapper a', array('max-height' => $mixtape_qodef_options['top_bar_height'].'px'));
        }

        if($mixtape_qodef_options['top_bar_in_grid'] == 'yes') {
            $top_bar_grid_selector = '.qodef-top-bar .qodef-grid .qodef-vertical-align-containers';
            $top_bar_grid_styles = array();
            if($mixtape_qodef_options['top_bar_grid_background_color'] !== '') {
                $grid_background_color    = $mixtape_qodef_options['top_bar_grid_background_color'];
                $grid_background_transparency = 1;

                if(mixtape_qodef_options()->getOptionValue('top_bar_grid_background_transparency')) {
                    $grid_background_transparency = mixtape_qodef_options()->getOptionValue('top_bar_grid_background_transparency');
                }

                $grid_background_color = mixtape_qodef_rgba_color($grid_background_color, $grid_background_transparency);
                $top_bar_grid_styles['background-color'] = $grid_background_color;
            }

            echo mixtape_qodef_dynamic_css($top_bar_grid_selector, $top_bar_grid_styles);
        }

        $background_color = mixtape_qodef_options()->getOptionValue('top_bar_background_color');
        $top_bar_styles = array();
        if($background_color !== '') {
            $background_transparency = 1;
            if(mixtape_qodef_options()->getOptionValue('top_bar_background_transparency') !== '') {
               $background_transparency = mixtape_qodef_options()->getOptionValue('top_bar_background_transparency');
            }

            $background_color = mixtape_qodef_rgba_color($background_color, $background_transparency);
            $top_bar_styles['background-color'] = $background_color;
        }

        echo mixtape_qodef_dynamic_css('.qodef-top-bar', $top_bar_styles);

    }

    add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_header_top_bar_styles');
}


if (!function_exists('mixtape_qodef_header_top_bar_responsive_styles')){
	/**
     * Generates styles for header top bar on responsive
     */
	function mixtape_qodef_header_top_bar_responsive_styles(){
		$top_bar_responsive_styles = array();

        $hide_top_bar_on_responsive = mixtape_qodef_options()->getOptionValue('hide_top_bar_on_responsive');

        if($hide_top_bar_on_responsive === 'yes') { 
        	$top_bar_responsive_styles['height'] = '0';
        	$top_bar_responsive_styles['display'] = 'none';
        }

        echo mixtape_qodef_dynamic_css('.qodef-top-bar', $top_bar_responsive_styles);

	}

	add_action('mixtape_qodef_style_dynamic_responsive_1024', 'mixtape_qodef_header_top_bar_responsive_styles');
}

if(!function_exists('mixtape_qodef_header_standard_menu_area_styles')) {
    /**
     * Generates styles for header standard menu
     */
    function mixtape_qodef_header_standard_menu_area_styles() {
        global $mixtape_qodef_options;

        $menu_area_header_standard_styles = array();

        if($mixtape_qodef_options['menu_area_background_color_header_standard'] !== '') {
            $menu_area_background_color        = $mixtape_qodef_options['menu_area_background_color_header_standard'];
            $menu_area_background_transparency = 1;

            if($mixtape_qodef_options['menu_area_background_transparency_header_standard'] !== '') {
                $menu_area_background_transparency = $mixtape_qodef_options['menu_area_background_transparency_header_standard'];
            }

            $menu_area_header_standard_styles['background-color'] = mixtape_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if($mixtape_qodef_options['border_bottom_header_standard'] !== 'no') {
            if($mixtape_qodef_options['border_bottom_color_header_standard'] !== '') {
                $menu_area_border_color        = $mixtape_qodef_options['border_bottom_color_header_standard'];
                $menu_area_border_transparency = 1;

                if($mixtape_qodef_options['border_bottom_transparency_header_standard'] !== '') {
                    $menu_area_border_transparency = $mixtape_qodef_options['border_bottom_transparency_header_standard'];
                }

                $menu_area_header_standard_styles['border-bottom-color'] = mixtape_qodef_rgba_color($menu_area_border_color , $menu_area_border_transparency);
            }
        }else {
            $menu_area_header_standard_styles['border-bottom'] = 'none';
        }


        if($mixtape_qodef_options['menu_area_height_header_standard'] !== '') {
            $max_height = intval(mixtape_qodef_filter_px($mixtape_qodef_options['menu_area_height_header_standard']) * 0.9).'px';
            $header_height = intval(mixtape_qodef_filter_px($mixtape_qodef_options['menu_area_height_header_standard'])).'px';
            echo mixtape_qodef_dynamic_css('.qodef-header-standard .qodef-page-header .qodef-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_standard_styles['height'] = mixtape_qodef_filter_px($mixtape_qodef_options['menu_area_height_header_standard']).'px';

            echo mixtape_qodef_dynamic_css('.error404 .qodef-content .qodef-container .qodef-404-page', array('height' => 'calc(100vh - '.$header_height.')'));

        }

        echo mixtape_qodef_dynamic_css('.qodef-header-standard .qodef-page-header .qodef-menu-area', $menu_area_header_standard_styles);

    }

    add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_header_standard_menu_area_styles');
}

if(!function_exists('mixtape_qodef_vertical_menu_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function mixtape_qodef_vertical_menu_styles() {

        $vertical_header_styles = array();

        $vertical_header_selectors = array(
            '.qodef-header-vertical .qodef-vertical-area-background'
        );

        if(mixtape_qodef_options()->getOptionValue('vertical_header_background_color') !== '') {
            $vertical_header_styles['background-color'] = mixtape_qodef_options()->getOptionValue('vertical_header_background_color');
        }

        if(mixtape_qodef_options()->getOptionValue('vertical_header_transparency') !== '') {
            $vertical_header_styles['opacity'] = mixtape_qodef_options()->getOptionValue('vertical_header_transparency');
        }

        if(mixtape_qodef_options()->getOptionValue('vertical_header_background_image') !== '') {
            $vertical_header_styles['background-image'] = 'url('.mixtape_qodef_options()->getOptionValue('vertical_header_background_image').')';
        }


        echo mixtape_qodef_dynamic_css($vertical_header_selectors, $vertical_header_styles);
    }

    add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_vertical_menu_styles');
}

if(!function_exists('mixtape_qodef_header_full_screen_menu_area_styles')) {
	/**
	 * Generates styles for header standard menu
	 */
	function mixtape_qodef_header_full_screen_menu_area_styles() {
		global $mixtape_qodef_options;

		$menu_area_header_full_screen_styles = array();

		if($mixtape_qodef_options['menu_area_background_color_header_full_screen'] !== '') {
			$menu_area_background_color        = $mixtape_qodef_options['menu_area_background_color_header_full_screen'];
			$menu_area_background_transparency = 1;

			if($mixtape_qodef_options['menu_area_background_transparency_header_full_screen'] !== '') {
				$menu_area_background_transparency = $mixtape_qodef_options['menu_area_background_transparency_header_full_screen'];
			}

			$menu_area_header_full_screen_styles['background-color'] = mixtape_qodef_rgba_color($menu_area_background_color, $menu_area_background_transparency);
		}

        if($mixtape_qodef_options['border_bottom_header_full_screen'] !== 'no') {
            if($mixtape_qodef_options['border_bottom_color_header_full_screen'] !== '') {
                $menu_area_border_color        = $mixtape_qodef_options['border_bottom_color_header_full_screen'];
                $menu_area_border_transparency = 1;

                if($mixtape_qodef_options['border_bottom_transparency_header_full_screen'] !== '') {
                    $menu_area_border_transparency = $mixtape_qodef_options['border_bottom_transparency_header_full_screen'];
                }

                $menu_area_header_full_screen_styles['border-bottom-color'] = mixtape_qodef_rgba_color($menu_area_border_color , $menu_area_border_transparency);
            }
        }else {
            $menu_area_header_full_screen_styles['border-bottom'] = 'none';
        }

		if($mixtape_qodef_options['menu_area_height_header_full_screen'] !== '') {
			$max_height = intval(mixtape_qodef_filter_px($mixtape_qodef_options['menu_area_height_header_full_screen']) * 0.9).'px';
			echo mixtape_qodef_dynamic_css('.qodef-header-standard .qodef-page-header .qodef-logo-wrapper a', array('max-height' => $max_height));

			$menu_area_header_full_screen_styles['height'] = mixtape_qodef_filter_px($mixtape_qodef_options['menu_area_height_header_full_screen']).'px';

		}

		echo mixtape_qodef_dynamic_css('.qodef-header-full-screen .qodef-page-header .qodef-menu-area', $menu_area_header_full_screen_styles);

	}

	add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_header_full_screen_menu_area_styles');
}

if(!function_exists('mixtape_qodef_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function mixtape_qodef_sticky_header_styles() {
        global $mixtape_qodef_options;

        if($mixtape_qodef_options['sticky_header_in_grid'] == 'yes' && $mixtape_qodef_options['sticky_header_grid_background_color'] !== '') {
            $sticky_header_grid_background_color        = $mixtape_qodef_options['sticky_header_grid_background_color'];
            $sticky_header_grid_background_transparency = 1;

            if($mixtape_qodef_options['sticky_header_grid_transparency'] !== '') {
                $sticky_header_grid_background_transparency = $mixtape_qodef_options['sticky_header_grid_transparency'];
            }

            echo mixtape_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header .qodef-grid .qodef-vertical-align-containers', array('background-color' => mixtape_qodef_rgba_color($sticky_header_grid_background_color, $sticky_header_grid_background_transparency)));
        }

        if($mixtape_qodef_options['sticky_header_background_color'] !== '') {

            $sticky_header_background_color              = $mixtape_qodef_options['sticky_header_background_color'];
            $sticky_header_background_color_transparency = 1;

            if($mixtape_qodef_options['sticky_header_transparency'] !== '') {
                $sticky_header_background_color_transparency = $mixtape_qodef_options['sticky_header_transparency'];
            }

            echo mixtape_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header .qodef-sticky-holder', array('background-color' => mixtape_qodef_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if($mixtape_qodef_options['sticky_header_height'] !== '') {
            $max_height = intval(mixtape_qodef_filter_px($mixtape_qodef_options['sticky_header_height']) * 0.9).'px';

            echo mixtape_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header', array('height' => $mixtape_qodef_options['sticky_header_height'].'px'));
            echo mixtape_qodef_dynamic_css('.qodef-page-header .qodef-sticky-header .qodef-logo-wrapper a', array('max-height' => $max_height));
        }

        $sticky_menu_item_styles = array();
        if($mixtape_qodef_options['sticky_color'] !== '') {
            $sticky_menu_item_styles['color'] = $mixtape_qodef_options['sticky_color'];
        }
        if($mixtape_qodef_options['sticky_google_fonts'] !== '-1') {
            $sticky_menu_item_styles['font-family'] = mixtape_qodef_get_formatted_font_family($mixtape_qodef_options['sticky_google_fonts']);
        }
        if($mixtape_qodef_options['sticky_fontsize'] !== '') {
            $sticky_menu_item_styles['font-size'] = $mixtape_qodef_options['sticky_fontsize'].'px';
        }
        if($mixtape_qodef_options['sticky_lineheight'] !== '') {
            $sticky_menu_item_styles['line-height'] = $mixtape_qodef_options['sticky_lineheight'].'px';
        }
        if($mixtape_qodef_options['sticky_texttransform'] !== '') {
            $sticky_menu_item_styles['text-transform'] = $mixtape_qodef_options['sticky_texttransform'];
        }
        if($mixtape_qodef_options['sticky_fontstyle'] !== '') {
            $sticky_menu_item_styles['font-style'] = $mixtape_qodef_options['sticky_fontstyle'];
        }
        if($mixtape_qodef_options['sticky_fontweight'] !== '') {
            $sticky_menu_item_styles['font-weight'] = $mixtape_qodef_options['sticky_fontweight'];
        }
        if($mixtape_qodef_options['sticky_letterspacing'] !== '') {
            $sticky_menu_item_styles['letter-spacing'] = $mixtape_qodef_options['sticky_letterspacing'].'px';
        }

        $sticky_menu_item_selector = array(
            '.qodef-main-menu.qodef-sticky-nav > ul > li > a'
        );

        echo mixtape_qodef_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);

        $sticky_menu_item_hover_styles = array();
        if($mixtape_qodef_options['sticky_hovercolor'] !== '') {
            $sticky_menu_item_hover_styles['color'] = $mixtape_qodef_options['sticky_hovercolor'];
        }

        $sticky_menu_item_hover_selector = array(
            '.qodef-main-menu.qodef-sticky-nav > ul > li:hover > a',
            '.qodef-main-menu.qodef-sticky-nav > ul > li.qodef-active-item:hover > a',
            'body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-sticky-nav > ul > li:hover > a',
            'body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-sticky-nav > ul > li.qodef-active-item:hover > a'
        );

        echo mixtape_qodef_dynamic_css($sticky_menu_item_hover_selector, $sticky_menu_item_hover_styles);
    }

    add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_sticky_header_styles');
}

if(!function_exists('mixtape_qodef_fixed_header_styles')) {
    /**
     * Generates styles for fixed haeder
     */
    function mixtape_qodef_fixed_header_styles() {
        global $mixtape_qodef_options;

        if($mixtape_qodef_options['fixed_header_grid_background_color'] !== '') {

            $fixed_header_grid_background_color              = $mixtape_qodef_options['fixed_header_grid_background_color'];
            $fixed_header_grid_background_color_transparency = 1;

            if($mixtape_qodef_options['fixed_header_grid_transparency'] !== '') {
                $fixed_header_grid_background_color_transparency = $mixtape_qodef_options['fixed_header_grid_transparency'];
            }

            echo mixtape_qodef_dynamic_css('.qodef-header-type1 .qodef-fixed-wrapper.fixed .qodef-grid .qodef-vertical-align-containers,
                                    .qodef-header-type3 .qodef-fixed-wrapper.fixed .qodef-grid .qodef-vertical-align-containers',
                array('background-color' => mixtape_qodef_rgba_color($fixed_header_grid_background_color, $fixed_header_grid_background_color_transparency)));
        }

        if($mixtape_qodef_options['fixed_header_background_color'] !== '') {

            $fixed_header_background_color              = $mixtape_qodef_options['fixed_header_background_color'];
            $fixed_header_background_color_transparency = 1;

            if($mixtape_qodef_options['fixed_header_transparency'] !== '') {
                $fixed_header_background_color_transparency = $mixtape_qodef_options['fixed_header_transparency'];
            }

            echo mixtape_qodef_dynamic_css('.qodef-header-type1 .qodef-fixed-wrapper.fixed .qodef-menu-area,
                                    .qodef-header-type3 .qodef-fixed-wrapper.fixed .qodef-menu-area',
                array('background-color' => mixtape_qodef_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency)));
        }

    }

    add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_fixed_header_styles');
}

if(!function_exists('mixtape_qodef_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function mixtape_qodef_main_menu_styles() {
        global $mixtape_qodef_options;

        if($mixtape_qodef_options['menu_color'] !== '' || $mixtape_qodef_options['menu_fontsize'] != '' || $mixtape_qodef_options['menu_fontstyle'] !== '' || $mixtape_qodef_options['menu_fontweight'] !== '' || $mixtape_qodef_options['menu_texttransform'] !== '' || $mixtape_qodef_options['menu_letterspacing'] !== '' || $mixtape_qodef_options['menu_google_fonts'] != "-1") { ?>
            .qodef-main-menu.qodef-default-nav > ul > li > a,
            .qodef-page-header #lang_sel > ul > li > a,
            .qodef-page-header #lang_sel_click > ul > li > a,
            .qodef-page-header #lang_sel ul > li:hover > a{
            <?php if($mixtape_qodef_options['menu_color']) { ?> color: <?php echo esc_attr($mixtape_qodef_options['menu_color']); ?>; <?php } ?>
            <?php if($mixtape_qodef_options['menu_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $mixtape_qodef_options['menu_google_fonts'])); ?>', sans-serif;
            <?php } ?>
            <?php if($mixtape_qodef_options['menu_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($mixtape_qodef_options['menu_fontsize']); ?>px; <?php } ?>
            <?php if($mixtape_qodef_options['menu_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($mixtape_qodef_options['menu_fontstyle']); ?>; <?php } ?>
            <?php if($mixtape_qodef_options['menu_fontweight'] !== '') { ?> font-weight: <?php echo esc_attr($mixtape_qodef_options['menu_fontweight']); ?>; <?php } ?>
            <?php if($mixtape_qodef_options['menu_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($mixtape_qodef_options['menu_texttransform']); ?>;  <?php } ?>
            <?php if($mixtape_qodef_options['menu_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($mixtape_qodef_options['menu_letterspacing']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['menu_google_fonts'] != "-1") { ?>
            .qodef-page-header #lang_sel_list{
            font-family: '<?php echo esc_attr(str_replace('+', ' ', $mixtape_qodef_options['menu_google_fonts'])); ?>', sans-serif !important;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['menu_hovercolor'] !== '') { ?>
            .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
            .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a,
            body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
            body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a,
            .qodef-page-header #lang_sel ul li a:hover,
            .qodef-page-header #lang_sel_click > ul > li a:hover{
            color: <?php echo esc_attr($mixtape_qodef_options['menu_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['menu_activecolor'] !== '') { ?>
            .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a,
            body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a{
            color: <?php echo esc_attr($mixtape_qodef_options['menu_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['menu_item_icon_position'] == "top" && $mixtape_qodef_options['menu_item_icon_size'] !== "") { ?>
            body.qodef-menu-with-large-icons .qodef-main-menu.qodef-default-nav > ul > li > a span.qodef-item-inner i{
            font-size: <?php echo esc_attr($mixtape_qodef_options['menu_item_icon_size']); ?>px !important;
            }
        <?php } ?>

	    <?php if($mixtape_qodef_options['menu_item_style'] == 'small_item' && $mixtape_qodef_options['menu_text_background_color'] !== '') { ?>
		    .qodef-main-menu.qodef-default-nav > ul > li > a span.qodef-item-inner{
		    background-color: <?php echo esc_attr($mixtape_qodef_options['menu_text_background_color']); ?>;
		    }
	    <?php } ?>
        <?php if($mixtape_qodef_options['menu_item_style'] == 'large_item' && $mixtape_qodef_options['menu_text_background_color'] !== '') { ?>
            .qodef-main-menu.qodef-default-nav > ul > li > a{
            background-color: <?php echo esc_attr($mixtape_qodef_options['menu_text_background_color']); ?>;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['menu_hover_background_color'] !== '') {
            $menu_hover_background_color = $mixtape_qodef_options['menu_hover_background_color'];

            if($mixtape_qodef_options['menu_hover_background_color_transparency'] !== '') {
                $menu_hover_background_color_rgb = mixtape_qodef_hex2rgb($menu_hover_background_color);
                $menu_hover_background_color     = 'rgba('.$menu_hover_background_color_rgb[0].', '.$menu_hover_background_color_rgb[1].', '.$menu_hover_background_color_rgb[2].', '.$mixtape_qodef_options['menu_hover_background_color_transparency'].')';
            } ?>

            <?php if($mixtape_qodef_options['menu_item_style'] == 'small_item') { ?>
                .qodef-main-menu.qodef-default-nav > ul > li:hover > a span.qodef-item-inner,
                .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a span.qodef-item-inner {
                background-color: <?php echo esc_attr($menu_hover_background_color); ?>;
                }
            <?php } elseif($mixtape_qodef_options['menu_item_style'] == 'large_item') { ?>
                .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
                .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a {
                background-color: <?php echo esc_attr($menu_hover_background_color); ?>;
                }
            <?php } ?>
        <?php } ?>

        <?php if($mixtape_qodef_options['menu_active_background_color'] !== '') {
            $menu_active_background_color = $mixtape_qodef_options['menu_active_background_color'];

            if($mixtape_qodef_options['menu_active_background_color_transparency'] !== '') {
                $menu_active_background_color_rgb = mixtape_qodef_hex2rgb($menu_active_background_color);
                $menu_active_background_color     = 'rgba('.$menu_active_background_color_rgb[0].', '.$menu_active_background_color_rgb[1].', '.$menu_active_background_color_rgb[2].', '.$mixtape_qodef_options['menu_active_background_color_transparency'].')';
            }
            ?>
            <?php if($mixtape_qodef_options['menu_item_style'] == 'small_item') { ?>
                .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a span.qodef-item-inner {
                background-color: <?php echo esc_attr($menu_active_background_color); ?>;
                }
            <?php } elseif($mixtape_qodef_options['menu_item_style'] == 'large_item') { ?>
                .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a {
                background-color: <?php echo esc_attr($menu_active_background_color); ?>;
                }
            <?php } ?>
        <?php } ?>


        <?php if($mixtape_qodef_options['menu_light_hovercolor'] !== '') { ?>
            .qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
            .qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a{
            color: <?php echo esc_attr($mixtape_qodef_options['menu_light_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['menu_light_activecolor'] !== '') { ?>
            .qodef-light-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a{
            color: <?php echo esc_attr($mixtape_qodef_options['menu_light_activecolor']); ?> !important;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['menu_dark_hovercolor'] !== '') { ?>
            .qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li:hover > a,
            .qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item:hover > a{
            color: <?php echo esc_attr($mixtape_qodef_options['menu_dark_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['menu_dark_activecolor'] !== '') { ?>
            .qodef-dark-header .qodef-main-menu.qodef-default-nav > ul > li.qodef-active-item > a{
            color: <?php echo esc_attr($mixtape_qodef_options['menu_dark_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['menu_lineheight'] != "" || $mixtape_qodef_options['menu_padding_left_right'] !== '') { ?>
            .qodef-main-menu.qodef-default-nav > ul > li > a span.qodef-item-inner{
            <?php if($mixtape_qodef_options['menu_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($mixtape_qodef_options['menu_lineheight']); ?>px; <?php } ?>
            <?php if($mixtape_qodef_options['menu_padding_left_right']) { ?> padding: 0  <?php echo esc_attr($mixtape_qodef_options['menu_padding_left_right']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['menu_margin_left_right'] !== '') { ?>
            .qodef-main-menu.qodef-default-nav > ul > li{
            margin: 0  <?php echo esc_attr($mixtape_qodef_options['menu_margin_left_right']); ?>px;
            }
        <?php } ?>

        <?php
        if($mixtape_qodef_options['dropdown_background_color'] != "" || $mixtape_qodef_options['dropdown_background_transparency'] != "") {

            //dropdown background and transparency styles
            $dropdown_bg_color_initial        = '#ffffff';
            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color        = $mixtape_qodef_options['dropdown_background_color'] !== "" ? $mixtape_qodef_options['dropdown_background_color'] : $dropdown_bg_color_initial;
            $dropdown_bg_transparency = $mixtape_qodef_options['dropdown_background_transparency'] !== "" ? $mixtape_qodef_options['dropdown_background_transparency'] : $dropdown_bg_transparency_initial;

            $dropdown_bg_color_rgb = mixtape_qodef_hex2rgb($dropdown_bg_color);

            ?>

            .qodef-drop-down .qodef-menu-second .qodef-menu-inner ul,
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner ul li ul,
            .shopping_cart_dropdown,
            .qodef-drop-down .qodef-menu-narrow .qodef-menu-second .qodef-menu-inner ul,
            .qodef-main-menu.qodef-default-nav #lang_sel ul ul,
            .qodef-main-menu.qodef-default-nav #lang_sel_click  ul ul,
            .header-widget.widget_nav_menu ul ul,
            .qodef-drop-down .qodef-menu-wide.qodef-wide-background .qodef-menu-second{
            background-color: <?php echo esc_attr($dropdown_bg_color); ?>;
            background-color: rgba(<?php echo esc_attr($dropdown_bg_color_rgb[0]); ?>,<?php echo esc_attr($dropdown_bg_color_rgb[1]); ?>,<?php echo esc_attr($dropdown_bg_color_rgb[2]); ?>,<?php echo esc_attr($dropdown_bg_transparency); ?>);
            }

        <?php } //end dropdown background and transparency styles ?>

        <?php
        if($mixtape_qodef_options['dropdown_top_padding'] !== '') {

            $menu_inner_ul_top = 15; //default value without border
            if($mixtape_qodef_options['dropdown_top_padding'] !== '') {
                ?>
                .qodef-drop-down .qodef-menu-narrow .qodef-menu-second .qodef-menu-inner ul,
                .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner > ul{
                padding-top: <?php echo esc_attr($mixtape_qodef_options['dropdown_top_padding']); ?>px;
                }
                <?php
                $menu_inner_ul_top = $mixtape_qodef_options['dropdown_top_padding']; //overwrite default value
            } ?>
            .qodef-drop-down .qodef-menu-narrow .qodef-menu-second .qodef-menu-inner ul li ul,
            body.qodef-slide-from-bottom .qodef-drop-down .qodef-menu-narrow .qodef-menu-second .qodef-menu-inner ul li:hover ul,
            body.qodef-slide-from-top .qodef-menu-narrow .qodef-menu-second .qodef-menu-inner ul li:hover ul{
            top:-<?php echo esc_attr($menu_inner_ul_top); ?>px;
            }

        <?php } ?>

        <?php if($mixtape_qodef_options['dropdown_bottom_padding'] !== '') { ?>
		    .qodef-drop-down .qodef-menu-narrow .qodef-menu-second .qodef-menu-inner ul,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner > ul{
            padding-bottom: <?php echo esc_attr($mixtape_qodef_options['dropdown_bottom_padding']); ?>px;
            }
        <?php } ?>

        <?php
        $dropdown_separator_full_width = 'no';
        if($mixtape_qodef_options['enable_dropdown_separator_full_width'] == "yes") {
            $dropdown_separator_full_width = $mixtape_qodef_options['enable_dropdown_separator_full_width']; ?>
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner > ul > li:last-child > a,
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner > ul > li > ul > li:last-child > a,
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner > ul > li > ul > li > ul > li:last-child > a{
            border-bottom:1px solid transparent;
            }

        <?php }
        if($dropdown_separator_full_width !== 'yes' && $mixtape_qodef_options['dropdown_separator_color'] !== "") {
            ?>
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner ul li a,
            .header-widget.widget_nav_menu ul.menu li ul li a {
            border-color: <?php echo esc_attr($mixtape_qodef_options['dropdown_separator_color']); ?>;
            }
        <?php } ?>
        <?php
        if($dropdown_separator_full_width == 'yes') {
            ?>
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner ul li,
            .header-widget.widget_nav_menu ul.menu li ul li{
	        border-bottom-width:1px;
	        border-bottom-style:solid;
            <?php if($mixtape_qodef_options['dropdown_separator_color'] !== "") {?> border-bottom-color: <?php echo esc_attr($mixtape_qodef_options['dropdown_separator_color']); ?>; <?php } ?>
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['dropdown_top_position'] !== '') { ?>
            header .qodef-drop-down .qodef-menu-second {
            top: <?php echo esc_attr($mixtape_qodef_options['dropdown_top_position']).'%;'; ?>
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['dropdown_color'] !== '' || $mixtape_qodef_options['dropdown_fontsize'] !== '' || $mixtape_qodef_options['dropdown_lineheight'] !== '' || $mixtape_qodef_options['dropdown_fontstyle'] !== '' || $mixtape_qodef_options['dropdown_fontweight'] !== '' || $mixtape_qodef_options['dropdown_google_fonts'] != "-1" || $mixtape_qodef_options['dropdown_texttransform'] !== '' || $mixtape_qodef_options['dropdown_letterspacing'] !== '') { ?>
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner > ul > li > a,
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner > ul > li > h4,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner > ul > li > h4,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner > ul > li > a,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second ul li ul li.menu-item-has-children > a,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner ul li.qodef-sub ul li.menu-item-has-children > a,
            .qodef-main-menu.qodef-default-nav #lang_sel ul li li a,
            .qodef-main-menu.qodef-default-nav #lang_sel_click ul li ul li a,
            .qodef-main-menu.qodef-default-nav #lang_sel ul ul a,
            .qodef-main-menu.qodef-default-nav #lang_sel_click ul ul a{
            <?php if(!empty($mixtape_qodef_options['dropdown_color'])) { ?> color: <?php echo esc_attr($mixtape_qodef_options['dropdown_color']); ?>; <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $mixtape_qodef_options['dropdown_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($mixtape_qodef_options['dropdown_fontsize']); ?>px; <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($mixtape_qodef_options['dropdown_lineheight']); ?>px; <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($mixtape_qodef_options['dropdown_fontstyle']); ?>;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($mixtape_qodef_options['dropdown_fontweight']); ?>; <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($mixtape_qodef_options['dropdown_texttransform']); ?>;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($mixtape_qodef_options['dropdown_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['dropdown_color'] !== '') { ?>
            .shopping_cart_dropdown ul li
            .item_info_holder .item_left a,
            .shopping_cart_dropdown ul li .item_info_holder .item_right .amount,
            .shopping_cart_dropdown .cart_bottom .subtotal_holder .total,
            .shopping_cart_dropdown .cart_bottom .subtotal_holder .total_amount{
            color: <?php echo esc_attr($mixtape_qodef_options['dropdown_color']); ?>;
            }
        <?php } ?>

        <?php if(!empty($mixtape_qodef_options['dropdown_hovercolor'])) { ?>
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner > ul > li:hover > a,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second ul li ul li.menu-item-has-children:hover > a,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner ul li.qodef-sub ul li.menu-item-has-children:hover > a,
            .qodef-main-menu.qodef-default-nav #lang_sel ul li li:hover a,
            .qodef-main-menu.qodef-default-nav #lang_sel_click ul li ul li:hover a,
            .qodef-main-menu.qodef-default-nav #lang_sel ul li:hover > a,
            .qodef-main-menu.qodef-default-nav #lang_sel_click ul li:hover > a{
            color: <?php echo esc_attr($mixtape_qodef_options['dropdown_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if(!empty($mixtape_qodef_options['dropdown_padding_top_bottom'])) { ?>
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second>.qodef-menu-inner>ul>li.qodef-sub>ul>li>a,
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner ul li a,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second ul li a,
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner ul.right li a{
            padding-top: <?php echo esc_attr($mixtape_qodef_options['dropdown_padding_top_bottom']); ?>px;
            padding-bottom: <?php echo esc_attr($mixtape_qodef_options['dropdown_padding_top_bottom']); ?>px;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['dropdown_wide_color'] !== '' || $mixtape_qodef_options['dropdown_wide_fontsize'] !== '' || $mixtape_qodef_options['dropdown_wide_lineheight'] !== '' || $mixtape_qodef_options['dropdown_wide_fontstyle'] !== '' || $mixtape_qodef_options['dropdown_wide_fontweight'] !== '' || $mixtape_qodef_options['dropdown_wide_google_fonts'] !== "-1" || $mixtape_qodef_options['dropdown_wide_texttransform'] !== '' || $mixtape_qodef_options['dropdown_wide_letterspacing'] !== '') { ?>
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner > ul > li > a{
            <?php if($mixtape_qodef_options['dropdown_wide_color'] !== '') { ?> color: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_color']); ?>; <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $mixtape_qodef_options['dropdown_wide_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_fontsize']); ?>px; <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_lineheight']); ?>px; <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_fontstyle']); ?>;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_fontweight']); ?>; <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_texttransform']); ?>;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['dropdown_wide_hovercolor'] !== '') { ?>
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner > ul > li:hover > a {
            color: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['dropdown_wide_padding_top_bottom'] !== '') { ?>
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second>.qodef-menu-inner > ul > li.qodef-sub > ul > li > a,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner ul li a,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second ul li a,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner ul.right li a{
            padding-top: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_padding_top_bottom']); ?>px;
            padding-bottom: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_padding_top_bottom']); ?>px;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['dropdown_color_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_fontsize_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_lineheight_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_fontstyle_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_fontweight_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_google_fonts_thirdlvl'] != "-1" || $mixtape_qodef_options['dropdown_texttransform_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_letterspacing_thirdlvl'] !== '') { ?>
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner ul li.qodef-sub ul li a{
            <?php if($mixtape_qodef_options['dropdown_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($mixtape_qodef_options['dropdown_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $mixtape_qodef_options['dropdown_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($mixtape_qodef_options['dropdown_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($mixtape_qodef_options['dropdown_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($mixtape_qodef_options['dropdown_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($mixtape_qodef_options['dropdown_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($mixtape_qodef_options['dropdown_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($mixtape_qodef_options['dropdown_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($mixtape_qodef_options['dropdown_hovercolor_thirdlvl'] !== '') { ?>
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner ul li.qodef-sub ul li:hover > a,
            .qodef-drop-down .qodef-menu-second .qodef-menu-inner ul li ul li:hover > a{
            color: <?php echo esc_attr($mixtape_qodef_options['dropdown_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($mixtape_qodef_options['dropdown_wide_color_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_wide_fontsize_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_wide_lineheight_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_wide_fontstyle_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_wide_fontweight_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_wide_google_fonts_thirdlvl'] != "-1" || $mixtape_qodef_options['dropdown_wide_texttransform_thirdlvl'] !== '' || $mixtape_qodef_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?>
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner ul li.qodef-sub ul li a,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second ul li ul li a{
            <?php if($mixtape_qodef_options['dropdown_wide_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $mixtape_qodef_options['dropdown_wide_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($mixtape_qodef_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($mixtape_qodef_options['dropdown_wide_hovercolor_thirdlvl'] !== '') { ?>
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner ul li.qodef-sub ul li) > a:hover,
            .qodef-drop-down .qodef-menu-wide .qodef-menu-second .qodef-menu-inner ul li ul li > a:hover{
            color: <?php echo esc_attr($mixtape_qodef_options['dropdown_wide_hovercolor_thirdlvl']); ?> !important;
            }
        <?php }
    }

    add_action('mixtape_qodef_style_dynamic', 'mixtape_qodef_main_menu_styles');
}