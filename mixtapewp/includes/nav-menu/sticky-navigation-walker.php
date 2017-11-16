<?php

/**
 * Custom WP_NAV_MENU function for top navigation
 */
if (!class_exists('MixtapeQodeStickyNavigationWalker')) {
	class MixtapeQodeStickyNavigationWalker extends Walker_Nav_Menu {

		// add classes to ul sub-menus
		function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
		{
			$id_field = $this->db_fields['id'];
			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
			}
			return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		function start_lvl( &$output, $depth = 0, $args = array() ) {

			$indent = str_repeat("\t", $depth);
			if($depth == 0){
				$out_div = '<div class="qodef-menu-second"><div class="qodef-menu-inner">';
			}else{
				$out_div = '';
			}

			// build html
			$output .= "\n" . $indent . $out_div  .'<ul>' . "\n";
		}
		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);

			if($depth == 0){
				$out_div_close = '</div></div>';
			}else{
				$out_div_close = '';
			}

			$output .= "$indent</ul>". $out_div_close ."\n";
		}

		// add main/sub classes to li's and links
		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
			if($depth==0 && $args->has_children) :
				$classes[] = 'qodef-has-sub';
			endif;
			if($depth==1 && $args->has_children) :
				$classes[] = 'qodef-sub';
			endif;

			//menu type class
			if($depth==0){
				if($item->type_menu == "wide") {
					$classes[] = 'qodef-menu-wide';
				} elseif($item->type_menu == "wide_icons") {
					$classes[] = 'qodef-menu-wide qodef-menu-icons';
				} else {
					$classes[] = 'qodef-menu-narrow';
				}
			}

			if (mixtape_qodef_options()->getOptionValue('enable_wide_menu_background') == "yes"){
				$classes[] = 'qodef-wide-background';
			}

			//wide menu position class
			if($depth==0){
				if($item->wide_position == "right") {
					$classes[] = 'qodef-menu-right-position';
				} elseif($item->wide_position == "left") {
					$classes[] = 'qodef-menu-left-position';
				}
			}

			// anchor classes
			$anchor = '';
			if($item->anchor != ""){
				$anchor = '#'.esc_attr($item->anchor);
				$classes[] = 'anchor-item';
			}

			// depth dependent classes
			if ($item->anchor == "" && (($item->current && $depth == 0) || ($item->current_item_ancestor && $depth == 0))):
				$classes[] = 'qodef-active-item';
			endif;

			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

			// build html
			$output .= $indent . '<li id="sticky-nav-menu-item-'. $item->ID . '" class="' . $class_names . '">';

			$a_classes = array();

			if (($item->current && $depth == 0) ||  ($item->current_item_ancestor && $depth == 0) ):
				$a_classes[] = 'current';
			endif;

			if($item->nolink != '') {
				$a_classes[] = 'qodef-no-link';
			}
			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url		) . $anchor .'"' : '';
			$attributes .= ! empty( $a_classes ) 		? ' class="'  . implode(' ', $a_classes) .'"' : '';
			$attributes .= ! empty( $item->nolink ) 	? ' style="cursor: default;" onclick="JavaScript: return false;"' : '';

			$item_output = $args->before;
			if($item->hide == ""){

				$item_output .= '<a'. $attributes .'><span class="qodef-item-outer">';
				$item_output .= '<span class="qodef-item-inner">';

				if(!empty ($item->icon) && $item->icon != 'null'){
					$icon = $item->icon;
					if($item->icon_pack == 'font_awesome') {
						$icon .= ' fa';
					}
					$item_output .= '<span class="qodef-menu-icon-wrapper"><i class="qodef-menu-icon '.$icon.'"></i></span>';
				}

				$item_output .= '<span class="qodef-item-text">';
				$item_output .= apply_filters('the_title', $item->title, $item->ID);
				$item_output .= '</span>'; //close span.qodef-item-text
				if($item->description !== "") {
					$item_output .= '<span class="qodef-item-inner-desc"> ' . $item->description.'</span>';
				}				
                if($item->featured_icon !== ""){
                    $item_output .= '<span class="qodef-featured-icon '. $item->featured_icon .'"></span>';
                }
				$item_output .= '</span>'; //close span.qodef-item-inner
				$item_output .= '<span class="plus"></span>';
                
				//append arrow for dropdown
				if($args->has_children && $depth == 1) {
					$item_output .= '<i class="qodef-menu-arrow lnr lnr-chevron-right"></i>';
				}

				$item_output .= '</span></a>';
			}

			if($item->sidebar != "" && $depth > 0){
				ob_start();
				dynamic_sidebar($item->sidebar);
				$sidebar_content = ob_get_contents();
				ob_end_clean();
				$item_output .= $sidebar_content;
			}

			$item_output .= $args->after;

			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
}