<?php do_action('mixtape_qodef_before_mobile_logo'); ?>

<div class="qodef-mobile-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" <?php mixtape_qodef_inline_style($logo_styles); ?>>
        <img src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_html_e('mobile logo','mixtapewp'); ?>"/>
    </a>
</div>

<?php do_action('mixtape_qodef_after_mobile_logo'); ?>