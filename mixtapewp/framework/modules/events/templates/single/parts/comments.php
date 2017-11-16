<?php  if(mixtape_qodef_options()->getOptionValue( 'event_comments' ) == 'yes') : ?>
    <?php comments_template('', true); ?>
<?php endif;  ?>
