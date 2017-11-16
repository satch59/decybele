<?php do_action('mixtape_qodef_before_site_logo'); ?>

<div class="qodef-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" <?php mixtape_qodef_inline_style($logo_styles); ?>>
        <img class="qodef-normal-logo" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_html_e('logo','mixtapewp'); ?>"/>
        <?php if(!empty($logo_image_dark)){ ?><img class="qodef-dark-logo" src="<?php echo esc_url($logo_image_dark); ?>" alt="<?php esc_html_e('dark logo','mixtapewp'); ?>o"/><?php } ?>
        <?php if(!empty($logo_image_light)){ ?><img class="qodef-light-logo" src="<?php echo esc_url($logo_image_light); ?>" alt="<?php esc_html_e('light logo','mixtapewp'); ?>"/><?php } ?>
    </a>
</div>

<?php do_action('mixtape_qodef_after_site_logo'); ?>