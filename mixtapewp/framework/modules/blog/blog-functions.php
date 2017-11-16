<?php
if( !function_exists('mixtape_qodef_get_blog') ) {
	/**
	 * Function which return holder for all blog lists
	 *
	 * @return holder.php template
	 */
	function mixtape_qodef_get_blog($type) {

		$sidebar = mixtape_qodef_sidebar_layout();

		$params = array(
			"blog_type" => $type,
			"sidebar" => $sidebar
		);
		mixtape_qodef_get_module_template_part('templates/lists/holder', 'blog', '', $params);
	}

}

if( !function_exists('mixtape_qodef_get_blog_type') ) {

	/**
	 * Function which create query for blog lists
	 *
	 * @return blog list template
	 */

	function mixtape_qodef_get_blog_type($type) {
		$blog_query = mixtape_qodef_get_blog_query();

		$paged = mixtape_qodef_paged();
		$blog_classes = '';

		if(mixtape_qodef_options()->getOptionValue('blog_page_range') != ""){
			$blog_page_range = esc_attr(mixtape_qodef_options()->getOptionValue('blog_page_range'));
		} else{
			$blog_page_range = $blog_query->max_num_pages;
		}
		$show_load_more = mixtape_qodef_enable_load_more();

		if($show_load_more){
			$blog_classes .= ' qodef-blog-load-more';
		}

		$params = array(
			'blog_query' => $blog_query,
			'paged' => $paged,
			'blog_page_range' => $blog_page_range,
			'blog_type' => $type,
			'blog_classes' => $blog_classes
		);

		mixtape_qodef_get_module_template_part('templates/lists/' .  $type, 'blog', '', $params);
	}

}

if(!function_exists('mixtape_qodef_get_blog_query')){
	/**
	* Function which create query for blog lists
	*
	* @return wp query object
	*/
	function mixtape_qodef_get_blog_query(){
		global $wp_query;

		$id = mixtape_qodef_get_page_id();
		$category = esc_attr(get_post_meta($id, "qodef_blog_category_meta", true));
		if(esc_attr(get_post_meta($id, "qodef_show_posts_per_page_meta", true)) != ""){
			$post_number = esc_attr(get_post_meta($id, "qodef_show_posts_per_page_meta", true));
		}else{
			$post_number = esc_attr(get_option('posts_per_page'));
		}

		$paged = mixtape_qodef_paged();
		$query_array = array(
			'post_type' => 'post',
			'paged' => $paged,
			'cat' 	=> $category,
			'posts_per_page' => $post_number
		);
		if(is_archive()){
			$blog_query = $wp_query;
		}else{
			$blog_query = new WP_Query($query_array);
		}
		return $blog_query;

	}
}


if(!function_exists('mixtape_qodef_get_post_format')){
	/**
	 * Function which return post format of post
	 *
	 * @return string
	 */
	function mixtape_qodef_get_post_format($type){

		$post_format = get_post_format();

		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');


		if( in_array($post_format, $supported_post_formats) ) {
			if($post_format == 'link') {
				$post_format = mixtape_qodef_check_link_post_format_type();
			}
		} elseif($post_format == 'audio' && get_post_meta(get_the_ID(), "qodef_audio_post_type_meta", true) == 'soundcloud' && get_post_meta(get_the_ID(), "qodef_post_audio_soundcloud_link_meta", true) !== "") {
				$post_format = 'soundcloud';
		} else {
			$post_format = 'standard';
		}

		return $post_format;
	}
}

if(!function_exists('mixtape_qodef_check_link_post_format_type')){
	/**
	 * Function which check link type
	 *
	 * @return string
	 */
	function mixtape_qodef_check_link_post_format_type(){

		$type = 'link';

		if ( mixtape_qodef_get_tweeter_post()){
			$type = 'twitter';
		} if (mixtape_qodef_get_instagram_post()){
			$type = 'instagram';
		}

		return $type;
	}
}

if(!function_exists('mixtape_qodef_get_instagram_post')){
	/**
	 * Function which get instagram post data
	 *
	 * @return array
	 */
	function mixtape_qodef_get_instagram_post(){

		if($post = get_post_meta(get_the_ID(), "qodef_post_link_instagram_data_meta", true)){
			return $post;
		}

		return false;

	}
}

if(!function_exists('mixtape_qodef_get_tweeter_post')){
	/**
	 * Function which get tweeter post data
	 *
	 * @return array
	 */
	function mixtape_qodef_get_tweeter_post(){

		if($post = get_post_meta(get_the_ID(), "qodef_post_link_twitter_data_meta", true)){
			return $post;
		}

		return false;
	}
}


