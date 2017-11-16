<div class="qodef-blog-carousel-item">
	<?php if($show_image != 'no' && has_post_thumbnail()) { ?>
		<div class="qodef-blog-slide-image">
				<a href="<?php the_permalink(); ?>">
					<?php
                        the_post_thumbnail($image_size);
                    ?>
				</a>
		</div>
	<?php } ?>
	<div class="qodef-blog-slide-info-holder clearfix">
		<h4 class="qodef-blog-slide-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h4>
		<div class="qodef-blog-slide-post-info">
			<?php mixtape_qodef_post_info(array('author' => 'yes', 'category' => 'yes', 'date' => 'yes')) ?>
		</div>
		<?php if ($text_length != '0') {
			$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
			<p class="qodef-blog-slide-excerpt"><?php echo esc_html($excerpt)?>...</p>
		<?php } ?>
		<a href="<?php the_permalink(); ?>" class="qodef-blog-slide-read-more"><?php esc_html_e('Read More', 'mixtapewp'); ?></a>
	</div>
</div>