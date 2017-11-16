<?php if($query_result->max_num_pages>1){ ?>
	<div class="qodef-blog-list-paging">
		<span class="qodef-blog-list-load-more">
			<?php 
				echo mixtape_qodef_get_button_html(array(
					'link' => 'javascript: void(0)',
					'text' => esc_html__('Show more', 'mixtapewp'),
					'button_skin' => $load_more_skin
				));
			?>
		</span>
		<div class="qodef-stripes">
			<div class="qodef-rect1"></div>
			<div class="qodef-rect2"></div>
			<div class="qodef-rect3"></div>
			<div class="qodef-rect4"></div>
			<div class="qodef-rect5"></div>
		</div>
	</div>
<?php }