if( !function_exists('mixtape_qodef_get_post_format_html') ) {

	/**
	 * Function which return html for post formats
	 * @param $type
	 * @return post hormat template
	 */

	function mixtape_qodef_get_post_format_html($type = "", $ajax = '') {
		$id = get_the_ID();
		$post_format = mixtape_qodef_get_post_format($type);

		$slug = '';
		if($type !== ""){
			$slug = $type;
		}

		$params = array();
		$params['type'] = $type;
		$params['title_tag'] = 'h3';
		$params['quote_title_tag'] = 'h3';
		$params['share'] = 'yes';
		$params['author'] = 'yes';
		$params['soundcloud'] = false;
		$params['image_size'] =  'full';

		if($post_format == 'audio' && get_post_meta($id, 'qodef_audio_post_type_meta', true) == 'soundcloud' && get_post_meta($id, 'qodef_post_audio_soundcloud_link_meta', true) !== "") {
			$params['soundcloud'] = true;
		}

		$params['image'] = mixtape_qodef_post_format_image($id, $post_format);

		$chars_array = mixtape_qodef_blog_lists_number_of_chars();
		if(isset($chars_array[$type])) {
			$params['excerpt_length'] = $chars_array[$type];
		} else {
			$params['excerpt_length'] = '';
		}

		if($post_format == 'twitter') {
			$twitter_params = mixtape_qodef_get_tweeter_post();

			$params['twitter_text'] = $twitter_params['text'];
			$params['twitter_author'] = $twitter_params['author'];
			$params['twitter_time'] = $twitter_params['time'];
		}

		if($post_format == 'instagram') {
			$instagram_params = mixtape_qodef_get_instagram_post();
			$params['instagram_thumbnail_url'] = $instagram_params['thumbnail_url'];
			$params['instagram_thumbnail_width'] = $instagram_params['thumbnail_width'];
			$params['instagram_thumbnail_height'] = $instagram_params['thumbnail_height'];
		}

		if($type == 'masonry' || $type == 'masonry-full-width'){
			$params['title_tag'] = 'h4';
			$params['quote_title_tag'] = 'div';
			$params ['share'] = 'no';
			$slug = 'masonry';
		}
		if($type == 'standard'){
			$params ['author'] = 'no';
		}

		if($type == 'masonry-gallery') {
			$size = 'square';
			if (get_post_meta(get_the_ID(), 'qodef_blog_masonry_gallery_dimensions', true) !== '') {
				$size = get_post_meta(get_the_ID(), 'qodef_blog_masonry_gallery_dimensions', true);
				$params['post_class'] = 'qodef-post-size-'. $size;
			}
			$params['post_class'] = 'qodef-post-size-'. $size;
			$params['image_size'] =  mixtape_qodef_get_masonry_gallery_image_size($size);
			$params['title_tag'] = 'h4';

			if(in_array($post_format,array('audio'))) {
				$post_format = 'standard';
			}

		}
		
		if($ajax == ''){
			mixtape_qodef_get_module_template_part('templates/lists/post-formats/' . $post_format, 'blog', $slug, $params);
		}
		if($ajax == 'yes'){
			return mixtape_qodef_get_blog_module_template_part('templates/lists/post-formats/' . $post_format, $slug, $params);
		}
	}

}

if( !function_exists('mixtape_qodef_get_masonry_gallery_image_size') ) {
	/**
	 * Function which return post image size for masonry gallery
	 *
     * @param $size
	 * @return string
	 */

	function mixtape_qodef_get_masonry_gallery_image_size($size) {

		$image_size = 'mixtape_qodef_square';

		switch($size):

			case 'large-width':
				$image_size = 'mixtape_qodef_large_width';
				break;
			case 'large-height':
				$image_size = 'mixtape_qodef_large_height';
				break;
			case 'large-width-height':
				$image_size = 'mixtape_qodef_large_width_height';
				break;
		endswitch;

		return $image_size;
	}

}

if( !function_exists('mixtape_qodef_get_default_blog_list') ) {
	/**
	 * Function which return default blog list for archive post types
	 *
	 * @return post format template
	 */

	function mixtape_qodef_get_default_blog_list() {

		$blog_list = mixtape_qodef_options()->getOptionValue('blog_list_type');
		return $blog_list;

	}

}


if (!function_exists('mixtape_qodef_pagination')) {

	/**
	 * Function which return pagination
	 *
	 * @return blog list pagination html
	 */

	function mixtape_qodef_pagination($pages = '', $range = 4, $paged = 1){

		$showitems = $range+1;

		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages){
				$pages = 1;
			}
		}

		$show_load_more = mixtape_qodef_enable_load_more();
		$masonry_template = mixtape_qodef_is_masonry_template();

		$search_template = 'no';
		if(is_search()){
			$search_template = 'yes';
		}


		if($pages != 1){
			if($show_load_more == 'yes'  && $search_template !== 'yes' && !$masonry_template){
				$params = array(
					'text' => esc_html__('Load More', 'mixtapewp')
				);
				echo '<div class="qodef-load-more-ajax-pagination">';
				echo mixtape_qodef_get_button_html($params);
				echo '</div>';
			}else{
				echo '<div class="qodef-pagination-holder">';
				echo '<div class="qodef-pagination">';
				echo '<ul>';
					if($paged > 2 && $paged > $range+1 && $showitems < $pages){
						echo '<li class="qodef-pagination-first-page"><a href="'.esc_url(get_pagenum_link(1)).'"><span class="qodef-icon-linear-icon lnr lnr-chevron-left"></span></a></li>';
					}
					echo '<li class="qodef-pagination-prev';
					if($paged > 2 && $paged > $range+1 && $showitems < $pages) {
						echo ' qodef-pagination-prev-first';
					}
					echo '"><a href="'.esc_url(get_pagenum_link($paged - 1)).'"><span class="qodef-icon-linear-icon lnr lnr-chevron-left"></span></a></li>';

					for ($i=1; $i <= $pages; $i++){
						if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
							echo ($paged == $i)? "<li class='active'><span>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
						}
					}

					echo '<li class="qodef-pagination-next';
					if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
						echo ' qodef-pagination-next-last';
					}
					echo '"><a href="';
					if($pages > $paged){
						echo esc_url(get_pagenum_link($paged + 1));
					} else {
						echo esc_url(get_pagenum_link($paged));
					}
					echo '"><span class="qodef-icon-linear-icon lnr lnr-chevron-right"></span></a></li>';
					if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
						echo '<li class="qodef-pagination-last-page"><a href="'.esc_url(get_pagenum_link($pages)).'"><span class="qodef-icon-linear-icon lnr lnr-chevron-right"></span></a></li>';
					}
				echo '</ul>';
				echo "</div>";
				echo "</div>";
			}
		}
	}
}

