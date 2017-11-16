<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<?php mixtape_qodef_get_module_template_part('templates/lists/parts/image', 'blog', '', array('image_size' => $image_size)); ?>
	<div class="qodef-date-title">
		<?php mixtape_qodef_post_info(array('date' => 'yes')) ?>
		<?php mixtape_qodef_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => $title_tag)); ?>
	</div>
	<?php
	$_video_type = get_post_meta(get_the_ID(), "qodef_video_type_meta", true);
	$_video_link_meta =  get_post_meta(get_the_ID(), "qodef_post_video_id_meta", true);
	$_video_link = $_video_link_meta !== '' ? $_video_link_meta : '#';

	if ($_video_type == "youtube") {
		$_video_link = 'https://www.youtube.com/watch?v=' . $_video_link_meta;
	} elseif ($_video_type == "vimeo") {
		$_video_link = 'https://www.vimeo.com/' . $_video_link_meta;
	} elseif ($_video_type == "self") {
		$_video_link = get_post_meta(get_the_ID(), "qodef_post_video_mp4_link_meta", true) . '?iframe=true&width50%&height=50%';
	}
	?>
	<a class="qodef-video-post-link" href="<?php echo esc_html($_video_link); ?>"
	   data-rel="prettyPhoto[<?php the_ID(); ?>]">
		<?php echo mixtape_qodef_icon_collections()->renderIcon('fa-play', 'font_awesome', array('icon_attributes' => array('class' => 'qodef-vb-play-icon'))); ?>
	</a>
</article>