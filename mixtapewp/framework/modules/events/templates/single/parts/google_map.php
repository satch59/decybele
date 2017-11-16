<?php
    $args = array(
		'address1' => $location,
    	'pin' => $pin,
    	'custom_map_style' => 'false',
    	'map_height' => '480',
    	'scroll_wheel' => 'false',
        'zoom'  => '16',
        'location_map' => 'yes'
    );

    if ($location != ''): 
?>
<div class="qodef-event-item qodef-event-info qodef-event-map-holder">
    <div class="qodef-event-item qodef-event-info-content qodef-event-map">
    	<?php echo mixtape_qodef_get_google_map_html($args); ?>
    </div>
</div>

<?php endif; ?>