if(!function_exists('mixtape_qodef_post_info')){
	/**
	 * Function that loads parts of blog post info section
	 * Possible options are:
	 * 1. date
	 * 2. category
	 * 3. author
	 * 4. comments
	 * 5. like
	 * 6. share
	 *
	 * @param $config array of sections to load
	 */
	function mixtape_qodef_post_info($config){
		$default_config = array(
			'date' => '',
			'category' => '',
			'author' => '',
			'comments' => '',
			'like' => '',
			'share' => '',
			'tag' => ''
		);

		extract(shortcode_atts($default_config, $config));

		if($author == 'yes'){
			mixtape_qodef_get_module_template_part('templates/parts/post-info-author', 'blog');
		}
        if($date == 'yes'){
            mixtape_qodef_get_module_template_part('templates/parts/post-info-date', 'blog');
        }
        if($category == 'yes'){
            mixtape_qodef_get_module_template_part('templates/parts/post-info-category', 'blog');
        }
		if($comments == 'yes'){
			mixtape_qodef_get_module_template_part('templates/parts/post-info-comments', 'blog');
		}
		if($like == 'yes'){
			mixtape_qodef_get_module_template_part('templates/parts/post-info-like', 'blog');
		}
		if($share == 'yes'){
			mixtape_qodef_get_module_template_part('templates/parts/post-info-share', 'blog');
		}
		if($tag == 'yes') {
			mixtape_qodef_get_module_template_part('templates/parts/post-info-tag', 'blog');
		}
	}
}

if(!function_exists('mixtape_qodef_excerpt')) {
	/**
	 * Function that cuts post excerpt to the number of word based on previosly set global
	 * variable $word_count, which is defined in qodef_set_blog_word_count function.
	 *
	 * It current post has read more tag set it will return content of the post, else it will return post excerpt
	 *
	 */
	function mixtape_qodef_excerpt($excerpt_length = '') {
		global $post;

		if(post_password_required()) {
			echo get_the_password_form();
		}

		//does current post has read more tag set?
		elseif(mixtape_qodef_post_has_read_more()) {
			global $more;

			//override global $more variable so this can be used in blog templates
			$more = 0;
			the_content(true);
		}

		//is word count set to something different that 0?
		elseif($excerpt_length != '0') {
			//if word count is set and different than empty take that value, else that general option from theme options
			$word_count = '45';
			if(isset($excerpt_length) && $excerpt_length != ""){
				$word_count = $excerpt_length;

			} elseif(mixtape_qodef_options()->getOptionValue('number_of_chars') != '') {
				$word_count = esc_attr(mixtape_qodef_options()->getOptionValue('number_of_chars'));
			}
			//if post excerpt field is filled take that as post excerpt, else that content of the post
			$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content);

			//remove leading dots if those exists
			$clean_excerpt = strlen($post_excerpt) && strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

			//if clean excerpt has text left
			if($clean_excerpt !== '') {
				//explode current excerpt to words
				$excerpt_word_array = explode (' ', $clean_excerpt);

				//cut down that array based on the number of the words option
				$excerpt_word_array = array_slice ($excerpt_word_array, 0, $word_count);

				//add exerpt postfix
				$excert_postfix		= apply_filters('mixtape_qodef_excerpt_postfix', '...');

				//and finally implode words together
				$excerpt 			= implode (' ', $excerpt_word_array).$excert_postfix;

				//is excerpt different than empty string?
				if($excerpt !== '') {
					echo '<p class="qodef-post-excerpt">'.wp_kses_post($excerpt).'</p>';
				}
			}
		}
	}
}

if(!function_exists('mixtape_qodef_get_blog_single')) {

	/**
	 * Function which return holder for single posts
	 *
	 * @return single holder.php template
	 */

	function mixtape_qodef_get_blog_single() {
		$sidebar = mixtape_qodef_sidebar_layout();

		$params = array(
			"sidebar" => $sidebar
		);

		mixtape_qodef_get_module_template_part('templates/single/holder', 'blog', '', $params);
	}
}

