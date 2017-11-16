<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="qodef-post-content">
		<?php if(get_post_meta(get_the_ID(), "qodef_audio_post_type_meta", true) == 'self' && get_post_meta(get_the_ID(), "qodef_post_audio_link_meta", true) !== ""){
				mixtape_qodef_get_module_template_part('templates/lists/parts/image', 'blog', '', $params);
			 	mixtape_qodef_get_module_template_part('templates/parts/audio', 'blog');
			 	?>
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
				<?php mixtape_qodef_get_module_template_part('templates/lists/parts/title', 'blog', '', array('title_tag' => $title_tag)); ?>
				<div class="qodef-post-info-part clearfix">
					<?php mixtape_qodef_post_info(array('date' => 'yes')) ?>
				</div>
				<?php  if ($type == 'standard-whole-post') {
					the_content();
				}
				else{
					mixtape_qodef_excerpt($excerpt_length);
				}
				?>
				<?php mixtape_qodef_get_module_template_part('templates/lists/parts/pages-navigation', 'blog');  ?>
			</div>
		</div>
		<?php
			} elseif(get_post_meta(get_the_ID(), "qodef_audio_post_type_meta", true) == 'soundcloud' && get_post_meta(get_the_ID(), "qodef_post_audio_soundcloud_link_meta", true) !== ""){
			 	mixtape_qodef_get_module_template_part('templates/parts/soundcloud', 'blog');
			} ?>
	</div>
</article>