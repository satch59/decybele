<?php
    $artists   = wp_get_post_terms(get_the_ID(), 'album-artist');
    $art_names = array();

    if(is_array($artists) && count($artists)) :
        foreach($artists as $artist) {
            $art_names[] = $artist->name;
        }

?>
	    <div class="qodef-album-details qodef-album-artists">
	        <span><?php 
                if (count($artists) > 1) { 
                    esc_html_e('Artists:', 'mixtapewp');
                } else {
                    esc_html_e('Artist:', 'mixtapewp');
                } ?>
            </span>
	        <span>
                <?php echo esc_html(implode(', ', $art_names)); ?>
            </span>
	    </div>
    <?php endif; ?>