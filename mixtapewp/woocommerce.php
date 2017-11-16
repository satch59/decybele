<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php

$mixtape_qodef_id = get_option('woocommerce_shop_page_id');
$mixtape_qodef_shop = get_post($mixtape_qodef_id);
$mixtape_qodef_sidebar = mixtape_qodef_sidebar_layout();

if(get_post_meta($mixtape_qodef_id, 'qodef_page_background_color', true) != ''){
	$mixtape_qodef_background_color = 'background-color: '.esc_attr(get_post_meta($mixtape_qodef_id, 'qodef_page_background_color', true));
}else{
	$mixtape_qodef_background_color = '';
}

$mixtape_qodef_content_style = '';
if(get_post_meta($mixtape_qodef_id, 'qodef_content-top-padding', true) != '') {
	if(get_post_meta($mixtape_qodef_id, 'qodef_content-top-padding-mobile', true) == 'yes') {
		$mixtape_qodef_content_style = 'padding-top:'.esc_attr(get_post_meta($mixtape_qodef_id, 'qodef_content-top-padding', true)).'px !important';
	} else {
		$mixtape_qodef_content_style = 'padding-top:'.esc_attr(get_post_meta($mixtape_qodef_id, 'qodef_content-top-padding', true)).'px';
	}
}

if ( get_query_var('paged') ) {
	$mixtape_qodef_paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$mixtape_qodef_paged = get_query_var('page');
} else {
	$mixtape_qodef_paged = 1;
}

get_header();

mixtape_qodef_get_title();
get_template_part('slider');

$mixtape_qodef_full_width = false;

if ( mixtape_qodef_options()->getOptionValue('qodef_woo_products_list_full_width') == 'yes' && !is_singular('product') ) {
	$mixtape_qodef_full_width = true;
}

if ( $mixtape_qodef_full_width ) { ?>
	<div class="qodef-full-width" <?php mixtape_qodef_inline_style($mixtape_qodef_background_color); ?>>
<?php } else { ?>
	<div class="qodef-container" <?php mixtape_qodef_inline_style($mixtape_qodef_background_color); ?>>
<?php }
		if ( $mixtape_qodef_full_width ) { ?>
			<div class="qodef-full-width-inner" <?php mixtape_qodef_inline_style($mixtape_qodef_content_style); ?>>
		<?php } else { ?>
			<div class="qodef-container-inner clearfix" <?php mixtape_qodef_inline_style($mixtape_qodef_content_style); ?>>
		<?php }
		do_action('mixtape_qodef_after_container_inner_open');
			//Woocommerce content
			if ( ! is_singular('product') ) {

				switch( $mixtape_qodef_sidebar ) {

					case 'sidebar-33-right': ?>
						<div class="qodef-two-columns-66-33 grid2 qodef-woocommerce-with-sidebar clearfix">
							<div class="qodef-column1">
								<div class="qodef-column-inner">
									<?php mixtape_qodef_woocommerce_content(); ?>
									<?php do_action('mixtape_qodef_before_column_close'); ?>
								</div>
							</div>
							<div class="qodef-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-right': ?>
						<div class="qodef-two-columns-75-25 grid2 qodef-woocommerce-with-sidebar clearfix">
							<div class="qodef-column1 qodef-content-left-from-sidebar">
								<div class="qodef-column-inner">
									<?php mixtape_qodef_woocommerce_content(); ?>
									<?php do_action('mixtape_qodef_before_column_close'); ?>
								</div>
							</div>
							<div class="qodef-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-33-left': ?>
						<div class="qodef-two-columns-33-66 grid2 qodef-woocommerce-with-sidebar clearfix">
							<div class="qodef-column1">
								<?php get_sidebar();?>
							</div>
							<div class="qodef-column2">
								<div class="qodef-column-inner">
									<?php mixtape_qodef_woocommerce_content(); ?>
									<?php do_action('mixtape_qodef_before_column_close'); ?>
								</div>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-left': ?>
						<div class="qodef-two-columns-25-75 grid2 qodef-woocommerce-with-sidebar clearfix">
							<div class="qodef-column1">
								<?php get_sidebar();?>
							</div>
							<div class="qodef-column2 qodef-content-right-from-sidebar">
								<div class="qodef-column-inner">
									<?php mixtape_qodef_woocommerce_content(); ?>
									<?php do_action('mixtape_qodef_before_column_close'); ?>
								</div>
							</div>
						</div>
					<?php
						break;
					default:
						mixtape_qodef_woocommerce_content();
				}

			} else {
				mixtape_qodef_woocommerce_content();
			} ?>

			</div>
	</div>
	<?php do_action('mixtape_qodef_after_container_close'); ?>
<?php get_footer(); ?>
