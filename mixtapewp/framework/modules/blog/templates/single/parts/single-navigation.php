<?php if(mixtape_qodef_options()->getOptionValue('blog_single_navigation') == 'yes'){ ?>
	<?php $navigation_blog_through_category = mixtape_qodef_options()->getOptionValue('blog_navigation_through_same_category') ?>
	<div class="qodef-container qodef-container-bottom-navigation">
		<div class="qodef-container-inner">
			<div class="qodef-blog-single-navigation">
				<div class="qodef-blog-single-navigation-inner">
					<?php if(get_previous_post() != ""){ ?>
						<div class="qodef-blog-single-prev">
							<?php
							if($navigation_blog_through_category == 'yes'){
								previous_post_link('%link',esc_html__( 'Prev', 'mixtapewp' ), true,'','category');
							} else {
								previous_post_link('%link',esc_html__( 'Prev', 'mixtapewp' ));
							}
							?>
						</div> <!-- close div.blog_prev -->
					<?php } ?>
					<?php if(get_next_post() != ""){ ?>
						<div class="qodef-blog-single-next">
							<?php
							if($navigation_blog_through_category == 'yes'){
								next_post_link('%link',esc_html__( 'Next', 'mixtapewp' ), true,'','category');
							} else {
								next_post_link('%link',esc_html__( 'Next', 'mixtapewp' ));
							}
							?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>