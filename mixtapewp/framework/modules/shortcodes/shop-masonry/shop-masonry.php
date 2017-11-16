<?php
namespace MixtapeQode\Modules\Shortcodes\ShopMasonry;

use MixtapeQode\Modules\Shortcodes\Lib\ShortcodeInterface;

class ShopMasonry implements ShortcodeInterface
{
    private $base;

    public function __construct()
    {
        $this->base = 'qodef_shop_masonry';
        add_action('vc_before_init', array($this, 'vcMap'));
    }

    public function getBase()
    {
        return $this->base;
    }

    public function vcMap()
    {
        vc_map(array(
            'name' => esc_html__('Shop Masonry', 'mixtapewp'),
            'base' => $this->base,
            'icon' => 'icon-wpb-shop-masonry extended-custom-icon',
            'category' => esc_html__('by SELECT', 'mixtapewp'),
            'allowed_container_element' => 'vc_row',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Order by', 'mixtapewp'),
                    'param_name' => 'orderby',
                    'value' => array(
                        esc_html__('Date', 'mixtapewp')  => 'date',
                        esc_html__('Title', 'mixtapewp') => 'title',
                    ),
                    'std' => 'title',
                    'save_always' => true,
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Sort order', 'mixtapewp'),
                    'param_name' => 'order',
                    'value' => array(
                        esc_html__('Descending', 'mixtapewp') => 'DESC',
                        esc_html__('Ascending', 'mixtapewp') => 'ASC',
                    ),
                    'save_always' => true,
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => esc_html__('Category', 'mixtapewp'),
                    'param_name' => 'category',
                    'value' => '',
                    'description' => esc_html__('Category Slug (leave empty for all)', 'mixtapewp')
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Show Category Filter', 'mixtapewp'),
                    'param_name' => 'filter',
                    'value' => array(
                        esc_html__('No', 'mixtapewp')   => 'no',
                        esc_html__('Yes', 'mixtapewp')  => 'yes',
                    ),
                    'save_always' => true,
                )
            )
        ));
    }

    public function render($atts, $content = null)
    {

        $params = shortcode_atts(array(
            'orderby' => 'date',
            'category' => '',
            'order' => 'DESC',
            'filter' => 'no',
        ), $atts);


        extract($params);

        $query_args = $this->getQueryArgs($params);

        $products = new \WP_Query($query_args, $atts);
        $columns  = 4;

        $html = '';

        $html  .= '<div class="woocommerce qodef-shop-masonry columns-' . $columns .'">';

        if($filter == 'yes'){
            $params['filter_categories'] = $this->getFilterCategories($params);
            $html .= mixtape_qodef_get_shortcode_module_template_part('templates/shop-filter','shop-masonry', '', $params);
        }

        if ( $products->have_posts() ) :

            do_action( "woocommerce_shortcode_before_products_loop" );

            $html .= '<div class="products qodef-shop-list-masonry">';
            $html .= '<div class="qodef-shop-list-masonry-grid-sizer"></div>';

            while ( $products->have_posts() ) : $products->the_post();

                $id = get_the_ID();
                $params['image_size_class'] = $this->getMasonrySize($id);
                $params['thumb_size'] = $this->getImageSize($id);
                $params['cats'] = $this->getItemCats($id);
                $params['out_stock_class'] = $this->getMasonryOutStockClass();
                $params['on_sale_class'] = $this->getMasonryOnSaleClass();
                $html .= mixtape_qodef_get_shortcode_module_template_part('templates/shop-masonry-template','shop-masonry','',$params);

            endwhile; // end of the loop.

            $html .= '</div>';

            do_action( "woocommerce_shortcode_after_products_loop" );

        endif;

        woocommerce_reset_loop();
        wp_reset_postdata();

        $html .= '</div>';

        return $html;
    }

    /**
     * Gets product's categories based on $id
     *
     * @param $id
     * @return string
     */
    private function getItemCats($id){
        $terms = get_the_terms( $id, 'product_cat');
        $cats = '';

        foreach($terms as $term){
            $cats .= 'product_cat-'.$term->term_id.' ';
        }

        return $cats;
    }


    /**
     * Gets all categories or child categories of a specific one
     *
     * @param $params
     * @return array|int|\WP_Error
     */
    private function getFilterCategories($params){

        $cat_id = 0;

        if(!empty($params['category'])){

            $top_category = get_term_by('slug', $params['category'], 'product_cat');
            if(isset($top_category->term_id)){
                $cat_id = $top_category->term_id;
            }

        }

        $args = array(
            'child_of' => $cat_id,
        );

        $filter_categories = get_terms('product_cat',$args);

        return $filter_categories;

    }


    /**
     * Creates an array of args for loop
     *
     * @param $params
     * @return array
     */
    private function getQueryArgs($params){

        $args = array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'ignore_sticky_posts' => 1,
            'orderby'             => $params['orderby'],
            'order'               => $params['order'],
            'posts_per_page'      => -1,
            'meta_query'          => WC()->query->get_meta_query()
        );

        if($params['category'] != ''){
            $args['product_cat'] = $params['category'];
        }

        return $args;
    }


    /**
     * Gets required class for masonry layout
     *
     * @param $id
     * @return string
     */
    private function getMasonrySize($id){
        $masonry_size_class = '';

        $masonry_size = get_post_meta($id, 'shop_masonry_dimensions',true);
        switch($masonry_size):
	        default:
	        case 'default' :
                $masonry_size_class = 'qodef-default-masonry-item ';
                break;
            case 'large_width' :
                $masonry_size_class = 'qodef-large-width-masonry-item ';
                break;
            case 'large_height' :
                $masonry_size_class = 'qodef-large-height-masonry-item ';
                break;
            case 'large_width_height' :
                $masonry_size_class = 'qodef-large-width-height-masonry-item ';
                break;
        endswitch;

        return $masonry_size_class;
    }

    /**
     * Returns product class if product is out of stock
     *
     * @return string
     */
    private function getMasonryOutStockClass(){

        global $product;

        $masonry_out_stock_class = '';

        if (!$product->is_in_stock()) {
            $masonry_out_stock_class = "qodef-out-of-stock";
        }

        return $masonry_out_stock_class;
    }

    /**
     * Returns product class if product is on sale
     *
     * @return string
     */
    private function getMasonryOnSaleClass(){

        global $product;

        $masonry_on_sale_class = '';

        if ( $product->is_on_sale() ) {
            $masonry_on_sale_class = "qodef-on-sale";
        }

        return $masonry_on_sale_class;
    }


    /**
     * Gets required class for product thumb
     *
     * @param $id
     * @return string
     */
    private function getImageSize($id){

        $masonry_size = get_post_meta($id, 'shop_masonry_dimensions',true);

        switch($masonry_size):
	        default:
	        case 'default' :
                $thumb_size = 'mixtape_qodef_square';
                break;
            case 'large_width' :
                $thumb_size = 'mixtape_qodef_large_width';
                break;
            case 'large_height' :
                $thumb_size = 'mixtape_qodef_large_height';
                break;
            case 'large_width_height' :
                $thumb_size = 'mixtape_qodef_large_width_height';
                break;
        endswitch;

        return $thumb_size;
    }
}