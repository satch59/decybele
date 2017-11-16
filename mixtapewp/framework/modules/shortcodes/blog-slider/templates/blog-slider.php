<div class="qodef-blog-carousel-item qodef-type-slider">
    <?php if(has_post_thumbnail()) { ?>
		<div class="qodef-blog-slide-image">
			<a href="<?php the_permalink(); ?>">
				<?php
					if ($image_size_slider != 'custom') {
						the_post_thumbnail($image_size_slider);
					} else {
						print mixtape_qodef_generate_thumbnail(get_post_thumbnail_id(get_the_ID()), null, $image_width, $image_height);
					}
				?>
			</a>
		</div>
	<?php } ?>
    <div class="qodef-blog-slide-info-holder clearfix">
        <h2 class="qodef-blog-slide-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
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