if( !function_exists('mixtape_qodef_get_single_html') ) {

	/**
	 * Function return all parts on single.php page
	 *
	 *
	 * @return single.php html
	 */

	function mixtape_qodef_get_single_html() {
		$id = get_the_ID();
		$post_format = mixtape_qodef_get_post_format('');
		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery', 'twitter', 'instagram');

		if(in_array($post_format,$supported_post_formats)) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		$soundcloud = false;
		if($post_format == 'audio' && get_post_meta($id, "qodef_audio_post_type_meta", true) == 'soundcloud' && get_post_meta($id, "qodef_post_audio_soundcloud_link_meta", true) !== "") {
			$soundcloud = true;
		}

		$params = array();
		if( $post_format === 'link' || $post_format === 'quote' ) {
			$image = get_post_meta($id, "qodef_post_{$post_format}_image_meta", true);
			$params['image'] = 'background-image: url('. QODE_ASSETS_ROOT . '/img/' . esc_attr($post_format) . '-mark.png)';

			if( ! empty($image_meta) ) {
				$params['image'] = 'background-image: url(' . esc_url($image) . ')';
			}
		}

		//Related posts
		$related_posts_params = array();
		$show_related = (mixtape_qodef_options()->getOptionValue('blog_single_related_posts') == 'yes') ? true : false;
		if ($show_related) {
			$hasSidebar = mixtape_qodef_sidebar_layout();
			$post_id = get_the_ID();
			$related_post_number = ($hasSidebar == '' || $hasSidebar == 'default' || $hasSidebar == 'no-sidebar') ? 4 : 3;
			$related_posts_options = array(
				'posts_per_page' => $related_post_number
			);
			$related_posts_params = array(
				'related_posts' => mixtape_qodef_get_related_post_type($post_id, $related_posts_options)
			);
		}

		mixtape_qodef_get_module_template_part('templates/single/post-formats/' . $post_format, 'blog', '', $params);
		mixtape_qodef_get_module_template_part('templates/single/parts/author-info', 'blog', '', $params);
		if ($show_related) {
			mixtape_qodef_get_module_template_part('templates/single/parts/related-posts', 'blog', '', $related_posts_params);
		}
		comments_template('', true);
	}

}

if( !function_exists('mixtape_qodef_container_additional_post_items') ) {

	/**
	 * Function which return parts on single.php which are just below content
	 *
	 * @return single.php html
	 */

	function mixtape_qodef_container_single_additional_post_items() {
		if(is_singular('post')) {
			return mixtape_qodef_get_module_template_part('templates/single/parts/single-navigation', 'blog');
		}
	}
	add_action('mixtape_qodef_after_container_close', 'mixtape_qodef_container_single_additional_post_items');
}

if( !function_exists('mixtape_qodef_container_additional_post_items') ) {

	/**
	 * Function which return parts on single.php which are just below content
	 *
	 * @return single.php html
	 */

	function mixtape_qodef_container_additional_post_items() {

		$query = mixtape_qodef_get_blog_query();
		if(get_page_template_slug(mixtape_qodef_get_page_id()) == 'blog-standard.php' || ((is_home() || (is_archive() && !mixtape_qodef_is_woocommerce_page())) && mixtape_qodef_options()->getOptionValue('blog_list_type') == 'standard')) {
			if (mixtape_qodef_options()->getOptionValue('pagination') == 'yes' && $query->max_num_pages != 1) { ?>
                <?php mixtape_qodef_pagination($query->max_num_pages, mixtape_qodef_get_blog_page_range($query), mixtape_qodef_paged()); ?>
			<?php }
		}
		if(get_page_template_slug(mixtape_qodef_get_page_id()) == 'blog-masonry.php' || ((is_home() || (is_archive() && !mixtape_qodef_is_woocommerce_page())) && mixtape_qodef_options()->getOptionValue('blog_list_type') == 'masonry')) {
			$pagination_type = mixtape_qodef_options()->getOptionValue('masonry_pagination');
			if (mixtape_qodef_options()->getOptionValue('pagination') == 'yes'  && $query->max_num_pages != 1 && ($pagination_type != 'load-more' && $pagination_type != 'infinite-scroll')) {
				mixtape_qodef_pagination($query->max_num_pages, mixtape_qodef_get_blog_page_range($query), mixtape_qodef_paged());
			}
		}
	}
	add_action('mixtape_qodef_before_blog_list_column_close', 'mixtape_qodef_container_additional_post_items');
}



if( !function_exists('mixtape_qodef_full_width_additional_post_items') ) {

	/**
	 * Function which return parts on single.php which are just below content
	 *
	 * @return single.php html
	 */

	function mixtape_qodef_full_width_additional_post_items() {

		$query = mixtape_qodef_get_blog_query();

		if(get_page_template_slug(mixtape_qodef_get_page_id()) == 'blog-masonry-full-width.php'|| get_page_template_slug(mixtape_qodef_get_page_id()) == 'blog-masonry-gallery.php' ||
            ((is_home() || is_archive()) && (mixtape_qodef_options()->getOptionValue('blog_list_type') == 'masonry-full-width' && mixtape_qodef_options()->getOptionValue('blog_list_type') == 'masonry-gallery'))) {
			$pagination_type = mixtape_qodef_options()->getOptionValue('masonry_pagination');
			if (mixtape_qodef_options()->getOptionValue('pagination') == 'yes' && $query->max_num_pages != 1 && ($pagination_type != 'load-more' && $pagination_type != 'infinite-scroll')) { ?>
                <?php mixtape_qodef_pagination($query->max_num_pages, mixtape_qodef_get_blog_page_range($query), mixtape_qodef_paged()); ?>
			<?php }
		}
	}
	add_action('mixtape_qodef_before_blog_list_column_close', 'mixtape_qodef_full_width_additional_post_items');
}


