<?php

if(!function_exists('mixtape_qodef_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function mixtape_qodef_is_responsive_on() {
        return mixtape_qodef_options()->getOptionValue('responsiveness') !== 'no';
    }
}

if(!function_exists('mixtape_qodef_first_color_array')){

	function mixtape_qodef_first_color_array() {

		$first_color = array();

		$first_color['background_color'] = array(
			'.qodef-st-loader .pulse',
			'.qodef-st-loader .double_pulse .double-bounce1',
			'.qodef-st-loader .double_pulse .double-bounce2',
			'.qodef-st-loader .cube',
			'.qodef-st-loader .rotating_cubes .cube1',
			'.qodef-st-loader .rotating_cubes .cube2',
			'.qodef-st-loader .qodef-stripes>div',
			'.qodef-st-loader .wave>div',
			'.qodef-st-loader .two_rotating_circles .dot1',
			'.qodef-st-loader .two_rotating_circles .dot2',
			'.qodef-st-loader .five_rotating_circles .container1>div',
			'.qodef-st-loader .five_rotating_circles .container2>div',
			'.qodef-st-loader .five_rotating_circles .container3>div',
			'.qodef-st-loader .lines .line1',
			'.qodef-st-loader .lines .line2',
			'.qodef-st-loader .lines .line3',
			'.qodef-st-loader .lines .line4',
			'#submit_comment',
			'.post-password-form input[type=submit]',
			'input.wpcf7-form-control.wpcf7-submit',
			'.qodef-header-vertical .qodef-vertical-menu>ul>li>a:before',
			'.qodef-header-vertical .qodef-vertical-menu>ul>li>a:after',
			'.qodef-icon-shortcode.circle',
			'.qodef-icon-shortcode.square',
			'.qodef-pie-chart-doughnut-holder .qodef-pie-legend ul li .qodef-pie-color-holder',
			'.qodef-pie-chart-pie-holder .qodef-pie-legend ul li .qodef-pie-color-holder',
			'.qodef-btn.qodef-btn-outline.qodef-btn-light:hover',
			'.qodef-dropcaps.qodef-circle',
			'.qodef-dropcaps.qodef-square',
			'.qodef-st-loader .atom .ball-1:before',
			'.qodef-st-loader .atom .ball-2:before',
			'.qodef-st-loader .atom .ball-3:before',
			'.qodef-st-loader .atom .ball-4:before',
			'.qodef-st-loader .clock .ball:before',
			'.qodef-st-loader .mitosis .ball',
			'.qodef-st-loader .fussion .ball',
			'.qodef-st-loader .fussion .ball-1',
			'.qodef-st-loader .fussion .ball-2',
			'.qodef-st-loader .fussion .ball-3',
			'.qodef-st-loader .fussion .ball-4',
			'.qodef-st-loader .wave_circles .ball',
			'.qodef-st-loader .pulse_circles .ball',
			'.qodef-blog-audio-holder .mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
			'.qodef-blog-audio-holder .mejs-container .mejs-controls .mejs-time-rail .mejs-time-current'
		);

		$first_color['background_color_important'] = array(
			'.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-hover-bg):hover'
		);

		$first_color['color'] = array(
			'a',
			'p a',
			'.qodef-pagination-holder .qodef-pagination li.active span',
			'.qodef-404-page .qodef-page-not-found .qodef-number-holder',
			'.qodef-main-menu ul li a',
			'.qodef-main-menu>ul>li.qodef-active-item>a',
			'body:not(.qodef-menu-item-first-level-bg-color) .qodef-main-menu>ul>li:hover>a',
			'.qodef-mobile-header .qodef-mobile-nav a:hover',
			'.qodef-mobile-header .qodef-mobile-nav h4:hover',
			'.qodef-mobile-header .qodef-mobile-menu-opener a:hover',
			'.qodef-search-cover .qodef-search-close a:hover',
			'.qodef-event-nav .qodef-event-back-btn a',
			'.qodef-event-single-holder .qodef-event-image-buy-tickets-holder .qodef-event-details-holder div span:nth-child(2) a:hover',
			'.qodef-event-nav .qodef-event-next a:hover',
			'.qodef-event-nav .qodef-event-prev a:hover',
			'.single-album .qodef-album-tracks-holder .qodef-tracks-holder .qodef-track-holder .fa-play',
			'.single-album .qodef-album-tracks-holder .qodef-tracks-holder .qodef-track-holder.qodef-active-track span',
			'.single-album .qodef-album-tracks-holder .qodef-tracks-holder .qodef-track-holder .qodef-track-buy a',
			'.single-album .qodef-album-details-holder .qodef-album-details span:first-child',
			'.single-album .qodef-album-nav .qodef-album-back-btn a',
			'.single-album .qodef-album-nav .qodef-album-next a:hover',
			'.single-album .qodef-album-nav .qodef-album-prev a:hover',
			'.single-album .qodef-album-minimal .qodef-single-album-stores-holder .qodef-single-album-store .qodef-single-album-store-link:hover',
			'.single-album .qodef-album-compact .qodef-single-album-stores-holder .qodef-single-album-store .qodef-single-album-store-link:hover',
			'.qodef-icon-shortcode a:hover',
			'.qodef-message .qodef-message-inner a.qodef-close',
			'.qodef-ordered-list ol>li:before',
			'.qodef-unordered-list ul>li:before',
			'.qodef-icon-list-item .qodef-icon-list-icon-holder-inner i',
			'.qodef-icon-list-item .qodef-icon-list-icon-holder-inner span',
			'.qodef-accordion-holder .qodef-title-holder.ui-state-active',
			'.qodef-accordion-holder .qodef-title-holder.ui-state-active .qodef-accordion-mark',
			'.qodef-blog-list-holder.qodef-masonry .qodef-blog-list-masonry-item.qodef-blog-list-link .qodef-blog-list-item-title a:hover',
			'.qodef-blog-list-holder.qodef-masonry .qodef-blog-list-masonry-item.qodef-blog-list-link .qodef-blog-list-item-title span',
			'.qodef-blog-list-holder.qodef-masonry .qodef-blog-list-masonry-item.qodef-blog-list-quote .qodef-blog-list-item-title span',
			'.qodef-btn.qodef-btn-solid.qodef-btn-light',
			'blockquote:before',
			'.qodef-dropcaps',
			'.qodef-social-share-holder.qodef-list li a:hover',
			'.qodef-album-track-list a',
			'.qodef-album-track-list .qodef-album-track',
			'.qodef-artist-view-single .qodef-atrist-single .qodef-number',
			'.qodef-artist-view-single .qodef-controls .qodef-control-button-next',
			'.qodef-artist-view-single .qodef-controls .qodef-control-button-prev',
			'.qodef-artist-view-single .qodef-control-button-back',
			'.qodef-anchor-menu-outer .qodef-anchor.current',
			'.qodef-sidebar .widget ul li>a:hover',
			'.qodef-sidebar .widget ul:not(.qodef-blog-list) a',
			'.qodef-sidebar .widget.widget_categories ul li',
			'.qodef-sidebar .widget .tagcloud a',
			'.qodef-sidebar .widget .recentcomments:hover a',
			'.qodef-sidebar .widget.widget_archive li:hover',
			'.qodef-sidebar .widget.widget_calendar #next a',
			'.qodef-sidebar .widget.widget_calendar #prev a',
			'.qodef-blog-holder article .qodef-post-info-bottom .qodef-social-share-holder.qodef-list li a:hover',
			'.qodef-blog-holder article.format-link .qodef-post-content .qodef-post-text .qodef-post-text-inner .qodef-post-title a:hover',
			'.qodef-blog-holder article.format-link .qodef-post-content .qodef-post-text .qodef-post-text-inner .qodef-post-title span',
			'.qodef-blog-holder article.format-link .qodef-post-content .qodef-post-text .qodef-post-text-inner .qodef-tweet a:hover',
			'.qodef-blog-holder article.format-link .qodef-post-content .qodef-post-text .qodef-post-text-inner .qodef-tweet span',
			'.qodef-blog-holder article.format-quote .qodef-post-content .qodef-post-text .qodef-post-text-inner .qodef-post-title a:hover',
			'.qodef-blog-holder article.format-quote .qodef-post-content .qodef-post-text .qodef-post-text-inner .qodef-post-title span',
			'.qodef-blog-holder article.format-quote .qodef-post-content .qodef-post-text .qodef-post-text-inner .qodef-tweet a:hover',
			'.qodef-blog-holder article.format-quote .qodef-post-content .qodef-post-text .qodef-post-text-inner .qodef-tweet span',
			'.qodef-blog-holder article.qodef-post-format-twitter .qodef-post-content a .qodef-tweet:hover',
			'.qodef-filter-blog-holder li.qodef-active',
			'.qodef-blog-single article .qodef-post-info-bottom .qodef-post-info-bottom-left a:hover',
			'.qodef-blog-single article .qodef-post-info-category a:hover'
		);

		$first_color['color_important'] = array(
			'.qodef-light-header .qodef-top-bar .widget a:hover',
			'.qodef-light-header .qodef-top-bar .widget span.qodef-icon-element:hover',
			'.qodef-top-bar-light .qodef-top-bar .widget a:hover',
			'.qodef-top-bar-light .qodef-top-bar .widget span.qodef-icon-element:hover',
			'.qodef-dark-header .qodef-top-bar .widget a:hover',
			'.qodef-dark-header .qodef-top-bar .widget span.qodef-icon-element:hover',
			'.qodef-top-bar-dark .qodef-top-bar .widget a:hover',
			'.qodef-top-bar-dark .qodef-top-bar .widget span.qodef-icon-element:hover',
			'.qodef-item-showcase .qodef-item .qodef-item-icon:hover i',

		);

		$first_color['border'] = array(
			'.qodef-st-loader .pulse_circles .ball',
			'#submit_comment',
			'.post-password-form input[type=submit]',
			'input.wpcf7-form-control.wpcf7-submit',
			'.qodef-btn.qodef-btn-outline.qodef-btn-light:hover',
			'.qodef-tabs.qodef-horizontal-tab .qodef-tabs-nav li.ui-state-active a',
			'.qodef-tabs.qodef-horizontal-tab .qodef-tabs-nav li.ui-state-hover a',
			'.qodef-tabs.qodef-vertical-tab .qodef-tabs-nav li.ui-state-active a',
			'.qodef-tabs.qodef-vertical-tab .qodef-tabs-nav li.ui-state-hover a',
			'.qodef-sidebar .widget .qodef-search-wrapper input[type=text]:focus'
		);

		$first_color['border_important'] = array(
			'.qodef-btn.qodef-btn-outline:not(.qodef-btn-custom-border-hover):hover'
		);

		return $first_color;

	}

}


if(!function_exists('mixtape_qodef_add_prefix_to_first_color_selectors')) {

	function mixtape_qodef_add_prefix_to_first_color_selectors($value) {

		$prefix = mixtape_qodef_get_unique_page_class();

		return $value = $prefix . ' '. $value;
	}
}
