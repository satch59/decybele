<?php get_header(); ?>

	<div class="qodef-container">
		<?php do_action('mixtape_qodef_after_container_open'); ?>
		<div class="qodef-container-inner qodef-404-page clearfix">
			<?php do_action('mixtape_qodef_after_container_inner_open'); ?>

            <div class="qodef-section qodef-parallax-section-holder  qodef-full-screen-height-parallax qodef-vertical-middle-align qodef-content-aligment-left">
                <div class="qodef-parallax-content-outer">
                    <div class="qodef-page-not-found">
                        <span class="qodef-number-holder">
                            <?php if(mixtape_qodef_options()->getOptionValue('404_title')){
                                echo esc_html(mixtape_qodef_options()->getOptionValue('404_title'));
                            }
                            else{
                                esc_html_e('404', 'mixtapewp');
                            } ?>
                        </span>
                        <h1>
                            <?php if(mixtape_qodef_options()->getOptionValue('404_title')){
                                echo esc_html(mixtape_qodef_options()->getOptionValue('404_title'));
                            }
                            else{
                                esc_html_e('Page not found', 'mixtapewp');
                            } ?>
                        </h1>
                        <p class="qodef-404-page-text">
                            <?php if(mixtape_qodef_options()->getOptionValue('404_text')){
                                echo esc_html(mixtape_qodef_options()->getOptionValue('404_text'));
                            }
                            else{
                                esc_html_e('The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'mixtapewp');
                            } ?>
                        </p>
                        <?php
						$mixtape_qodef_params = array();
						if (mixtape_qodef_options()->getOptionValue('404_back_to_home')){
							$mixtape_qodef_params['text'] = mixtape_qodef_options()->getOptionValue('404_back_to_home');
						}
						else{
							$mixtape_qodef_params['text'] = esc_html__('homepage','mixtapewp');
						}
						$mixtape_qodef_params['link'] = esc_url(home_url('/'));
						$mixtape_qodef_params['target'] = '_self';
						$mixtape_qodef_params['type'] = 'solid';
						echo mixtape_qodef_execute_shortcode('qodef_button',$mixtape_qodef_params);

                        ?>
                    </div>
                </div>
            </div>
		</div>
        <div class="qodef-image-404">
            <img src="<?php echo QODE_ASSETS_ROOT ;?>/img/404.jpg" alt="404_background_image" />
        </div>
		<?php do_action('mixtape_qodef_before_container_close'); ?>
	</div>
<?php get_footer(); ?>