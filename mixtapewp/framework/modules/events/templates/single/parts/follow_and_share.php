<?php if(mixtape_qodef_options()->getOptionValue('enable_social_share') == 'yes'
        && mixtape_qodef_options()->getOptionValue('enable_social_share_on_event') == 'yes') : ?>
<div class="qodef-event-item qodef-event-info qodef-event-follow-share-holder">
    <h3 class='qodef-event-section-title'><?php esc_html_e('Follow and Share', 'mixtapewp'); ?></h3>
    <div class="qodef-event-item qodef-event-info-content qodef-event-folow-share">
     	<?php echo mixtape_qodef_get_social_share_html() ?>
    </div>
</div>
<?php endif; ?>


