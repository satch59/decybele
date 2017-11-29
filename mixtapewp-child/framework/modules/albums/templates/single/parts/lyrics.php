<?php
	$lyrics = get_post_meta(get_the_ID(), 'qodef_track_lyrics', true);
	$titles = get_post_meta(get_the_ID(), 'qodef_track_title', true);
	$i = 0;
?>
<?php if(is_array($lyrics) && count($lyrics) > 0 && implode($lyrics) !== ''): ?>
	<div class="qodef-lyrics-holder-inner">
		<h3 class="qodef-lyrics-holder-title"><?php esc_html_e('Available Lyrics', 'mixtapewp'); ?></h3>
		<div class="qodef-accordion-holder clearfix qodef-accordion qodef-initial">
			<?php
				foreach($lyrics as $lyrics) :
					if (($lyrics !== '') && ($titles[$i] !== '')):
			?>
				<p class="clearfix qodef-title-holder">
					<span class="qodef-accordion-mark qodef-left-mark">
						<span class="qodef-accordion-mark-icon">
							<span class="fa fa-caret-up"></span>
							<span class="fa fa-caret-down"></span>
						</span>
					</span>
					<span class="qodef-tab-title">
						<span class="qodef-tab-title-inner">
							<?php echo esc_attr($titles[$i])?>
						</span>
					</span>
				</p>
				<div class="qodef-accordion-content">
					<div class="qodef-accordion-content-inner">
							<?php echo nl2br($lyrics); ?>
					</div>
				</div>
			<?php
				endif;
				$i++;
				endforeach;
			?>
		</div>
	</div>
<?php endif; ?>
