<li class="qodef-blog-list-item clearfix">
	<div class="qodef-blog-list-item-inner">
		<div class="qodef-item-image clearfix">
			<a href="<?php echo esc_url(get_permalink()) ?>">
				<?php
					echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
				?>				
			</a>
		</div>
		<div class="qodef-item-text-holder">
			<<?php echo esc_html( $title_tag)?> class="qodef-item-title ">
				<a href="<?php echo esc_url(get_permalink()) ?>" >
					<?php echo esc_attr(get_the_title()) ?>
				</a>
			</<?php echo esc_html($title_tag) ?>>
			<div class="qodef-item-info-section">
				<?php mixtape_qodef_post_info(array(
					'date' => 'yes'
				)) ?>
			</div>
		</div>
	</div>	
</li>
