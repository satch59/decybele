<?php

if ( ! function_exists('mixtape_qodef_blog_options_map') ) {

	function mixtape_qodef_blog_options_map() {

		mixtape_qodef_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog', 'mixtapewp'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = mixtape_qodef_get_custom_sidebars();

		$panel_blog_lists = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists', 'mixtapewp')
			)
		);

		mixtape_qodef_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages', 'mixtapewp'),
			'description' => esc_html__('Choose a default blog layout', 'mixtapewp'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'standard'				=> esc_html__('Blog: Standard', 'mixtapewp'),
				'masonry' 				=> esc_html__('Blog: Masonry', 'mixtapewp'),
				'masonry-gallery' 		=> esc_html__('Blog: Masonry Gallery', 'mixtapewp'),
				'masonry-full-width' 	=> esc_html__('Blog: Masonry Full Width', 'mixtapewp'),
				'standard-whole-post' 	=> esc_html__('Blog: Standard Whole Post', 'mixtapewp')
			)
		));

		mixtape_qodef_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Archive and Category Sidebar', 'mixtapewp'),
			'description' => esc_html__('Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists', 'mixtapewp'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar', 'mixtapewp'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'mixtapewp'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'mixtapewp'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'mixtapewp'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'mixtapewp'),
			)
		));


		if(count($custom_sidebars) > 0) {
			mixtape_qodef_add_admin_field(array(
				'name' => 'blog_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'mixtapewp'),
				'description' => esc_html__('Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"', 'mixtapewp'),
				'parent' => $panel_blog_lists,
				'options' => mixtape_qodef_get_custom_sidebars()
			));
		}

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'pagination',
				'default_value' => 'yes',
				'label' => esc_html__('Pagination', 'mixtapewp'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List', 'mixtapewp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_pagination_container'
				)
			)
		);

		$pagination_container = mixtape_qodef_add_admin_container(
			array(
				'name' => 'qodef_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value' => 'no',
				'parent' => $panel_blog_lists,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'parent' => $pagination_container,
				'type' => 'text',
				'name' => 'blog_page_range',
				'default_value' => '',
				'label' => esc_html__('Pagination Range limit', 'mixtapewp'),
				'description' => esc_html__('Enter a number that will limit pagination to a certain range of links', 'mixtapewp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		mixtape_qodef_add_admin_field(array(
			'name'        => 'masonry_pagination',
			'type'        => 'select',
			'label'       => esc_html__('Pagination on Masonry', 'mixtapewp'),
			'description' => esc_html__('Choose a pagination style for Masonry Blog List', 'mixtapewp'),
			'parent'      => $pagination_container,
			'options'     => array(
				'standard'			=> esc_html__('Standard', 'mixtapewp'),
				'load-more'			=> esc_html__('Load More', 'mixtapewp'),
				'infinite-scroll' 	=> esc_html__('Infinite Scroll', 'mixtapewp')
			),
			
		));
		mixtape_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'enable_load_more_pag',
				'default_value' => 'no',
				'label' => esc_html__('Load More Pagination on Other Lists', 'mixtapewp'),
				'parent' => $pagination_container,
				'description' => esc_html__('Enable Load More Pagination on other lists', 'mixtapewp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'masonry_filter',
				'default_value' => 'no',
				'label' => esc_html__('Masonry Filter', 'mixtapewp'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display category filter on Masonry and Masonry Full Width Templates', 'mixtapewp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);		
		mixtape_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Number of Words in Excerpt', 'mixtapewp'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'mixtapewp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		mixtape_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'standard_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Standard Type Number of Words in Excerpt', 'mixtapewp'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'mixtapewp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		mixtape_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Masonry Type Number of Words in Excerpt', 'mixtapewp'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'mixtapewp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		mixtape_qodef_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'split_column_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Split Column Type Number of Words in Excerpt', 'mixtapewp'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'mixtapewp'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = mixtape_qodef_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single', 'mixtapewp')
			)
		);


		mixtape_qodef_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'mixtapewp'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'mixtapewp'),
			'parent'      => $panel_blog_single,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar', 'mixtapewp'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'mixtapewp'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'mixtapewp'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'mixtapewp'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'mixtapewp'),
			),
			'default_value'	=> 'default'
		));


		if(count($custom_sidebars) > 0) {
			mixtape_qodef_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'mixtapewp'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'mixtapewp'),
				'parent' => $panel_blog_single,
				'options' => mixtape_qodef_get_custom_sidebars()
			));
		}

        mixtape_qodef_add_admin_field(array(
            'name'          => 'blog_single_title_in_title_area',
            'type'          => 'yesno',
            'label'         => esc_html__('Show Post Title in Title Area', 'mixtapewp'),
            'description'   => esc_html__('Enabling this option will show post title in title area on single post pages (will not take any effect on With Title Image type)', 'mixtapewp'),
            'parent'        => $panel_blog_single,
            'default_value' => 'no'
        ));

		mixtape_qodef_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'mixtapewp'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'mixtapewp'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		mixtape_qodef_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts', 'mixtapewp'),
			'description'   => esc_html__('Enabling this option will show related posts on your single post.', 'mixtapewp'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'no',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'mixtapewp'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'mixtapewp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = mixtape_qodef_add_admin_container(
			array(
				'name' => 'qodef_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category', 'mixtapewp'),
				'description' => esc_html__('Limit your navigation only through current category', 'mixtapewp'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'no',
				'label' => esc_html__('Show Author Info Box', 'mixtapewp'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages', 'mixtapewp'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#qodef_qodef_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = mixtape_qodef_add_admin_container(
			array(
				'name' => 'qodef_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		mixtape_qodef_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email', 'mixtapewp'),
				'description' => esc_html__('Enabling this option will show author email', 'mixtapewp'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'mixtape_qodef_options_map', 'mixtape_qodef_blog_options_map', 11);

}











