<?php  if ( mixtape_qodef_options()->getOptionValue( 'event_pagination' ) == 'yes' ) : ?>

	<div class="qodef-event-nav qodef-grid-section">
		<div class="qodef-event-nav-inner qodef-section-inner">
			<?php if ( get_previous_post() !== '' ) : ?>
				<div class="qodef-event-prev">
					<?php previous_post_link( '%link', esc_html__( '', 'mixtapewp' ) ); ?>
				</div>
			<?php endif; ?>

			<?php if ( $back_to_link !== '' ) : ?>
				<div class="qodef-event-back-btn">
					<a href="<?php echo esc_url($back_to_link); ?>">
						<?php esc_html_e( '', 'mixtapewp' ); ?>
					</a>
				</div>
			<?php endif; ?>

			<?php if ( get_next_post() !== '' ) : ?>
				<div class="qodef-event-next">
					<?php next_post_link( '%link', esc_html__( '', 'mixtapewp' )); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php endif; ?>