if (!function_exists('mixtape_qodef_comment')) {

	/**
	 * Function which modify default wordpress comments
	 *
	 * @return comments html
	 */

	function mixtape_qodef_comment($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment;

		global $post;

		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment  = $post->post_author == $comment->user_id;

		$comment_class = 'qodef-comment clearfix';

		if($is_author_comment) {
			$comment_class .= ' qodef-post-author-comment';
		}

		if($is_pingback_comment) {
			$comment_class .= ' qodef-pingback-comment';
		}

		?>

		<li <?php comment_class(); ?>>
		<div class="<?php echo esc_attr($comment_class); ?>">
			<?php if(!$is_pingback_comment) { ?>
				<div class="qodef-comment-image"> <?php echo mixtape_qodef_kses_img(get_avatar($comment, 110)); ?> </div>
			<?php } ?>
			<div class="qodef-comment-text">
				<div class="qodef-comment-info">
					<h4 class="qodef-comment-name">
						<?php if($is_pingback_comment) { esc_html_e('Pingback:', 'mixtapewp'); } ?>
						<?php echo wp_kses_post(get_comment_author_link()); ?>
					</h4>
					<span class="qodef-reply-edit-holder">
						<?php
						edit_comment_link();
						comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) );
						?>
					</span>
					<span class="qodef-comment-date"><?php comment_time(get_option('date_format')); ?> <?php comment_time(get_option('time_format')); ?></span>
				</div>
			<?php if(!$is_pingback_comment) { ?>
				<div class="qodef-text-holder" id="comment-<?php echo comment_ID(); ?>">
					<?php comment_text(); ?>
				</div>
			<?php } ?>
		</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements ?>

		<?php
	}
}

if( !function_exists('mixtape_qodef_blog_archive_pages_classes') ) {

	/**
	 * Function which create classes for container in archive pages
	 *
	 * @return array
	 */

	function mixtape_qodef_blog_archive_pages_classes($blog_type) {

		$classes = array();
		if(in_array($blog_type, mixtape_qodef_blog_full_width_types())){
			$classes['holder'] = 'qodef-full-width';
			$classes['inner'] = 'qodef-full-width-inner';
		} elseif(in_array($blog_type, mixtape_qodef_blog_grid_types())){
			$classes['holder'] = 'qodef-container';
			$classes['inner'] = 'qodef-container-inner clearfix';
		}

		return $classes;

	}

}

if( !function_exists('mixtape_qodef_blog_full_width_types') ) {

	/**
	 * Function which return all full width blog types
	 *
	 * @return array
	 */

	function mixtape_qodef_blog_full_width_types() {

		$types = array('masonry-full-width');

		return $types;

	}

}

if( !function_exists('mixtape_qodef_blog_grid_types') ) {

	/**
	 * Function which return in grid blog types
	 *
	 * @return array
	 */

	function mixtape_qodef_blog_grid_types() {

		$types = array('standard', 'masonry', 'split-column', 'standard-whole-post');

		return $types;

	}

}

if( !function_exists('mixtape_qodef_blog_types') ) {

	/**
	 * Function which return all blog types
	 *
	 * @return array
	 */

	function mixtape_qodef_blog_types() {

		$types = array_merge(mixtape_qodef_blog_grid_types(), mixtape_qodef_blog_full_width_types());

		return $types;

	}

}

if( !function_exists('mixtape_qodef_blog_templates') ) {

	/**
	 * Function which return all blog templates names
	 *
	 * @return array
	 */

	function mixtape_qodef_blog_templates() {

		$templates = array();
		$grid_templates = mixtape_qodef_blog_grid_types();
		$full_templates = mixtape_qodef_blog_full_width_types();
		foreach($grid_templates as $grid_template){
			array_push($templates, 'blog-'.$grid_template);
		}
		foreach($full_templates as $full_template){
			array_push($templates, 'blog-'.$full_template);
		}

		return $templates;

	}

}

if( !function_exists('mixtape_qodef_blog_lists_number_of_chars') ) {

	/**
	 * Function that return number of characters for different lists based on options
	 *
	 * @return int
	 */

	function mixtape_qodef_blog_lists_number_of_chars() {

		$number_of_chars = array();

		if(mixtape_qodef_options()->getOptionValue('standard_number_of_chars')) {
			$number_of_chars['standard'] = mixtape_qodef_options()->getOptionValue('standard_number_of_chars');
		}
		if(mixtape_qodef_options()->getOptionValue('masonry_number_of_chars')) {
			$number_of_chars['masonry'] = mixtape_qodef_options()->getOptionValue('masonry_number_of_chars');
		}
		if(mixtape_qodef_options()->getOptionValue('split_column_number_of_chars')){
			$number_of_chars['split-column'] = mixtape_qodef_options()->getOptionValue('split_column_number_of_chars');
		}

		return $number_of_chars;

	}

}

if (!function_exists('mixtape_qodef_excerpt_length')) {
	/**
	 * Function that changes excerpt length based on theme options
	 * @param $length int original value
	 * @return int changed value
	 */
	function mixtape_qodef_excerpt_length( $length ) {

		if(mixtape_qodef_options()->getOptionValue('number_of_chars') !== ''){
			return esc_attr(mixtape_qodef_options()->getOptionValue('number_of_chars'));
		} else {
			return 45;
		}
	}

	add_filter( 'excerpt_length', 'mixtape_qodef_excerpt_length', 999 );
}

if (!function_exists('mixtape_qodef_excerpt_more')) {
	/**
	 * Function that adds three dotes on the end excerpt
	 * @param $more
	 * @return string
	 */
	function mixtape_qodef_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'mixtape_qodef_excerpt_more');
}

if(!function_exists('mixtape_qodef_post_has_read_more')) {
	/**
	 * Function that checks if current post has read more tag set
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function mixtape_qodef_post_has_read_more() {
		global $post;

		return strpos($post->post_content, '<!--more-->');
	}
}

if(!function_exists('mixtape_qodef_post_has_title')) {
	/**
	 * Function that checks if current post has title or not
	 * @return bool
	 */
	function mixtape_qodef_post_has_title() {
		return get_the_title() !== '';
	}
}

