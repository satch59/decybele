<?php if (get_the_content() != ''): ?>
<div class="qodef-event-item qodef-event-info qodef-event-content-holder">
    <h3 class='qodef-event-section-title'><?php esc_html_e('About Tour', 'mixtapewp'); ?></h3>
    <div class="qodef-event-item qodef-event-info-content qodef-event-single-content">
   		<?php the_content(); ?>
	</div>
</div>
<?php endif; ?>