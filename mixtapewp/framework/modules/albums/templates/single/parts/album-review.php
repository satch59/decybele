<?php
$reviews = get_post_meta(get_the_ID(), 'qodef_review_text', true);
$reviews_authors = get_post_meta(get_the_ID(), 'qodef_review_author', true);
$i = 0;
?>
<?php if(is_array($reviews) && count($reviews) > 0 && implode($reviews) !== ''): ?>
	<div class="qodef-single-album-reviews-holder">
		<h3 class="qodef-single-album-reviews-title"><?php esc_html_e('Album Reviews', 'mixtapewp'); ?></h3>
		<div class="qodef-single-album-reviews">
			<?php
				foreach($reviews as $review) : ?>
				<div class="qodef-single-album-review">
				<p class="qodef-single-album-text"><?php echo esc_html($review); ?></p>
					<?php if(isset($reviews_authors[$i]) && $reviews_authors[$i]): ?>
						<span class="qodef-single-album-author"><?php echo esc_attr($reviews_authors[$i]); ?></span>
					<?php endif; ?>

				</div>
				<?php
					$i++;
					endforeach;
				?>
		</div>
	</div>
<?php endif; ?>