if (!function_exists('mixtape_qodef_modify_read_more_link')) {
	/**
	 * Function that modifies read more link output.
	 * Hooks to the_content_more_link
	 * @return string modified output
	 */
	function mixtape_qodef_modify_read_more_link() {
		$link = '<div class="qodef-more-link-container">';

		if(mixtape_qodef_core_installed()) {
			$link .= mixtape_qodef_get_button_html(array(
				'link' => get_permalink() . '#more-' . get_the_ID(),
				'text' => esc_html__('Continue reading', 'mixtapewp')
			));
		} else {
			$link .= '<a class="qodef-btn qodef-btn-medium qodef-btn-solid" href="' . get_permalink() . '#more-' . get_the_ID() . '">'. esc_html__('Continue reading', 'mixtapewp') .'</a>';
		}
		$link .= '</div>';

		return $link;
	}

	add_filter( 'the_content_more_link', 'mixtape_qodef_modify_read_more_link');
}

if(!function_exists('mixtape_qodef_read_more_button')) {
	/**
	 * Function that outputs read more button html if necessary.
	 * It checks if read more button should be outputted only if option for given template is enabled and post does'nt have read more tag
	 * and if post isn't password protected
	 *
	 * @param string $option name of option to check
	 * @param string $class additional class to add to button
	 *
	 */
	function mixtape_qodef_read_more_button($option = '', $class = '') {
		if($option != '') {
			$show_read_more_button = mixtape_qodef_options()->getOptionValue($option) == 'yes';
		}else {
			$show_read_more_button = 'yes';
		}
		if($show_read_more_button && !mixtape_qodef_post_has_read_more() && !post_password_required()) {
			echo mixtape_qodef_get_button_html(array(
				'size'         => '',
				'link'         => get_the_permalink(),
				'text'         => esc_html__('Read More', 'mixtapewp'),
				'custom_class' => $class,
				'type' 		   => 'outline'
			));
		}
	}
}

if(!function_exists('mixtape_qodef_set_blog_holder_data_params')){
	/**
	 * Function which set data params on blog holder div
	 */
	function mixtape_qodef_set_blog_holder_data_params(){

		$show_load_more = mixtape_qodef_enable_load_more();
		if($show_load_more){
			$current_query = mixtape_qodef_get_blog_query();

			$data_params = array();
			$data_return_string = '';

			$paged = mixtape_qodef_paged();

			$posts_number =  '';
			if(get_post_meta(get_the_ID(), "qodef_show_posts_per_page_meta", true) != ""){
				$posts_number = get_post_meta(get_the_ID(), "qodef_show_posts_per_page_meta", true);
			}else{
				$posts_number = get_option('posts_per_page');
			}
			$category = get_post_meta(mixtape_qodef_get_page_id(), 'qodef_blog_category_meta', true);


			//set data params
			$data_params['data-next-page'] = $paged+1;
			$data_params['data-max-pages'] =  $current_query->max_num_pages;

			if($posts_number !=''){
				$data_params['data-post-number'] = $posts_number;
			}

			if($category !=''){
				$data_params['data-category'] = $category;
			}
			if(is_archive()){
				if(is_category()){
					$cat_id = get_queried_object_id();
					$data_params['data-archive-category'] = $cat_id;
				}
				if(is_author()){
					$author_id = get_queried_object_id();
					$data_params['data-archive-author'] = $author_id;
 				}
				if(is_tag()){
					$current_tag_id = get_queried_object_id();
					$data_params['data-archive-tag'] = $current_tag_id;
				}
				if(is_date()){
					$day  = get_query_var('day');
					$month = get_query_var('monthnum');
					$year = get_query_var('year');

					$data_params['data-archive-day'] = $day;
					$data_params['data-archive-month'] = $month;
					$data_params['data-archive-year'] = $year;
				}
			}
			if(is_search()){
				$search_query = get_search_query();
				$data_params['data-archive-search-string'] = $search_query; // to do, not finished
			}

			foreach($data_params as $key => $value) {
				if($key !== '') {
					$data_return_string .= $key.'= '.esc_attr($value).' ';
				}
			}

			return $data_return_string;

		}
	}
}

if(!function_exists('mixtape_qodef_enable_load_more')){
	/**
	 * Function that check if load more is enabled
	 *
	 * return boolean
	 */
	function mixtape_qodef_enable_load_more(){
		$enable_load_more = false;

		if(mixtape_qodef_options()->getOptionValue('enable_load_more_pag') == 'yes'){
			$enable_load_more = true;
		}
		return $enable_load_more;
	}
}
if(!function_exists('mixtape_qodef_is_masonry_template')){
	/**
     * Check if is masonry template enabled
     * return boolean
     */
	function mixtape_qodef_is_masonry_template(){

			$page_id = mixtape_qodef_get_page_id();
			$page_template = get_page_template_slug($page_id);
			$page_options_template = mixtape_qodef_options()->getOptionValue('blog_list_type');

			if(!is_archive()){
				if($page_template == 'blog-masonry.php' ||  $page_template =='blog-masonry-full-width.php'){
					return true;
				}
			}elseif(is_archive() || is_home()){
				if($page_options_template == 'masonry' || $page_options_template == 'masonry-full-width'){
					return true;
				}
			}
			else{
				return false;
			}
	}


}

if(!function_exists('mixtape_qodef_set_ajax_url')){
	/**
     * load themes ajax functionality
     *
     */
	function mixtape_qodef_set_ajax_url() {
		echo '<script type="application/javascript">var QodefAjaxUrl = "'.admin_url('admin-ajax.php').'"</script>';
	}
	add_action('wp_enqueue_scripts', 'mixtape_qodef_set_ajax_url');

}

