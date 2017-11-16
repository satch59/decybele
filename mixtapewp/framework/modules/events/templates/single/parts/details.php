<?php 
$event_types   = wp_get_post_terms(get_the_ID(), 'event-type');
$event_types_names = array();
if (($date != '') || ($time != '') || ($location != '') || ($website != '') || ($organized_by != '') || (is_array($event_types) && count($event_types))): ?>
<div class="qodef-event-item qodef-event-info qodef-event-details-holder">
    <h3 class='qodef-event-section-title'><?php esc_html_e('Details', 'mixtapewp'); ?></h3>
    <div class="qodef-event-item qodef-event-info-content qodef-event-details">
        <?php if (($date != '') || ($time != '')): ?>
   		<div class="qodef-event-item qodef-event-details-time">
            <span><?php esc_html_e('Time:', 'mixtapewp') ?></span>
            <span><?php print date_i18n( 'F d, Y' , strtotime( $date ) ).' '.$time ?></span>
        </div>
        <?php endif; ?>
        <?php if ($location != ''): ?>
        <div class="qodef-event-item qodef-event-details-location">
            <span><?php esc_html_e('Location:', 'mixtapewp') ?></span>
            <span><?php echo esc_attr($location); ?></span>
        </div>
        <?php endif; ?>
        <?php if ($website != ''): ?>
        <div class="qodef-event-item qodef-event-details-website">
            <span><?php esc_html_e('Website:', 'mixtapewp') ?></span>
            <span><a href="<?php echo esc_url($website); ?>" target = '_blank'><?php echo esc_url($website); ?></a></span>
        </div>
        <?php endif; ?>
        <?php
            if(is_array($event_types) && count($event_types)) : ?>
        <div class="qodef-event-item qodef-event-details-event-type">
            <span><?php esc_html_e('Event Type:', 'mixtapewp') ?></span>
            <span><?php
                        foreach($event_types as $event_type) {
                            $event_types_names[] = $event_type->name;
                        }
                        echo esc_html(implode(', ', $event_types_names)); 
                ?>
            </span>
        </div>
        <?php endif; ?>
        <?php if ($organized_by != ''): ?>
        <div class="qodef-event-item qodef-event-details-organized-by">
            <span><?php esc_html_e('Organized By:', 'mixtapewp') ?></span>
            <span><?php echo esc_attr($organized_by); ?></span>
        </div>
        <?php endif; ?>
	</div>
</div>

<?php endif; ?>