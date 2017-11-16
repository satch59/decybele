<?php

get_header();
mixtape_qodef_get_title();
get_template_part('slider');
mixtape_qodef_single_album();
do_action('mixtape_qodef_after_container_close');
get_footer();

?>