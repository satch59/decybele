<?php
	$tracks = get_post_meta(get_the_ID(), 'qodef_track_file', true);
	$titles = get_post_meta(get_the_ID(), 'qodef_track_title', true);
	$buy_links = get_post_meta(get_the_ID(), 'qodef_track_buy_link', true);
	$free_download = get_post_meta(get_the_ID(), 'qodef_track_free_download', true);
	$i = 0;
?>
<h3 class="qodef-tracks-holder-title"><?php esc_html_e('Tracklist', 'mixtapewp'); ?></h3>
<div class="qodef-tracks-holder">
<?php
if(!empty($tracks)) {
	foreach ($tracks as $track) : ?>
        <div class="qodef-track-holder qodef-unique-track-<?php echo esc_attr(get_the_ID()); ?>-<?php echo esc_attr(mixtape_qodef_get_attachment_id_from_url($track)); ?>">
			<?php if (isset($titles[$i]) && $titles[$i] != ''): ?>
                <span class="qodef-track-title" data-track-index="<?php echo esc_attr($i); ?>">
				<span class="qodef-track-number">
					<?php echo esc_attr($i + 1) . '. ' ?>
				</span>
				<i class="fa fa-play" aria-hidden="true"></i>
					<?php echo esc_attr($titles[$i]) ?></span>
			<?php endif; ?>
			<?php if ((isset($buy_links[$i]) && $buy_links[$i] != '') && (isset($free_download[$i]) && $free_download[$i] != 'yes')) : ?>
                <span class="qodef-track-buy"><a
                            href="<?php echo esc_url($buy_links[$i]) ?>"><?php esc_html_e('buy track', 'mixtapewp'); ?></a></span>
			<?php elseif (isset($free_download[$i]) && $free_download[$i] == 'yes') : ?>
                <span class="qodef-track-buy"><a href="<?php echo esc_url($tracks[$i]) ?>"
                                                 download><?php esc_html_e('download', 'mixtapewp'); ?></a></span>
			<?php endif; ?>
        </div>
    <?php $i++; endforeach;
} ?>
</div>