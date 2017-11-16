<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see mixtape_qodef_header_meta() - hooked with 10
     * @see qodef_user_scalable - hooked with 10
     */
    ?>
	<?php do_action('mixtape_qodef_header_meta'); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class();?>>
<?php mixtape_qodef_get_side_area(); ?>

<?php
if(mixtape_qodef_options()->getOptionValue('smooth_page_transitions') == "yes") {
	$mixtape_qodef_ajax_class = 'qodef-mimic-ajax';
?>
	<div class="qodef-smooth-transition-loader <?php echo esc_attr($mixtape_qodef_ajax_class); ?>">
		<div class="qodef-st-loader">
			<div class="qodef-st-loader1">
				<?php mixtape_qodef_loading_spinners(); ?>
			</div>
		</div>
	</div>
<?php } ?>

<div class="qodef-wrapper">
    <div class="qodef-wrapper-inner">
      
        <?php mixtape_qodef_get_header(); ?>

        <?php if (mixtape_qodef_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='qodef-back-to-top'  href='#'>
                <span class="qodef-icon-stack">
                     <?php
                        mixtape_qodef_icon_collections()->getBackToTopIcon('font_elegant');
                    ?>
                </span>
            </a>
        <?php } ?>

        <?php mixtape_qodef_get_full_screen_menu(); ?>

        <div class="qodef-content" <?php mixtape_qodef_content_elem_style_attr(); ?>>
            <?php if(mixtape_qodef_is_ajax_enabled()) { ?>
            <div class="qodef-meta">
                <?php do_action('mixtape_qodef_ajax_meta'); ?>
                <span id="qodef-page-id"><?php echo esc_html(get_queried_object_id()); ?></span>
                <div class="qodef-body-classes"><?php echo esc_html(implode( ',', get_body_class())); ?></div>
            </div>
            <?php } ?>
            <div class="qodef-content-inner">