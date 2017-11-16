<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<div class="qodef-post-image">
		<a href="<?php echo esc_html(get_post_meta(get_the_ID(), "qodef_post_link_link_meta", true)); ?>"
		   title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail($image_size); ?>
		</a>
	</div>
	<div class="qodef-date-title">
		<?php mixtape_qodef_post_info(array('date' => 'yes')) ?>
		<h4 class="qodef-post-title">
			<a href="<?php echo esc_html(get_post_meta(get_the_ID(), "qodef_post_link_link_meta", true)); ?>"
			   title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h4>
	</div>

	<span class="qodef-post-mark">
		<a href="<?php echo esc_html(get_post_meta(get_the_ID(), "qodef_post_link_link_meta", true)); ?>"
		   title="<?php the_title_attribute(); ?>">
			<?php echo mixtape_qodef_icon_collections()->renderIcon('fa-unlink', 'font_awesome'); ?>
		</a>
	</span>
</article>