/**
	 * Loads more function for blog posts.
	 *
	 */
if(!function_exists('mixtape_qodef_blog_load_more')){

	function mixtape_qodef_blog_load_more(){

		$return_obj = array();
		$paged = $post_number = $category = $blog_type = '';
		$archive_category = $archive_author = $archive_tag = $archive_day = $archive_month = $archive_year = '';
	
		if (!empty($_POST['nextPage'])) {
	        $paged = $_POST['nextPage'];
	    }
		if (!empty($_POST['number'])) {
	        $post_number = $_POST['number'];
	    }
		if (!empty($_POST['category'])) {
	        $category = $_POST['category'];
	    }
		if (!empty($_POST['blogType'])) {
	        $blog_type = $_POST['blogType'];
	    }
		if (!empty($_POST['archiveCategory'])) {
	        $archive_category = $_POST['archiveCategory'];
	    }
		if (!empty($_POST['archiveAuthor'])) {
	        $archive_author = $_POST['archiveAuthor'];
	    }
		if (!empty($_POST['archiveTag'])) {
	        $archive_tag = $_POST['archiveTag'];
	    }
		if (!empty($_POST['archiveDay'])) {
	        $archive_day = $_POST['archiveDay'];
	    }
		if (!empty($_POST['archiveMonth'])) {
	        $archive_month = $_POST['archiveMonth'];
	    }
		if (!empty($_POST['archiveYear'])) {
	        $archive_year = $_POST['archiveYear'];
	    }
	
	
		$html = '';
		$query_array = array(
			'post_type' => 'post',
			'paged' => $paged,
			'posts_per_page' => $post_number
		);
		if($category != ''){
			$query_array['cat'] = $category;
		}
		if($archive_category != ''){
			$query_array['cat'] = $archive_category;
		}
		if($archive_author != ''){
			$query_array['author'] = $archive_author;
		}
		if($archive_tag != ''){
			$query_array['tag'] = $archive_tag;
		}
		if($archive_day !='' && $archive_month != '' && $archive_year !=''){
			$query_array['day'] = $archive_day;
			$query_array['monthnum'] = $archive_month;
			$query_array['year'] = $archive_year;
		}
		$query_results = new \WP_Query($query_array);
	
		if($query_results->have_posts()):
			while ( $query_results->have_posts() ) : $query_results->the_post();
				$html .=  mixtape_qodef_get_post_format_html($blog_type, 'yes');
			endwhile;
			else:
				$html .= '<p>'. esc_html__('Sorry, no posts matched your criteria.', 'mixtapewp') .'</p>';
			endif;
	
		$return_obj = array(
			'html' => $html,
		);
	
		echo json_encode($return_obj); exit;
	}
}
add_action('wp_ajax_nopriv_mixtape_qodef_blog_load_more', 'mixtape_qodef_blog_load_more');
add_action( 'wp_ajax_mixtape_qodef_blog_load_more', 'mixtape_qodef_blog_load_more' );

if(!function_exists('mixtape_qodef_get_user_custom_fields')) {
	/**
	 * Function returns links and icons for author social networks
	 *
	 * return array
	 */
	function mixtape_qodef_get_user_custom_fields() {

		$user_social_array    = array();
		$social_network_array = array(
			'facebook',
			'twitter',
			'linkedin',
			'instagram',
			'pinterest',
			'tumblr',
			'googleplus'
		);

		foreach($social_network_array as $network) {
			if(get_the_author_meta($network) !== '') {
				$$network                    = array(
					'link'  => get_the_author_meta($network),
					'class' => 'social_'.$network.' qodef-author-social-'.$network.' qodef-author-social-icon'
				);
				$user_social_array[$network] = $$network;
			}
		}

		return $user_social_array;
	}
}

if(!function_exists('mixtape_qodef_get_max_number_of_pages')) {
    /**
     * Function that return max number of posts/pages for pagination
     * @return int
     *
     * @version 0.1
     */
    function mixtape_qodef_get_max_number_of_pages() {
        global $wp_query;

        $max_number_of_pages = 10; //default value

        if($wp_query) {
            $max_number_of_pages = $wp_query->max_num_pages;
        }

        return $max_number_of_pages;
    }
}

if(!function_exists('mixtape_qodef_get_blog_page_range')) {
    /**
     * Function that return current page for blog list pagination
     * @return int
     *
     * @version 0.1
     */
    function mixtape_qodef_get_blog_page_range($query = '') {
        global $wp_query;

		if($query == ''){
			$query = $wp_query;
		}

        if(mixtape_qodef_options()->getOptionValue('blog_page_range') != ""){
            $blog_page_range = esc_attr(mixtape_qodef_options()->getOptionValue('blog_page_range'));
        } else{
            $blog_page_range = $query->max_num_pages;
        }
        return $blog_page_range;
    }
}

if ( ! function_exists('mixtape_qodef_comment_form_submit_button')) {
    /**
     * Override comment form submit button
     *
     * @return mixed|string
     */
    function mixtape_qodef_comment_form_submit_button() {

		if(mixtape_qodef_core_installed()) {
			$comment_form_button = mixtape_qodef_get_button_html(array(
				'html_type'		=> 'input',
				'type'			=> 'solid',
				'input_name'	=> 'submit',
				'text'			=> esc_html__('Submit', 'mixtapewp')
			));
		} else {
			$comment_form_button = '<input type="submit" name="submit" class="qodef-btn qodef-btn-medium qodef-btn-solid" />';
		}

        return $comment_form_button;
    }

    add_filter('comment_form_submit_button', 'mixtape_qodef_comment_form_submit_button');

}

