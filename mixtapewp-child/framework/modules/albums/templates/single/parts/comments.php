<?php  if(mixtape_qodef_options()->getOptionValue( 'album_comments' ) == 'yes') : ?>
    <?php comments_template('', true); ?>
<?php endif;  ?>
