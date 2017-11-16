<?php $params_social = mixtape_qodef_generate_instagram_twitter_params('twitter'); ?>

<div class="qodef-blog-list-item-text-holder" <?php mixtape_qodef_inline_style($bg_color); ?>>
<div class="qodef-blog-list-item-mark qodef-link-mark">
<span class="social_twitter"></span>
</div>
	<div class="qodef-ql-content">
		<p class="qodef-blog-list-item-twitter-user" <?php mixtape_qodef_inline_style($post_info_color); ?>>&commat;<?php print $params_social['twitter_author']; ?></p>
		<h3 class="qodef-blog-list-twitter-content" <?php mixtape_qodef_inline_style($text_color); ?>><?php print $params_social['twitter_text']; ?></h3>
		<div class="qodef-blog-list-twitter-excerpt"><?php print $excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?></div>
		<div class="qodef-blog-list-item-info-section" <?php mixtape_qodef_inline_style($post_info_color); ?>>
			<?php print $params_social['twitter_time']; ?>
		</div>
	</div>
</div>