<?php

/*** Post Options ***/

$post_meta_box = mixtape_qodef_add_meta_box(
    array(
        'scope' => array('post'),
        'title' => esc_html__('Post', 'mixtapewp'),
        'name'  => 'post-meta'
    )
);

$all_pages = array(
    '' => 'Default'
);

$pages = get_pages();
foreach($pages as $page) {
    $all_pages[$page->ID] = $page->post_title;
}

mixtape_qodef_add_meta_box_field(array(
    'name'          => 'qodef_blog_masonry_gallery_dimensions',
    'type'          => 'select',
    'label'         => esc_html__('Dimensions for Metro list', 'mixtapewp'),
    'description'   => esc_html__('Choose image layout when it appears in Metro list', 'mixtapewp'),
    'parent'        => $post_meta_box,
    'options'       => array(
        'square'             => esc_html__('Square', 'mixtapewp'),
        'large-width'        => esc_html__('Large width', 'mixtapewp'),
        'large-height'       => esc_html__('Large height', 'mixtapewp'),
        'large-width-height' => esc_html__('Large width/height', 'mixtapewp')
    ),
    'default_value' => 'square'
));
