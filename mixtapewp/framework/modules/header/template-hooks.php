<?php

//top header bar
add_action('mixtape_qodef_before_page_header', 'mixtape_qodef_get_header_top');

//mobile header
add_action('mixtape_qodef_after_page_header', 'mixtape_qodef_get_mobile_header');