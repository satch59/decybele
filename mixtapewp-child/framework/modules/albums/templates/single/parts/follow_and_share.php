<?php if(mixtape_qodef_options()->getOptionValue('enable_social_share') == 'yes'
        && mixtape_qodef_options()->getOptionValue('enable_social_share_on_album') == 'yes') : ?>
<div class="qodef-album-follow-share-holder">
    <h3 class='qodef-album-follow-share-holder-title'><?php esc_html_e('Share', 'mixtapewp'); ?></h3>
    <div class="qodef-album-follow-share">
     	<?php echo mixtape_qodef_get_social_share_html() ?>
    </div>
</div>
<?php endif; ?>