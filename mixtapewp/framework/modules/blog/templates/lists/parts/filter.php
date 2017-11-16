<?php
$filter = esc_attr(mixtape_qodef_options()->getOptionValue('masonry_filter'));

if($filter == 'yes'){
	$page_category = get_post_meta(mixtape_qodef_get_page_id(), "qodef_blog_category_meta", true);
	if(is_category()){
		$page_category = get_query_var( 'cat' );
	}
	if ($page_category == "" && !is_category()) {
		$args = array(
			'parent' => 0
		);
		$categories = get_categories( $args );
	} else {
		$args = array(
			'parent' => $page_category
		);
		$categories = get_categories( $args );
	}
	if (count($categories) > 0) {	?>
		<div class="qodef-filter-blog-holder">
			<div class="qodef-filter-blog">
				<ul>
					<li class="qodef-filter qodef-active" data-filter="*"><span><?php esc_html_e('All', 'mixtapewp'); ?></span></li>
					<?php foreach ($categories as $category) { ?>
						<li class="qodef-filter" data-filter="<?php echo ".category-" . esc_attr($category->slug); ?>"><span><?php echo esc_html($category->name); ?></span></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	<?php }
}
?>
