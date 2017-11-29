<?php

if(!function_exists('mixtape_qodef_map_blog_meta_fields')) {

    function mixtape_qodef_map_blog_meta_fields() {

        $qodef_blog_categories = array();
        $categories = get_categories();
        foreach($categories as $category) {
            $qodef_blog_categories[$category->term_id] = $category->name;
        }

        $blog_meta_box = mixtape_qodef_add_meta_box(
            array(
                'scope' => array('page'),
                'title' => esc_html__('Blog', 'mixtapewp'),
                'name' => 'blog_meta'
            )
        );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_blog_category_meta',
                    'type'        => 'selectblank',
                    'label'       => esc_html__('Blog Category', 'mixtapewp'),
                    'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'mixtapewp'),
                    'parent'      => $blog_meta_box,
                    'options'     => $qodef_blog_categories
                )
            );

            mixtape_qodef_add_meta_box_field(
                array(
                    'name'        => 'qodef_show_posts_per_page_meta',
                    'type'        => 'text',
                    'label'       => esc_html__('Number of Posts', 'mixtapewp'),
                    'description' => esc_html__('Enter the number of posts to display', 'mixtapewp'),
                    'parent'      => $blog_meta_box,
                    'options'     => $qodef_blog_categories,
                    'args'        => array("col_width" => 3)
                )
            );
	
    }

    add_action('mixtape_qodef_meta_boxes_map', 'mixtape_qodef_map_blog_meta_fields');
}

