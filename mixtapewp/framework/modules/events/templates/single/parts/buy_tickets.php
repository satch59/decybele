<?php 
  if($tickets_status == 'available'){
                        
    $button_params = array( 
      'text'         => esc_html__( 'buy tickets','mixtapewp' ),
      'custom_class' => 'qodef-event-buy-tickets-button',
      'link'         => $link,
      'target'       => $target,
      'type'         => 'solid'
    );

    echo mixtape_qodef_execute_shortcode('qodef_button', $button_params);
    }
?>