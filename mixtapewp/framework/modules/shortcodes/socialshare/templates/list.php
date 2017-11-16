<div class="qodef-social-share-holder qodef-list">
	<span class="qodef-social-share-title"><?php esc_html_e('Share:', 'mixtapewp'); ?></span>
	<ul>
		<?php foreach ($networks as $net) {
			print $net;
		} ?>
	</ul>
</div>