if ( ! function_exists('mixtape_qodef_generate_instagram_twitter_params')) {
	/**
	 * Generate Instagram and Twitter Params
	 *
	 * @param $post_format
	 * @return array
	 *
	 */

	function mixtape_qodef_generate_instagram_twitter_params($post_format){
		$post_format = mixtape_qodef_get_post_format('');
		$params = array();
		if($post_format == 'twitter') {
			$twitter_params = mixtape_qodef_get_tweeter_post();
			$params['twitter_text'] = $twitter_params['text'];
			$params['twitter_author'] = $twitter_params['author'];
			$params['twitter_time'] = $twitter_params['time'];
		}
		if($post_format == 'instagram') {
			$instagram_params = mixtape_qodef_get_instagram_post();
			$params['instagram_thumbnail_url'] = $instagram_params['thumbnail_url'];
			$params['instagram_thumbnail_width'] = $instagram_params['thumbnail_width'];
			$params['instagram_thumbnail_height'] = $instagram_params['thumbnail_height'];
			if(isset($instagram_params['title'])){
				$params['instagram_title'] = $instagram_params['title'];
			}
		}

		return $params;
	}
}

/**
 * Loads more function for blog list.
 *
 */
if(!function_exists('mixtape_qodef_blog_list_ajax_load_more')){

	function mixtape_qodef_blog_list_ajax_load_more(){
		$return_obj = array();
		$shortcode_params = array();
		$id = get_the_ID();
		$post_format = get_post_format();

		if (!empty($_POST['orderBy'])) {
			$shortcode_params['order_by'] = $_POST['orderBy'];
		}
		if (!empty($_POST['order'])) {
			$shortcode_params['order'] = $_POST['order'];
		}
		if (!empty($_POST['number'])) {
			$shortcode_params['number_of_posts'] = $_POST['number'];
		}
		if (!empty($_POST['showLoadMore'])) {
			$shortcode_params['show_load_more'] = $_POST['showLoadMore'];
		}
		if (!empty($_POST['loadMoreSkin'])) {
			$shortcode_params['load_more_skin'] = $_POST['loadMoreSkin'];
		}
		if (!empty($_POST['nextPage'])) {
			$shortcode_params['next_page'] = $_POST['nextPage'];
		}
		if (!empty($_POST['titleTag'])) {
			$shortcode_params['title_tag'] = $_POST['titleTag'];
		}
		if (!empty($_POST['boxShadow'])) {
			$shortcode_params['box_shadow'] = $_POST['boxShadow'];
		}
		if (!empty($_POST['textColor'])) {
			$shortcode_params['text_color'] = 'color:' . $_POST['textColor'];
		}
		if (!empty($_POST['titleColor'])) {
			$shortcode_params['title_color'] = 'color:' . $_POST['titleColor'];
		}
		if (!empty($_POST['postInfoColor'])) {
			$shortcode_params['post_info_color'] = 'color:' . $_POST['postInfoColor'];
		}
		if (!empty($_POST['bgrColor'])) {
			$shortcode_params['bg_color'] = 'background-color:' . $_POST['bgrColor'];
		}
		if (!empty($_POST['textLength'])) {
			$shortcode_params['text_length'] = $_POST['textLength'];
		}
		if (!empty($_POST['imageSize'])) {
			$shortcode_params['image_size'] = $_POST['imageSize'];
		}
		if (!empty($_POST['category'])) {
			$shortcode_params['category'] = $_POST['category'];
		}

		$html = '';

		$blog_list = new \MixtapeQode\Modules\Shortcodes\BlogList\BlogList();

		$query_array = $blog_list->generateBlogQueryArray($shortcode_params);
		$query_results = new \WP_Query($query_array);

		if($query_results->have_posts()):
			while ( $query_results->have_posts() ) : $query_results->the_post();

				$html .= mixtape_qodef_get_shortcode_module_template_part('templates/'.$_POST['blType'], 'blog-list', '', $shortcode_params);

			endwhile;
		else:
			$html .='<p>' . esc_html__( 'No posts were found.', 'mixtapewp' ) . '</p>';
		endif;

		$return_obj = array(
			'html' => $html,
		);


		echo json_encode($return_obj); exit;
	}
}

add_action('wp_ajax_nopriv_mixtape_qodef_blog_list_ajax_load_more', 'mixtape_qodef_blog_list_ajax_load_more');
add_action( 'wp_ajax_mixtape_qodef_blog_list_ajax_load_more', 'mixtape_qodef_blog_list_ajax_load_more' );

/**
 * Get's the link and quote post format bg image
 *
 */
if(!function_exists('mixtape_qodef_post_format_image')) {

	function mixtape_qodef_post_format_image($id, $post_format) {
		$params = '';

		if ( $post_format === 'link' || $post_format === 'quote' ) {
			$image = get_post_meta( $id, 'qodef_post_' . $post_format . '_image_meta', true );

			$params['image'] = 'background-image: url(' . QODE_ASSETS_ROOT . '/img/' . esc_attr( $post_format ) . '-mark.png)';

			if ( ! empty( $image ) ) {
				$params['image'] = 'background-image: url(' . esc_url( $image ) . ')';
			}
		}

		return $params;
	}
}

?>